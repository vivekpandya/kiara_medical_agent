/**
 * LiveKit Utility Functions
 * Helper functions for LiveKit operations
 */

class LiveKitUtils {
    /**
     * Format participant name for display
     */
    static formatParticipantName(participant) {
        return participant.name || participant.identity || 'Unknown';
    }
    
    /**
     * Get participant status color
     */
    static getParticipantStatusColor(participant) {
        switch (participant.state) {
            case 'connected':
                return '#28a745';
            case 'connecting':
                return '#ffc107';
            case 'disconnected':
                return '#dc3545';
            default:
                return '#6c757d';
        }
    }
    
    /**
     * Format time duration
     */
    static formatDuration(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const secs = seconds % 60;
        
        if (hours > 0) {
            return `${hours}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        } else {
            return `${minutes}:${secs.toString().padStart(2, '0')}`;
        }
    }
    
    /**
     * Format file size
     */
    static formatFileSize(bytes) {
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        if (bytes === 0) return '0 Bytes';
        const i = Math.floor(Math.log(bytes) / Math.log(1024));
        return Math.round(bytes / Math.pow(1024, i) * 100) / 100 + ' ' + sizes[i];
    }
    
    /**
     * Generate unique ID
     */
    static generateId() {
        return 'id-' + Math.random().toString(36).substr(2, 9);
    }
    
    /**
     * Validate room name
     */
    static validateRoomName(roomName) {
        if (!roomName || roomName.trim().length === 0) {
            return { valid: false, error: 'Room name is required' };
        }
        
        if (roomName.length > 255) {
            return { valid: false, error: 'Room name is too long' };
        }
        
        if (!/^[a-zA-Z0-9_-]+$/.test(roomName)) {
            return { valid: false, error: 'Room name contains invalid characters' };
        }
        
        return { valid: true };
    }
    
    /**
     * Validate participant name
     */
    static validateParticipantName(name) {
        if (!name || name.trim().length === 0) {
            return { valid: false, error: 'Participant name is required' };
        }
        
        if (name.length > 100) {
            return { valid: false, error: 'Participant name is too long' };
        }
        
        return { valid: true };
    }
    
    /**
     * Create video element
     */
    static createVideoElement(id, className = 'video-element') {
        const video = document.createElement('video');
        video.id = id;
        video.className = className;
        video.autoplay = true;
        video.muted = true;
        video.playsInline = true;
        return video;
    }
    
    /**
     * Create audio element
     */
    static createAudioElement(id, className = 'audio-element') {
        const audio = document.createElement('audio');
        audio.id = id;
        audio.className = className;
        audio.autoplay = true;
        audio.muted = true;
        return audio;
    }
    
    /**
     * Attach track to element
     */
    static attachTrack(track, element) {
        if (track && element) {
            track.attach(element);
        }
    }
    
    /**
     * Detach track from element
     */
    static detachTrack(track, element) {
        if (track && element) {
            track.detach(element);
        }
    }
    
    /**
     * Get track type display name
     */
    static getTrackTypeName(track) {
        switch (track.kind) {
            case 'video':
                return 'Video';
            case 'audio':
                return 'Audio';
            case 'data':
                return 'Data';
            default:
                return 'Unknown';
        }
    }
    
    /**
     * Get track source display name
     */
    static getTrackSourceName(track) {
        switch (track.source) {
            case 'camera':
                return 'Camera';
            case 'microphone':
                return 'Microphone';
            case 'screen_share':
                return 'Screen Share';
            case 'screen_share_audio':
                return 'Screen Share Audio';
            default:
                return 'Unknown';
        }
    }
    
    /**
     * Check if browser supports LiveKit
     */
    static isBrowserSupported() {
        if (typeof LiveKit === 'undefined') {
            return false;
        }
        
        return LiveKit.isBrowserSupported();
    }
    
    /**
     * Check if adaptive stream is supported
     */
    static supportsAdaptiveStream() {
        if (typeof LiveKit === 'undefined') {
            return false;
        }
        
        return LiveKit.supportsAdaptiveStream();
    }
    
    /**
     * Check if dynacast is supported
     */
    static supportsDynacast() {
        if (typeof LiveKit === 'undefined') {
            return false;
        }
        
        return LiveKit.supportsDynacast();
    }
    
    /**
     * Get browser information
     */
    static getBrowserInfo() {
        const ua = navigator.userAgent;
        const browsers = {
            chrome: /Chrome/.test(ua),
            firefox: /Firefox/.test(ua),
            safari: /Safari/.test(ua) && !/Chrome/.test(ua),
            edge: /Edg/.test(ua),
            opera: /Opera/.test(ua)
        };
        
        return {
            userAgent: ua,
            browsers: browsers,
            isMobile: /Mobile|Android|iPhone|iPad/.test(ua),
            isTablet: /iPad|Android/.test(ua)
        };
    }
    
    /**
     * Create room URL
     */
    static createRoomUrl(serverUrl, roomName, token) {
        return `${serverUrl}?room=${encodeURIComponent(roomName)}&token=${encodeURIComponent(token)}`;
    }
    
    /**
     * Parse room URL
     */
    static parseRoomUrl(url) {
        try {
            const urlObj = new URL(url);
            return {
                serverUrl: `${urlObj.protocol}//${urlObj.host}`,
                roomName: urlObj.searchParams.get('room'),
                token: urlObj.searchParams.get('token')
            };
        } catch (error) {
            return null;
        }
    }
    
    /**
     * Debounce function
     */
    static debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    /**
     * Throttle function
     */
    static throttle(func, limit) {
        let inThrottle;
        return function executedFunction(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }
    
    /**
     * Deep clone object
     */
    static deepClone(obj) {
        return JSON.parse(JSON.stringify(obj));
    }
    
    /**
     * Merge objects
     */
    static mergeObjects(...objects) {
        return Object.assign({}, ...objects);
    }
    
    /**
     * Check if object is empty
     */
    static isEmpty(obj) {
        return Object.keys(obj).length === 0;
    }
    
    /**
     * Get nested object value
     */
    static getNestedValue(obj, path, defaultValue = undefined) {
        return path.split('.').reduce((current, key) => {
            return current && current[key] !== undefined ? current[key] : defaultValue;
        }, obj);
    }
    
    /**
     * Set nested object value
     */
    static setNestedValue(obj, path, value) {
        const keys = path.split('.');
        const lastKey = keys.pop();
        const target = keys.reduce((current, key) => {
            if (!current[key] || typeof current[key] !== 'object') {
                current[key] = {};
            }
            return current[key];
        }, obj);
        target[lastKey] = value;
    }
    
    /**
     * Remove nested object value
     */
    static removeNestedValue(obj, path) {
        const keys = path.split('.');
        const lastKey = keys.pop();
        const target = keys.reduce((current, key) => {
            return current && current[key];
        }, obj);
        if (target && target[lastKey] !== undefined) {
            delete target[lastKey];
        }
    }
}

// Export for use in modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = LiveKitUtils;
}

// Make available globally
window.LiveKitUtils = LiveKitUtils;
