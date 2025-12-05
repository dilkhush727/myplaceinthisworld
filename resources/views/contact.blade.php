@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

  <section id="starter-section" class="py-5">

    <!-- Section Title -->
    <div class="container section-title pb-0 aos-init aos-animatepb-0" data-aos="fade-up">
      <h2>Contact Us</h2>
    </div><!-- End Section Title -->

  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact section pt-0">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="contact-main-wrapper">
        <div>

          <div class="contact-form-header">
            <img src="{{ asset('assets/videos/envelop-white.gif') }}" alt="Contact Us" class="img-fluid" width="120">
            <div>
              <h3 class="mb-2">Get in Touch</h3>
              <p class="mb-0">We'd love to hear from you</p>
            </div>
          </div>  

          
          <div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="contact-text">
                <h4>Location</h4>
                <p>8721 Broadway Avenue, New York, NY 10023</p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="contact-text">
                <h4>Email</h4>
                <p><a href="mailto:lorraine@myplaceinthisworld">lorraine@myplaceinthisworld</a></p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="contact-text">
                <h4>Call</h4>
                <p><a href="tel:+1-519-222-1503">+1 (519) 222-1503</a></p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-clock"></i>
              </div>
              <div class="contact-text">
                <h4>Open Hours</h4>
                <p>Monday-Friday: 8:30 AM - 5:30 PM (EST)</p>
              </div>
            </div>
          </div>

        </div>

        <div class="contact-content">

          <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">          

            {{-- Success Message --}}
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
              @csrf

              <div class="row g-3">

                <div class="col-md-6 form-group">
                  <label class="form-label">Name *</label>
                  <input type="text" name="name" class="form-control"
                        value="{{ old('name') }}" placeholder="Name (School Name or Account Name)" required>
                </div>

                <div class="col-md-6 form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control"
                        value="{{ old('phone') }}" placeholder="Contact Number">
                </div>

                <div class="col-md-12">
                  <label class="form-label">Email *</label>
                  <input type="email" name="email" class="form-control"
                        value="{{ old('email') }}" placeholder="Email" required>
                </div>

                <div class="col-md-12">
                  <label class="form-label">Category *</label>
                  <select name="category" class="form-select" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category }}" 
                              @selected(old('category') === $category)>
                        {{ $category }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label">Message *</label>
                  <textarea name="message" rows="3" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                          name="is_ticket" id="is_ticket"
                          {{ old('is_ticket') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_ticket">
                      Submit as a ticket
                    </label>
                  </div>
                  <small class="text-muted">
                    If checked, your message will be treated as a support ticket and assigned a ticket number.
                  </small>
                </div>

                {{-- Hidden input for reCAPTCHA token --}}
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <div class="col-12 text-center mt-3 form-submit">
                  <button type="submit" class="btn btn-primary px-4">
                    Send Message
                  </button>
                  <div class="social-links">
                    <a href="https://www.linkedin.com/in/my-place-in-this-world-3892b42b3/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.youtube.com/@myplaceinthisworld5850/featured" target="_blank"><i class="bi bi-youtube"></i></a>
                  </div>
                </div>

              </div>
            </form>
          
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Contact Section -->

  {{-- Google reCAPTCHA v3 --}}
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'contact'}).then(function(token) {
        document.getElementById('g-recaptcha-response').value = token;
      });
    });
  </script>

@endsection
