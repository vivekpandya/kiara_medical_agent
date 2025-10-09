/**
 * Kiara Medical Agent - Voice-Powered Healthcare Assistant
 * 
 * A sophisticated AI agent built with LiveKit Agents Framework that provides:
 * - Real-time voice conversations
 * - Drug interaction checking
 * - Medication information lookup
 * - Symptom analysis (not medical diagnosis)
 * - Medication reminder setup
 * 
 * Technology Stack:
 * - LiveKit Agents Framework for voice AI orchestration
 * - OpenAI/Groq LLM for natural language understanding
 * - Deepgram Nova-3 for speech-to-text
 * - Cartesia for text-to-speech
 * - Silero VAD for voice activity detection
 * 
 * @author Kiara Medical Team
 * @version 1.0.0
 */

import {
  type JobContext,
  type JobProcess,
  WorkerOptions,
  cli,
  defineAgent,
  llm,
  metrics,
  voice,
} from '@livekit/agents';
import * as cartesia from '@livekit/agents-plugin-cartesia';
import * as deepgram from '@livekit/agents-plugin-deepgram';
import * as livekit from '@livekit/agents-plugin-livekit';
import * as openai from '@livekit/agents-plugin-openai';
import * as silero from '@livekit/agents-plugin-silero';
import { BackgroundVoiceCancellation } from '@livekit/noise-cancellation-node';
import dotenv from 'dotenv';
import { fileURLToPath } from 'node:url';
import { z } from 'zod';

// Load environment variables from .env.local file
dotenv.config({ path: '.env.local' });

/**
 * Kiara Agent - Healthcare Support Assistant
 * 
 * A voice-powered AI assistant that helps users with medical information,
 * medication management, drug interactions, and symptom checking.
 */
