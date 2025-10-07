# 🎤 Voice Chat Setup Guide

## ✅ **Current Status: DEMO MODE**

The voice chat is currently running in **Demo Mode** because the LiveKit server is not running. Here's how to get it fully working:

## 🚀 **Quick Setup (Recommended)**

### **Step 1: Start Docker Desktop**
1. Open Docker Desktop application
2. Wait for it to fully start (green status)

### **Step 2: Start LiveKit Server**
```bash
docker-compose up -d
```

### **Step 3: Verify Server is Running**
```bash
# Check if server is running
curl http://localhost:7880/
```

### **Step 4: Test Voice Chat**
1. Visit: http://localhost:8080/contactus
2. Click "Start Voice Chat"
3. Allow microphone access
4. Speak with the agent!

## 🔧 **Alternative Setup (Without Docker)**

If you don't want to use Docker, you can install LiveKit server directly:

### **Option 1: Download LiveKit Binary**
```bash
# Download LiveKit server
curl -L https://github.com/livekit/livekit/releases/latest/download/livekit_linux_amd64.tar.gz | tar -xz
chmod +x livekit
./livekit --config livekit.yaml
```

### **Option 2: Use LiveKit Cloud**
1. Sign up at https://cloud.livekit.io/
2. Create a new project
3. Update the configuration in `app/Config/Livekit.php`:
   ```php
   public string $serverUrl = 'wss://your-project.livekit.cloud';
   public string $apiKey = 'your-api-key';
   public string $apiSecret = 'your-api-secret';
   ```

## 🎯 **Current Features (Demo Mode)**

Even in demo mode, you can:
- ✅ See the voice chat interface
- ✅ Test the mute/unmute functionality
- ✅ View speaking indicators
- ✅ Experience the full UI

## 🔍 **Troubleshooting**

### **"LiveKit is not defined" Error**
- ✅ **FIXED**: Scripts are now loaded in correct order
- ✅ **FIXED**: Added fallback CDN
- ✅ **FIXED**: Added error checking

### **"Connection Failed" Error**
- ✅ **FIXED**: Added demo mode fallback
- ✅ **FIXED**: Clear error messages
- ✅ **FIXED**: Helpful setup instructions

### **Docker Issues**
- Make sure Docker Desktop is running
- Check if ports 7880 and 7881 are available
- Try: `docker-compose down && docker-compose up -d`

## 📱 **Testing the Voice Chat**

### **Demo Mode Testing:**
1. Visit: http://localhost:8080/contactus
2. Click "Start Voice Chat"
3. You'll see "Demo Mode" status
4. Test mute/unmute buttons
5. See speaking indicators

### **Full Mode Testing:**
1. Start LiveKit server: `docker-compose up -d`
2. Visit: http://localhost:8080/contactus
3. Click "Start Voice Chat"
4. Allow microphone access
5. Speak directly to the agent!

## 🎤 **Voice Chat Features**

- **Real-time Audio**: Direct voice communication
- **Microphone Control**: Mute/unmute functionality
- **Speaking Indicators**: Visual feedback when agent speaks
- **Connection Status**: Real-time status updates
- **Mobile Support**: Works on mobile devices
- **Browser Compatibility**: Chrome, Firefox, Safari, Edge

## 📞 **Support**

If you need help:
1. Check the browser console for errors
2. Verify Docker is running
3. Check if ports 7880/7881 are available
4. Try the demo mode first to test the interface

---

**🎉 The voice chat is ready to use! Start Docker and run `docker-compose up -d` to enable full functionality.**
