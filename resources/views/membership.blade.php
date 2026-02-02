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
          style="background-image:url('{{ asset('assets/img/membership/membership-banner.svg') }}');
                 background-size:cover; background-position:center;
                 width:100%; height:100%; min-height:260px;">
        </div>
      </div>

      <!-- MIDDLE TEXT -->
      <div class="col-12 col-md-9 col-lg-6 d-flex align-items-center justify-content-center text-white px-3 px-lg-4">
        <div class=" text-center">
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
  

  <!-- <img class="pattern-right d-none d-lg-block" src="http://127.0.0.1:8000/assets/img/texture2.png" alt="" aria-hidden="true"> -->

</section>

<section id="campus-facilities" class="campus-facilities section py-3">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Interactive Campus Tour -->
        <div class="campus-tour-section py-2 membership-primary mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="assets/img/membership/member-primary.svg" class="img-fluid rounded-circle">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <div class="text-center">
                    <h2 class="mb-0">Primary</h2>
                    <p><small>(Grades 1-3)</small></p>
                </div>
                <p class="mb-0">Primary students will become familiar with some African Kings and Queens. The hands-on activities will engage students as they begin to learn about African heritage through the lens of African Kings and Queens. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>Students will:</strong></h5>
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Identify Africa as a continent of many countries</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Learn some important facts that contribute to it being a “majestic” place in this world</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Explore what it means to be an African King or a Queen before transatlantic slavery</div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="tour-features mb-0">
                  <div class="tour-feature">
                    <strong>Number of Activities: 20</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                    <a data-fancybox href="https://www.youtube.com/watch?v=rftRnyOGkC0" class="btn-primary">
                        Sample Activity
                    </a>
                    <a href="{{ route(name: 'register') }}" class="btn-outline">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="campus-tour-section py-2 membership-junior mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="assets/img/membership/member-junior.svg" class="img-fluid rounded-circle">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <div class="text-center">
                    <h2 class="mb-0">Junior / Intermediate</h2>
                    <p><small>(Grades 4-8)</small></p>
                </div>
                <p class="mb-0">As Junior/Intermediate students get to know the African Kings and Queens presented, the hands-on activities will engage them. The familiar learning platforms and the use of social media tools will keep them motivated. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>Students will:</strong></h5>
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Identify the positive attributes of African experiences while debunking negative stereotypes</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Explore the influence and contributions of African royalty before transatlantic slavery and up to the present</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Make connections to their own experiences and current environment</div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="tour-features mb-0">
                  <div class="tour-feature">
                    <strong>Number of Activities: 20</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                    <a data-fancybox href="https://www.youtube.com/watch?v=rftRnyOGkC0" class="btn-primary">
                    Sample Activity
                    </a>
                    <a href="{{ route(name: 'register') }}" class="btn-outline">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="campus-tour-section py-2 membership-highschool mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="assets/img/membership/member-high-school.svg" class="img-fluid rounded-circle">
              </div>
            </div>
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="tour-content py-1">
                <div class="text-center">
                    <h2 class="mb-0">High School</h2>
                    <p><small>(Grades 9-12)</small></p>
                </div>
                <p class="mb-0">The High School curriculum goes deeper and touches on the rich content and sometimes controversial issues related to African Kings and Queens and their heritage. Students will engage in critical thinking and make relevant connections to their own environment and lived experiences and to global competencies. The familiar learning platforms and the use of social media tools will keep them motivated. This curriculum will also give students a sense of contentedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.</p>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="mb-2"><strong>Students will:</strong></h5>
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Identify the positive attributes of African experiences while debunking negative stereotypes</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Explore the influence and contributions of African Royalty before transatlantic slavery and up to the present</div>
                            </div>
                        </div>
                        
                        <div class="info-grid mb-0">
                            <div class="info-item mb-2">
                                <i class="bi bi-check"></i>
                                <div class="info-text">Develop subject-specific curricular skills as they make connections to their lives, current events, and present-day Black leaders</div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="tour-features mb-0">
                  <div class="tour-feature">
                    <strong>Number of Activities: 30</strong>
                    <strong>Number of tasks per Activity: 1-6</strong>
                  </div>
                </div>
                <div class="tour-actions">
                  <a href="{{ route(name: 'register') }}" class="btn-outline">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Campus Facilities Section -->

<style>
    .membership-primary{
      background-color: #ffffff;
      border: solid 8px #f4a321;
    }
    .membership-junior{
      background-color: #ffffff;
      border: solid 8px #cc2028;
    }
    .membership-highschool{
      background-color: #ffffff;
      border: solid 8px #198754;
    }
     .learning-img{
        width: 100px;
     }
     .tour-actions{
            display: flex;
    gap: 1rem;
    flex-wrap: wrap;
     }
     .tour-visual img{
      border: solid 10px black;
      border-radius: 50%;
     }
     .tour-visual, .tour-content{
      padding: 30px;
     }
     .learning-item{
      /* background: #ffffff;
      padding: 10px 15px; */
      border-radius: 5px;
     }
     .tour-actions{
      display: none !important;
     }
</style>

@endsection
