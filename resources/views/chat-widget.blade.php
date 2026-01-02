<!-- CHAT WIDGET LOADED -->
<style>
    /* Scoped, professional styling with no Tailwind dependencies */
    #chat-widget-toggle {
        position: fixed; right: 18px; bottom: 18px; z-index: 2147483000;
        width: 56px; height: 56px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, #FFC400, #FF8A00);
        color: #111; box-shadow: 0 12px 24px rgba(0,0,0,.18), 0 4px 8px rgba(0,0,0,.08);
        cursor: pointer; user-select: none; border: 0; outline: 0;
        transition: transform .15s ease, filter .2s ease;
        font-family: inherit;
    }
    #chat-widget-toggle:hover { filter: brightness(0.97); }
    #chat-widget-toggle:active { transform: translateY(1px) scale(0.99); }

    #chat-widget {
        position: fixed; right: 18px; bottom: 84px; z-index: 2147483000;
        width: 360px; max-width: calc(100vw - 32px); max-height: 72vh;
        background: #fff; border: 1px solid #e9ecef; border-radius: 16px;
        box-shadow: 0 24px 48px rgba(15,23,42,.18), 0 8px 16px rgba(15,23,42,.10);
        display: none; flex-direction: column; overflow: hidden; font-family: inherit;
    }

    /* Header */
    #chat-widget .cw-header {
        position: sticky; top: 0; z-index: 2;
        padding: 12px 14px; display: flex; align-items: center; justify-content: space-between;
        background: linear-gradient(135deg, #1f2937, #0f172a);
        color: #fff; border-bottom: 1px solid rgba(255,255,255,.08);
    }
    #chat-widget .cw-header .cw-title { font-weight: 700; font-size: 14px; letter-spacing: .2px; }
    #chat-widget .cw-header .cw-sub   { font-size: 11px; opacity: .8; }
    #chat-widget .cw-close {
        appearance: none; border: 0; background: transparent; color: #fff;
        font-size: 20px; line-height: 1; cursor: pointer; opacity: .8; transition: opacity .15s;
    }
    #chat-widget .cw-close:hover { opacity: 1; }

    /* Language bar */
    #chat-widget-language {
        display: flex; align-items: center; justify-content: space-between; gap: 8px;
        padding: 8px 12px; background: #f8fafc; border-bottom: 1px solid #eef2f7;
        font-size: 12px; color: #334155;
    }
    #chat-widget-language label { display: inline-flex; align-items: center; gap: 6px; cursor: pointer; }

    /* Messages area */
    #chat-widget-messages {
        flex: 1 1 auto; overflow-y: auto; padding: 12px; background: #fbfcfe;
    }
    .cw-row { display: flex; width: 100%; margin: 6px 0; }
    .cw-row.cw-right { justify-content: flex-end; }
    .cw-row.cw-left  { justify-content: flex-start; }
    .cw-msg {
        max-width: 85%; padding: 10px 12px; border-radius: 16px; line-height: 1.45;
        font-size: 13px; word-break: break-word;
        box-shadow: 0 2px 6px rgba(0,0,0,.05);
    }
    .cw-msg.cw-user {
        background: linear-gradient(135deg, #FFE083, #FFC400); color: #111; border: 1px solid rgba(0,0,0,.05);
    }
    .cw-msg.cw-bot  {
        background: #fff; color: #1f2937; border: 1px solid #e5e7eb;
    }
    .cw-msg.cw-error{ background: #ef4444; color: #fff; border: 1px solid #dc2626; }

    /* Typing dots */
    .typing-dot {
        display: inline-block; width: 7px; height: 7px; border-radius: 999px; background: #9ca3af;
        animation: typing 1.4s infinite ease-in-out both; margin-right: 3px;
    }
    .typing-dot:nth-child(1){ animation-delay:-.32s }
    .typing-dot:nth-child(2){ animation-delay:-.16s }
    @keyframes typing { 0%,80%,100%{ transform: scale(0) } 40%{ transform: scale(1) } }

    /* Input area */
    #chat-widget .cw-input {
        border-top: 1px solid #eef2f7; background: #fff; padding: 8px 10px;
    }
    #chat-widget textarea {
        width: 100%; min-height: 36px; max-height: 120px; resize: none; padding: 10px 12px;
        border-radius: 12px; border: 1px solid #e5e7eb; outline: none; background: #f8fafc;
        font-size: 13px; color: #111827; transition: border-color .15s, box-shadow .15s;
    }
    #chat-widget textarea:focus { border-color: #FFC400; box-shadow: 0 0 0 3px rgba(255,196,0,.25); background: #fff; }
    #chat-widget .cw-send {
        appearance: none; border: 0; border-radius: 999px; width: 40px; height: 40px;
        display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;
        background: linear-gradient(135deg, #FFC400, #FF8A00); color: #111; font-weight: 700;
        box-shadow: 0 8px 16px rgba(0,0,0,.12);
        cursor: pointer; transition: transform .1s ease, filter .2s ease;
    }
    #chat-widget .cw-send:hover { filter: brightness(0.98); }
    #chat-widget .cw-send:active { transform: translateY(1px) scale(0.99); }

    /* Reduce motion preference */
    @media (prefers-reduced-motion: reduce) {
        #chat-widget-toggle, #chat-widget .cw-send { transition: none; }
    }
