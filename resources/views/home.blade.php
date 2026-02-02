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
              <p><strong>At My Place in This World,</strong> we believe education is the key to unlocking and fostering every student's potential. We also believe that when students understand where they come from, they develop a stronger sense of identity, confidence, and connection to the world around them. Our thoughtfully crafted educational resources build a strong sense of belonging and pride for Black students while cultivating respect, understanding, and allyship among their non-Black peers.</p>
            </div>
           <div class="col-lg-6 hero-media" data-aos="zoom-in" data-aos-delay="200">

              <div class="ratio ratio-16x9 hero-video">
                <iframe
                  src="https://www.youtube.com/embed/VNfctvEShVY?rel=0&modestbranding=1"
                  title="YouTube video"
                  class="rounded-5"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>

              <!-- <div class="image-overlay">
                <div class="badge-accredited">
                  <i class="bi bi-patch-check-fill"></i>
                  <span>Accredited Excellence</span>
                </div>
              </div> -->

            </div>

            <div class="col-lg-12 hero-media" data-aos="zoom-in" data-aos-delay="300">
              <p>By celebrating our glorious past of Black excellence and achievement prior to slavery and colonialism where Blacks made significant contributions to world civilization; we take a strengths-based, hopeful, and non-blaming approach that honors heritage, builds confidence, and supports a mindset of excellence for all learners. Through this shared understanding of history and humanity, we create learning environments where every student feels valued, empowered, and positioned for success.</p>
              <div class="action-buttons">
                <a href="{{ route('register') }}" class="btn-danger">Start Your Journey</a>
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
                <a href="https://www.ctvnews.ca/kitchener/article/black-heritage-curriculum-set-to-roll-out-in-waterloo-region-catholic-schools/" target="_blank">

                <div class="text-center">
                  <img src="assets/img/featured-in/ctv.png" class="img-fluid">
                  <h5>CTV Collaboration</h5>
                  
                  <small>Featured by CTV News for showcasing a curriculum that builds pride, representation and year-round engagement with Black history beyond a single month. </small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="javascript:;" target="_blank">
                  <div class="text-center">
                    <img src="assets/img/featured-in/ontario.png" class="img-fluid">
                    <h5>Ontario Government</h5>
                    
                  <small>Endorsed and aligned with the Ontario Ministry of Education, with careful design ensuring curriculum expectations are met and educational standards are fully supported.</small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://www.cbc.ca/news/canada/kitchener-waterloo/guelph-black-heritage-society-lorraine-harris-curriculum-1.5906779" target="_blank">

                <div class="text-center">
                  <img src="assets/img/featured-in/cbc.png" class="img-fluid">
                  <h5>CBC Collaboration</h5>
                  
                  <small>Featured by CBC News, highlighting how My Place in This World reframes Black history by centering African kings, queens and pre-colonial excellence.</small>
                </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-card align-items-center">
                <a href="https://blogs1.conestogac.on.ca/news/2024/03/capstone_project_creates_marke.php" target="_blank">
                  <div class="text-center">
                    <img src="assets/img/featured-in/conestoga.png" class="img-fluid">
                    <h5>Conestoga Learning</h5>
                    
                  <small>Partnered with Conestoga College students, who developed a full marketing and communications strategy to amplify our mission and long-term impact.</small>
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
            <div class="about-content text-center" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('assets/img/home-infographic.gif') }}" alt="An illustrated classroom scene shows a Black teacher wearing African-inspired clothing holding a colorful map of Africa while smiling students sit around a table. The students read books, look at a laptop displaying portraits of diverse Black children, and engage in discussion in a bright classroom decorated with Pan-African colors and symbols." class="img-fluid rounded-5">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-content" data-aos="fade-up" data-aos-delay="200">
              <h2>OUR STORY</h2>
              <h3 class="text-red"><strong>EDUCATING MINDS. INSPIRING HEARTS.</strong></h3>
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
        src="{{ asset('assets/img/mission/character-left.svg') }}"
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
                    We create educational resources that build identity, belonging, and pride by highlighting the significant contributions of Black people to world civilization through a positive, non-blaming approach that fosters respect and allyship among all students.
                  </p>
                </div>
              </div>

              <!-- VISION -->
              <div class="col-12 col-md-6">
                <h2 class="mission-heading">OUR VISION</h2>
                <div class="mission-card mission-card-green" data-aos="zoom-in" data-aos-delay="300">
                  <p class="mb-0">
                    A world where every student knows their roots, feels valued and connected, and thrives with confidence, purpose, shared humanity, with a can-do mindset. We envision a school where every student feels seen, heard and celebrated within their learnning.
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
      <div class="container section-title pb-0" data-aos="fade-up">
        <h2 class="mb-0 text-white">Research</h2>
        <!-- <p>What does research say about "My Place"?</p> -->
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="hero-image-wrapper">
              <img src="assets/img/research-home.gif" alt="Three young Black children sit side by side, focused on writing or drawing at a table, against a bold red background with abstract green shapes." class="img-fluid main-image">
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
              <h2 data-aos="fade-up" data-aos-delay="400" class="text-white fw-normal">What does research say about "My Place"?</h2>
              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">There's emerging research suggesting “values affirmation intervention and social belonging interventions markedly improve academic performance and health of stigmatized racial groups.”</p>

              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">This is summarized in a 2019 Harvard article by Williams, Lawrence, and Davis. It concludes self-affirmation enhances coping with stress, improves health behaviour, and boosts academic success.</p>
              
              <p class="lead-text text-white mb-2" data-aos="fade-up" data-aos-delay="450">My Place in This World curriculum aligns with these findings and aims to bring positive life outcomes, especially for BIPOC students.</p>

              <div class="cta-section" data-aos="fade-up" data-aos-delay="600">
                <a href="https://dash.harvard.edu/server/api/core/bitstreams/3adafce6-8d40-4b54-b966-d673334f1ddc/content" class="btn-primary cta-warning" target="_blank">Learn More</a>
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
            <h2 class="title">S</h2>
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
              src="{{ asset('assets/img/star-boy.svg') }}"
              class="dol-home-image-bottom-left"
              alt="Illustration of a smiling Black child wearing a patterned Kente-style scarf, pointing upward toward a line of stars connected like a constellation, with a ladder reaching up toward the stars against a green background."
              aria-hidden="true" >
            
              <div class="col-md-12">
                <h3 class="text-center text-white"><strong>DIVISIONS OF LEARNING</strong></h3>
                <div class="dol-home-cards">
                  {{-- PRIMARY --}}
                  <div class="dol-card dol-primary">
                    <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/primary-avatar.svg') }}" alt="Primary" class="img-fluid">
                    </div>

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">Primary</h3>
                      <!-- <p class="dol-grade">Grade (1-3)</p> -->
                      <div class="dol-body-content">
                        <p class="dol-text">
                          Primary students explore African Kings and Queens through hands-on activities. They learn African heritage in an engaging, age-appropriate way. This stage will build connection, identity and belonging. Students begin to see themselves in the learning.
                        </p>
                        <a href="{{ route('membership') }}" class="dol-btn">Learn More</a>
                      </div>
                    </div>
                  </div>

                  {{-- JUNIOR / INTERMEDIATE --}}
                  <div class="dol-card dol-junior">
                    <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/junior-avatar.svg') }}" alt="Junior/Intermediate" class="img-fluid">
                    </div>

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">Junior/Intermediate</h3>
                      <div class="dol-body-content">
                        <!-- <p class="dol-grade">Grade (4-6)</p> -->

                        <p class="dol-text">
                          Junior Intermediate students explore African Kings and Queens through interactive activities. Familiar learning tools keep them engaged and motivated. The foundation of connection, identity and belonging is strengthened through broader applications.
                        </p>
                        <a href="{{ route('membership') }}" class="dol-btn">Learn More</a>
                      </div>
                    </div>
                  </div>

                  {{-- HIGH SCHOOL --}}
                  <div class="dol-card dol-high">
                    <div class="dol-avatar">
                      <img src="{{ asset('assets/img/person/high-avatar.svg') }}" alt="High School" class="img-fluid">
                    </div>

                    <div class="dol-paper"></div>

                    <div class="dol-body">
                      <h3 class="mb-3">High School</h3>
                      <!-- <p class="dol-grade">Grade (9-12)</p> -->
                      <div class="dol-body-content">
                        <p class="dol-text">
                          High School students explore African Kings and Queens through deeper learning and discussion. They examine rich topics and sometimes challenging issues thoughtfully.  This is the final step in students affirming their identities and belonging.
                        </p>

                        <a href="{{ route('membership') }}" class="dol-btn">Learn More</a>
                      </div>
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
    <p class="text-white">
      Our team believes that the best advocacy comes from the people who will benefit from<br>
      using this curriculum. Here's an opportunity to listen to what the key stakeholders are saying.
    </p>
  </div><!-- End Section Title -->

  <div class="container-fluid bg-red pt-4" data-aos="fade-up" data-aos-delay="100">

    <div class="testimonial-slider swiper init-swiper">

      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 500,
          "slidesPerView": 1,
          "spaceBetween": 0,

          "effect": "fade",
          "fadeEffect": { "crossFade": true },

          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },

          "breakpoints": {
            "768": { "slidesPerView": 1 },
            "1200": { "slidesPerView": 1 }
          }
        }
      </script>

      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="200">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/uqbY-uwcIkQ?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "We have an opportunity to connect all youth and in particular Black youth with positive
                stories and images about Black History, not just for February, but for the whole year."
              </p>
              <h3>Marcia Smellie</h3>
            </div>

          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="300">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/N581ErKKz8I?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "The diversity of these activities and the multiple entry points for students of all academic
                abilities, make this specific resource, very user friendly, fun, but perhaps most important,
                engaging for all grade levels."
              </p>
              <h3>Taanya Solanki</h3>
            </div>

          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="400">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/6baO9pc0_RE?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "It was incredible also to witness everyone in the class eager to participate within Black and
                African music and culture."
              </p>
              <h3>Jennifer Colacrai</h3>
            </div>

          </div>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="500">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/tLUb8ze5aJM?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "All I ever heard about was slavery, and so many sad stories. Now I understand that there is so
                much more."
              </p>
              <h3>Mela Gebremichael</h3>
            </div>

          </div>
        </div>

        <!-- Slide 5 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="600">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/Cv-LW8i57HA?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "It's important to have a curriculum that responds to our equity, diversity and inclusion goals
                in a tangible way."
              </p>
              <h3>Sharon Adie</h3>
            </div>

          </div>
        </div>

        <!-- Slide 6 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="700">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/LAxrIqtau_w?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "My Place in this World offers the opportunity for boys such as mine to be able to understand
                African history and understand what their ancestors contributed to the global society."
              </p>
              <h3>Brenda Tibingana</h3>
            </div>

          </div>
        </div>

        <!-- Slide 7 -->
        <div class="swiper-slide">
          <div class="slider-video-block">

            <div class="slider-video" data-aos="zoom-in" data-aos-delay="800">
              <div class="polaroid-wrap">
                <div class="polaroid-screen">
                  <iframe
                    src="https://www.youtube.com/embed/AtIbONPhGiU?rel=0"
                    title="YouTube video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
                </div>

                <img
                  src="{{ asset('assets/img/slider-frame.png') }}"
                  class="polaroid-frame"
                  alt="Video frame">
              </div>
            </div>

            <div class="slider-content">
              <p class="mb-0">
                "It takes a village to raise our children. Also, it takes a curriculum that informs, teaches and
                inspires children to reach their full potential. Every child deserves to know who they are and
                that they have a place in this world."
              </p>
              <h3>Karl Subban</h3>
            </div>

          </div>
        </div>

      </div><!-- /swiper-wrapper -->

      <div class="swiper-navigation">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

    </div><!-- /testimonial-slider -->

  </div><!-- /container-fluid -->

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
        <div class="row align-items-center">
          <div class="col-lg-6 mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="tv-wrap">
              <!-- VIDEO (goes inside the screen area) -->
              <div class="tv-screen">
                <iframe
                src="https://www.youtube.com/embed/I6ja642TOLo?rel=0"
                title="YouTube video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
                referrerpolicy="strict-origin-when-cross-origin">
              </iframe>

              </div>

              <!-- TV FRAME IMAGE (on top) -->
              <img src="{{ asset('assets/img/tv-frame.svg') }}" class="tv-frame" alt="TV Frame">
            </div>
          </div>
          <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="alumni-intro">
              <h2><strong>How to Include Everyone in Education</strong></h2>
              <p>Please watch this important video then click “Say Hi”</p>
            </div>
            <div class="text-center">
                <a href="{{ route('contact.show') }}" class="btn btn-danger">Say Hi!</a>
              </div>
          </div>
        </div>

      </div>

    </section>

  </main>

  <script>
document.addEventListener('DOMContentLoaded', () => {
  const swiperEl = document.querySelector('#testimonials .init-swiper');
  if (!swiperEl) return;

  // Wait until your theme creates the Swiper instance (it sets swiperEl.swiper)
  const waitForSwiper = setInterval(() => {
    if (!swiperEl.swiper) return;

    clearInterval(waitForSwiper);
    const sw = swiperEl.swiper;

    // Stop videos when slide starts changing
    sw.on('slideChangeTransitionStart', () => {
      swiperEl.querySelectorAll('iframe').forEach((ifr) => {
        const src = ifr.getAttribute('src');
        if (src) ifr.setAttribute('src', src); // reloads iframe => stops playback
      });
    });
  }, 100);
});
</script>

@endsection
