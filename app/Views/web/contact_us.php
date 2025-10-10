<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Voice Chat Support</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        .contactbanner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0;
            color: white;
        }

        .contactbanner h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .contactbanner h1 span {
            color: #ffd700;
        }

        .alignc {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            padding: 10px;
        }

        .mt-cont-4 {
            margin-top: 2rem;
        }

        .contacticon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .getintouchbox {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .getintouchbox h5 {
            color: #667eea;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .contacttextbox {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .contacttextbox:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea.contacttextbox {
            min-height: 120px;
            resize: vertical;
        }

        .custtombtn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .custtombtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .help-inline {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }

        /* Voice Chat Styling Improvements */
        .voice-chat-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px 0;
            min-height: calc(100vh - 120px);
        }

        .voice-chat-card {
            max-width: 100%;
            width: 100%;
            margin: 0;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }

        .voice-chat-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .voice-chat-header h5 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .voice-chat-content {
            padding: 0;
            background: white;
            min-height: calc(100vh - 200px);
            height: calc(100vh - 200px);
            display: flex;
            flex-direction: row;
        }

        .left-column {
            flex: 1;
            padding: 20px;
            border-right: 1px solid #e9ecef;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .right-column {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        #voiceChatContainer {
            height: auto;
            min-height: 300px;
            padding: 0;
            background: transparent;
            text-align: center;
        }

        #voiceChatContent {
            padding: 40px 20px;
        }

        #voiceChatContent i {
            margin-bottom: 20px;
            color: #6c757d;
        }

        #voiceChatContent h6 {
            color: #495057;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        #voiceChatContent p {
            color: #6c757d;
            font-size: 0.95rem;
        }

        #audioControls {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin: 20px 0;
        }

        .audio-control-group {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .microphone-controls,
        .agent-controls {
            text-align: center;
            padding: 15px;
        }

        .microphone-controls i,
        .agent-controls i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .microphone-controls i {
            color: #28a745;
        }

        .agent-controls i {
            color: #007bff;
        }

        .control-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
        }

        #speakingIndicator {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: none;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
        }

        #speakingIndicator .alert {
            margin: 0;
            background: transparent;
            border: none;
            color: #1976d2;
            font-weight: 500;
        }

        .text-input-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .text-input-section h6 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .transcript-section {
            background: white;
            border-radius: 10px;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .transcript-header {
            background: #f8f9fa;
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
            border-radius: 10px 10px 0 0;
            flex-shrink: 0;
        }

        .transcript-header h6 {
            margin: 0;
            color: #495057;
            font-weight: 600;
        }

        .transcript-container {
            flex: 1;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 0 0 10px 10px;
            padding: 20px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
            min-height: calc(100vh - 400px);
            max-height: calc(100vh - 400px);
        }

        .transcript-actions {
            padding: 15px 20px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            border-radius: 0 0 10px 10px;
            flex-shrink: 0;
        }

        .voice-chat-controls {
            background: transparent;
            padding: 0;
            border: none;
            margin-top: auto;
        }

        .control-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-success:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .status-info {
            text-align: right;
        }

        .badge {
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 20px;
        }

        .connection-info {
            font-size: 14px;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contactbanner h1 {
                font-size: 2rem;
            }

            .getintouchbox {
                padding: 25px;
            }

            .voice-chat-card {
                margin: 0 15px;
            }

            .voice-chat-content {
                flex-direction: column;
                min-height: calc(100vh - 150px);
                height: auto;
            }

            .left-column,
            .right-column {
                flex: none;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                max-height: none;
                padding: 15px;
                display: flex;
                flex-direction: column;
            }

            .right-column {
                border-bottom: none;
            }

            .control-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .status-info {
                text-align: center;
                margin-top: 10px;
            }

            .transcript-container {
                min-height: 300px;
                max-height: 400px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-microphone-alt"></i> Kiara Medical Agent
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- LiveKit Voice Chat Agent Section -->
    <section id="voice-chat" class="voice-chat-section">
        <div class="container-fluid px-3">
            <div class="voice-chat-card">
                <div class="voice-chat-header">
                    <h5><i class="fas fa-microphone"></i> Voice Chat with Our Agent</h5>
                </div>
                <div class="voice-chat-content">
                    <!-- Left Column: Actions and Controls -->
                    <div class="left-column">
                        <div id="voiceChatContainer">
                            <div id="voiceChatContent" class="text-center mb-3">
                                <i class="fas fa-microphone fa-2x text-muted mb-2"></i>
                                <h6 class="text-muted mb-2">Click "Start Voice Chat" to begin talking with our agent</h6>
                                <p class="small text-muted mb-0">You can speak directly to our support agent or type messages</p>
                            </div>

                            <!-- Audio Controls -->
                            <div id="audioControls" style="display: none;">
                                <div class="audio-control-group mb-3">
                                    <div class="microphone-controls text-center">
                                        <i class="fas fa-microphone fa-2x mb-1"></i>
                                        <div class="control-label mb-1">Your Microphone</div>
                                        <button class="btn btn-sm btn-outline-danger" id="muteBtn">
                                            <i class="fas fa-microphone-slash"></i> Mute
                                        </button>
                                    </div>
                                    <div class="volume-controls text-center">
                                        <i class="fas fa-volume-up fa-2x mb-1"></i>
                                        <div class="control-label mb-1">Volume</div>
                                        <button class="btn btn-sm btn-outline-secondary" id="volumeBtn">
                                            <i class="fas fa-volume-mute"></i> Mute
                                        </button>
                                    </div>
                                </div>

                                <!-- Speaking Indicator -->
                                <div id="speakingIndicator" style="display: none;" class="mb-3">
                                    <div class="alert alert-info">
                                        <i class="fas fa-comment-dots"></i> <span id="speakingText">Agent is speaking...</span>
                                    </div>
                                </div>

                                <!-- Developer Notice for Local Environment -->
                                <div class="developer-notice mb-3" style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; padding: 8px; font-size: 0.8rem;">
                                    <i class="fas fa-info-circle text-warning"></i>
                                    <strong>Note:</strong> Response delay is due to local setup. Performance will improve in production.
                                </div>

                                <!-- Tool Selection Section -->
                                <div class="tool-selection-section mb-3" style="background: #f8f9fa; padding: 12px; border-radius: 8px;">
                                    <h6 class="mb-2"><i class="fas fa-tools"></i> Quick Actions</h6>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <button class="btn btn-primary btn-sm w-100" id="toolDrugInfoBtn" title="Get drug information">
                                                <i class="fas fa-pills"></i><br><small>Drug Info</small>
                                            </button>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <button class="btn btn-outline-warning btn-sm w-100" id="toolDrugInteractionBtn" title="Check drug interactions">
                                                <i class="fas fa-exclamation-triangle"></i><br><small>Interactions</small>
                                            </button>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <button class="btn btn-outline-info btn-sm w-100" id="toolSymptomCheckerBtn" title="Check symptoms">
                                                <i class="fas fa-stethoscope"></i><br><small>Symptoms</small>
                                            </button>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <button class="btn btn-outline-success btn-sm w-100" id="toolReminderBtn" title="Set medication reminder">
                                                <i class="fas fa-bell"></i><br><small>Reminder</small>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text Input Section -->
                                <div class="text-input-section mb-3">
                                    <h6 class="mb-2"><i class="fas fa-keyboard"></i> Or Type Your Message</h6>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" id="textMessageInput"
                                            placeholder="Type your message here..."
                                            maxlength="500">
                                        <button class="btn btn-primary" type="button" id="sendTextBtn">
                                            <i class="fas fa-paper-plane"></i> Send
                                        </button>
                                    </div>
                                    <small class="text-muted">You can type messages instead of speaking</small>
                                </div>
                            </div>

                            <!-- Voice Chat Controls -->
                            <div class="voice-chat-controls mt-3">
                                <div class="control-buttons text-center mb-2">
                                    <button class="btn btn-success btn-lg mb-2" id="startVoiceChatBtn">
                                        <i class="fas fa-play"></i> Start Voice Chat
                                    </button>
                                    <button class="btn btn-danger btn-lg mb-2" id="endVoiceChatBtn" disabled>
                                        <i class="fas fa-stop"></i> End Call
                                    </button>
                                </div>
                                <div class="status-info text-center">
                                    <small class="text-muted">
                                        Status: <span id="voiceChatStatus" class="badge bg-secondary">Disconnected</span>
                                    </small>
                                    <div class="connection-info">
                                        <span id="connectionInfo">Click start to connect</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Transcript -->
                    <div class="right-column">
                        <!-- Transcript Section -->
                        <div id="transcriptSection" class="transcript-section" style="display: none;">
                            <div class="transcript-header">
                            <h6><i class="fas fa-comments"></i> Conversation Transcript</h6>
                            </div>
                            <div id="transcriptContainer" class="transcript-container">
                                <div class="text-muted text-center">Conversation will appear here...</div>
                            </div>
                            <div class="transcript-actions">
                                <button class="btn btn-sm btn-outline-secondary" id="clearTranscriptBtn">
                                    <i class="fas fa-trash"></i> Clear Transcript
                                </button>
                                <button class="btn btn-sm btn-outline-primary" id="copyTranscriptBtn">
                                    <i class="fas fa-copy"></i> Copy Transcript
                                </button>
                            </div>
                        </div>

                        <!-- Placeholder when transcript is hidden -->
                        <div id="transcriptPlaceholder" style="display: flex; align-items: center; justify-content: center; height: 100%; text-align: center; color: #6c757d;">
                            <div>
                                <i class="fas fa-comments fa-3x mb-3"></i>
                                <h6>Conversation Transcript</h6>
                                <p>Start a voice chat to see the conversation here</p>
                            </div>
                        </div>

                    <!-- Medication Details Panel -->
                    <div id="medicationPanel" class="transcript-section mt-3" style="display:none;">
                        <div class="transcript-header">
                            <h6><i class="fas fa-pills"></i> Medication Details</h6>
                        </div>
                        <div id="medicationContent" class="transcript-container" style="min-height:auto; max-height:unset;">
                            <div class="text-muted">Drug information will appear here...</div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="display:none;">
        <div class="container-fuild">
            <div class="row">
                <div class="col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3028.477976534787!2d-74.38631622443997!3d40.6193398432838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b0b66ab9af05%3A0xf0878eee7d054113!2s15%20Clydesdale%20Rd%2C%20Scotch%20Plains%2C%20NJ%2007076%2C%20USA!5e0!3m2!1sen!2sin!4v1692184662823!5m2!1sen!2sin"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
            <p class="mb-0 mt-2">
                <i class="fas fa-phone"></i> 9904829612 |
                <i class="fas fa-envelope"></i> vivek@symphony-solution.com
            </p>
        </div>
    </footer>

    <!-- jQuery (required for validation and mask plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



    <!-- LiveKit SDK -->
    <script src="<?= base_url('assets/js/livekit/livekit-client.umd.min.js') ?>"
        onerror="this.onerror=null; this.src='https://cdn.jsdelivr.net/npm/livekit-client/dist/livekit-client.umd.min.js';"></script>
    <script>
        // Ensure global alias matches code usage
        if (typeof window.LiveKit === 'undefined' && typeof window.LivekitClient !== 'undefined') {
            window.LiveKit = window.LivekitClient;
        }
    </script>
    <script src="<?= base_url('assets/js/livekit/agent.js') ?>"></script>
    <script src="<?= base_url('assets/js/livekit/utils.js') ?>"></script>

    <!-- Custom helper functions for loader -->
    <script>
        function showloader() {
            $('body').append('<div class="loader-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
            $('.loader-overlay').css({
                'position': 'fixed',
                'top': '0',
                'left': '0',
                'width': '100%',
                'height': '100%',
                'background': 'rgba(0,0,0,0.5)',
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center',
                'z-index': '9999'
            });
        }

        function hideloader() {
            $('.loader-overlay').remove();
        }

        // Add custom validation method for no special characters
        $.validator.addMethod("noSpecialChars", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Please enter only letters and spaces");
    </script>

    <script type="text/javascript">
        // LiveKit Voice Chat Agent Implementation
        class ContactVoiceChatAgent {
            constructor() {
                this.room = null;
                this.isConnected = false;
                this.isMuted = false;
                this.agentIdentity = 'support-agent';
                this.userIdentity = 'user-' + Date.now();
                // Generate unique room name for each session
                this.roomName = 'support-' + Date.now() + '-' + Math.random().toString(36).substring(7);
                console.log('[VoiceChat] Generated room name:', this.roomName);
                this.initializeElements();
                this.attachEventListeners();
            }

            initializeElements() {
                this.voiceChatContainer = document.getElementById('voiceChatContainer');
                this.voiceChatContent = document.getElementById('voiceChatContent');
                this.audioControls = document.getElementById('audioControls');
                this.speakingIndicator = document.getElementById('speakingIndicator');
                this.speakingText = document.getElementById('speakingText');
                this.startVoiceChatBtn = document.getElementById('startVoiceChatBtn');
                this.endVoiceChatBtn = document.getElementById('endVoiceChatBtn');
                this.voiceChatStatus = document.getElementById('voiceChatStatus');
                this.connectionInfo = document.getElementById('connectionInfo');
                this.muteBtn = document.getElementById('muteBtn');
                this.volumeBtn = document.getElementById('volumeBtn');

                // Text input elements
                this.textMessageInput = document.getElementById('textMessageInput');
                this.sendTextBtn = document.getElementById('sendTextBtn');

                // Tool selection elements
                this.toolDrugInfoBtn = document.getElementById('toolDrugInfoBtn');
                this.toolDrugInteractionBtn = document.getElementById('toolDrugInteractionBtn');
                this.toolSymptomCheckerBtn = document.getElementById('toolSymptomCheckerBtn');
                this.toolReminderBtn = document.getElementById('toolReminderBtn');

                // Transcript elements
                this.transcriptSection = document.getElementById('transcriptSection');
                this.transcriptContainer = document.getElementById('transcriptContainer');
                this.transcriptPlaceholder = document.getElementById('transcriptPlaceholder');
                this.clearTranscriptBtn = document.getElementById('clearTranscriptBtn');
                this.copyTranscriptBtn = document.getElementById('copyTranscriptBtn');

                // Validate that all required elements exist
                const requiredElements = [
                    'startVoiceChatBtn', 'endVoiceChatBtn', 'voiceChatStatus', 'connectionInfo',
                    'textMessageInput', 'sendTextBtn', 'toolDrugInfoBtn', 'toolDrugInteractionBtn',
                    'toolSymptomCheckerBtn', 'toolReminderBtn', 'transcriptSection', 'transcriptContainer',
                    'transcriptPlaceholder', 'clearTranscriptBtn', 'copyTranscriptBtn', 'muteBtn', 'volumeBtn'
                ];

                const missingElements = requiredElements.filter(elementName => !this[elementName]);
                if (missingElements.length > 0) {
                    console.error('[VoiceChat] Missing required DOM elements:', missingElements);
                    throw new Error(`Missing required DOM elements: ${missingElements.join(', ')}`);
                }

                // Transcript data
                this.transcript = [];

                // Browser speech recognition (USER) support
                this.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition || null;
                this.recognition = null;
                this.isRecognizing = false;

                // Auto-termination on inactivity (20 seconds of silence)
                this.inactivityTimer = null;
                this.inactivityTimeout = 20000; // 20 seconds in milliseconds
                this.warningTimer = null;
                this.lastUserActivity = Date.now();
                this.warningShown = false;
                this.agentSpeaking = false; // Track if agent is currently speaking
                this.agentLastSpoke = 0; // Timestamp of agent's last speech

                // Default tool selection
                this.defaultTool = 'drug_information';
                this.selectedTool = this.defaultTool;
            }

            attachEventListeners() {
                // Global click handler to enable audio on user interaction
                document.addEventListener('click', () => {
                    this.enableAudioOnUserInteraction();
                }, {
                    once: false
                });

                // Core event listeners
                if (this.startVoiceChatBtn) {
                    this.startVoiceChatBtn.addEventListener('click', () => this.startVoiceChat());
                }
                if (this.endVoiceChatBtn) {
                    this.endVoiceChatBtn.addEventListener('click', () => this.endVoiceChat());
                }
                if (this.muteBtn) {
                    this.muteBtn.addEventListener('click', () => this.toggleMute());
                }
                if (this.volumeBtn) {
                    this.volumeBtn.addEventListener('click', () => this.toggleVolume());
                }
                if (this.clearTranscriptBtn) {
                    this.clearTranscriptBtn.addEventListener('click', () => this.clearTranscript());
                }
                if (this.copyTranscriptBtn) {
                    this.copyTranscriptBtn.addEventListener('click', () => this.copyTranscript());
                }
                if (this.sendTextBtn) {
                    this.sendTextBtn.addEventListener('click', () => this.sendTextMessage());
                }
                if (this.textMessageInput) {
                    this.textMessageInput.addEventListener('keypress', (e) => {
                        if (e.key === 'Enter') {
                            this.sendTextMessage();
                        }
                    });
                }

                // Tool selection event listeners
                if (this.toolDrugInfoBtn) {
                    this.toolDrugInfoBtn.addEventListener('click', () => {
                        this.selectedTool = 'drug_information';
                        this.updateToolButtonStates('drug_information');
                        this.triggerTool('drug_information');
                    });
                }
                if (this.toolDrugInteractionBtn) {
                    this.toolDrugInteractionBtn.addEventListener('click', () => {
                        this.selectedTool = 'drug_interaction';
                        this.updateToolButtonStates('drug_interaction');
                        this.triggerTool('drug_interaction');
                    });
                }
                if (this.toolSymptomCheckerBtn) {
                    this.toolSymptomCheckerBtn.addEventListener('click', () => {
                        this.selectedTool = 'symptom_checker';
                        this.updateToolButtonStates('symptom_checker');
                        this.triggerTool('symptom_checker');
                    });
                }
                if (this.toolReminderBtn) {
                    this.toolReminderBtn.addEventListener('click', () => {
                        this.selectedTool = 'drug_reminder';
                        this.updateToolButtonStates('drug_reminder');
                        this.triggerTool('drug_reminder');
                    });
                }
            }

            async startVoiceChat(autoStart = false) {
                try {
                    console.log('[VoiceChat] startVoiceChat() called, autoStart:', autoStart);

                    // Enable AudioContext on user interaction
                    if (typeof AudioContext !== 'undefined' || typeof webkitAudioContext !== 'undefined') {
                        try {
                            const AudioContextClass = AudioContext || webkitAudioContext;
                            const audioContext = new AudioContextClass();
                            if (audioContext.state === 'suspended') {
                                await audioContext.resume();
                                console.log('[VoiceChat] AudioContext resumed successfully');
                            }
                        } catch (audioError) {
                            console.warn('[VoiceChat] AudioContext setup warning:', audioError);
                        }
                    }

                    this.updateStatus('connecting', 'Connecting...');
                    this.connectionInfo.textContent = 'Connecting to voice chat...';

                    // When using LiveKit Cloud, skip localhost server check

                    // Use the unique room name generated in constructor
                    const roomName = this.roomName;

                    // Ask server to dispatch agent for this room
                    console.log('[VoiceChat] dispatching agent for room:', roomName);
                    await fetch('<?= base_url('livekit/dispatchAgent') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            room_name: roomName,
                            identity: 'support-agent'
                        })
                    }).catch(() => {});

                    // Get access token from server (use app base URL)
                    console.log('[VoiceChat] requesting token for room:', roomName);
                    const response = await fetch('<?= base_url('livekit/generateToken') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            room_name: roomName,
                            participant_name: 'Customer',
                            participant_identity: this.userIdentity
                        })
                    });

                    const data = await response.json();
                    console.log('[VoiceChat] token response:', data);

                    if (!data.success) {
                        throw new Error(data.error);
                    }

                    // Connect to LiveKit room with audio configuration
                    this.room = new LiveKit.Room({
                        adaptiveStream: true,
                        dynacast: true,
                        publishDefaults: {
                            audioPreset: LiveKit.AudioPresets.music
                        }
                    });

                    this.setupRoomEventListeners();

                    // Connect to room
                    console.log('[VoiceChat] connecting to LiveKit at:', '<?= esc(config('Livekit')->serverUrl) ?>');
                    await this.room.connect('<?= esc(config('Livekit')->serverUrl) ?>', data.token);
                    console.log('[VoiceChat] connected to room');

                    // Request microphone permission explicitly and enable only audio
                    try {
                        console.log('[VoiceChat] requesting microphone permission');
                        await navigator.mediaDevices.getUserMedia({
                            audio: true
                        });
                    } catch (permError) {
                        console.error('[VoiceChat] microphone permission error', permError);
                        this.updateStatus('disconnected', 'Microphone blocked');
                        if (this.connectionInfo) {
                            this.connectionInfo.textContent = 'Microphone permission is required. Please allow access and try again.';
                        }
                        alert('Microphone permission denied. Click the lock icon in the address bar and set Microphone to Allow, then reload.');
                        await this.room.disconnect().catch(() => {});
                        return;
                    }

                    await this.room.localParticipant.setMicrophoneEnabled(true);
                    console.log('[VoiceChat] local microphone enabled');

                    this.isConnected = true;
                    this.updateStatus('connected', 'Connected');
                    this.updateUI();
                    this.showAudioControls();
                    this.showTranscript();
                    if (this.connectionInfo) {
                        this.connectionInfo.textContent = `Connected to room: ${roomName}. You can now speak with our agent.`;
                    }

                    // Optional local (browser) transcription is disabled to avoid duplicate messages
                    // this.startUserTranscription();

                    // Start inactivity monitoring (auto-disconnect after 20 seconds of silence)
                    this.startInactivityTimer();
                    // Do not auto-trigger any tool; wait for real user input after greeting

                } catch (error) {
                    console.error('[VoiceChat] Failed to start voice chat:', error);
                    if (error && (error.name === 'NotAllowedError' || error.message?.includes('Permission'))) {
                        this.updateStatus('disconnected', 'Microphone blocked');
                        if (this.connectionInfo) {
                            this.connectionInfo.textContent = 'Please allow microphone access and try again.';
                        }
                        alert('Permission denied. Allow microphone access in your browser and reload.');
                        return;
                    }
                    // For other errors, show a message instead of silently switching to demo mode
                    this.updateStatus('disconnected', 'Connection failed');
                    if (this.connectionInfo) {
                        this.connectionInfo.textContent = 'Unable to start voice chat. Please try again.';
                    }
                }
            }

            startDemoMode() {
                console.log('[VoiceChat] Starting demo mode - LiveKit server not available');
                this.isConnected = true;
                this.updateStatus('connected', 'Demo Mode');
                this.updateUI();
                this.showAudioControls();
                this.connectionInfo.textContent = 'Demo Mode: LiveKit server not running. Please start Docker and run: docker-compose up -d';

                // Show demo message
                setTimeout(() => {
                    this.showSpeakingIndicator('Demo: Agent would be speaking here...');
                    setTimeout(() => {
                        this.hideSpeakingIndicator();
                    }, 3000);
                }, 2000);
            }

            setupRoomEventListeners() {
                this.room.on(LiveKit.RoomEvent.ParticipantConnected, (participant) => {
                    console.log('[VoiceChat] participant connected:', participant.identity);
                    if (participant.identity !== this.userIdentity) {
                        this.showSpeakingIndicator('Support agent joined the call');
                        setTimeout(() => this.hideSpeakingIndicator(), 3000);
                    }
                });

                this.room.on(LiveKit.RoomEvent.ParticipantDisconnected, (participant) => {
                    console.log('[VoiceChat] participant disconnected:', participant.identity);
                    if (participant.identity !== this.userIdentity) {
                        this.showSpeakingIndicator('Support agent left the call');
                        setTimeout(() => this.hideSpeakingIndicator(), 3000);
                    }
                });

                this.room.on(LiveKit.RoomEvent.TrackSubscribed, (track, publication, participant) => {
                    if (track.kind === 'audio' && participant.identity !== this.userIdentity) {
                        // Agent is speaking
                        console.log('[VoiceChat] remote audio subscribed from', participant.identity, 'track:', publication?.trackSid || 'unknown');
                        this.agentSpeaking = true;
                        this.agentLastSpoke = Date.now();
                        this.showSpeakingIndicator('Agent is speaking...');

                        // Clear any pending inactivity timers since agent is speaking
                        if (this.inactivityTimer) {
                            clearTimeout(this.inactivityTimer);
                            this.inactivityTimer = null;
                        }
                        if (this.warningTimer) {
                            clearTimeout(this.warningTimer);
                            this.warningTimer = null;
                        }

                        // Ensure audio element is created and attached to DOM so browsers will play it
                        const audioEl = track.attach();
                        try {
                            audioEl.autoplay = true;
                            audioEl.playsInline = true;
                            audioEl.muted = false;
                            audioEl.volume = 1.0;
                            // Optimize for faster playback
                            audioEl.preload = 'auto';
                            audioEl.loadstart = () => console.log('[VoiceChat] Audio loading started');

                            // Append once; avoid duplicates if event fires multiple times
                            if (!audioEl.isConnected) {
                                document.body.appendChild(audioEl);
                            }

                            // Enhanced audio play with AudioContext handling
                            const playAudio = async () => {
                                try {
                                    // Ensure AudioContext is resumed for better audio handling
                                    if (typeof AudioContext !== 'undefined' || typeof webkitAudioContext !== 'undefined') {
                                        const AudioContextClass = AudioContext || webkitAudioContext;
                                        const audioContext = new AudioContextClass();
                                        if (audioContext.state === 'suspended') {
                                            await audioContext.resume();
                                            console.log('[VoiceChat] AudioContext resumed for agent audio');
                                        }
                                    }

                                    const playPromise = audioEl.play();
                                    if (playPromise !== undefined) {
                                        await playPromise;
                                        console.log('[VoiceChat] Agent audio started playing successfully');
                                    }
                                } catch (error) {
                                    console.warn('[VoiceChat] Audio play failed:', error);
                                    this.showSpeakingIndicator('🔊 Click anywhere to enable agent voice');
                                }
                            };

                            playAudio();

                            // Listen for audio end to reset agent speaking state
                            audioEl.addEventListener('ended', () => {
                                this.agentSpeaking = false;
                                console.log('[VoiceChat] Agent finished speaking');
                                // Restart inactivity timer after agent stops speaking
                                setTimeout(() => {
                                    if (this.isConnected) {
                                        this.resetInactivityTimer();
                                    }
                                }, 1000); // 1 second grace period
                            });
                        } catch (e) {
                            console.warn('[VoiceChat] Failed to attach/play remote audio:', e);
                        }
                    }
                });

                // Use LiveKit's official text streams for transcriptions
                // This handles both user STT and agent TTS transcriptions automatically
                this.room.registerTextStreamHandler('lk.transcription', async (reader, participantInfo) => {
                    try {
                        const message = await reader.readAll();
                        const isTranscription = reader.info.attributes['lk.transcribed_track_id'] != null;
                        const isFinal = reader.info.attributes['lk.transcription_final'] === 'true';
                        const segmentId = reader.info.attributes['lk.segment_id'];

                        console.log('[VoiceChat] Text stream received:', {
                            participant: participantInfo.identity,
                            message: message,
                            isTranscription: isTranscription,
                            isFinal: isFinal,
                            segmentId: segmentId
                        });

                        if (isTranscription) {
                            // Determine speaker based on participant identity
                            const speaker = participantInfo.identity === this.userIdentity ? 'USER' : 'AGENT';

                            // Reset inactivity timer when either user or agent speaks
                            // This keeps the conversation alive as long as dialogue continues
                            if (speaker === 'USER' || (speaker === 'AGENT' && isFinal)) {
                                this.resetInactivityTimer();
                            }

                            if (isFinal) {
                                // Final transcription - add to transcript
                                this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), true);
                            } else {
                                // Interim transcription - update last line if same speaker
                                const last = this.transcript[this.transcript.length - 1];
                                if (last && last.speaker === speaker && last.final === false) {
                                    last.text = message;
                                    last.timestamp = new Date().toLocaleTimeString();
                                    this.renderTranscript();
                                } else {
                                    this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), false);
                                }
                            }
                        }
                    } catch (e) {
                        console.warn('[VoiceChat] Failed to handle text stream:', e);
                    }
                });

                // Register handler for text chat messages (lk.chat topic)
                this.room.registerTextStreamHandler('lk.chat', async (reader, participantInfo) => {
                    try {
                        const message = await reader.readAll();
                        console.log('[VoiceChat] Chat message received:', {
                            participant: participantInfo.identity,
                            message: message
                        });

                        // Reset inactivity timer when chat messages are exchanged
                        this.resetInactivityTimer();

                        // Add chat messages to transcript
                        const speaker = participantInfo.identity === this.userIdentity ? 'USER' : 'AGENT';
                        this.addToTranscript(speaker, message, new Date().toLocaleTimeString(), true);
                    } catch (e) {
                        console.warn('[VoiceChat] Failed to handle chat message:', e);
                    }
                });

            // Custom JSON stream for medication details
            this.room.registerTextStreamHandler('kiara.drug_info', async (reader, participantInfo) => {
                try {
                    const message = await reader.readAll();
                    console.log('[VoiceChat] Drug info json received:', message);
                    let data = null;
                    try { data = JSON.parse(message); } catch (e) { return; }
                    this.renderMedicationDetails(data);
                } catch (e) {
                    console.warn('[VoiceChat] Failed to handle drug info json:', e);
                }
            });

                // Keep Web Speech API for user transcription as backup
                // The official LiveKit text streams should handle both user and agent transcriptions

                this.room.on(LiveKit.RoomEvent.TrackUnsubscribed, (track, publication, participant) => {
                    if (track.kind === 'audio' && participant.identity !== this.userIdentity) {
                        this.agentSpeaking = false;
                        console.log('[VoiceChat] Agent audio track unsubscribed');
                        this.hideSpeakingIndicator();

                        // Restart inactivity timer after agent stops speaking
                        setTimeout(() => {
                            if (this.isConnected) {
                                this.resetInactivityTimer();
                            }
                        }, 1000); // 1 second grace period
                    }
                });

                this.room.on(LiveKit.RoomEvent.Disconnected, () => {
                    console.log('[VoiceChat] room disconnected');
                    this.handleDisconnection();
                });
            }

            async toggleMute() {
                if (!this.room) {
                    // Demo mode - just toggle the UI
                    this.isMuted = !this.isMuted;
                    this.muteBtn.innerHTML = this.isMuted ? '<i class="fas fa-microphone"></i> Unmute' : '<i class="fas fa-microphone-slash"></i> Mute';
                    this.muteBtn.className = this.isMuted ? 'btn btn-sm btn-success' : 'btn btn-sm btn-outline-danger';
                    this.connectionInfo.textContent = this.isMuted ? 'Microphone muted (Demo)' : 'Microphone unmuted (Demo)';
                    return;
                }

                try {
                    if (this.isMuted) {
                        await this.room.localParticipant.setMicrophoneEnabled(true);
                        this.isMuted = false;
                        this.muteBtn.innerHTML = '<i class="fas fa-microphone-slash"></i> Mute';
                        this.muteBtn.className = 'btn btn-sm btn-outline-danger';
                    } else {
                        await this.room.localParticipant.setMicrophoneEnabled(false);
                        this.isMuted = true;
                        this.muteBtn.innerHTML = '<i class="fas fa-microphone"></i> Unmute';
                        this.muteBtn.className = 'btn btn-sm btn-success';
                    }
                } catch (error) {
                    console.error('Failed to toggle mute:', error);
                }
            }

            toggleVolume() {
                // Volume control implementation
                alert('Volume control feature coming soon!');
            }

            async sendTextMessage() {
                if (!this.room || !this.isConnected) {
                    alert('Please start a voice chat first');
                    return;
                }

                const message = this.textMessageInput.value.trim();
                if (!message) {
                    return;
                }

                try {
                    console.log('[VoiceChat] Sending text message:', message);

                    // Reset inactivity timer when user sends a text message
                    this.resetInactivityTimer();

                    // Send text message using LiveKit's sendText method with lk.chat topic
                    const info = await this.room.localParticipant.sendText(message, {
                        topic: 'lk.chat'
                    });

                    console.log('[VoiceChat] Text message sent successfully:', info);

                    // Add user message to transcript immediately
                    this.addToTranscript('USER', message, new Date().toLocaleTimeString(), true);

                    // Clear the input field
                    this.textMessageInput.value = '';

                    // Show typing indicator
                    this.showSpeakingIndicator('Agent is typing...');

                } catch (error) {
                    console.error('[VoiceChat] Failed to send text message:', error);
                    alert('Failed to send message. Please try again.');
                }
            }

            /**
             * Trigger Tool Selection
             * Sends a special message to the agent to use a specific tool
             */
            async triggerTool(toolName) {
                if (!this.room || !this.isConnected) {
                    alert('Please start a voice chat first');
                    return;
                }

                try {
                    console.log(`[VoiceChat] Triggering tool: ${toolName}`);

                    // Reset inactivity timer
                    this.resetInactivityTimer();

                    // Send natural language message instead of tool request
                    const message = this.getToolPrompt(toolName);

                    const info = await this.room.localParticipant.sendText(message, {
                        topic: 'lk.chat'
                    });

                    console.log(`[VoiceChat] Tool request sent: ${toolName}`);

                    // Add user action to transcript
                    this.addToTranscript('USER', this.getToolPrompt(toolName), new Date().toLocaleTimeString(), true);

                    // Show tool-specific indicator
                    this.showSpeakingIndicator(`${this.getToolDisplayName(toolName)} - Processing...`);

                } catch (error) {
                    console.error(`[VoiceChat] Failed to trigger tool ${toolName}:`, error);
                    alert('Failed to trigger tool. Please try again.');
                }
            }

            /**
             * Get Tool Prompt
             * Returns appropriate prompt text for each tool
             */
            getToolPrompt(toolName) {
                const prompts = {
                    'drug_information': '',
                    'drug_interaction': 'I want to check for drug interactions between my medications.',
                    'symptom_checker': 'I have some symptoms I\'d like to discuss.',
                    'drug_reminder': 'I need help setting up a medication reminder.'
                };
                return prompts[toolName] || 'I need help with a medical question.';
            }

            /**
             * Get Tool Display Name
             * Returns user-friendly name for each tool
             */
            getToolDisplayName(toolName) {
                const names = {
                    'drug_information': 'Drug Information',
                    'drug_interaction': 'Drug Interactions',
                    'symptom_checker': 'Symptom Checker',
                    'drug_reminder': 'Medication Reminder'
                };
                return names[toolName] || 'Medical Tool';
            }

            /**
             * Update Tool Button States
             * Highlights the selected tool and dims others
             */
            updateToolButtonStates(selectedTool) {
                const toolButtons = {
                    'drug_information': this.toolDrugInfoBtn,
                    'drug_interaction': this.toolDrugInteractionBtn,
                    'symptom_checker': this.toolSymptomCheckerBtn,
                    'drug_reminder': this.toolReminderBtn
                };

                const buttonStyles = {
                    'drug_information': {
                        selected: 'btn btn-primary btn-sm w-100',
                        unselected: 'btn btn-outline-primary btn-sm w-100'
                    },
                    'drug_interaction': {
                        selected: 'btn btn-warning btn-sm w-100',
                        unselected: 'btn btn-outline-warning btn-sm w-100'
                    },
                    'symptom_checker': {
                        selected: 'btn btn-info btn-sm w-100',
                        unselected: 'btn btn-outline-info btn-sm w-100'
                    },
                    'drug_reminder': {
                        selected: 'btn btn-success btn-sm w-100',
                        unselected: 'btn btn-outline-success btn-sm w-100'
                    }
                };

                Object.entries(toolButtons).forEach(([toolName, button]) => {
                    if (button && buttonStyles[toolName]) {
                        const styles = buttonStyles[toolName];
                        if (toolName === selectedTool) {
                            button.className = styles.selected;
                            button.style.opacity = '1';
                        } else {
                            button.className = styles.unselected;
                            button.style.opacity = '0.7';
                        }
                    }
                });
            }

            /**
             * Enable Audio on User Interaction
             * Resumes AudioContext and plays any pending audio when user interacts
             */
            async enableAudioOnUserInteraction() {
                try {
                    if (typeof AudioContext !== 'undefined' || typeof webkitAudioContext !== 'undefined') {
                        const AudioContextClass = AudioContext || webkitAudioContext;
                        const audioContext = new AudioContextClass();
                        if (audioContext.state === 'suspended') {
                            await audioContext.resume();
                            console.log('[VoiceChat] AudioContext resumed on user interaction');

                            // Try to play any pending audio elements
                            const audioElements = document.querySelectorAll('audio');
                            for (const audio of audioElements) {
                                if (audio.paused && audio.src) {
                                    try {
                                        await audio.play();
                                        console.log('[VoiceChat] Pending audio started playing');
                                    } catch (e) {
                                        console.warn('[VoiceChat] Failed to play pending audio:', e);
                                    }
                                }
                            }
                        }
                    }
                } catch (error) {
                    console.warn('[VoiceChat] AudioContext resume failed:', error);
                }
            }

            /**
             * Auto-trigger Default Tool
             * Automatically selects and triggers the default tool when voice chat starts
             */
            async autoTriggerDefaultTool() {
                if (this.isConnected && this.defaultTool) {
                    console.log(`[VoiceChat] Auto-triggering default tool: ${this.defaultTool}`);
                    this.selectedTool = this.defaultTool;

                    // Only update button states if elements exist
                    if (this.toolDrugInfoBtn || this.toolDrugInteractionBtn || this.toolSymptomCheckerBtn || this.toolReminderBtn) {
                        this.updateToolButtonStates(this.defaultTool);
                    }

                    // Send the default tool request immediately after connection
                    setTimeout(async () => {
                        await this.triggerTool(this.defaultTool);
                    }, 1000); // Wait 1 second for connection to stabilize
                }
            }

            showAudioControls() {
                if (this.voiceChatContent) {
                    this.voiceChatContent.style.display = 'none';
                }
                if (this.audioControls) {
                    this.audioControls.style.display = 'block';
                }
            }

            showSpeakingIndicator(text) {
                if (this.speakingText) {
                    this.speakingText.textContent = text;
                }
                if (this.speakingIndicator) {
                    this.speakingIndicator.style.display = 'block';

                    // Reset styling for normal indicators
                    if (!text.includes('⚠️') && !text.includes('inactive')) {
                        this.speakingIndicator.style.backgroundColor = '';
                        this.speakingIndicator.style.border = '';
                        this.speakingIndicator.style.color = '';
                    }
                }
            }

            hideSpeakingIndicator() {
                if (this.speakingIndicator) {
                    this.speakingIndicator.style.display = 'none';

                    // Reset styling
                    this.speakingIndicator.style.backgroundColor = '';
                    this.speakingIndicator.style.border = '';
                    this.speakingIndicator.style.color = '';
                }
            }

            async endVoiceChat() {
                if (this.room) {
                    try {
                        await this.room.disconnect();
                    } catch (error) {
                        console.error('Error disconnecting:', error);
                    }
                }
                this.handleDisconnection();
            }

            handleDisconnection() {
                this.isConnected = false;
                this.room = null;
                this.updateStatus('disconnected', 'Disconnected');
                this.updateUI();
                this.connectionInfo.textContent = 'Voice chat ended. Thank you for contacting us!';
                this.voiceChatContent.style.display = 'block';
                this.audioControls.style.display = 'none';
                this.hideSpeakingIndicator();
                this.hideTranscript();

                // Stop inactivity monitoring when call ends
                this.stopInactivityTimer();
            }

            updateStatus(status, text) {
                if (this.voiceChatStatus) {
                    this.voiceChatStatus.className = `badge bg-${status === 'connected' ? 'success' : status === 'connecting' ? 'warning' : 'secondary'}`;
                    this.voiceChatStatus.textContent = text;
                }
            }

            updateUI() {
                if (this.startVoiceChatBtn) {
                    this.startVoiceChatBtn.disabled = this.isConnected;
                }
                if (this.endVoiceChatBtn) {
                    this.endVoiceChatBtn.disabled = !this.isConnected;
                }
            }

            // Transcript methods
            showTranscript() {
                if (this.transcriptSection) {
                    this.transcriptSection.style.display = 'block';
                }
                if (this.transcriptPlaceholder) {
                    this.transcriptPlaceholder.style.display = 'none';
                }
            }

            hideTranscript() {
                if (this.transcriptSection) {
                    this.transcriptSection.style.display = 'none';
                }
                if (this.transcriptPlaceholder) {
                    this.transcriptPlaceholder.style.display = 'flex';
                }
            }

            addToTranscript(speaker, text, timestamp, final = false) {
                // Normalize
                let normalized = (text || '').replace(/\s+/g, ' ').trim();
                if (!normalized) return; // ignore empty

                // Filter tool-call artifacts like: drug_interaction>{"drug1": ...}
                const looksLikeToolCall = /[a-z_]+\s*>?\s*\{[^]*\}$/i.test(normalized) ||
                    /"drug\d"\s*:\s*"/i.test(normalized) ||
                    /^\{[^]*\}$/.test(normalized);
                if (looksLikeToolCall) return;

                // Map agent label to KIARA for display
                const displaySpeaker = speaker === 'AGENT' ? 'KIARA' : speaker;

                // De-duplicate: if last entry is same speaker and same text (case-insensitive), update timestamp only
                const last = this.transcript[this.transcript.length - 1];
                if (last && last.speaker === displaySpeaker && last.text.trim().toLowerCase() === normalized.toLowerCase()) {
                    last.timestamp = timestamp || new Date().toLocaleTimeString();
                    // Prefer marking final if either side is final
                    last.final = last.final || final;
                    this.renderTranscript();
                    return;
                }

                const entry = {
                    speaker: displaySpeaker,
                    text: normalized,
                    timestamp: timestamp || new Date().toLocaleTimeString(),
                    final: final
                };
                this.transcript.push(entry);
                this.renderTranscript();
            }

            renderTranscript() {
                if (!this.transcriptContainer) return;

                if (this.transcript.length === 0) {
                    this.transcriptContainer.innerHTML = '<div class="text-muted text-center">Conversation will appear here...</div>';
                    return;
                }

                let html = '';
                this.transcript.forEach(entry => {
                    const speakerClass = entry.speaker === 'USER' ? 'text-primary' : 'text-success';
                    const speakerIcon = entry.speaker === 'USER' ? 'fas fa-user' : 'fas fa-robot';
                    html += `
                    <div class="mb-2">
                        <small class="text-muted">[${entry.timestamp}]</small>
                        <span class="${speakerClass}">
                            <i class="${speakerIcon}"></i> <strong>${entry.speaker}:</strong>
                        </span>
                        <span>${entry.text}</span>
                    </div>
                `;
                });
                this.transcriptContainer.innerHTML = html;

                // Auto-scroll to bottom
                this.transcriptContainer.scrollTop = this.transcriptContainer.scrollHeight;
            }

            clearTranscript() {
                this.transcript = [];
                this.renderTranscript();
            }

            copyTranscript() {
                if (this.transcript.length === 0) {
                    alert('No transcript to copy');
                    return;
                }

                let text = 'Voice Chat Transcript\n';
                text += '='.repeat(50) + '\n\n';

                this.transcript.forEach(entry => {
                    text += `[${entry.timestamp}] ${entry.speaker}: ${entry.text}\n`;
                });

                navigator.clipboard.writeText(text).then(() => {
                    alert('Transcript copied to clipboard!');
                }).catch(() => {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = text;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    alert('Transcript copied to clipboard!');
                });
            }

            // Render medication JSON into right panel
            renderMedicationDetails(data) {
                const panel = document.getElementById('medicationPanel');
                const content = document.getElementById('medicationContent');
                if (!panel || !content) return;
                panel.style.display = 'block';

                const lines = [];
                const safe = (v) => (v && typeof v === 'string') ? v : '';
                lines.push(`<div><strong>Name:</strong> ${safe(data.name || data.query)}</div>`);
                if (data.usage) lines.push(`<div class="mt-2"><strong>Use / Indications:</strong><br>${safe(data.usage)}</div>`);
                if (data.dosage) lines.push(`<div class=\"mt-2\"><strong>Dosage & Administration:</strong><br>${safe(data.dosage)}</div>`);
                if (data.warnings) lines.push(`<div class=\"mt-2\"><strong>Warnings / Precautions:</strong><br>${safe(data.warnings)}</div>`);
                if (data.sideEffects) lines.push(`<div class=\"mt-2\"><strong>Adverse Reactions:</strong><br>${safe(data.sideEffects)}</div>`);

                content.innerHTML = `<div style=\"white-space: pre-wrap;\">${lines.join('\n')}</div>`;
            }

            // USER live transcription using Web Speech API (Chrome/Edge)
            startUserTranscription() {
                if (!this.SpeechRecognition) {
                    console.warn('[VoiceChat] Web Speech API not supported, skipping local transcription');
                    return;
                }
                if (this.recognition) {
                    try {
                        this.recognition.stop();
                    } catch (e) {}
                    this.recognition = null;
                }
                const recognition = new this.SpeechRecognition();
                recognition.lang = 'en-US';
                recognition.continuous = true;
                recognition.interimResults = true;

                recognition.onresult = (event) => {
                    let interim = '';
                    let finalText = '';
                    for (let i = event.resultIndex; i < event.results.length; i++) {
                        const res = event.results[i];
                        if (res.isFinal) {
                            finalText += res[0].transcript.trim() + ' ';
                        } else {
                            interim += res[0].transcript;
                        }
                    }

                    // Reset inactivity timer when user speaks
                    this.resetInactivityTimer();

                    if (interim) {
                        // merge/update partial line
                        const last = this.transcript[this.transcript.length - 1];
                        const ts = new Date().toLocaleTimeString();
                        if (last && last.speaker === 'USER' && last.final === false) {
                            last.text = interim;
                            last.timestamp = ts;
                            this.renderTranscript();
                        } else {
                            this.addToTranscript('USER', interim, ts, false);
                        }
                    }
                    if (finalText) {
                        const last = this.transcript[this.transcript.length - 1];
                        const tsf = new Date().toLocaleTimeString();
                        if (last && last.speaker === 'USER' && last.final === false) {
                            last.text = finalText.trim();
                            last.timestamp = tsf;
                            last.final = true;
                            this.renderTranscript();
                        } else {
                            this.addToTranscript('USER', finalText.trim(), tsf, true);
                        }
                    }
                };
                recognition.onerror = (e) => {
                    console.warn('[VoiceChat] recognition error', e);
                };
                recognition.onend = () => {
                    if (this.isConnected) {
                        // auto-restart for continuous captions
                        try {
                            recognition.start();
                        } catch (e) {}
                    }
                };
                try {
                    recognition.start();
                    this.recognition = recognition;
                    this.isRecognizing = true;
                    console.log('[VoiceChat] local transcription started');
                } catch (e) {
                    console.warn('[VoiceChat] failed to start recognition', e);
                }
            }

            stopUserTranscription() {
                if (this.recognition) {
                    try {
                        this.recognition.onend = null;
                        this.recognition.stop();
                    } catch (e) {}
                    this.recognition = null;
                    this.isRecognizing = false;
                }
            }

            /**
             * Start Inactivity Timer
             * Monitors user silence and auto-terminates after 20 seconds of inactivity
             */
            startInactivityTimer() {
                this.resetInactivityTimer();
                console.log('[VoiceChat] Inactivity monitoring started (20 second timeout)');
            }

            /**
             * Reset Inactivity Timer
             * Called when user speaks or interacts with the chat
             */
            resetInactivityTimer() {
                // Clear existing timers
                if (this.inactivityTimer) {
                    clearTimeout(this.inactivityTimer);
                    this.inactivityTimer = null;
                }
                if (this.warningTimer) {
                    clearTimeout(this.warningTimer);
                    this.warningTimer = null;
                }

                // Reset warning state
                this.warningShown = false;
                this.lastUserActivity = Date.now();

                // Hide any warning messages
                if (this.speakingIndicator && this.speakingIndicator.style.display === 'block') {
                    const currentText = this.speakingText.textContent;
                    if (currentText.includes('inactive') || currentText.includes('disconnect') || currentText.includes('⚠️')) {
                        this.hideSpeakingIndicator();
                    }
                }

                // Start new inactivity timer only if connected and not during agent speech
                if (this.isConnected && !this.agentSpeaking) {
                    console.log('[VoiceChat] Starting inactivity timer (20 seconds)');

                    // Show warning at 15 seconds (5 seconds before disconnect)
                    this.warningTimer = setTimeout(() => {
                        // Double-check agent isn't speaking before showing warning
                        if (!this.agentSpeaking) {
                            this.showInactivityWarning();
                        } else {
                            console.log('[VoiceChat] Skipping warning - agent is speaking');
                            // Reset timer for when agent finishes
                            this.resetInactivityTimer();
                        }
                    }, 15000);

                    // Auto-disconnect at 20 seconds
                    this.inactivityTimer = setTimeout(() => {
                        // Double-check agent isn't speaking before terminating
                        if (!this.agentSpeaking) {
                            this.autoTerminateCall();
                        } else {
                            console.log('[VoiceChat] Skipping auto-termination - agent is speaking');
                            // Reset timer for when agent finishes
                            this.resetInactivityTimer();
                        }
                    }, this.inactivityTimeout);
                }
            }

            /**
             * Show Inactivity Warning
             * Displays a warning 5 seconds before auto-disconnect
             */
            showInactivityWarning() {
                if (!this.isConnected || this.warningShown || this.agentSpeaking) return;

                this.warningShown = true;
                console.log('[VoiceChat] Showing inactivity warning (5 seconds until disconnect)');

                // Force show the warning with enhanced styling
                this.showSpeakingIndicator('⚠️ Call will end in 5 seconds due to inactivity. Say something to continue...');
                this.connectionInfo.textContent = 'Inactivity detected - Call ending soon';

                // Add visual emphasis to the warning
                if (this.speakingIndicator) {
                    this.speakingIndicator.style.backgroundColor = '#fff3cd';
                    this.speakingIndicator.style.border = '2px solid #ffc107';
                    this.speakingIndicator.style.color = '#856404';
                }

                // Play a subtle audio alert if possible
                try {
                    const beep = new Audio('data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmwhBSuBzvLZiTYIGGS56OeYSQ0NVKzn77FcGAg+ltryxHYmBS16yO/glEILEWO56+mjUBELTKXh8bllHAU2jdXyzn0pBSd+zPLaizsIHGi47OihUBELTKXh8bllHAU2jdXyzn0pBSd+zPDbizsIG2m67OmjTxIKSqPg8bllHAU2jdXyzn0pBSd+zPDbizsIG2m67OmjTxIKSqPg8bllHAU2jdXyzn0pBSd+zPDbizsIG2m67OmjTxIKSqPg8bllHAU2jdXyzn0pBSd+zPDbizsIG2m67OmjTxIKSqPg8bllHAU2jdXy');
                    beep.volume = 0.3;
                    beep.play().catch(() => {}); // Ignore if autoplay is blocked
                } catch (e) {}
            }

            /**
             * Auto Terminate Call
             * Automatically ends the call after 20 seconds of user inactivity
             */
            async autoTerminateCall() {
                if (!this.isConnected) return;

                console.log('[VoiceChat] Auto-terminating call due to 20 seconds of inactivity');

                this.showSpeakingIndicator('Call ended due to inactivity. Thank you!');
                this.connectionInfo.textContent = 'Auto-disconnected due to inactivity';

                // Wait a moment for user to see the message
                await new Promise(resolve => setTimeout(resolve, 2000));

                // End the call
                await this.endVoiceChat();
            }

            /**
             * Stop Inactivity Timer
             * Stops monitoring for inactivity (called when call ends)
             */
            stopInactivityTimer() {
                if (this.inactivityTimer) {
                    clearTimeout(this.inactivityTimer);
                    this.inactivityTimer = null;
                }
                if (this.warningTimer) {
                    clearTimeout(this.warningTimer);
                    this.warningTimer = null;
                }
                this.warningShown = false;
                this.agentSpeaking = false;
                this.agentLastSpoke = 0;
                console.log('[VoiceChat] Inactivity monitoring stopped');
            }
        }

        // Initialize voice chat agent when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize transcript placeholder visibility
            const transcriptPlaceholder = document.getElementById('transcriptPlaceholder');
            const transcriptSection = document.getElementById('transcriptSection');
            if (transcriptPlaceholder && transcriptSection) {
                transcriptPlaceholder.style.display = 'flex';
                transcriptSection.style.display = 'none';
            }

            // Wait a bit for scripts to load
            setTimeout(function() {
                // Check if LiveKit is loaded
                if (typeof LiveKit === 'undefined') {
                    console.error('LiveKit SDK not loaded! Trying fallback...');

                    // Try to load from CDN as fallback
                    const script = document.createElement('script');
                    script.src = 'https://unpkg.com/livekit-client@latest/dist/livekit-client.umd.js';
                    script.onload = function() {
                        // Create alias if CDN exposes LivekitClient
                        if (typeof window.LiveKit === 'undefined' && typeof window.LivekitClient !== 'undefined') {
                            window.LiveKit = window.LivekitClient;
                        }
                        console.log('LiveKit SDK loaded from fallback CDN');
                        window.contactVoiceChatAgent = new ContactVoiceChatAgent();
                    };
                    script.onerror = function() {
                        console.error('All LiveKit CDN sources failed');
                        alert('LiveKit SDK failed to load from all sources. Please check your internet connection and refresh the page.');
                    };
                    document.head.appendChild(script);
                    return;
                }

                console.log('LiveKit SDK loaded successfully');
                window.contactVoiceChatAgent = new ContactVoiceChatAgent();
            }, 1000); // Wait 1 second for scripts to load
        });
    </script>

</body>

</html>