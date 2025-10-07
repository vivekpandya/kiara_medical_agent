# LiveKit Server Setup Guide

This guide will help you set up a LiveKit server for development and testing.

## Quick Start with Docker

### 1. Install Docker

Make sure Docker is installed on your system.

### 2. Run LiveKit Server

```bash
# Create a directory for LiveKit configuration
mkdir livekit-server
cd livekit-server

# Create LiveKit configuration file
cat > livekit.yaml << EOF
port: 7880
rtc:
  udp_port: 7881
  use_external_ip: false
  stun_servers:
    - stun:stun.l.google.com:19302
keys:
  devkey: secret
redis: {}
log_level: info
EOF

# Run LiveKit server with Docker
docker run --rm \
  -p 7880:7880 \
  -p 7881:7881/udp \
  -p 7882:7882 \
  -v $(pwd)/livekit.yaml:/livekit.yaml \
  livekit/livekit-server:latest \
  --config /livekit.yaml
```

### 3. Alternative: Use LiveKit Cloud

For production, you can use LiveKit Cloud instead of self-hosting:

1. Sign up at [https://cloud.livekit.io](https://cloud.livekit.io)
2. Create a new project
3. Get your API key and secret
4. Update the configuration in `app/Config/Livekit.php`

## Configuration

### Update LiveKit Configuration

Update `app/Config/Livekit.php` with your server details:

```php
public string $serverUrl = 'ws://localhost:7880';  // For local development
public string $apiKey = 'devkey';
public string $apiSecret = 'secret';
```

### For Production

```php
public string $serverUrl = 'wss://your-livekit-server.com';
public string $apiKey = 'your-production-api-key';
public string $apiSecret = 'your-production-api-secret';
```

## Testing the Setup

1. Start your LiveKit server
2. Start your CodeIgniter application: `php spark serve`
3. Visit `http://localhost:8080/livekit/test` to test the implementation
4. Visit `http://localhost:8080/livekit/` to use the video conferencing interface

## Features Available

- ✅ Real-time video and audio
- ✅ Screen sharing
- ✅ Chat functionality
- ✅ Participant management
- ✅ Room management
- ✅ Adaptive streaming
- ✅ Dynacast support

## Troubleshooting

### Common Issues

1. **Connection Failed**: Check if LiveKit server is running
2. **Token Errors**: Verify API key and secret in configuration
3. **Media Issues**: Check browser permissions for camera/microphone

### Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge

### Network Requirements

- WebRTC requires HTTPS in production
- STUN servers for NAT traversal
- TURN servers for restrictive networks (optional)

## Production Deployment

For production deployment:

1. Use HTTPS with valid SSL certificates
2. Set up TURN servers for better connectivity
3. Use Redis for session storage
4. Configure proper logging
5. Set up monitoring and health checks

## Security Considerations

- Use strong API keys and secrets
- Implement proper authentication
- Use HTTPS in production
- Configure CORS properly
- Set up rate limiting
