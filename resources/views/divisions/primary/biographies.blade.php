@extends('layouts.admin')

@section('title', 'High School - Materials')

@section('content')

<div class="container py-4">

  {{-- Top buttons (same as HS page) --}}
  <div class="d-flex justify-content-between gap-3 mb-4 flex-wrap">
    <div>
        <a href="{{ route('divisions.primary.materials') }}" class="btn btn-outline-dark rounded-pill px-4">Materials</a>
        <a href="{{ route('divisions.primary.biographies') }}" class="btn btn-dark rounded-pill px-4">Biographies</a>
        <a href="{{ route('divisions.primary.glossary') }}" class="btn btn-outline-dark rounded-pill px-4">Glossary of Terms</a>
    </div>
    <div>
        <a href="{{ route('divisions.primary') }}" class="btn btn-dark btn-sm">
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
          <h4>QUEENS OF AFRICA</h4>
          <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
            High School access included
          </span>
        </div>

        <div class="list-group list-group-flush">

            
            <div class="accordion mb-5" id="divisionAccordian">

                <!-- 1: Queen Cleopatra -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingCleopatra">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCleopatra" aria-expanded="true" aria-controls="collapseCleopatra">
                        Queen Cleopatra
                    </button>
                    </h2>

                    <div id="collapseCleopatra" class="accordion-collapse collapse show" aria-labelledby="headingCleopatra" data-bs-parent="#divisionAccordian">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1aTLmA9dJI-vk5pV3JnX2PyzRWA1zEHffXsuLxjIXTJ0/copy">
                            Click Here for a Printable Copy: Queen Cleopatra – Biography
                        </a>
                        </h4>

                        <h4><strong>ABOUT Cleopatra</strong></h4>
                        <p>The Egyptian queen that is widely known by “Cleopatra” alone was Cleopatra VII Philopator.</p>
                        <p>Cleopatra ruled over a diverse kingdom that extended from Asia Minor to the interior of Egypt. She was also a naval commander who led her own fleet in battle and a scholar who supported the arts. She was a charming person with a commanding presence. She was skilled in horseback riding and hunting.</p>
                        <p>Throughout her life, Cleopatra had to deal with Rome constantly interfering in her family’s rule in Egypt and had to find ways to creatively and carefully build a relationship with Rome that did not result in Rome taking over Egypt. This was ultimately unsuccessful though, as after her death, Egypt became a province of the Roman Empire.</p>

                        <p><span style="text-decoration: underline;">The Myth Versus the History:</span></p>
                        <p>Myths of Cleopatra tend to focus on her love affairs with powerful men like Julius Caesar and Marcus Antonius. However, historians have noted that these relationships were careful political decisions that helped her give birth to successors to maintain her dynasty – the Ptolemaic Dynasty – in Egypt. Even though she was ultimately unsuccessful in keeping the Ptolemaic dynasty in power, she must be recognized for the skilled ruler that she was.</p>

                        <p><span style="text-decoration: underline;">About the Ptolemaic Dynasty:</span></p>
                        <p>Cleopatra was the last ruler of the Ptolemaic Kingdom of Egypt, a kingdom established by the descendants of Alexander the Great of Macedonia.</p>
                        <p>By the time Cleopatra came to the throne, she had inherited a dynasty that was in turmoil and in trouble. Under her father, Ptolemy XII, the people of Egypt were unhappy with the government and faced economic decline. Her father had asked Rome for help in managing discontent in Egypt. His oldest daughter, Berenike IV, Cleopatra’s older sister, had seized the throne while their father was in Rome. However, her father had her executed when he returned because he wanted the throne back. Cleopatra took the throne after her father died.</p>

                        <p><span style="text-decoration: underline;">About Cleopatra’s Reign:</span></p>
                        <p>When Cleopatra first took the throne, she ruled jointly with her younger brother, Ptolemy XIII, because there was some opposition to a woman ruling alone. A civil war actually broke out between supporters of Cleopatra and her brother, which Cleopatra won. In order to defeat her brother, Cleopatra started a romantic and political relationship with Gaius Julius Caesar (the person known famously today as “the” Julius Caesar). Caesar helped Cleopatra win the war, and her brother, Ptolemy XIII, was killed. She soon gave birth to a son, who she named Caesarion, and claimed that Julius Caesar was the boy’s father.</p>
                        <p>In the years after the civil war, Cleopatra worked towards rebuilding and stabilizing her kingdom. She paid off her father’s debts and fixed long-standing economic problems. However, because she, like her father, had now gotten deeply involved in Roman politics and had received help from them, she had to work to protect Egypt from being taken over by Rome.</p>
                        <p>In 46 BC and 44 BC, she travelled to Rome to assert her position in the Roman political scene. While she was there in 44 BC, Julius Caesar was assassinated, and she tried to have her son, Caesarion, accepted as Caesar’s heir.</p>
                        <p>This was unsuccessful, and tensions in Rome between those who assassinated Caesar and wanted to avenge his death came into conflict.</p>

                        <p><span style="text-decoration: underline;">About Cleopatra and Marcus Antonius (Mark Antony):</span></p>
                        <p>While this conflict was raging on, Cleopatra and Marcus Antonius formed a political and romantic relationship in order to create some stability in her Kingdom of Egypt. Marcus Antonius worked with Cleopatra to restore her Ptolemaic Kingdom and expand its borders into the Levant, Asia Minor, and towards the Aegean Sea (basically, modern-day Middle East).</p>
                        <p>Cleopatra and Marcus Antonius ended up having twin boys together, but Marcus Antonius left Cleopatra, went back to Italy, and married another woman named Octavia.</p>
                        <p>In the meantime, Cleopatra continued to rule her kingdom and raise her children. Marcus Antonius returned to Egypt and continued helping Cleopatra enhance her territory. They took territory away from King Herod (the same one from the bible’s nativity story). One of the expeditions they went on together, the Parthian expedition, was a failure. After this expedition, Marcus Antonius did not return to Rome. Instead, he returned to Alexandria with Cleopatra.</p>
                        <p>They became officially married, and their children were designated rulers in Cleopatra’s kingdom. This did not make rulers in Rome happy, and they started sending propaganda that aimed to discount the sovereignty of Cleopatra’s children. They also tried to direct Roman prejudices against Cleopatra and her children by framing her as a barbarian woman. Many of the popular stories and xenophobic myths that frame Cleopatra as a promiscuous, “exotic,” and incompetent woman and foreigner come from this propaganda campaign.</p>

                        <p><strong>Invasion from Rome and Cleopatra’s Death:</strong></p>
                        <p>A Roman ruler named Octavian declared war against Cleopatra in 32 BC. Cleopatra commanded a fleet and defended some of her territory on the west coast of Greece against Octavian’s attacks. She went back to Egypt to defend it from Octavian’s invasion. She knew that she had few options left to protect herself and her family from Roman attack. She tried to flee to India and put her son, Caesarion, on the throne.</p>
                        <p>Octavian then invaded Egypt in 30 BC. Cleopatra tricked Marcus Antonius into committing suicide. She saw that there was likely going to be no way out of the invasion and that her rule and dynasty was coming to an end. In order to stop herself from being captured by Octavian and humiliated in Rome, she killed herself.</p>

                        <h4><strong>Additional Readings</strong></h4>
                        <p>Duane W. Roller. <em>Cleopatra: A Biography</em>. Oxford: Oxford University Press, 2010.</p>
                        <p><em>*The introductory chapter had a lot of helpful information and research.</em></p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="History vs. Cleopatra - Alex Gendler" src="https://www.youtube.com/embed/Y6EhRwn4zkc?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <p>Might be accessible for young kids.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Cleopatra's Brief Life Story" src="https://www.youtube.com/embed/Kqfk_Z0WAms?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <p>Another video which might be accessible for young kids.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The Story of Cleopatra | Ancient History" src="https://www.youtube.com/embed/9YNPGkkZaJE?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <p>Video which might be more accessible for young kids. They centre her and avoid some of the sexist and orientalist assumptions which dominate popular myths about her life.</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Retrato_femenino_(26771127162).jpg/960px-Retrato_femenino_(26771127162).jpg" alt="Image of Cleopatra from 1st century AD">
                        <p class="small text-muted mb-3">Image of Cleopatra from 1st century AD</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Cleopatra_Isis_Louvre_E27113.jpg/960px-Cleopatra_Isis_Louvre_E27113.jpg" alt="Cleopatra presenting offerings to Isis (51 BC)">
                        <p class="small text-muted mb-3">Cleopatra dressed as a pharaoh presenting offerings to the goddess Isis dated 51 BC</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://imgsrv.brooklynmuseum.org/collections/objects/71.12_threequarter_right_PS1.jpg?width=3840&amp;quality=75" alt="Head of a Queen (Brooklyn Museum)">
                        <p class="small text-muted mb-3">Cleopatra dressed as a pharaoh presenting offerings to the goddess Isis</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/d/d3/Cleopatra_VII_tetradrachm_Syria_mint.jpg" alt="Coin depicting Cleopatra (Syria mint)">
                        <p class="small text-muted mb-3">Coin depicting Cleopatra which were found in Syria</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Venus_and_Cupid_from_the_House_of_Marcus_Fabius_Rufus_at_Pompeii%2C_most_likely_a_depiction_of_Cleopatra_VII_%282%29.jpg" alt="Painting (Pompeii) likely depicting Cleopatra VII">
                        <p class="small text-muted">A painting of Cleopatra which was found in Italy</p>

                    </div>
                    </div>
                </div>

                <!-- 2: Queen Nefertiti -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNefertiti">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNefertiti" aria-expanded="false" aria-controls="collapseNefertiti">
                        Queen Nefertiti
                    </button>
                    </h2>

                    <div id="collapseNefertiti" class="accordion-collapse collapse" aria-labelledby="headingNefertiti" data-bs-parent="#divisionAccordian">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1WpuHfcWTUVcysp4mbMhiXaxzgE1q0wTSbxaUuL5-NHI/copy">
                            Click Here for a Printable Copy: Queen Nefertiti – Biography
                        </a>
                        </h4>

                        <h3>ABOUT Nefertiti</h3>
                        <p>She flourished in the 14th century BC. Her husband was King Akhenaten (Amenhotep IV), who reigned from 1353-36 BC. Her name means “a beautiful woman has come.” She was likely a princess from Mitanni (Syria). However, there is some evidence to suggest that she was the Egyptian-born daughter of the courtier Ay, the brother of Akhenaton’s mother, Tiy. Nefertiti was fifteen when she married her sixteen-year-old husband, Amenhotep IV.</p>
                        <p>She had a younger sister named Mutnodjmet. Within her ten years of marriage, she had six daughters: Meritaten, Meketaten, Ankhes-en-pa-aten, Neferneferuaten-tasherit, Neferneferure, and Setepenre. Two of her daughters became queens of Egypt. She and her husband helped remodel Egypt’s religion around the worship of the sun god, Aten, and moved the empire’s capital to Amarna.</p>

                        <p><strong><span style="text-decoration: underline;">Importance:[1]</span></strong></p>
                        <p>She played an important religious role, worshipping alongside her husband and serving as the female element in the divine triad formed by Amenhotep, Nefertiti, and the god Aten. She was also considered a living fertility goddess.</p>
                        <p>Nefertiti is significant because she became one of the most famous icons of Ancient Egypt, but we don’t know much about her life. We know that she was the consort to Pharaoh Akhenaten, and that the couple ruled from 1353-1336 BC, which was a contentious period in Egypt’s cultural history. While she was not a Pharaoh herself, she became an important cultural influencer in Egypt. She was central to the cultural, political, and religious movements that took place under her husband’s rule.</p>

                        <p><strong><span style="text-decoration: underline;">About the Religious Movement Nefertiti and Akhenaten Led:[2]</span></strong></p>
                        <p>Five years into Akhenaten’s reign, Akhenaten and Nefertiti began a religious movement based on monotheism based on worshipping the sun god, Aten. Together, Nefertiti and her husband moved the capital from Thebes (modern Luxor) to a new capital city, Amarna, which they built. Their new capital separated them from the “old reign” and religion of ancient Egypt.</p>
                        <p>In the religion that Nefertiti and Akhenaten created, the couple were actually identified with the two divine children, Shu and Tefnut, of the creator god. Although the royal couple worshipped Aten, the people were supposed to worship the royal couple as intermediaries. The royal family to some extent replaced these divine families in people’s worship. Reliefs portrayed Akhenaten, Nefertiti, and their children in settings of family affection, hitherto unknown in the depiction of royalty.[3]</p>

                        <p>[1] <a href="https://mymodernmet.com/ancient-egypt-queen-nefertiti/" target="_blank" rel="noopener">https://mymodernmet.com/ancient-egypt-queen-nefertiti/</a></p>
                        <p>[2] <a href="https://mymodernmet.com/ancient-egypt-queen-nefertiti/" target="_blank" rel="noopener">https://mymodernmet.com/ancient-egypt-queen-nefertiti/</a></p>
                        <p>[3] Deborah Sweeney. “Nefertiti.” <em>The Oxford encyclopedia Women in World History</em>, 2008. Edited by Bonnie G. Smith.</p>

                        <p><strong><span style="text-decoration: underline;">Nefertiti and Akhenaten Impact on the Arts:[1]</span></strong></p>
                        <p>She and her husband ruled over what was possibly the wealthiest period in ancient Egyptian history. During their reign, their new capital of Amarna achieved an artistic boom distinct from any other era in Egypt. They created a new artistic style that depicted people and animals as more realistic and also displayed intimate scenes of affection within the royal family.[2] Nefertiti is depicted doing a variety of things, including driving chariots, attending ceremonial acts with her husband, and smiting enemies. This is a bit like the British royal family today showing images of themselves with their kids in celebrity magazines to gain public popularity.</p>

                        <p><strong>ADDITIONAL READINGS</strong></p>
                        <p>Arnold, Dorothea. <em>The Royal Women of Amarna: Images of Beauty from Ancient Egypt</em>. New York: Metropolitan Museum of Art, distributed by Harry N. Abrams, 1996.</p>
                        <p>This is an exhibition catalog with useful material on the image of Nefertiti in Amarna art.</p>

                        <p>For teachers – Podcast with additional information about Akhenaten and Nefertiti’s city of Amarna:
                        <a href="https://www.youtube.com/watch?v=YuykGUgYDg8" target="_blank" rel="noopener">https://www.youtube.com/watch?v=YuykGUgYDg8</a>
                        </p>
                        <p>Created by a scholar who has a masters in Egyptian history. Gives some idea of what life was like in the city of Amarna.</p>

                        <p><a href="https://www.britannica.com/place/Tell-el-Amarna" target="_blank" rel="noopener">https://www.britannica.com/place/Tell-el-Amarna</a></p>
                        <p>More on Amarna, the city that Nefertiti and Akhenaten built.</p>

                        <p>Joyce Tyldesley. “Nefertiti.” Britannica. December 28, 2020.
                        <a href="https://www.britannica.com/biography/Nefertiti" target="_blank" rel="noopener">https://www.britannica.com/biography/Nefertiti</a>
                        </p>

                        <p>[2] <a href="https://www.theguardian.com/science/2015/aug/15/queen-nefertiti-tomb-michelle-moran-interview" target="_blank" rel="noopener">https://www.theguardian.com/science/2015/aug/15/queen-nefertiti-tomb-michelle-moran-interview</a></p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The Mystery of Queen Nefertiti | Lost Treasures of Egypt" src="https://www.youtube.com/embed/Eex2Vu6iGy8?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The First Monotheistic Pharaoh | The Story of God" src="https://www.youtube.com/embed/BgFqKXgmv6U?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Amarna: The Pharaoh and the princess" src="https://www.youtube.com/embed/_LtViA1UkE8?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p>Video about Nefertiti, Akhenaten, and the changes they made to religion that is perhaps more accessible to kids. It might be a bit fast for them to read though. Video gives a tour of Amarna and talks a bit about Nefertiti. Also talks about the impact of Akhenaten and Nefertiti’s religious changes across different cities in Egypt (scratching out names of old gods carved into temples). This video is longer, and might be better as a tool for teachers to learn about Akhenaten and Nefertiti in an easy way. Shows some footage of how modern stone carvers can build and replicate the blocks that built Amarna and other ancient Egyptian buildings possible.</p>

                        <p>Contains images of Nefertiti:
                        <a href="https://www.britannica.com/biography/Nefertiti" target="_blank" rel="noopener">https://www.britannica.com/biography/Nefertiti</a>
                        </p>
                        <p>More great images:
                        <a href="https://www.mymodernmet.com/ancient-egypt-queen-nefertiti/" target="_blank" rel="noopener">https://www.mymodernmet.com/ancient-egypt-queen-nefertiti/</a>
                        </p>
                        <p>Website of Amarna, the archaeological site of the city that Nefertiti and Akhenaten built:
                        <a href="https://www.amarnaproject.com/pages/amarna_the_place/index.shtml" target="_blank" rel="noopener">https://www.amarnaproject.com/pages/amarna_the_place/index.shtml</a>
                        </p>
                        <p>Might be interesting to assign to kids to read through one of the sites with their parents. Contains many images and maps.</p>

                    </div>
                    </div>
                </div>

                <!-- 3: Queen Amina -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAmina">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmina" aria-expanded="false" aria-controls="collapseAmina">
                        Queen Amina
                    </button>
                    </h2>

                    <div id="collapseAmina" class="accordion-collapse collapse" aria-labelledby="headingAmina" data-bs-parent="#divisionAccordian">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1EJK7PBcVyjUK2YXLKY77D6MFNL9LN5NAUhUSdChiAPI/copy">
                            Click Here for a Printable Copy: Queen Amina – Biography
                        </a>
                        </h4>

                        <h4><strong>ABOUT Queen Amina</strong></h4>
                        <p>Amina of Zaria, commonly known as the warrior Queen, expanded the territory of the Hausa people of North Africa to the largest borders in its history. She was the warrior Queen of Zazzau (now called Zaria). She is also known as Amina Sarauniya Zazzau. She was the 24th habe (name for rulers of Zazzau).</p>
                        <p>According to most accounts, Amina ruled for thirty-four years, from 1576 to 1610. Her domain of Zazzau, a city-state of Hausaland, was eventually renamed Zaria and is the capital of the present-day emirate of Kaduna in Nigeria.</p>

                        <p><span style="text-decoration: underline;"><strong>Amina’s family:</strong></span></p>
                        <p>She was the oldest of three royal siblings, and was sixteen years old when her noble parent, the powerful Bakwa of Turunka, inherited the throne of Zazzau. It’s unclear whether Bakwa was her father or mother. The reign of Bakwa in Zazzau was known for its peace and prosperity. She had a younger brother named Karama and a younger sister named Zaria.</p>

                        <p><span style="text-decoration: underline;"><strong>About Zazzau:</strong></span></p>
                        <p>Zazzau was a smaller state that sat at the borders of other larger warring states, and was occupied by the Fulani and at others by the Hausa. Throughout Hausaland, the years AD 1200-1700 were years when warfare and military campaigns for the purpose of increasing commerce were common. Warfare during this period tended to be carried out in an effort to control trade and expand the Hausa communities. Often, the polities that the Hausa fought against, such as the Mali, Fulani, and Bornu, fought back in these clashes as aggressors.</p>
                        <p>This is the context in which Amina came of age as a teenager, where she herself honed her battle skills under the guidance of soldiers in the Zazzau military.</p>
                        <p>The citizens of Hausaland displayed advanced skills in the industrial arts of tanning, weaving, and metalworking. In contrast, agriculture was the dominant activity in the areas surrounding Hausaland.</p>

                        <p><span style="text-decoration: underline;"><strong>Amina’s Reign:</strong></span></p>
                        <p>Upon the death of Bakwa in 1566, Amina’s brother, Karama, became the ruler of Zazzau. Although Karama was younger than Amina, the throne went to the son first. Ten years later, Karama died, and Amina took the throne. She had matured into a fierce warrior and had earned the respect of the Zazzau military. She had established her dominance as the head of the Zazzau cavalry even before she came to rule Zazzau.</p>

                        <p>The reign of Amina occurred at a time when the city-state of Zazzau was situated at the crossroad of three major trade corridors of northern Africa, connecting the region of the Sahara with the remote markets of the southern forest lands and western Sudan. It was the rise and fall of the powerful Songhai (Songhay) people and the resulting competition for control of trade routes that incited continual warring among the Hausa people and the neighbouring settlements during the fifteenth and sixteenth centuries. It was not until later that a ruling arrangement between the Hausa and the Fulani people ultimately brought lasting peace into the region and survived into the colonial era of the nineteenth century.</p>

                        <p>Within three months of inheriting the throne, Queen Amina embarked on what was to be an ongoing series of military engagements. She stood in command of an immense military band and personally led the cavalry of Zazzau through an ongoing series of campaigns, waging battle continually throughout the course of her sovereignty.</p>
                        <p>Most of her time in power was spent carrying out military campaigns that were meant to ensure safe passage for Zazzau and other Hausa traders throughout the Saharan region. Amina’s strategy was to significantly expand the borders of Zazzau territory. Under her rule, they were the largest they would ever be in Zazzau’s history. At one point, under Amina’s rule, the Zazzau’s borders covered trade routes connecting eastern Sudan with Egypt in the east and Mali in the north. Amina also built walls around the encampments of the territories that she conquered. Some of these walls survive to this day.</p>
                        <p>Some historians credit Amina with introducing protective armour (like iron helmets and chain mail) to the Hausaland military. Under her rule, the Hausa of Zazzau were well skilled in the metalworking crafts. Some historians also credit Amina with originating the Hausa practice of building military encampments behind fortress walls. A 15 km wall surrounding the modern-day city of Zaria dates back to Amina’s rule and is known as Amina’s wall.</p>
                        <p>It is believed that Amina died during a military campaign at Atagara, near Bida in Nigeria.</p>

                        <p><span style="text-decoration: underline;"><strong>Disputed elements:</strong></span></p>
                        <p>Many details of her life remain in dispute among historians. She is presumed to have been a Muslim ruler. Information about her life mainly comes from the <em>Kano Chronicles</em> (transcribed Hausa writings and oral traditions of Nigeria).</p>
                        <p>Some accounts of Amina date her rule back from 1421-1438.</p>

                        <p><span style="text-decoration: underline;"><strong>ADDITIONAL READING:</strong></span></p>
                        <p>“Amina of Zaria.” In <em>Encyclopedia of World Biography</em>, 2nd ed., 5-7. Vol. 21. Detroit, MI: Gale, 2004. <em>Gale eBooks</em> (accessed December 30, 2020).</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Queen Amina of Zazzau" src="https://www.youtube.com/embed/nFli0F4L9yw?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>The video might be accessible to old kids.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Nigeria was home to warrior Queen Amina of Zazzau" src="https://www.youtube.com/embed/0yAo4kZtOPE?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>This video goes through her early life, her impact on Hausa architecture, and highlights how her military campaigns were mainly about expanding trade route for her people.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The Conqueror Queen Of West Africa: A Brief History" src="https://www.youtube.com/embed/iZMoxpv1Sok?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>This video goes into even more detail about Zazzau, where Amina was from.</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://cdn.guardian.ng/wp-content/uploads/2019/09/Queen-Amina-of-Zaria.-Photo-Face2FaceAfrica-898x598.jpg" alt="Queen Amina statue / imagery">
                        <p class="small text-muted mb-3">Statue of Queen Amina at the National Arts Theatre in Lagos, Nigeria. This blog post contains some images of her depicted on Nigerian stamps and artwork.</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Zaria_Emir's_palace_gate.jpg/1200px-Zaria_Emir's_palace_gate.jpg" alt="Zaria Emir's palace gate">
                        <p class="small text-muted">Gates to the palace of the emir of Zazzau.</p>

                    </div>
                    </div>
                </div>

                <!-- 4: Amanirenas -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAmanirenas">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmanirenas" aria-expanded="false" aria-controls="collapseAmanirenas">
                        Amanirenas
                    </button>
                    </h2>

                    <div id="collapseAmanirenas" class="accordion-collapse collapse" aria-labelledby="headingAmanirenas" data-bs-parent="#divisionAccordian">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1ZnHx79dCfXh96QsRCyYJietb0TuHIKDkbzgKRc5Tc08/copy">
                            <strong>Click Here for a Printable Copy: Queen Amanirenas – Biography</strong>
                        </a>
                        </h4>

                        <h4><strong>ABOUT Amanirenas</strong></h4>
                        <p>Kandake [1] Amanirenas reigned between 40-10 BC. She lost an eye during battle, but because of this was considered courageous. She is best known for leading Kushite armies against the Romans for five years, from 27-22 BC. While she was undertaking these campaigns, ancient accounts of her indicate that she was the “ruler of the Aethiopians,” and a “masculine sort of woman and blind in one eye.” She also was known for having thousands of men under her command. [2] Amanirenas and her generals led an army to counterattack the Romans. During the attack, her army pulled down statues of Roman rulers, including a bronze head of the Roman Emperor Augustus, who ruled from 27 BC to AD 14. She lost the battle, but in the negotiations afterwards won back much of their land and possessions. [3]</p>
                        <p>Meroe, the city where Amanirenas ruled, was at the junction of several important trade routes in a region rich in iron and other precious metals. It became a bridge between Africa and the Mediterranean and grew prosperous. The Kushite Kingdom was multicultural and blended elements of Greco-Roman, Egyptian, and other African cultures. [4]</p>

                        <p><strong>About the Kushites: [5]</strong></p>
                        <p>Kush is the name given to a period of Nubian history during which there were two successive capitals, Napata and Meroe. The Kush period lasted from about 656 BC to 270 BC.</p>

                        <p>[1] “Kandake” is the Kushite Empire word for its Queens. In the Roman Empire, these women rulers were referred to as “Candaces.” This is where the woman’s name “Candace” comes from.</p>
                        <p>[2] The Geography of Strabo. Published in vol. VIII of the Loeb Classical Library edition. http://penelope.uchicago.edu/Thayer/E/Roman/Texts/Strabo/17A3*.html</p>
                        <p>See page 139. Strabo was an ancient geographer and historian who encountered Candace Amanirenas.</p>
                        <p>[3] Miriam Maat Ka Re Monges. “Kush.” <em>Encyclopedia of Black Studies</em>. Edited by Molefi Kete Asante and Ama Mazama. (2004).</p>
                        <p>[4] Isma’il Kushkush. “In the Land of Kush” Smithsonian vol 51, issue 5 (September 2020).
                        <a href="https://www.smithsonianmag.com/travel/sudan-land-kush-meroe-ancient-civilization-overlooked-180975498/" target="_blank" rel="noopener">https://www.smithsonianmag.com/travel/sudan-land-kush-meroe-ancient-civilization-overlooked-180975498/</a>
                        </p>
                        <p>[5] Miriam Maat Ka Re Monges. “Kush.” <em>Encyclopedia of Black Studies</em>. Edited by Molefi Kete Asante and Ama Mazama. (2004).</p>

                        <p>In some religious traditions, Cush was linked to the biblical Cush, son of Ham and grandson of Noah, whose descendants inhabited northeast Africa. Kush was the kingdom that dominated the region between roughly 2500 BC and AD 300. [1]</p>

                        <p>For years, European and American historians and archaeologists viewed ancient Kush through the lens of their own prejudices. They made assumptions about and downplayed the importance of or accomplishments of Kushite peoples. It wasn’t until the mid-20th century that sustained excavation and archaeology revealed that Kerma, which dated to as early as 3000 BC, was the first capital of a powerful indigenous kingdom that expanded to encompass the land between the first cataract of the Nile in the north and the fourth cataract in the south. The kingdom rivalled and at times overtook Egypt. [2]</p>

                        <p>This first Kushite kingdom traded in ivory, gold, bronze, ebony, and slaves with neighbouring states such as Egypt and ancient Punt, along the Red Sea in the east and it became famous for its blue glazed pottery and finely polished tulip-shaped red-brown ceramics. [3]</p>

                        <p>In terms of architecture, Kushites had pyramids like Egypt, but they were steeper and not all of them were dedicated to royals. Other nobles were also buried in their pyramids.</p>

                        <p>There are more pyramids in Sudan (200), where the Kushite Kingdom was situated, than there are in Egypt. [1]</p>

                        <p><strong>About Kandakes/Candaces: [2]</strong></p>
                        <p>Kandakes, or Candaces, ruled the ancient city of Meroe. This is the context in which Amanirenas lived and ruled. She was preceded and followed by a line of Black women rulers in Kush. The existence of Kandakes reveal the elevated position of women in the Kushite culture.</p>
                        <p>Kandakes were well known in the classical/ancient world, including in Europe, and there are several Roman sources that refer to them. Gaius Petronius, who was a magistrate of the roman province of Egypt (called Kemet at the time), from 25 to 21 BC, also wrote about Kandake Amanirenas. The King James version of the Bible also refers to Kandakes. [3]</p>
                        <p>There are many depictions of Kandakes that still survive on ancient temple walls today. They are usually pictured as large women with long, pointed fingernails and beautiful sacred jewellery. The large sizes of the women in these images probably represented productivity, motherhood, material wealth, and power.</p>

                        <p>African American Studies Scholar, Nah Dove, writes that “From antiquity, as spiritual, military, and political leaders, women’s roles have been critical in the effort to take control of lands, resources, and energies from an alien occupation. Not surprisingly, few scholars have brought this to light. Early evidence of the role of women in defense of Africa comes out of the Cushite story of the Candaces, who were women rulers.” [4]</p>

                        <p>Following the Greek conquest of Kemet, an Egyptian province in Rome in 30 BC, their attempts to dominate the Kushites failed as a result of the Candaces’ military and political skills. Neither the Greeks or the Romans succeeded in conquering Kush. [1]</p>

                        <p><strong>Significance:</strong></p>
                        <p>Kush makes clear the role that Black Africans played in an interconnected ancient world.</p>
                        <p>In 2019, during protests against authoritarian rule in Sudan, some protesters invoked women Kushite rulers in their chants: “My grandmother is a Kandake” [2]</p>

                        <p><strong>Additional Resources</strong></p>
                        <p><a href="https://www.youtube.com/watch?v=CwaP1kyAqqo" target="_blank" rel="noopener">https://www.youtube.com/watch?v=CwaP1kyAqqo</a></p>
                        <p>A portion of this BBC’s <em>History of Africa</em> documentary featuring British-Sudanese journalist Zeinab Badawi contains some footage on archaeological remains of the Kushites, including pottery and jewellery. The city of Kerma (today Karima) was the first urban centre in Saharan Africa. This video is a wonderful resource on Kushite culture through the lens of Sudanese people today. It includes some interesting discussions about how Kushite gold jewellery, makeup, and henna traditions continue today in modern Sudan. The very end of the documentary (last 10 mins) talks about Meroe – the city that the Kandakes ruled over.</p>

                        <p><a href="http://www.pbs.org/wonders/behind5c/t_kendal.htm" target="_blank" rel="noopener">http://www.pbs.org/wonders/behind5c/t_kendal.htm</a></p>
                        <p>This website outlines some of the work by Timothy Kendall, an expert and archaeologist in Nubian studies.</p>

                        <p><a href="https://margmowczko.com/queen-candace-of-the-ethiopians/" target="_blank" rel="noopener">https://margmowczko.com/queen-candace-of-the-ethiopians/</a></p>
                        <p>This resource includes some helpful maps and images of Kushite pyramids.</p>

                        <p>The archaeological site of Meroe, where Amanirenas ruled, is a UNESCO site:
                        <a href="https://whc.unesco.org/en/list/1336/" target="_blank" rel="noopener">https://whc.unesco.org/en/list/1336/</a>
                        </p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The Greatest African Queen The World Forgot: Queen Amanirenas" src="https://www.youtube.com/embed/0ZH16dCGsFo?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Home Team History’s video about Queen Amanirenas. This video is shorter and more accessible for younger kids.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="What Were Africans Doing During Greco-Roman Times?" src="https://www.youtube.com/embed/4-6EBndxsMA?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>This video is about large theme of what Africans were doing during Greco-Roman times, but it talks about Queen Amanirenas</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The African Queen Who Stood Against Rome" src="https://www.youtube.com/embed/XFaznhSBBKE?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>This is a beautifully animated version of her history – also by Home Team History might be more entertaining and accessible for younger kids to watch</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Queen Mothers &amp; Elite Women In Ancient Africa" src="https://www.youtube.com/embed/wb01OvQ693g?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Talks about matrilineal rule and women rulers on the African continent. Also talks about the Queen of Sheba.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="How Powerful Was Ancient Kush?" src="https://www.youtube.com/embed/KmCqz0rKNIg?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Video about the kingdom of Kush</p>

                        <p class="mt-3"><strong>Extra links mentioned:</strong></p>
                        <p>Bust of Kandake Amanirenas in the Egyptian Museum, Berlin:
                        <a href="https://www.blackpast.org/global-african-history/kandake-amanirenas-10-bc/" target="_blank" rel="noopener">https://www.blackpast.org/global-african-history/kandake-amanirenas-10-bc/</a>
                        </p>
                        <p><a href="https://www.mfa.org/collection/ancient-egypt-nubia-and-the-near-east" target="_blank" rel="noopener">https://www.mfa.org/collection/ancient-egypt-nubia-and-the-near-east</a></p>
                        <p><a href="https://www.mfa.org/exhibitions/nubia" target="_blank" rel="noopener">https://www.mfa.org/exhibitions/nubia</a></p>
                        <p>Nubian Jewellery:
                        <a href="https://collections.mfa.org/collections/315173" target="_blank" rel="noopener">https://collections.mfa.org/collections/315173</a>
                        </p>
                        <p>Exhibit of Nubian art at the Museum of Fine Art in Boston. Contains some images of Nubian artifacts.</p>
                        <p><a href="https://www.brooklynmuseum.org/opencollection/objects/3530" target="_blank" rel="noopener">https://www.brooklynmuseum.org/opencollection/objects/3530</a></p>
                        <p>Gold necklace spacer from the Kushite Kingdom.</p>
                        <p>Ancient Sudan collection at the Egyptian Museum in Berlin:
                        <a href="http://www.egyptian-museum-berlin.com/c33.php" target="_blank" rel="noopener">http://www.egyptian-museum-berlin.com/c33.php</a>
                        </p>
                        <p>Images of Kushite gold jewellery:
                        <a href="https://www.nationalgeographic.com/history/magazine/2016/11/12/ancient-egypt-nubian-kingdom-pyramids-sudan/" target="_blank" rel="noopener">https://www.nationalgeographic.com/history/magazine/2016/11/12/ancient-egypt-nubian-kingdom-pyramids-sudan/</a>
                        </p>

                    </div>
                    </div>
                </div>

                <!-- 5: Queen Sheba -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSheba">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSheba" aria-expanded="false" aria-controls="collapseSheba">
                        Queen Sheba
                    </button>
                    </h2>

                    <div id="collapseSheba" class="accordion-collapse collapse" aria-labelledby="headingSheba" data-bs-parent="#divisionAccordian">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1hLZQa4HByT-GW3pMlWwbuqZgLDhFJYFWO8Pnae_FuYo/copy">
                            Click Here for a Printable Copy: Queen of Sheba – Biography
                        </a>
                        </h4>

                        <h4>Queen of Sheba</h4>
                        <p>The Queen of Sheba was also known as Queen Makeda of Sheba (in Ethiopian accounts) and Bilqis (in the Quran). In Ethiopia, she is recognized as the mother of King Menelik I, who would become the first king of the Solomonic Dynasty in Ethiopia. The Solomonic Dynasty was abolished in 1997 with the death of Amha Selassie. His heir, Crown Prince Zera Yacob, is today recognized as the head of the Ethiopian Royal family, but is not a ruling monarch. Some Ethiopians believe that it was through the Queen of Sheba that Christianity came to Ethiopia.[1]</p>
                        <p>Historians debate whether the Queen of Sheba came from the Kingdom of Axum in Ethiopia or the Kingdom of Saba in Yemen or both. [2] Islamic and Jewish traditions agree that Queen Makeda of Sheba flourished in the 10th century BC. In the 10th century BC, she visited King Solomon, King of Israel and descendant of David. [3]</p>
                        <p>In all three ancient accounts of her life, she is described as beautiful, intelligent, and wealthy. She was a powerful monarch in the ancient world. It was through her meeting with King Solomon that she began worshipping the God of Abrahamic faiths. [4]</p>

                        <p><span style="text-decoration: underline;">Significance in Twentieth-Century History:</span></p>
                        <p>Haile Selassie, who lived from 1892-1975, was a descendant of the Queen of Sheba and fought to defend Ethiopia from Italian invasion. He adhered to the Ethiopian Orthodox Church. During Italy’s occupation of Ethiopia, he spent his exile in England and returned to lead Ethiopia in 1941 after the British defeated Italian occupiers during the East Africa campaign, a military effort which took place during WWII. Haile Selassie presided over the Organisation of African Unity (OAU) in 1963. The OAU, which existed until 2002, aimed to encourage the political and economic integration of member states on the African continent and eradicate colonialism and neo-colonialism.</p>

                        <p><span style="text-decoration: underline;">Significance to the Rastafari Movement:</span></p>
                        <p>The Rastafari movement was founded in Jamaica during the 1930s. In this religious and social movement, Haile Selassie is referred to as the Second Coming of Jesus, and Jah (God) incarnate. Afro-Jamaican communities mobilized the Rastafari movement as a form of resistance against white supremacy and British colonial rule.</p>

                        <p>[1] <a href="https://www.britannica.com/biography/Queen-of-Sheba" target="_blank" rel="noopener">https://www.britannica.com/biography/Queen-of-Sheba</a></p>
                        <p>[2] <a href="https://www.nationalgeographic.com/travel/destinations/africa/ethiopia/mysterious-queen-sheba-legend-church-archaeology/" target="_blank" rel="noopener">https://www.nationalgeographic.com/travel/destinations/africa/ethiopia/mysterious-queen-sheba-legend-church-archaeology/</a></p>
                        <p><a href="https://www.pbs.org/mythsandheroes/myths_four_sheba.html" target="_blank" rel="noopener">https://www.pbs.org/mythsandheroes/myths_four_sheba.html</a></p>
                        <p>[3] Shelley P. Haley, “Makeda, Queen of Sheba.” The Oxford Encyclopedia Women in World History. Oxford University Press. 2008. Edited by Bonnie G. Smith. eISBN:9780195337860</p>
                        <p>[4] Shelley P. Haley, “Makeda, Queen of Sheba.” The Oxford Encyclopedia Women in World History. Oxford University Press. 2008. Edited by Bonnie G. Smith. eISBN:9780195337860</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The Queen of Sheba and King Solomon" src="https://www.youtube.com/embed/kF3EMLSVPl8?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Appreciate for kids</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="QUEEN OF SHEBA - A JOURNEY IN SEARCH OF WISDOM" src="https://www.youtube.com/embed/5Z9s6SuEfMc?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Might be for older kids who can read</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="SPCK Bedtime Story | The Queen of Sheba, an Extraordinary Woman" src="https://www.youtube.com/embed/C07DwBxmPDk?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Reading a story about the Queen of Sheba for younger children which address the fact that she was likely from Ethiopia or Yemen</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Women of the Quran - Bilqis, Queen of Sheba" src="https://www.youtube.com/embed/MCemWxaG5pk?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Reading a story about the Queen of Sheba for younger children which address the fact that she was likely from Ethiopia or Yemen</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://live.staticflickr.com/2228/2131716999_519f5880fe_b.jpg" alt="Depiction of Sheba in an 11th century Ethiopian Church">
                        <p class="small text-muted mb-3">Depiction of Sheba on the walls of an 11th century Ethiopian Church, built by king Lalibela</p>

                        <img class="img-fluid rounded mb-2" decoding="async" src="https://media.britishmuseum.org/media/Repository/Documents/2014_10/1_6/365c7f3c_e704_4167_9a23_a3b7006455c4/mid_00030134_001.jpg" alt="Persian miniature style depiction of Bilqis (Queen of Sheba)">
                        <p class="small text-muted">Image of Bilqis (Queen of Sheba) from the Quran in Persian miniature style</p>

                    </div>
                    </div>
                </div>

            </div>

            <h4>KINGS OF AFRICA</h4>
            <div class="accordion" id="kingAccordion">

                <!-- 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button">
                        Lalibela - The African King
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse show">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1zb30kWpWGBZ-v6QUZyrJgBn1yU1iR6sFngB1-Eib4Wo/copy">
                            <strong>Click Here: Printable Copy: King Lalibela Biography</strong>
                        </a>
                        </h4>

                        <h4><strong>ABOUT Lalibela – the African King</strong></h4>

                        <p>The churches of Lalibela are a set of eleven exquisite medieval cave churches built in 12th-century Ethiopia. They still stand today and serve as a place of pilgrimage. The churches were carved out of rock.</p>

                        <p>About the site of Lalibela, now a UNESCO world heritage site:
                        <a href="https://whc.unesco.org/en/list/18/" target="_blank" rel="noopener">https://whc.unesco.org/en/list/18/</a>
                        </p>

                        <p>They were built under the leadership of the King of Lalibela of the Zagwe dynasty in Ethiopia in the 12th century. Lalibela (previously named Roha) was the administrative capital of the Zagwe Empire. Lalibela was the best-known Zagwe emperor, and the capital eventually was renamed after him.</p>

                        <p>Some information on the Zagwe empire:
                        <a href="https://www.britannica.com/topic/Zagwe-dynasty#ref184295" target="_blank" rel="noopener">https://www.britannica.com/topic/Zagwe-dynasty#ref184295</a>
                        </p>

                        <p>The Gadla Lalibela is a book that dates back to the 14th century and offers some information about Lalibela’s life. There are, however, slightly different versions of this story which are passed down in different oral, artistic, and written traditions in Ethiopia.</p>

                        <p>Lalibela’s father was named Jan Seyoum. His brother, King Herbay, was on the throne and heard a prophecy that his brother, Lalibela, would one day wear the crown. He was worried about Lalibela taking the throne from him. Lalibela’s half-sister also did not want him to take the throne and sent him some poisoned beer.</p>

                        <p>Lalibela asked the bearer of the beer to taste it for him, and the bearer died from the poison. Shocked that he was responsible for the bearer’s death, Lalibela drank the poison as well. Lalibela felt weak and collapsed. While he was being prepared for burial, the undertakers found that his body was still warm. Lalibela claimed that he went on a visit to all seven heavens on Saint Gabriel’s wings, where God showed him ten rock-hewn churches. God told Lalibela not to be afraid of becoming king, because it was his duty to create churches on earth like those he had shown him in Heaven.</p>

                        <p>After three days and three nights, Lalibela returned to earth and his soul re-entered his body, at which time he made a pact with God to create the churches that he had commanded Lalibela to excavate. The people who had been preparing Lalibela’s body for burial were amazed and spoke of it as a miracle, like Jesus’s rise from the dead. However, Lalibela continued to be persecuted by hostile members of his family. Distressed by their bullying, Lalibela fled to the desert, declaring it better to live among wild animals than among men.</p>

                        <p>While he was living in a cafe, he was comforted by Saint Rufael. Shortly after, an angel appeared and declared that the next day, a young woman would be seen who was destined to be his wife. Sure enough, a woman named Masqal Kebre arrived searching for herbs. Lalibela and Masqal Kebre lived together, and her parents blessed their union.</p>

                        <p>All the while, King Herbay was searching for Lalibela. Herbay found Lalibela and ordered him and his wife to separate and told Lalibela to visit Jerusalem with Saint Gabriel. Lalibela visited Jerusalem and prayed at the Holy sepulchre and returned to Ethiopia and reunited with his wife, Masqal Kebre. Jesus came to King Herbay in his dreams and condemned him for how he treated Lalibela and told him that Lalibela should take on the throne and live to build churches without stones or mortar.</p>

                        <p>Lalibela then took the throne and created, by God’s command, the rock-hewn churches modelled on those he saw in Heaven. He paid the workers all that they demanded as wages, without any exploitation, and they were assisted by unseen angels who toiled on the work in the night.</p>

                        <p>Shortly after the churches were completed, Lalibela died after a short illness. He did not want his son to succeed him because Lalibela favoured the restoration of the Israelite or Solomonic dynasty.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Rock-Hewn Churches, Lalibela (UNESCO/NHK)" src="https://www.youtube.com/embed/gNab_2rWhhQ?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p>UNESCO’s video about Lalibela’s churches. It talks a bit about Lalibela’s story:</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Why the Town of Lalibela is One of Ethiopia's Holiest Sites" src="https://www.youtube.com/embed/UDJcMayPxno?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p>Longer video for teachers for some more information about the Lalibela site and its protection today:
                        <a href="https://www.cbsnews.com/news/lalibela-rock-cut-churches-christmas-eve-60-minutes-2020-12-20/" target="_blank" rel="noopener">https://www.cbsnews.com/news/lalibela-rock-cut-churches-christmas-eve-60-minutes-2020-12-20/</a>
                        </p>

                        <p>
                        <img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Gebre_Mesqel_Lalibela.png/220px-Gebre_Mesqel_Lalibela.png" alt="">
                        </p>

                        <p>The end of this article contains snapshots of some images that depict Lalibela’s life story:
                        <a href="https://www.persee.fr/docAsPDF/ethio_0066-2127_2006_num_22_1_1481.pdf" target="_blank" rel="noopener">https://www.persee.fr/docAsPDF/ethio_0066-2127_2006_num_22_1_1481.pdf</a>
                        </p>

                    </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Mansa Musa
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1uM_b2NIcmNysGDb4aFDAPmhiHj1XFNlVIczUbvVj9Mw/copy">
                            <strong>Click Here for a Printable Copy: Mansa Musa – Biography</strong>
                        </a>
                        </h4>

                        <h4><strong>ABOUT Mansa Musa</strong></h4>

                        <p>Mansa Musa was the emperor of Mali from approximately 1307 to 1332. He was widely known for his wealth, for his pilgrimage to Mecca in 1324, and for building the great mosque at Timbuktu. He was the grand-nephew of Sundiata, another powerful African king who founded their dynasty in Mali.</p>

                        <p><b>About Mansa Musa’s pilgrimage to Mecca:</b></p>
                        <p>Mansa Musa’s pilgrimage to Mecca was what brought global attention to Mali and its wealth. During his pilgrimage, he stopped in Cairo and in Mecca. He began his pilgrimage in his capital of Niani, on the upper Niger River, to Mauritania, Algeria, and eventually to Cairo and Mecca.</p>
                        <p>Mansa Musa was accompanied by a caravan of 60,000 men, including 12,000 slaves wearing brocade and Persian silk. He rode on horseback and was preceded by 500 slaves each carrying a gold-adorned staff. He also had a baggage train of 80 camels, each carrying 300 pounds of gold.</p>
                        <p>Mansa Musa came to be known for his generosity and made a favourable impression where he travelled. He spent so much gold in the Cairo market when he visited that he caused inflation.</p>
                        <p>Although other rulers of West African states had made pilgrimages to Mecca before Mansa Musa, Mansa Musa’s pilgrimage was famous because it was so extravagant.</p>

                        <p><b>About Timbuktu:</b></p>
                        <p>While Mansa Musa was on his pilgrimage, one of his generals, Sagmandia, extended the empire of Mali by capturing the capital of the neighbouring Songhai kingdom. When he returned from his pilgrimage, Mansa Musa commissioned many projects that built up the city of Timbuktu and made it renowned globally as an intellectual, religious, and trade centre.</p>
                        <p>Mansa Musa commissioned a poet and architect from Granada to build mosques in Timbuktu and Gao (former Songhai kingdom capital).</p>
                        <p>Under Mansa Musa, Timbuktu grew into an important commercial city that crossed trade routes connecting to Egypt and other important trade centres in North Africa.</p>

                        <p><b>Sankore University:</b></p>
                        <p>Mansa Musa founded the ancient university of Sankore in Timbuktu (also called the Sankore Madrasa/Madrash). There, students and scholars could learn and exchange ideas about history, Quranic theology, and law.</p>
                        <p>The “University of Sankore” was very different in organization from the universities of medieval Europe. It had no central administration, student registrars, or prescribed courses of study. It was composed of several entirely independent schools or colleges, each run by a single master or imam. Students associated themselves with a single teacher, and courses took place in the open courtyards of mosque complexes or private residences. The primary focus of these schools was the teaching of the Quran, although broader instruction in fields such as logic, astronomy, and history also took place. The imams who taught at the Sankore mosque were respected. [1]</p>

                        <p><b>ADDITIONAL READINGS</b></p>

                        <p>
                        <a href="https://africasacountry.com/2019/10/refuting-the-claim-that-precolonial-africa-lacks-written-traditions/" target="_blank" rel="noopener">
                            https://africasacountry.com/2019/10/refuting-the-claim-that-precolonial-africa-lacks-written-traditions/
                        </a>
                        </p>

                        <p>This article is not about Mansa Musa specifically, but it helps to address the assumption that there were no literary cultures on the African continent. Mansa Musa’s library also directly challenges this assumption, as does the library at Alexandria.</p>

                        <p>
                        <a href="https://www.bu.edu/africa/outreach/teachingresources/history/k_o_mali/" target="_blank" rel="noopener">
                            https://www.bu.edu/africa/outreach/teachingresources/history/k_o_mali/
                        </a>
                        </p>

                        <p>[1]
                        <a href="https://www.pbs.org/wonders/Episodes/Epi5/5_wondr6.htm" target="_blank" rel="noopener">
                            https://www.pbs.org/wonders/Episodes/Epi5/5_wondr6.htm
                        </a>
                        </p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Kids Black History | Mansa Musa The Richest Man EVER!" src="https://www.youtube.com/embed/nbc4PkZzNME?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Mansa Musa - The Richest Man In History - African History For Kids" src="https://www.youtube.com/embed/cERzEfq_v9c?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Mansa Musa, one of the wealthiest people who ever lived - Jessica Smith" src="https://www.youtube.com/embed/O3YJMaL55TM?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Mansa Musa and Islam in Africa: Crash Course World History #16" src="https://www.youtube.com/embed/jvnU0v6hcUo?start=1&amp;feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="The hidden treasures of Timbuktu - Elizabeth Cox" src="https://www.youtube.com/embed/40ehHbdi95o?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="MANSA MUSA, THE RICHEST PERSON IN HISTORY | Draw My Life" src="https://www.youtube.com/embed/W5WPJO6tUk0?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="What Was Going On In Africa During The Life Of Mansa Musa?" src="https://www.youtube.com/embed/9gbYdY43mY8?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p>
                        <a href="https://www.kwasikonadu.info/blog/2018/3/18/the-trans-saharan-trade-network-according-to-the-catalan-atlas" target="_blank" rel="noopener">
                            https://www.kwasikonadu.info/blog/2018/3/18/the-trans-saharan-trade-network-according-to-the-catalan-atlas
                        </a>
                        </p>

                        <p>
                        <a href="https://en.wikipedia.org/wiki/Mansa_Musa#/media/File:Catalan_Atlas_BNF_Sheet_6_Mansa_Musa.jpg" target="_blank" rel="noopener">
                            https://en.wikipedia.org/wiki/Mansa_Musa#/media/File:Catalan_Atlas_BNF_Sheet_6_Mansa_Musa.jpg
                        </a>
                        </p>

                        <p>The Catalan Atlas, a 14th-century medieval European map (created 1375), depicts Mansa Musa, Mali, and Timbuktu as a principal point along the trans-Saharan trade routes in West and North Africa.</p>

                        <p><img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/2/27/Genealogy_kings_Mali_Empire.svg" alt=""></p>
                        <p><strong>Genealogy of the Mali Empire Kings</strong></p>

                        <p><img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Djingareiber_cour.jpg/250px-Djingareiber_cour.jpg" alt=""></p>
                        <p><strong>Djingareyber Mosque, which was commissioned by Mansa Musa and still stands today.</strong></p>

                        <p><img decoding="async" src="https://pbs.twimg.com/media/Fc2NrfRXgAE3aXX.jpg" alt=""></p>
                        <p><strong>Map of the Mali Empire under Mansa Musa</strong></p>

                        <p><img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Great_Mosque_of_Djenn%C3%A9_1.jpg" alt=""></p>
                        <p><strong>Mosque from the Empire of Mali. Date of Construction Unknown.</strong></p>

                    </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Shamba Bolongongo
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <h4>
                        <a href="https://docs.google.com/document/d/1vhubxUG7Zta9PEiDSXKeg4vsBPxr9-HwlyCfzsvUw6A/copy">
                            <strong>Click Here for a Printable Copy: Shamba – Biography</strong>
                        </a>
                        </h4>

                        <h4><strong>ABOUT Shamba Bolongongo</strong></h4>

                        <p>Shamba Bolongongo is also called Shyaam aMbul or King Shyaam aMbul aNgoong. He was known as “The King of Peace.”</p>
                        <p>He was a King who reigned over the Bushongo people in about AD 1600, and was the 93rd King of the Kuba Kingdom, which still exists today.</p>

                        <p><span style="text-decoration: underline;"><b>Shamba’s Early Life:</b></span></p>
                        <p>Shamba was interested in engaging with foreigners beyond Bushongo’s borders. When he was nineteen years old and still a prince, he requested permission from the King and Queen to travel beyond the borders of the Bushongo kingdom. The King and Queen were wary of this because travel was considered dangerous – there were wild beasts and other societies who might be hostile to Bushongo peoples.</p>
                        <p>But Prince Shamba was persistent and had a strong desire to learn about the places beyond Bushongo borders, so the King and Queen let him go. Accompanied by a large entourage of aides, servants, and warriors, he went on a two-year tour to build knowledge that would make him a better, wiser ruler.</p>
                        <p>By the time he returned to Bushongo land, the King had died, and Shamba ascended to the throne.</p>

                        <p><span style="text-decoration: underline;"><b>Shamba Bolongongo’s Reign:</b></span></p>
                        <p>During Shamba’s rule, he introduced many significant changes to his people. He taught them to weave raffia fibre into cloth and cultivate cassava (which helped keep locusts away from important crops, like maize and millet).</p>
                        <p>Shamba made sure that fourteen women held official positions in the government. He also brought the art of embroidery and encouraged other forms of arts and crafts under his rule. He also brought the game mancala to Bushongo.[1]</p>
                        <p>He made sure that crafts and industries had a voice in the government. Representatives from eighteen trades had a voice in the government: wood-sculptors, weavers, blacksmiths, leather workers, singers, dancers, musicians, fishermen, hunters, boat makers, oil manufacturers, mat makers, salt processors, tailors, rope makers, hoosiers, and spinners of thread.</p>
                        <p>During his reign, King Shamba tried to bring peace to his kingdom. He tried to abolish war, restricted his armed forces to police duty, and eliminated the use of bows and arrows. He ordered that the State knife be replaced with a wooden blade for ceremonies.</p>
                        <p>The Bushongo kingdom became known and respected under Shamba, and his subjects were able to travel freely in neighbouring kingdoms as traders.</p>
                        <p>If a subject was killed in a distant village, the Bushongo did confront the aggressors but did not kill anyone in retaliation for the death.</p>

                        <p><span style="text-decoration: underline;"><b>About Bushongo:</b></span></p>
                        <p>Bushongo, or Kuba Kingdom, was a society situated in Central Africa. It is in the southeast of modern-day Democratic Republic of the Congo. The Bushongo were a Bantu-speaking federation of seventeen tribes living along the Kasai and Sankuru rivers of the Congo. They founded a nation together. Officially appointed historians of the Bushongo kingdom kept an account of 121 dynasties, going back to the 5th-century AD. Bushongo’s third ruler was a woman named Lobamba who ruled in about AD 490.</p>

                        <p><b>ADDITIONAL READINGS</b></p>
                        <p>
                        <a href="https://www.khanacademy.org/humanities/ap-art-history/africa-apah/central-africa-apah/a/ndop-portrait-of-king-mishe-mishyaang-mambul" target="_blank" rel="noopener">
                            https://www.khanacademy.org/humanities/ap-art-history/africa-apah/central-africa-apah/a/ndop-portrait-of-king-mishe-mishyaang-mambul
                        </a>
                        </p>

                        <p>[1]
                        <a href="https://en.wikipedia.org/wiki/Mancala" target="_blank" rel="noopener">
                            https://en.wikipedia.org/wiki/Mancala
                        </a>
                        </p>

                        <p>
                        <a href="https://scholar.harvard.edu/files/nunn/files/kuba_paper_september_2016.pdf" target="_blank" rel="noopener">
                            https://scholar.harvard.edu/files/nunn/files/kuba_paper_september_2016.pdf
                        </a>
                        </p>

                        <p>
                        <a href="https://www.britannica.com/biography/Shamba-Bolongongo" target="_blank" rel="noopener">
                            https://www.britannica.com/biography/Shamba-Bolongongo
                        </a>
                        </p>

                        <p>Morris Siegel. “Shamba Bolongongo: African King of Peace.”
                        <a href="https://www.sahistory.org.za/sites/default/files/archive-files2/asapr58.18.pdf" target="_blank" rel="noopener">
                            https://www.sahistory.org.za/sites/default/files/archive-files2/asapr58.18.pdf
                        </a>
                        </p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="THE KUBA KINGDOM! KINGDOM OF THE BAKUBA!" src="https://www.youtube.com/embed/twDj-CSe3ws?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Art of the Kuba: Journey to a Majestic Past" src="https://www.youtube.com/embed/dT-tx5hdd50?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Kuba Art in Washington, D.C." src="https://www.youtube.com/embed/VCpT-4vctNY?feature=oembed" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p><img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Brooklyn_Museum_61.33_Ndop_Portrait_of_King_Mishe_miShyaang_maMbul_(5).jpg/1200px-Brooklyn_Museum_61.33_Ndop_Portrait_of_King_Mishe_miShyaang_maMbul_(5).jpg" alt=""></p>

                        <p>
                        <a href="https://www.metmuseum.org/toah/hd/kuba/hd_kuba.htm" target="_blank" rel="noopener">https://www.metmuseum.org/toah/hd/kuba/hd_kuba.htm</a>
                        </p>
                        <p>
                        <a href="https://www.artic.edu/artists/97811/bushongo" target="_blank" rel="noopener">https://www.artic.edu/artists/97811/bushongo</a>
                        </p>
                        <p>
                        <a href="https://www.housebeautiful.com/design-inspiration/a34304694/what-is-kuba-cloth/" target="_blank" rel="noopener">https://www.housebeautiful.com/design-inspiration/a34304694/what-is-kuba-cloth/</a>
                        </p>

                    </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Taharqa
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <h4 style="text-align:center;">
                        <strong>
                            <a href="https://docs.google.com/document/d/1bVd0Q65n6YnNCYHubJqpB0kIKNxGWu7MqSQiyBF-6h4/copy" target="_blank" rel="noopener">
                            Click Here for a Printable Copy: King Taharqa – Biography
                            </a>
                        </strong>
                        </h4>

                        <h4 style="text-align:center;"><strong>ABOUT Taharqa</strong></h4>

                        <p>Taharqa was the son of <a href="https://en.wikipedia.org/wiki/Piye" target="_blank" rel="noopener">Piye</a>, the Nubian king of <a href="https://en.wikipedia.org/wiki/Napata" target="_blank" rel="noopener">Napata</a> who had first conquered Egypt. Taharqa was also the cousin and successor of <a href="https://en.wikipedia.org/wiki/Shebitku" target="_blank" rel="noopener">Shebitku</a>. The successful campaigns of Piye and Shabaka paved the way for a prosperous reign by Taharqa.</p>

                        <p>King Taharqa, also called Tirhaka, reigned Egypt from 690 to 664 BC. His cousin, Sheibitku, held the throne before him. During his reign, Taharqa gave military support to resistance movements against Sennacherib, the King of Assyria.</p>

                        <p>When he reigned over Egypt, his territory stretched from Sudan to the Levant. Taharqa came from the 25th dynasty of Egypt, which was a dynasty of Pharaohs from Nubia. This meant that the Pharaohs of this dynasty all originated from modern-day Sudan. These Pharaohs brought some elements of Egyptian culture into Sudan, such as pyramids. Taharqa was the final ruler of his dynasty.</p>

                        <p><span style="text-decoration: underline;"><strong>Taharqa’s Conflicts with the Assyrian Empire:</strong></span></p>
                        <p>Eventually, Taharqua was defeated by Sennacherib’s son, Esarhaddon, who ended up capturing the city of Memphis in Egypt. Meanwhile, Esarhaddon set up a new kingdom in Assyria, which consisted of a government that collected tribute from surrounding chiefs in the area.</p>
                        <p>During this time, Taharqa took refuge in Upper Egypt. When Sennacherib’s son withdrew from Egypt, Taharqa returned to Egypt and defeated Esarhaddon’s forces, regaining control of Egypt.</p>
                        <p>However, Taharqa had to flee Egypt again when Esarhaddon’s son, Ashurbanipal, defeated him. Taharqa fled to Nubia where he lived the rest of his days.</p>

                        <p><strong>ADDITIONAL READINGS</strong></p>
                        <p>Owen Jarus. “Massive statue of Pharaoh Taharqa discovered deep in Sudan.” <em>Independent</em>. Friday January 8, 2010.
                        <a href="https://www.independent.co.uk/news/world/africa/massive-statue-pharaoh-taharqa-discovered-deep-sudan-1862007.html" target="_blank" rel="noopener">
                            https://www.independent.co.uk/news/world/africa/massive-statue-pharaoh-taharqa-discovered-deep-sudan-1862007.html
                        </a>
                        </p>

                        <p><a href="https://www.britannica.com/biography/Taharqa" target="_blank" rel="noopener">https://www.britannica.com/biography/Taharqa</a></p>

                        <p><a href="https://www.cnn.com/videos/world/2018/05/25/inside-africa-taharqa-nubia-dynasty-sudan-pyramid-b.cnn" target="_blank" rel="noopener">https://www.cnn.com/videos/world/2018/05/25/inside-africa-taharqa-nubia-dynasty-sudan-pyramid-b.cnn</a></p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="A History Of The African King Taharqa" src="https://www.youtube.com/embed/-WNIxiO8LGM?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Short video explaining the importance of King Taharqa which is accessible to older students. Provides an explanation of his conflicts with the expansionist Assyrian empire.</p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="African History: King Taharqa" src="https://www.youtube.com/embed/-JRaEQPHpeY?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p>Explanation of the borders of the 25th dynasty of Egypt, the dynasty that Taharqa ruled over. Its borders at this time extended far beyond modern day Egypt’s borders.</p>

                        <p>
                        <a href="https://collections.rom.on.ca/objects/188797/shabti-of-king-taharqa" target="_blank" rel="noopener">https://collections.rom.on.ca/objects/188797/shabti-of-king-taharqa</a>
                        </p>
                        <p>
                        <a href="https://www.brooklynmuseum.org/opencollection/objects/49165" target="_blank" rel="noopener">https://www.brooklynmuseum.org/opencollection/objects/49165</a>
                        </p>

                        <p><img decoding="async" src="https://myplaceinthisworld.ca/wp-content/uploads/2021/07/Taharqa_Boston_Museum_of_Fine_Arts.jpg" alt=""></p>
                        <p>Statue of Taharqa now situated in the Boston Museum of Fine Arts</p>

                        <p><img decoding="async" src="https://myplaceinthisworld.ca/wp-content/uploads/2021/07/Taharqa_among_statues_of_Napatan_kings.jpg" alt=""></p>
                        <p>Statue of Taharqa now displayed in the Kerma museum in Sudan.</p>

                        <p><img decoding="async" src="https://myplaceinthisworld.ca/wp-content/uploads/2021/07/1024px-Taharqa_ca._690-64_BCE_Ny_Carlsberg_Glyptotek_Copenhagen_36420740125.jpg" alt=""></p>
                        <p>Bust of Taharqa</p>

                    </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Tutankhamun
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <h4 style="text-align:center;">
                        <strong>
                            <a href="https://docs.google.com/document/d/1cEi5bc5RxNT3phsCgjJ8H5RnX3h_ANj4PCBtOb76e88/copy" target="_blank" rel="noopener">
                            Click Here for a Printable Copy: King Tut – Biography
                            </a>
                        </strong>
                        </h4>

                        <h4 style="text-align:center;"><strong>ABOUT Tutankhamun</strong></h4>

                        <p>The king popularly known as “King Tut” was a pharaoh named Tutankhamun. The discovery of his tomb in 1922 made him an important figure in twentieth-century popular culture and renewed global interest in ancient Egypt.</p>
                        <p>Tutankhamun was born at Amarna, the city that his grandparents, Nefertiti and Akhenaten, built. His was first named Tutankhaten, a name which means “living images of the sun god, Aten.”</p>
                        <p>He was very young when he took the throne and was a teenager when he died. He is especially famous because his tomb was discovered in 1922.</p>
                        <p>Much of Tutankhamun’s short reign was spent re-establishing the older version of Egyptian religious practices and tradition that his grandparents had tried to replace.</p>
                        <p>During his reign, Tutankhamun moved the capital of the Egyptian kingdom from Amarna to Memphis (near modern Cairo). There, he refurbished and rebuilt the temples that were neglected during his grandparents’ and parents’ reign.</p>
                        <p>It is not clear why he died so young, though a wound on his skull behind his ear led some historians to conclude that he was murdered.</p>

                        <p><a href="https://www.britannica.com/biography/Tutankhamun" target="_blank" rel="noopener">https://www.britannica.com/biography/Tutankhamun</a></p>

                        <p><strong>ADDITIONAL READINGS &amp; RESOURCES</strong></p>
                        <p><a href="https://www.bbc.co.uk/programmes/m000cng6" target="_blank" rel="noopener">https://www.bbc.co.uk/programmes/m000cng6</a></p>
                        <p><a href="https://www.youtube.com/watch?v=-obKX-mqjXQ" target="_blank" rel="noopener">https://www.youtube.com/watch?v=-obKX-mqjXQ</a></p>
                        <p><a href="https://www.youtube.com/watch?v=LwXfvfPy6fc&t=3s" target="_blank" rel="noopener">https://www.youtube.com/watch?v=LwXfvfPy6fc&t=3s</a></p>
                        <p><a href="https://www.youtube.com/watch?v=DKluUdV6ddw" target="_blank" rel="noopener">https://www.youtube.com/watch?v=DKluUdV6ddw</a></p>
                        <p><a href="https://kingtutexhibition.com/news/tutankhamun-facts-10-things-you-didnt-know-about-tutankhamun/" target="_blank" rel="noopener">https://kingtutexhibition.com/news/tutankhamun-facts-10-things-you-didnt-know-about-tutankhamun/</a></p>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Ancient Egypt: The Pharaoh civilisation | Educational Videos for Kids" src="https://www.youtube.com/embed/8_Tbv7anqXk?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="King Tut and His Treasures for Kids" src="https://www.youtube.com/embed/dmkDPaHSBzg?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="Pyramids and Mummies | Educational Videos for Kids" src="https://www.youtube.com/embed/X26PeYKNI2s?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="How Did King Tut Die? | COLOSSAL MYSTERIES" src="https://www.youtube.com/embed/zeqQUhR5Mmc?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="ratio ratio-16x9 mb-3">
                        <iframe title="King Tut Step By Step Drawing and Painting Tutorial" src="https://www.youtube.com/embed/GY1yQ_xH6xg?controls=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <p><img loading="lazy" decoding="async" src="https://myplaceinthisworld.ca/wp-content/uploads/2021/07/800px-CairoEgMuseumTaaMaskMostlyPhotographed.jpg" alt=""></p>
                        <p>His gold mask</p>

                        <p>Photos from the King Tut exhibition in Boston <a href="https://kingtutexhibition.com/" target="_blank" rel="noopener">https://kingtutexhibition.com/</a></p>

                    </div>
                    </div>
                </div>

                <!-- 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button">
                        Hannibal
                    </button>
                    </h2>

                    <div class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <h4 style="text-align:center;">
                        <a href="https://docs.google.com/document/d/1mH-nNy-TnrtrbvAIY5kAPRA6Y4tGM60qZ3Igilv7brw/copy" target="_blank" rel="noopener">
                            Click Here for a Printable Copy: Hannibal – Biography
                        </a>
                        </h4>

                        <h4 style="text-align:center;"><strong>ABOUT Hannibal</strong></h4>

                        <p>Hannibal was a Carthaginian general who lived from 247–181 BC. He was born in North Africa and was one of the great military leaders of the ancient world. He was best known for commanding the Carthaginian forces against Rome in the second Punic War (218–201 BC). He continued to oppose Rome until his death.</p>

                        <p>He was born in the year 247 BC. His father, Hamilcar Barca, was a Carthaginian general and statesman who tried to invade Rome. He married a Spanish princess named Imilce and conquered various Spanish tribes. In 221, Hannibal assumed supreme command in Spain when his brother-in-law, Hasdrubal, died.</p>

                        <p>Hannibal’s military prowess was known to be unrivalled. He has been widely acknowledged as one of the greatest generals in history. He was skilled at combining infantry and cavalry and was recognized for commanding exceptional loyalty from his troops. Although he was not able to take down the Roman empire, he was able to inspire a huge number of Gauls (people from ancient France) to join him in his attacks in Italy.</p>

                        <p>He embarked on several military campaigns attacking the politics of the government. He decided to invade Rome by Spring 218 BC. The purpose of this invasion had less to do with destroying Rome than with detaching Rome’s allies, thereby weakening it.</p>

                        <p>In May 218, with a professional army of 90,000 infantry and 12,000 cavalry and war elephants, he marched to the Rhone and continued towards the Alps, which he crossed in about two weeks. He arrived in the city of Turin and defeated its military commander, Publius Cornelius Scipio. Hannibal and his army defeated several local military leaders.</p>

                        <p>Hannibal was not simply gifted, he was born in a burgeoning city. Carthage was a Phoenician colony and eventually became a major Roman city on the coast of Northeastern Tunisia. Trade was an important part of life in Carthage.</p>

                        <p>Carthage traded with different African societies as well as Spanish societies. Commodities that moved through Carthage included wine, cloth, and pottery. Carthage also exported grain to other parts of the Mediterranean. Carthage became an outstanding educational centre, famous for orators and lawyers.</p>

                        <p><strong>ADDITIONAL READINGS AND RESOURCES</strong></p>

                        <p>William Culican. “Hannibal.” Encyclopedia Britannica. Last updated Dec. 31, 2020.
                        <a href="https://www.britannica.com/biography/Hannibal-Carthaginian-general-247-183-BC" target="_blank" rel="noopener">
                            https://www.britannica.com/biography/Hannibal-Carthaginian-general-247-183-BC
                        </a>
                        </p>

                        <p>William Nassau Weech, Brian Herbert Warmington, and Roger JA Wilson. “Carthage.” The Oxford Companion to Classical civilization (2nd edition). Oxford University Press, 2014.</p>

                        <p>
                        <a href="https://podcasts.apple.com/us/podcast/hannibal-and-the-punic-wars/id1002920121" target="_blank" rel="noopener">
                            https://podcasts.apple.com/us/podcast/hannibal-and-the-punic-wars/id1002920121
                        </a>
                        <br>Podcast on Hannibal.
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
        <h5 class="fw-semibold mb-2">QUEENS OF AFRICA</h5>

        <div id="carouselQueens" class="carousel slide bg-dark">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/queens/queen1.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/queens/queen2.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/queens/queen3.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/queens/queen4.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/queens/queen5.svg') }}" class="d-block m-auto w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselQueens" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselQueens" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <hr class="my-4">
        <h5 class="fw-semibold mb-2">KINGS OF AFRICA</h5>

        <div id="carouselKings" class="carousel slide bg-dark">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/kings/king1.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/kings/king2.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/kings/king3.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/kings/king4.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/kings/king5.svg') }}" class="d-block m-auto w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/kings/king6.svg') }}" class="d-block m-auto w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselKings" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselKings" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

      </div>

    </div>

</div>

<script>
  ['divisionAccordian', 'kingAccordion'].forEach((accordionId) => {
    document
      .querySelectorAll(`#${accordionId} .accordion-item`)
      .forEach((item, index) => {

        const header = item.querySelector('.accordion-header');
        const button = item.querySelector('.accordion-button');
        const collapse = item.querySelector('.accordion-collapse');

        const headingId = `${accordionId}-heading-${index}`;
        const collapseId = `${accordionId}-collapse-${index}`;

        header.id = headingId;

        button.setAttribute('data-bs-toggle', 'collapse');
        button.setAttribute('data-bs-target', `#${collapseId}`);
        button.setAttribute('aria-controls', collapseId);
        button.setAttribute('aria-expanded', 'false');

        collapse.id = collapseId;
        collapse.setAttribute('aria-labelledby', headingId);

        // 🔥 make sure none are open
        collapse.classList.remove('show');
        button.classList.add('collapsed');
      });
  });
</script>

@endsection