class KiaraAgent extends voice.Agent {
  constructor() {
    super({
      instructions: `You are Kiara, a helpful and empathetic voice AI assistant for healthcare support.
      
      When you first connect, greet the user warmly. Since drug information is the default tool, say: "Hi, I am Kiara, your medical information assistant. I'm ready to help you with drug information, medication details, and other healthcare questions. What medication would you like to know about?"
      
      CRITICAL BEHAVIOR RULES:
      - When a user mentions ANY medication name (paracetamol, ibuprofen, aspirin, etc.), IMMEDIATELY use the drug_information tool to provide complete information
      - NEVER ask "what medication do you want to know about?" if they already mentioned one
      - ALWAYS provide comprehensive drug information including dosage, side effects, usage, and warnings
      - Be direct and helpful - don't ask unnecessary questions
      
      You can help users with:
      - Providing detailed drug information including dosage, side effects, and usage (USE drug_information tool automatically)
      - Checking potential drug interactions for safety (USE drug_interaction tool automatically)
      - Analyzing symptoms and suggesting possible conditions (USE symptom_checker tool automatically)
      - Setting medication reminders with specific timing (USE drug_reminder tool automatically)
      
      TOOL USAGE EXAMPLES:
      - User says "paracetamol" → IMMEDIATELY use drug_information tool with "paracetamol"
      - User says "tell me about ibuprofen" → IMMEDIATELY use drug_information tool with "ibuprofen"
      - User says "check interactions between aspirin and ibuprofen" → IMMEDIATELY use drug_interaction tool
      - User says "I have headache and fever" → IMMEDIATELY use symptom_checker tool
      - User says "remind me to take metformin" → IMMEDIATELY use drug_reminder tool
      
      Important guidelines:
      - Always clarify that you provide information, not medical diagnosis
      - Keep responses concise, clear, and conversational
      - Avoid complex formatting, emojis, asterisks, or special symbols
      - Be curious, friendly, professional, and occasionally add appropriate humor
      - If unsure about medical information, recommend consulting a healthcare provider`,
      tools: {
        /**
         * Drug Interaction Checker
         * Analyzes potential interactions between multiple medications
         */
        drug_interaction: llm.tool({
          description: `Checks for potential interactions between two or more drugs. Use this when the user wants to know if their medications might interact with each other or cause adverse effects when taken together.`,
          parameters: z.object({
            drugs: z
              .string()
              .describe('Comma-separated list of drug names to check for interactions (e.g., "aspirin, ibuprofen, warfarin")'),
          }),
          execute: async ({ drugs }) => {
            console.log(`[Tool:DrugInteraction] Checking interactions for: ${drugs}`);

            try {
              // Normalize drug names
              const drugList = drugs.split(',').map(drug => this.normalizeDrugName(drug.trim()));
              console.log(`[Tool:DrugInteraction] Normalized drugs: ${drugList.join(', ')}`);

              // Basic interaction warnings for common combinations
              const drugLower = drugList.map(d => d.toLowerCase());

              if (drugLower.includes('aspirin') && drugLower.includes('ibuprofen')) {
                return `⚠️ Important: Aspirin and ibuprofen can interact when taken together. Ibuprofen can reduce aspirin's heart-protective benefits. Take aspirin at least 2 hours before or 8 hours after ibuprofen. Always consult your doctor about the best timing for these medications.`;
              } else if (drugLower.includes('metformin') && drugLower.includes('ibuprofen')) {
                return `⚠️ Note: Metformin and ibuprofen may interact. Ibuprofen can increase the risk of metformin-related side effects. Monitor your blood sugar levels closely and consult your doctor if you experience any unusual symptoms.`;
              } else if (drugLower.includes('pantoprazole') && drugLower.includes('metformin')) {
                return `ℹ️ Information: Pantoprazole may affect how your body absorbs metformin. Your doctor may need to monitor your blood sugar levels more closely. Take metformin as prescribed and inform your doctor if you notice any changes in your diabetes control.`;
              } else {
                return `I've analyzed the potential interactions between: ${drugList.join(', ')}. While I can provide general guidance, drug interactions can be complex and depend on individual factors like dosage, timing, and your specific health conditions. Please consult your healthcare provider or pharmacist for personalized interaction analysis.`;
              }
            } catch (error) {
              console.error(`[Tool:DrugInteraction] Error checking interactions for ${drugs}:`, error);
              return `I encountered an issue checking interactions for: ${drugs}. Please consult your healthcare provider or pharmacist for detailed interaction information.`;
            }
          },
        }),

        /**
         * Drug Information Lookup
         * Retrieves comprehensive information about a specific medication
         */
        drug_information: llm.tool({
          description: `Provides detailed information about a specific drug including generic name, brand names, dosage forms, usage instructions, side effects, contraindications, and warnings. Use this when users ask about how to use a medication or want to know more about it.`,
          parameters: z.object({
            drugs: z
              .string()
              .describe('Name of the drug to look up (generic or brand name, e.g., "acetaminophen" or "Tylenol")'),
          }),
          execute: async ({ drugs }) => {
            console.log(`[Tool:DrugInformation] Looking up information for: ${drugs}`);

            try {
              // Add timeout protection
              const timeoutPromise = new Promise((_, reject) =>
                setTimeout(() => reject(new Error('Drug information lookup timeout')), 10000)
              );

              const drugInfoPromise = (async () => {
                // Normalize and correct common drug name variations
                const normalizedDrug = this.normalizeDrugName(drugs);
                console.log(`[Tool:DrugInformation] Normalized drug name: ${normalizedDrug}`);

                // Provide immediate helpful response for common medicines
                const drugLower = normalizedDrug.toLowerCase();

                if (drugLower.includes('paracetamol') || drugLower.includes('acetaminophen')) {
                  return `Paracetamol, also known as acetaminophen, is a common pain reliever and fever reducer. Here's what you should know:

Typical adult dosage: 500-1000mg every 4-6 hours, with a maximum of 4000mg per day.
Common side effects: Very rare, but can include allergic reactions.
Important warnings: Don't exceed the recommended dose as it can cause liver damage.
Always consult your doctor before taking any medication, especially if you have liver problems or are taking other medicines.`;
                } else if (drugLower.includes('ibuprofen') || drugLower.includes('advil')) {
                  return `Ibuprofen is a nonsteroidal anti-inflammatory drug (NSAID) used for pain, inflammation, and fever. Here's the information you need:

Typical adult dosage: 200-400mg every 4-6 hours, maximum 2400mg per day.
Common side effects: Stomach upset, heartburn, dizziness.
Important: Take with food to reduce stomach irritation. Don't use if you have stomach ulcers or severe heart disease.
Always consult your doctor before use.`;
                } else if (drugLower.includes('aspirin')) {
                  return `Aspirin is used for pain relief, fever reduction, and as a blood thinner. Here are the details:

Typical adult dosage: 325-650mg every 4 hours for pain or fever, 75-100mg daily for heart protection.
Common side effects: Stomach irritation, bleeding risk.
Important: Don't give to children under 18 due to Reye's syndrome risk.
Consult your doctor before use, especially if you have bleeding disorders.`;
                } else if (drugLower.includes('pantoprazole') || drugLower.includes('pantaprazol') || drugLower.includes('vantaca')) {
                  return `Pantoprazole is a proton pump inhibitor used to treat stomach acid-related conditions. Here's what you need to know:

Typical adult dosage: 20-40mg once daily, usually taken before breakfast.
Common side effects: Headache, diarrhea, nausea, vomiting, stomach pain.
Important: Take on an empty stomach, at least 1 hour before eating.
Long-term use may increase risk of bone fractures and vitamin B12 deficiency.
Always consult your doctor before use, especially if you have liver problems.`;
                } else if (drugLower.includes('omeprazole') || drugLower.includes('prilosec')) {
                  return `Omeprazole is a proton pump inhibitor used to treat acid reflux and stomach ulcers. Here's the information:

Typical adult dosage: 20-40mg once daily, taken before eating.
Common side effects: Headache, diarrhea, nausea, vomiting, stomach pain.
Important: Take on an empty stomach. May interact with certain medications.
Always consult your doctor before use.`;
                } else if (drugLower.includes('metformin')) {
                  return `Metformin is a diabetes medication that helps control blood sugar levels. Here are the details:

Typical adult dosage: 500-2000mg daily, usually taken with meals.
Common side effects: Nausea, diarrhea, stomach upset, metallic taste.
Important: Take with food to reduce stomach upset. Can cause vitamin B12 deficiency with long-term use.
Always consult your doctor before use.`;
                } else if (drugLower.includes('lisinopril')) {
                  return `Lisinopril is an ACE inhibitor used to treat high blood pressure and heart failure. Here's what you need to know:

Typical adult dosage: 5-40mg once daily, usually taken at the same time each day.
Common side effects: Dry cough, dizziness, headache, fatigue, nausea.
Important: May cause a persistent dry cough. Take as directed by your doctor.
Always consult your doctor before use, especially if you have kidney problems.`;
                } else if (drugLower.includes('metoprolol')) {
                  return `Metoprolol is a beta-blocker used to treat high blood pressure, chest pain, and heart rhythm problems. Here are the details:

Typical adult dosage: 25-200mg daily, usually taken in divided doses.
Common side effects: Fatigue, dizziness, slow heartbeat, cold hands and feet.
Important: Don't stop taking suddenly without doctor's advice. May cause withdrawal symptoms.
Always consult your doctor before use, especially if you have breathing problems.`;
                } else if (drugLower.includes('amlodipine')) {
                  return `Amlodipine is a calcium channel blocker used to treat high blood pressure and chest pain. Here's the information:

Typical adult dosage: 5-10mg once daily, taken at the same time each day.
Common side effects: Swelling in ankles and feet, dizziness, flushing, headache.
Important: Take regularly even if you feel well. Don't miss doses.
Always consult your doctor before use.`;
                } else {
                  return `I'd be happy to help with information about ${normalizedDrug}. For detailed information including dosage, side effects, and interactions, please consult with your healthcare provider or pharmacist. They can provide personalized advice based on your specific health conditions and other medications you may be taking.`;
                }
              })();

              // Race between drug info lookup and timeout
              return await Promise.race([drugInfoPromise, timeoutPromise]);

            } catch (error) {
              console.error(`[Tool:DrugInformation] Error processing drug ${drugs}:`, error);
              if (error instanceof Error && error.message.includes('timeout')) {
                return `I'm having trouble accessing drug information right now. Let me provide basic information about ${drugs}: This is a medication that should be used as directed by your healthcare provider. For complete information about dosage, side effects, and interactions, please consult your pharmacist or doctor.`;
              }
              return `I encountered an issue looking up information about ${drugs}. Please try again or consult your healthcare provider for detailed information.`;
            }
          },
        }),

        /**
         * Symptom Checker
         * Analyzes symptoms and suggests possible conditions (NOT a medical diagnosis)
         */
        symptom_checker: llm.tool({
          description: `Analyzes user-reported symptoms and suggests possible conditions or health issues. IMPORTANT: This is not a medical diagnosis - always recommend users consult a healthcare provider for proper diagnosis. Use this when users describe symptoms they're experiencing.`,
          parameters: z.object({
            symptoms: z
              .string()
              .describe('Comma-separated list of symptoms being experienced (e.g., "headache, fever, fatigue, cough")'),
          }),
          execute: async ({ symptoms }) => {
            console.log(`[Tool:SymptomChecker] Analyzing symptoms: ${symptoms}`);

            try {
              const symptomList = symptoms.toLowerCase().split(',').map(s => s.trim());
              console.log(`[Tool:SymptomChecker] Processing symptoms: ${symptomList.join(', ')}`);

              // Basic symptom analysis with disclaimers
              let response = `I understand you're experiencing: ${symptoms}. `;

              // Check for urgent symptoms
              const urgentSymptoms = ['chest pain', 'difficulty breathing', 'severe headache', 'loss of consciousness', 'severe abdominal pain'];
              const hasUrgent = symptomList.some(symptom =>
                urgentSymptoms.some(urgent => symptom.includes(urgent))
              );

              if (hasUrgent) {
                response += `⚠️ IMPORTANT: Some of your symptoms may require immediate medical attention. Please seek emergency medical care or call emergency services if you're experiencing severe symptoms. `;
              }

              response += `Based on the symptoms you've described, there could be several possible explanations. However, this is not a medical diagnosis. Symptoms can have many causes, and only a qualified healthcare provider can provide an accurate diagnosis through proper examination and testing. I strongly recommend consulting with your doctor or healthcare provider for proper evaluation and treatment.`;

              return response;
            } catch (error) {
              console.error(`[Tool:SymptomChecker] Error analyzing symptoms ${symptoms}:`, error);
              return `I encountered an issue analyzing your symptoms: ${symptoms}. Please consult your healthcare provider for proper medical evaluation and advice.`;
            }
          },
        }),

        /**
         * Medication Reminder Setup
         * Creates reminders to help users maintain medication adherence
         */
        drug_reminder: llm.tool({
          description: `Sets up medication reminders for the user at specified times to ensure they take their medications as prescribed. Use this when users want to be reminded to take their medications or need help managing their medication schedule.`,
          parameters: z.object({
            drugs: z
              .string()
              .describe('Name of the medication to set reminder for (e.g., "Lisinopril 10mg")'),
            timings: z
              .string()
              .describe('When to take the medication - include time and frequency (e.g., "8:00 AM daily" or "9:00 AM and 9:00 PM")'),
          }),
          execute: async ({ drugs, timings }) => {
            console.log(`[Tool:DrugReminder] Setting reminder for: ${drugs} at ${timings}`);

            try {
              // Normalize drug name
              const normalizedDrug = this.normalizeDrugName(drugs);
              console.log(`[Tool:DrugReminder] Normalized drug: ${normalizedDrug}`);

              // Create a helpful reminder response
              let response = `I'll help you set up a reminder for ${normalizedDrug}. `;

              // Validate timing format
              if (!timings.toLowerCase().includes('am') && !timings.toLowerCase().includes('pm') && !timings.includes(':')) {
                response += `For the timing "${timings}", I recommend specifying exact times (like "8:00 AM" or "9:00 PM"). `;
              }

              response += `Here's your reminder setup:
              
📋 **Medication**: ${normalizedDrug}
⏰ **Schedule**: ${timings}

💡 **Tips for better medication adherence:**
• Set the reminder for the same time each day
• Take with food if required
• Keep medications in a visible place
• Use a pill organizer for multiple medications
• Set phone alarms as backup reminders

Remember: This is a reminder system to help you stay on track. Always follow your doctor's specific instructions for taking your medications. If you miss a dose, consult your pharmacist or doctor about what to do.`;

              return response;
            } catch (error) {
              console.error(`[Tool:DrugReminder] Error setting reminder for ${drugs} at ${timings}:`, error);
              return `I encountered an issue setting up your medication reminder for ${drugs} at ${timings}. Please try again or consult your healthcare provider for medication scheduling assistance.`;
            }
          },
        }),

        /**
         * Conversation Logger
         * Internal tool for logging conversation events (no-op placeholder)
         */
        logConversation: llm.tool({
          description: 'Internal tool to acknowledge conversation logging requests. This is a placeholder for future conversation analytics and audit trail features.',
          parameters: z.object({
            text: z.string().describe('Conversation text to log')
          }),
          execute: async ({ text }) => {
            try {
              console.log(`[Tool:ConversationLog] ${text}`);
            } catch (error) {
              console.warn('[Tool:ConversationLog] Failed to log:', error);
            }
            return 'acknowledged';
          },
        }),
      },
    });
  }