</style>

<script>try{console.log('CHAT_WIDGET: loaded')}catch(e){}</script>

<!-- Toggle Button -->
<div id="chat-widget-toggle" aria-label="Open chat" title="Chat">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-4 3v-3H6a2 2 0 0 1-2-2V6z" fill="#111" fill-opacity="0.9"/>
    </svg>
    <span class="sr-only">Open chat</span>
    <style>.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}</style>
</div>

<!-- Panel -->
<div id="chat-widget" style="display:none;">
    <div class="cw-header">
        <div>
            <div class="cw-title">My Place Assistant</div>
            <div class="cw-sub">Ask about the platform, activities, or plans.</div>
        </div>
        <button type="button" id="chat-widget-close" class="cw-close" aria-label="Close chat" title="Close">×</button>
    </div>

    <div id="chat-widget-language">
        <span>Choose language:</span>
        <div>
            <label><input type="radio" name="chat-widget-lang" value="en" checked> EN</label>
            <label style="margin-left:10px;"><input type="radio" name="chat-widget-lang" value="fr"> FR</label>
        </div>
    </div>

    <div id="chat-widget-messages"></div>

    <div class="cw-input">
        <form id="chat-widget-form" style="display:flex; align-items:flex-end;">
            <textarea id="chat-widget-input" rows="1" placeholder="Type your message..."></textarea>
            <button type="submit" id="chat-widget-send" class="cw-send" aria-label="Send">
                ➤
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const widgetToggle   = document.getElementById('chat-widget-toggle');
        const widgetPanel    = document.getElementById('chat-widget');
        const widgetClose    = document.getElementById('chat-widget-close');
        const widgetMessages = document.getElementById('chat-widget-messages');
        const widgetForm     = document.getElementById('chat-widget-form');
        const widgetInput    = document.getElementById('chat-widget-input');
        const widgetSend     = document.getElementById('chat-widget-send');

        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : null;
        const endpoint = "{{ route('chat.message') }}";

        let isSending = false;
        const OPEN_KEY = 'mpitw_chat_open';

        function getLanguage() {
            const checked = document.querySelector('input[name="chat-widget-lang"]:checked');
            return checked ? checked.value : 'en';
        }

        function appendMessage(sender, text) {
            const isUser  = sender === 'user';
            const isError = sender === 'error';

            const row = document.createElement('div');
            row.className = 'cw-row ' + (isUser ? 'cw-right' : 'cw-left');

            const bubble = document.createElement('div');
            bubble.className = 'cw-msg ' + (isUser ? 'cw-user' : (isError ? 'cw-error' : 'cw-bot'));
            bubble.innerHTML = (text || '').replace(/\n/g, '<br>');

            row.appendChild(bubble);
            widgetMessages.appendChild(row);
            widgetMessages.scrollTo({ top: widgetMessages.scrollHeight, behavior: 'smooth' });
        }

        function showTyping() {
            if (document.getElementById('chat-widget-typing')) return;
            const row = document.createElement('div');
            row.id = 'chat-widget-typing';
            row.className = 'cw-row cw-left';
            const bubble = document.createElement('div');
            bubble.className = 'cw-msg cw-bot';
            bubble.innerHTML = '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';
            row.appendChild(bubble);
            widgetMessages.appendChild(row);
            widgetMessages.scrollTo({ top: widgetMessages.scrollHeight, behavior: 'smooth' });
        }

        function removeTyping() {
            const el = document.getElementById('chat-widget-typing');
            if (el) el.remove();
        }

        function openWidget() {
            widgetPanel.style.display = 'flex';
            localStorage.setItem(OPEN_KEY, '1');
            setTimeout(() => widgetInput && widgetInput.focus(), 0);
        }
        function closeWidget() {
            widgetPanel.style.display = 'none';
            localStorage.setItem(OPEN_KEY, '0');
        }

        // Toggle open/close
        widgetToggle.addEventListener('click', function () {
            const hidden = widgetPanel.style.display === 'none' || widgetPanel.style.display === '';
            hidden ? openWidget() : closeWidget();
        });
        widgetClose.addEventListener('click', closeWidget);

        // Restore last open state
        try { if (localStorage.getItem(OPEN_KEY) === '1') openWidget(); } catch(_){}

        // Submit handler
        widgetForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            if (isSending) return;

            const text = (widgetInput.value || '').trim();
            if (!text) return;

            const lang = getLanguage();
            appendMessage('user', text);
            widgetInput.value = '';
            widgetInput.style.height = 'auto';

            showTyping();
            isSending = true;

            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ message: text, language: lang })
                });

                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();
                removeTyping();
                appendMessage('bot', data.reply || '');
            } catch (error) {
                console.error('Chat widget error:', error);
                removeTyping();
                appendMessage('error', getLanguage() === 'fr' ? "Une erreur s'est produite. Veuillez réessayer." : 'Something went wrong. Please try again.');
            } finally {
                isSending = false;
            }
        });

        // Auto-resize textarea
        widgetInput.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });

        // Enter to send, Shift+Enter for newline
        widgetInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                widgetForm.requestSubmit();
            }
        });
    });
</script>
