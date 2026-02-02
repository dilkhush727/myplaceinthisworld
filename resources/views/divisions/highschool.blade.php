@extends('layouts.admin')

@section('title', 'High School Division')

@section('content')

<!-- Bootstrap Section with Flex Buttons -->
<section>
  <div class="container">
    <div class="d-flex justify-content-center gap-3">
      <a href="{{ route('divisions.highschool.materials') }}" class="btn btn-dark rounded-pill px-4">Materials</a>
      <a href="{{ route('divisions.highschool.biographies') }}" class="btn btn-dark rounded-pill px-4">Biographies</a>
      <a href="{{ route('divisions.highschool.glossary') }}" class="btn btn-dark rounded-pill px-4">Glossary of Terms</a>
    </div>
  </div>
</section>


<section class="py-5">
  <div class="container">

    <h1 class="h3 fw-bold text-center mb-4">High School Division</h1>

    @if($courses->isEmpty())
      <div class="alert alert-info text-center">
        No courses have been published for this division yet.
      </div>
    @else
      <div class="row g-4">
        @foreach($courses as $course)
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-3"
                 style="border-radius:28px; border-color:#e63946; box-shadow:0 10px 24px rgba(0,0,0,0.08);">
              <div class="card-body d-flex flex-column p-4">

                {{-- Image --}}
                <div class="mb-3 position-relative" style="border-radius:22px; overflow:hidden;">
                  @if($course->image_path)
                    <img src="{{ Storage::url($course->image_path) }}"
                        alt="{{ $course->title }}"
                        class="img-fluid w-100"
                        style="height:190px; object-fit:cover;">
                  @else
                    <div style="background:#CC2028; height:190px;"></div>
                  @endif

                  <span class="badge bg-success position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill"
                        style="font-size:0.75rem;">
                    Available
                  </span>
                </div>

                <h2 class="h5 fw-bold mb-2 text-center">{{ $course->title }}</h2>

                <!-- @if($course->summary)
                  <p class="mb-4" style="font-size:0.9rem; line-height:1.6;height: 210px;overflow-y: auto;">
                    {{ $course->summary }}
                  </p>
                @else
                  <p class="mb-4 text-muted" style="font-size:0.9rem;">
                    {{ __('labels.course') }} description coming soon.
                  </p>
                @endif -->

                <div class="mt-auto pt-2">
                  <a href="{{ route('courses.show', $course->id) }}"
                     class="btn btn-danger w-100 fw-semibold py-2">
                    Start Learning
                  </a>
                </div>

              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>
@endsection
