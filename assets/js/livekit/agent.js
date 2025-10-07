/**
 * LiveKit Agent JavaScript Client
 * Provides comprehensive LiveKit functionality for video conferencing
 */

class LiveKitAgentClient {
    constructor(config = {}) {
        this.config = {
            serverUrl: config.serverUrl || 'wss://your-livekit-server.com',
            apiKey: config.apiKey || '',
            apiSecret: config.apiSecret || '',
            defaultRoom: config.defaultRoom || 'default-room',
            defaultParticipant: config.defaultParticipant || 'user',
            enableLogging: config.enableLogging || false,
            ...config
        };
        
        this.room = null;
        this.localParticipant = null;
        this.remoteParticipants = new Map();
        this.isConnected = false;
        this.isMuted = false;
        this.isCameraOn = true;
        this.isScreenSharing = false;
        this.eventListeners = new Map();
        
        this.initializeLiveKit();
    }
    
    /**
     * Initialize LiveKit SDK
     */
    initializeLiveKit() {
        if (typeof LiveKit === 'undefined') {
            console.error('LiveKit SDK not loaded. Please include the LiveKit client library.');
            return;
        }
        
        this.log('LiveKit Agent Client initialized');
    }
    
    /**
     * Connect to a LiveKit room
     */
    async connectToRoom(roomName, participantName, participantIdentity = null) {
        try {
            this.log(`Connecting to room: ${roomName}`);
            
            // Get access token from server
            const token = await this.getAccessToken(roomName, participantName, participantIdentity);
            
            // Create room instance
            this.room = new LiveKit.Room();
            
            // Set up event listeners
            this.setupRoomEventListeners();
            
            // Connect to room
            await this.room.connect(this.config.serverUrl, token);
            
            this.localParticipant = this.room.localParticipant;
            this.isConnected = true;
            
            this.emit('connected', { room: this.room, participant: this.localParticipant });
            this.log('Successfully connected to room');
            
            return this.room;
            
        } catch (error) {
            this.log('Failed to connect to room:', error);
            this.emit('error', { type: 'connection', error });
            throw error;
        }
    }
    
    /**
     * Disconnect from the current room
     */
    async disconnect() {
        if (!this.room) return;
        
        try {
            await this.room.disconnect();
            this.cleanup();
            this.emit('disconnected');
            this.log('Disconnected from room');
        } catch (error) {
            this.log('Error during disconnect:', error);
            this.emit('error', { type: 'disconnect', error });
        }
    }
    
    /**
     * Enable/disable microphone
     */
    async setMicrophoneEnabled(enabled) {
        if (!this.room) return;
        
        try {
            await this.room.localParticipant.setMicrophoneEnabled(enabled);
            this.isMuted = !enabled;
            this.emit('microphoneToggled', { enabled });
            this.log(`Microphone ${enabled ? 'enabled' : 'disabled'}`);
        } catch (error) {
            this.log('Failed to toggle microphone:', error);
            this.emit('error', { type: 'microphone', error });
        }
    }
    
    /**
     * Enable/disable camera
     */
    async setCameraEnabled(enabled) {
        if (!this.room) return;
        
        try {
            await this.room.localParticipant.setCameraEnabled(enabled);
            this.isCameraOn = enabled;
            this.emit('cameraToggled', { enabled });
            this.log(`Camera ${enabled ? 'enabled' : 'disabled'}`);
        } catch (error) {
            this.log('Failed to toggle camera:', error);
            this.emit('error', { type: 'camera', error });
        }
    }
    
    /**
     * Start/stop screen sharing
     */
    async setScreenShareEnabled(enabled) {
        if (!this.room) return;
        
        try {
            await this.room.localParticipant.setScreenShareEnabled(enabled);
            this.isScreenSharing = enabled;
            this.emit('screenShareToggled', { enabled });
            this.log(`Screen share ${enabled ? 'started' : 'stopped'}`);
        } catch (error) {
            this.log('Failed to toggle screen share:', error);
            this.emit('error', { type: 'screenShare', error });
        }
    }
    
    /**
     * Send data to room participants
     */
    async sendData(data, kind = 'reliable', destinationIdentities = []) {
        if (!this.room) return;
        
        try {
            const payload = typeof data === 'string' ? new TextEncoder().encode(data) : data;
            await this.room.localParticipant.publishData(payload, kind, destinationIdentities);
            this.emit('dataSent', { data, kind, destinationIdentities });
            this.log('Data sent to room');
        } catch (error) {
            this.log('Failed to send data:', error);
            this.emit('error', { type: 'dataSend', error });
        }
    }
    
    /**
     * Send chat message
     */
    async sendChatMessage(message, recipientIdentity = null) {
        const chatData = {
            type: 'chat',
            message: message,
            timestamp: new Date().toISOString(),
            sender: this.localParticipant?.identity
        };
        
        const destinations = recipientIdentity ? [recipientIdentity] : [];
        await this.sendData(JSON.stringify(chatData), 'reliable', destinations);
    }
    
