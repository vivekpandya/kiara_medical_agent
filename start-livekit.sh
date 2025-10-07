#!/bin/bash

echo "Starting LiveKit Server..."
echo

# Check if Docker is running
if ! command -v docker &> /dev/null; then
    echo "Error: Docker is not installed or not running"
    echo "Please install Docker and try again"
    exit 1
fi

# Start LiveKit server with Docker Compose
echo "Starting LiveKit server with Docker..."
docker-compose up -d

echo
echo "LiveKit server is starting..."
echo "Server URL: ws://localhost:7880"
echo "API Key: devkey"
echo "API Secret: secret"
echo
echo "To stop the server, run: docker-compose down"
echo
