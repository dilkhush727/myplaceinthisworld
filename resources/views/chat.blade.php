<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Place AI Assistant</title>

    <!-- Tailwind CSS (CDN for immediate rendering without build step) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Brand Configuration for Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            yellow: '#FFC400', // Primary Bright Yellow
                            red: '#D90A2E',    // Accent Red
                            green: '#008000',  // Accent Green
                            cream: '#F7F5EE',  // Background Cream
                            dark: '#1a1a1a',   // Dark Text/Sidebar
                        }
                    },
                    fontFamily: {
                        sans: ['Helvetica Neue', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Scrollbar for sleek look */
        .chat-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .chat-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .chat-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
        
        /* Typing Animation Dots */
        .typing-dot {
            animation: typing 1.4s infinite ease-in-out both;
        }
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        /* Message Slide-in Animation */
        .message-enter {
            animation: slideIn 0.3s ease-out forwards;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-brand-cream h-screen flex flex-col font-sans overflow-hidden">

   @if (!$conversation)
    <!-- 1. LANGUAGE SELECTION MODAL (Overlay) -->
    <div id="language-modal" class="fixed inset-0 z-50 bg-brand-dark/95 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center transform transition-all scale-100">
            <div class="w-16 h-16 bg-brand-yellow rounded-full flex items-center justify-center mx-auto mb-6 text-2xl shadow-md">
                👋
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome / Bienvenue</h2>
            <p class="text-gray-500 mb-8">
                Please select your preferred language to begin.<br>
                Veuillez choisir votre langue préférée pour commencer.
            </p>
            
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <button
                    onclick="selectLanguage('en')"
                    class="group relative flex items-center justify-center py-4 px-6 border-2 border-brand-yellow bg-white rounded-xl hover:bg-brand-yellow hover:text-black transition-all duration-200 shadow-sm hover:shadow-md"
                >
                    <span class="font-bold text-lg">English</span>
                </button>

                <button
                    onclick="selectLanguage('fr')"
                    class="group relative flex items-center justify-center py-4 px-6 border-2 border-brand-yellow bg-white rounded-xl hover:bg-brand-yellow hover:text-black transition-all duration-200 shadow-sm hover:shadow-md"
                >
                    <span class="font-bold text-lg">Français</span>
                </button>
            </div>
        </div>
    </div>
@endif


    <!-- 2. HEADER -->
    <header class="bg-brand-yellow shadow-md px-6 py-4 flex items-center justify-between shrink-0 z-10 relative">
        <div class="flex items-center space-x-3">
            <!-- Brand Logo Placeholder -->
            <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center text-brand-yellow font-bold text-xl">
                MP
            </div>
            <div>
                <h1 class="font-bold text-gray-900 text-lg leading-tight">AI Assistant</h1>
                <p class="text-xs text-gray-800 font-medium opacity-80 flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span>
                    <span id="header-subtitle">Student Success Guide</span>
                </p>
            </div>
        </div>
        <!-- Refresh/Reset Button -->
        <button onclick="location.reload()" class="p-2 text-gray-800 hover:bg-black/10 rounded-full transition-colors" title="Reset Chat">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </button>
    </header>

    <!-- 3. MAIN CHAT AREA -->
    <main id="chat-container" class="...">
    @foreach($messages ?? [] as $message)
        <div class="w-full flex {{ $message->sender_type === 'user' ? 'justify-end' : 'justify-start' }} message-enter">
            <div class="{{ $message->sender_type === 'user' ? 'bg-brand-yellow text-gray-900' : 'bg-white border' }} px-5 py-3.5 rounded-2xl">
                {!! nl2br(e($message->content)) !!}
            </div>
        </div>
    @endforeach
</main>


    <!-- 4. BOTTOM INPUT AREA -->
    <footer class="bg-white border-t border-gray-200 p-4 shrink-0 z-10">
        <form id="chat-form" class="max-w-4xl mx-auto relative flex items-end gap-3" onsubmit="handleChatSubmit(event)">
            
            <div class="flex-1 bg-gray-100 rounded-2xl border border-gray-200 focus-within:border-brand-yellow focus-within:ring-2 focus-within:ring-brand-yellow/20 transition-all">
                <textarea 
                    id="user-input" 
                    rows="1" 
                    class="w-full bg-transparent px-5 py-4 outline-none text-gray-800 resize-none max-h-32 rounded-2xl" 
                    placeholder="Type your message..."
                    disabled
                ></textarea>
            </div>

            <button 
                type="submit" 
                id="send-btn"
                disabled
                class="bg-brand-yellow text-gray-900 rounded-full p-4 hover:bg-[#e6b000] disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm hover:shadow-md flex-shrink-0"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </button>
        </form>
        <div class="text-center mt-2">
            <span class="text-[10px] text-gray-400">Powered by My Place In This World AI</span>
        </div>
    </footer>

   <script>
    // --- Configuration & State ---
    const config = {
        endpoints: {
            message: "{{ route('chat.message') }}"
        },
        csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };

    const state = {
        language: null,
        isTyping: false
    };

    // Get initial language from backend conversation (if any)
    const initialLanguage = @json(optional($conversation)->language);

    if (initialLanguage) {
        state.language = initialLanguage;
    }

    // --- DOM Elements ---
    const els = {
        modal: document.getElementById('language-modal'),
        chatContainer: document.getElementById('chat-container'),
        chatForm: document.getElementById('chat-form'),
        input: document.getElementById('user-input'),
        sendBtn: document.getElementById('send-btn'),
        subtitle: document.getElementById('header-subtitle')
    };

    // On page load, if we already know the language (existing conversation),
    // configure the UI and enable input without showing the modal
    document.addEventListener('DOMContentLoaded', () => {
        if (state.language) {
            const placeholder = state.language === 'fr'
                ? "Tapez votre message..."
                : "Type your message...";

            const subtitle = state.language === 'fr'
                ? "Guide de réussite étudiante"
                : "Student Success Guide";

            els.input.placeholder = placeholder;
            els.subtitle.textContent = subtitle;
            els.input.disabled = false;
            els.sendBtn.disabled = false;

            if (els.modal) {
                els.modal.remove();
            }
        }
    });


        // --- 1. Language Selection Logic ---
        function selectLanguage(lang) {
            state.language = lang;
            
            // UI Updates based on language
            const greeting = lang === 'en' 
                ? "Hello! I am your student success guide. How can I help you today?" 
                : "Bonjour ! Je suis votre guide de réussite étudiante. Comment puis-je vous aider aujourd'hui ?";
            
            const placeholder = lang === 'en' 
                ? "Type your message..." 
                : "Tapez votre message...";
            
            const subtitle = lang === 'en' ? "Student Success Guide" : "Guide de réussite étudiante";

            // Update DOM
            els.input.placeholder = placeholder;
            els.subtitle.textContent = subtitle;
            
            // Hide Modal with fade out
            els.modal.style.opacity = '0';
            els.modal.style.transition = 'opacity 0.5s ease';
            setTimeout(() => els.modal.remove(), 500);

            // Enable Input
            els.input.disabled = false;
            els.sendBtn.disabled = false;
            els.input.focus();

            // Add Initial Bot Message
            appendMessage('bot', greeting);
        }

        // --- 2. Chat Handling Logic ---
        async function handleChatSubmit(e) {
            e.preventDefault();
            
            const messageText = els.input.value.trim();
            if (!messageText || state.isTyping) return;

            // Clear Input & Auto-resize reset
            els.input.value = '';
            els.input.style.height = 'auto';
            
            // 1. Append User Message Immediately
            appendMessage('user', messageText);

            // 2. Show Typing Indicator
            showTypingIndicator();
            state.isTyping = true;

            try {
                // 3. API Call
                const response = await fetch(config.endpoints.message, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': config.csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ message: messageText, language: state.language })
                });

                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();

                // 4. Remove Typing & Add Bot Response
                removeTypingIndicator();
                appendMessage('bot', data.reply);

            } catch (error) {
                console.error('Chat Error:', error);
                removeTypingIndicator();
                appendMessage('error', state.language === 'fr' 
                    ? "Une erreur s'est produite. Veuillez réessayer." 
                    : "Something went wrong. Please try again.");
            } finally {
                state.isTyping = false;
            }
        }

        // --- 3. UI Helper Functions ---

        function appendMessage(sender, text) {
            const isUser = sender === 'user';
            const isError = sender === 'error';
            
            const wrapperDiv = document.createElement('div');
            wrapperDiv.className = `w-full flex message-enter ${isUser ? 'justify-end' : 'justify-start'}`;

            // Bubble Styling
            let bubbleClasses = "max-w-[85%] sm:max-w-[75%] px-5 py-3.5 shadow-sm text-[15px] leading-relaxed break-words ";
            
            if (isUser) {
                // User: Brand Yellow, rounded corners except top-right
                bubbleClasses += "bg-brand-yellow text-gray-900 rounded-2xl rounded-tr-sm font-medium";
            } else if (isError) {
                // Error: Brand Red, white text
                bubbleClasses += "bg-brand-red text-white rounded-2xl";
            } else {
                // Bot: White, rounded except top-left
                bubbleClasses += "bg-white border border-gray-100 text-gray-800 rounded-2xl rounded-tl-sm";
            }

            const bubbleDiv = document.createElement('div');
            bubbleDiv.className = bubbleClasses;
            
            // Format text (convert newlines to <br>)
            bubbleDiv.innerHTML = text.replace(/\n/g, '<br>');

            wrapperDiv.appendChild(bubbleDiv);
            els.chatContainer.appendChild(wrapperDiv);

            scrollToBottom();
        }

        function showTypingIndicator() {
            const wrapperDiv = document.createElement('div');
            wrapperDiv.id = 'typing-indicator';
            wrapperDiv.className = "w-full flex justify-start message-enter";
            
            const bubbleDiv = document.createElement('div');
            bubbleDiv.className = "bg-white border border-gray-100 px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm flex items-center space-x-1";
            
            // Three bouncing dots
            bubbleDiv.innerHTML = `
                <div class="typing-dot w-2 h-2 bg-gray-400 rounded-full"></div>
                <div class="typing-dot w-2 h-2 bg-gray-400 rounded-full"></div>
                <div class="typing-dot w-2 h-2 bg-gray-400 rounded-full"></div>
            `;

            wrapperDiv.appendChild(bubbleDiv);
            els.chatContainer.appendChild(wrapperDiv);
            scrollToBottom();
        }

        function removeTypingIndicator() {
            const indicator = document.getElementById('typing-indicator');
            if (indicator) indicator.remove();
        }

        function scrollToBottom() {
            els.chatContainer.scrollTo({
                top: els.chatContainer.scrollHeight,
                behavior: 'smooth'
            });
        }

        // --- 4. Textarea Auto-Resize Logic ---
        els.input.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
            // Limit max height via CSS class logic implies we stop growing visually but allow scroll
        });

        // Handle Enter key (Shift+Enter for new line)
        els.input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                // Trigger submit on the form programmatically
                els.chatForm.requestSubmit();
            }
        });

    </script>
</body>
</html>