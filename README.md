# 🏥 Kiara Medical Agent

An AI-powered voice chat medical assistant built with CodeIgniter 4 and LiveKit, featuring real-time voice interaction, medical knowledge integration, and comprehensive transcript management.

## 🎯 Project Overview

Kiara Medical Agent is a sophisticated medical support system that enables users to have natural voice conversations with an AI agent. The system combines the power of LiveKit's real-time communication platform with AI-powered medical assistance.

## 🏗️ Architecture

This application uses a three-tier architecture:

### 1. **Frontend** (JavaScript SDK)
- **LiveKit Client SDK** (`livekit-client.umd.min.js`)
- Real-time WebRTC communication
- Voice and text chat interface
- Live transcription display
- Browser-based speech recognition (Web Speech API)
- Location: `assets/js/livekit/`

### 2. **Backend** (PHP SDK)
- **CodeIgniter 4 Framework**
- **LiveKit PHP SDK** (agence104/livekit-server-sdk)
- Token generation and authentication
- Room management
- Agent dispatch coordination
- Location: `app/Controllers/LivekitAgent.php`

### 3. **AI Agent Server** (Node.js)
- **LiveKit Agents Framework** (`@livekit/agents`)
- **OpenAI Integration** for natural language processing
- **Deepgram** for speech-to-text
- **Cartesia** for text-to-speech
- **Silero VAD** for voice activity detection
- Location: `livekit-agent/`

---

## 🚀 Quick Start

### Prerequisites

- **PHP** 7.4 or higher
- **Composer** for PHP dependencies
- **Node.js** 22.0.0 or higher
- **pnpm** 10.0.0 or higher
- **Docker** (for LiveKit server)
- **LiveKit Cloud Account** (or self-hosted LiveKit server)

### Installation Steps

#### 1️⃣ Clone and Install PHP Dependencies

```bash
# Clone the repository
git clone <repository-url>
cd kiara_medical_agent

# Install PHP dependencies
composer install

# Copy environment file
cp env .env

# Configure .env file with your database and base URL
```

#### 2️⃣ Configure LiveKit Server

**Option A: Using LiveKit Cloud (Recommended)**

1. Sign up at https://cloud.livekit.io/
2. Create a new project
3. Update `app/Config/Livekit.php`:

```php
public string $serverUrl = 'wss://your-project.livekit.cloud';
public string $apiKey = 'your-api-key';
public string $apiSecret = 'your-api-secret';
```

**Option B: Self-Hosted with Docker**

```bash
# Start LiveKit server
docker-compose up -d

# Configuration in app/Config/Livekit.php:
public string $serverUrl = 'ws://localhost:7880';
public string $apiKey = 'devkey';
public string $apiSecret = 'secret';
```

#### 3️⃣ Install and Configure Node.js Agent

```bash
# Navigate to agent directory
cd livekit-agent

# Install dependencies
pnpm install

# Create .env file with your API keys
cp .env.example .env

# Add your API keys to .env:
# OPENAI_API_KEY=your-openai-key
# DEEPGRAM_API_KEY=your-deepgram-key
# CARTESIA_API_KEY=your-cartesia-key
# LIVEKIT_URL=wss://your-project.livekit.cloud
# LIVEKIT_API_KEY=your-api-key
# LIVEKIT_API_SECRET=your-api-secret

# Build the agent
pnpm run build

# Start the agent server
pnpm run start
```

#### 4️⃣ Start the Application

```bash
# From the project root
php spark serve --host=localhost --port=8080
```

#### 5️⃣ Access the Voice Chat

Visit: **http://localhost:8080/contactus**

---

## 📦 Technology Stack

### Frontend Technologies
- **LiveKit JavaScript SDK** - Real-time WebRTC communication
- **Bootstrap 5** - UI framework
- **Font Awesome** - Icons
- **Web Speech API** - Browser-based speech recognition
- **jQuery** - DOM manipulation and AJAX

### Backend Technologies
- **CodeIgniter 4** - PHP framework
- **LiveKit PHP SDK** - Token generation and room management
- **Composer** - PHP dependency management

