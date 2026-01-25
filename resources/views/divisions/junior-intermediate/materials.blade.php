@extends('layouts.admin')

@section('title', 'High School - Materials')

@section('content')

<div class="container py-4">

  {{-- Top buttons (same as HS page) --}}
  <div class="d-flex justify-content-between gap-3 mb-4 flex-wrap">
    <div>
        <a href="{{ route('divisions.ji.materials') }}" class="btn btn-dark rounded-pill px-4">Materials</a>
        <a href="{{ route('divisions.ji.biographies') }}" class="btn btn-outline-dark rounded-pill px-4">Biographies</a>
        <a href="{{ route('divisions.ji.glossary') }}" class="btn btn-outline-dark rounded-pill px-4">Glossary of Terms</a>
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

  {{-- Page Title --}}
  <div class="text-center mb-4">
    <h2 class="fw-semibold mb-1">High School Materials</h2>
    <p class="text-muted mb-0" style="max-width: 760px; margin: 0 auto;">
      Assessments and Feedback Forms for Administrators and Superintendent Use Only.
    </p>
  </div>

  {{-- Main content grid --}}
  <div class="row g-4">

    {{-- LEFT: Downloads / Resources --}}
    <div class="col-lg-8">

      <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <h5 class="mb-0 fw-semibold">Available Materials</h5>
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
                        Journey to a Majestic Past
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <p>King Shamba or Shyaam is referred to as a “major innovator”. What did he introduce to the Kuba Kingdom?</p>
                        <p>[woven raffia fibre embroidered textiles]</p>

                        <p>In the interests of peace, King Shamba replaced deadly metal throwing knives with what?</p>
                        <p>[ceremonial wooden knives, swords of peace]</p>

                        <p>Why is King Shamba described as a “strange person”?</p>
                        <p>[claimed to be the reincarnation of a spirit power]</p>
                    </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Prof. Nathan Nunn - The Evolution of Culture and Institutions: Evidence from the Kuba Kingdom
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>King Shyaam, a trader from outside, is said to have united independent villages into a centralized kingdom through peaceful means. What is suggested as the reason for his success?</p>
                        <p>[introduced New World technologies such as the cultivation of maize, cassava, and tobacco]</p>

                        <p>What are the peculiarities of the Kuba Kingdom in contrast to the adjacent independent neighbouring communities?</p>
                        <p>[more complex and formal political structures: king and councils, unwritten constitution, bureaucracy, taxation, court system, police, road system]</p>

                        <p>That European colonizers who first interacted with the Kuba Kingdom in the early 19th century thought the Kingdom to be so amazing that Europeans must have created this Kingdom prior to their arrival, tells us what about European attitudes toward Africans?</p>
                        <p>[blinded by their racist assumptions of non-European people who were presumed to be incapable of creating a complex civilization]</p>
                    </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Queen Idia Of Benin Empire
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>In the 16th century King Esigie started a tradition in Benin by investing his inestimable mother with the title of <b>Iyoba</b> (or <i>Queen Mother</i>). What previous barbaric tradition with regard to the King’s mother did Oba Esigie abolish?</p>
                        <p>[the killing of the King’s mother was abolished]</p>

                        <p>Idia is said to have dressed like a man when she led warriors into battle and through her supernatural powers maintained unity. With security established, what prospered in the Kingdom of Benin during Queen Idia’s reign?</p>
                        <p>[trade, commerce, and arts were the pride of the day under Queen Idia]</p>

                        <p>In addition to Idia’s dauntless military power, in what other sphere was she a figure of power?</p>
                        <p>[spiritual]</p>

                        <p>What weapon was Idia said to be the only one to wield?</p>
                        <p>[the double-edged sword]</p>

                        <p>What effect did Idia’s dumb-bell belt have on her enemies?</p>
                        <p>[hypnotized her enemies]</p>
                    </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Queen Idia, Iyoba of Ancient Benin & Africa by Akuba 2020
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Five hundred years ago, the shrewd and beautiful Idia became the wife of whom?</p>
                        <p>[the Oba of the Kingdom of Benin]</p>

                        <p>Why did the wise elder priest of the oracle scar the visage of Idia, the bride-to-be of Oba?</p>
                        <p>[the elder inserted a powerful medicine into the facial scars of Idia. This potion would touch Idia’s soul and bless her with a power which makes all men fear her with the exception of Oba and which will ensure the survival of her lineage at the palace of Benin forever]</p>

                        <p>Idia’s military leadership was called upon when she took whom into battle so that they would fight valiantly?</p>
                        <p>[the Benin warriors]</p>

                        <p>In a major rupture with the Benin tradition of killing the mother of the newly crowned King, Idia’s son Esigie, king-to-be, begged the people of Benin to spare his mother and to agree to allow her to live provided Esigie in turn agreed to what conditions?</p>
                        <p>[she was exiled from Oba’s palace to live at the Eguae-Iyoba (Palace of the Queen Mother) in Uselu some distance away, where he promised he would never go to see his Queen mother again]</p>
                    </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        An African Kingdom defeated the Roman Empire? Ancient Meroe
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>That Strabo the Greek historian refers to Kandake Amanirenas as being a masculine sort of woman might be a reference to what aspects about her?</p>
                        <p>[her height, her commanding presence as a war leader]</p>

                        <p>When Kandake Amanirenas retreated out of the Nubian city of Napata, what did the invading Romans do with the captured inhabitants?</p>
                        <p>[enslaved them and took them to Egypt along with plunder]</p>

                        <p>What halted the Romans from moving on the city of Meroe?</p>
                        <p>[the desert and the heat]</p>

                        <p>What move did uncowed Kandake Amanirenas take two years later in response to the punitive Roman raid on Nubia?</p>
                        <p>[she amassed a large army, headed north to the Roman border fortress and sent envoys to negotiate a peace treaty and to learn more about Rome]</p>

                        <p>How did Emperor Augustus of Rome respond to the envoys of Kandake?</p>
                        <p>[he granted all of the demands of Amanirenas, including Roman withdrawal from the Nubian territories, putting a halt to the collection of tribute that had been imposed upon Meroe]</p>

                        <p>Whose bronze head was found in the temple of victory in Meroe by archaeologists?</p>
                        <p>[Emperor Augustus]</p>
                    </div>
                    </div>
                </div>

                <!-- 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Barbarians Rising
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>[22:28 to 30:40] <a href="https://dai.ly/x7afr2f">*note avoids extreme violence</a></p>

                        <p>Astoundingly Hannibal Barca, like his name “thunder bolt”, strikes unexpectedly at the homeland of the Roman empire having traversed the Alps which the Romans assumed would act as an impregnable wall.</p>
                        <p>He is able to pull together and lead a multi-ethnic group of warriors recruited from North Africa and South West Europe – all opposed to Rome’s colonial project of domination.</p>

                        <p>That Hannibal is able to continue on in the worst of conditions and persevere makes him a great leader. What else within must he conquer to be still greater?</p>
                        <p>[his feelings, thoughts and emotions – eg. fear, self doubt.]</p>

                        <p>Thrown off balance after a series of routs, Hannibal believes Rome will be brought to submission by seizing what at the town of Cannae?</p>
                        <p>[critical grain supply once seized will supply Hannibal’s troops and starve Rome into submission or force Rome to attack]</p>

                        <p>Hannibal’s so called barbarian army in their refusal to be enslaved by Rome are described by a civil rights leader to be what kind of fighters?</p>
                        <p>[the earliest freedom fighters]</p>

                        <p>Describe the brilliance of Hannibal’s tactical trap at the battle of Cannae.</p>
                        <p>[three key moves: 1st: concentrates his infantry in the centre to attract a Roman advance and to pull them inside his infantry line.
                        2nd: two groups of elite troops encircle the flanks to box Roman troops in.
                        3rd: surprise cavalry attack from the rear completes the encirclement.]</p>
                    </div>
                    </div>
                </div>

                <!-- 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Faces of Africa: Keepers Of the Ark
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>A flourishing African civilization in 300 B.C., found in what is known as Ethiopia today, was led by the legendary Queen of Sheba who was also known by another name. What is that name?</p>
                        <p>[Makeda]</p>

                        <p>Travelling from the Aksum Kingdom at the southern end of the Red Sea, Makeda is said to have embarked on a dangerous journey to the north end of this sea to what Biblical land? To meet whom?</p>
                        <p>[Judah / Israel to meet King Solomon]</p>

                        <p>According to legend Menelik the First, son of Makeda, traveled back with his mother to Judah and seized a prized holy relic of Judaism and Christianity. What is that artifact?</p>
                        <p>[Ark of the covenant]</p>

                        <p>Kings Abraha and Atsbeha had replicas of the Ark housed where?</p>
                        <p>[Housed in numerous rock-carved churches hidden throughout the hills of Tigray.]</p>
                    </div>
                    </div>
                </div>

                <!-- 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Great Myths and Legends: The Queen of Sheba in History and Legend
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Said to be one of the most positive images of a Black woman in the ancient world, the Queen of Sheba is described as possessing what qualities?</p>
                        <p>[discernment, noble, intelligent, curious and wise]</p>

                        <p>Where is the land of Sheba or Sabaea?</p>
                        <p>[the land or region straddled the Red Sea in both northern Ethiopia and Yemen in the Arabian peninsula / the same cultural domain of trade and connection]</p>

                        <p>The Kebra Nagast, an epic tale from the 14th century, embellishes the legend of Mekeda from a thousand years earlier. It outlines the origins of the Ethiopian monarchy. In this text, whose importance is elevated above that of King Solomon in upwards of 40 chapters with her as the central character?</p>
                        <p>[Makeda]</p>

                        <p>In her search for wisdom above all else, Makeda is described as what kind of Queen?</p>
                        <p>[a philosopher Queen / philosophy means ‘love of wisdom’]</p>

                        <p>This epic tale, in foregrounding and centring on Makeda, exalts a Black female protagonist. What three great world religions is she found in?</p>
                        <p>[Judaism, Christianity, Islam]</p>
                    </div>
                    </div>
                </div>

                <!-- 9 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Hannibal Barca Explained In Under 10 Minutes
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>As a child besides learning battle tactics, Hannibal was also given what other kind of education?</p>
                        <p>[intellectual education]</p>

                        <p>At only the age of 26 Hannibal was made head of the military. What intellectual reputational qualities did he exhibit?</p>
                        <p>[smart, concise and focussed]</p>

                        <p>Hannibal Barca struck at Rome quickly by what unexpected amazing feat?</p>
                        <p>[crossing over the Alps]</p>

                        <p>What unexpected animals were used to attack and unnerve Roman legions?</p>
                        <p>[elephants]</p>

                        <p>Taking advantage of the discontent among Roman subjects, Hannibal bolstered his warriors with local supporters and fighters. With this he went from one battle victory to another. How are his battle plans described?</p>
                        <p>[carefully planned and honed from years of experience]</p>

                        <p>Rather than laying siege on fortified Rome, an almost impossible course of action, what course of action did Hannibal take?</p>
                        <p>[he engaged in psychological warfare – by going after the minds of the people of Rome he turned them against their overlords and incited them to revolt]</p>

                        <p>By studying the tactics of Roman war leaders and by using their advantages against them, Hannibal achieved what at Cannae?</p>
                        <p>[massive defeat for Rome which suffered an 80% loss of its military in a single day’s battle]</p>

                        <p>What tactical biological weapon did Hannibal use against enemy naval ships?</p>
                        <p>[venomous snakes in clay jars which were thrown on enemy ships causing panic]</p>
                    </div>
                    </div>
                </div>

                <!-- 10 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Kuba Kingdom
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Kuba cloth made with raffia palm fibre with intricate prints, embroidery, and cowrie-shell, bead work is said to have been introduced by King Shamba who travelled over two years to distant lands and returned with this highly valued ceremonial attire. Previously clothing was made from less durable tree bark.</p>

                        <p>Watch this video of one of King Shamba’s contemporary successors, Prince Guy Kwete whose arrival is earnestly anticipated with much preparation and pomp…</p>

                        <p>The arrival of the royal family is an occasion where dazzling ceremonial attire, dance, and masks of mythical ancestors and spirits are celebrated in all their finery.</p>

                        <p>How would you describe his regalia? (ceremonial cloth, scepter, insignia, decorations, head gear…)</p>
                        <p>[freeze frame so a close examination is possible]</p>

                        <p>Royal masked spirits, who only come out of the sacred forest on rare occasions in the presence of royalty, are resplendent with intricate detail. Again with reference to colour, texture, material, symbol, etc. describe their appearance.</p>
                        <p>[feathers and skins of apex predators, cowrie adorned (coinage of the economy), high contrast hard edge angular line, amulets, fetishes]</p>

                        <p>How are they similar to contemporary ceremonial masquerades of carnival?</p>
                        <p>[ornate, labour-intensive, intricate bead/sequin and feather work, colourful, dazzling, burdensome, require attendants to assist in dressing]</p>
                    </div>
                    </div>
                </div>

                <!-- 11 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Littleton Alston on Hannibal Barca
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>As a sculptor, Alston grapples with the question who is Hannibal Barca?</p>
                        <p>He contends with this question through a series of symbolic war helmets.</p>

                        <p>As an agent of change what does Hannibal push back against according to Alston?</p>
                        <p>[Rome]</p>

                        <p>From what groups did Hannibal forge his military?</p>
                        <p>[a mix of societies, peoples, tribes, from North Africa, Spain, specifically Celts (early Irish) opposed to the heavy hand of Roman occupation (colonization)]</p>

                        <p>Hannibal is said to have fought Rome for the Romans. What might that mean?</p>
                        <p>[collaborated with Romans who rebelled against their Roman overlords who dominated from the city of Rome, subjugated through taxation and extraction of labour(sons) for foreign wars of conquest]</p>
                    </div>
                    </div>
                </div>

                <!-- 12 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Queen of Sheba Behind the Myth 'DOCUMENTARY' 360 X 360
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>1. Using ground-penetrating radar, Brian Moorman, associate professor of Earth Sciences at Calgary University, found a void or cavity buried underground at the Queen of Sheba’s temple. What is it?</p>
                        <p><em>A well providing scarce water needed for ritual ablutions for worship.</em></p>

                        <p>2. The people of the city of Ma’rib worshipped a fertility god crucially associated with what vital substance essential to the productivity of the fields around the temple?</p>
                        <p><em>Water.</em></p>

                        <p>3. Just 10 kilometers from the temple is a “miracle of engineering.” What is it?</p>
                        <p><em>A massive dam to store water from flash floods for 50,000 people, along with a sophisticated irrigation system.</em></p>

                        <p>4. What would have been one of the Queen of Sheba’s most fundamental obligations to her people of Sabah (Sheba)?</p>
                        <p><em>Dam maintenance to water 24,000 acres.</em></p>

                        <p>5. With an abundance of grain, the city of Ma’rib could support a major urban trading center. What luxury goods were traded by these people, said by the Romans to be the richest in the world?</p>
                        <p><em>Gold, amber, and frankincense.</em></p>

                        <p>6. After dam maintenance, what would have been the Queen of Sheba’s other important obligation upon which her city of Ma’rib depended?</p>
                        <p><em>Maintaining and protecting trade routes, particularly for Sabaean frankincense — the most lucrative export, valued above gold by the Romans, used in funeral cremations, and believed to bring people closer to their god.</em></p>

                        <p>7. How would the processional way extending eight kilometers from Ma’rib to the temple serve to exalt the Queen’s reputation?</p>
                        <p><em>By enhancing the pilgrim’s sense of reverence for those who constructed such massive architectural wonders.</em></p>

                        <p>8. As high priestess of the shrine and trade envoy, the Queen of Sheba would be formidable. What storm god would have been even more formidable as a massive statue in the shrine?</p>
                        <p><em>The bull, storm god of fertility and rains.</em></p>

                        <p>9. On arriving at King Solomon’s temple, what form did her conversation with him take according to an Arabian folktale?</p>
                        <p><em>Hard questions in the form of riddles.</em></p>

                        <p>10. What “light of wisdom” is the Queen of Sheba (Bilqis to the Arabs) said to have carried back with her to the land of Sheba?</p>
                        <p><em>The first introduction of monotheism to Arabia, of which Sheba was a part.</em></p>
                    </div>
                    </div>
                </div>

                <!-- 13 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        The Greatest African Queen The World Forgot: Queen Amanirenas
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Amanirenas (also spelled Amanirena) was a queen of the Kingdom of Kush from c. 40 BC to c. 10 BC. Her full title was Amnirense qore li kdwe li (“Amanirenas, qore and kandake”)[1]</p>

                        <p>The producer of this video contends the greatness of Kandake Amanirenas stems from what fact in relation to her forebearers?</p>
                        <p>[the fact she could draw on the energy of the Nubian Queens that came before her]</p>

                        <p>Queen Amanirenas had a central role leading Kushite armies against the Romans in a war that lasted five years, from 27 BC to 22 BC. After an initial victory against the greatest military power at the time, the multiethnic Kushite forces under her leadership returned to Kush with what war trophy?</p>
                        <p>[the head of a bronze statue of Emperor Augustus which she buried in a temple dedicated to victory in the city of Meroe]</p>

                        <p>Why is it we do not know the history of the Kandake’s struggles with Rome from the Nubian point of view?</p>
                        <p>[not able to translate the Meroitic text / a script of Nubians]</p>

                        <p>How do the Romans describe Queen Amanirenas?</p>
                        <p>[brave and blind in one eye]</p>

                        <p>That Queen Amanirenas secured the independence of her empire in the face of mighty Rome is extolled as her greatest achievement. Moreover, in the treaty with Rome what benefits did the Kandake win?</p>
                        <p>[the peace treaty was strikingly favorable to the Meroites in that the Romans evacuated captured Nubian borderlands, and the Meroites were exempted from having to pay tribute/tax to the Roman Emperor.]</p>

                        <p>What audacious gift from the Kandake or Candice (Roman name for a Nubian queen) did her envoy present to Emperor Augustust?</p>
                        <p>[a bundle of gold arrows / paradoxical symbol of peace and war]</p>
                    </div>
                    </div>
                </div>

                <!-- 14 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        The Mysterious Life and Death of Egypt's Queen Nefertiti
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>How many theories of Nefertiti’s family origins are presented?</p>
                        <p>[three: daughter of Ay who would become a Pharaoh / Akhenaton’s sister or cousin / a Mitanni princess from foreign land in west Asia]</p>

                        <p>At what age was she thought to have married the Pharaoh-to-be?</p>
                        <p>[15]</p>

                        <p>Involved in all aspects of the royal court, the literate Nefertiti held many titles such as:</p>
                        <p>[Hereditary Princess, Great of Praises, Lady of Grace, Sweet of Love, Lady of the Two Lands, Mistress of Upper and Lower Egypt]</p>

                        <p>Central to religious practices, what was her role in the temple?</p>
                        <p>[high priestess]</p>

                        <p>She may have been equal to her husband because she is depicted wearing what head piece?</p>
                        <p>[a Pharaoh’s crown]</p>

                        <p>In collaboration with her husband, Akenaten, what revolutionary state religion did they impose on polytheistic Egypt?</p>
                        <p>[they elevated the Sun god, Aten, to the one supreme status and all old gods were displaced / worship of Aten became the cult to which all other priestly cults were forced to convert]</p>

                        <p>How did they consolidate their power?</p>
                        <p>[they established themselves as the only two priests of Aten]</p>

                        <p>After a 16 year reign how is Queen Nefertiti’s sudden disappearance from the Egyptian historical record explained according to one theory?</p>
                        <p>[she is thought to have become most unpopular with a society opposed to her exclusionary cult of Aten and its accompanying turmoil and financial extravagance]</p>
                    </div>
                    </div>
                </div>

                <!-- 15 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Women of the Quran - Bilqis, Queen of Sheba
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p>Of the political rulers mentioned in the Koran, who is one of the few of them to be portrayed in a positive light?</p>
                        <p>[Bilqis, Queen of Sheba]</p>

                        <p>The prophet Sulayman, King Solomon of the Jews, was said to be so impressed by the wealth of the land of Sheba after he heard a report from what bird, which had scouted out her land?</p>
                        <p>[hoopoe bird which reported: “she has been given all things that could be possessed by any ruler of the earth, and she has a great throne”]</p>

                        <p>That Bilqis consulted with her council of advisors indicates what about her leadership?</p>
                        <p>[very wise, just, sagacious ruler]</p>

                        <p>Not only is Bilqis a wise political ruler, she has as well a keen sense of what?</p>
                        <p>[keen sense of spirituality, morals and ethics]</p>

                        <p>Ever the diplomat, Bilqis avoids conflict, war and debasement by humbly accepting the Lord of lords and rejecting her former deity the sun. By so doing she becomes what for subsequent generations of women of faith?</p>
                        <p>[she becomes an exemplar for subsequent women of faith]</p>
                    </div>
                    </div>
                </div>

                <!-- 16 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        The Conqueror Queen Of West Africa: A Brief History
                    </button>
                    </h2>
                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <p><strong>The Conqueror Queen Of West Africa: A Brief History</strong></p>

                        <p>a. The stardom of Queen Amina of Zaria is extolled by this video narrator who contends she was a great military strategist. What service did she provide her brother when he was king that would have helped her hone her formidable fighting skills?</p>
                        <p>[leading warrior of her brother’s cavalry]</p>

                        <p>b. Besides controlling extensive trade routes extending throughout Hausaland, what type of massive fortifications did Queen Amina establish at all seven major Hausa city-states reflecting her astounding administrative skills?</p>
                        <p>[perimeter walls ‘Ganuwar Amina’]</p>

                        <p>c. What form did the tribute take, offered as payment by her supplicating subjects for her protection and celebrated administration by other city-states such as Nupe?</p>
                        <p>[10,000 cola nuts, 40 male servants]</p>

                        <p>d. What innovations in protective attire presumably gave her an advantage in battle for decades?</p>
                        <p>[metal armor, chain mail, iron helmets, horse armor]</p>
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
        <h5 class="fw-semibold mb-2">Quick Links</h5>

        <div class="d-grid gap-2">
          <a href="https://docs.google.com/forms/d/1TsKjyckDt7MTJRNHUduMcYujK-XggWmHeASsUX542Bo/copy" class="btn btn-outline-danger rounded-pill" target="_blank">
            Pre-Assessment Form for Black Students
          </a>
          <a href="https://docs.google.com/forms/d/1qVFC0PscB0bnVaWEkwWsqK5InVHv6MDksCqZeMZJp_E/copy" class="btn btn-outline-danger rounded-pill" target="_blank">
            Pre-Assessment Form For Non-Black Students
          </a>
          <a href="https://docs.google.com/forms/d/1AbnZNaSWsCU88iEPyL-4ZSJyVvqA3YjHKeX4Uq_jgk0/copy" class="btn btn-outline-danger rounded-pill" target="_blank">
            Post-Assessment Form for Black Students
          </a>
          <a href="https://docs.google.com/forms/d/1rl3ozIED1yvGg5aCoe1cIeDn5fdTt2jbcZ4tQW5g-YI/copy" class="btn btn-outline-danger rounded-pill" target="_blank">
            Post-Assessment Form for Non-Blacks
          </a>
          <a href="https://docs.google.com/forms/d/1jTB2O_Qt594p3j4I39AClq1hnFM9bqTHqCV_GCZejUc/copy" class="btn btn-outline-danger rounded-pill" target="_blank">
            Teacher Feedback Form
          </a>
          
        </div>

        <hr class="my-4">

        <div class="small text-muted">
            <h4>High School Blackline Master Copies</h4>
          <div class="fw-semibold text-dark mb-1">Note:</div>
          Teacher Blackline Master Copies are prepared questions with answers for many of the videos found in the activities. Teachers can use this to support the learning of the video content. Alternatively, Teachers may also create their own content questions to support the video content.
          <br> <br>
            Where videos for Kings/Queens are not embedded in activities but are required, Teachers can find these under Biographies.
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
