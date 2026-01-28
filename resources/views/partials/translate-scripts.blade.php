{{-- Google Translate (Hybrid-lite) --}}
<div id="google_translate_element" style="display:none;"></div>

<script>
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,fr',
      autoDisplay: false
    }, 'google_translate_element');
  }

  function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = name + "=" + value + ";expires=" + d.toUTCString() + ";path=/";
  }

  function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
    return null;
  }

  function setSiteLanguage(lang) {
    setCookie('googtrans', '/en/' + lang, 30);

    document.querySelectorAll('[data-lang-label]').forEach(el => {
      el.innerText = (lang === 'fr') ? 'FR' : 'EN';
    });

    location.reload();
  }

  document.addEventListener('DOMContentLoaded', function () {
    const gt = getCookie('googtrans');
    const isFR = gt && gt.indexOf('/en/fr') !== -1;
    const label = isFR ? 'FR' : 'EN';

    document.querySelectorAll('[data-lang-label]').forEach(el => el.innerText = label);
  });
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
  .skiptranslate { display:none !important; }
  body { top:0px !important; }
  .lang-btn-div button{
    border: none;
    border-radius: 5px;
    padding: 2px 15px;
  }
  .lang-btn-div .shadow{
    border: solid 1px #eaeaea;
  }
</style>
