<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Voice Chat Support</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #ffd700 !important;
        }
        
        .contactbanner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0;
            color: white;
        }
        .contactbanner h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        .contactbanner h1 span {
            color: #ffd700;
        }
        .alignc {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            padding: 10px;
        }
        .mt-cont-4 {
            margin-top: 2rem;
        }
        .contacticon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        
        .getintouchbox {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .getintouchbox h5 {
            color: #667eea;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.5rem;
        }
        .contacttextbox {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .contacttextbox:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        textarea.contacttextbox {
            min-height: 120px;
            resize: vertical;
        }
        .custtombtn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .custtombtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .help-inline {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }
        
        /* Voice Chat Styling Improvements */
        .voice-chat-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px 0;
        }
        
        .voice-chat-card {
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-radius: 20px;
            overflow: hidden;
        }
        
        .voice-chat-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .voice-chat-header h5 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .voice-chat-content {
            padding: 30px;
            background: white;
            min-height: 400px;
        }
        
        #voiceChatContainer {
            height: auto;
            min-height: 300px;
            padding: 0;
            background: transparent;
            text-align: center;
        }
        
        #voiceChatContent {
            padding: 40px 20px;
        }
        
        #voiceChatContent i {
            margin-bottom: 20px;
            color: #6c757d;
        }
        
        #voiceChatContent h6 {
            color: #495057;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        #voiceChatContent p {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        #audioControls {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .audio-control-group {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .microphone-controls, .agent-controls {
            text-align: center;
            padding: 15px;
        }
        
        .microphone-controls i, .agent-controls i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .microphone-controls i {
            color: #28a745;
        }
        
        .agent-controls i {
            color: #007bff;
        }
        
        .control-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
        }
        
        #speakingIndicator {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: none;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
        }
        
        #speakingIndicator .alert {
            margin: 0;
            background: transparent;
            border: none;
            color: #1976d2;
            font-weight: 500;
        }
        
        .text-input-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .text-input-section h6 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .input-group {
            margin-bottom: 15px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .transcript-section {
            background: white;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .transcript-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            border-radius: 10px 10px 0 0;
        }
        
        .transcript-header h6 {
            margin: 0;
            color: #495057;
            font-weight: 600;
        }
        
        .transcript-container {
            height: 200px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .voice-chat-controls {
            background: #f8f9fa;
            padding: 25px;
            border-top: 1px solid #e9ecef;
        }
        
        .control-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover, .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        .status-info {
            text-align: right;
        }
        
        .badge {
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 20px;
        }
        
        .connection-info {
            font-size: 14px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .contactbanner h1 {
                font-size: 2rem;
            }
            
            .getintouchbox {
                padding: 25px;
            }
            
            .voice-chat-card {
                margin: 0 15px;
            }
            
            .voice-chat-content {
                padding: 20px;
            }
            
            .control-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .status-info {
                text-align: center;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <i class="fas fa-microphone-alt"></i> Kiara Medical Agent
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>




<!-- LiveKit Voice Chat Agent Section -->
<section id="voice-chat" class="voice-chat-section">
    <div class="container">
        <div class="voice-chat-card">
            <div class="voice-chat-header">
                <h5><i class="fas fa-microphone"></i> Voice Chat with Our Agent</h5>
            </div>
            <div class="voice-chat-content">
                <!-- Voice Chat Container -->
                <div id="voiceChatContainer">
                    <div id="voiceChatContent">
                        <i class="fas fa-microphone fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">Click "Start Voice Chat" to begin talking with our agent</h6>
                        <p class="small text-muted">You can speak directly to our support agent or type messages</p>
                    </div>
                            
                    <!-- Audio Controls -->
                    <div id="audioControls" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="audio-control-group">
                                    <div class="microphone-controls">
                                        <i class="fas fa-microphone fa-2x"></i>
                                        <div class="control-label">Your Microphone</div>
                                        <button class="btn btn-sm btn-outline-danger" id="muteBtn">
                                            <i class="fas fa-microphone-slash"></i> Mute
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="audio-control-group">
                                    <div class="agent-controls">
                                        <i class="fas fa-headphones fa-2x"></i>
                                        <div class="control-label">Agent Audio</div>
                                        <button class="btn btn-sm btn-outline-secondary" id="volumeBtn">
                                            <i class="fas fa-volume-up"></i> Volume
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <!-- Speaking Indicator -->
                        <div id="speakingIndicator" style="display: none;">
                            <div class="alert alert-info">
                                <i class="fas fa-comment-dots"></i> <span id="speakingText">Agent is speaking...</span>
                            </div>
                        </div>
                        
                        <!-- Text Input Section -->
                        <div class="text-input-section">
                            <h6><i class="fas fa-keyboard"></i> Or Type Your Message</h6>
                            <div class="input-group">
                                <input type="text" class="form-control" id="textMessageInput" 
                                       placeholder="Type your message here..." 
                                       maxlength="500">
                                <button class="btn btn-primary" type="button" id="sendTextBtn">
                                    <i class="fas fa-paper-plane"></i> Send
                                </button>
                            </div>
                            <small class="text-muted">You can type messages instead of speaking</small>
                        </div>
                            </div>
                    </div>
                    
                    <!-- Transcript Section -->
                    <div id="transcriptSection" class="transcript-section" style="display: none;">
                        <div class="transcript-header">
                            <h6><i class="fas fa-comments"></i> Conversation Transcript</h6>
                        </div>
                        <div class="p-3">
                            <div id="transcriptContainer" class="transcript-container">
                                <div class="text-muted text-center">Conversation will appear here...</div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-secondary" id="clearTranscriptBtn">
                                    <i class="fas fa-trash"></i> Clear Transcript
                                </button>
                                <button class="btn btn-sm btn-outline-primary" id="copyTranscriptBtn">
                                    <i class="fas fa-copy"></i> Copy Transcript
                                </button>
                            </div>
                        </div>
                    </div>
                        
                <!-- Voice Chat Controls -->
                <div class="voice-chat-controls">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="control-buttons">
                                <button class="btn btn-success btn-lg" id="startVoiceChatBtn">
                                    <i class="fas fa-play"></i> Start Voice Chat
                                </button>
                                <button class="btn btn-danger btn-lg" id="endVoiceChatBtn" disabled>
                                    <i class="fas fa-stop"></i> End Call
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="status-info">
                                <small class="text-muted">
                                    Status: <span id="voiceChatStatus" class="badge bg-secondary">Disconnected</span>
                                </small>
                                <div class="connection-info">
                                    <span id="connectionInfo">Click start to connect</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="display:none;">
    <div class="container-fuild">
        <div class="row">
            <div class="col-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3028.477976534787!2d-74.38631622443997!3d40.6193398432838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b0b66ab9af05%3A0xf0878eee7d054113!2s15%20Clydesdale%20Rd%2C%20Scotch%20Plains%2C%20NJ%2007076%2C%20USA!5e0!3m2!1sen!2sin!4v1692184662823!5m2!1sen!2sin"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
        <p class="mb-0 mt-2">
            <i class="fas fa-phone"></i> 9904829612 | 
            <i class="fas fa-envelope"></i> vivek@symphony-solution.com
        </p>
    </div>
</footer>

<!-- jQuery (required for validation and mask plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



<!-- LiveKit SDK -->
<script src="<?= base_url('assets/js/livekit/livekit-client.umd.min.js') ?>" 
        onerror="this.onerror=null; this.src='https://cdn.jsdelivr.net/npm/livekit-client/dist/livekit-client.umd.min.js';"></script>
<script>
    // Ensure global alias matches code usage
    if (typeof window.LiveKit === 'undefined' && typeof window.LivekitClient !== 'undefined') {
        window.LiveKit = window.LivekitClient;
    }
</script>
<script src="<?= base_url('assets/js/livekit/agent.js') ?>"></script>
<script src="<?= base_url('assets/js/livekit/utils.js') ?>"></script>

<!-- Custom helper functions for loader -->
<script>
    function showloader() {
        $('body').append('<div class="loader-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        $('.loader-overlay').css({
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'width': '100%',
            'height': '100%',
            'background': 'rgba(0,0,0,0.5)',
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center',
            'z-index': '9999'
        });
    }
    
    function hideloader() {
        $('.loader-overlay').remove();
    }
    
    // Add custom validation method for no special characters
    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Please enter only letters and spaces");
</script>

<script type="text/javascript">
    

    // LiveKit Voice Chat Agent Implementation
    class ContactVoiceChatAgent {
        constructor() {
            this.room = null;
            this.isConnected = false;
            this.isMuted = false;
            this.agentIdentity = 'support-agent';
            this.userIdentity = 'user-' + Date.now();
            // Generate unique room name for each session
            this.roomName = 'support-' + Date.now() + '-' + Math.random().toString(36).substring(7);
            console.log('[VoiceChat] Generated room name:', this.roomName);
            this.initializeElements();
            this.attachEventListeners();
        }

        initializeElements() {
            this.voiceChatContainer = document.getElementById('voiceChatContainer');
            this.voiceChatContent = document.getElementById('voiceChatContent');
            this.audioControls = document.getElementById('audioControls');
            this.speakingIndicator = document.getElementById('speakingIndicator');
            this.speakingText = document.getElementById('speakingText');
            this.startVoiceChatBtn = document.getElementById('startVoiceChatBtn');
            this.endVoiceChatBtn = document.getElementById('endVoiceChatBtn');
            this.voiceChatStatus = document.getElementById('voiceChatStatus');
            this.connectionInfo = document.getElementById('connectionInfo');
            this.muteBtn = document.getElementById('muteBtn');
            this.volumeBtn = document.getElementById('volumeBtn');
            
            // Text input elements
            this.textMessageInput = document.getElementById('textMessageInput');
            this.sendTextBtn = document.getElementById('sendTextBtn');
            
            // Transcript elements
            this.transcriptSection = document.getElementById('transcriptSection');
            this.transcriptContainer = document.getElementById('transcriptContainer');
            this.clearTranscriptBtn = document.getElementById('clearTranscriptBtn');
            this.copyTranscriptBtn = document.getElementById('copyTranscriptBtn');
            
            // Transcript data
            this.transcript = [];

            // Browser speech recognition (USER) support
            this.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition || null;
            this.recognition = null;
            this.isRecognizing = false;
        }

        attachEventListeners() {
            this.startVoiceChatBtn.addEventListener('click', () => this.startVoiceChat());
            this.endVoiceChatBtn.addEventListener('click', () => this.endVoiceChat());
            this.muteBtn.addEventListener('click', () => this.toggleMute());
            this.volumeBtn.addEventListener('click', () => this.toggleVolume());
            this.clearTranscriptBtn.addEventListener('click', () => this.clearTranscript());
            this.copyTranscriptBtn.addEventListener('click', () => this.copyTranscript());
            this.sendTextBtn.addEventListener('click', () => this.sendTextMessage());
            this.textMessageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.sendTextMessage();
                }
            });
        }

            async startVoiceChat(autoStart = false) {
                try {
                    console.log('[VoiceChat] startVoiceChat() called, autoStart:', autoStart);
                    this.updateStatus('connecting', 'Connecting...');
                    this.connectionInfo.textContent = 'Connecting to voice chat...';
                    
                    // When using LiveKit Cloud, skip localhost server check
                    
                    // Use the unique room name generated in constructor
                    const roomName = this.roomName;

                    // Ask server to dispatch agent for this room
                    console.log('[VoiceChat] dispatching agent for room:', roomName);
                    await fetch('<?= base_url('livekit/dispatchAgent') ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ room_name: roomName, identity: 'support-agent' })
                    }).catch(() => {});

                    // Get access token from server (use app base URL)
                    console.log('[VoiceChat] requesting token for room:', roomName);
                    const response = await fetch('<?= base_url('livekit/generateToken') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            room_name: roomName,
                            participant_name: 'Customer',
                            participant_identity: this.userIdentity
                        })
                    });
                    
                    const data = await response.json();
                    console.log('[VoiceChat] token response:', data);
                    
                    if (!data.success) {
                        throw new Error(data.error);
                    }
                    
                    // Connect to LiveKit room with audio configuration
                    this.room = new LiveKit.Room({
                        adaptiveStream: true,
                        dynacast: true,
                        publishDefaults: {
                            audioPreset: LiveKit.AudioPresets.music
                        }
                    });
                    
                    this.setupRoomEventListeners();
                    
                    // Connect to room
                    console.log('[VoiceChat] connecting to LiveKit at:', '<?= esc(config('Livekit')->serverUrl) ?>');
                    await this.room.connect('<?= esc(config('Livekit')->serverUrl) ?>', data.token);
                    console.log('[VoiceChat] connected to room');
                    
                    // Request microphone permission explicitly and enable only audio
                    try {
                        console.log('[VoiceChat] requesting microphone permission');
                        await navigator.mediaDevices.getUserMedia({ audio: true });
                    } catch (permError) {
                        console.error('[VoiceChat] microphone permission error', permError);
                        this.updateStatus('disconnected', 'Microphone blocked');
                        this.connectionInfo.textContent = 'Microphone permission is required. Please allow access and try again.';
                        alert('Microphone permission denied. Click the lock icon in the address bar and set Microphone to Allow, then reload.');
                        await this.room.disconnect().catch(() => {});
                        return;
                    }

                    await this.room.localParticipant.setMicrophoneEnabled(true);
                    console.log('[VoiceChat] local microphone enabled');
                    
                    this.isConnected = true;
                    this.updateStatus('connected', 'Connected');
                    this.updateUI();
                    this.showAudioControls();
                    this.showTranscript();
                    this.connectionInfo.textContent = `Connected to room: ${roomName}. You can now speak with our agent.`;

                    // Start local (USER) live transcription via Web Speech API if available
                    this.startUserTranscription();
                    
                } catch (error) {
                    console.error('[VoiceChat] Failed to start voice chat:', error);
                    if (error && (error.name === 'NotAllowedError' || error.message?.includes('Permission'))) {
                        this.updateStatus('disconnected', 'Microphone blocked');
                        this.connectionInfo.textContent = 'Please allow microphone access and try again.';
                        alert('Permission denied. Allow microphone access in your browser and reload.');
                        return;
                    }
                    // For other errors, show a message instead of silently switching to demo mode
                    this.updateStatus('disconnected', 'Connection failed');
                    this.connectionInfo.textContent = 'Unable to start voice chat. Please try again.';
                }
            }

            startDemoMode() {
                console.log('[VoiceChat] Starting demo mode - LiveKit server not available');
                this.isConnected = true;
                this.updateStatus('connected', 'Demo Mode');
                this.updateUI();
                this.showAudioControls();
                this.connectionInfo.textContent = 'Demo Mode: LiveKit server not running. Please start Docker and run: docker-compose up -d';
                
                // Show demo message
                setTimeout(() => {
                    this.showSpeakingIndicator('Demo: Agent would be speaking here...');
                    setTimeout(() => {
                        this.hideSpeakingIndicator();
                    }, 3000);
                }, 2000);
            }

        setupRoomEventListeners() {
            this.room.on(LiveKit.RoomEvent.ParticipantConnected, (participant) => {
                console.log('[VoiceChat] participant connected:', participant.identity);
                if (participant.identity !== this.userIdentity) {
                    this.showSpeakingIndicator('Support agent joined the call');
                    setTimeout(() => this.hideSpeakingIndicator(), 3000);
                }
            });
            
            this.room.on(LiveKit.RoomEvent.ParticipantDisconnected, (participant) => {
                console.log('[VoiceChat] participant disconnected:', participant.identity);
                if (participant.identity !== this.userIdentity) {
                    this.showSpeakingIndicator('Support agent left the call');
                    setTimeout(() => this.hideSpeakingIndicator(), 3000);
                }
            });
            
            this.room.on(LiveKit.RoomEvent.TrackSubscribed, (track, publication, participant) => {
                if (track.kind === 'audio' && participant.identity !== this.userIdentity) {
                    // Agent is speaking
                    console.log('[VoiceChat] remote audio subscribed from', participant.identity, 'track:', publication?.trackSid || 'unknown');
                    this.showSpeakingIndicator('Agent is speaking...');
                    // Ensure audio element is created and attached to DOM so browsers will play it
                    const audioEl = track.attach();
                    try {
                        audioEl.autoplay = true;
                        audioEl.playsInline = true;
                        audioEl.muted = false;
                        // Append once; avoid duplicates if event fires multiple times
                        if (!audioEl.isConnected) {
                            document.body.appendChild(audioEl);
                        }
                        audioEl.play().catch((e) => { console.warn('[VoiceChat] autoplay blocked until gesture', e); });
                    } catch (e) {
                        console.warn('[VoiceChat] Failed to attach/play remote audio:', e);
                    }
                }
            });
            
            // Use LiveKit's official text streams for transcriptions
            // This handles both user STT and agent TTS transcriptions automatically
            this.room.registerTextStreamHandler('lk.transcription', async (reader, participantInfo) => {
                try {
                    const message = await reader.readAll();
                    const isTranscription = reader.info.attributes['lk.transcribed_track_id'] != null;
                    const isFinal = reader.info.attributes['lk.transcription_final'] === 'true';
                    const segmentId = reader.info.attributes['lk.segment_id'];
                    
                    console.log('[VoiceChat] Text stream received:', {
                        participant: participantInfo.identity,
                        message: message,
                        isTranscription: isTranscription,
                        isFinal: isFinal,
                        segmentId: segmentId
                    });
                    
                    if (isTranscription) {
                        // Determine speaker based on participant identity
                        const speaker = participantInfo.identity === this.userIdentity ? 'USER' : 'AGENT';
                        
                        if (isFinal) {
                            // Final transcription - add to transcript
                            this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), true);
                        } else {
                            // Interim transcription - update last line if same speaker
                            const last = this.transcript[this.transcript.length - 1];
                            if (last && last.speaker === speaker && last.final === false) {
                                last.text = message;
                                last.timestamp = new Date().toLocaleTimeString();
                                this.renderTranscript();
                            } else {
                                this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), false);
                            }
                        }
                    }
                } catch (e) {
                    console.warn('[VoiceChat] Failed to handle text stream:', e);
                }
            });

            // Register handler for text chat messages (lk.chat topic)
            this.room.registerTextStreamHandler('lk.chat', async (reader, participantInfo) => {
                try {
                    const message = await reader.readAll();
                    console.log('[VoiceChat] Chat message received:', {
                        participant: participantInfo.identity,
                        message: message
                    });
                    
                    // Add chat messages to transcript
                    const speaker = participantInfo.identity === this.userIdentity ? 'USER' : 'AGENT';
                    this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), true);
                } catch (e) {
                    console.warn('[VoiceChat] Failed to handle chat message:', e);
                }
            });

            // Keep Web Speech API for user transcription as backup
            // The official LiveKit text streams should handle both user and agent transcriptions
            
            this.room.on(LiveKit.RoomEvent.TrackUnsubscribed, (track, publication, participant) => {
                if (track.kind === 'audio' && participant.identity !== this.userIdentity) {
                    this.hideSpeakingIndicator();
                }
            });
            
            this.room.on(LiveKit.RoomEvent.Disconnected, () => {
                console.log('[VoiceChat] room disconnected');
                this.handleDisconnection();
            });
        }

            async toggleMute() {
                if (!this.room) {
                    // Demo mode - just toggle the UI
                    this.isMuted = !this.isMuted;
                    this.muteBtn.innerHTML = this.isMuted ? '<i class="fas fa-microphone"></i> Unmute' : '<i class="fas fa-microphone-slash"></i> Mute';
                    this.muteBtn.className = this.isMuted ? 'btn btn-sm btn-success' : 'btn btn-sm btn-outline-danger';
                    this.connectionInfo.textContent = this.isMuted ? 'Microphone muted (Demo)' : 'Microphone unmuted (Demo)';
                    return;
                }
                
                try {
                    if (this.isMuted) {
                        await this.room.localParticipant.setMicrophoneEnabled(true);
                        this.isMuted = false;
                        this.muteBtn.innerHTML = '<i class="fas fa-microphone-slash"></i> Mute';
                        this.muteBtn.className = 'btn btn-sm btn-outline-danger';
                    } else {
                        await this.room.localParticipant.setMicrophoneEnabled(false);
                        this.isMuted = true;
                        this.muteBtn.innerHTML = '<i class="fas fa-microphone"></i> Unmute';
                        this.muteBtn.className = 'btn btn-sm btn-success';
                    }
                } catch (error) {
                    console.error('Failed to toggle mute:', error);
                }
            }

        toggleVolume() {
            // Volume control implementation
            alert('Volume control feature coming soon!');
        }

        async sendTextMessage() {
            if (!this.room || !this.isConnected) {
                alert('Please start a voice chat first');
                return;
            }

            const message = this.textMessageInput.value.trim();
            if (!message) {
                return;
            }

            try {
                console.log('[VoiceChat] Sending text message:', message);
                
                // Send text message using LiveKit's sendText method with lk.chat topic
                const info = await this.room.localParticipant.sendText(message, {
                    topic: 'lk.chat'
                });
                
                console.log('[VoiceChat] Text message sent successfully:', info);
                
                // Add user message to transcript immediately
                this.addToTranscript('USER', message, new Date().toLocaleTimeString(), true);
                
                // Clear the input field
                this.textMessageInput.value = '';
                
                // Show typing indicator
                this.showSpeakingIndicator('Agent is typing...');
                
            } catch (error) {
                console.error('[VoiceChat] Failed to send text message:', error);
                alert('Failed to send message. Please try again.');
            }
        }

        showAudioControls() {
            this.voiceChatContent.style.display = 'none';
            this.audioControls.style.display = 'block';
        }

        showSpeakingIndicator(text) {
            this.speakingText.textContent = text;
            this.speakingIndicator.style.display = 'block';
        }

        hideSpeakingIndicator() {
            this.speakingIndicator.style.display = 'none';
        }

        async endVoiceChat() {
            if (this.room) {
                try {
                    await this.room.disconnect();
                } catch (error) {
                    console.error('Error disconnecting:', error);
                }
            }
            this.handleDisconnection();
        }

        handleDisconnection() {
            this.isConnected = false;
            this.room = null;
            this.updateStatus('disconnected', 'Disconnected');
            this.updateUI();
            this.connectionInfo.textContent = 'Voice chat ended. Thank you for contacting us!';
            this.voiceChatContent.style.display = 'block';
            this.audioControls.style.display = 'none';
            this.hideSpeakingIndicator();
            this.hideTranscript();
        }

        updateStatus(status, text) {
            this.voiceChatStatus.className = `badge bg-${status === 'connected' ? 'success' : status === 'connecting' ? 'warning' : 'secondary'}`;
            this.voiceChatStatus.textContent = text;
        }

        updateUI() {
            this.startVoiceChatBtn.disabled = this.isConnected;
            this.endVoiceChatBtn.disabled = !this.isConnected;
        }

        // Transcript methods
        showTranscript() {
            this.transcriptSection.style.display = 'block';
        }

        hideTranscript() {
            this.transcriptSection.style.display = 'none';
        }

        addToTranscript(speaker, text, timestamp, final=false) {
            // Normalize
            let normalized = (text || '').replace(/\s+/g, ' ').trim();
            if (!normalized) return; // ignore empty

            // Filter tool-call artifacts like: drug_interaction>{"drug1": ...}
            const looksLikeToolCall = /[a-z_]+\s*>?\s*\{[^]*\}$/i.test(normalized)
                || /"drug\d"\s*:\s*"/i.test(normalized)
                || /^\{[^]*\}$/.test(normalized);
            if (looksLikeToolCall) return;

            // Map agent label to KIARA for display
            const displaySpeaker = speaker === 'AGENT' ? 'KIARA' : speaker;

            // De-duplicate: if last entry is same speaker and same text (case-insensitive), update timestamp only
            const last = this.transcript[this.transcript.length - 1];
            if (last && last.speaker === displaySpeaker && last.text.trim().toLowerCase() === normalized.toLowerCase()) {
                last.timestamp = timestamp || new Date().toLocaleTimeString();
                // Prefer marking final if either side is final
                last.final = last.final || final;
                this.renderTranscript();
                return;
            }

            const entry = {
                speaker: displaySpeaker,
                text: normalized,
                timestamp: timestamp || new Date().toLocaleTimeString(),
                final: final
            };
            this.transcript.push(entry);
            this.renderTranscript();
        }

        renderTranscript() {
            if (this.transcript.length === 0) {
                this.transcriptContainer.innerHTML = '<div class="text-muted text-center">Conversation will appear here...</div>';
                return;
            }

            let html = '';
            this.transcript.forEach(entry => {
                const speakerClass = entry.speaker === 'USER' ? 'text-primary' : 'text-success';
                const speakerIcon = entry.speaker === 'USER' ? 'fas fa-user' : 'fas fa-robot';
                html += `
                    <div class="mb-2">
                        <small class="text-muted">[${entry.timestamp}]</small>
                        <span class="${speakerClass}">
                            <i class="${speakerIcon}"></i> <strong>${entry.speaker}:</strong>
                        </span>
                        <span>${entry.text}</span>
                    </div>
                `;
            });
            this.transcriptContainer.innerHTML = html;
            
            // Auto-scroll to bottom
            this.transcriptContainer.scrollTop = this.transcriptContainer.scrollHeight;
        }

        clearTranscript() {
            this.transcript = [];
            this.renderTranscript();
        }

        copyTranscript() {
            if (this.transcript.length === 0) {
                alert('No transcript to copy');
                return;
            }

            let text = 'Voice Chat Transcript\n';
            text += '='.repeat(50) + '\n\n';
            
            this.transcript.forEach(entry => {
                text += `[${entry.timestamp}] ${entry.speaker}: ${entry.text}\n`;
            });

            navigator.clipboard.writeText(text).then(() => {
                alert('Transcript copied to clipboard!');
            }).catch(() => {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Transcript copied to clipboard!');
            });
        }

        // USER live transcription using Web Speech API (Chrome/Edge)
        startUserTranscription() {
            if (!this.SpeechRecognition) {
                console.warn('[VoiceChat] Web Speech API not supported, skipping local transcription');
                return;
            }
            if (this.recognition) {
                try { this.recognition.stop(); } catch (e) {}
                this.recognition = null;
            }
            const recognition = new this.SpeechRecognition();
            recognition.lang = 'en-US';
            recognition.continuous = true;
            recognition.interimResults = true;

            recognition.onresult = (event) => {
                let interim = '';
                let finalText = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    const res = event.results[i];
                    if (res.isFinal) {
                        finalText += res[0].transcript.trim() + ' ';
                    } else {
                        interim += res[0].transcript;
                    }
                }
                if (interim) {
                    // merge/update partial line
                    const last = this.transcript[this.transcript.length - 1];
                    const ts = new Date().toLocaleTimeString();
                    if (last && last.speaker === 'USER' && last.final === false) {
                        last.text = interim;
                        last.timestamp = ts;
                        this.renderTranscript();
                    } else {
                        this.addToTranscript('USER', interim, ts, false);
                    }
                }
                if (finalText) {
                    const last = this.transcript[this.transcript.length - 1];
                    const tsf = new Date().toLocaleTimeString();
                    if (last && last.speaker === 'USER' && last.final === false) {
                        last.text = finalText.trim();
                        last.timestamp = tsf;
                        last.final = true;
                        this.renderTranscript();
                    } else {
                        this.addToTranscript('USER', finalText.trim(), tsf, true);
                    }
                }
            };
            recognition.onerror = (e) => {
                console.warn('[VoiceChat] recognition error', e);
            };
            recognition.onend = () => {
                if (this.isConnected) {
                    // auto-restart for continuous captions
                    try { recognition.start(); } catch (e) {}
                }
            };
            try {
                recognition.start();
                this.recognition = recognition;
                this.isRecognizing = true;
                console.log('[VoiceChat] local transcription started');
            } catch (e) {
                console.warn('[VoiceChat] failed to start recognition', e);
            }
        }

        stopUserTranscription() {
            if (this.recognition) {
                try { this.recognition.onend = null; this.recognition.stop(); } catch (e) {}
                this.recognition = null;
                this.isRecognizing = false;
            }
        }
    }

    // Initialize voice chat agent when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Wait a bit for scripts to load
        setTimeout(function() {
            // Check if LiveKit is loaded
            if (typeof LiveKit === 'undefined') {
                console.error('LiveKit SDK not loaded! Trying fallback...');
                
                // Try to load from CDN as fallback
                const script = document.createElement('script');
                script.src = 'https://unpkg.com/livekit-client@latest/dist/livekit-client.umd.js';
                script.onload = function() {
                    // Create alias if CDN exposes LivekitClient
                    if (typeof window.LiveKit === 'undefined' && typeof window.LivekitClient !== 'undefined') {
                        window.LiveKit = window.LivekitClient;
                    }
                    console.log('LiveKit SDK loaded from fallback CDN');
                    window.contactVoiceChatAgent = new ContactVoiceChatAgent();
                    // Auto-start voice chat after initialization
                    setTimeout(() => {
                        window.contactVoiceChatAgent.startVoiceChat(true);
                    }, 500);
                };
                script.onerror = function() {
                    console.error('All LiveKit CDN sources failed');
                    alert('LiveKit SDK failed to load from all sources. Please check your internet connection and refresh the page.');
                };
                document.head.appendChild(script);
                return;
            }
            
            console.log('LiveKit SDK loaded successfully');
            window.contactVoiceChatAgent = new ContactVoiceChatAgent();
            
            // Auto-start voice chat after initialization
            setTimeout(() => {
                console.log('[VoiceChat] Auto-starting voice chat...');
                window.contactVoiceChatAgent.startVoiceChat(true);
            }, 500);
        }, 1000); // Wait 1 second for scripts to load
    });
</script>

</body>
</html>