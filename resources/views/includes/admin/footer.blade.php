{{-- resources/views/includes/admin/footer.blade.php --}}
<footer class="pc-footer">
  <div class="footer-wrapper container-fluid">
    <div class="row">
      <div class="col-sm-6 my-1">
        <p class="m-0">
          {{ t('site.name', 'My Place In This World') }}
        </p>
      </div>
      <div class="col-sm-6 ms-auto my-1">
        <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
          <li class="list-inline-item">
            <a href="{{ url('/') }}">
              {{ t('nav.home', 'Home') }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