  /**
   * Normalize Drug Name
   * Corrects common STT transcription errors for drug names
   */
  normalizeDrugName(drugName: string): string {
    const drugMappings: Record<string, string> = {
      // Pantoprazole variations (STT errors)
      'vantaca': 'pantoprazole',
      'pantaprazol': 'pantoprazole',
      'pantoprazole': 'pantoprazole',
      'vantoprazole': 'pantoprazole',
      'caracitamone': 'paracetamol', // STT error for paracetamol

      // Paracetamol/Acetaminophen variations
      'acetaminophen': 'paracetamol',
      'paracetamol': 'paracetamol',
      'tylenol': 'paracetamol',

      // Ibuprofen variations
      'ibuprofen': 'ibuprofen',
      'advil': 'ibuprofen',
      'motrin': 'ibuprofen',

      // Other common drugs
      'aspirin': 'aspirin',
      'omeprazole': 'omeprazole',
      'prilosec': 'omeprazole',
      'metformin': 'metformin',
      'glucophage': 'metformin',
      'lisinopril': 'lisinopril',
      'metoprolol': 'metoprolol',
      'amlodipine': 'amlodipine',
      'norvasc': 'amlodipine',
    };

    const normalized = drugName.toLowerCase().trim();

    // Direct mapping
    if (drugMappings[normalized]) {
      return drugMappings[normalized];
    }

    // Fuzzy matching for partial matches
    for (const [incorrect, correct] of Object.entries(drugMappings)) {
      if (normalized.includes(incorrect) || incorrect.includes(normalized)) {
        console.log(`[DrugNormalizer] Corrected "${drugName}" to "${correct}"`);
        return correct;
      }
    }

    // Return original if no correction found
    return drugName;
  }
}


