/**
 * LiveKit Agent Implementation
 * Complete implementation of LiveKit agent functionality
 */

class LiveKitAgentImplementation {
    constructor(config = {}) {
        this.config = {
            serverUrl: config.serverUrl || 'wss://your-livekit-server.com',
            apiKey: config.apiKey || '',
            apiSecret: config.apiSecret || '',
            enableLogging: config.enableLogging || false,
            enableAdaptiveStream: config.enableAdaptiveStream || true,
            enableDynacast: config.enableDynacast || true,
            ...config
        };
        
        this.agent = new LiveKitAgentClient(this.config);
        this.utils = LiveKitUtils;
        this.rooms = new Map();
        this.participants = new Map();
        this.tracks = new Map();
        this.isInitialized = false;
        
        this.initialize();
    }
    
    /**
     * Initialize the agent
     */
    async initialize() {
        try {
            // Check browser support
            if (!this.utils.isBrowserSupported()) {
                throw new Error('Browser not supported for LiveKit');
            }
            
            // Set up global event listeners
            this.setupGlobalEventListeners();
            
            this.isInitialized = true;
            this.log('LiveKit Agent Implementation initialized');
            
        } catch (error) {
            this.log('Failed to initialize agent:', error);
            throw error;
        }
    }
    
    /**
     * Create a new room
     */
    async createRoom(roomData) {
        try {
            const response = await fetch('/livekit/createRoom', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(roomData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.rooms.set(data.room.name, data.room);
                this.emit('roomCreated', data.room);
                this.log('Room created:', data.room.name);
                return data.room;
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to create room:', error);
            throw error;
        }
    }
    
    /**
     * Join a room
     */
    async joinRoom(roomName, participantName, participantIdentity = null) {
        try {
            const room = await this.agent.connectToRoom(roomName, participantName, participantIdentity);
            this.rooms.set(roomName, room);
            this.log('Joined room:', roomName);
            return room;
        } catch (error) {
            this.log('Failed to join room:', error);
            throw error;
        }
    }
    
    /**
     * Leave a room
     */
    async leaveRoom(roomName) {
        try {
            if (this.rooms.has(roomName)) {
                await this.agent.disconnect();
                this.rooms.delete(roomName);
                this.log('Left room:', roomName);
            }
        } catch (error) {
            this.log('Failed to leave room:', error);
            throw error;
        }
    }
    
    /**
     * List all rooms
     */
    async listRooms() {
        try {
            const response = await fetch('/livekit/listRooms');
            const data = await response.json();
            
            if (data.success) {
                this.log('Rooms listed:', data.rooms.length);
                return data.rooms;
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to list rooms:', error);
            throw error;
        }
    }
    
    /**
     * Delete a room
     */
    async deleteRoom(roomName) {
        try {
            const response = await fetch('/livekit/deleteRoom', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ room_name: roomName })
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.rooms.delete(roomName);
                this.emit('roomDeleted', { roomName });
                this.log('Room deleted:', roomName);
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to delete room:', error);
            throw error;
        }
    }
    
    /**
     * Get room participants
     */
    async getRoomParticipants(roomName) {
        try {
            const response = await fetch(`/livekit/getParticipants?room_name=${encodeURIComponent(roomName)}`);
            const data = await response.json();
            
            if (data.success) {
                this.log('Participants retrieved:', data.participants.length);
                return data.participants;
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to get participants:', error);
            throw error;
        }
    }
    
    /**
     * Mute a participant
     */
    async muteParticipant(roomName, participantIdentity, trackSid, muted = true) {
        try {
            const response = await fetch('/livekit/muteParticipant', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    room_name: roomName,
                    participant_identity: participantIdentity,
                    track_sid: trackSid,
                    muted: muted
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.log(`Participant ${muted ? 'muted' : 'unmuted'}:`, participantIdentity);
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to mute participant:', error);
            throw error;
        }
    }
    
    /**
     * Disconnect a participant
     */
    async disconnectParticipant(roomName, participantIdentity) {
        try {
            const response = await fetch('/livekit/disconnectParticipant', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    room_name: roomName,
                    participant_identity: participantIdentity
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.log('Participant disconnected:', participantIdentity);
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to disconnect participant:', error);
            throw error;
        }
    }
    
    /**
     * Send data to room
     */
    async sendDataToRoom(roomName, data, participantIdentities = []) {
        try {
            const response = await fetch('/livekit/sendData', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    room_name: roomName,
                    data: data,
                    participant_identities: participantIdentities
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.log('Data sent to room:', roomName);
            } else {
                throw new Error(data.error);
            }
        } catch (error) {
            this.log('Failed to send data:', error);
            throw error;
        }
    }
    
    /**
     * Send chat message
     */
    async sendChatMessage(roomName, message, recipientIdentity = null) {
        try {
            await this.agent.sendChatMessage(message, recipientIdentity);
            this.log('Chat message sent:', message);
        } catch (error) {
            this.log('Failed to send chat message:', error);
            throw error;
        }
    }
    
    /**
     * Toggle microphone
     */
    async toggleMicrophone(enabled = null) {
        try {
            const newState = enabled !== null ? enabled : !this.agent.isMuted;
            await this.agent.setMicrophoneEnabled(newState);
            this.log(`Microphone ${newState ? 'enabled' : 'disabled'}`);
        } catch (error) {
            this.log('Failed to toggle microphone:', error);
            throw error;
        }
    }
    
    /**
     * Toggle camera
     */
    async toggleCamera(enabled = null) {
        try {
            const newState = enabled !== null ? enabled : !this.agent.isCameraOn;
            await this.agent.setCameraEnabled(newState);
            this.log(`Camera ${newState ? 'enabled' : 'disabled'}`);
        } catch (error) {
            this.log('Failed to toggle camera:', error);
            throw error;
        }
    }
    
    /**
     * Toggle screen sharing
     */
    async toggleScreenShare(enabled = null) {
        try {
            const newState = enabled !== null ? enabled : !this.agent.isScreenSharing;
            await this.agent.setScreenShareEnabled(newState);
            this.log(`Screen share ${newState ? 'enabled' : 'disabled'}`);
        } catch (error) {
            this.log('Failed to toggle screen share:', error);
            throw error;
        }
    }
    
    /**
     * Get room information
     */
    getRoomInfo(roomName) {
        if (this.rooms.has(roomName)) {
            return this.agent.getRoomInfo();
        }
        return null;
    }
    
    /**
     * Get all rooms
     */
    getAllRooms() {
        return Array.from(this.rooms.values());
    }
    
    /**
     * Get connection status
     */
    getConnectionStatus() {
        return this.agent.getConnectionStatus();
    }
    
    /**
     * Set up global event listeners
     */
    setupGlobalEventListeners() {
        // Agent events
        this.agent.on('connected', (data) => {
            this.emit('roomConnected', data);
        });
        
        this.agent.on('disconnected', () => {
            this.emit('roomDisconnected');
        });
        
        this.agent.on('participantConnected', (participant) => {
            this.participants.set(participant.identity, participant);
            this.emit('participantConnected', participant);
        });
        
        this.agent.on('participantDisconnected', (participant) => {
            this.participants.delete(participant.identity);
            this.emit('participantDisconnected', participant);
        });
        
        this.agent.on('trackSubscribed', (data) => {
            this.tracks.set(data.track.sid, data.track);
            this.emit('trackSubscribed', data);
        });
        
        this.agent.on('trackUnsubscribed', (data) => {
            this.tracks.delete(data.track.sid);
            this.emit('trackUnsubscribed', data);
        });
        
        this.agent.on('dataReceived', (data) => {
            this.emit('dataReceived', data);
        });
        
        this.agent.on('error', (error) => {
            this.emit('error', error);
        });
    }
    
    /**
     * Add event listener
     */
    on(event, callback) {
        if (!this.eventListeners) {
            this.eventListeners = new Map();
        }
        
        if (!this.eventListeners.has(event)) {
            this.eventListeners.set(event, []);
        }
        
        this.eventListeners.get(event).push(callback);
    }
    
    /**
     * Remove event listener
     */
    off(event, callback) {
        if (!this.eventListeners || !this.eventListeners.has(event)) {
            return;
        }
        
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
        if (!this.eventListeners || !this.eventListeners.has(event)) {
            return;
        }
        
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
            console.log(`[LiveKit Agent Implementation] ${message}`, ...args);
        }
    }
    
    /**
     * Cleanup resources
     */
    async cleanup() {
        try {
            // Disconnect from all rooms
            for (const [roomName, room] of this.rooms) {
                await this.leaveRoom(roomName);
            }
            
            // Clear maps
            this.rooms.clear();
            this.participants.clear();
            this.tracks.clear();
            
            this.log('Cleanup completed');
        } catch (error) {
            this.log('Error during cleanup:', error);
        }
    }
}

// Export for use in modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = LiveKitAgentImplementation;
}

// Make available globally
window.LiveKitAgentImplementation = LiveKitAgentImplementation;
