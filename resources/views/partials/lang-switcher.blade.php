@php
  $currentLocale = request()->route('locale') ?? 'en';

  $path = request()->path();
  $pathWithoutLocale = preg_replace('#^(en|fr)(/)?#', '', $path);
  $pathWithoutLocale = ltrim($pathWithoutLocale, '/');

  $enUrl = url('en' . ($pathWithoutLocale ? '/' . $pathWithoutLocale : ''));
  $frUrl = url('fr' . ($pathWithoutLocale ? '/' . $pathWithoutLocale : ''));
@endphp

<div class="dropdown lang-btn-div notranslate" translate="no">
  <button class="lang-pill dropdown-toggle notranslate" translate="no"
          type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="notranslate" translate="no">
      {{ strtoupper($currentLocale) }}
    </span>
  </button>

  <ul class="dropdown-menu dropdown-menu-end shadow notranslate" translate="no">
    <li>
      <a class="dropdown-item notranslate" translate="no" href="{{ $enUrl }}">EN</a>
    </li>
    <li>
      <a class="dropdown-item notranslate" translate="no" href="{{ $frUrl }}">FR</a>
    </li>
  </ul>
</div>