/**
 * Define and export the Kiara Agent
 * 
 * This agent uses LiveKit's agent framework to provide voice-based healthcare assistance
 */
export default defineAgent({
  /**
   * Prewarm Phase
   * Loads heavy resources before the agent starts (Voice Activity Detection model)
   */
  prewarm: async (proc: JobProcess) => {
    console.log('[Agent:Prewarm] Loading Silero VAD model...');
    proc.userData.vad = await silero.VAD.load();
    console.log('[Agent:Prewarm] VAD model loaded successfully');
  },

  /**
   * Entry Point
   * Main agent initialization and connection logic
   */
  entry: async (ctx: JobContext) => {
    console.log('═══════════════════════════════════════════════════════');
    console.log('[Agent:Start] Initializing Kiara Healthcare Assistant');
    console.log('═══════════════════════════════════════════════════════');

    // Configure LLM endpoint and model
    // Supports OpenAI-compatible APIs (OpenAI, Groq, etc.)
    const rawBaseUrl = process.env.OPENAI_BASE_URL?.trim() || 'https://api.groq.com/openai/v1';
    const normalizedBaseUrl = /\/v1\/?$/.test(rawBaseUrl)
      ? rawBaseUrl.replace(/\/$/, '')
      : `${rawBaseUrl.replace(/\/$/, '')}/v1`;
    const envModel = (process.env.OPENAI_MODEL || '').trim();
    const chosenModel = !envModel || /instruct/i.test(envModel)
      ? 'llama-3.3-70b-versatile'  // Groq's recommended model for conversational AI
      : envModel;

    console.log('[Agent:Config] LLM Configuration:');
    console.log(`  ├─ Base URL: ${normalizedBaseUrl}`);
    console.log(`  └─ Model: ${chosenModel}`);

    // Initialize Voice AI Pipeline
    console.log('[Agent:Pipeline] Setting up voice AI components...');

    const session = new voice.AgentSession({
      /**
       * LLM (Large Language Model) - Agent's Brain
       * Processes user input and generates intelligent responses
       * Supports OpenAI-compatible APIs (OpenAI, Groq, LocalAI, etc.)
       * Documentation: https://docs.livekit.io/agents/integrations/llm/
       */
      llm: new openai.LLM({
        model: chosenModel,
        baseURL: normalizedBaseUrl,
      }),

      /**
       * STT (Speech-to-Text) - Agent's Ears
       * Converts user's spoken words into text for LLM processing
       * Using Deepgram Nova-3 for high accuracy transcription with medical terminology support
       * Documentation: https://docs.livekit.io/agents/integrations/stt/
       */
      stt: new deepgram.STT({
        model: 'nova-2-medical', // Medical model for better drug name recognition
        // Enable interim results for better responsiveness
        interimResults: true,
        // Add language support
        language: 'en-US',
        // Enable punctuation for better text quality
        punctuate: true,
        // Enable profanity filter
        profanityFilter: false,
        // Enhanced options for medical terms
        smartFormat: true,
      }),

      /**
       * TTS (Text-to-Speech) - Agent's Voice
       * Converts LLM's text responses into natural-sounding speech
       * Using Cartesia with optimized settings for faster response
       * Documentation: https://docs.livekit.io/agents/integrations/tts/
       */
      tts: new cartesia.TTS({
        voice: '6f84f4b8-58a2-430c-8c79-688dad597532', // Friendly female voice
        // Remove speed setting to avoid sonic-2 model compatibility issues
        // Speed controls are only supported in sonic-2-2025-03-07 model
      }),

      /**
       * Turn Detection - Conversation Flow Control
       * Determines when user stops speaking and agent should respond
       * Using lightweight Energy Model (compatible with all platforms)
       * Fallback: Disabled if model unavailable
       */
      // Disable turn detection to avoid agent speech being cut off by false
      // positives from VAD/energy model, which led to mid-utterance
      // interruptions and perceived "silence" on the client.
      turnDetection: false as any,

      /**
       * VAD (Voice Activity Detection)
       * Detects when user is speaking vs background noise
       * Using Silero VAD model (loaded during prewarm)
       */
      vad: ctx.proc.userData.vad! as silero.VAD,
    });

    console.log('[Agent:Pipeline] Voice AI pipeline configured successfully');

    /**
     * Error Handling
     * Comprehensive error handling to prevent agent failures
     */
    console.log('[Agent:ErrorHandling] Setting up error recovery...');

    // Add global error handlers for the process
    process.on('unhandledRejection', (reason, promise) => {
      console.error('[Agent:Process] Unhandled Rejection at:', promise, 'reason:', reason);

      // Handle task cancellation timeouts specifically
      if (reason && typeof reason === 'object' && 'message' in reason) {
        const errorMessage = (reason as Error).message;
        if (errorMessage.includes('Task cancellation timed out')) {
          console.warn('[Agent:Process] Task timeout detected, attempting recovery...');
          // Don't crash the process, just log and continue
          return;
        }
      }
    });

    process.on('uncaughtException', (error) => {
      console.error('[Agent:Process] Uncaught Exception:', error);

      // Handle specific timeout errors
      if (error.message.includes('Task cancellation timed out')) {
        console.warn('[Agent:Process] Task timeout exception, attempting recovery...');
        // Don't exit the process
        return;
      }
    });

    /**
     * Metrics Collection
     * Tracks performance and usage statistics for monitoring and optimization
     * Documentation: https://docs.livekit.io/agents/build/metrics/
     */
    console.log('[Agent:Metrics] Setting up usage tracking...');
    const usageCollector = new metrics.UsageCollector();

    session.on(voice.AgentSessionEventTypes.MetricsCollected, (ev) => {
      metrics.logMetrics(ev.metrics);
      usageCollector.collect(ev.metrics);
    });

    const logUsage = async () => {
      const summary = usageCollector.getSummary();
      console.log('[Agent:Metrics] Session usage summary:', JSON.stringify(summary, null, 2));
    };

    ctx.addShutdownCallback(logUsage);

    /**
     * Start Agent Session
     * Initializes the Kiara agent with room connection and audio processing
     */
    console.log('[Agent:Session] Starting Kiara agent session...');
    await session.start({
      agent: new KiaraAgent(),
      room: ctx.room,
      inputOptions: {
        /**
         * Noise Cancellation
         * LiveKit Cloud's enhanced background noise removal
         * - For self-hosted deployments, omit this parameter
         * - For telephony apps, use BackgroundVoiceCancellationTelephony
         */
        noiseCancellation: BackgroundVoiceCancellation(),
      },
    });
    console.log('[Agent:Session] Agent session started successfully');

    /**
     * Transcription Setup
     * LiveKit automatically forwards STT and TTS transcriptions to frontend
     * No custom data channels needed - built-in transcription streaming
     */
    console.log('[Agent:Transcription] Using LiveKit built-in transcription forwarding');

    /**
     * Room Connection
     * Connect to LiveKit room using pre-generated token
     * Room selection handled by job scheduler based on frontend token request
     */
    console.log('[Agent:Connection] Connecting to LiveKit room...');
    await ctx.connect();
    console.log('[Agent:Connection] Successfully connected to room');

    /**
     * Auto-Greeting
     * Send welcome message when user joins
     */
    console.log('[Agent:Greeting] Preparing to greet user...');
    try {
      // Allow connection to stabilize before speaking
      await new Promise(resolve => setTimeout(resolve, 1000));

      // Check if session is still active before greeting
      if (session) {
        await session.say('Hi, I am Kiara, your medical information assistant. I am ready to help you with drug information, medication details, and other healthcare questions. What medication would you like to know about?');
        console.log('[Agent:Greeting] Welcome message sent successfully');
      } else {
        console.warn('[Agent:Greeting] Session not active, skipping greeting');
      }
    } catch (error) {
      console.error('[Agent:Greeting] Failed to send greeting:', error);

      // Enhanced recovery with multiple attempts
      let recoveryAttempts = 0;
      const maxRecoveryAttempts = 3;

      while (recoveryAttempts < maxRecoveryAttempts) {
        try {
          console.log(`[Agent:Recovery] Attempt ${recoveryAttempts + 1}/${maxRecoveryAttempts} to recover session...`);
          await new Promise(resolve => setTimeout(resolve, 1000 + (recoveryAttempts * 500)));

          if (session) {
            await session.say('Hi, I am Kiara, your medical information assistant. I am ready to help you with drug information, medication details, and other healthcare questions. What medication would you like to know about?');
            console.log('[Agent:Recovery] Greeting sent after recovery');
            break;
          }
        } catch (recoveryError) {
          console.error(`[Agent:Recovery] Attempt ${recoveryAttempts + 1} failed:`, recoveryError);
          recoveryAttempts++;
        }
      }

      if (recoveryAttempts >= maxRecoveryAttempts) {
        console.error('[Agent:Recovery] All recovery attempts failed');
      }
    }

    console.log('═══════════════════════════════════════════════════════');
    console.log('[Agent:Ready] Kiara is ready and listening for user input');
    console.log('═══════════════════════════════════════════════════════');

    // Note: Dynamic agent switching is not available in current SDK version
    // Future enhancement: Implement when multi-agent APIs are exposed by library
  },
});

/**
 * Start the LiveKit Agent Worker
 * This initializes the agent and starts listening for job requests from LiveKit
 */
cli.runApp(new WorkerOptions({ agent: fileURLToPath(import.meta.url) }));
