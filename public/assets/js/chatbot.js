(() => {
  const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
  const messagesEl = document.getElementById('chatbotMessages');
  const form = document.getElementById('chatbotForm');
  const input = document.getElementById('chatbotInput');
  const statusEl = document.getElementById('chatbotStatus');

  if (!csrf || !messagesEl || !form || !input || !statusEl) return;

  const STORAGE_KEY = 'mpitw_chat_session_id';

  const appendMsg = (role, text) => {
    const wrap = document.createElement('div');
    wrap.className = 'my-2 d-flex ' + (role === 'user' ? 'justify-content-end' : 'justify-content-start');

    const bubble = document.createElement('div');
    bubble.className = 'px-3 py-2 rounded-3 shadow-sm';
    bubble.style.maxWidth = '85%';
    bubble.style.whiteSpace = 'pre-wrap';

    if (role === 'user') {
      bubble.classList.add('bg-success', 'text-white');
    } else {
      bubble.classList.add('bg-white');
    }

    bubble.textContent = text;
    wrap.appendChild(bubble);
    messagesEl.appendChild(wrap);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  };

  const setStatus = (t) => statusEl.textContent = t || '';

  const postJson = async (url, payload) => {
    const res = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrf
      },
      body: JSON.stringify(payload)
    });

    const data = await res.json().catch(() => ({}));
    if (!res.ok) throw new Error(data?.message ? JSON.stringify(data) : 'Request failed');
    return data;
  };

  const ensureSession = async () => {
    let sid = localStorage.getItem(STORAGE_KEY);
    if (sid) {
      console.log('[Chatbot] session_id =', sid);
      return sid;
    }

    setStatus('Starting chat...');
    const data = await postJson('/chatbot/session', {});
    sid = data.session_id;
    localStorage.setItem(STORAGE_KEY, sid);
    console.log('[Chatbot] session_id =', sid);
    setStatus('');
    return sid;
  };

  // ✅ Reset button logic (clears session + UI)
  const resetBtn = document.getElementById('chatbotResetBtn');
  if (resetBtn) {
    resetBtn.addEventListener('click', () => {
      localStorage.removeItem(STORAGE_KEY);

      messagesEl.innerHTML = `
        <div class="text-muted small">
          Hi! Ask me about High School activities or how to use the site.
        </div>
      `;

      setStatus('Session reset. Say "hi" to start again.');
      input.focus();
    });
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const text = input.value.trim();
    if (!text) return;

    input.value = '';
    appendMsg('user', text);

    try {
      setStatus('Thinking...');
      const sid = await ensureSession();

      console.log('[Chatbot] sending', { session_id: sid, message: text });

      const data = await postJson('/chatbot/message', { session_id: sid, message: text });
      appendMsg('assistant', data.reply || 'Sorry — no reply.');
      setStatus('');
    } catch (err) {
      console.error(err);
      appendMsg('assistant', 'Sorry — something went wrong. Please try again or use Contact Us.');
      setStatus('');
    }
  });

  // Optional: create session when offcanvas opens
  const offcanvasEl = document.getElementById('chatbotOffcanvas');
  if (offcanvasEl) {
    offcanvasEl.addEventListener('shown.bs.offcanvas', async () => {
      try { await ensureSession(); } catch (e) {}
      input.focus();
    });
  }
})();
