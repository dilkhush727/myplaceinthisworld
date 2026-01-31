@extends('layouts.app')

@section('title', 'Gallery of Growth')

@section('content')

<!-- Students Life Section -->
<section id="students-life" class="students-life section pt-4">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="student-organizations" data-aos="fade-up" data-aos-delay="200">
      <div class="text-end">
        <a href="{{ route('login') }}" class="btn btn-danger"><i class="bi bi-plus"></i>New Gallery</a>
      </div>
      <h3 class="text-center fw-bold h1">Gallery of Growth</h3>
      <p class="mb-5">Welcome to the Gallery of Growth! Here, you will find the many amazing moments that educators using My Place have been able to capture. Feel free to use this space as inspiration for your classroom or simply appreciate the work that teachers around Ontario are doing right now!</p>

      <div class="masonry">
        @if ($galleries->isEmpty())
          <div class="alert alert-info text-center">
            No gallery items have been published yet.
          </div>
        @endif

        @foreach ($galleries as $gallery)
          @php
            $imgSrc = $gallery->images->isNotEmpty()
                ? asset('storage/' . $gallery->images->first()->image_path)
                : asset('assets/img/no-image.jpg');
          @endphp

          <div class="masonry-item mb-2" data-aos="zoom-in" data-aos-delay="200">
            <div class="organization-card p-0"
                 data-bs-toggle="modal"
                 data-bs-target="#galleryModal-{{ $gallery->id }}"
                 style="cursor:pointer;">
                <div class="gallery-img-box">
                    <img src="{{ $imgSrc }}" class="img-fluid shadow-sm" loading="lazy" alt="{{ $gallery->name }}">
                </div>

              <div class="gallery-details">
                <div>
                  <div class="mt-auto gallery-likes">
                    <i class="bi bi-heart-fill lh-1"></i><span class="lh-1">{{ $gallery->likeCount() }}</span>
                  </div>

                  <div style="font-size:12px; margin-top:6px;">
                    {{ $gallery->user?->name ?? 'Unknown' }}<br>{{ $gallery->created_at?->format('M d, Y') }}
                  </div>
                </div>
              </div>

            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Gallery modals --}}
    @foreach ($galleries as $gallery)
      <div class="modal fade" id="galleryModal-{{ $gallery->id }}" tabindex="-1"
           aria-labelledby="galleryModalLabel-{{ $gallery->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <button type="button" class="btn-close-gallery" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
            <div class="modal-body p-0">
                <div class="gallery-swiper swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                    {
                    "loop": true,
                    "speed": 600,
                    "slidesPerView": 1,
                    "spaceBetween": 30,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                    }
                    }
                    </script>

                    <div class="swiper-wrapper">
                        @foreach ($gallery->images as $image)
                        <div class="swiper-slide">
                            <div class="athletics-card">
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                class="img-fluid"
                                loading="lazy"
                                alt="{{ $gallery->name }}">
                            
                                

                                <div class="athletics-content text-start py-2 px-4">
                                  <div class="mt-auto gallery-likes">

                                      <button class="btn btn-link p-0 like-btn"
                                          data-gallery-id="{{ $gallery->id }}"
                                          id="like-btn-{{ $gallery->id }}"
                                          style="border:none; background:none; font-size:28px; line-height:0;">

                                          <span id="like-icon-{{ $gallery->id }}">
                                            {!! $gallery->isLiked()
                                            ? '<i class="bi bi-heart-fill lh-1"></i>'
                                            : '<i class="bi bi-heart lh-1"></i>' !!}
                                          </span>

                                      </button>

                                      <span id="like-count-{{ $gallery->id }}"
                                            class="lh-1"
                                            style="font-size:22px;">
                                          {{ $gallery->likeCount() }}
                                      </span>

                                  </div>
                                  <h6 class="mb-0">{{ $gallery->name }}</h6>
                                  <p class="mb-1 text-muted" style="font-size:12px;">
                                    Posted by
                                    <strong>{{ $gallery->user?->name ?? 'Unknown' }}</strong>
                                    • {{ $gallery->created_at?->format('M d, Y') }}
                                    {{-- or: {{ $gallery->created_at?->diffForHumans() }} --}}
                                  </p>
                                  <p class="mb-0 text-12">{{ $gallery->content }}</p>
                                </div>
                        
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

          </div>
        </div>
      </div>
    @endforeach

  </div> <!-- /.container -->

