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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget lacus id tortor facilisis tincidunt. Donec gravida risus at sollicitudin luctus.</p>
              <div class="stats-row">
                <div class="stat-item">
                  <span class="stat-number">96%</span>
                  <span class="stat-label">Employment Rate</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">12:1</span>
                  <span class="stat-label">Student-Teacher Ratio</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">50+</span>
                  <span class="stat-label">Programs</span>
                </div>
              </div>
              <div class="action-buttons">
                <a href="#" class="btn-primary">Start Your Journey</a>
                <a href="#" class="btn-secondary">Virtual Tour</a>
              </div>
            </div>
            <div class="col-lg-6 hero-media" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/education/showcase-6.webp" alt="Education" class="img-fluid main-image">
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

      <!-- <div class="upcoming-event" data-aos="fade-up" data-aos-delay="400">
        <div class="container">
          <div class="event-content">
            <div class="event-date">
              <span class="day">15</span>
              <span class="month">NOV</span>
            </div>
            <div class="event-info">
              <h3>Spring Semester Open House</h3>
              <p>Join us to explore campus facilities, meet our faculty, and learn about scholarship opportunities.</p>
            </div>
            <div class="event-action">
              <a href="#" class="btn-event">RSVP Now</a>
              <span class="countdown">Starts in 3 weeks</span>
            </div>
          </div>
        </div>
      </div> -->

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/education/campus-5.webp" alt="Campus" class="img-fluid rounded">
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
                <div class="mission">
                  <h3>Our Mission</h3>
                  <p>We create inclusive educational resources that reflect the voices and experiences of BIPOC communities. Our goal is to support student growth and promote equity in classrooms and beyond.</p>
                </div>

                <div class="vision">
                  <h3>Our Vision</h3>
                  <p>We envision schools where every student feels seen and supported. Through collaboration and advocacy, we aim to create lasting change driven by diversity and community leadership.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="row mt-5">
          <div class="col-lg-12">
            <div class="core-values" data-aos="fade-up" data-aos-delay="500">
              <h3 class="text-center mb-4">Core Values</h3>
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                  <div class="value-card">
                    <div class="value-icon">
                      <i class="bi bi-book"></i>
                    </div>
                    <h4>Academic Excellence</h4>
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>
                  </div>
                </div>

                <div class="col">
                  <div class="value-card">
                    <div class="value-icon">
                      <i class="bi bi-people"></i>
                    </div>
                    <h4>Community Engagement</h4>
                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
                  </div>
                </div>

                <div class="col">
                  <div class="value-card">
                    <div class="value-icon">
                      <i class="bi bi-lightbulb"></i>
                    </div>
                    <h4>Innovation</h4>
                    <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                  </div>
                </div>

                <div class="col">
                  <div class="value-card">
                    <div class="value-icon">
                      <i class="bi bi-globe"></i>
                    </div>
                    <h4>Global Perspective</h4>
                    <p>Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

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

              <!-- <div class="info-grid" data-aos="fade-up" data-aos-delay="500">
                <div class="info-item">
                  <div class="info-icon">
                    <i class="bi bi-calendar-event"></i>
                  </div>
                  <div class="info-text">
                    <strong>Year-Round Events</strong>
                    <span>Interactive programming throughout the year reinforces belonging and personal growth, helping students stay engaged and confident.</span>
                  </div>
                </div>

                <div class="info-item">
                  <div class="info-icon">
                    <i class="bi bi-award"></i>
                  </div>
                  <div class="info-text">
                    <strong>Achievement Programs</strong>
                    <span>Custom-built activities promote self-affirmation, goal setting, and academic success — especially tailored for BIPOC youth.</span>
                  </div>
                </div>
              </div> -->

              <div class="cta-section" data-aos="fade-up" data-aos-delay="600">
                <a href="student-activities.html" class="btn-primary cta-warning">Learn More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="activities-showcase">
          <div class="row g-4">
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
              <div class="featured-activity">
                <div class="activity-media">
                  <img src="assets/img/education/activities-2.webp" alt="Featured Activity" class="img-fluid">
                  <div class="activity-overlay">
                    <div class="overlay-content">
                      <h4>Student Organizations</h4>
                      <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                      <a href="#" class="overlay-btn">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
              <div class="activities-list">
                <div class="activity-item" data-aos="slide-up" data-aos-delay="350">
                  <div class="activity-thumb">
                    <img src="assets/img/education/activities-6.webp" alt="Research Projects" class="img-fluid">
                  </div>
                  <div class="activity-info">
                    <h6>Research Projects</h6>
                    <p>Sed ut perspiciatis unde omnis natus error</p>
                  </div>
                </div>

                <div class="activity-item" data-aos="slide-up" data-aos-delay="400">
                  <div class="activity-thumb">
                    <img src="assets/img/education/activities-1.webp" alt="Community Service" class="img-fluid">
                  </div>
                  <div class="activity-info">
                    <h6>Community Service</h6>
                    <p>At vero eos et accusamus et iusto odio</p>
                  </div>
                </div>

                <div class="activity-item" data-aos="slide-up" data-aos-delay="450">
                  <div class="activity-thumb">
                    <img src="assets/img/education/activities-4.webp" alt="Innovation Labs" class="img-fluid">
                  </div>
                  <div class="activity-info">
                    <h6>Innovation Labs</h6>
                    <p>Temporibus autem quibusdam officiis debitis</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

      </div>

    </section><!-- /Students Life Block Section -->

    <section class="pt-0">

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
                    <a class="learn-link" href="/membership/">
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
                    <a class="learn-link" href="/membership/">
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
                    <a class="learn-link" href="/membership/">
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
                <a href="#" class="btn btn-primary">Say Hi!</a>
              </div>
          </div>
        </div>

      </div>

    </section>

  </main>

@endsection
