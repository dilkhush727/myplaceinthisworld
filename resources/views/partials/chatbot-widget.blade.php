{{-- Floating Chat Button --}}
<button
  type="button"
  class="chatbot-fab btn btn-success rounded-circle shadow"
  data-bs-toggle="offcanvas"
  data-bs-target="#chatbotOffcanvas"
  aria-controls="chatbotOffcanvas"
  title="Chat"
>
  <i class="bi bi-chat-dots"></i>
</button>

{{-- Offcanvas Chat UI --}}
<div class="offcanvas offcanvas-end chatbot-open-box" tabindex="-1" id="chatbotOffcanvas" aria-labelledby="chatbotOffcanvasLabel">
  <div class="offcanvas-header border-bottom gap-2">

  <div>
    <img src="{{ asset('assets/img/zola-chat-bot.png') }}" alt="Zola Chatbot" style="width:40px; height:40px;">
  </div>
    <div>
      <h5 class="offcanvas-title mb-0" id="chatbotOffcanvasLabel">Discuss with Zola</h5>
      <small class="text-muted">Ask about activities or support</small>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column p-0">
    <div id="chatbotMessages" class="p-3 flex-grow-1 overflow-auto" style="background:#f8f9fa;">
      <div class="text-muted small">
        Hi! Ask me about High School activities or how to use the site.
      </div>
    </div>

    <div class="border-top p-3">
      <form id="chatbotForm" class="d-flex gap-2">
        <input
          id="chatbotInput"
          type="text"
          class="form-control"
          placeholder="Type a message..."
          autocomplete="off"
        >
        <button id="chatbotSend" class="btn-send" type="submit">
            <i class="bi bi-send-fill"></i>
        </button>
      </form>
      <div id="chatbotStatus" class="small text-muted mt-2"></div>
    </div>
  </div>
</div>
