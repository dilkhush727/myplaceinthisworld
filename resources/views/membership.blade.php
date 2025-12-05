@extends('layouts.app')

@section('title', 'Membership Plans')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<section id="alumni" class="alumni section home-embedded pt-5 pb-3">

    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
        <div class="alumni-intro">
            <div class="container section-title aos-init aos-animate pb-0" data-aos="fade-up">
                <h2>Membership</h2>
            </div>
            <p>Your membership includes access to division-specific Placemats, supporting videos, biographies, scripts (where applicable), blackline masters (where applicable), assessments, our Teacher Support Line, and more.</p>
        </div>
        </div>
        <div class="col-lg-6 aos-init aos-animate mb-3" data-aos="fade-up" data-aos-delay="300">
        <div class="alumni-video">
            <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/rftRnyOGkC0" title="YouTube video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
            </iframe>
            </div>
        </div>
        </div>
    </div>

    </div>

</section>



<section id="campus-facilities" class="campus-facilities section py-3">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Interactive Campus Tour -->
        <div class="campus-tour-section py-2 membership-primary mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-center">
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="tour-visual text-center">
                <img src="assets/img/primary-membership.webp" class="img-fluid rounded-circle">
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
                <img src="assets/img/junior-membership.webp" class="img-fluid rounded-circle">
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
                <img src="assets/img/high-school-membership.webp" class="img-fluid rounded-circle">
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
    .campus-tour-section{
        background: #FFF9E2 !important;
    }
    .membership-primary{
        border: solid 8px #FFB623;
    }
    .membership-primary .tour-visual img{
        border: solid 5px #399774;
        box-shadow: 0px 0px 10px 0px #399774;
    }
    .membership-junior{
        border: solid 8px #C92128;
    }
    .membership-junior .tour-visual img{
        border: solid 5px #FFB623;
        box-shadow: 0px 0px 10px 0px #FFB623;
    }
    .membership-highschool{
        border: solid 8px #399774;
    }
    .membership-highschool .tour-visual img{
        border: solid 5px #C92128;
        box-shadow: 0px 0px 10px 0px #C92128;
    }
</style>

@endsection
