<!-- Google Translate (hidden) -->
<div id="google_translate_element" style="display:none;"></div>

<script>
  // --- Google init ---
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {
        pageLanguage: 'en',
        includedLanguages: 'en,fr',
        autoDisplay: false
      },
      'google_translate_element'
    );
  }

  // --- Cookie helpers ---
  function setCookieOn(domain, name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = d.toUTCString();
    const domainPart = domain ? `;domain=${domain}` : '';
    document.cookie = `${name}=${value};expires=${expires};path=/${domainPart}`;
  }

  function deleteCookieOn(domain, name) {
    const domainPart = domain ? `;domain=${domain}` : '';
    document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/${domainPart}`;
  }

  function getDomainCandidates() {
    const host = location.hostname; // localhost / myplaceinthisworld.ca / www.myplaceinthisworld.ca
    const parts = host.split('.');
    const set = new Set();

    // no domain attribute (important for localhost)
    set.add(null);

    // current host
    set.add(host);
    set.add('.' + host);

    // root domain (for www)
    if (parts.length >= 2 && host !== 'localhost') {
      const root = parts.slice(-2).join('.');
      set.add(root);
      set.add('.' + root);
      set.add('www.' + root);
      set.add('.www.' + root);
    }

    return Array.from(set);
  }

  // --- Force translate using Google’s hidden select ---
  function forceGoogleSelectLanguage(lang) {
    const select = document.querySelector('select.goog-te-combo');
    if (!select) return false;

    select.value = lang;

    // trigger change event
    select.dispatchEvent(new Event('change'));
    select.dispatchEvent(new Event('input'));
    return true;
  }

  function setSiteLanguage(lang) {
    const domains = getDomainCandidates();

    if (lang === 'en') {
      // EN: clear cookies everywhere (strong reset)
      domains.forEach(d => {
        deleteCookieOn(d, 'googtrans');
        deleteCookieOn(d, 'googtransopt');
        // some setups also set these:
        deleteCookieOn(d, 'goog-te-gadget');
      });

      // Also set a neutral cookie briefly (helps some browsers revert)
      domains.forEach(d => setCookieOn(d, 'googtrans', '/en/en', 1));

      // Force the select to EN if available
      const forced = forceGoogleSelectLanguage('en');

      // Update label
      document.querySelectorAll('[data-lang-label]').forEach(el => el.innerText = 'EN');

      // If select isn't ready yet, reload after clearing
      if (!forced) location.reload();

      return;
    }

    // FR: set cookie everywhere then force select
    domains.forEach(d => setCookieOn(d, 'googtrans', '/en/fr', 30));

    // Update label immediately
    document.querySelectorAll('[data-lang-label]').forEach(el => el.innerText = 'FR');

    // Try to force switch; if select isn't ready yet, reload
    const forced = forceGoogleSelectLanguage('fr');
    if (!forced) location.reload();
  }

  // Set initial label on load
  document.addEventListener('DOMContentLoaded', function () {
    const gt = (document.cookie.match(/(?:^|; )googtrans=([^;]*)/) || [])[1] || '';
    const isFR = decodeURIComponent(gt).includes('/en/fr');
    document.querySelectorAll('[data-lang-label]').forEach(el => el.innerText = isFR ? 'FR' : 'EN');

    // Sometimes the select appears a bit later; try once more to sync
    setTimeout(() => {
      const select = document.querySelector('select.goog-te-combo');
      if (!select) return;
      // keep select aligned with cookie
      if (isFR) select.value = 'fr';
      else select.value = 'en';
    }, 800);
  });
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
  .skiptranslate { display:none !important; }
  body { top:0px !important; }

  .lang-btn-div .lang-pill{
    border: none;
    border-radius: 5px;
    padding: 2px 15px;
  }
  .lang-btn-div .dropdown-menu.shadow{
    border: solid 1px #eaeaea;
  }
</style>
