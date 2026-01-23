@extends('layouts.app')

@section('title', 'Home')

@section('content')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="hero-wrapper">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 hero-content" data-aos="fade-right" data-aos-delay="100">
              <h1>Inspiring Excellence Through Education</h1>
              <p>At My Place in This World, we believe education is the key to unlocking potential and fostering a future where every student thrives. Our carefully crafted programs emphasize equity, diversity, and inclusion, aiming to empower students from all backgrounds to achieve academic success and personal growth.</p>
              <div class="action-buttons">
                <a href="{{ route('register') }}" class="btn-primary">Start Your Journey</a>
              </div>
            </div>
            <div class="col-lg-6 hero-media" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/banner-imgs/slide3.svg" alt="Education" class="img-fluid main-image">
              <div class="image-overlay">
                <div class="badge-accredited">
                  <i class="bi bi-patch-check-fill"></i>
                  <span>Accredited Excellence</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="feature-cards-wrapper featured-by bg-danger" data-aos="fade-up" data-aos-delay="300">
        <div class="container">
          <div class="row gy-4">
            <h2 class="text-white pt-2 text-center">FEATURED IN</h2>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://www.ctvnews.ca/kitchener/article/black-heritage-curriculum-set-to-roll-out-in-waterloo-region-catholic-schools/" class="text-center" target="_blank">
                <img src="assets/img/featured-in/ctv.png" class="img-fluid">

                <div>
                  <h5><strong>CTV Collaboration</strong></h5>
                  <small>We partnered with CTV to feature student stories and key milestones through interviews and event coverage, boosting trust, and engagement across Canada.</small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="javascript:;" class="text-center">
                <img src="assets/img/featured-in/ontario.png" class="img-fluid">

                <div>
                  <h5><strong>Ontario Government</strong></h5>
                  <small>We supported Ontario initiatives with clear, accessible program content and resources aligned with provincial standards, improving communication and participation.</small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://www.cbc.ca/news/canada/kitchener-waterloo/guelph-black-heritage-society-lorraine-harris-curriculum-1.5906779" class="text-center" target="_blank">
                <img src="assets/img/featured-in/cbc.png" class="img-fluid">

                <div>
                  <h5><strong>CBC Collaboration</strong></h5>
                  <small>We worked with CBC on interviews and storytelling to share major updates, expand reach, and strengthen credibility through trusted national coverage.</small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://blogs1.conestogac.on.ca/news/2024/03/capstone_project_creates_marke.php" class="text-center" target="_blank">
                <img src="assets/img/featured-in/conestoga.png" class="img-fluid">

                <div>
                  <h5><strong>Conestoga Learning</strong></h5>
                  <small>We collaborated with Conestoga to build practical learning modules and assessments that support real classrooms and develop job-ready skills.</small>
                </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section our-story-wrap position-relative overflow-hidden">

      {{-- LEFT SIDE IMAGE --}}
      <img
        src="{{ asset('assets/img/column-left.png') }}"
        alt=""
        class="story-side story-side-left d-none d-lg-block"
        aria-hidden="true"
      >

      {{-- RIGHT SIDE IMAGE --}}
      <img
        src="{{ asset('assets/img/column-right.png') }}"
        alt=""
        class="story-side story-side-right d-none d-lg-block"
        aria-hidden="true"
      >

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center g-5">
          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('assets/img/home-infographic.png') }}" alt="Campus" class="img-fluid rounded-5">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <h2>OUR STORY</h2>
              <h3 class="text-danger"><strong>EDUCATING MINDS. INSPIRING HEARTS.</strong></h3>
            </div>

            <div class="mission-vision" data-aos="fade-up" data-aos-delay="400">
              <div class="mission bg-warning p-4 rounded-5">
                <p class="mb-0">As members of the BIPOC (Black, Indigenous, and People of Colour) community, our goal is to provide rich and relevant resources that promote equity, diversity, and inclusion. This work supports students and helps build a foundation for the best outcomes.</p>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section><!-- /About Section -->



    

    <!-- Mission Section (Figma style) -->
    <section id="our_mission" class="mission-section position-relative">
      <!-- TOP PATTERN -->
      <img
        src="{{ asset('assets/img/mission/pattern-top.png') }}"
        class="texture-pattern texture-pattern-top"
        alt=""
        aria-hidden="true"
      >

      <!-- BOTTOM PATTERN -->
      <img
        src="{{ asset('assets/img/mission/pattern-bottom.png') }}"
        class="texture-pattern texture-pattern-bottom"
        alt=""
        aria-hidden="true"
      >

      <!-- LEFT CHARACTER -->
      <img
        src="{{ asset('assets/img/mission/character-left.png') }}"
        class="mission-illustration mission-illustration-left d-none d-lg-block"
        alt=""
        aria-hidden="true"
      >

      <!-- RIGHT HAND/Africa -->
      <img
        src="{{ asset('assets/img/mission/hand-africa.png') }}"
        class="mission-illustration mission-illustration-right d-none d-lg-block"
        alt=""
        aria-hidden="true"
      >

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-6 m-auto">
            <div class="row g-4 justify-content-center mission-grid">

              <!-- MISSION -->
              <div class="col-12 col-md-6">
                <h2 class="mission-heading">OUR MISSION</h2>
                <div class="mission-card mission-card-red" data-aos="zoom-in" data-aos-delay="200">
                  <p class="mb-0">
                    We create inclusive educational resources that reflect the voices and experiences of
                    BIPOC communities. Our goal is to support student growth and promote equity in classrooms
                    and beyond.
                  </p>
                </div>
              </div>

              <!-- VISION -->
              <div class="col-12 col-md-6">
                <h2 class="mission-heading">OUR VISION</h2>
                <div class="mission-card mission-card-green" data-aos="zoom-in" data-aos-delay="300">
                  <p class="mb-0">
                    We envision schools where every student feels seen and supported. Through collaboration
                    and advocacy, we aim to create lasting change driven by diversity and community leadership.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Mission Section -->
     


    <!-- Students Life Block Section -->
    <section id="students-life-block" class="students-life-block custom-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="mb-0 text-white">Research</h2>
        <!-- <p>What does research say about "My Place"?</p> -->
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5 mb-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="hero-image-wrapper">
              <img src="assets/img/kids-studying.png" alt="Student Life" class="img-fluid main-image">
              <div class="floating-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="card-icon">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="card-content">
                  <span class="card-number">2500+</span>
                  <span class="card-label">Active Students</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="content-wrapper">
              <h2 data-aos="fade-up" data-aos-delay="400" class="text-white">What does research say about "My Place"?</h2>
              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">There's emerging research suggesting “values affirmation intervention and social belonging interventions markedly improve academic performance and health of stigmatized racial groups.”</p>

              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">This is summarized in a 2019 Harvard article by Williams, Lawrence, and Davis. It concludes self-affirmation enhances coping with stress, improves health behaviour, and boosts academic success.</p>
              
              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">My Place in This World curriculum aligns with these findings and aims to bring positive life outcomes, especially for BIPOC students.</p>

              <div class="cta-section" data-aos="fade-up" data-aos-delay="600">
                <a href="{{ route(name: 'about') }}" class="btn-primary cta-warning">Learn More</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Students Life Block Section -->

    <!-- <section id="leadership" class="leadership section division-of-learning py-4">

      <div class="dol-texture mb-5">
        <div class="dol-textured-img1"></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="leadership-section aos-init aos-animate" data-aos="fade-up">
          <div class="section-header text-center">
            <h2 class="title">Division Of Learning</h2>
          </div>

          <div class="dol-card-block">
            
              <div class="team-card primary-card">
                <div class="card-inner">
                  <div class="card-front">
                    <div class="member-image">
                      <img src="assets/img/person/person-m-4.webp" alt="Principal" class="img-fluid">
                    </div>
                    <div class="member-info">
                      <h4>Primary</h4>
                      <p>Grade(1-3)</p>
                    </div>
                  </div>
                  <div class="card-back">
                    <ul>
                      <li>Identify Africa as a continent of many countries</li>
                      <li>Learn some important facts that contribute to it being a “majestic” place in this world</li>
                      <li>Explore what it means to be an African King or Queen before transatlantic slavery</li>
                    </ul>
                    <a class="learn-link" href="{{ route('membership') }}">
                      <button class="btn btn-dark">Learn More</button>
                    </a>
                  </div>
                </div>
              
              </div>

              <div class="team-card junior-card">
                <div class="card-inner">
                  <div class="card-front">
                    <div class="member-image">
                      <img src="assets/img/person/person-f-6.webp" alt="Vice Principal" class="img-fluid">
                    </div>
                    <div class="member-info">
                      <h4>Junior</h4>
                      <p>Grade(4-6)</p>
                    </div>
                  </div>
                  <div class="card-back">
                    <ul>
                      <li>Identify the positive attributes of African experiences while debunking negative stereotypes</li>
                      <li>Explore the influence and contributions of African royalty before transatlantic slavery and up to the present</li>
                      <li>Make connections to their own experiences and current environment</li>
                    </ul>
                    <a class="learn-link" href="{{ route('membership') }}">
                      <button class="btn btn-dark">Learn More</button>
                    </a>
                  </div>
                </div>
              </div>
            
              <div class="team-card high-school-card">
                <div class="card-inner">
                  <div class="card-front">
                    <div class="member-image">
                      <img src="assets/img/person/person-f-4.webp" alt="Counseling Head" class="img-fluid">
                    </div>
                    <div class="member-info">
                      <h4>High School</h4>
                      <p>Grade(9-12)</p>
                    </div>
                  </div>
                  <div class="card-back">
                    <ul>
                      <li>Identify the positive attributes of African experiences while debunking negative stereotypes</li>
                      <li>Explore the influence and contributions of African royalty before transatlantic slavery and up to the present</li>
                      <li>Develop subject-specific curricular skills as they make connections to their lives, current events, and present-day Black leaders</li>
                    </ul>
                    <a class="learn-link" href="{{ route('membership') }}">
                      <button class="btn btn-dark">Learn More</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="dol-texture mt-5">
        <div class="dol-textured-img2"></div>
      </div>

    </section> -->




    <section class="division-of-learning-home py-5 position-relative">
      <div class="container-fluid">

        <div class="dol-v2 mt-0">
          <div class="row g-4 justify-content-center">

            <!-- TOP PATTERN -->
            <img
              src="{{ asset('assets/img/star-boy-ladder.png') }}"
              class="dol-home-image-bottom-left"
              aria-hidden="true"
            >
            
              <div class="col-md-12">
                <h3 class="text-center"><strong>DIVISION OF LEARNING</strong></h3>
                <div class="dol-home-cards">
                  {{-- PRIMARY --}}
                  <div class="dol-card dol-primary">
                    <!-- <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/primary-avatar.png') }}" alt="Primary" class="img-fluid">
                    </div> -->

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">Primary</h3>
                      <!-- <p class="dol-grade">Grade (1-3)</p> -->

                      <p class="dol-text">
                        Primary students explore African Kings and Queens through hands-on activities. They learn African heritage in an engaging, age-appropriate way. This builds connection, identity, and belonging. Students begin to see themselves in the learning |
                        <a href="{{ route('membership') }}" class="text-success"><strong>More...</strong></a>
                      </p>

                      <a href="{{ route('register') }}" class="dol-btn">Subscription Required</a>
                    </div>
                  </div>

                  {{-- JUNIOR / INTERMEDIATE --}}
                  <div class="dol-card dol-junior">
                    <!-- <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/junior-avatar.png') }}" alt="Junior/Intermediate" class="img-fluid">
                    </div> -->

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">Junior/Intermediate</h3>
                      <!-- <p class="dol-grade">Grade (4-6)</p> -->

                      <p class="dol-text">
                        Junior/Intermediate students explore African Kings and Queens through interactive activities. Familiar learning tools keep them engaged and motivated. This builds connection, identity, and belonging. Students reflect and share ideas with confidence |
                        <a href="{{ route('membership') }}" class="text-success"><strong>More...</strong></a>
                      </p>

                      <a href="{{ route('register') }}" class="dol-btn">Subscription Required</a>
                    </div>
                  </div>

                  {{-- HIGH SCHOOL --}}
                  <div class="dol-card dol-high">
                    <!-- <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/high-avatar.png') }}" alt="High School" class="img-fluid">
                    </div> -->

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">High School</h3>
                      <!-- <p class="dol-grade">Grade (9-12)</p> -->

                      <p class="dol-text">
                        High School students explore African Kings and Queens through deeper learning and discussion. They examine rich topics and sometimes challenging issues thoughtfully. This builds connection, identity, and belonging. Students make meaningful links to real life |
                        <a href="{{ route('membership') }}" class="text-success"><strong>More...</strong></a>
                      </p>

                      <a href="{{ route('login') }}" class="dol-btn">Login Required</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>

      </div>
    </section>




    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section py-0">

      <!-- Section Title -->
      <div class="container-fluid py-4 bg-dark section-title" data-aos="fade-up">
        <h2 class="text-white mb-0">TESTIMONIALS</h2>
        <p class="text-white">Our team believes that the best advocacy comes from the people who will benefit from<br>using this curriculum. Here's an opportunity to listen to what the key stakeholders are saying.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid bg-red pt-4" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonial-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "slidesPerView": 1,
              "spaceBetween": 30,
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 1
                },
                "1200": {
                  "slidesPerView": 1
                }
              }
            }
          </script>

          <div class="swiper-wrapper">

            <!-- Video Slide 1 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="200">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/uqbY-uwcIkQ" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>This learning helps me understand where I come from, how the world connects and how my thinking can grow.</p>
                  <h3>Marcia Smellie</h3>
                </div>
              </div>
            </div>

            <!-- Video Slide 2 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="300">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/N581ErKKz8I" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>Resources that support thoughtful, curriculum-aligned instruction and deeper student understanding.</p>
                  <h3>Taanya Solanki</h3>
                </div>
              </div>
            </div>

            <!-- Video Slide 3 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="400">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/6baO9pc0_RE" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>Education that fosters positive allyship and creates a more knowledgeable, resilient student.</p>
                  <h3>Jennifer Colacrai</h3>
                </div>
              </div>
            </div>

            <!-- Video Slide 4 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="500">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/tLUb8ze5aJM" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>Learning that helps me see history more clearly, feel proud of who I am, and respect others' stories.</p>
                  <h3>Mela Gebremichael</h3>
                </div>
              </div>
            </div>

            <!-- Video Slide 5 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="600">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/Cv-LW8i57HA" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>Lessons that spark curiosity, build confidence, and connect classroom learning to real life.</p>
                  <h3>Sharon Adie</h3>
                </div>
              </div>
            </div>

            <!-- Video Slide 6 -->
            <div class="swiper-slide">
              <div class="slider-video-block">
                <div class="slider-video" data-aos="zoom-in" data-aos-delay="700">
                  <iframe width="100%" height="350" 
                    src="https://www.youtube.com/embed/LAxrIqtau_w" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="slider-content">
                  <h1 class="mt-3"><i class="bi bi-quote"></i></h1>
                  <p>Resources that make conversations easier, encourage critical thinking, and strengthen belonging for every student.</p>
                  <h3>Brenda Tibingana</h3>
                </div>
              </div>
            </div>

          </div>


          <div class="swiper-navigation">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->
        
    <!-- Stats Section -->
    <section id="alumni" class="alumni section home-embedded position-relative">

      <!-- TOP PATTERN -->
      <img
        src="{{ asset('assets/img/mission/pattern-top.png') }}"
        class="texture-pattern texture-pattern-top opacity-50"
        alt=""
        aria-hidden="true"
      >

      <!-- BOTTOM PATTERN -->
      <img
        src="{{ asset('assets/img/mission/pattern-bottom.png') }}"
        class="texture-pattern texture-pattern-bottom opacity-50"
        alt=""
        aria-hidden="true"
      >

      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-6 aos-init aos-animate mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="alumni-video">
              <div class="ratio ratio-16x9">
                <iframe 
                  src="https://www.youtube.com/embed/I6ja642TOLo" 
                  title="YouTube video" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          </div>
          <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="alumni-intro">
              <h2><strong>How to Include Everyone in Education</strong></h2>
              <p>Our team believes that the best advocacy comes from the people who will benefit from using this curriculum. Here's an opportunity to listen to what the key stakeholders are saying.</p>
            </div>
            <div class="text-center">
                <a href="{{ route('contact.show') }}" class="btn btn-danger">Say Hi!</a>
              </div>
          </div>
        </div>

      </div>

    </section>

  </main>

@endsection
