@echo off
echo Starting LiveKit Server...
echo.

REM Check if Docker is running
docker --version >nul 2>&1
if %errorlevel% neq 0 (
    echo Error: Docker is not installed or not running
    echo Please install Docker Desktop and try again
    pause
    exit /b 1
)

REM Start LiveKit server with Docker Compose
echo Starting LiveKit server with Docker...
docker-compose up -d

echo.
echo LiveKit server is starting...
echo Server URL: ws://localhost:7880
echo API Key: devkey
echo API Secret: secret
echo.
echo To stop the server, run: docker-compose down
echo.
pause
