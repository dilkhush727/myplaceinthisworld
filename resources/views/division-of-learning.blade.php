@extends('layouts.app')

@section('title', 'Division of Learning')

@section('content')
<section class="py-5">
  <div class="container">

    {{-- Top button --}}
    <div class="text-center mb-5">
      <a href="#"
         class="btn btn-lg rounded-pill px-5 py-3"
         style="background-color:#d7263d; color:#fff; font-weight:600; box-shadow:0 10px 20px rgba(0,0,0,0.18);"
         data-bs-toggle="modal"
         data-bs-target="#instructionalVideosModal">
        Teacher Instructional Video
      </a>
    </div>

    <div class="row g-4 justify-content-center">

      {{-- PRIMARY --}}
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-3"
             style="border-radius:32px; border-color:#ffbe0b; box-shadow:0 12px 28px rgba(0,0,0,0.08);">
          <div class="card-body d-flex flex-column p-4">

            <div class="mb-4" style="border-radius:26px; overflow:hidden;">
              <img src="{{ asset('assets/img/primary.webp') }}"
                   alt="Primary illustration"
                   class="img-fluid w-100"
                   style="object-fit:cover; height:200px;">
            </div>

            <h3 class="h4 fw-bold text-center mb-3">Primary</h3>

            <p class="mb-4" style="font-size:0.95rem; line-height:1.6;">
              Primary students will become familiar with some African Kings and Queens. The hands-on
              activities will engage students as they begin to learn about African heritage through
              the lens of African Kings and Queens. This curriculum will also give students a sense of
              connectedness, create a new understanding of Black people and culture, and develop a
              sense of belonging, especially for Black students.
            </p>

            <div class="mt-auto text-center">
              <a href="{{ route('register') }}"
                 class="btn w-100 rounded-pill py-2"
                 style="background:#fff7e0; color:#e0a400; font-weight:600; border:none;">
                Subscription Required
              </a>
            </div>

          </div>
        </div>
      </div>

      {{-- JUNIOR / INTERMEDIATE --}}
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-3"
             style="border-radius:32px; border-color:#00a676; box-shadow:0 12px 28px rgba(0,0,0,0.08);">
          <div class="card-body d-flex flex-column p-4">

            <div class="mb-4" style="border-radius:26px; overflow:hidden;">
              <img src="{{ asset('assets/img/junior.webp') }}"
                   alt="Junior/Intermediate illustration"
                   class="img-fluid w-100"
                   style="object-fit:cover; height:200px;">
            </div>

            <h3 class="h4 fw-bold text-center mb-3">Junior/Intermediate</h3>

            <p class="mb-4" style="font-size:0.95rem; line-height:1.6;">
              As Junior/Intermediate students get to know the African Kings and Queens presented,
              the hands-on activities will engage them. The familiar learning platforms and the use
              of social media tools will keep them motivated. This curriculum will also give students
              a sense of connectedness, create a new understanding of Black people and culture, and
              develop a sense of belonging, especially for Black students.
            </p>

            <div class="mt-auto text-center">
              <a href="{{ route('register') }}"
                 class="btn w-100 rounded-pill py-2"
                 style="background:#e2fff4; color:#00a676; font-weight:600; border:none;">
                Subscription Required
              </a>
            </div>

          </div>
        </div>
      </div>

      {{-- HIGH SCHOOL --}}
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-3"
             style="border-radius:32px; border-color:#e63946; box-shadow:0 12px 28px rgba(0,0,0,0.08);">
          <div class="card-body d-flex flex-column p-4">

            <div class="mb-4" style="border-radius:26px; overflow:hidden;">
              <img src="{{ asset('assets/img/highschool.webp') }}"
                   alt="High School illustration"
                   class="img-fluid w-100"
                   style="object-fit:cover; height:200px;">
            </div>

            <h3 class="h4 fw-bold text-center mb-3">High School</h3>

            <p class="mb-4" style="font-size:0.95rem; line-height:1.6;">
              The High School curriculum goes deeper and touches on rich content and sometimes
              controversial issues related to African Kings and Queens and their heritage. Students
              will engage in critical thinking and make relevant connections to their own environment
              and lived experiences and to global competencies.
            </p>

            <div class="mt-auto text-center">
              <a href="{{ route('login') }}"
                 class="btn w-100 rounded-pill py-2"
                 style="background:#ffe5e8; color:#e63946; font-weight:600; border:none;">
                Login Required
              </a>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- Teacher Instructional Videos Modal (Carousel + Videos) --}}
