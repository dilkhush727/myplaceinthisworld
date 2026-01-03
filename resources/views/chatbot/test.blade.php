@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2>Chatbot Test</h2>

  <button id="btnSession" class="btn btn-primary">Create Session</button>

  <div class="mt-3">
    <label class="form-label">Session ID</label>
    <input id="sessionId" class="form-control" readonly>
  </div>

  <div class="mt-3">
    <label class="form-label">Message</label>
    <input id="msg" class="form-control" value="Tell me about Mansa Musa.">
  </div>

  <button id="btnSend" class="btn btn-success mt-3">Send Message</button>

  <pre id="out" class="bg-light p-3 mt-4" style="white-space:pre-wrap;"></pre>
</div>

<script>
  const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const out = document.getElementById('out');

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
    if (!res.ok) throw new Error(JSON.stringify(data));
    return data;
  };

  document.getElementById('btnSession').addEventListener('click', async () => {
    out.textContent = "Creating session...";
    try {
      const data = await postJson('/chatbot/session', {});
      document.getElementById('sessionId').value = data.session_id;
      out.textContent = JSON.stringify(data, null, 2);
    } catch (e) {
      out.textContent = "ERROR: " + e.message;
    }
  });

  document.getElementById('btnSend').addEventListener('click', async () => {
    const sessionId = document.getElementById('sessionId').value.trim();
    const message = document.getElementById('msg').value.trim();
    if (!sessionId) return out.textContent = "Create session first.";

    out.textContent = "Sending message...";
    try {
      const data = await postJson('/chatbot/message', { session_id: sessionId, message });
      out.textContent = JSON.stringify(data, null, 2);
    } catch (e) {
      out.textContent = "ERROR: " + e.message;
    }
  });
</script>
@endsection
