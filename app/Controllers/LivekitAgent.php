<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Livekit\AccessToken;
use Livekit\RoomServiceClient;
use Livekit\ParticipantInfo;
use Livekit\TrackInfo;
use Livekit\DataPacket_Kind;
use Livekit\ParticipantInfo_State;

class LivekitAgent extends Controller
{
    protected $livekitConfig;
    protected $roomService;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        
        // Add CORS headers
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $this->response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        
        $this->livekitConfig = config('Livekit');
        
        // Initialize room service if LiveKit SDK is available
        if (class_exists('Livekit\RoomServiceClient')) {
            // Create HTTP client for LiveKit SDK
            $httpClient = new \GuzzleHttp\Client();
            $this->roomService = new RoomServiceClient(
                $this->livekitConfig->serverUrl,
                $httpClient
            );
        } else {
            $this->roomService = null;
        }
    }

    /**
     * Generate access token for LiveKit room
     */
    public function generateToken()
    {
        $roomName = $this->request->getVar('room_name') ?? 'default-room';
        $participantName = $this->request->getVar('participant_name') ?? 'user';
        $participantIdentity = $this->request->getVar('participant_identity') ?? uniqid();
        
        try {
            if (class_exists('Livekit\\AccessToken')) {
                // Prefer official SDK token builder to avoid claim/format mistakes
                $token = new AccessToken($this->livekitConfig->apiKey, $this->livekitConfig->apiSecret);
                $token->setIdentity($participantIdentity);
                $token->setName($participantName);
                $token->setTtl(3600);

                $grants = new \Livekit\VideoGrants();
                $grants->setRoomJoin(true);
                $grants->setRoom($roomName);
                $grants->setCanPublish(true);
                $grants->setCanSubscribe(true);
                $grants->setCanPublishData(true);

                $token->setVideoGrants($grants);
                $jwt = $token->toJwt();
            } else {
                // Fallback to manual JWT (HS256)
                $now = time();
                $exp = $now + 3600;
                $payload = [
                    'iss' => $this->livekitConfig->apiKey,
                    'sub' => $participantIdentity,
                    'name' => $participantName,
                    'nbf' => $now - 1,
                    'iat' => $now,
                    'exp' => $exp,
                    'video' => [
                        'room' => $roomName,
                        'roomJoin' => true,
                        'canPublish' => true,
                        'canSubscribe' => true,
                        'canPublishData' => true,
                    ],
                ];
                $jwt = \Firebase\JWT\JWT::encode($payload, $this->livekitConfig->apiSecret, 'HS256');
            }
            
            return $this->response->setJSON([
                'success' => true,
                'token' => $jwt,
                'room_name' => $roomName,
                'participant_identity' => $participantIdentity
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    /**
     * Generate a simple JWT token for testing (fallback method)
     */
    private function generateSimpleJWT($identity, $name, $roomName)
    {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode([
            'iss' => $this->livekitConfig->apiKey,
            'sub' => $identity,
            'name' => $name,
            'video' => [
                'room' => $roomName,
                'roomJoin' => true,
                'canPublish' => true,
                'canSubscribe' => true,
                'canPublishData' => true
            ],
            'exp' => time() + 3600
        ]);
        
        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        
        $signature = hash_hmac('sha256', $base64Header . "." . $base64Payload, $this->livekitConfig->apiSecret, true);
        $base64Signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        
        return $base64Header . "." . $base64Payload . "." . $base64Signature;
    }

    /**
     * Create a new room
     */
    public function createRoom()
    {
        $roomName = $this->request->getVar('room_name') ?? 'room-' . uniqid();
        $maxParticipants = $this->request->getVar('max_participants') ?? 10;
        
        try {
            if ($this->roomService && class_exists('Livekit\Room')) {
                $room = new \Livekit\Room();
                $room->setName($roomName);
                $room->setMaxParticipants($maxParticipants);
                $room->setEmptyTimeout(300); // 5 minutes
                
                $response = $this->roomService->createRoom($room);
                
                return $this->response->setJSON([
                    'success' => true,
                    'room' => [
                        'name' => $response->getName(),
                        'sid' => $response->getSid(),
                        'max_participants' => $response->getMaxParticipants(),
                        'empty_timeout' => $response->getEmptyTimeout()
                    ]
                ]);
            } else {
                // Fallback: Return mock room data for testing
                return $this->response->setJSON([
                    'success' => true,
                    'room' => [
                        'name' => $roomName,
                        'sid' => 'mock-sid-' . uniqid(),
                        'max_participants' => $maxParticipants,
                        'empty_timeout' => 300
                    ]
                ]);
            }
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * List rooms
     */
    public function listRooms()
    {
        try {
            if ($this->roomService) {
                $response = $this->roomService->listRooms();
                $rooms = [];
                
                foreach ($response->getRooms() as $room) {
                    $rooms[] = [
                        'name' => $room->getName(),
                        'sid' => $room->getSid(),
                        'num_participants' => $room->getNumParticipants(),
                        'max_participants' => $room->getMaxParticipants(),
                        'creation_time' => $room->getCreationTime()
                    ];
                }
                
                return $this->response->setJSON([
                    'success' => true,
                    'rooms' => $rooms
                ]);
            } else {
                // Fallback: Return mock room data for testing
                return $this->response->setJSON([
                    'success' => true,
                    'rooms' => [
                        [
                            'name' => 'demo-room-1',
                            'sid' => 'mock-sid-1',
                            'num_participants' => 2,
                            'max_participants' => 10,
                            'creation_time' => time() - 3600
                        ],
                        [
                            'name' => 'demo-room-2',
                            'sid' => 'mock-sid-2',
                            'num_participants' => 0,
                            'max_participants' => 5,
                            'creation_time' => time() - 1800
                        ]
                    ]
                ]);
            }
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Delete a room
     */
    public function deleteRoom()
    {
        $roomName = $this->request->getVar('room_name');
        
        if (!$roomName) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Room name is required'
            ]);
        }
        
        try {
            if ($this->roomService) {
                $this->roomService->deleteRoom($roomName);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Room deleted successfully'
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Get room participants
     */
    public function getParticipants()
    {
        $roomName = $this->request->getVar('room_name');
        
        if (!$roomName) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Room name is required'
            ]);
        }
        
        try {
            if ($this->roomService) {
                $response = $this->roomService->listParticipants($roomName);
                $participants = [];
                
                foreach ($response->getParticipants() as $participant) {
                    $participants[] = [
                        'identity' => $participant->getIdentity(),
                        'name' => $participant->getName(),
                        'state' => $participant->getState(),
                        'permission' => [
                            'can_subscribe' => $participant->getPermission()->getCanSubscribe(),
                            'can_publish' => $participant->getPermission()->getCanPublish(),
                            'can_publish_data' => $participant->getPermission()->getCanPublishData()
                        ]
                    ];
                }
                
                return $this->response->setJSON([
                    'success' => true,
                    'participants' => $participants
                ]);
            } else {
                // Fallback: Return mock participant data
                return $this->response->setJSON([
                    'success' => true,
                    'participants' => [
                        [
                            'identity' => 'demo-user-1',
                            'name' => 'Demo User 1',
                            'state' => 'connected',
                            'permission' => [
                                'can_subscribe' => true,
                                'can_publish' => true,
                                'can_publish_data' => true
                            ]
                        ]
                    ]
                ]);
            }
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Mute/unmute participant
     */
    public function muteParticipant()
    {
        $roomName = $this->request->getVar('room_name');
        $participantIdentity = $this->request->getVar('participant_identity');
        $trackSid = $this->request->getVar('track_sid');
        $muted = $this->request->getVar('muted') === 'true';
        
        if (!$roomName || !$participantIdentity || !$trackSid) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Room name, participant identity, and track SID are required'
            ]);
        }
        
        try {
            if ($this->roomService) {
                $this->roomService->mutePublishedTrack($roomName, $participantIdentity, $trackSid, $muted);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => $muted ? 'Participant muted' : 'Participant unmuted'
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Disconnect participant
     */
    public function disconnectParticipant()
    {
        $roomName = $this->request->getVar('room_name');
        $participantIdentity = $this->request->getVar('participant_identity');
        
        if (!$roomName || !$participantIdentity) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Room name and participant identity are required'
            ]);
        }
        
        try {
            if ($this->roomService) {
                $this->roomService->removeParticipant($roomName, $participantIdentity);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Participant disconnected'
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Send data to room
     */
    public function sendData()
    {
        $roomName = $this->request->getVar('room_name');
        $data = $this->request->getVar('data');
        $participantIdentities = $this->request->getVar('participant_identities') ?? [];
        
        if (!$roomName || !$data) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Room name and data are required'
            ]);
        }
        
        try {
            if ($this->roomService && class_exists('Livekit\DataPacket_Kind')) {
                $this->roomService->sendData($roomName, $data, DataPacket_Kind::RELIABLE, $participantIdentities);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data sent successfully'
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function options()
    {
        // Handle CORS preflight requests
        return $this->response->setStatusCode(200);
    }

    /**
     * Main LiveKit agent interface
     */
    public function index()
    {
        $data = [
            'title' => 'LiveKit Agent',
            'config' => $this->livekitConfig
        ];
        
        return view('livekit/agent', $data);
    }

    /**
     * Agent dashboard
     */
    public function dashboard()
    {
        try {
            $data = [
                'title' => 'LiveKit Agent Dashboard',
                'config' => $this->livekitConfig
            ];
            
            if ($this->roomService) {
                $rooms = $this->roomService->listRooms();
                $data['rooms'] = $rooms->getRooms();
            } else {
                // Fallback: Use mock data
                $data['rooms'] = [
                    (object)[
                        'name' => 'demo-room-1',
                        'sid' => 'mock-sid-1',
                        'num_participants' => 2,
                        'max_participants' => 10,
                        'creation_time' => time() - 3600
                    ],
                    (object)[
                        'name' => 'demo-room-2',
                        'sid' => 'mock-sid-2',
                        'num_participants' => 0,
                        'max_participants' => 5,
                        'creation_time' => time() - 1800
                    ]
                ];
            }
            
            return view('livekit/dashboard', $data);
            
        } catch (\Exception $e) {
            $data = [
                'title' => 'LiveKit Agent Dashboard',
                'error' => $e->getMessage(),
                'config' => $this->livekitConfig
            ];
            
            return view('livekit/dashboard', $data);
        }
    }

    /**
     * Test page for LiveKit agent
     */
    public function test()
    {
        $data = [
            'title' => 'LiveKit Agent Test',
            'config' => $this->livekitConfig
        ];
        
        return view('livekit/test', $data);
    }

    /**
     * Dispatch an agent to join the specified room (LiveKit Cloud Agents API)
     */
    public function dispatchAgent()
    {
        $roomName = $this->request->getVar('room_name') ?? 'voice-support';
        $identity = $this->request->getVar('identity') ?? 'support-agent';

        try {
            $client = new \GuzzleHttp\Client([
                'base_uri' => 'https://cloud.livekit.io',
                'timeout'  => 10,
                'auth'     => [$this->livekitConfig->apiKey, $this->livekitConfig->apiSecret],
            ]);

            $resp = $client->post('/api/agents/dispatch', [
                'headers' => [ 'Content-Type' => 'application/json' ],
                'json'    => [
                    'room' => $roomName,
                    'identity' => $identity,
                ],
            ]);

            $body = json_decode($resp->getBody()->getContents(), true);

            return $this->response->setJSON([
                'success' => true,
                'result' => $body,
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Auto-responder for chat agent
     */
    public function autoResponder()
    {
        $message = $this->request->getVar('message');
        $roomName = $this->request->getVar('room_name');
        
        if (!$message || !$roomName) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Message and room name are required'
            ]);
        }
        
        // Simple auto-responder logic
        $response = $this->generateAutoResponse($message);
        
        // Send response back to room
        try {
            if ($this->roomService) {
                $data = json_encode([
                    'type' => 'chat',
                    'message' => $response,
                    'timestamp' => date('c'),
                    'sender' => 'agent'
                ]);
                
                $this->roomService->sendData($roomName, $data, DataPacket_Kind::RELIABLE);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'response' => $response
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    /**
     * Generate auto-response based on message
     */
    private function generateAutoResponse($message)
    {
        $message = strtolower(trim($message));
        
        // Common greetings
        if (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
            return "Hello! Welcome to our support chat. How can I help you today?";
        }
        
        // Hours of operation
        if (strpos($message, 'hours') !== false || strpos($message, 'time') !== false) {
            return "Our business hours are Monday - Friday 9:00am - 5:00pm EST. We're here to help during these hours!";
        }
        
        // Contact information
        if (strpos($message, 'phone') !== false || strpos($message, 'call') !== false) {
            return "You can reach us by phone at 732-742-4105 or email us at " . FROM_EMAIL . ". We're here to help!";
        }
        
        // Services
        if (strpos($message, 'service') !== false || strpos($message, 'care') !== false) {
            return "We provide Adult Home Care, Adult Home Health, and Adult Foster Care services. Which service are you interested in learning more about?";
        }
        
        // Pricing
        if (strpos($message, 'price') !== false || strpos($message, 'cost') !== false) {
            return "Pricing varies based on the specific services needed. I'd be happy to connect you with our team for a personalized quote. Would you like to schedule a consultation?";
        }
        
        // Location
        if (strpos($message, 'location') !== false || strpos($message, 'address') !== false) {
            return "We're located at 15 Clydesdale Rd, Scotch Plains, NJ 07076. We also provide services throughout the surrounding areas.";
        }
        
        // Default response
        return "Thank you for your message. I'm here to help! For immediate assistance, you can call us at 732-742-4105 or email us at " . FROM_EMAIL . ". How else can I assist you?";
    }
}