    /**
     * Mute/unmute a specific participant
     */
    async muteParticipant(participantIdentity, trackSid, muted = true) {
        if (!this.room) return;
        
        try {
            // This would typically be done through server-side API
            this.log(`Muting participant: ${participantIdentity}`);
            this.emit('participantMuted', { participantIdentity, muted });
        } catch (error) {
            this.log('Failed to mute participant:', error);
            this.emit('error', { type: 'participantMute', error });
        }
    }
    
    /**
     * Disconnect a specific participant
     */
    async disconnectParticipant(participantIdentity) {
        if (!this.room) return;
        
        try {
            // This would typically be done through server-side API
            this.log(`Disconnecting participant: ${participantIdentity}`);
            this.emit('participantDisconnected', { participantIdentity });
        } catch (error) {
            this.log('Failed to disconnect participant:', error);
            this.emit('error', { type: 'participantDisconnect', error });
        }
    }
    
    /**
     * Get room information
     */
    getRoomInfo() {
        if (!this.room) return null;
        
        return {
            name: this.room.name,
            sid: this.room.sid,
            participants: Array.from(this.remoteParticipants.values()).map(p => ({
                identity: p.identity,
                name: p.name,
                state: p.state,
                isSpeaking: p.isSpeaking,
                isMuted: p.isMuted
            })),
            localParticipant: {
                identity: this.localParticipant?.identity,
                name: this.localParticipant?.name,
                isMuted: this.isMuted,
                isCameraOn: this.isCameraOn,
                isScreenSharing: this.isScreenSharing
            }
        };
    }
    
    /**
     * Set up room event listeners
     */
    setupRoomEventListeners() {
        if (!this.room) return;
        
        this.room.on('participantConnected', (participant) => {
            this.remoteParticipants.set(participant.identity, participant);
            this.emit('participantConnected', participant);
            this.log(`Participant connected: ${participant.identity}`);
        });
        
        this.room.on('participantDisconnected', (participant) => {
            this.remoteParticipants.delete(participant.identity);
            this.emit('participantDisconnected', participant);
            this.log(`Participant disconnected: ${participant.identity}`);
        });
        
        this.room.on('trackSubscribed', (track, publication, participant) => {
            this.emit('trackSubscribed', { track, publication, participant });
            this.log(`Track subscribed: ${track.kind} from ${participant.identity}`);
        });
        
        this.room.on('trackUnsubscribed', (track, publication, participant) => {
            this.emit('trackUnsubscribed', { track, publication, participant });
            this.log(`Track unsubscribed: ${track.kind} from ${participant.identity}`);
        });
        
        this.room.on('dataReceived', (payload, participant) => {
            this.emit('dataReceived', { payload, participant });
            this.log(`Data received from ${participant.identity}`);
        });
        
        this.room.on('disconnected', () => {
            this.cleanup();
            this.emit('disconnected');
            this.log('Room disconnected');
        });
        
        this.room.on('reconnecting', () => {
            this.emit('reconnecting');
            this.log('Reconnecting to room...');
        });
        
        this.room.on('reconnected', () => {
            this.emit('reconnected');
            this.log('Reconnected to room');
        });
    }
    
    /**
     * Get access token from server
     */
    async getAccessToken(roomName, participantName, participantIdentity) {
        const response = await fetch('/livekit/generateToken', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                room_name: roomName,
                participant_name: participantName,
                participant_identity: participantIdentity || `user-${Date.now()}`
            })
        });
        
        const data = await response.json();
        
        if (!data.success) {
            throw new Error(data.error || 'Failed to generate access token');
        }
        
        return data.token;
    }
    
    /**
     * Clean up resources
     */
    cleanup() {
        this.room = null;
        this.localParticipant = null;
        this.remoteParticipants.clear();
        this.isConnected = false;
    }
    
    /**
     * Add event listener
     */
    on(event, callback) {
        if (!this.eventListeners.has(event)) {
            this.eventListeners.set(event, []);
        }
        this.eventListeners.get(event).push(callback);
    }
    
    /**
     * Remove event listener
     */
    off(event, callback) {
        if (!this.eventListeners.has(event)) return;
        
        const listeners = this.eventListeners.get(event);
        const index = listeners.indexOf(callback);
        if (index > -1) {
            listeners.splice(index, 1);
        }
    }
    
    /**
     * Emit event
     */
    emit(event, data = {}) {
        if (!this.eventListeners.has(event)) return;
        
        this.eventListeners.get(event).forEach(callback => {
            try {
                callback(data);
            } catch (error) {
                this.log(`Error in event listener for ${event}:`, error);
            }
        });
    }
    
    /**
     * Log message
     */
    log(message, ...args) {
        if (this.config.enableLogging) {
            console.log(`[LiveKit Agent] ${message}`, ...args);
        }
    }
    
    /**
     * Get connection status
     */
    getConnectionStatus() {
        return {
            isConnected: this.isConnected,
            isMuted: this.isMuted,
            isCameraOn: this.isCameraOn,
            isScreenSharing: this.isScreenSharing,
            participantCount: this.remoteParticipants.size + (this.isConnected ? 1 : 0)
        };
    }
}

// Export for use in modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = LiveKitAgentClient;
}

// Make available globally
window.LiveKitAgentClient = LiveKitAgentClient;