</section>
<!-- /Students Life Section -->

<style>
  /* Pure CSS Masonry Layout */
  .masonry {
    column-count: 5;
    column-gap: 8px;
    padding: 5px;
  }

  @media (max-width: 1200px) {
    .masonry { column-count: 4; }
  }

  @media (max-width: 992px) {
    .masonry { column-count: 3; }
  }

  @media (max-width: 768px) {
    .masonry { column-count: 2; }
  }

  @media (max-width: 576px) {
    .masonry { column-count: 1; }
  }

  .masonry-item {
    break-inside: avoid;
    margin-bottom: 1rem;
  }

  .masonry-item img {
    width: 100%;
    height: auto;
    display: block;
  }
  .gallery-details{
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
    z-index: 2;
    font-size: 22px;
    font-weight: 500;
  }
  .masonry-item:hover .gallery-details{
    display: block;
  }

  /* The overlay */
  .gallery-img-box {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
  }

  .gallery-img-box img {
    display: block;
    width: 100%;
  }


  /* Black overlay using ::after */
.gallery-img-box::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.5);
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: 1;
}
.gallery-img-box:hover::after {
  opacity: 1;
}
.gallery-likes{
  display: flex;
  gap: 4px;
  justify-content: center;
}
.athletics-card{
  text-align: center
}
.athletics-card img{
  height: calc(100vh - 140px);
}
.modal-content{
  background-color: #000
}
.modal-dialog-scrollable .modal-body {
  overflow-y: scroll;
  scrollbar-width: none;
  -ms-overflow-style: none;
}
.btn-close-gallery{
  padding: 0;
  border: none;
  background: transparent;
  line-height: 0;
  color: #fff;
  background: #000000b3;
  width: max-content;
  position: absolute;
  right: 6px;
  top: 5px;
  font-size: 50px;
  z-index: 999;
  border-radius: 30px;
}
.athletics-content{
  background-color: #fff
}
.athletics-content .gallery-likes{
  font-size: 25px;
  justify-content: flex-start;
}
.athletics-content .gallery-likes .bi{
  color: red;
}
.text-12{
  font-size: 14px;
}
.swiper-button-next:after, .swiper-rtl .swiper-button-prev:after, .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after{
  font-size: 20px;
  color: #ffffff;
  background: #00000091;
  display: flex;
  justify-content: space-evenly;
  padding: 6px 12px;
  font-weight: 600;
  border-radius: 20px;
  width: 35px;
  height: 35px;
  align-items: center;
}
.swiper-pagination-bullet-active{
  background: #000;
}
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {

      document.querySelectorAll('.like-btn').forEach(btn => {

          btn.addEventListener('click', function (e) {
              e.preventDefault();
              e.stopPropagation(); // prevent swiper click interference

              let galleryId = this.dataset.galleryId;

              fetch("{{ route('gallery.like') }}", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json",
                      "X-CSRF-TOKEN": "{{ csrf_token() }}"
                  },
                  body: JSON.stringify({
                      gallery_id: galleryId
                  })
              })
              .then(res => res.json())
              .then(data => {

                  // Update heart icon inside swiper
                  document.getElementById('like-icon-' + galleryId).innerHTML = data.liked 
        ? '<i class="bi bi-heart-fill lh-1"></i>' 
        : '<i class="bi bi-heart lh-1"></i>';

                  // Update count inside swiper
                  document.getElementById('like-count-' + galleryId).innerText =
                      data.count;

                  // ALSO update count in masonry card overlay
                  let masonryCount = document.querySelector(
                      `[data-bs-target="#galleryModal-${galleryId}"] .gallery-likes span`
                  );

                  if (masonryCount) {
                      masonryCount.innerText = data.count;
                  }
              });
          });
      });

  });
</script>

@endsection