<div class="modal fade" id="instructionalVideosModal" tabindex="-1" aria-labelledby="instructionalVideosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius:18px; overflow:hidden;">

      {{-- Header with gradient + close --}}
      <div class="modal-header border-0"
           style="background:linear-gradient(90deg,#d7263d 0%,#f5a623 100%); color:#fff;">
        <h5 class="modal-title fw-bold text-white" id="instructionalVideosModalLabel" style="font-size:1.35rem;">
          Teacher Instructional Video
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-0" style="background:#fff;">
        <div id="teacherVideoCarousel" class="carousel slide" data-bs-interval="false">
          {{-- Top controls row (like your screenshot style) --}}
          <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom" style="background:#fff;">
            <button class="btn rounded-circle"
                    style="width:44px; height:44px; background:#d7263d; color:#fff;"
                    type="button"
                    data-bs-target="#teacherVideoCarousel"
                    data-bs-slide="prev"
                    aria-label="Previous">
              <span aria-hidden="true" style="font-size:22px; line-height:1;">‹</span>
            </button>

            <div class="d-flex align-items-center gap-3">
              <button type="button" class="btn rounded-circle p-0 carousel-dot active"
                      style="width:36px; height:36px; font-weight:700; background:#e9ecef; color:#333;"
                      data-bs-target="#teacherVideoCarousel" data-bs-slide-to="0" aria-label="English video">
                EN
              </button>
              <button type="button" class="btn rounded-circle p-0 carousel-dot"
                      style="width:36px; height:36px; font-weight:700; background:#e9ecef; color:#333;"
                      data-bs-target="#teacherVideoCarousel" data-bs-slide-to="1" aria-label="French video">
                FR
              </button>
            </div>

            <button class="btn rounded-circle"
                    style="width:44px; height:44px; background:#d7263d; color:#fff;"
                    type="button"
                    data-bs-target="#teacherVideoCarousel"
                    data-bs-slide="next"
                    aria-label="Next">
              <span aria-hidden="true" style="font-size:22px; line-height:1;">›</span>
            </button>
          </div>

          <div class="carousel-inner">

            {{-- Slide 1: English --}}
            <div class="carousel-item active">
              <div class="text-center py-3 fw-bold border-bottom" style="font-size:1.35rem;">
                English
              </div>
              <div class="p-0" style="background:#000;">
                <video id="teacherVideoEn" controls playsinline
                       style="width:100%; height:auto; max-height:75vh; display:block;">
                  <source src="{{ asset('assets/videos/teacher-instructional-en.mp4') }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>

            {{-- Slide 2: French --}}
            <div class="carousel-item">
              <div class="text-center py-3 fw-bold border-bottom" style="font-size:1.35rem;">
                Francophone
              </div>
              <div class="p-0" style="background:#000;">
                <video id="teacherVideoFr" controls playsinline
                       style="width:100%; height:auto; max-height:75vh; display:block;">
                  <source src="{{ asset('assets/videos/teacher-instructional-fr.mp4') }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('instructionalVideosModal');
    const carouselEl = document.getElementById('teacherVideoCarousel');

    const videoEn = document.getElementById('teacherVideoEn');
    const videoFr = document.getElementById('teacherVideoFr');

    if (!modalEl || !carouselEl) return;

    // Update dot styles (1/2)
    const setDotActive = (index) => {
      document.querySelectorAll('#teacherVideoCarousel .carousel-dot').forEach((btn, i) => {
        if (i === index) {
          btn.classList.add('active');
          btn.style.background = '#d7263d';
          btn.style.color = '#fff';
        } else {
          btn.classList.remove('active');
          btn.style.background = '#e9ecef';
          btn.style.color = '#333';
        }
      });
    };

    // Pause all videos
    const pauseAll = () => {
      [videoEn, videoFr].forEach(v => {
        if (!v) return;
        v.pause();
        v.currentTime = 0;
      });
    };

    // When modal opens: reset to first slide and autoplay English
    modalEl.addEventListener('shown.bs.modal', () => {
      pauseAll();
      setDotActive(0);

      // ensure carousel starts at 0
      const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, { interval: false });
      carousel.to(0);

      // try autoplay (may be blocked unless muted)
      const p = videoEn?.play();
      if (p && typeof p.catch === 'function') p.catch(() => {});
    });

    // When modal closes: stop everything
    modalEl.addEventListener('hidden.bs.modal', () => {
      pauseAll();
    });

    // When slide changes: pause other video + update dots + autoplay current
    carouselEl.addEventListener('slid.bs.carousel', (e) => {
      const idx = e.to;
      setDotActive(idx);

      pauseAll();

      const current = idx === 0 ? videoEn : videoFr;
      const p = current?.play();
      if (p && typeof p.catch === 'function') p.catch(() => {});
    });
  });
</script>
@endpush
