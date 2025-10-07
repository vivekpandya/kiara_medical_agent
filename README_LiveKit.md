# LiveKit Agent Implementation

A complete LiveKit video conferencing solution integrated into your Adult Foster Care Pro application.

## 🚀 Quick Start

### 1. Start LiveKit Server

**Option A: Using Docker (Recommended)**
```bash
# Start LiveKit server
docker-compose up -d

# Or use the batch file on Windows
start-livekit.bat
```

**Option B: Manual Setup**
```bash
# Download and run LiveKit server
docker run --rm -p 7880:7880 -p 7881:7881/udp livekit/livekit-server:latest
```

### 2. Start Your Application

```bash
# Start CodeIgniter development server
php spark serve --host=localhost --port=8080
```

### 3. Access the LiveKit Agent

- **Main Interface**: http://localhost:8080/livekit/
- **Dashboard**: http://localhost:8080/livekit/dashboard
- **Test Page**: http://localhost:8080/livekit/test

## 🏗️ Architecture

### Backend (PHP)
- **Controller**: `app/Controllers/LivekitAgent.php` - API endpoints
- **Model**: `app/Models/LivekitAgent_model.php` - Database operations
- **Config**: `app/Config/Livekit.php` - Server configuration
- **Routes**: LiveKit routes in `app/Config/Routes.php`

### Frontend (JavaScript)
- **Main Client**: `assets/js/livekit/agent.js` - Core LiveKit client
- **Utilities**: `assets/js/livekit/utils.js` - Helper functions
- **Implementation**: `assets/js/livekit/agent-implementation.js` - Complete agent
- **Views**: `app/Views/livekit/` - User interfaces

## 🔧 Configuration

### LiveKit Server Configuration

Update `app/Config/Livekit.php`:

```php
public string $serverUrl = 'ws://localhost:7880';
public string $apiKey = 'devkey';
public string $apiSecret = 'secret';
```

### For Production

```php
public string $serverUrl = 'wss://your-livekit-server.com';
public string $apiKey = 'your-production-api-key';
public string $apiSecret = 'your-production-api-secret';
```

## 📱 Features

### Core Functionality
- ✅ **Real-time Video/Audio**: High-quality video conferencing
- ✅ **Screen Sharing**: Share your screen with participants
- ✅ **Chat System**: Real-time messaging
- ✅ **Participant Management**: Mute, unmute, disconnect participants
- ✅ **Room Management**: Create, join, leave, delete rooms

### Advanced Features
- ✅ **Adaptive Streaming**: Automatic quality adjustment
- ✅ **Dynacast**: Dynamic track subscription
- ✅ **Encryption**: End-to-end encryption
- ✅ **Mobile Support**: Works on mobile devices
- ✅ **Cross-browser**: Chrome, Firefox, Safari, Edge

## 🛠️ Development

### File Structure
```
app/
├── Controllers/LivekitAgent.php          # Main controller
├── Models/LivekitAgent_model.php         # Database model
├── Config/Livekit.php                    # Configuration
├── Views/livekit/                        # User interfaces
│   ├── agent.php                        # Main video interface
│   ├── dashboard.php                    # Room management
│   └── test.php                         # Testing interface
└── Database/Migrations/                 # Database migrations

assets/js/livekit/                        # JavaScript client
├── agent.js                             # Core client
├── utils.js                             # Utilities
└── agent-implementation.js              # Complete implementation

docs/                                    # Documentation
├── LiveKit_Agent_Implementation.md     # Implementation guide
└── LiveKit_Server_Setup.md             # Server setup guide
```

### API Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/livekit/` | GET | Main agent interface |
| `/livekit/dashboard` | GET | Room management dashboard |
| `/livekit/test` | GET | Testing interface |
| `/livekit/generateToken` | POST | Generate access token |
| `/livekit/createRoom` | POST | Create new room |
| `/livekit/listRooms` | GET | List all rooms |
| `/livekit/deleteRoom` | POST | Delete room |
| `/livekit/getParticipants` | GET | Get room participants |
| `/livekit/muteParticipant` | POST | Mute/unmute participant |
| `/livekit/disconnectParticipant` | POST | Disconnect participant |
| `/livekit/sendData` | POST | Send data to room |

## 🧪 Testing

### 1. Test the Implementation
Visit: http://localhost:8080/livekit/test

### 2. Test Video Conferencing
1. Open two browser windows
2. Go to http://localhost:8080/livekit/
3. Join the same room from both windows
4. Test video, audio, and chat

### 3. Test Room Management
Visit: http://localhost:8080/livekit/dashboard

## 🔒 Security

### Authentication
- Token-based authentication
- Configurable token expiration
- Secure API key management

### Permissions
- Room join permissions
- Publish permissions (audio/video)
- Subscribe permissions
- Data publish permissions

### Encryption
- End-to-end encryption for media
- Secure data transmission
- Encrypted signaling

## 🚀 Deployment

### Development
1. Start LiveKit server: `docker-compose up -d`
2. Start application: `php spark serve`
3. Access: http://localhost:8080/livekit/

### Production
1. Set up LiveKit server with HTTPS
2. Configure production API keys
3. Set up TURN servers for better connectivity
4. Use Redis for session storage
5. Configure proper logging and monitoring

## 🐛 Troubleshooting

### Common Issues

1. **"Class not found" Error**
   - Run: `composer install`
   - Check if LiveKit SDK is installed

2. **Connection Failed**
   - Check if LiveKit server is running
   - Verify server URL in configuration

3. **Token Errors**
   - Verify API key and secret
   - Check token generation endpoint

4. **Media Issues**
   - Check browser permissions
   - Verify HTTPS in production
   - Check WebRTC support

### Browser Support
- Chrome (recommended)
- Firefox
- Safari
- Edge

### Network Requirements
- WebRTC requires HTTPS in production
- STUN servers for NAT traversal
- TURN servers for restrictive networks

## 📚 Documentation

- [LiveKit Documentation](https://docs.livekit.io/)
- [JavaScript SDK](https://github.com/livekit/client-sdk-js)
- [PHP SDK](https://github.com/agence104/livekit-server-sdk)
- [Implementation Guide](docs/LiveKit_Agent_Implementation.md)
- [Server Setup Guide](docs/LiveKit_Server_Setup.md)

## 🤝 Support

For technical support:
1. Check the troubleshooting section
2. Review the documentation
3. Check LiveKit community forums
4. Contact the development team

## 📄 License

This implementation is part of the Adult Foster Care Pro application and follows the same licensing terms.
