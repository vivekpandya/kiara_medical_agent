# LiveKit Agent Implementation

This document describes the complete LiveKit agent implementation for the Adult Foster Care Pro application.

## Overview

The LiveKit agent provides comprehensive video conferencing capabilities including:
- Real-time video and audio communication
- Screen sharing
- Chat functionality
- Participant management
- Room management
- Data transmission

## Architecture

### Backend Components

1. **Controller**: `app/Controllers/LivekitAgent.php`
   - Handles API endpoints for LiveKit operations
   - Manages room creation, participant management, and data transmission
   - Provides token generation for secure access

2. **Model**: `app/Models/LivekitAgent_model.php`
   - Database operations for room management
   - Participant tracking and statistics
   - Room metadata management

3. **Configuration**: `app/Config/Livekit.php`
   - LiveKit server configuration
   - API credentials and settings
   - Feature toggles and performance settings

4. **Database Migration**: `app/Database/Migrations/2024-01-01-000000_CreateLivekitRoomsTable.php`
   - Creates the `livekit_rooms` table
   - Stores room information and participant data

### Frontend Components

1. **Main Agent View**: `app/Views/livekit/agent.php`
   - Complete video conferencing interface
   - Real-time participant management
   - Chat functionality
   - Media controls

2. **Dashboard View**: `app/Views/livekit/dashboard.php`
   - Room management interface
   - Statistics and monitoring
   - Room creation and deletion

3. **JavaScript Client**: `assets/js/livekit/`
   - `agent.js`: Core LiveKit client functionality
   - `utils.js`: Utility functions and helpers
   - `agent-implementation.js`: Complete agent implementation

## Features

### Core Functionality

- **Room Management**
  - Create, join, and leave rooms
  - Room listing and statistics
  - Room deletion and cleanup

- **Participant Management**
  - Real-time participant tracking
  - Mute/unmute participants
  - Disconnect participants
  - Participant status monitoring

- **Media Controls**
  - Camera on/off
  - Microphone mute/unmute
  - Screen sharing
  - Audio/video quality controls

- **Communication**
  - Real-time chat
  - Data transmission
  - File sharing capabilities

### Advanced Features

- **Adaptive Streaming**: Automatic quality adjustment based on network conditions
- **Dynacast**: Dynamic track subscription for optimal performance
- **Encryption**: End-to-end encryption for secure communication
- **Recording**: Room recording capabilities
- **Egress**: Live streaming to external platforms

## Installation

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure LiveKit Server

Update `app/Config/Livekit.php` with your LiveKit server details:

```php
public string $serverUrl = 'wss://your-livekit-server.com';
public string $apiKey = 'your-api-key';
public string $apiSecret = 'your-api-secret';
```

### 3. Run Database Migration

```bash
php spark migrate
```

### 4. Include JavaScript Libraries

Add to your HTML templates:

```html
<script src="https://unpkg.com/livekit-client@latest/dist/livekit-client.umd.js"></script>
<script src="<?= base_url('assets/js/livekit/agent.js') ?>"></script>
<script src="<?= base_url('assets/js/livekit/utils.js') ?>"></script>
<script src="<?= base_url('assets/js/livekit/agent-implementation.js') ?>"></script>
```

## Usage

### Basic Implementation

```javascript
// Initialize the agent
const agent = new LiveKitAgentImplementation({
    serverUrl: 'wss://your-livekit-server.com',
    enableLogging: true
});

// Join a room
await agent.joinRoom('room-name', 'participant-name');

// Toggle microphone
await agent.toggleMicrophone();

// Send chat message
await agent.sendChatMessage('room-name', 'Hello, world!');
```

### Advanced Usage

```javascript
// Create a room
const room = await agent.createRoom({
    room_name: 'my-room',
    max_participants: 10,
    metadata: { description: 'My custom room' }
});

// Get room participants
const participants = await agent.getRoomParticipants('my-room');

// Mute a participant
await agent.muteParticipant('my-room', 'participant-id', 'track-id', true);

// Send data to specific participants
await agent.sendDataToRoom('my-room', 'custom-data', ['participant-1', 'participant-2']);
```

## API Endpoints

### Room Management

- `GET /livekit/` - Main agent interface
- `GET /livekit/dashboard` - Room management dashboard
- `POST /livekit/createRoom` - Create a new room
- `GET /livekit/listRooms` - List all rooms
- `POST /livekit/deleteRoom` - Delete a room

### Participant Management

- `GET /livekit/getParticipants` - Get room participants
- `POST /livekit/muteParticipant` - Mute/unmute participant
- `POST /livekit/disconnectParticipant` - Disconnect participant

### Communication

- `POST /livekit/generateToken` - Generate access token
- `POST /livekit/sendData` - Send data to room

## Configuration Options

### Server Configuration

```php
// app/Config/Livekit.php
public string $serverUrl = 'wss://your-livekit-server.com';
public string $apiKey = 'your-api-key';
public string $apiSecret = 'your-api-secret';
public int $defaultMaxParticipants = 10;
public int $defaultEmptyTimeout = 300;
public bool $enableEncryption = true;
```

### Client Configuration

```javascript
const config = {
    serverUrl: 'wss://your-livekit-server.com',
    enableLogging: true,
    enableAdaptiveStream: true,
    enableDynacast: true
};
```

## Security

### Authentication

- Access tokens are generated server-side
- Tokens include participant identity and permissions
- Tokens have configurable expiration times

### Permissions

- Room join permissions
- Publish permissions (audio/video)
- Subscribe permissions
- Data publish permissions

### Encryption

- End-to-end encryption for all media
- Secure data transmission
- Encrypted signaling

## Performance Optimization

### Adaptive Streaming

- Automatic quality adjustment
- Network condition monitoring
- Bandwidth optimization

### Dynacast

- Dynamic track subscription
- Reduced bandwidth usage
- Improved performance

### Resource Management

- Automatic cleanup of disconnected participants
- Room timeout management
- Memory optimization

## Troubleshooting

### Common Issues

1. **Connection Failed**
   - Check server URL and credentials
   - Verify network connectivity
   - Check firewall settings

2. **Audio/Video Issues**
   - Check browser permissions
   - Verify device access
   - Test with different browsers

3. **Token Errors**
   - Verify API credentials
   - Check token expiration
   - Validate room permissions

### Debug Mode

Enable logging for troubleshooting:

```javascript
const agent = new LiveKitAgentImplementation({
    enableLogging: true
});
```

## Browser Support

| Browser | Desktop | Mobile |
|---------|---------|--------|
| Chrome | ✅ | ✅ |
| Firefox | ✅ | ✅ |
| Safari | ✅ | ✅ |
| Edge | ✅ | ❌ |

## Dependencies

### PHP Dependencies

- `livekit/livekit-server-sdk-php`: LiveKit server SDK
- `codeigniter4/framework`: CodeIgniter 4 framework
- `guzzlehttp/guzzle`: HTTP client

### JavaScript Dependencies

- `livekit-client`: LiveKit client SDK
- Bootstrap 5: UI framework
- Font Awesome: Icons

## License

This implementation is part of the Adult Foster Care Pro application and follows the same licensing terms.

## Support

For technical support and questions:
- Check the LiveKit documentation: https://docs.livekit.io
- Review the implementation code
- Contact the development team
