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

      <div class="feature-cards-wrapper featured-by bg-dark" data-aos="fade-up" data-aos-delay="300">
        <div class="container">
          <div class="row gy-4">
            <h2 class="text-white pt-2">As featured by:</h2>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://www.cbc.ca/news/canada/kitchener-waterloo/guelph-black-heritage-society-lorraine-harris-curriculum-1.5906779" class="text-center" target="_blank">
                <img src="assets/img/CBC-logo.png" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://www.ctvnews.ca/kitchener/article/black-heritage-curriculum-set-to-roll-out-in-waterloo-region-catholic-schools/" class="text-center" target="_blank">
                <img src="assets/img/CTV-logo.png" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="javascript:;" class="text-center">
                <img src="assets/img/ontario-logo.png" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://blogs1.conestogac.on.ca/news/2024/03/capstone_project_creates_marke.php" class="text-center" target="_blank">
                <img src="assets/img/conestoga-logo.svg" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/home-infographic.gif" alt="Campus" class="img-fluid rounded">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <h3>Our Story</h3>
              <h2>Educating Minds, Inspiring Hearts</h2>
              <p>As members of the BIPOC (Black, Indigenous, and People of Colour) community, our goal is to provide rich and relevant resources that promote equity, diversity, and inclusion. This work supports students and helps build a foundation for the best outcomes.</p>
            </div>
            <div class="about-image" data-aos="zoom-in" data-aos-delay="300">

              <div class="mission-vision" data-aos="fade-up" data-aos-delay="400">
                <div class="mission bg-warning">
                  <h3>Our Mission</h3>
                  <p>We create inclusive educational resources that reflect the voices and experiences of BIPOC communities. Our goal is to support student growth and promote equity in classrooms and beyond.</p>
                </div>

                <div class="vision bg-success">
                  <h3>Our Vision</h3>
                  <p>We envision schools where every student feels seen and supported. Through collaboration and advocacy, we aim to create lasting change driven by diversity and community leadership.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

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

    <section id="leadership" class="leadership section division-of-learning py-4">

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

    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Our team believes that the best advocacy comes from the people who will benefit from using this curriculum. Here's an opportunity to listen to what the key stakeholders are saying.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

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
                  "slidesPerView": 2
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
              <div data-aos="zoom-in" data-aos-delay="200">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/uqbY-uwcIkQ" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Video Slide 2 -->
            <div class="swiper-slide">
              <div data-aos="zoom-in" data-aos-delay="300">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/N581ErKKz8I" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Video Slide 3 -->
            <div class="swiper-slide">
              <div data-aos="zoom-in" data-aos-delay="400">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/6baO9pc0_RE" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Video Slide 4 -->
            <div class="swiper-slide">
              <div data-aos="zoom-in" data-aos-delay="500">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/tLUb8ze5aJM" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Video Slide 5 -->
            <div class="swiper-slide">
              <div data-aos="zoom-in" data-aos-delay="600">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/Cv-LW8i57HA" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Video Slide 6 -->
            <div class="swiper-slide">
              <div data-aos="zoom-in" data-aos-delay="700">
                  <iframe width="100%" height="500" 
                    src="https://www.youtube.com/embed/LAxrIqtau_w" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen loading="lazy"></iframe>
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
    
    <section class="section home-grey-bg pb-0">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-6 aos-init aos-animate">
            <img src="assets/img/texture-img.png" class="img-fluid mb-4">
          </div>
          <div class="col-lg-6 aos-init aos-animate"></div>
        </div>
      </div>
    </section>
        
    <!-- Stats Section -->
    <section id="alumni" class="alumni section home-embedded pt-0">

      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row mb-5">
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
              <h2>How to Include Everyone in Education</h2>
              <p>Who really gets to participate meaningfully in the classroom? Not just who's physically there but whose stories, ideas and perspectives actually shape the learning? By thoughtfully including the histories, knowledge and contributions of Black and African communities, we create richer, more complete learning environments for everyone. All curriculum should prepare students for a world that values truth, excellence and shared humanity.</p>
            </div>
            <div class="text-center">
                <a href="{{ route('contact.show') }}" class="btn btn-primary">Say Hi!</a>
              </div>
          </div>
        </div>

      </div>

    </section>

  </main>

@endsection
