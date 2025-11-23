@extends('layouts.app')

@section('title', 'About Us - Empowering Minds, Embracing Heritage, Shaping the Future')

@section('meta')
  <meta name="description" content="What is My Place? The curriculum focuses on the positive heritage of African Kings and Queens to empower BIPOC students and support culturally relevant pedagogy." />
  <meta property="og:title" content="About Us - My Place In This World" />
  <meta property="og:description" content="Empowering Minds, Embracing Heritage, Shaping the Future — curriculum and resources to strengthen student identity and achievement." />
  <meta property="og:type" content="website" />
@endsection

@section('content')
<style>
  /* Page reset: remove default page margin/padding and use border-box sizing */
  html, body { margin: 0; padding: 0; }
  *, *::before, *::after { box-sizing: border-box; }

  .bg-cream { background-color: #FCEDCB; }

  /* Smooth width animation for accordion */
  .accordion-auto {
    width: fit-content;
    transition: width 0.35s ease;
  }

  .accordion-auto.expanded {
    width: 100%;
  }

  /* Remove Bootstrap arrow */
  .accordion-button::after { display: none; }

  /* Smooth hover transition for Learn More button */
  .accordion-button {
    transition: background-color 0.25s ease, color 0.25s ease, transform 0.08s ease;
    justify-content: center !important;
    text-align: center;
    border: none !important;
  }

  .accordion-button:hover { background-color: #bb2d3b !important; color: white !important; }
  .accordion-button:focus { box-shadow: none !important; }
  .accordion-button:active { transform: scale(0.98); }

  /* Ensure text stays centered on collapse/expand */
  .accordion-button:not(.collapsed) { justify-content: center !important; text-align: center !important; }

</style>
<div class="about-page bg-cream">
  
  <!-- Header Section -->
  <section class="text-center py-5 bg-cream">
    <h1 class="display-5 fw-bold mb-3">What is My Place?</h1>
    <h2 class="h2 fw-black text-uppercase ls-2 mb-4">ABOUT THE CONTENT</h2>
    <img src="{{ asset('assets/img/about/hr.png') }}" alt="" class="img-fluid mw-450">
  </section>

  <!-- Content Section -->
  <section class="py-5 px-3 bg-cream">
    <div class="container">
      <div class="row">
        
        <!-- Text Column -->
        <div class="col-lg-7 mb-4 mb-lg-0 ">
          <p class="mb-4 lh-lg">The negative, systemic, and generational impact of the slavery narrative continues to haunt many young Black students as they face high levels of depression, suicide, and a lack of self-worth. The content of this curriculum focuses on the positive impact of the majestic Kings and Queens of Africa prior to the transatlantic slave trade. This allows both Black and non-Black students to develop a new respect and admiration for the Black race and culture that may not have been possible through slavery narratives.</p>

          <p class="mb-4 lh-lg">The activities on our website include many videos and reading pieces to support student learning. When there is significant new information, we often use videos for reading and writing requirements. As concepts are reinforced, we gradually introduce more complex texts and shift to more challenging curricular skills, such as reading primary documents and expressing critical and creative thinking skills through the creation of texts.</p>

          <p class="mb-4 lh-lg">My Place in this World effectively aligns with provincial curriculum expectations, school-board wellness initiatives, CRRP goals (culturally relevant and responsive pedagogy), and equity action plans.</p>

          <p class="mb-4 lh-lg">The activities are cross-curricular and varied in terms of challenge. The learning outcomes for each Placemat evolve with the level of difficulty. The elementary activities are balanced, being both specific and inquiry-based. The high school activities follow the curriculum more explicitly with a focus on 21st-century graduate expectations. Students will find the activities engaging and experience focused learning. Our Teacher Support Line provides a forum for feedback, questions, and clarification.</p>

          <p class="mb-4 lh-lg">Finally, thank you to all those who contributed to My Place in This World.</p>
        </div>

        <!-- Map Column -->
        <div class="col-lg-5">
          <div class="bg-white p-4 rounded shadow-sm">
            <h3 class="h4 fw-bold mb-3">Map of Africa</h3>
            <p class="mb-4">This interactive tool invites you to explore the African continent! Hover over any country to uncover its name and unique history.</p>
            <img src="{{ asset('assets/img/about/map-placeholder.png') }}" alt="Map of Africa" class="img-fluid">
          </div>
        </div>

      </div>

      <!-- Accordion - Expandable Width -->
      <div class="mt-5 d-flex justify-content-center">
        <div class="accordion accordion-flush custom-red-accordion accordion-auto" id="aboutAccordion">
          <div class="accordion-item border-0">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-danger  text-white fw-bold fs-5 py-4 px-5 border-0" 
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Learn More
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
              <div class="accordion-body bg-cream p-4">
                <p class="mb-3">Here are some things educators are going to need to go on this journey:</p>
                <ul class="ps-4">
                  <li class="mb-2">Willingness</li>
                  <li class="mb-2">Open Mind</li>
                  <li class="mb-2">Cultural Sensitivity and Awareness</li>
                  <li class="mb-2">Don't Assume (they know, they don't know)</li>
                  <li class="mb-2">Stay focused on Big Ideas (changing the narrative)</li>
                  <li class="mb-2">Validate (the Black Experience)</li>
                  <li class="mb-2">Know Your Purpose (just because the rest of the class is not Black, does not mean they can't benefit)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Divider -->
  <div class="text-center p-0 m-0 lh-0">
    <img src="{{ asset('assets/img/imgborder2-1024x74.png') }}" alt="" class="img-fluid w-100 d-block m-0">
  </div>
<!-- Lorraine Harris Section -->
<section class="py-5 px-2 bg-white">
  <div class="container-fluid px-4">
    <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-stretch justify-content-between gap-5 profile-row">
      
      <div class="flex-grow-1">
        <h2 class="h2 fw-bold mb-3">Lorraine Harris</h2>
        <h3 class="h5 fw-semibold mb-3 text-success">Co-Founder and Co-Creator of My Place In This World</h3>
        <p class="fw-semibold text-secondary mb-3">Forward Thinking, Visionary, Innovator, Authentic, Risk Taker, Resilient</p>
        <img src="{{ asset('assets/img/about/hr.png') }}" alt="" class="img-fluid mb-4" style="max-width: 200px;">

        <p class="mb-3 lh-lg">
          Co-Founder and co-creator of My Place in This World, administrator Lorraine Harris has been working in the field of education for over 25 years. Lorraine is a wife and mother. She holds degrees in Education, Music, and Psychology. Lorraine has been the recipient of many awards, both locally and provincially, for her participation in various community outreach projects, sharing her gifts, time, and talents in the performing arts. Most recently she was the recipient of the Ontario Volunteer Service Award for 2020 in her region.
        </p>

        <p class="mb-3 lh-lg">
          Lorraine’s experience working at the elementary, secondary, and university levels has equipped her with a diverse skill set. Lorraine has supported multiple schools and served diverse student populations. She has demonstrated an excellent ability to lead, support, and collaborate with teachers to ensure strategies are in place to support equity in student learning. She’s a visionary with a keen ability to create engaging activities to help students grasp key curriculum content. Lorraine has created both published and unpublished resources currently being used in her board.
        </p>

        <p class="lh-lg">
          Lorraine is an innovator with the foresight to see firsthand the need for curriculum content that empowers all students—and particularly in this current environment—Black students and others in the BIPOC community. In doing so, they develop a positive self-concept and a sense of truly belonging, of having a place in this world.
        </p>
      </div>

      <div class="flex-shrink-0 text-center">
        <img src="{{ asset('assets/img/about/lorraine.png') }}" 
             alt="Lorraine Harris" 
             class="rounded" 
             style="width: 100%; max-width: 600px; height: auto; object-fit: cover; border: 3px solid #ccc;">
      </div>

    </div>
  </div>
</section>


<!-- Divider -->
<div class="bg-white p-0 m-0 lh-0">
  <img src="{{ asset('assets/img/about/imgborder2-1024x74.png') }}" alt="" class="img-fluid w-100 d-block m-0">
</div>

<!-- Michael Harris Section -->
<section class="py-5 px-2 bg-white">
  <div class="container-fluid px-3">
    <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-stretch justify-content-between gap-5 profile-row">
      
      <div class="flex-shrink-0 text-center">
        <img src="{{ asset('assets/img/about/michael.png') }}" 
             alt="Michael Harris" 
             class="rounded" 
             style="width: 100%; max-width: 600px; height: auto; object-fit: cover; border:10px solid #ccc; border-radius:30px;">
      </div>

      <div class="flex-grow-1">
        <h2 class="h2 fw-bold mb-3">Michael Harris</h2>
        <h3 class="h5 fw-semibold mb-3 text-success">Co-Founder and Co-Creator of My Place In This World</h3>
        <p class="fw-semibold text-secondary mb-3">Visionary, Purpose-Driven, Strategic, Grounded in Heritage, Mentor, Cultural Architect</p>
        <img src="{{ asset('assets/img/about/hr.png') }}" alt="" class="img-fluid mb-4" style="max-width: 200px;">

        <p class="mb-3 lh-lg">
          Michael Harris is a co-founder and co-creator of My Place In This World– and the conceiver of its central concept, blueprint, direction and message. With a successful career in business and financial services, and a background in communication, Michael used his strategic expertise to ensure the curriculum would be both culturally impactful and systematically strong.
        </p>

        <p class="mb-3 lh-lg">
          The idea for <em>My Place</em> came about during a conversation with Lorraine Harris, who was lamenting the plight of Black youth in schools; how so many felt detached and alienated from the idea of success. Michael asked her, <em>“What if we can build a resource that would connect the children to their heritage of success and achievement before slavery and colonization?”</em> Lorraine, a brilliant resource writer, immediately began crafting the curriculum, bringing their vision to life.
        </p>

        <p class="mb-3 lh-lg">
          From the beginning, Michael believed that Black history must be presented as a narrative of excellence, innovation and leadership, not confined to stories of oppression. His aim was to inspire a “can do” mindset that rejects glass ceilings and connects youth to a lineage of limitless achievement. He also sought to create allyship between Black and non-Black youth rooted in mutual respect and shared learning.
        </p>

        <p class="lh-lg">
          Under his direction, <em>My Place In This World</em> has grown into a resource recognized by numerous organizations– including the Government of Ontario– for its outstanding contribution to education in the province. Michael's vision continues to guide the program's mission: to strengthen character, grow self-esteem and link expectations to outcomes rooted in the glorious heritage of African and diasporic achievement.
        </p>
      </div>

    </div>
  </div>
</section>

  <!-- CTA Section -->
  <section class="text-center py-5 bg-dark text-white">
    <div class="container">
      <h3 class="h2 fw-bold mb-4">Want to bring My Place into your classroom?</h3>
      <p class="mb-4 fs-5">Contact us to learn about membership, teacher support, and curriculum resources.</p>
      <a href="/contact" class="btn btn-warning btn-lg fw-semibold px-5 rounded-pill">Contact Us</a>
    </div>
  </section>

</div>
@endsection
