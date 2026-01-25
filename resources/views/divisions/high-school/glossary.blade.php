@extends('layouts.admin')

@section('title', 'High School - Materials')

@section('content')

<div class="container py-4">

  {{-- Top buttons (same as HS page) --}}
  <div class="d-flex justify-content-between gap-3 mb-4 flex-wrap">
    <div>
        <a href="{{ route('divisions.highschool.materials') }}" class="btn btn-outline-dark rounded-pill px-4">Materials</a>
        <a href="{{ route('divisions.highschool.biographies') }}" class="btn btn-outline-dark rounded-pill px-4">Biographies</a>
        <a href="{{ route('divisions.highschool.glossary') }}" class="btn btn-dark rounded-pill px-4">Glossary of Terms</a>
    </div>
    <div>
        <a href="{{ route('divisions.highschool') }}" class="btn btn-dark btn-sm">
            Back
        </a>
        <a href="{{ route('divisions.index') }}" class="btn btn-dark btn-sm">
            Divisions of Learning
        </a>
    </div>
  </div>

  {{-- Main content grid --}}
  <div class="row g-4">

    {{-- LEFT: Downloads / Resources --}}
    <div class="col-lg-8">

      <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <h5 class="mb-0 fw-semibold">Terms Defined (Key Concepts: Racial Literacy)</h5>
          <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
            High School access included
          </span>
        </div>

        <div class="list-group list-group-flush">

            <div class="accordion" id="divisionAccordian">

                <!-- 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button">
                        Race
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <p>Race [1] is a socially constructed system of classification rooted in descriptions of difference. Historically, it was employed as a means of justifying hierarchies of humanity and the subjugation of groups defined as racially inferior. People with common origins might share certain physical traits, but these have little or nothing to do with personality, intelligence, and moral behavior. There is no legitimate scientific basis for racial classification. The concept of race does not correspond to a biological or genetic reality. Race and races are the product of historical relations and ideas. Race is not an objective or fixed category. Society invents racial categories, manipulates them, and retires them when convenient.</p>

                        <p>[1] Delgado, Richard and Jean Stefancic. <i>Critical Race Theory (Third Edition): An Introduction</i>. New York: New York University Press, 2017. Intro, Ch F. Ontario Human Rights Code:
                        <a href="http://www.ohrc.on.ca/en/policy-and-guidelines-racism-and-racial-discrimination/part-1-%E2%80%93-setting-context-understanding-race-racism-and-racial-discrimination" target="_blank" rel="noopener">
                            http://www.ohrc.on.ca/en/policy-and-guidelines-racism-and-racial-discrimination/part-1-%E2%80%93-setting-context-understanding-race-racism-and-racial-discrimination
                        </a>
                        Ontario Antiracism Directorate:
                        <a href="https://www.ontario.ca/document/data-standards-identification-and-monitoring-systemic-racism/glossary" target="_blank" rel="noopener">
                            https://www.ontario.ca/document/data-standards-identification-and-monitoring-systemic-racism/glossary
                        </a>
                        </p>
                    </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Racialization
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>The process by which, in a given context, groups are ascribed or re-ascribed racial meaning. Depending on a particular context, the dominant society stereotypes groups, depicts in media, or treats minority groups differently. This process is called racialization.</p>

                        <p>In Canadian society, dominant stereotypes about Black communities result in depictions of them as inherently threatening or violent. This often results in the frequent unprovoked targeted harassment of Black men by police and security personnel in their daily lives. [1]</p>

                        <p>In the context of the Canadian education system, stereotypes about the capability of Black students has resulted in the disproportionate streaming of Black students to the “applied” stream in Ontario’s education system. [2]</p>

                        <p>In both of these examples, stereotypes and assumptions about the inherent difference of Black people resulted in different forms of discrimination. Although it might seem like the second example is less severe, in both cases, a diverse group of people were categorized together and had their belonging questioned and undermined.</p>

                        <p>—</p>

                        <p>[1]
                        <a href="https://www.cbc.ca/firsthand/episodes/the-skin-were-in" target="_blank" rel="noopener">
                            https://www.cbc.ca/firsthand/episodes/the-skin-were-in
                        </a>
                        </p>

                        <p>[2]
                        <a href="https://www.cbc.ca/news/canada/toronto/ontario-streaming-high-school-racism-lecce-1.5638700" target="_blank" rel="noopener">
                            https://www.cbc.ca/news/canada/toronto/ontario-streaming-high-school-racism-lecce-1.5638700
                        </a>
                        </p>
                    </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Systemic Racism
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Systemic racism moves beyond one-on-one interactions and conceptualizes the big picture of how society operates. It refers to how ideas of white supremacy operate in society, both consciously and unconsciously. White supremacy is the belief in the superiority of people racialized as white over those not racialized as white.</p>

                        <p>Systemic racism can take shape through laws, policies, institutional structures, and social systems. It also takes shape through access to healthcare, education, employment, housing, citizenship, and social services.</p>
                    </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Intersectionality
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Intersectionality refers to the examination of race, sex, gender, class, ability, and sexual orientation and how their combination plays out in various contexts. Understanding how racism works alongside other forms of oppression helps complicate our understanding of how privilege, bias, and exclusion operate in different contexts.</p>

                        <p>Columbia Law School Professor, Dr. Kimberlé Crenshaw introduced the term “intersectionality” in 1989.</p>
                    </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Anti-Black Racism
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Anti-Black racism refers to different forms of violence and exclusion experienced by Black people. It includes the profiling, surveillance, and criminalization of Black people. Systemic anti-Black racism includes marginalization resulting from uneven access to services and resources. This could include uneven access to resources and services in our public health system and education system, as well as differential treatment in the criminal justice system.</p>

                        <p>Marginalization resulting from uneven access to services, opportunities and resources is a legacy of historical inequalities, such as formal and informal exclusion via racially segregated education systems, the justice system, public spaces, neighbourhoods, and businesses.</p>

                        <p>In Canada, anti-Black racism takes shape through the denial of Canada’s own histories of slavery and exclusion. Slavery existed in Canada for over 200 years. Additionally, Canada’s economy benefited from slavery in the Caribbean and the United States. Racial segregation took place in Ontario’s schools until 1965 – and until 1983 in Nova Scotia. [1] Canada’s immigration system was also shaped by the exclusion of Black immigrants, especially from the Caribbean, and their relegation to very specific forms of labour. Canada’s foreign policy also had a long history of upholding racial segregation in other countries (i.e., Canada’s support of the apartheid regime in South Africa, the blueprint of which was rooted in the reserve system in Canada).</p>

                        <p>[1] Racial Segregation in Canada:
                        <a href="https://www.thecanadianencyclopedia.ca/en/article/racial-segregation-of-black-people-in-canada" target="_blank" rel="noopener">
                            https://www.thecanadianencyclopedia.ca/en/article/racial-segregation-of-black-people-in-canada
                        </a>
                        </p>
                    </div>
                    </div>
                </div>

                <!-- 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Colonialism
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Colonialism is the policy or practice of acquiring full or partial political control over another society. This could take shape through occupying it with settlers, exploiting it economically, and employing violence to gain control over land and its resources.</p>
                    </div>
                    </div>
                </div>

                <!-- 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Eurocentrism
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Eurocentrism is the practice of focusing on <b>European culture or history</b> to the exclusion of other perspectives on the world. It involves the belief in the superiority of European viewpoints, cultures, histories, and narratives over those of non-Europeans.</p>
                    </div>
                    </div>
                </div>

                <!-- 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Decolonization
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>An approach and perspective that aims to address and dismantle colonialism, anti-Black racism, and other forms of systemic oppression.</p>
                    </div>
                    </div>
                </div>

                <!-- 9 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Precolonial
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>A term that broadly refers to the period prior to the spread of European colonialism and hegemony across the world.</p>
                    </div>
                    </div>
                </div>

                <!-- 10 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Black
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>“Black” [1] is an identity that acknowledges many of the shared lived experiences of diverse people of African descent globally. Some of the common elements of claiming Blackness include shared histories of resistance against white supremacy, colonialism, and the legacy of the middle passage. Although diverse communities of African descent globally have vastly different lived experiences, identifying as “Black” is one of the ways in which these diverse communities understand shared lived experiences and connected histories. If referred to in this way, Black is an ethnic identity. Within Canada, the term “African Canadian” became increasingly popular in the 1990s to identify diverse peoples of African descent living in Canada regardless of place of birth.</p>

                        <p>Within white supremacist societies, people who are perceived as being of African descent have been racialized as Black through differential treatment and uneven access to services and institutions, through discriminatory policies, and by individual actions.</p>

                        <p>—</p>

                        <p>[1]
                        <a href="https://www.cbsnews.com/news/not-all-black-people-are-african-american-what-is-the-difference/" target="_blank" rel="noopener">
                            https://www.cbsnews.com/news/not-all-black-people-are-african-american-what-is-the-difference/
                        </a>
                        </p>

                        <p>James W. Walker. “Black Canadians.” <i>The Canadian Encyclopedia</i>.
                        <a href="https://www.thecanadianencyclopedia.ca/en/article/black-canadians" target="_blank" rel="noopener">
                            https://www.thecanadianencyclopedia.ca/en/article/black-canadians
                        </a>
                        </p>
                    </div>
                    </div>
                </div>

                <!-- 11 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Ethnicity
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>A social group that has a common national or cultural tradition, customs, memories of migration and colonization, language, religion, etc.</p>
                    </div>
                    </div>
                </div>

                <!-- 12 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Biracial/Multiracial
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Although the term <b>“multiracial”</b> is commonly used to refer to people of different ethnic ancestries, we need to understand the ways in which this commonly held definition falls short. Individuals can self-identify as multiracial or multiethnic. However, it is by no means a given.</p>

                        <p>For example, someone whose mother is white and whose father identifies as Black might seem to be easily characterized as multiracial, but if that person had little to no interaction with their white relatives, they might more easily identify as Black. Many people have relatives of different ancestries further back in their family tree, which they might not be aware of.</p>

                        <p>Multiracial is not a straightforward concept, as race is a power relationship that is fluid depending on the historical context at hand.</p>

                        <p>In addition, people of different geographical ancestries have interacted with one another, exchanged cultures, and had families together throughout humanity’s history, making the idea of ethnic or racial purity itself flawed.</p>
                    </div>
                    </div>
                </div>

                <!-- 13 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Transracial
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Transracial [1] refers to people of one racial identity who are adopted and raised by a family of another racial identity.</p>

                        <p>“Transracial” does not refer to, for example, a white woman claiming that she is a Black woman. This definition denies and erases cultural differences and the identities of those who cannot change how the dominant society they live in chooses to racialize them.</p>

                        <p>—</p>

                        <p>[1] Syreeta McFadden. Rachel Dolezal’s definition of ‘transracial’ isn’t just wrong, it’s destructive.” The Guardian, June 16, 2015.</p>
                        <p>
                        <a href="https://www.theguardian.com/commentisfree/2015/jun/16/transracial-definition-destructive-rachel-dolezal-spokane-naacp" target="_blank" rel="noopener">
                            https://www.theguardian.com/commentisfree/2015/jun/16/transracial-definition-destructive-rachel-dolezal-spokane-naacp
                        </a>
                        </p>
                    </div>
                    </div>
                </div>

                <!-- 14 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Additional Resources
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <p>Toby Green. “Africa, in its fullness. The West focuses on slavery, but the history of Africa is so much more than a footnote to European imperialism.” Aeon. January 16, 2020.
                        <a href="https://aeon.co/essays/liberating-the-precolonial-history-of-africa" target="_blank" rel="noopener">https://aeon.co/essays/liberating-the-precolonial-history-of-africa</a>
                        </p>

                        <p>“Race and Racial Identity.” National Museum of African American History and Culture.
                        <a href="https://nmaahc.si.edu/learn/talking-about-race/topics/race-and-racial-identity" target="_blank" rel="noopener">https://nmaahc.si.edu/learn/talking-about-race/topics/race-and-racial-identity</a>
                        </p>

                        <p>Eileen Patten. “Who is Multiracial? Depends on How You Ask.” Pew Research Centre.
                        <a href="https://www.pewsocialtrends.org/2015/11/06/who-is-multiracial-depends-on-how-you-ask/" target="_blank" rel="noopener">https://www.pewsocialtrends.org/2015/11/06/who-is-multiracial-depends-on-how-you-ask/</a>
                        </p>

                        <p>“9 Tips Teachers can use when talking about racism.” <i>The Conversation</i>.
                        <a href="https://theconversation.com/9-tips-teachers-can-use-when-talking-about-racism-140837" target="_blank" rel="noopener">https://theconversation.com/9-tips-teachers-can-use-when-talking-about-racism-140837</a>
                        </p>

                        <p>“Explainer: What is Systemic Racism and Institutional Racism.” <i>The Conversation</i>.
                        <a href="https://theconversation.com/explainer-what-is-systemic-racism-and-institutional-racism-131152" target="_blank" rel="noopener">https://theconversation.com/explainer-what-is-systemic-racism-and-institutional-racism-131152</a>
                        </p>

                        <p>Ontario Human Rights Commission. Racism and Racial Discrimination Fact Sheet.
                        <a href="http://www.ohrc.on.ca/en/racism-and-racial-discrimination-systemic-discrimination-fact-sheet" target="_blank" rel="noopener">http://www.ohrc.on.ca/en/racism-and-racial-discrimination-systemic-discrimination-fact-sheet</a>
                        </p>

                        <p>Video: Kimberlé Crenshaw. “<a href="https://www.ted.com/talks/kimberle_crenshaw_the_urgency_of_intersectionality" target="_blank" rel="noopener">The urgency of intersectionality.</a>” TEDWomen. 2016. Accessed: November 27, 2020.</p>

                        <p>Ontario Human Rights Commission. Policy and Guidelines on Racism and Racial Discrimination.</p>

                        <p>
                        <a href="http://www.ohrc.on.ca/en/policy-and-guidelines-racism-and-racial-discrimination/part-1-%E2%80%93-setting-context-understanding-race-racism-and-racial-discrimination" target="_blank" rel="noopener">
                            http://www.ohrc.on.ca/en/policy-and-guidelines-racism-and-racial-discrimination/part-1-%E2%80%93-setting-context-understanding-race-racism-and-racial-discrimination
                        </a>
                        </p>

                        <p>Ontario Antiracism Directorate:
                        <a href="https://www.ontario.ca/document/data-standards-identification-and-monitoring-systemic-racism/glossary" target="_blank" rel="noopener">https://www.ontario.ca/document/data-standards-identification-and-monitoring-systemic-racism/glossary</a>
                        </p>

                        <p>Podcast: Kris Manjapra. “When will Britain face up to its crimes against humanity?” The Guardian’s Audio Long Reads.
                        <a href="https://www.theguardian.com/news/audio/2018/jun/15/when-will-britain-face-up-to-its-crimes-against-humanity-podcast" target="_blank" rel="noopener">https://www.theguardian.com/news/audio/2018/jun/15/when-will-britain-face-up-to-its-crimes-against-humanity-podcast</a>
                        </p>

                        <p>Module: Ontario Human Rights Code Online Module. “Call it out: racial, racial discrimination and human rights.” (30 minutes)
                        <a href="http://www.ohrc.on.ca/en/book/export/html/24281" target="_blank" rel="noopener">http://www.ohrc.on.ca/en/book/export/html/24281</a>
                        </p>

                        <p>Lydia X. Z. Brown. “Being ‘Transracial’ is Real – but It’s Not What Racist White People Claim It Is.”
                        <a href="https://rewirenewsgroup.com/article/2018/01/05/transracial-real-not-racist-white-people-claim/" target="_blank" rel="noopener">
                            https://rewirenewsgroup.com/article/2018/01/05/transracial-real-not-racist-white-people-claim/
                        </a>
                        </p>

                    </div>
                    </div>
                </div>

            </div>

        </div>
        
      </div>

    </div>

    {{-- RIGHT: Help / Quick links --}}
    <div class="col-lg-4">

      <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-semibold mb-2">Purpose</h5>

        <div class="d-grid gap-2">
            <div class="list-group list-group-flush">

          {{-- Item --}}
          <div class="list-group-item px-0 py-3 d-flex align-items-start gap-3">
            <div class="rounded-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/img/icons/canvas.png') }}" alt="Icon" style="width:45px;height:45px;">
            </div>
            <div class="flex-grow-1">
              <div class="">
                Provides tips for leading discussions about race in the classroom.
              </div>
            </div>
          </div>

          {{-- Item --}}
          <div class="list-group-item px-0 py-3 d-flex align-items-start gap-3">
            <div class="rounded-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/img/icons/light.png') }}" alt="Icon" style="width:45px;height:45px;">
            </div>
            <div class="flex-grow-1">
              <div class="">
                A support for classroom teachers using My Place in This World.
              </div>
            </div>
          </div>

          {{-- Item --}}
          <div class="list-group-item px-0 py-3 d-flex align-items-start gap-3">
            <div class="rounded-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/img/icons/chat.png') }}" alt="Icon" style="width:45px;height:45px;">
            </div>
            <div class="flex-grow-1">
              <div class="">
                This briefing defines some key terms and/or concepts that may arise when working with students.
              </div>
            </div>
          </div>

        </div>
        </div>

        <hr class="my-4">

        <div class="small text-muted">
            <h4>Tips for Leading Discussions about Race in the Classroom:</h4>
            Use terms accurately and purposefully. In a discussion about Black history/heritage or African history/heritage, it is important to be deliberate about keeping the discussion focussed on stories that have largely been ignored or omitted from Ontario's history curricula. Discuss why there is a need to focus on Black history/heritage specifically. Learning about African history/heritage does not take away from learning about other histories. Understand that we are all enriched when we learn about multiple perspectives, histories, and lived experiences. Avoid framing racism and discrimination as perspectives and actions undertaken by “bad people.” Instead, emphasize that it is a norm and a system that everyone has a responsibility to self-reflect on and change their actions accordingly. Be prepared to address assumptions and stereotypes that students might already carry about the African continent. We live in a Eurocentric society that, for a long time, assumed the inferiority of the African continent and Black people. It is likely that students have already formed ideas about African history/heritage and African people. Support students as they encounter information that might challenge their preconceived ideas about the African continent and its peoples.
        </div>
      </div>

    </div>
  </div>

</div>

<script>
  document.querySelectorAll('#divisionAccordian .accordion-item')
    .forEach((item, index) => {

      const header = item.querySelector('.accordion-header');
      const button = item.querySelector('.accordion-button');
      const collapse = item.querySelector('.accordion-collapse');

      const headingId = `heading-${index}`;
      const collapseId = `collapse-${index}`;

      header.id = headingId;

      button.setAttribute('data-bs-toggle', 'collapse');
      button.setAttribute('data-bs-target', `#${collapseId}`);
      button.setAttribute('aria-controls', collapseId);
      button.setAttribute('aria-expanded', 'false');

      collapse.id = collapseId;
      collapse.setAttribute('aria-labelledby', headingId);

      // 🔥 IMPORTANT: make sure none are open
      collapse.classList.remove('show');
      button.classList.add('collapsed');
    });
</script>

@endsection