### AI Agent Technologies
- **Node.js** - JavaScript runtime
- **TypeScript** - Type-safe development
- **@livekit/agents** - Agent framework
- **@livekit/agents-plugin-openai** - GPT integration
- **@livekit/agents-plugin-deepgram** - Speech-to-text
- **@livekit/agents-plugin-cartesia** - Text-to-speech
- **@livekit/agents-plugin-silero** - Voice activity detection

---

## 🎨 Key Features

### Voice Chat Features
- ✅ **Real-time Voice Communication** - Natural voice conversations
- ✅ **AI-Powered Responses** - OpenAI GPT-powered medical assistance
- ✅ **Live Transcription** - Real-time conversation transcripts
- ✅ **Text Input Alternative** - Type messages instead of speaking
- ✅ **Microphone Controls** - Mute/unmute functionality
- ✅ **Speaking Indicators** - Visual feedback during conversations
- ✅ **Transcript Management** - Copy and clear conversation history
- ✅ **Connection Status** - Real-time connection monitoring
- ✅ **Mobile Support** - Works on mobile devices

### Medical Agent Capabilities
- 🏥 Medical information and guidance
- 💊 Drug interaction checking
- 📋 Symptom assessment
- 🩺 Health recommendations
- 📞 Emergency support routing

---

## 📁 Project Structure

```
kiara_medical_agent/
├── app/
│   ├── Controllers/
│   │   ├── LivekitAgent.php          # LiveKit backend controller
│   │   └── Home.php                  # Main application controller
│   ├── Config/
│   │   ├── Livekit.php               # LiveKit configuration
│   │   └── Routes.php                # Application routes
│   └── Views/
│       └── web/
│           └── contact_us.php        # Voice chat interface
│
├── assets/
│   └── js/
│       └── livekit/
│           ├── agent.js              # LiveKit client implementation
│           ├── utils.js              # Helper utilities
│           └── livekit-client.umd.min.js  # LiveKit SDK
│
├── livekit-agent/                    # Node.js AI Agent Server
│   ├── src/
│   │   ├── agent.ts                  # Main agent logic
│   │   └── index.ts                  # Entry point
│   ├── package.json                  # Node.js dependencies
│   ├── tsconfig.json                 # TypeScript configuration
│   └── .env                          # Agent environment variables
│
├── docs/                             # Documentation
│   ├── LiveKit_Agent_Implementation.md
│   ├── LiveKit_Server_Setup.md
│   └── Unit_Testing_Guide.md
│
├── composer.json                     # PHP dependencies
├── docker-compose.yml                # Docker configuration
├── README_LiveKit.md                 # LiveKit-specific docs
└── VOICE_CHAT_SETUP.md              # Voice chat setup guide
```

---

## 🔧 Configuration

### PHP Configuration (`app/Config/Livekit.php`)

```php
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Livekit extends BaseConfig
{
    public string $serverUrl = 'wss://your-project.livekit.cloud';
    public string $apiKey = 'your-api-key';
    public string $apiSecret = 'your-api-secret';
    public int $tokenExpiration = 3600; // 1 hour
}
```

### Node.js Agent Configuration (`livekit-agent/.env`)

```env
# OpenAI Configuration
OPENAI_API_KEY=sk-...

# Deepgram Configuration (Speech-to-Text)
DEEPGRAM_API_KEY=...

# Cartesia Configuration (Text-to-Speech)
CARTESIA_API_KEY=...

# LiveKit Configuration
LIVEKIT_URL=wss://your-project.livekit.cloud
LIVEKIT_API_KEY=your-api-key
LIVEKIT_API_SECRET=your-api-secret
```

---

## 🔌 API Endpoints

### LiveKit Backend Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/livekit/generateToken` | POST | Generate access token for room |
| `/livekit/dispatchAgent` | POST | Dispatch AI agent to room |
| `/livekit/createRoom` | POST | Create new room |
| `/livekit/listRooms` | GET | List all active rooms |
| `/livekit/deleteRoom` | POST | Delete room |
| `/livekit/getParticipants` | GET | Get room participants |

### Token Generation Example

```javascript
const response = await fetch('/livekit/generateToken', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
        room_name: 'support-room-123',
        participant_name: 'Customer',
        participant_identity: 'user-abc123'
    })
});

const data = await response.json();
// Returns: { success: true, token: 'eyJ...' }
```

---

## 🧪 Testing

