@extends('layouts.app')

@section('title', 'Membership Plans')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<section id="alumni" class="alumni section home-embedded pt-0 pb-0 bg-red position-relative">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0 align-items-center">

      <!-- LEFT BANNER -->
      <div class="col-12 col-md-3 col-lg-2 d-flex justify-content-center align-items-center">
        <div
          style="background-image:url('{{ asset('assets/img/membership/membership-banner.png') }}');
                 background-size:cover; background-position:center;
                 width:100%; height:100%; min-height:260px;">
        </div>
      </div>

      <!-- MIDDLE TEXT -->
      <div class="col-12 col-md-9 col-lg-6 d-flex align-items-center justify-content-center text-white px-3 px-lg-4">
        <div class="text-center py-4 py-lg-0">
          <h2 class="text-white mb-3">MEMBERSHIP</h2>
          <p class="mb-0">
            Your membership includes access to division-specific Placemats, supporting videos,
            biographies, scripts (where applicable), blackline masters (where applicable), assessments,
            our Teacher Support Line, and more.
          </p>
        </div>
      </div>

      <!-- RIGHT VIDEO -->
      <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center px-3 px-lg-4 py-4 py-lg-0">
        <div class="w-100" style="max-width: 520px;">
          <div class="ratio ratio-16x9">
            <iframe
              src="https://www.youtube.com/embed/rftRnyOGkC0"
              title="YouTube video"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              class="rounded-3 z-3 membership-video"
              allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <img class="pattern-right d-none d-lg-block" src="http://127.0.0.1:8000/assets/img/texture2.png" alt="" aria-hidden="true">

</section>

<section id="campus-facilities" class="campus-facilities section py-3">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Interactive Campus Tour -->
        <div class="py-2 membership-primary mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="{{ asset('assets/img/membership/member-primary.png') }}" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <p class="mb-0 bg-white py-3 px-4 rounded-4">Primary students will become familiar with some African Kings and Queens. The hands-on activities will engage students as they begin to learn about African heritage through the lens of African Kings and Queens. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>STUDENTS WILL LEARN</strong></h5>

                        <div class="learning-wrap d-flex flex-wrap gap-5 text-center">

                          <div class="learning-item">
                              <div class=" img mx-auto">
                              <img src="{{ asset('assets/img/membership/p-learn-1.png') }}" alt="Willingness" class="learning-img">
                              </div>
                          </div>

                          <div class="learning-item">
                              <div class="learning-icon mx-auto">
                              <img src="{{ asset('assets/img/membership/p-learn-2.png') }}" alt="Open Mind" class="learning-img">
                              </div>
                          </div>

                          <div class="learning-item">
                              <div class="learning-icon mx-auto">
                              <img src="{{ asset('assets/img/membership/p-learn-3.png') }}" alt="Cultural Sensitivity and Awareness" class="learning-img">
                              </div>
                          </div>

                          </div>

                    </div>
                </div>

                <div class="tour-features my-3">
                  <div class="tour-feature d-flex justify-content-between">
                    <strong>Number of Activities: 20</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                    <!-- <a data-fancybox href="https://www.youtube.com/watch?v=rftRnyOGkC0" class="btn btn-success">
                        Sample Activity
                    </a> -->
                    <a href="{{ route(name: 'register') }}" class="btn btn-danger">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-2 membership-junior mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="{{ asset('assets/img/membership/member-junior.png') }}" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <p class="mb-0 bg-white py-3 px-4 rounded-4">As Junior/Intermediate students get to know the African Kings and Queens presented, the hands-on activities will engage them. The familiar learning platforms and the use of social media tools will keep them motivated. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>STUDENTS WILL LEARN</strong></h5>

                        <div class="learning-wrap d-flex flex-wrap gap-5 text-center">

                          <div class="learning-item">
                              <div class=" img mx-auto">
                              <img src="{{ asset('assets/img/membership/j-learn-1.png') }}" alt="Willingness" class="learning-img">
                              </div>
                          </div>

                          <div class="learning-item">
                              <div class="learning-icon mx-auto">
                              <img src="{{ asset('assets/img/membership/j-learn-2.png') }}" alt="Open Mind" class="learning-img">
                              </div>
                          </div>

                          </div>

                    </div>
                </div>

                <div class="tour-features my-3">
                  <div class="tour-feature d-flex justify-content-between">
                    <strong>Number of Activities: 20</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                    <!-- <a data-fancybox href="https://www.youtube.com/watch?v=rftRnyOGkC0" class="btn btn-success">
                    Sample Activity
                    </a> -->
                    <a href="{{ route(name: 'register') }}" class="btn btn-warning">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-2 membership-highschool mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="{{ asset('assets/img/membership/member-high-school.png') }}" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <p class="mb-0 bg-white py-3 px-4 rounded-4">The High School curriculum goes deeper and touches on the rich content and sometimes controversial issues related to African Kings and Queens and their heritage. Students will engage in critical thinking and make relevant connections to their own environment and lived experiences and to global competencies. The familiar learning platforms and the use of social media tools will keep them motivated. This curriculum will also give students a sense of contentedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>STUDENTS WILL LEARN</strong></h5>

                        <div class="learning-wrap d-flex flex-wrap gap-5 text-center">

                          <div class="learning-item">
                              <div class=" img mx-auto">
                              <img src="{{ asset('assets/img/membership/hs-learn-1.png') }}" alt="Willingness" class="learning-img">
                              </div>
                          </div>

                          <div class="learning-item">
                              <div class="learning-icon mx-auto">
                              <img src="{{ asset('assets/img/membership/hs-learn-2.png') }}" alt="Open Mind" class="learning-img">
                              </div>
                          </div>

                          <div class="learning-item">
                              <div class="learning-icon mx-auto">
                              <img src="{{ asset('assets/img/membership/hs-learn-3.png') }}" alt="Cultural Sensitivity and Awareness" class="learning-img">
                              </div>
                          </div>

                          </div>

                    </div>
                </div>

                <div class="tour-features my-3">
                  <div class="tour-feature d-flex justify-content-between">
                    <strong>Number of Activities: 30</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                  <a href="{{ route(name: 'register') }}" class="btn btn-warning">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Campus Facilities Section -->

<style>
    .membership-primary{
      background-color: #FFC53D;
    }
    .membership-junior{
      background-color: #CC2028;
    }
    .membership-highschool{
      background-color: #3E9B76;
    }
     .learning-img{
        width: 100px;
     }
     .tour-actions{
            display: flex;
    gap: 1rem;
    flex-wrap: wrap;
     }
     .tour-visual, .tour-content{
      padding: 30px;
     }
     .learning-item{
      background: #ffffff;
      padding: 10px 15px;
      border-radius: 5px;
     }
</style>

@endsection
