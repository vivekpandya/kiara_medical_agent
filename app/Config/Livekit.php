<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Livekit extends BaseConfig
{
    /**
     * LiveKit server URL
     */
//     LIVEKIT_URL=wss://medication-agent-kdt62ia5.livekit.cloud
// LIVEKIT_API_KEY=APIaN8NwqKKrvoR
// LIVEKIT_API_SECRET=DHkkWDHttSJdq4eWQxYlBUDqxda9sjfKTAEJ3pjKhze
// LIVEKIT_URL=wss://medagent-xm81kvm5.livekit.cloud
// LIVEKIT_API_KEY=APInbPKBeoh56hY
// LIVEKIT_API_SECRET=5t70D6UTeHcFCCGiNURCnkNtNYd1hHnjIj8FpPSkChK
    public string $serverUrl = 'wss://medication-agent-kdt62ia5.livekit.cloud';

    /**
     * LiveKit API Key
     */
    public string $apiKey = 'APIaN8NwqKKrvoR';

    /**
     * LiveKit API Secret
     */
    public string $apiSecret = 'DHkkWDHttSJdq4eWQxYlBUDqxda9sjfKTAEJ3pjKhze';

    /**
     * Default room settings
     */
    public int $defaultMaxParticipants = 10;
    public int $defaultEmptyTimeout = 300; // 5 minutes
    public int $defaultTokenTtl = 3600; // 1 hour

    /**
     * Agent settings
     */
    public bool $enableAgent = true;
    public string $agentIdentity = 'livekit-agent';
    public string $agentName = 'LiveKit Agent';

    /**
     * Webhook settings
     */
    public bool $enableWebhooks = true;
    public string $webhookUrl = '';

    /**
     * Recording settings
     */
    public bool $enableRecording = false;
    public string $recordingStorage = 'local'; // local, s3, gcs

    /**
     * Egress settings
     */
    public bool $enableEgress = false;
    public string $egressUrl = '';

    /**
     * Security settings
     */
    public bool $enableEncryption = true;
    public string $encryptionKey = '';

    /**
     * Performance settings
     */
    public int $maxBitrate = 1000000; // 1 Mbps
    public int $maxFramerate = 30;
    public string $videoCodec = 'h264';
    public string $audioCodec = 'opus';

    /**
     * Get server URL with protocol
     */
    public function getServerUrl(): string
    {
        return $this->serverUrl;
    }

    /**
     * Get API credentials
     */
    public function getApiCredentials(): array
    {
        return [
            'api_key' => $this->apiKey,
            'api_secret' => $this->apiSecret
        ];
    }

    /**
     * Check if agent is enabled
     */
    public function isAgentEnabled(): bool
    {
        return $this->enableAgent;
    }

    /**
     * Get agent identity
     */
    public function getAgentIdentity(): string
    {
        return $this->agentIdentity;
    }

    /**
     * Get agent name
     */
    public function getAgentName(): string
    {
        return $this->agentName;
    }
}