### Test Voice Chat Locally

```bash
# 1. Start LiveKit server
docker-compose up -d

# 2. Start Node.js agent
cd livekit-agent && pnpm run start

# 3. Start PHP application
php spark serve

# 4. Open browser
# Visit: http://localhost:8080/contactus
# Click "Start Voice Chat"
# Allow microphone access
# Start speaking!
```

### Test Files Included

- `test-chat-agent.html` - Chat agent testing
- `test-livekit-local.html` - Local LiveKit testing
- `test-voice-chat.html` - Voice chat testing

---

## 🔒 Security Considerations

### Token Security
- Tokens are generated server-side only
- Short expiration times (default: 1 hour)
- Room-specific permissions
- Identity verification

### API Key Management
- Never commit API keys to version control
- Use environment variables (`.env`)
- Separate development and production keys
- Rotate keys regularly

### HTTPS Requirements
- Production MUST use HTTPS
- WebRTC requires secure contexts
- Use valid SSL certificates

---

## 🐛 Troubleshooting

### Common Issues

#### 1. "LiveKit is not defined" Error
```javascript
// Solution: Check script loading order in contact_us.php
// Ensure livekit-client.umd.min.js loads before agent.js
```

#### 2. Microphone Permission Denied
```
Solution:
1. Click the lock icon in browser address bar
2. Set Microphone to "Allow"
3. Reload the page
```

#### 3. Agent Not Responding
```bash
# Check if Node.js agent is running
cd livekit-agent
pnpm run start

# Check agent logs for errors
# Verify API keys in .env file
```

#### 4. Connection Failed
```
Solutions:
- Verify LiveKit server is running (docker ps)
- Check serverUrl in app/Config/Livekit.php
- Ensure API keys are correct
- Check firewall/network settings
```

#### 5. No Audio Playback
```
Solution:
- Check browser audio permissions
- Verify speakers/headphones are working
- Check browser console for errors
- Try different browser
```

---

## 📚 Documentation

### Additional Documentation Files
- **[README_LiveKit.md](README_LiveKit.md)** - Detailed LiveKit implementation
- **[VOICE_CHAT_SETUP.md](VOICE_CHAT_SETUP.md)** - Step-by-step setup guide
- **[docs/LiveKit_Agent_Implementation.md](docs/LiveKit_Agent_Implementation.md)** - Agent development guide
- **[docs/LiveKit_Server_Setup.md](docs/LiveKit_Server_Setup.md)** - Server configuration
- **[docs/Unit_Testing_Guide.md](docs/Unit_Testing_Guide.md)** - Testing documentation

### External Resources
- [LiveKit Documentation](https://docs.livekit.io/)
- [LiveKit JavaScript SDK](https://github.com/livekit/client-sdk-js)
- [LiveKit PHP SDK](https://github.com/agence104/livekit-server-sdk)
- [LiveKit Agents Framework](https://docs.livekit.io/agents/)
- [CodeIgniter 4 Documentation](https://codeigniter4.github.io/userguide/)

---

## 🌐 Browser Support

| Browser | Version | Support |
|---------|---------|---------|
| Chrome | 90+ | ✅ Full Support |
| Firefox | 88+ | ✅ Full Support |
| Safari | 14+ | ✅ Full Support |
| Edge | 90+ | ✅ Full Support |
| Mobile Safari | iOS 14+ | ✅ Full Support |
| Chrome Mobile | Android 90+ | ✅ Full Support |

---

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🤝 Support

For technical support:
1. Check the [Troubleshooting](#-troubleshooting) section
2. Review the [Documentation](#-documentation)
3. Check browser console for errors
4. Contact: vivek@symphony-solution.com

---

## 🔧 Server Requirements

**PHP Requirements:**
- PHP version 7.4 or higher
- Extensions: intl, libcurl, json, mbstring, mysqlnd, xml

**Node.js Requirements:**
- Node.js 22.0.0 or higher
- pnpm 10.0.0 or higher

**System Requirements:**
- Docker (optional, for self-hosted LiveKit)
- Microphone access for voice chat
- Modern web browser with WebRTC support
- HTTPS in production environment

---

**🎉 Ready to get started? Follow the [Quick Start](#-quick-start) guide above!**
