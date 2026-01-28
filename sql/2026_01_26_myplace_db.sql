-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2026 at 05:36 PM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myplace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('my-place-in-this-world-cache-0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 'i:1;', 1769149202),
('my-place-in-this-world-cache-0ade7c2cf97f75d009975f4d720d1fa6c19f4897:timer', 'i:1769149202;', 1769149202),
('my-place-in-this-world-cache-a49244efb069ad458c360ccf88664eb4e82adccc', 'i:2;', 1769018892),
('my-place-in-this-world-cache-a49244efb069ad458c360ccf88664eb4e82adccc:timer', 'i:1769018892;', 1769018892),
('my-place-in-this-world-cache-dilkhushyadav@gmail.com|142.214.83.118', 'i:1;', 1769003122),
('my-place-in-this-world-cache-dilkhushyadav@gmail.com|142.214.83.118:timer', 'i:1769003122;', 1769003122);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_knowledge_docs`
--

CREATE TABLE `chat_knowledge_docs` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `embedding` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_knowledge_docs`
--

INSERT INTO `chat_knowledge_docs` (`id`, `key`, `title`, `language`, `content`, `embedding`, `created_at`, `updated_at`) VALUES
(1, 'hs_activity_02_en', 'Activity #1: Mansa Musa & Shamba\r', 'en', '# Activity #1: Mansa Musa & Shamba\r\nSummary: This multi-task activity examines African leadership through the lens of peace, challenging stereotypes of African kings as solely aggressive or warlike. Students study leaders such as King Shamba Bolongongo of the Kuba Kingdom, Mansa Musa of Mali, and modern figures Colin Kaepernick and Lewis Hamilton, exploring how peace, justice, and identity shape leadership. Through reading, video analysis, persuasive writing, creative responses, historical comparison, and media analysis, students connect past and present leaders while developing critical thinking, communication, and digital literacy skills.\r\nSubjects:\r\n- English\r\n- Media Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(2, 'hs_activity_03_en', 'Activity #2: The Richest Man Who Ever Lived (Mansa Musa)\r', 'en', '# Activity #2: The Richest Man Who Ever Lived (Mansa Musa)\r\nSummary: This activity introduces students to Mansa Musa, the legendary 14th-century emperor of Mali, whose wealth, leadership, and cultural influence shaped African and world history. Through historical inquiry and chronological thinking, students create illustrated timelines, identify significant events, and connect them to broader themes of trade, religion, and education. Students develop critical literacy and media analysis skills by comparing videos, biographies, and articles for tone, audience, purpose, and bias, while assessing credibility and significance. They write reflective/persuasive blog entries using evidence and citations, and present ideas through discussions and multimodal reflections.\r\nSubjects:\r\n- English\r\n- World Studies\r\n- Social Sciences', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(3, 'hs_activity_04_en', 'Activity #3: Adinkra Symbols\r', 'en', '# Activity #3: Adinkra Symbols\r\nSummary: Students explore the cultural, historical, and communicative significance of Adinkra symbols from Ghana, integrating research, visual literacy, and creative expression. They follow the Big 6 research process, build source evaluation and citation skills, and design an original Adinkra-inspired symbol reflecting identity or a contemporary message. Includes vocabulary building, reflective/explanatory writing, and peer discussion.\r\nSubjects:\r\n- English\r\n- World Studies\r\n- Social Sciences\r\n- Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(4, 'hs_activity_05_en', 'Activity #4: Superhero Comic Book\r', 'en', '# Activity #4: Superhero Comic Book\r\nSummary: Students design an original superhero inspired by leadership traits, cultural values, and contributions of African Kings and Queens. They combine research, character development, and comic-strip visual storytelling to connect historical leadership to modern global challenges. Builds media literacy, design skills, cultural analysis, reflection, and culminates in a class anthology.\r\nSubjects:\r\n- English\r\n- Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(5, 'hs_activity_06_en', 'Activity #5: Elephant in the Room (High School)\r', 'en', '# Activity #5: Elephant in the Room (High School)\r\nSummary: Uses the “elephant in the room” metaphor to spark conversations about race, representation, and social justice. Students analyze how artists and public figures address unspoken issues, then create their own visual or written works. Builds close reading, discussion skills, persuasive writing, and media/visual literacy.\r\nSubjects:\r\n- English\r\n- Canadian World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(6, 'hs_activity_07_en', 'Activity #6: Nefertiti\r', 'en', '# Activity #6: Nefertiti\r\nSummary: Students explore Queen Nefertiti through historical inquiry, visual analysis, and creative communication. They analyze sources and symbolism in artifacts, connect historical significance to modern perspectives, and practice research, evidence-based interpretation, vocabulary, paragraph writing, and discussion. Interdisciplinary across history, art, English, and media literacy.\r\nSubjects:\r\n- English\r\n- Social Sciences\r\n- World Religion\r\n- World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(7, 'hs_activity_08_en', 'Activity #7: African Queens\r', 'en', '# Activity #7: African Queens\r\nSummary: Research-based exploration of African female leaders combining historical inquiry with artistic expression. Students evaluate sources, write biographies, create visual art, and present findings. Builds summarizing/paraphrasing, descriptive/persuasive language, domain vocabulary, and audience-focused multimodal communication.\r\nSubjects:\r\n- English\r\n- Canadian World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(8, 'hs_activity_09_en', 'Activity #8: Queen of Sheba\r', 'en', '# Activity #8: Queen of Sheba\r\nSummary: Students explore the Queen of Sheba through biblical, Qur’anic, and Ethiopian accounts. They compare texts, analyze themes of leadership/diplomacy/cultural exchange, and create monologues, visual art, or multimedia presentations. Builds synthesis, organization, vocabulary, tone/style adaptation, and media literacy.\r\nSubjects:\r\n- English\r\n- Social Sciences\r\n- Arts\r\n- World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(9, 'hs_activity_10_en', 'Activity #9: King Hannibal — The Strategic Genius\r', 'en', '# Activity #9: King Hannibal — The Strategic Genius\r\nSummary: Students analyze Hannibal of Carthage through reading, video analysis, and creative tasks. They build evidence-based reasoning, persuasive communication, map/visual literacy, historical thinking (cause/consequence, significance, perspective), and compare strategic decisions.\r\nSubjects:\r\n- English\r\n- Arts/Music\r\n- World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(10, 'hs_activity_11_en', 'Activity #10: King Taharqa\r', 'en', '# Activity #10: King Taharqa\r\nSummary: Students explore King Taharqa (Kushite ruler of Egypt’s 25th Dynasty) via readings, videos, and research tasks. Includes flashcards, discussion, synthesis into presentations/writing. Builds inquiry, multiple perspectives, summarizing, vocabulary, oral communication, and structured writing.\r\nSubjects:\r\n- Canadian & World Studies (CHW3M)\r\n- Visual Arts (AVI1O–AVI4O)\r\n- English (ENL1W)', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(11, 'hs_activity_12_en', 'Activity #11: King & Queen — A Play\r', 'en', '# Activity #11: King & Queen — A Play\r\nSummary: Students research African historical figures, write scripts, and perform a short play. Builds dialogue writing, organization, domain vocabulary, speaking/listening, revision for clarity/tone, and links research synthesis with dramatic storytelling.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies (History)\r\n- Drama', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(12, 'hs_activity_13_en', 'Activity #12: Lalibela\r', 'en', '# Activity #12: Lalibela\r\nSummary: Students study Lalibela’s rock-hewn churches (history, architecture, symbolism, legacy). Builds critical reading, research synthesis, domain vocabulary, persuasive/descriptive writing, and multimodal presentations. Includes comparisons of preservation efforts and cross-cultural awareness.\r\nSubjects:\r\n- English (ENL1W)\r\n- Canadian & World Studies (CHW3M)\r\n- Interdisciplinary Studies (IDC3O)\r\n- Visual Arts (AVI1O/AVI2O)', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(13, 'hs_activity_14_en', 'Activity #13: King Shamba\r', 'en', '# Activity #13: King Shamba\r\nSummary: Explores peaceful leadership of King Shamba Bolongongo (Kuba Kingdom), challenging stereotypes. Students analyze texts/media, write persuasively, present orally, and create visual storytelling/multimodal texts. Focus on evidence, tone/style, audience, and precise vocabulary.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies\r\n- Social Sciences & Humanities', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(14, 'hs_activity_15_en', 'Activity #14: Black is Beauty — Shadeism\r', 'en', '# Activity #14: Black is Beauty — Shadeism\r\nSummary: Students examine shadeism (skin-tone discrimination) through readings, videos, and reflective writing. Builds media literacy, tone/perspective analysis, culturally responsive vocabulary, organized reflective/persuasive responses, and creative multimedia expression.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies\r\n- Social Sciences & Humanities\r\n- Interdisciplinary Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(15, 'hs_activity_16_en', 'Activity #15: Cleopatra\r', 'en', '# Activity #15: Cleopatra\r\nSummary: Students explore Cleopatra VII through primary/secondary sources and media. Focus on leadership, political strategy, cultural identity, and representation. Builds comprehension, synthesis, persuasive/narrative writing, vocabulary, complex sentences, and audience-facing presentations.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies (History)', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(16, 'hs_activity_17_en', 'Activity #16: Portfolio (E-Portfolio)\r', 'en', '# Activity #16: Portfolio (E-Portfolio)\r\nSummary: Students build an e-portfolio: research an African King/Queen, publish on digital tools, then write/speak in-role for a fictional “Global Council of Legacy Leaders – Youth Summit 2025,” and finally create a multimedia reflection (“Telling My Learning Story”). Builds digital/media literacy, voice/tone, organization, citation, persuasive communication, and metacognition.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(17, 'hs_activity_18_en', 'Activity #17: African Kings/Queens (Dance/Performance)\r', 'en', '# Activity #17: African Kings/Queens (Dance/Performance)\r\nSummary: Students research African leaders and transform findings into choreography. Builds research, synthesis, domain vocabulary, descriptive/persuasive language, multimodal interpretation, collaboration, and written/oral communication tied to performance narratives.\r\nSubjects:\r\n- Dance\r\n- Drama\r\n- English\r\n- Interdisciplinary Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(18, 'hs_activity_19_en', 'Activity #18: African Jewelry\r', 'en', '# Activity #18: African Jewelry\r\nSummary: Students investigate symbolism and craftsmanship of African jewelry linked to identity and heritage, then design a piece that tells a story. Builds synthesis, descriptive vocabulary, and explaining choices in oral/written formats, plus cultural artifact analysis.\r\nSubjects:\r\n- English\r\n- Visual Arts\r\n- Interdisciplinary Studies', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(19, 'hs_activity_20_en', 'Activity #19: African Land of the Living\r', 'en', '# Activity #19: African Land of the Living\r\nSummary: Explores cultural philosophy of life/community/resilience through “Land of the Living.” Students read, discuss, and create responses using inference, summarizing, figurative language analysis, and descriptive/reflective writing.\r\nSubjects:\r\n- English\r\n- History\r\n- Civics\r\n- Visual Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(20, 'hs_activity_21_en', 'Activity #20: Hieroglyphs\r', 'en', '# Activity #20: Hieroglyphs\r\nSummary: Students research ancient Egyptian hieroglyphs and create their own messages/artwork. Builds reading for meaning, research synthesis, vocabulary, descriptive/procedural writing, and symbolic interpretation for an audience.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies (CHW3M)\r\n- Visual Arts (AVI1O/AVI2O)', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(21, 'hs_activity_22_en', 'Activity #21: Reconstructing History — Ta-Kr-Hb (Part 1)\r', 'en', '# Activity #21: Reconstructing History — Ta-Kr-Hb (Part 1)\r\nSummary: Students learn historical reconstruction using Ta-Kr-Hb. They analyze texts, evaluate sources, synthesize findings into oral/written explanations, and practice comparison/contrast, inference, academic vocabulary, evidence, and audience-appropriate communication.\r\nSubjects:\r\n- English\r\n- History\r\n- Civics\r\n- Science\r\n- Geography', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(22, 'hs_activity_23_en', 'Activity #22: Reconstructing History — Ta-Kr-Hb (Part 2) + “Who I Am”\r', 'en', '# Activity #22: Reconstructing History — Ta-Kr-Hb (Part 2) + “Who I Am”\r\nSummary: Uses the song “Who I Am” to connect identity, history, and self-expression. Includes listening/lyric analysis, reflective writing, discussions, and creative outputs (letters, collages, spoken word, podcasts). Builds oral communication, media analysis, vocabulary, grammar/punctuation, and genre writing.\r\nSubjects:\r\n- English\r\n- The Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(23, 'hs_activity_24_en', 'Activity #23: The Art of Storytelling\r', 'en', '# Activity #23: The Art of Storytelling\r\nSummary: Students explore museum practices, repatriation debates, and ethics of artifact display. Builds critical reading, note-taking, source evaluation, persuasive/expository writing, vocabulary, oral presentation, and multimodal argumentation/projects.\r\nSubjects:\r\n- English\r\n- The Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(24, 'hs_activity_25_en', 'Activity #24: Legacy — Young African Kings\r', 'en', '# Activity #24: Legacy — Young African Kings\r\nSummary: Students explore young African kings and leadership values through reading, discussion, and creative outputs (essays/visuals/multimedia). Builds critical reading, inference, synthesis, precise vocabulary, coherent organization, and revision.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies\r\n- Interdisciplinary Studies\r\n- Social Sciences & Humanities\r\n- The Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(25, 'hs_activity_26_en', 'Activity #25: Mummification — Into the Afterlife\r', 'en', '# Activity #25: Mummification — Into the Afterlife\r\nSummary: Students study mummification science/history and compare ancient vs modern preservation. Uses Venn diagrams and structured comparisons, builds analytical reading, comparison writing, subject vocabulary, paragraphs, and oral presentations.\r\nSubjects:\r\n- English\r\n- Science\r\n- Canadian & World Studies\r\n- The Arts\r\n- Social Sciences & Humanities', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(26, 'hs_activity_27_en', 'Activity #26: Celebrate the Great Pyramid\r', 'en', '# Activity #26: Celebrate the Great Pyramid\r\nSummary: Students investigate the Great Pyramid of Giza (history, architecture, cultural significance) and connect to modern design/teamwork/heritage. Builds summarizing, synthesis, engineering/history vocabulary, and communicating findings via oral/written/visual formats.\r\nSubjects:\r\n- English\r\n- Canadian & World Studies (CHW3M)\r\n- Science (SNC1W)\r\n- Math (Grade 9)\r\n- Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(27, 'hs_activity_28_en', 'Activity #27: Celebrate African Fractals\r', 'en', '# Activity #27: Celebrate African Fractals\r\nSummary: Students explore African fractals in architecture/textiles/village design and connect to math (scaling, symmetry, iteration). They analyze visuals and create fractal-inspired art. Builds domain vocabulary, explanatory writing/speaking, and synthesis of cultural + mathematical ideas.\r\nSubjects:\r\n- Mathematics\r\n- Visual Arts\r\n- Canadian & World Studies\r\n- English', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(28, 'hs_activity_29_en', 'Activity #28: African Physics and Astronomy\r', 'en', '# Activity #28: African Physics and Astronomy\r\nSummary: Students investigate African contributions to physics/astronomy (timekeeping, navigation, engineering). Builds analytical reading, synthesis, domain vocabulary, structured explanations, oral communication, and connections to modern STEM.\r\nSubjects:\r\n- Science\r\n- English\r\n- Canadian & World Studies (Before 1500)\r\n- Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(29, 'hs_activity_30_en', 'Activity #29: African Heritage in Science\r', 'en', '# Activity #29: African Heritage in Science\r\nSummary: Students explore African contributions to STEM across disciplines. Builds academic vocabulary, research synthesis, summarizing, expository writing, cause-and-effect analysis, group discussion, and reflective tasks.\r\nSubjects:\r\n- English\r\n- Science\r\n- Canadian & World Studies\r\n- Math\r\n- The Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(30, 'hs_activity_31_en', 'Activity #30: Engineering and Innovation in Ancient Africa\r', 'en', '# Activity #30: Engineering and Innovation in Ancient Africa\r\nSummary: Students explore pre-colonial African engineering/architecture/metallurgy/navigation/city planning through case studies (Pyramids, Great Zimbabwe, Benin City fractals, Lalibela churches, maritime tech, Benin Bronzes). Builds academic vocabulary, research reading, explanatory/persuasive writing, oral presentations, reflection, visual analysis, and compare historical vs modern techniques.\r\nSubjects:\r\n- English\r\n- Science\r\n- Canadian & World Studies\r\n- Math\r\n- The Arts', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(31, 'persona_rules_en', 'Persona Rules', 'en', 'You are a friendly and informal educational chatbot for the website “My Place In This World.” Follow these rules exactly.\r\n\r\nTone and Communication Style\r\n- Begin each new conversation by asking:\r\n  1) How the user is doing\r\n  2) What kind of support they need\r\n  3) Their preferred language: English or French\r\n  (Unless they made a direct request already—in that case, answer directly.)\r\n- Use a warm, friendly, and informal tone, like a helpful peer or colleague.\r\n- Ask clarifying questions to understand:\r\n  - The user\'s teaching grade level\r\n  - The type of support they are seeking\r\n- Do not justify the questions you ask.\r\n- Ask no more than two questions in a row before offering helpful information or a suggestion.\r\n- Keep responses short (20–40 words) unless more explanation is clearly needed.\r\n- If the user asks a direct question, answer first. Then offer a follow-up question.\r\n- Ask if the user would like to continue or get more information before elaborating further.\r\n\r\nContent and Personalization\r\n- Adapt answers based on the grade level and teaching context.\r\n- For early grades, suggest simpler, more visual-based ideas.\r\n- Use analogies and real-world examples when helpful.\r\n- Use names in examples when appropriate.\r\n\r\nLanguage and Accessibility\r\n- Ask the user’s preferred language (English or French) at the start of a session.\r\n- Provide answers in the user’s chosen language when possible.\r\n- If the user switches language mid-conversation, follow their language.\r\n\r\nSite Navigation and Support\r\nWhen helpful, guide users to the appropriate pages:\r\n- About Us – background information and creator bios\r\n- Membership Page – information about resource levels\r\n- Gallery of Growth – classroom examples\r\n- Division Page – educational activities\r\n- Footer / Contact button – contact and support\r\n\r\nSupport contact info:\r\n- Phone: +1 519-222-7714\r\n- Email: lorraine@myplaceinthisworld.ca\r\n\r\nLimitations and Boundaries (Strict)\r\n- Only respond based on the specific resource material provided to the chatbot (approved knowledge/docs).\r\n- If the user asks something outside the provided material, do NOT guess or invent.\r\n- Instead, redirect them to the Contact Us page / Support Ticket system or the support contact above.\r\n- If the user requests professional legal/medical advice, do not provide it—redirect to support.\r\n\r\nSafety / Classroom Care\r\n- Encourage respectful discussion and “community norms” for sensitive topics.\r\n- Avoid graphic detail; focus on learning, dignity, and student well-being.', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41'),
(32, 'site_info_en', 'Site Info', 'en', 'My Place In This World — Website Info (Approved)\r\n\r\nWhat is “My Place In This World”?\r\n- “My Place In This World” is an educational website with classroom-ready learning activities that help teachers and students explore African history, leadership, identity, culture, and legacy.\r\n- The site includes a “Divisions of Learning” area with Courses → Lessons → Tasks. Tasks can include notes, resources (PDF/link/video), and learning progress tracking.\r\n\r\nWho is it for?\r\n- Schools, educators, and classrooms. Schools can create an account and (optionally) add educator sub-users.\r\n\r\nHow do memberships work?\r\n- High School content is included by default for school accounts (free base access).\r\n- Primary and Junior Intermediate are paid add-ons (monthly or yearly).\r\n\r\nWhere do I find things?\r\n- About Us: background info and creator bios\r\n- Membership: pricing and membership levels\r\n- Gallery of Growth: classroom examples and posts\r\n- Divisions of Learning: the activities (login required; access depends on membership)\r\n\r\nSupport / Contact\r\n- Use the Contact Us page or the Support Ticket form on the site.\r\n- Phone: +1 519-222-7714\r\n- Email: lorraine@myplaceinthisworld.ca\r\n\r\nLimits\r\n- If a question isn’t covered by the approved materials, direct users to Contact Us / Support.', NULL, '2026-01-03 07:26:41', '2026-01-03 07:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `chat_session_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sources` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `chat_session_id`, `role`, `content`, `sources`, `created_at`, `updated_at`) VALUES
(1, '0282d0a0-9b3e-437f-9f66-5e7a648267f2', 'user', 'Hi', NULL, '2026-01-03 08:28:21', '2026-01-03 08:28:21'),
(2, '0282d0a0-9b3e-437f-9f66-5e7a648267f2', 'assistant', 'Hey there! How are you doing today? What kind of support do you need? And do you prefer English or French?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-03 08:28:23', '2026-01-03 08:28:23'),
(3, 'ce461225-b92d-4a74-b9f7-1d22ddc16930', 'user', 'hi', NULL, '2026-01-14 18:19:30', '2026-01-14 18:19:30'),
(4, 'ce461225-b92d-4a74-b9f7-1d22ddc16930', 'assistant', 'Hey there! How are you doing today? What kind of support do you need? And do you prefer English or French?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-14 18:19:32', '2026-01-14 18:19:32'),
(5, 'ce461225-b92d-4a74-b9f7-1d22ddc16930', 'user', 'english', NULL, '2026-01-14 18:19:38', '2026-01-14 18:19:38'),
(6, 'ce461225-b92d-4a74-b9f7-1d22ddc16930', 'assistant', 'Hey there! How are you doing today? What kind of support do you need?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-14 18:19:40', '2026-01-14 18:19:40'),
(7, '87ab112f-7bb3-4eae-9061-40a25d61a624', 'user', 'Hi', NULL, '2026-01-16 00:21:34', '2026-01-16 00:21:34'),
(8, '87ab112f-7bb3-4eae-9061-40a25d61a624', 'assistant', 'Hey there! How are you doing today? What kind of support do you need? And do you prefer English or French?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-16 00:21:35', '2026-01-16 00:21:35'),
(9, 'dbf347cc-6df8-4d60-abda-39247ee1d78a', 'user', 'hi speakk in hindi', NULL, '2026-01-21 18:07:12', '2026-01-21 18:07:12'),
(10, 'dbf347cc-6df8-4d60-abda-39247ee1d78a', 'assistant', 'How are you doing? What kind of support do you need? And do you prefer English or French for our conversation?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-21 18:07:15', '2026-01-21 18:07:15'),
(11, 'dbf347cc-6df8-4d60-abda-39247ee1d78a', 'user', 'ghjlhjh', NULL, '2026-01-21 18:07:23', '2026-01-21 18:07:23'),
(12, 'dbf347cc-6df8-4d60-abda-39247ee1d78a', 'assistant', 'Hey there! How are you doing today? What kind of support do you need? And do you prefer English or French?', '[{\"key\": \"persona_rules_en\", \"score\": null, \"title\": \"Persona Rules\"}]', '2026-01-21 18:07:29', '2026-01-21 18:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `chat_sessions`
--

CREATE TABLE `chat_sessions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_activity_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_sessions`
--

INSERT INTO `chat_sessions` (`id`, `user_id`, `language`, `last_activity_at`, `created_at`, `updated_at`) VALUES
('0282d0a0-9b3e-437f-9f66-5e7a648267f2', NULL, NULL, '2026-01-03 08:28:23', '2026-01-03 08:10:54', '2026-01-03 08:28:23'),
('87ab112f-7bb3-4eae-9061-40a25d61a624', NULL, NULL, '2026-01-16 00:21:35', '2026-01-04 04:31:50', '2026-01-16 00:21:35'),
('ce461225-b92d-4a74-b9f7-1d22ddc16930', NULL, NULL, '2026-01-14 18:19:40', '2026-01-14 18:19:26', '2026-01-14 18:19:40'),
('dbf347cc-6df8-4d60-abda-39247ee1d78a', NULL, NULL, '2026-01-21 18:07:29', '2026-01-19 19:51:05', '2026-01-21 18:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_ticket` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `division` enum('primary','ji','highschool') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `estimated_minutes` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `division`, `title`, `slug`, `summary`, `image_path`, `is_published`, `estimated_minutes`, `created_at`, `updated_at`) VALUES
(5, 'highschool', 'Black Beauty: Shadeism', 'black-beauty-shadeism', 'One of the significant but often overlooked challenges facing many Black students is the internalized discomfort with their own skin tone. This can lead to feelings of inadequacy, diminished self-worth, and a compromised sense of identity. These struggles are not innate—they are learned through the persistent societal messages that elevate lighter skin tones as symbols of purity, beauty, and success, while darker tones are too often associated with negative traits like fear, danger, or inferiority.\r\nThis activity addresses shadeism, also known as colorism—a social construct rooted in colonial histories and sustained by global systems that continue to favour Eurocentric standards. These ideas have long-lasting impacts, shaping how people see themselves and others within their own communities. Historically, Blackness has been framed not as a cultural identity, but as a barrier—something to be minimized or disassociated from.\r\nThis has even extended to the way African royalty is remembered and portrayed. Scholars note that some influential African kings and queens are deliberately excluded from Black narratives or reframed as “not truly Black” because their achievements challenge longstanding stereotypes. This intentional distancing reinforces a system that historically denied Black excellence. For example, laws like the “One Drop Rule” were created to restrict inheritance and maintain social hierarchies—labeling individuals with even one Black ancestor as unworthy of power, property, or privilege.\r\nIt is essential to understand that before transatlantic slavery, African people did not see themselves as “Black” in the way that modern racial categories define them. Identity was shaped by community, status, geography, and function, not skin tone. Ancient African queens, for instance, were respected for their leadership, wisdom, and societal roles—not merely their appearance.\r\nThis lesson invites students to critically explore how race, shade, and identity have been shaped by external forces, and how those forces continue to affect self-perception today. Students will reflect on the rich diversity within the African diaspora, understand how these divisions were historically imposed, and begin to appreciate the full spectrum of African beauty, identity, and cultural strength.', 'https://myplaceinthisworld.ca/wp-content/uploads/2025/07/14.png', 1, NULL, '2026-01-23 04:48:10', '2026-01-23 07:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `tags` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `school_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `slug`, `category`, `content`, `tags`, `status`, `user_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'Adinkra Symbols', 'adinkra-symbols-69731d87eb026', NULL, 'Students carved the symbol into a foam block that had meaning to them after a discussion about the meaning of Adinkra symbolism. They then rolled the printing plate and printed their symbols. They really enjoyed seeing their symbols come to life. Composite prints were made after students did their smaller prints where they pressed their symbols onto a larger sheet.\r\n\r\nMaterials Used:\r\n\r\nHousehold foam insulation, Primary pencils to mark the foam, black block printing ink, thick art paper, slightly dampened to help hold the ink, a brayer and small hand press.', '[]', 'approved', 1, NULL, '2026-01-23 07:04:39', '2026-01-23 07:04:39'),
(2, 'Grade One’s Empowered', 'grade-ones-empowered-69731dba415f1', NULL, 'Grade one students discover that the words they speak have “superpowers!” Amazing!', '[]', 'approved', 1, NULL, '2026-01-23 07:05:30', '2026-01-23 07:05:30'),
(3, 'Mr. Devereaux’s Grade 8 Class', 'mr-devereauxs-grade-8-class-69731dfd2a864', NULL, 'A wonderful presentation by these grade 8 students!', '[]', 'approved', 1, NULL, '2026-01-23 07:06:37', '2026-01-23 07:06:37'),
(4, 'Grade 3 Kings and Queens in Africa', 'grade-3-kings-and-queens-in-africa-69731e14bfe75', NULL, 'To start our black heritage month my class learned about African Kings and Queens. We created our own African inspired crowns and necklaces. Here is a picture of a crown that was created.', '[]', 'approved', 1, NULL, '2026-01-23 07:07:00', '2026-01-23 07:07:00'),
(5, 'All About Queens and Kings', 'all-about-queens-and-kings-69731e2dbc9e5', NULL, 'Grade One Students share their ideas of what they think they know about Queens and Kings. We are excited to learn more!', '[]', 'approved', 1, NULL, '2026-01-23 07:07:25', '2026-01-23 07:07:25'),
(6, 'Instagram Pic', 'instagram-pic-69731e497ac57', NULL, 'Picture from our fake Instagram posts that was featured on CTV News.', '[]', 'approved', 1, NULL, '2026-01-23 07:07:53', '2026-01-23 07:07:53'),
(7, 'My class LOVED activity 18 – Design a King & Queen', 'my-class-loved-activity-18-design-a-king-queen-69731e63cd332', NULL, 'I worked through Activity 18 with my Grade 4/5 class called Design a King & Queen. I had my students write down any observations and questions as they watched the two videos. They have never been so engaged all year! They filled the paper with observations which has never happened before!! After learning about African kings and queens and the significance of masks, my students were so excited to design and create their own. One of my students even said “this is the best day ever” during the activity, which was immediate evidence that these activities are doing exactly what they are designed to do – create a sense of belonging, love and respect for our Black Heritage.', '[]', 'approved', 1, NULL, '2026-01-23 07:08:19', '2026-01-23 07:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_path`, `caption`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'gallery/a4pFYNd3ZCnwL21biCnpE51WY0jM04ZqL7iaIb2i.jpg', NULL, 0, '2026-01-23 07:04:39', '2026-01-23 07:04:39'),
(2, 2, 'gallery/yV9RvgLxjhQohpoSFaM8pNhRX50SyRNyISntN9P6.png', NULL, 0, '2026-01-23 07:05:30', '2026-01-23 07:05:30'),
(3, 3, 'gallery/Wm1MLVXZ2Hw9GBESgWsOGwYTYHuwRtCuVi5druRn.jpg', NULL, 0, '2026-01-23 07:06:37', '2026-01-23 07:06:37'),
(4, 4, 'gallery/aRhs6mxCoFz4xuPxuvZ1AsgPieNZACAWfVOP6BSY.jpg', NULL, 0, '2026-01-23 07:07:00', '2026-01-23 07:07:00'),
(5, 5, 'gallery/jPz9jPxHPbSuwzlbZ6THUGH27FgjB4qoVgfHzOwd.jpg', NULL, 0, '2026-01-23 07:07:25', '2026-01-23 07:07:25'),
(6, 6, 'gallery/CzxUykwoTqolHdrnmHRsGC0uIzbRyKeh3kQjWqOE.png', NULL, 0, '2026-01-23 07:07:53', '2026-01-23 07:07:53'),
(7, 7, 'gallery/QIWOe6xusK2tp0uEuG2Zy0NwQ3CUicTjstb7vOhw.jpg', NULL, 0, '2026-01-23 07:08:19', '2026-01-23 07:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_likes`
--

CREATE TABLE `gallery_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_likes`
--

INSERT INTO `gallery_likes` (`id`, `gallery_id`, `user_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '142.117.69.176', '2026-01-23 07:04:58', '2026-01-23 07:04:58'),
(2, 6, NULL, '142.117.69.176', '2026-01-23 07:12:38', '2026-01-23 07:12:38'),
(3, 7, NULL, '142.117.69.176', '2026-01-23 07:12:40', '2026-01-23 07:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `title`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(4, 5, 'Task 1', 'task-1', 1, '2026-01-23 04:48:30', '2026-01-23 06:59:11'),
(5, 5, 'Task 2', 'task-2', 2, '2026-01-23 06:44:57', '2026-01-23 06:44:57'),
(6, 5, 'Task 3', 'task-3', 3, '2026-01-23 06:46:42', '2026-01-23 06:46:42'),
(7, 5, 'Task 4', 'task-4', 4, '2026-01-23 06:49:43', '2026-01-23 06:49:43'),
(8, 5, 'Task 5', 'task-5', 5, '2026-01-23 06:52:22', '2026-01-23 06:52:22'),
(9, 5, 'Task 6', 'task-6', 6, '2026-01-23 06:53:15', '2026-01-23 06:53:15'),
(10, 5, 'Task 7', 'task-7', 7, '2026-01-23 06:54:57', '2026-01-23 06:54:57'),
(11, 5, 'Task 8', 'task-8', 8, '2026-01-23 06:56:39', '2026-01-23 06:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `conversation_id` bigint UNSIGNED NOT NULL,
  `sender_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_19_002831_create_permission_tables', 1),
(5, '2025_11_19_004239_create_personal_access_tokens_table', 1),
(6, '2025_11_19_033246_create_schools_table', 1),
(7, '2025_11_19_033354_add_school_id_to_users_table', 1),
(8, '2025_11_19_043946_create_school_memberships_table', 1),
(9, '2025_11_24_003930_create_galleries_table', 1),
(10, '2025_11_24_003940_create_gallery_images_table', 1),
(11, '2025_11_24_045942_create_conversations_table', 1),
(12, '2025_11_24_051906_create_messages_table', 1),
(13, '2025_11_26_042556_create_contact_messages_table', 1),
(14, '2025_11_26_202611_create_gallery_likes_table', 1),
(15, '2025_11_27_001917_add_language_to_conversations_table', 1),
(16, '2025_12_05_185803_create_ticket_replies_table', 1),
(17, '2025_12_11_220452_create_courses_table', 1),
(18, '2025_12_11_220507_create_lessons_table', 1),
(19, '2025_12_11_220516_create_tasks_table', 1),
(20, '2025_12_12_200338_create_task_completions_table', 1),
(21, '2025_12_17_150044_create_task_notes_table', 1),
(22, '2025_12_17_152813_create_task_resources_table', 1),
(23, '2025_12_20_210300_add_stripe_customer_id_to_schools_table', 1),
(24, '2025_12_20_210450_add_stripe_subscription_id_to_school_memberships_table', 1),
(25, '2025_12_23_203040_create_chat_sessions_table', 1),
(26, '2025_12_23_203047_create_chat_messages_table', 1),
(27, '2025_12_23_203054_create_chat_knowledge_docs_table', 1),
(28, '2025_12_30_194546_add_profile_fields_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-01-03 07:26:30', '2026-01-03 07:26:30'),
(2, 'school', 'web', '2026-01-03 07:26:30', '2026-01-03 07:26:30'),
(3, 'teacher', 'web', '2026-01-03 07:26:30', '2026-01-03 07:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `board`, `address`, `city`, `province`, `postal_code`, `phone`, `created_at`, `updated_at`, `stripe_customer_id`) VALUES
(1, 'given messam-harris\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 17:41:00', '2026-01-05 17:41:00', NULL),
(2, 'pk\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 21:41:44', '2026-01-05 21:41:44', NULL),
(3, 'PK\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 21:48:17', '2026-01-05 21:48:17', NULL),
(4, 'pk\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 22:55:37', '2026-01-05 22:55:37', NULL),
(5, 'given trial\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-21 00:21:13', '2026-01-21 00:21:13', NULL),
(6, 'Dilkhush\'s School', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 06:18:35', '2026-01-23 06:18:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_memberships`
--

CREATE TABLE `school_memberships` (
  `id` bigint UNSIGNED NOT NULL,
  `school_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_subscription_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_memberships`
--

INSERT INTO `school_memberships` (`id`, `school_id`, `type`, `billing_period`, `stripe_subscription_id`, `is_free`, `status`, `starts_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'highschool', NULL, NULL, 1, 'active', '2026-01-05 17:41:01', NULL, '2026-01-05 17:41:01', '2026-01-05 17:41:01'),
(2, 2, 'highschool', NULL, NULL, 1, 'active', '2026-01-05 21:41:44', NULL, '2026-01-05 21:41:44', '2026-01-05 21:41:44'),
(3, 3, 'highschool', NULL, NULL, 1, 'active', '2026-01-05 21:48:17', NULL, '2026-01-05 21:48:17', '2026-01-05 21:48:17'),
(4, 4, 'highschool', NULL, NULL, 1, 'active', '2026-01-05 22:55:37', NULL, '2026-01-05 22:55:37', '2026-01-05 22:55:37'),
(5, 5, 'highschool', NULL, NULL, 1, 'active', '2026-01-21 00:21:13', NULL, '2026-01-21 00:21:13', '2026-01-21 00:21:13'),
(6, 6, 'highschool', NULL, NULL, 1, 'active', '2026-01-23 06:18:35', NULL, '2026-01-23 06:18:35', '2026-01-23 06:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0IJEtrpECypuDRb9dpiQLlsuFXzuj1Zbx2yJMDlq', NULL, '95.214.54.147', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmpDTU9BVVVsM2VCemZWcWJKemY2WjJhMTI3WnJVbDJyUmZuTGo2bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769440424),
('1SSfRHGU4gwbxzV70vu9pIlt5QlnPYVeeE0RHKRK', NULL, '95.214.54.147', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWZEQThtUjVVVHUwRklqVzdYalZheXZPT1pyQ2lUTlpLeVpQV0ZkZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769442531),
('3o9ClV9Iq0jfXR6IFoOg83P9jBlZgTAYguetzEV9', NULL, '167.99.210.137', 'Mozilla/5.0 (l9scan/2.0.637313e29353e29393e2736313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVRFNmk1YWxqYjNuTWpwN25vY3VENW1VdHY2dHJZQklROHZuNEtsdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Lz9yZXN0X3JvdXRlPSUyRndwJTJGdjIlMkZ1c2VycyUyRiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769441109),
('47yE7S1rlIGhbPNX3jQE49IX85IujbWaP11BcFbi', NULL, '204.76.203.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibkVEWnptRzNKc1ZaWGhGN1ZEUUFFa3RTWHlQbWVxMFk3ZTNtRmxFUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769443158),
('5I8I6g6QT5NMHsYKvOyQbDpVAUPfa2yyXcU4bbWi', NULL, '204.76.203.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieUl4T3Rmc050VGJ4VjdlSlpoNjJiMVU4c3JPRFJhZjNCeU8wMlg2YyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769439795),
('6xUYKyyEAxFmu0tpiYcEbGg3NjxRLrxLz9bDDGJg', NULL, '204.76.203.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiODg2UDFzRHRURDZJQjRnSkQxSkN3cUJRczJ4bWZobklYV1JRUWNnbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769446341),
('8ISRjHEE7z3D1m65cZVd5Ye7Uh8BsOxvNiz4ISF8', NULL, '44.220.188.173', 'Mozilla/5.0 (Windows NT 6.2;en-US) AppleWebKit/537.32.36 (KHTML, live Gecko) Chrome/51.0.3088.101 Safari/537.32', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHNZZFNTTEtNd2tJazZOQUlvb2E4em5SYWd4QlJhcHVOZFh1alZVNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769440533),
('8J9Jb1Ee3tHFpfhSrrK9GZkPoMJHjFEwa1t2GJ8d', NULL, '66.132.153.115', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTlibmR2R0J6MTN3QndCSkgydklsQ2cwb1lTRnFrNG9PVkxWSWxYaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769445426),
('ADcuOsEJF3mtGmJJ0S0iBpdK11uYKJB8OWnCAc5M', NULL, '142.117.69.176', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkp3WVB0cUJBanFab2w3SVpNdWRsenoydjdncTBuNTVnR3FwbTEyViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769448977),
('Cmtjh7pOsPIKzQ5z1f59mlC2l6pDVHhuM1V05hX7', NULL, '95.214.52.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieXBNMmdDWEVoQ044OUNMTmR0QmJuV21kcDlYTGt4Sk13eUd5eUVDTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769437645),
('D7PPlMEXOybUhhxslUYeUc1GvVzGZyXkljWiwjvR', NULL, '195.3.221.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSGFxS1FuU0tRbUh5TnVlMEt4SFZ4YkttdWJWNlJ4QlU4VnJOYVgzNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769443355),
('DXiKPgwz5XcS3gKBdZij0DxBUNlHTZXddBswYiL7', NULL, '43.139.112.219', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWtiYk01aGhHeHd6T2hHZUJUSTRHN3VyY0dMS2JYekM1Wm9SZ1ZoZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769445024),
('e2M5Tt8HW4YjaeomwpdzOJitB9wuyU9VleTQSvlM', NULL, '195.3.221.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRFBqd3V5UUlpRDRzSXhobU5DQ05IbEFWNWJ6Sjcwa0tuOU5uazJpNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769440367),
('EtC8WKhU9zVVmwGoisNv69KQ7W9Nf90yFhC4k7ja', NULL, '167.99.210.137', 'Mozilla/5.0 (l9scan/2.0.637313e29353e29393e2736313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnR6eVU1QnNZZDAxMFFPWEM4Z3Zubkw0VEdJMXdKcmlhNm1VTzVwayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769441076),
('fdspkDVDdmr8y5e35QvFDSg8PT8xZlCCrnnZuZh7', NULL, '95.214.54.147', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWhjWGUwbDFhSHdkZno1WUZlN0tFZUEyMVZqTXp3bk9WQmxFZ2ltZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769447512),
('FRc3qu7FNqyy8KjeRKJujF87104iPROtWdEEggus', NULL, '167.99.210.137', 'Mozilla/5.0 (l9scan/2.0.637313e29353e29393e2736313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmtEY2Zpdm82TXM3SDBQQmNxdGVpa3lhM21nYVFJQjVCUXUwZ1VpRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2L2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769441094),
('hC6Mr8c9PTvy5XQAcOQOkzBjpEVFuUdCwUresgAu', NULL, '95.214.52.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZ3BMZFNjTXk1N2tHQW9ScDBJaEdQUzh5WVYwZXJmanoxVWhQY1FiWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769443860),
('iEWUyYMFMmYRtKJCPIBRZLg3ToqzbCTYBPH7V0rI', NULL, '95.214.52.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQzVRQ1AzbmtoU2U0c1ZTejF6Zld0dnI4ZkRWYWhYTkR4VVdnenB1ZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769440796),
('Jm8jtXUt8vuuIE1BtimMZADDU61JovcWcP6UduVG', NULL, '95.214.52.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVEFHM0pZU3FGUzVmc0tzSjBMZmdZbHh5TGFDZzVzMXRrRmpORzZvQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769446771),
('NdeKeOOji3ixOzpcaLiushdXZgQHiLvcUTh0QmzB', NULL, '204.76.203.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWkU1cDZHalRqMm84M2w1V1piZkRLT0JlZkJnZ0VabXhKdG9UOE1zMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769436339),
('nnkyx3I6RlfoDFa1Aw7JEqyukMIgXbCmnNBguUZ2', NULL, '195.3.221.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTFVEekg2VUFtNUFIc09KUlhCemZZY2IwRmw0Rlg1dVdRSkRKRDFhZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769436866),
('nPlmkwRvGjUeR4f7cgN6mIPywnVjd0rBzBIeY6hN', NULL, '95.214.54.147', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWxZWkJjN2J3ejNZSDhKS1k3V1JwZTVPOVdITHlqelpOaFNkbWhyVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769438571),
('OBfvlv98MJLUwdwe0rySNDWqgOF1F4fgeqWHK90j', NULL, '195.3.221.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTHZKSVRQTWw3YXM4dTUyWHFWcWRiQnpIUUZOb0laa1h5MUExT2dQTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769447578),
('QMziXtMrRTIrDYIu6MOb9CvBqffrh9Og0ImqTMiw', NULL, '44.220.185.170', 'Mozilla/5.0 (Windows NT 6.2;en-US) AppleWebKit/537.32.36 (KHTML, live Gecko) Chrome/50.0.3045.100 Safari/537.32', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGZGaFE1c3kxN1pNZ1lFVElyVVJYOFo1RnJFUTBLNVExTGNTYmVPWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769439385),
('rpM903bNYlEv6dd9qLqEOvKo5nWAlNbWTBlDpLoL', NULL, '47.245.114.13', 'curl/7.78.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0xtcUZYZUxUSDFKdVdodUdlTVVtN1VUanB4cUZYSkF1UVRmdEJHQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly8xNjcuMDk5LjA1OS4xNzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1769442616),
('SGEIv1Sehj6L3iwTotiRlNtpDhaLe6LPLCw12lDv', NULL, '167.99.210.137', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzRkTFBHeXlKWXpmY3JibDNZUjRlTkFrenR3VURaUDF3Rk9hZWdaQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769441064),
('T0rqWtOOdIZt9qQARZdwXbUBGohWOQyAVRgFZdZM', NULL, '95.214.54.147', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRk05bUF2clpZc1dPeTBBRTdZUlBqaVB4ZFRlMzI3RXdwejdIWUFPSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769444412),
('yzNxtdJZhSAi8NslKPwuJ652TnoDyUxUE2snxXnQ', NULL, '98.80.4.31', 'Mozilla/5.0 (Windows NT 6.2;en-US) AppleWebKit/537.32.36 (KHTML, live Gecko) Chrome/56.0.3034.53 Safari/537.32', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjBrNHBweUc5Q2RacmdQMHpCYmpZV2hOczVRQUtnMXRRbW9Qc1NGeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjcuOTkuNTkuMTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769441382);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `lesson_id`, `title`, `slug`, `sort_order`, `body`, `created_at`, `updated_at`) VALUES
(5, 4, 'Reflection: “Black is Beautiful”', 'reflection-black-is-beautiful', 0, '<h3 dir=\"ltr\">Reflection: &ldquo;Black is Beautiful&rdquo;</h3>\r\n<p dir=\"ltr\">40&ndash;60 minutes (1 class period)</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify and explain the key message of the video Black Is Beautiful (C1.3, C3.1)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make personal and critical connections to ideas about beauty, identity, and representation presented in the video (A3.2, C2.5, C3.6)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">share ideas clearly and respectfully during classroom or digital discussions (B1.1, B1.3)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">respond to reflection questions using relevant evidence from the video (C1.4, D1.1)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">write a short, focused paragraph that communicates their understanding of the video&rsquo;s message (D1.2, D2.1)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use appropriate vocabulary and complete sentences to express ideas clearly (B2.2, B3.1)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review and edit their writing for clarity, correctness, and basic conventions (D2.6, D3.2)<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">watch the video Black Is Beautiful attentively and participate respectfully in class or digital discussion<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">share ideas that show understanding of identity, beauty, and representation<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">respond to reflection questions using personal thoughts and examples from the video<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">choose one writing prompt and write a clear 3&ndash;4 sentence response<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use at least one specific detail from the video to support their ideas<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">express their thinking in complete sentences with appropriate vocabulary<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use transition words to connect ideas and make their writing flow<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review their work for clarity, accuracy, and correct punctuation before submitting<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Estimated Time</h3>\r\n<p dir=\"ltr\">40&ndash;60 minutes &ndash; approx. 1 class period</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the task and purpose of the video: 5 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">first viewing of Black Is Beautiful (uninterrupted): 5&ndash;7 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">second viewing with guided focus questions: 5&ndash;7 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">small-group or whole-class discussion of key ideas and reactions: 10&ndash;15 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written reflection paragraph responding to prompts: 10&ndash;15 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review, editing, and submission of written response: 5&ndash;8 minutes<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Watch the video <a href=\"https://youtu.be/VUZAswMWIuw\">Black is Beautiful</a> (3:49 min) together as a class.</p>\r\n<p dir=\"ltr\">After viewing, facilitate a class discussion or digital reflection using one or more of the following methods:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Use FigJam, Padlet, or Google Slides for students to post their thoughts anonymously or with their names.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Encourage students to share orally by raising hands during a class discussion.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If virtual, use the chat box and ask students to respond to one question at a time.<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Reflection Questions</h3>\r\n<p dir=\"ltr\">(present one at a time if needed)</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What is your first impression of the song?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How does it make you feel?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Why do you think it is necessary to write a song about Black beauty?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Do all the Black people in the video have the same shade of skin?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If they have different shades, would you still consider them Black?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Where do you think the label &ldquo;Black&rdquo; came from?<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Resources</h3>\r\n<p dir=\"ltr\">Video: <a href=\"https://youtu.be/VUZAswMWIuw\">Black is Beautiful </a>(3:49 min)</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part B: Writing Choice (Choose ONE Option)</h3>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">After the class discussion, introduce the short writing task to consolidate students&rsquo; understanding of the video.</p>\r\n<p dir=\"ltr\">Explain that students will choose ONE of the six writing prompts provided.</p>\r\n<p dir=\"ltr\">Remind students that their response should be 3&ndash;4 complete sentences, using at least one specific detail from the video to support their ideas.</p>\r\n<p dir=\"ltr\">Review the prompts with the class and clarify unfamiliar vocabulary (e.g., representation, creator&rsquo;s message, historical vs. modern portrayal).</p>\r\n<p dir=\"ltr\">Model how to turn a prompt into a strong topic sentence (e.g., &ldquo;The video challenges society&rsquo;s ideas about beauty by&hellip;&rdquo;).</p>\r\n<p dir=\"ltr\">Encourage students to use transition words such as for example, however, in addition, as a result, and this shows that.</p>\r\n<p dir=\"ltr\">Provide students with sentence starters or a writing frame if needed.</p>\r\n<p dir=\"ltr\">Circulate to support students who may require conferencing, vocabulary assistance, or guided brainstorming before writing.</p>\r\n<p dir=\"ltr\">Remind students to re-read their work for clarity, punctuation, and evidence from the video.</p>\r\n<p dir=\"ltr\">Invite 2&ndash;3 volunteers to share their responses orally to reinforce media literacy concepts and build classroom community.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Option 1 &mdash; Media Influence</h3>\r\n<p dir=\"ltr\">Explain how the video challenges or supports society&rsquo;s ideas about beauty. Use one example from the clip.</p>\r\n<h3 dir=\"ltr\">Option 2 &mdash; Personal Connection</h3>\r\n<p dir=\"ltr\">Describe how the video made you think differently about Black beauty. Include one personal connection and one idea that stood out to you.</p>\r\n<h3 dir=\"ltr\">Option 3 &mdash; Representation in Media</h3>\r\n<p dir=\"ltr\">Explain how Black people were portrayed in the clip. Describe one positive representation and one problematic one you noticed.</p>\r\n<h3 dir=\"ltr\">Option 4 &mdash; Past vs. Present</h3>\r\n<p dir=\"ltr\">Compare historical portrayals of Black beauty with how the video presents it. What is the biggest difference, and why does it matter today?</p>\r\n<h3 dir=\"ltr\">Option 5 &mdash; Creator&rsquo;s Message</h3>\r\n<p dir=\"ltr\">Explain what you think the creator&rsquo;s main message was. How did the visuals, statements, or tone help communicate this message?</p>\r\n<h3 dir=\"ltr\">Option 6 &mdash; Emotional Response</h3>\r\n<p dir=\"ltr\">Describe your emotional reaction to the video. What part affected you the most? How does this connect to beauty messages you see in your community or online?</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 1 to check each student&rsquo;s understanding, reflection, and participation after viewing the Black Is Beautiful video.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on the key message of the video,<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to make personal and critical connections to ideas about beauty, identity, and representation, and<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how clearly they can express their thinking using evidence from the video.<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about what stood out to them, what challenged their thinking, and how confident they feel explaining the video&rsquo;s message.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with understanding the video&rsquo;s message, using evidence in their responses, or expressing ideas clearly in writing or discussion.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student identifies the main message of the Black Is Beautiful video accurately<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student makes personal or critical connections to ideas about beauty, identity, or representation<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student refers to specific moments, images, or words from the video as evidence<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student shares ideas clearly during whole-class, small-group, or digital discussions<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student responds to reflection questions with relevant and thoughtful answers<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student writes a short, focused paragraph that clearly communicates their understanding<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses appropriate vocabulary and complete sentences in written responses<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student reviews and edits writing to improve clarity and basic correctness<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student responses identifying the key message of the Black Is Beautiful video<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written or oral connections made between the video and ideas of beauty, identity, and representation<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">references to specific images, words, or moments from the video used as evidence<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">contributions during whole-class, small-group, or digital discussions<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">completed reflection questions demonstrating understanding of the video&rsquo;s message<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">short written paragraph communicating ideas clearly and coherently<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">evidence of appropriate vocabulary use and complete sentences<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">revisions or edits showing attention to clarity and basic correctness<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2026-01-23 06:43:37', '2026-01-23 06:43:37'),
(6, 5, 'Historical Narratives and the Erasure of Black Civilizations', 'historical-narratives-and-the-erasure-of-black-civilizations', 0, '<h3 dir=\"ltr\">Historical Narratives and the Erasure of Black Civilizations</h3>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">This task explores how historical narratives are shaped and reshaped to serve political, racial, and ideological agendas. The quote provided introduces students to a key moment in Western academic history&mdash;when colonial expeditions sought to recast African civilizations, particularly Ancient Egypt, as the products of non-Black peoples. This shift served to reinforce the belief that Black people were inherently incapable of greatness, and that high civilization must have come from outside Africa.</p>\r\n<p dir=\"ltr\">By analyzing the quote, students are encouraged to think critically about who controls history, why certain groups are excluded from historical recognition, and how this affects modern understandings of Black identity and achievement. The purpose is not to assign blame, but to empower students to recognize how historical erasure operates and why reclaiming these narratives is vital for all learners.</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">build understanding of the historical paragraph by identifying key ideas and important details (C1.1, C2.6)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">develop and apply academic vocabulary to support comprehension of the text (B2.2)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze how language has been used historically to reshape or erase aspects of African identity (C3.3, A3.2)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain the main idea of the paragraph in their own words using a short, focused summary (D1.1, D1.2)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use reading-comprehension strategies such as identifying main ideas, clarifying vocabulary, and making connections (A1.1, C2.1)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate understanding clearly in writing using correct sentence structure and appropriate vocabulary (B3.1, B2.2)<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">read the paragraph carefully and identify the main idea<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">participate in the vocabulary mini-lesson by clarifying new or unfamiliar terms<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use vocabulary from the mini-lesson to deepen their understanding of the text<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain key historical points, such as:<br><br></p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">what the scientists concluded<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">how earlier writers influenced views of Egypt<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">why publications were created to &ldquo;prove&rdquo; Egyptians were not Black<br><br></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">write a 3&ndash;4 sentence summary that:<br><br></p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">is in their own words<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">includes one or two key details from the paragraph<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">clearly communicates why this moment in history matters<br><br></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">write in complete sentences with appropriate punctuation<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Estimated Time: 60&ndash;80 minutes &ndash; approx. 1&ndash;2 class periods</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the historical paragraph and learning focus: 5&ndash;8 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">first reading of the paragraph (teacher read-aloud or silent reading): 5&ndash;7 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explicit teaching and clarification of key academic vocabulary: 10&ndash;12 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">guided rereading using comprehension strategies (main idea, details, connections): 15&ndash;20 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">short written summary of the paragraph&rsquo;s main idea in students&rsquo; own words: 10&ndash;15 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">whole-class check-in or consolidation discussion: 8&ndash;10 minutes<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review their writing for clarity, correctness, and proper use of vocabulary<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Instruct students to:</p>\r\n<p dir=\"ltr\">Step 1. Read the following quote together as a class or in small groups:</p>\r\n<p dir=\"ltr\">&ldquo;In the early 19th century, after Napoleon&rsquo;s expedition to Egypt, the Hamites began to be viewed as having been Caucasians. However, Napoleon&rsquo;s scientists concluded that the Egyptians were Negroid. Napoleon&rsquo;s colleagues referenced prior well-known books by Constantin Fran&ccedil;ois de Volney and Vivant Denon that described Ancient Egyptians as &lsquo;Negroid.&rsquo; Finally, Foster concludes, &lsquo;it was at this point that Egypt became the focus of much scientific and lay interest, the result of which was the appearance of many publications whose sole purpose was to prove that the Egyptians were not Black, and therefore capable of developing such a high civilization.&rsquo;&rdquo;</p>\r\n<h3 dir=\"ltr\">Simplified Version of the Quote (for Modified Use)</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">In the early 1800s, after Napoleon went to Egypt, some people started saying that the people who built Ancient Egypt were white.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">But Napoleon&rsquo;s own scientists said that the Egyptians looked African (Black).<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">They also used earlier books by writers who had seen Ancient Egyptian people and said they were Black.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">After this, many books were written to try to prove that Egyptians were not Black.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">These books tried to say that Black people could not create such an advanced and powerful civilization.<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 2. Vocabulary Mini-Lesson (After Reading the Paragraph cited)</h3>\r\n<p dir=\"ltr\">Teacher Instructions:</p>\r\n<p dir=\"ltr\">After students read the historical paragraph, guide them through a brief vocabulary mini-lesson to help them understand the key academic and historical terms used in the text.</p>\r\n<p dir=\"ltr\">Highlight Key Terms (Teacher identifies them on the board or screen)</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">expedition<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">scientists<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">conclude / concluded<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">referenced<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">publications<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">civilization<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Hamites<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Negroid<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">prove<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 3 &mdash; Quick Oral &ldquo;Check for Understanding&rdquo;</h3>\r\n<p dir=\"ltr\">Ask students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Which words were new to you?&rdquo;<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Which words did you recognize but not fully understand?&rdquo;<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Which words seem important to the meaning of the paragraph?&rdquo;<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Let 2&ndash;3 students answer before moving on.</p>\r\n<h3 dir=\"ltr\">Step 4 &mdash; 60-Second Teacher Definitions (Clear + Accessible)</h3>\r\n<p dir=\"ltr\">Provide simple, student-friendly explanations:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">expedition &ndash; a journey taken for a purpose, often to explore or study something<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">scientists &ndash; experts who study information and draw conclusions<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">concluded &ndash; decided something after studying evidence<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">referenced &ndash; mentioned or used as support from another source<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">publications &ndash; books, papers, or articles that share information<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">civilization &ndash; an organized society with culture, technology, and leadership<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Hamites &ndash; a historical term (now outdated) used by Europeans to separate Africans into categories based on colonial beliefs<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Negroid &ndash; an outdated racial term used to classify people by physical traits; it is no longer acceptable<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">prove &ndash; to use evidence to show something is true or not true<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">You may clarify that Hamites and Negroid are harmful colonial categories that reflect racist beliefs, not scientific reality.</p>\r\n<h3 dir=\"ltr\">Step 5 &mdash; Mini Vocabulary Task</h3>\r\n<p dir=\"ltr\">Students complete one of the following (teacher choice):</p>\r\n<p dir=\"ltr\">Option A &mdash; Quick Match</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Provide a simple match-the-term-to-the-definition sheet with 6&ndash;7 key words.<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Option B &mdash; Fill-In-the-Blank</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Students complete 5 sentences that use the vocabulary in the context of the paragraph.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">(Example: &ldquo;Napoleon&rsquo;s scientists __________ that the Egyptians were Negroid.&rdquo;)<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Option C &mdash; Visual Organizer</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Students choose two words and draw a simple sketch to show each meaning.<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 6&mdash; Check for Understanding (Whole Class)</h3>\r\n<p dir=\"ltr\">Ask two quick questions:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Which word helped you understand the author&rsquo;s main point?&rdquo;<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;How do these words show that people tried to rewrite or change African history?&rdquo;<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Optional Extension (1 minute)</p>\r\n<p dir=\"ltr\">Ask:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Why do you think some people in history worked so hard to &lsquo;prove&rsquo; that Egyptians were not Black?&rdquo;<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 7. After Vocabulary mini lesson, respond to the following questions in writing or in a group discussion:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What is the main message about Black people in this quote?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What purpose would this message serve at the time it was written?<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Who do you think this message was meant to persuade or influence?<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Share responses in a respectful class discussion or through an online platform like FigJam or Padlet.</p>\r\n<h3 dir=\"ltr\">Step 8 &ndash; Short Summary Writing (3&ndash;4 Sentences)</h3>\r\n<p dir=\"ltr\">Teacher Instructions:</p>\r\n<p dir=\"ltr\">After completing the vocabulary mini-lesson and responding to questions, have students write a short summary to show they understand the meaning and importance of the historical paragraph.</p>\r\n<p dir=\"ltr\">Summary Prompt (Students):</p>\r\n<p dir=\"ltr\">In 3&ndash;4 sentences, explain the main idea of the paragraph you just read. Describe what the scientists concluded about Ancient Egyptians and why some people began publishing books to &ldquo;prove&rdquo; that Egyptians were not Black.</p>\r\n<p dir=\"ltr\">Teacher Notes:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Remind students that a summary does not include opinions.<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Encourage them to use vocabulary from the mini-lesson (e.g., concluded, referenced, publications, civilization).<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Model a strong opening sentence:<br><br></p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;This paragraph explains how people in the 19th century tried to change the way Egyptians were viewed.&rdquo;<br><br></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Students may plan using a simple organizer: Main Idea &rarr; Evidence &rarr; Why It Matters.<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 2 to check each student&rsquo;s understanding, accountability, and use of reading strategies during the historical paragraph analysis.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on the main idea and key details of the historical paragraph,<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their understanding of how language has been used to shape or erase African identity, and<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how effectively they used vocabulary and comprehension strategies to understand the text.<br><br></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about what they understood well, which words or ideas were challenging, and how confident they feel explaining the paragraph&rsquo;s message in their own words.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with identifying main ideas, understanding academic vocabulary, or summarizing historical texts clearly in writing.</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student identifies the main idea and key supporting details of the historical paragraph<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student correctly uses academic vocabulary (e.g., conclude, referenced, civilization) when speaking or writing about the text<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explains how specific words or phrases shape meaning or reflect historical bias<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student applies reading-comprehension strategies such as rereading, annotating, or clarifying vocabulary<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student summarizes the paragraph&rsquo;s main idea clearly in their own words<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates understanding using clear sentences and appropriate vocabulary<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participates thoughtfully in discussion and responds respectfully to others&rsquo; ideas<br><br></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">annotated or highlighted copies of the historical paragraph showing identification of key ideas and details<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student use of academic vocabulary correctly in written responses or discussion<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written explanations identifying how language has been used to shape meaning or erase aspects of African identity<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">short written summaries expressing the main idea of the paragraph in students&rsquo; own words<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">evidence of reading-comprehension strategies (e.g., notes, margin comments, vocabulary clarification)<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student contributions during whole-class or small-group discussions demonstrating understanding<br><br></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting comprehension of the paragraph and use of evidence</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:45:55', '2026-01-23 06:45:55');
INSERT INTO `tasks` (`id`, `lesson_id`, `title`, `slug`, `sort_order`, `body`, `created_at`, `updated_at`) VALUES
(7, 6, 'What is Shadeism? What is Colorism?', 'what-is-shadeism-what-is-colorism', 0, '<h3 dir=\"ltr\">What is Shadeism? What is Colorism?</h3>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">In this task, students are introduced to two important but often misunderstood terms: shadeism and colorism. These terms describe the ways people may experience bias or preference based on the lightness or darkness of their skin tone&mdash;sometimes even within their own racial or cultural group.</p>\r\n<p dir=\"ltr\">These ideas are not new. In many societies, including historically colonized regions, lighter skin has been associated with social advantage, while darker skin has often been unfairly linked to negative stereotypes or lower status. This legacy continues to influence how people are treated, represented in media, and viewed&mdash;both by others and by themselves.</p>\r\n<p dir=\"ltr\">For the Black community, shadeism has had a deep and lasting impact. It has shaped how Black individuals see themselves, how they are perceived by others, and how beauty, intelligence, and success are defined. These ideas can affect self-esteem, opportunity, and belonging. However, understanding this phenomenon is not just about addressing challenges&mdash;it&rsquo;s also about reclaiming pride, diversity, and identity within the Black experience.</p>\r\n<p dir=\"ltr\">This task invites students to explore how these ideas developed, how they are still present today, and what steps can be taken&mdash;both individually and collectively&mdash;to affirm the beauty, strength, and complexity of all skin tones. The diversity found across the Continent of Africa should be celebrated.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">understand how media techniques (lighting, framing, colour, sound, editing, narration) shape messages about skin tone and shadeism (A2.4, C1.4)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify and explain how specific media choices influence viewers&rsquo; emotions, interpretations, and biases (C3.5, A2.5)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">compare how two different videos communicate ideas about skin tone using different media elements (C1.5, C3.3)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">express their own perspective on shadeism using evidence from the videos (D2.3, C3.6)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate understanding through a chosen presentation format (oral, written, visual, or digital) (D2.1, B1.3)</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify at least one media technique (lighting, camera angle, framing, colour, sound, editing, narration) in each video</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain clearly how those techniques shape or influence the message about skin tone</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">support their ideas with specific examples or moments from the videos</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">show insight into how the media can reinforce or challenge stereotypes about skin tone</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use their graphic organizer to compare and connect ideas from both videos</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">create a final presentation that clearly communicates their understanding of shadeism and media influence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use appropriate media conventions (organization, clarity, visuals, tone) for the presentation format they choose</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate critical thinking, respectful reflection, and thoughtful communication</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Estimated Time</h3>\r\n<p dir=\"ltr\">70&ndash;90 minutes &ndash; approx. 1&ndash;2 class periods</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the task and review of key media techniques (lighting, framing, colour, sound, editing, narration): 5&ndash;8 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">first viewing of Video 1 (uninterrupted): 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">second viewing of Video 1 with guided focus questions: 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">viewing of Video 2 with comparison focus: 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">guided comparison and discussion of media choices and messages: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">individual or group response expressing perspective on shadeism using evidence from the videos: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">brief consolidation or check-in discussion: 8&ndash;10 minutes</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Ask students to:</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part A &ndash; Quick Write: Exploring Shadeism</h3>\r\n<h4 dir=\"ltr\">Resource</h4>\r\n<p dir=\"ltr\">Video: Shadeism and the Spoken Word (1:44 min)<br><a href=\"https://youtu.be/TrjMER06gso\">https://youtu.be/TrjMER06gso</a></p>\r\n<p dir=\"ltr\">Watch the video as a class.</p>\r\n<p dir=\"ltr\">Complete a 1-minute quick write: Write down everything remembered or learned from the video.</p>\r\n<p dir=\"ltr\">Share responses in pairs or as a whole class.</p>\r\n<p dir=\"ltr\">Then, respond to one of the following prompts:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What idea in the video stood out the most?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What is one question or thought you had after watching it?</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Discuss responses respectfully as a class.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part B &ndash; Reflection on Colorism</h3>\r\n<h4 dir=\"ltr\">Resource</h4>\r\n<p dir=\"ltr\">Video: Colorism (2:29 min)<br><a href=\"https://youtu.be/_L4-mOJWhIE\">https://youtu.be/_L4-mOJWhIE</a></p>\r\n<p dir=\"ltr\">Watch the second video together.</p>\r\n<p dir=\"ltr\">Write a reflection paragraph about what was learned. Students may wish to consider:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What did this video help clarify or make you think about?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How do media or social traditions reflect ideas about skin tone?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Why is this a helpful conversation to have in school?</p>\r\n</li>\r\n</ul>\r\n<h4 dir=\"ltr\">Short Writing Consolidation (3&ndash;4 Sentences)</h4>\r\n<p dir=\"ltr\">Write a short paragraph explaining the difference between shadeism and colorism.</p>\r\n<p dir=\"ltr\">Use at least one example from the video or class discussion to support your thinking.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part C &ndash; Socratic Circle</h3>\r\n<p dir=\"ltr\">After watching the video, facilitate a class circle or small-group discussion using open-ended prompts such as:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;What messages about beauty are we exposed to in the media?&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Is shadeism an issue in communities today? Where do we see it?&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Can admiration of lighter skin exist without being anti-Black?&rdquo;</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part D &ndash; Media Matters: Who Gets to Be Beautiful?</h3>\r\n<h4 dir=\"ltr\">Teacher Preparation</h4>\r\n<p dir=\"ltr\">Choose 3&ndash;4 media samples that show a range of skin tones and beauty representations. These can include:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Magazine covers (e.g., fashion, entertainment)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Short commercial clips (e.g., beauty, skin products)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Film or music video stills</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Social media influencer posts (public ones from verified accounts)</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Tip: Ensure diversity across race, gender, age, and cultural backgrounds. Include at least one sample that subtly reinforces colorism (e.g., &ldquo;skin lightening&rdquo; ad) and one that challenges it.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<h4 dir=\"ltr\">Gallery Walk or Slide Show</h4>\r\n<p dir=\"ltr\">View the 3&ndash;4 selected media samples as a class. This can be done:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">In a digital slideshow (Google Slides or FigJam)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">As a printed &ldquo;gallery walk&rdquo; posted around the classroom</p>\r\n</li>\r\n</ul>\r\n<h4 dir=\"ltr\">Media Reflection Chart</h4>\r\n<p dir=\"ltr\">For each image or clip, fill in the following chart in your notebook or digital worksheet.</p>\r\n<p dir=\"ltr\">Resource: <a href=\"https://docs.google.com/document/d/1w-LIbvJx_-pyXR4xHTOXGXDLqWuaNyU_/copy\">Reflection Media Chart Organizer-14PD</a></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Group Discussion Questions</h3>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">After reviewing the samples, discuss:</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Which images seem to reflect real diversity in skin tone, gender, and culture? Which do not?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">What repeated patterns did you notice?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">What do these patterns teach us&mdash;consciously or unconsciously&mdash;about beauty or success?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">How might these portrayals affect how people view themselves or others?</p>\r\n</li>\r\n</ul>\r\n</ol>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Exit Reflection (Optional)</h3>\r\n<p dir=\"ltr\">Write a short response (3&ndash;5 sentences):</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;One message I now notice in the media is&hellip;&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;I wish more media would show&hellip;&rdquo;</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Part E &ndash; Media Shapes Messages About Skin Tone</h3>\r\n<h4 dir=\"ltr\">Teacher Introduction</h4>\r\n<p dir=\"ltr\">Explain to students that the media does more than share information&mdash;it shapes beliefs, emotions, and attitudes about skin tone.</p>\r\n<p dir=\"ltr\">Tell them they will re-watch both videos with a focus on how the message is constructed, not just what the message is.</p>\r\n<p dir=\"ltr\">Emphasize that this analysis will support their final presentation/assessment task later in the activity.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Resource</h3>\r\n<p dir=\"ltr\"><a href=\"https://docs.google.com/document/d/1I7W70gI4TEHqo8qNhFZO8M2R5P2PlpVrkaH7qwt0oj4/copy\">Media Analysis Organizer &ndash; Part E</a></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Review the 7 Media Elements students will analyze:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Lighting</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Camera Angles</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Framing/Cropping</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Colour Symbolism</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Music/Sound</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Selection &amp; Omission</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Text/Narration</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Distribute the Media Analysis Graphic Organizer and explain each section briefly.</p>\r\n<p dir=\"ltr\">Tell students they will re-watch both videos:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://youtu.be/TrjMER06gso\">Shadeism and the Spoken Word </a>(1:44 min)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://youtu.be/TrjMER06gso\">Colorism</a> (10:11 min)</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Encourage them to watch actively, pause when needed, and focus on specific media choices.</p>\r\n<p dir=\"ltr\">Prompt students to note:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What they see</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What they hear</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What they feel</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How specific media techniques affect the message about skin tone</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Facilitate a short discussion after viewing:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Which choices strengthened the message?&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;What did you notice about how skin tone was highlighted?&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&ldquo;Did anything feel biased or intentionally emphasized?&rdquo;</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Remind students that their graphic organizer will serve as a planning tool for the final presentation options.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Introduction</h3>\r\n<p dir=\"ltr\">&ldquo;You&rsquo;ve explored the messages in both videos and uncovered how media shapes the way we see skin tone. Now it&rsquo;s your turn to use that learning. Choose one of the presentation tasks below to share your perspective and show your understanding.&rdquo;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Presentation Options</h3>\r\n<h4 dir=\"ltr\">1. &ldquo;Decode the Clip&rdquo; Mini-Poster</h4>\r\n<p dir=\"ltr\">Students create a 1-page poster identifying at least three media techniques used in the video (lighting, framing, music, symbolism).</p>\r\n<p dir=\"ltr\">Must include:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">a label (technique)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">a short explanation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">an example from the video</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Great for hallway displays or digital submission.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">2. Visual Annotation Screenshot</h4>\r\n<p dir=\"ltr\">Students take a screenshot of a frame from the video (teacher provides frame if needed) and annotate it with:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">arrows</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">labels</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">short comments</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">This is powerful for teaching visual literacy.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">3. 30-Second Audio or Video Reflection</h4>\r\n<p dir=\"ltr\">Students record a short voice/video clip answering:<br>&ldquo;What media technique stood out to you, and how does it shape the message about skin tone?&rdquo;</p>\r\n<p dir=\"ltr\">Perfect for:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">MLLs/ELLs</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">students with writing challenges</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">UDL requirements</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">4. Digital Slides (1 Slide Only)</h4>\r\n<p dir=\"ltr\">Students create one slide using Canva/Google Slides:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">title: &ldquo;Media Clue I Noticed&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">an image (optional)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">2&ndash;3 bullet points explaining the technique and its effect</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">5. &ldquo;Media Detective&rdquo; Exit Ticket</h4>\r\n<p dir=\"ltr\">On an index card or Google Form:<br>&ldquo;One media technique I noticed is&hellip;, and it makes the viewer think&hellip;&rdquo;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">6. Collaborative Group Chart (Gallery Walk)</h4>\r\n<p dir=\"ltr\">Groups produce a chart that lists:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">technique</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">example</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">effect</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h4 dir=\"ltr\">7. Two-Column Reflection</h4>\r\n<p dir=\"ltr\">Students write:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Column A: What I Saw</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Column B: What It Made Me Think</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 3 to check each student&rsquo;s understanding, analysis, and reflection on shadeism and media representation.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on how media techniques shape messages about skin tone and shadeism,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to identify and explain specific media choices using evidence from the videos, and</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how clearly they can express their own perspective on shadeism.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about which media techniques stood out most, how the videos influenced their thinking, and how confident they feel explaining their ideas using evidence.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with analyzing media techniques, comparing messages across texts, or expressing viewpoints clearly and respectfully.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student identifies specific media techniques (lighting, framing, colour, sound, editing, narration) used in the videos</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explains how media choices influence meaning, emotions, or viewer interpretation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student compares how two videos communicate ideas about skin tone using different media elements</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student supports opinions about shadeism with clear evidence from the videos</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates ideas clearly using appropriate media and academic vocabulary</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participates respectfully in discussion, listening and responding to peers</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student demonstrates critical thinking by questioning or challenging media messages about skin tone</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student notes or organizers identifying specific media techniques used in each video</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written or oral explanations describing how media choices influence meaning, emotions, or interpretation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">comparison responses showing how two videos communicate ideas about skin tone differently</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student statements expressing a personal perspective on shadeism supported with evidence from the videos</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">presentation products (oral, written, visual, or digital) demonstrating clear communication of understanding</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use of appropriate media and academic vocabulary when discussing shadeism and representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">contributions during whole-class or small-group discussions demonstrating critical engagement</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting understanding of media techniques and their impact</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<hr>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2026-01-23 06:49:04', '2026-01-23 06:49:04'),
(8, 7, 'The DNA of Shadeism and Colorism', 'the-dna-of-shadeism-and-colorism', 0, '<h2 dir=\"ltr\">The DNA of Shadeism and Colorism</h2>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">This task deepens student understanding of shadeism and colorism by examining their historical and present-day implications in North America. The &ldquo;One Drop Rule,&rdquo; historically used to reinforce racial separation, becomes a lens through which students explore how socially constructed definitions of race continue to influence identity, representation, and perceptions of Blackness today. By analyzing videos, articles, and creating content-based questions, students develop critical media literacy, empathy, and collaborative problem-solving skills.</p>\r\n<p dir=\"ltr\">The task is structured to foster critical thinking about the intersection of race, social classification, and the ongoing implications of colonial ideologies on beauty, identity, and belonging. By engaging in reciprocal teaching and collaborative research, students also practice inquiry and perspective-taking.</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">define and explain the terms shadeism and colorism using historical and contemporary examples (B2.2, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain the historical origins and social purpose of the One Drop Rule (C3.3, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze the impact of shadeism and colorism in Canadian and U.S. contexts using multimedia and written texts (C1.5, A2.5)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">generate and respond to inquiry questions collaboratively using digital tools (A2.3, A2.7)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use evidence-based reasoning to discuss how historical figures are interpreted within racial constructs (C3.5, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate critical thinking, collaboration, communication, and digital literacy through group tasks and presentations (A1.1, D2.1, D3.2)</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify and record the main ideas from both viewings of the One Drop Rule video.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate accurate understanding of what the One Drop Rule was and why it existed.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">distinguish between historical fact, social construction, and societal impact.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use the &ldquo;One Drop Rule &ndash; Main Ideas Organizer&rdquo; to organize and consolidate essential information.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">contribute relevant ideas during the class debrief and connect their notes to shared class themes.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">generate clear, content-based questions from the assigned videos and articles.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exchange and respond to another group&rsquo;s questions using evidence from the video and article.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of shadeism and colorism by connecting historical concepts (One Drop Rule) to modern experiences and media examples.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">collaborate effectively in groups to create and finalize Google Slide content.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate information clearly and accurately through completed questions, answers, and posted slides.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Estimated Time: 90&ndash;120 minutes &ndash; approx. 2 class periods</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the task and review of key concepts (shadeism, colorism, One Drop Rule): 8&ndash;10 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">guided instruction and clarification of historical context and terminology: 10&ndash;15 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">viewing and/or reading of selected multimedia texts and sources (Canada and U.S. contexts): 20&ndash;25 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">collaborative inquiry work using digital tools to generate and respond to guiding questions: 25&ndash;30 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">group discussion and evidence-based analysis of historical identity and racial constructs: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">brief consolidation, reflection, or check-in discussion: 8&ndash;10 minutes</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Part 1: Understanding the One Drop Rule</h3>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<h3 dir=\"ltr\">Watch the Video:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">View the video \"What is the One Drop Rule?\" (1:31 min) once all the way through without stopping.<br><a href=\"https://youtu.be/BrbppVlPpG4\">https://youtu.be/BrbppVlPpG4</a></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Watch Again and Take Notes:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Rewatch the video.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">At the halfway mark, pause and write or voice type the main points discussed so far.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">After a short recall break, continue the video to the end.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Write or voice type the remaining main ideas.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Class Debrief:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Share responses in class discussion.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The teacher collects and posts common themes on the whiteboard.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Each student copies and organizes the information using the &ldquo;One Drop Rule &ndash; Main Ideas Organizer.&rdquo;<br><a href=\"https://docs.google.com/drawings/d/1PffYcNxzoE8ZeEbKLyAdtUgVVCHZOlz7UV_TuTGUldg/copy\">https://docs.google.com/drawings/d/1PffYcNxzoE8ZeEbKLyAdtUgVVCHZOlz7UV_TuTGUldg/copy</a></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Optional Critical Thinking Extension:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Instead of summarizing the video, students may respond to the following questions using the same organizer:</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What is the One Drop Rule?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Who created it?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What was its purpose in society?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Is this rule a social construct?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What issues arise from using this rule today?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Could it apply to identifying African Queens as Black?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If applied, would these Queens be considered Black? Why or why not?</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Part 2: Investigating Shadeism and Colorism in Practice</h3>\r\n<h3 dir=\"ltr\">Group A Tasks:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the video: Dr. Yaba Blay &ndash; CNN Interview (4:50 min) and read: Toronto Star &ndash; Students Challenge Shadeism<br><a href=\"https://youtu.be/gqvVYVOGRaw\">https://youtu.be/gqvVYVOGRaw<br></a><a href=\"https://www.thestar.com/news/gta/2013/05/19/students_in_oshawa_challenge_shadeism.html\">https://www.thestar.com/news/gta/2013/05/19/students_in_oshawa_challenge_shadeism.html</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">In your group, create 7&ndash;10 content-based questions about the video and article.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Exchange questions with Group B.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the Group B video and read their article.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Answer the questions provided by Group B.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Post all content questions and answers in a Google Slide deck.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Group B Tasks:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the video: Shadeism/Colorism in the Media and read: One Drop Rule &ndash; Article<br><a href=\"https://globalnews.ca/news/5302019/shadeism-colourism-racism-canada/\">https://globalnews.ca/news/5302019/shadeism-colourism-racism-canada/<br></a><a href=\"https://abcnews.go.com/Health/halle-berry-cites-drop-rule-daughter-black-white/story?id=12869789\">https://abcnews.go.com/Health/halle-berry-cites-drop-rule-daughter-black-white/story?id=12869789</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">In your group, create 7&ndash;10 content-based questions about the video and article.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Exchange questions with Group A.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the Group A video and read their article.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Answer the questions provided by Group A.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Post all content questions and answers in a Google Slide deck.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 4 to check each student&rsquo;s understanding, inquiry, and collaboration related to shadeism, colorism, and historical identity.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on what they learned about shadeism, colorism, and the One Drop Rule,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to use evidence from texts and media to analyze historical identity, and</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how effectively they participated in collaborative inquiry and discussion.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about which ideas were most challenging, how their thinking changed, and how confident they feel discussing these concepts using evidence.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with the One Drop Rule, shadeism and colorism concepts, or using evidence to support analysis.</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student accurately defines shadeism and colorism using historical and contemporary examples</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explains the One Drop Rule and its historical purpose using appropriate terminology</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student analyzes how shadeism and colorism operate in Canadian and U.S. contexts using evidence from texts or media</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student generates relevant inquiry questions and responds thoughtfully to peers&rsquo; questions</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses evidence to discuss how historical figures are interpreted within racial constructs</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student applies critical thinking when examining identity, power, and representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student collaborates respectfully and productively during group inquiry tasks</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates ideas clearly using academic and discipline-specific vocabulary</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student demonstrates effective use of digital tools for inquiry, discussion, or presentation</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written or oral definitions of shadeism and colorism using historical and contemporary examples</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explanations of the One Drop Rule and its historical purpose</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">notes, organizers, or annotations analyzing shadeism and colorism in Canadian and U.S. contexts</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">inquiry questions generated by students and written or oral responses to peers&rsquo; questions</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">evidence-based discussion or written responses examining historical figures within racial constructs</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">group work products created using digital tools (shared documents, slides, collaborative boards)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">oral or written contributions demonstrating critical thinking about identity, power, and representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting understanding of key concepts and use of evidence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">teacher observations of respectful collaboration, communication, and effective use of digital tools</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:51:54', '2026-01-23 06:51:54');
INSERT INTO `tasks` (`id`, `lesson_id`, `title`, `slug`, `sort_order`, `body`, `created_at`, `updated_at`) VALUES
(9, 8, 'Applying What You Know - How Representation Shapes History', 'applying-what-you-know-how-representation-shapes-history', 0, '<h3 dir=\"ltr\">Applying What You Know - How Representation Shapes History</h3>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">Throughout this unit, students have explored themes of racial identity, shadeism, and the social construction of race through historical and modern texts. This culminating discussion task focuses on the portrayal of Queen of Sheba, a historically significant figure whose image and identity have been reshaped across cultures and time.</p>\r\n<p dir=\"ltr\">This task is approached through the lens of English language and literacy, not solely through religious instruction. Students will analyze metaphor, narrative voice, symbolism, and visual representation found in media, literature, and biblical allusions (e.g., the Songs of Solomon). This helps students develop their critical literacy, media analysis, and inferencing skills&mdash;essential components of the English curriculum.</p>\r\n<p dir=\"ltr\">By reflecting on how Queen Sheba is represented (as Black, white, or racially ambiguous), students are invited to consider:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Who controls cultural narratives?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How do symbolic and literal interpretations shape our understanding of identity?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What does representation mean for how we see ourselves and others?</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">This task offers opportunities for inquiry, collaboration, and respectful dialogue while anchoring students\' responses in text-based analysis.</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze how race and identity are constructed and portrayed through literary and media texts (C3.3, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">interpret symbolism, metaphor, and narrative voice in visual and written sources (C3.1, C1.4)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply reading comprehension and inferencing strategies to respond to text-based and video prompts (C2.1, C2.4)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">reflect on personal responses to culturally significant texts and visuals through writing and collaborative dialogue (D2.3, C3.6)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use critical literacy skills to explore how representation affects identity and cultural understanding (A3.2, C3.5)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">engage in oral and written communication to express and refine ideas using a range of vocabulary and sentence structures (B1.5, B3.1, D1.2)</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of the video&rsquo;s key ideas about the representation of Queen Sheba.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">respond accurately and thoughtfully to each reflection question using evidence from the video and unit learning.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze how Queen Sheba is portrayed in different cultural, historical, and media contexts.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain how symbolism, metaphor, and narrative voice (e.g., references to the Songs of Solomon) are used in the video.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">connect themes of identity, shadeism, and constructed race to this specific example.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">contribute respectfully during class discussion and build on others&rsquo; ideas.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate their thinking clearly in writing using complete sentences and appropriate vocabulary.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Estimated Time: 60&ndash;80 minutes &ndash; approx. 1&ndash;2 class periods</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review of key concepts from Tasks 1&ndash;4: 8&ndash;10 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">viewing of the Queen Sheba video (uninterrupted): 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">second viewing with guided questions: 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">individual reflection and written responses: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">small-group or paired discussion: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">whole-class consolidation and clarification of key ideas: 8&ndash;10 minutes</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Direct students to complete the following:</p>\r\n<h3 dir=\"ltr\">Step 1: Watch the Video</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the video &ldquo;The Queen Sheba &ndash; Black is Beautiful&rdquo;<br><a href=\"https://youtu.be/N-42EanFf-o\">https://www.google.com/url?q=https://youtu.be/N-42EanFf-o&amp;sa=D&amp;source=editors&amp;ust=1769053797008418&amp;usg=AOvVaw1NUJj1Lul2T03uBQGBmEE0<br></a>in full.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 2: Reflect and Respond</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Use what has been learned throughout this unit to answer the following reflection questions:</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Why do you think Queen Sheba is sometimes portrayed as Black and other times as white?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What effect does this change in representation have on how people view Black identity and history?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What messages about race and power are being reinforced when African queens are portrayed as not Black?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How does this connect to the historical &ldquo;One Drop Rule&rdquo; and its purpose?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What role does symbolism play in the way Queen Sheba is framed in this video?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How do references to texts like the Songs of Solomon influence interpretation?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What does the phrase &ldquo;Black is Beautiful&rdquo; mean in this context?</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 3: Post Your Responses</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Post your responses to a shared discussion board, Google Slide, or digital platform (Padlet, FigJam, Google Classroom).</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Students may also share orally in small groups or as a class discussion.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 5 to check each student&rsquo;s understanding, application of learning, and reflection on representation and meaning.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on how ideas about race, identity, and representation were applied in today&rsquo;s task,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to use evidence from texts, visuals, or media to support their thinking, and</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how clearly they communicated their ideas.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about what they understood well, what challenged them, and how confident they feel applying these concepts to new texts or situations.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with applying critical literacy skills, using evidence effectively, or expressing ideas clearly.</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explains how Queen Sheba&rsquo;s representation shifts across media and history</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses evidence from the video and prior tasks to support their interpretation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student makes connections between representation and power (e.g., erasure of Black excellence)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student applies concepts like shadeism, colorism, and the social construction of race to a new example</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student recognizes the role of symbolism and narrative voice in shaping meaning</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participates respectfully in discussion and demonstrates openness to multiple perspectives</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates ideas clearly and thoughtfully in writing</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written responses to reflection questions showing understanding and use of evidence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participation in discussion and ability to connect unit learning to Task 5</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses demonstrating comprehension and reflection</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">evidence of critical literacy (analysis of representation, symbolism, and power)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student ability to explain how historical constructs (e.g., One Drop Rule) relate to modern identity narratives</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:53:01', '2026-01-23 06:53:01'),
(10, 9, 'Create a Colourage', 'create-a-colourage', 0, '<h2 dir=\"ltr\">Create a Colourage</h2>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">This task asks students to create a visual collage that explores how skin tone bias and color-based discrimination continue to operate in Canada and around the world. The activity is grounded in English language and media studies but touches deeply on Social Sciences and Civics, offering students the opportunity to apply critical literacy skills across disciplines.</p>\r\n<p dir=\"ltr\">At its core, this task helps students develop their understanding of how language, imagery, and representation can influence societal attitudes and reinforce systems of inequity. It consolidates prior learning from the unit&mdash;such as the \"One Drop Rule,\" shadeism, historical representation, and identity&mdash;by encouraging students to examine real-world evidence of how these issues continue to affect people today.</p>\r\n<p dir=\"ltr\">For Black students, this activity carries additional emotional weight. Many have internalized negative messages about their skin tone, leading to feelings of shame, self-doubt, or silence when identifying as Black. This activity gently challenges those narratives by affirming that Black identity exists across a spectrum of shades, and that every shade is worthy of visibility, voice, and value. By exploring media, quotes, and real-life examples of color-based discrimination, students are encouraged to:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Confront harmful stereotypes,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Build empathy across peer groups,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">And most importantly, reclaim pride in the full diversity of the Black experience.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">For all students, this task fosters critical awareness about the subtle ways that skin tone bias and systemic discrimination are embedded in everyday life&mdash;including in Canadian society. By critically examining how people are represented in media and public life, students build the capacity to recognize injustice and become more thoughtful, inclusive citizens.</p>\r\n<p dir=\"ltr\">This task also honors creativity and self-expression, allowing students to process their learning visually and emotionally while demonstrating critical thinking and evidence-based analysis.</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze how discrimination based on skin tone operates in Canadian society (A3.2, C3.6)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply media literacy skills to locate, select, and evaluate articles, images, and quotations related to shadeism and colorism (A2.4, C1.4)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of key concepts such as shadeism, the One Drop Rule, and symbolic representation through visual and written choices (C3.3, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate a clear and powerful message about identity, inclusion, and discrimination through collage design and explanation (B1.3, D2.1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">reflect on identity and promote dialogue about beauty, race, and social equity through creative and collaborative work (C3.6, A1.1)</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of shadeism and colorism by selecting images, quotes, headlines, and media that reflect discrimination or resistance</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply research and media literacy skills to locate credible, relevant, and meaningful visual/textual evidence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">organize selected items in a collage (digital or physical) that communicates a clear, focused message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use visual design elements (layout, colour, emphasis, placement) intentionally to strengthen the collage&rsquo;s message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">include a written caption or reflection that explains the central idea or insight conveyed through the collage</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make connections to key concepts from the unit (e.g., shadeism, One Drop Rule, representation, narrative framing)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate a thoughtful perspective on equity, visibility, and identity through visual and written elements</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">present or display their collage clearly and respectfully in a shared class space (Padlet, Google Slides, virtual gallery, printed display)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">describe, when sharing, at least one key piece in their collage and explain why it was included</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">respond respectfully to peers&rsquo; work by acknowledging different perspectives, experiences, and interpretations</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Estimated Time: 90&ndash;120 minutes &ndash; approx. 2 class periods</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the culminating task and review of expectations and success criteria: 8&ndash;10 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review of key concepts (shadeism, colorism, One Drop Rule, symbolic representation): 8&ndash;10 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">planning and selection of images, quotes, symbols, and message focus: 15&ndash;20 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">creation of the visual collage (digital or physical): 35&ndash;45 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written or oral explanation of design choices and message: 10&ndash;15 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">sharing, peer viewing, and exit ticket: 10&ndash;15 minutes</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Outline the following steps to students:</p>\r\n<p dir=\"ltr\">Begin by reading the following quote:</p>\r\n<p dir=\"ltr\">&ldquo;Research has found extensive evidence of discrimination based on skin color in criminal justice, business, the economy, housing, health care, media, and politics in the United States and Europe. Lighter skin tones are considered preferable in many countries in Africa, Asia and South America.&rdquo;</p>\r\n<p dir=\"ltr\">Source: Dark Is Beautiful Campaign<br><a href=\"https://www.darkisbeautiful.in/colourism/\">https://www.google.com/url?q=https://www.darkisbeautiful.in/colourism/&amp;sa=D&amp;source=editors&amp;ust=1769053797024462&amp;usg=AOvVaw12tR16XiZ1_3V1V_NtgwRm</a></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the Videos:</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Create a Collage with Found Items<br><a href=\"https://youtu.be/pOu5oQNw_KU?si=BbPw43GFECQlEAyM\">https://www.google.com/url?q=https://youtu.be/pOu5oQNw_KU?si%3DBbPw43GFECQlEAyM&amp;sa=D&amp;source=editors&amp;ust=1769053797025084&amp;usg=AOvVaw36AT219rO-82iBgUvW68M8</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Collage Essentials<br><a href=\"https://youtu.be/uDwhqaDfIRQ?si=WNop3d9IvKpBIb8t\">https://www.google.com/url?q=https://youtu.be/uDwhqaDfIRQ?si%3DWNop3d9IvKpBIb8t&amp;sa=D&amp;source=editors&amp;ust=1769053797025347&amp;usg=AOvVaw1r3W3ScQzqe_I8hpm4PDrf</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Find images, quotes, headlines, articles, or excerpts that show evidence of shadeism/colorism or challenge it.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Create a visual collage (digital or physical) combining the items you selected to communicate a clear message about shadeism/colorism.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Present or display your collage (on Padlet, Google Slides, virtual gallery, or in-class display).</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Resources:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Shadeism/Colorism-Activity 14/Task 6-Collage Worksheet<br><a href=\"https://docs.google.com/document/d/1aLEhmzIKVEZ5Q3jSpGOfo5DURRQ2mQub/copy\">https://www.google.com/url?q=https://docs.google.com/document/d/1aLEhmzIKVEZ5Q3jSpGOfo5DURRQ2mQub/copy&amp;sa=D&amp;source=editors&amp;ust=1769053797027952&amp;usg=AOvVaw0vhzOUxS30500wu_354zl</a>_</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 6 to check each student&rsquo;s understanding, reflection, and creative decision-making during the culminating colourage task.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on how effectively their colourage communicates ideas about shadeism, colorism, and representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to use evidence and design choices intentionally to express meaning</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how clearly they can explain their message and connect it to unit learning</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about what they learned, what they found challenging, and how confident they feel representing complex social issues through creative work.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with connecting visual choices to critical concepts, explaining their message, or applying media literacy skills.</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student applies critical thinking to represent how discrimination based on skin tone operates in society</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student selects images, quotes, and headlines that are relevant and support a clear message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student demonstrates understanding of shadeism and colorism through evidence-based visual/textual choices</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses layout, emphasis, colour, and placement intentionally to communicate meaning</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student makes explicit connections to unit concepts (shadeism, One Drop Rule, representation, historical erasure)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates respectfully and thoughtfully when presenting or responding to peers&rsquo; work</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student explains their collage with clarity, using appropriate vocabulary and evidence</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">completed colourage (digital or physical) demonstrating clear communication of message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">selected research materials (images, quotations, headlines, excerpts) showing relevant evidence and media literacy</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written caption or reflection explaining the central idea and key design choices</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">oral explanation or sharing (if applicable) describing at least one key piece and its purpose</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting understanding, reflection, and connection to unit learning</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">teacher observation of collaboration, respectful dialogue, and engagement in the creative inquiry process</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:54:46', '2026-01-23 06:54:46'),
(11, 10, 'Celebrate the Shades of Black', 'celebrate-the-shades-of-black', 0, '<h3 dir=\"ltr\">Celebrate the Shades of Black</h3>\r\n<p dir=\"ltr\">This task challenges students to synthesize their understanding of shadeism, colorism, anti-Black racism, and the One Drop Rule by creating a children&rsquo;s story appropriate for Grades 4&ndash;6. The task draws inspiration from the video about the first African-Korean model, a young man who faced discrimination and bullying due to his mixed heritage and darker skin tone.</p>\r\n<p dir=\"ltr\">His experience highlights how anti-Black racism and color-based discrimination operate across cultures and continents. By framing this task through an English lens while incorporating cross-curricular connections to Civics, and Social Sciences students reflect on identity and belonging while strengthening their communication skills.</p>\r\n<p dir=\"ltr\">This activity supports all students in developing empathy, while affirming Black students who may have internalized negative societal messages about skin tone. It positions students as creators of inclusive narratives and nurtures a sense of agency and pride in diversity.</p>\r\n<h3 dir=\"ltr\">Part 1</h3>\r\n<p dir=\"ltr\">Students :</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply narrative writing skills to create a story with an anti-racism and anti-bullying message (D1.2, D2.1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use knowledge of shadeism, colorism, and the One Drop Rule to educate younger learners about identity and equity (A3.2, C3.6)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of how social constructs have influenced perceptions of Black identity (C3.3, A3.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">develop global competencies such as critical thinking, empathy, collaboration, and digital literacy through storytelling tasks (A1.1, A1.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make cross-curricular connections through storytelling, historical insight, and media literacy (A1.1, A3.1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">analyze ethical and historical perspectives related to identity and representation within narrative contexts (A3.2, C3.6)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify key challenges experienced by the African-Korean model and accurately link them to shadeism, colorism, and anti-Black racism</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply narrative writing skills to create an 8&ndash;10 page children&rsquo;s story that is clear, engaging, age-appropriate, and organized using the Story Planner</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">communicate a strong anti-bullying and anti-racism message that reflects understanding of shadeism, colorism, and the One Drop Rule</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate historical and social understanding by highlighting how identity and belonging are shaped by social constructs</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">incorporate simple visuals, illustrations, or emojis that support meaning and engage younger readers</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">express empathy and awareness of diverse identities through character development, plot, and message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">organize and present their completed story (digital or print) in a clear, polished format suitable for sharing with peers or younger students</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Estimated Time: 90&ndash;120 minutes &ndash; approx. 2 class periods</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the task and review of purpose, audience, and key concepts (shadeism, colorism, One Drop Rule): 8&ndash;10 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">review of narrative elements and success criteria (message, structure, voice): 10&ndash;12 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">brainstorming and planning the story (characters, setting, message, plot): 20&ndash;25 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">drafting the narrative (individual or collaborative): 35&ndash;45 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">peer sharing, feedback, or brief reflection on message clarity and impact: 10&ndash;15 minutes</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Explain the steps to students:</p>\r\n<h3 dir=\"ltr\">Step 1 &ndash; Watch &amp; Note</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">View the video &ldquo;Korea&rsquo;s First African-Korean Model.&rdquo;<br><a href=\"https://youtu.be/ntPVbVLWIkY\">https://www.google.com/url?q=https://youtu.be/ntPVbVLWIkY&amp;sa=D&amp;source=editors&amp;ust=1769053797041253&amp;usg=AOvVaw0kI-qC3a1Yc4V5ZIUSzlZh<br></a>(11:17 min)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Jot down (or voice-record) challenges he faced and how they relate to shadeism/colorism.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 2 &ndash; Write a Children&rsquo;s Story (8&ndash;10 pages) Create a story for Grades 4-6 that:</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">includes a beginning, middle, and end</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">includes a clear message about anti-Black racism, bullying, shadeism, and/or colorism</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">includes a clear &ldquo;moral&rdquo; or lesson appropriate for younger students</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">represents Black identity across shades in a respectful and affirming way</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">includes at least 1 character who experiences bullying or discrimination because of skin tone</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">shows how the character responds and how the conflict is resolved</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">ends with a positive, empowering message</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 3 &ndash; Plan Your Story (Story Planner Required)</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Use the Story Planner Graphic Organizer to plan before writing:<br>Story Planner Graphic Organizer-Act14/T7H<br><a href=\"https://docs.google.com/document/d/1DMaoqVzgLuKgwquSH_gtkG_F-QXYTN2z/copy\">https://www.google.com/url?q=https://docs.google.com/document/d/1DMaoqVzgLuKgwquSH_gtkG_F-QXYTN2z/copy&amp;sa=D&amp;source=editors&amp;ust=1769053797044862&amp;usg=AOvVaw1VdcQncZQPQrwfDwAL9hEH</a></p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 4 &ndash; Create Your Story</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Write your story in full (digital or paper).</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Include visuals (simple illustrations, emojis, or images) to support meaning.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Make sure the story is clear, age-appropriate, and has a strong message.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Step 5 &ndash; Share &amp; Reflect</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Share your story with a peer or small group.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Give feedback on:</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">clarity of message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">organization (beginning/middle/end)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">tone and age-appropriateness</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">how well it addresses shadeism/colorism and bullying</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Revise your story based on feedback.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students can:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explain shadeism and colorism through story content in a clear and age-appropriate way</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">create a narrative with a clear beginning, middle, and end</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">include a central conflict that connects to bullying, discrimination, or identity</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate empathy and respectful representation of Black identity</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">include a moral or lesson that promotes pride, inclusion, and anti-racism</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use the Story Planner to structure ideas effectively</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">create a polished final product appropriate for Grades 4&ndash;6</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">include visuals that support meaning and engage younger readers</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Story Planner Graphic Organizer (Act14/T7H)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">completed children&rsquo;s story (8&ndash;10 pages)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">peer feedback notes or revision evidence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket reflection</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 7 to check each student&rsquo;s understanding, reflection, and growth during the narrative storytelling process.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on how effectively their story communicates an anti-racism and anti-bullying message,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their understanding of concepts such as shadeism, colorism, and identity, and</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how their writing and revisions strengthened clarity, voice, and purpose.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Administration</p>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently.</p>\r\n<p dir=\"ltr\">Exit Ticket Prompts:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What message does your story teach younger students about shadeism, colorism, or bullying?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What part of your story best shows pride in Black identity or the beauty of different shades?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What is one change you made (or would make) to strengthen your story&rsquo;s message?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How did this task help you think differently about identity, belonging, or representation?</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student story includes a clear conflict related to bullying, shadeism, or discrimination</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">students apply key vocabulary accurately (shadeism, colorism, identity, belonging, One Drop Rule)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">story reflects empathy, anti-racism, and anti-bullying themes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">story includes a moral or takeaway that promotes pride and inclusion</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses narrative structure effectively (beginning/middle/end)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">story is age-appropriate in language, length, and message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student incorporates visuals that strengthen meaning and engagement</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participates respectfully in sharing and feedback</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">story planner showing clear planning of plot, characters, conflict, and moral</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">completed children&rsquo;s story or comic demonstrating understanding of key concepts</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">peer feedback or revision notes showing improvements in clarity, structure, voice, and message</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">edited writing demonstrating appropriate sentence structure, vocabulary, and conventions</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written or oral explanations describing writing choices and revisions</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">peer feedback notes or conferencing records</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting learning, growth, and understanding of identity and equity concepts</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">teacher observations of collaboration, engagement, and responsible work habits</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:56:27', '2026-01-23 06:56:27');
INSERT INTO `tasks` (`id`, `lesson_id`, `title`, `slug`, `sort_order`, `body`, `created_at`, `updated_at`) VALUES
(12, 11, 'Connections – Societies Coloring Book', 'connections-societies-coloring-book', 0, '<h3 dir=\"ltr\">Connections &ndash; Societies Coloring Book</h3>\r\n<h3 dir=\"ltr\">Teacher Background Information</h3>\r\n<p dir=\"ltr\">This culminating activity offers students an opportunity to reflect on the central themes of identity, representation, and social narratives explored throughout the unit on shadeism, colorism, and historical misrepresentation. The video &ldquo;Society&rsquo;s Coloring Book&rdquo; offers a compelling visual metaphor for how individuals and communities are &ldquo;colored in&rdquo; by societal expectations, stereotypes, and cultural assumptions&mdash;both positively and negatively.</p>\r\n<p dir=\"ltr\">The power of this task lies in its ability to inspire students to make personal, social, and historical connections. It affirms the dignity of every learner, especially Black students who may have internalized negative stereotypes about skin tone or ancestry. Simultaneously, it invites all students to critically consider how language, media, and education influence how people see themselves and others.</p>\r\n<p dir=\"ltr\">Though grounded in English literacy&mdash;personal reflection, comprehension, inference, and formal writing&mdash;this task draws from Civics and Social Sciences. It also fosters empathy, self-awareness, and critical thinking&mdash;skills that are essential across all subject areas.</p>\r\n<p dir=\"ltr\">This activity can appeal to a wide audience, including those unfamiliar with or hesitant toward equity-based learning. It asks students not to adopt a political stance but to reflect deeply on their humanity and how stories, including their own, are shaped by larger systems and beliefs. The focus is not blame, but insight, dignity, and action.</p>\r\n<h3 dir=\"ltr\">Learning Goals</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">reflect on the metaphorical and literal messages presented in the video Society&rsquo;s Coloring Book (C1.4, C3.1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make personal and academic connections to prior learning related to shadeism, colorism, identity, and representation (A1.1, C2.5)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">develop a personal voice in writing by crafting a clear and focused 2&ndash;3 paragraph reflective response (D2.3, D1.2)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use relevant evidence from the video and course discussions to support insights and interpretations (C3.2, C1.4)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make interdisciplinary connections across media studies, history, and English language learning (A1.1, A3.1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply critical thinking by examining social and historical contexts related to identity, representation, and equity (C3.6, A3.2)</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Success Criteria</h3>\r\n<p dir=\"ltr\">Students:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">identify and accurately summarize the central message and themes presented in the video &ldquo;Society&rsquo;s Coloring Book.&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">respond to the video using clear, thoughtful, and well-developed personal reflection.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">make meaningful connections between the video and previous learning about shadeism, colorism, identity, representation, African kings/queens, or historical context.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">apply critical thinking by addressing at least one of the guiding questions in a reflective and analytical way.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">support insights with evidence from the video, unit discussions, or previous activities (e.g., One Drop Rule, Hidden Black Royalty).</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">demonstrate understanding of both metaphorical and literal meanings presented in the video.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">write 2&ndash;3 coherent, organized paragraphs that show control of voice, tone, and structure.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">integrate a quote or reference from the video or another task when appropriate to strengthen their response (optional but encouraged).</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use appropriate language conventions, sentence structure, and vocabulary to communicate their ideas effectively.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">show awareness of historical thinking concepts such as continuity and change and cause and consequence through textual connections.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Estimated Time: 60&ndash;80 minutes &ndash; approx. 1&ndash;2 class periods</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">introduction to the task and review of reflection focus (metaphor, identity, representation): 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">first viewing of Society&rsquo;s Coloring Book (uninterrupted): 15 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">second viewing with guided prompts and note-taking: 5&ndash;7 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">whole-class or small-group discussion of metaphorical and literal messages: 10&ndash;15 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">independent reflective writing (2&ndash;3 paragraphs) using evidence from the video and discussions: 20&ndash;25 minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">brief consolidation, sharing, or self-reflection check-in: 5&ndash;8 minutes</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Teacher Instructions</h3>\r\n<p dir=\"ltr\">Instruct students to:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the video: Society&rsquo;s Coloring Book<br><a href=\"https://youtu.be/BoUecy2umXo\">https://www.google.com/url?q=https://youtu.be/BoUecy2umXo&amp;sa=D&amp;source=editors&amp;ust=1769053797068934&amp;usg=AOvVaw1_zygG0O2bTz4hZ65QRD8Y<br></a>(12:19 min) once without stopping.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Watch the video a second time, and think about the following guiding questions:</p>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Why do you think the video is entitled &ldquo;Society&rsquo;s Coloring Book&rdquo;?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What stood out or resonated with you?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What life lessons can be taken from the video?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">What were you thinking as the video ended?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Was there something you didn&rsquo;t fully understand?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How does this video connect to the controversies around African Kings and Queens?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Can you relate this to your own life or something you&rsquo;ve seen or heard?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Does anything in the video support the background info from earlier in this unit?</p>\r\n</li>\r\n</ul>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Write a 2&ndash;3 paragraph response that includes:</p>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">A brief summary of the video&rsquo;s message.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Personal reflection on what the video made you think or feel.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">A connection to something you learned earlier in the unit.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Optional: Include a short quote from the video or another activity to support your ideas.</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Exit Ticket</h3>\r\n<p dir=\"ltr\">Use this exit ticket at the end of Task 8 to check each student&rsquo;s understanding, reflection, and use of evidence after viewing Society&rsquo;s Coloring Book.</p>\r\n<p dir=\"ltr\">Explain to students that the exit ticket:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">helps them reflect on the metaphorical and literal messages in the video,</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">confirms their ability to connect the video to prior learning about shadeism, colorism, identity, and representation, and</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">provides feedback on how clearly they can support their ideas using evidence from the video and class discussions.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Give students 5&ndash;8 minutes to complete the exit ticket independently. Students may respond using paper, a Google Form, or a posted Google Slide. Encourage students to be honest about what stood out to them, how the video challenged or affirmed their thinking, and how confident they feel explaining their interpretation.</p>\r\n<p dir=\"ltr\">Collect the exit ticket before students move on. Use responses to identify students who may need additional support with interpreting metaphor, making academic connections, or using evidence effectively in reflective writing.</p>\r\n<h3 dir=\"ltr\">Teacher Look Fors</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student identifies and explains both literal and metaphorical messages in the video</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student makes clear connections to prior learning about shadeism, colorism, identity, or representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student interprets symbolism, imagery, or narrative voice accurately</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student supports ideas using specific evidence from the video or class discussions</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student communicates personal reflections clearly in oral or written form</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student demonstrates critical thinking when discussing social or historical implications</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student uses appropriate academic vocabulary related to media and identity</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">student participates respectfully and thoughtfully in discussion or sharing</p>\r\n</li>\r\n</ul>\r\n<h3 dir=\"ltr\">Assessment Evidence</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">written reflective responses identifying literal and metaphorical messages in the video</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">references to specific images, scenes, narration, or symbols from the video used as evidence</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">connections made between the video and prior learning about shadeism, colorism, identity, or representation</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">explanations demonstrating understanding of symbolism, metaphor, or narrative voice</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">reflective writing (2&ndash;3 paragraphs) communicating personal and academic insights clearly</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">use of appropriate academic vocabulary related to media analysis and identity</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">contributions during whole-class or small-group discussions demonstrating critical thinking</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">exit ticket responses reflecting comprehension, interpretation, and use of evidence</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2026-01-23 06:57:17', '2026-01-23 06:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `task_completions`
--

CREATE TABLE `task_completions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_notes`
--

CREATE TABLE `task_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_resources`
--

CREATE TABLE `task_resources` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_resources`
--

INSERT INTO `task_resources` (`id`, `task_id`, `type`, `title`, `url`, `sort_order`, `created_at`, `updated_at`) VALUES
(5, 5, 'link', 'Black is Beautiful Source: YouTube. Accessed 2025', 'https://youtu.be/VUZAswMWIuw', 0, '2026-01-23 06:43:37', '2026-01-23 06:43:37'),
(6, 6, 'link', '', '', 0, '2026-01-23 06:45:55', '2026-01-23 06:45:55'),
(7, 7, 'link', 'Shadeism and the Spoken Word Source: YouTube. Accessed 2025', 'https://youtu.be/TrjMER06gso', 0, '2026-01-23 06:49:04', '2026-01-23 06:49:04'),
(8, 7, 'link', 'Colorism Source: YouTube. Accessed 2025', 'https://youtu.be/_L4-mOJWhIE', 1, '2026-01-23 06:49:04', '2026-01-23 06:49:04'),
(9, 7, 'link', 'Reflection Media Chart Organizer-14PD Source: created by My Place In This World, 2025', 'https://docs.google.com/document/d/1w-LIbvJx_-pyXR4xHTOXGXDLqWuaNyU_/copy', 2, '2026-01-23 06:49:04', '2026-01-23 06:49:04'),
(10, 7, 'link', 'Media Analysis Organizer – Part E Source: created by My Place In This World, 2025', 'https://docs.google.com/document/d/1I7W70gI4TEHqo8qNhFZO8M2R5P2PlpVrkaH7qwt0oj4/copy', 3, '2026-01-23 06:49:04', '2026-01-23 06:49:04'),
(11, 8, 'link', 'What is the One Drop Rule? Source: YouTube. Accessed 2025', 'https://youtu.be/BrbppVlPpG4', 0, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(12, 8, 'link', 'One Drop Rule – Main Ideas Organizer.” Source-created by My Place In This World, 2025', 'https://docs.google.com/drawings/d/1PffYcNxzoE8ZeEbKLyAdtUgVVCHZOlz7UV_TuTGUldg/copy', 1, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(13, 8, 'link', 'Dr. Yaba Blay – CNN Interview Source: Youtube. Accessed 2025', 'https://youtu.be/gqvVYVOGRaw', 2, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(14, 8, 'link', 'Toronto Star – Students Challenge Shadeism Source: Toronto Star. Accessed 2025', 'https://www.thestar.com/news/gta/2013/05/19/students_in_oshawa_challenge_shadeism.html', 3, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(15, 8, 'link', 'Shadeism/Colorism in the Media Source: Global News Accessed 2025', 'https://globalnews.ca/news/5302019/shadeism-colourism-racism-canada/', 4, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(16, 8, 'link', 'One Drop Rule – Article Source: ABC News Accessed 2025', 'https://abcnews.go.com/Health/halle-berry-cites-drop-rule-daughter-black-white/story?id=12869789', 5, '2026-01-23 06:51:54', '2026-01-23 06:51:54'),
(17, 9, 'link', '“The Queen Sheba – Black is Beautiful”', 'https://youtu.be/N-42EanFf-o', 0, '2026-01-23 06:53:01', '2026-01-23 06:53:01'),
(18, 10, 'link', 'Colourism', 'https://www.darkisbeautiful.in/colourism/', 0, '2026-01-23 06:54:46', '2026-01-23 06:54:46'),
(19, 10, 'link', 'Create a Collage with Found Items', 'https://youtu.be/pOu5oQNw_KU?si=BbPw43GFECQlEAyM', 1, '2026-01-23 06:54:46', '2026-01-23 06:54:46'),
(20, 10, 'link', 'Collage Essentials', 'https://youtu.be/uDwhqaDfIRQ?si=WNop3d9IvKpBIb8t', 2, '2026-01-23 06:54:46', '2026-01-23 06:54:46'),
(21, 10, 'link', 'Organizer Template', 'https://docs.google.com/document/d/1aLEhmzIKVEZ5Q3jSpGOfo5DURRQ2mQub/copy', 3, '2026-01-23 06:54:46', '2026-01-23 06:54:46'),
(22, 11, 'link', 'Korea’s First African-Korean Model', 'https://youtu.be/ntPVbVLWIkY', 0, '2026-01-23 06:56:27', '2026-01-23 06:56:27'),
(23, 11, 'link', 'Story Planner Graphic Organizer-Act14/T7H', 'https://docs.google.com/document/d/1DMaoqVzgLuKgwquSH_gtkG_F-QXYTN2z/copy', 1, '2026-01-23 06:56:27', '2026-01-23 06:56:27'),
(24, 11, 'link', 'Hidden Black Royalty', 'https://youtu.be/CkxwRUbqjRs', 2, '2026-01-23 06:56:27', '2026-01-23 06:56:27'),
(25, 12, 'link', 'Society’s Coloring Book', 'https://youtu.be/BoUecy2umXo', 0, '2026-01-23 06:57:17', '2026-01-23 06:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_message_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_internal_note` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `social_links` json DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `designation`, `level`, `bio`, `social_links`, `profile_photo_path`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `school_id`) VALUES
(1, 'Admin', 'team@myplaceinthisworld.ca', '+1 (519) 222-1503', '8721 Broadway Avenue, New York, NY 10023', 'Administrator', 'Owner', 'Inspiring Excellence Through Education', '{\"website\": \"https://www.linkedin.com/in/my-place-in-this-world-3892b42b3/\"}', 'profile-photos/kS0KUFwB0X2ToyUfYupP6ATo9jGVgGjQqyNXzi7k.png', '2026-01-03 00:34:03', '$2y$12$wZNLQYJCwYD8uC8mztdiaO9MJ8hxMfjG0.iMfMsi3XlqvrnDTXsnK', NULL, '2026-01-03 07:26:36', '2026-01-03 08:25:01', NULL),
(2, 'given messam-harris', 'givenmessamharris@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 00:34:03', '$2y$12$i56mRn0gXNVb15RXbPXLheL6mNZCteU4ggCNMk1bTXnOR4SDJ1Oga', NULL, '2026-01-05 17:41:01', '2026-01-05 17:41:01', 1),
(3, 'pk', 'pubgpantheropdffdf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 00:34:03', '$2y$12$HgwLTIzA8iUMfAIftr/l0OVmj07fT2GNqQJp2tp8G1AQMXS8Kl.G2', NULL, '2026-01-05 21:41:44', '2026-01-05 21:44:03', 2),
(4, 'PK', 'kakadiyapantth@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 00:34:03', '$2y$12$VsrLC6T0m269X8zMkMHjle7StJaoMst2dcB0tjYU/TsGiUiSh6Zeu', NULL, '2026-01-05 21:48:17', '2026-01-05 21:48:17', 3),
(5, 'pk', 'pubgpantherop@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$6hIXT/Vsy64QHpjSImYDDe5C9OffcN1/EXriJn/M6K533JM0cD3kW', NULL, '2026-01-05 22:55:37', '2026-01-05 22:55:37', 4),
(6, 'given trial', 'tempusergivenharris@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-21 00:21:33', '$2y$12$CudlcfowACZXmkblHwk22uMcl.qC3kWGd5tiDGl2UXBuJfmuC2YDa', NULL, '2026-01-21 00:21:13', '2026-01-21 00:21:33', 5),
(8, 'cranberry', 'carharttmikey@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-22 20:30:15', '$2y$12$6z95FmDn2fnMv5tZ4w41KO2lIHxsRnf2E/eGoXWHD77z1JIuqkX0u', NULL, '2026-01-22 20:30:15', '2026-01-22 20:30:15', 1),
(9, 'Dilkhush', 'dilkhushyadav@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-23 06:19:02', '$2y$12$TUIsWl.jdq2HvhRaGsOm7e5OnPVoew83Ce3qNmORLJ7Z6WT7A02Cm', NULL, '2026-01-23 06:18:35', '2026-01-23 06:19:02', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chat_knowledge_docs`
--
ALTER TABLE `chat_knowledge_docs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chat_knowledge_docs_key_unique` (`key`),
  ADD KEY `chat_knowledge_docs_language_index` (`language`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_chat_session_id_created_at_index` (`chat_session_id`,`created_at`);

--
-- Indexes for table `chat_sessions`
--
ALTER TABLE `chat_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_sessions_user_id_last_activity_at_index` (`user_id`,`last_activity_at`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_messages_ticket_number_unique` (`ticket_number`),
  ADD KEY `contact_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`),
  ADD KEY `galleries_user_id_foreign` (`user_id`),
  ADD KEY `galleries_school_id_foreign` (`school_id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `gallery_likes`
--
ALTER TABLE `gallery_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `like_unique_user` (`gallery_id`,`user_id`),
  ADD UNIQUE KEY `like_unique_ip` (`gallery_id`,`ip_address`),
  ADD KEY `gallery_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessons_course_id_slug_unique` (`course_id`,`slug`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_memberships`
--
ALTER TABLE `school_memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_memberships_school_id_foreign` (`school_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tasks_lesson_id_slug_unique` (`lesson_id`,`slug`);

--
-- Indexes for table `task_completions`
--
ALTER TABLE `task_completions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `task_completions_user_id_task_id_unique` (`user_id`,`task_id`),
  ADD KEY `task_completions_task_id_foreign` (`task_id`);

--
-- Indexes for table `task_notes`
--
ALTER TABLE `task_notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `task_notes_user_id_task_id_unique` (`user_id`,`task_id`),
  ADD KEY `task_notes_task_id_foreign` (`task_id`);

--
-- Indexes for table `task_resources`
--
ALTER TABLE `task_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_resources_task_id_foreign` (`task_id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_contact_message_id_foreign` (`contact_message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_school_id_foreign` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_knowledge_docs`
--
ALTER TABLE `chat_knowledge_docs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery_likes`
--
ALTER TABLE `gallery_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_memberships`
--
ALTER TABLE `school_memberships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task_completions`
--
ALTER TABLE `task_completions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_notes`
--
ALTER TABLE `task_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_resources`
--
ALTER TABLE `task_resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_chat_session_id_foreign` FOREIGN KEY (`chat_session_id`) REFERENCES `chat_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_sessions`
--
ALTER TABLE `chat_sessions`
  ADD CONSTRAINT `chat_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_likes`
--
ALTER TABLE `gallery_likes`
  ADD CONSTRAINT `gallery_likes_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gallery_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_memberships`
--
ALTER TABLE `school_memberships`
  ADD CONSTRAINT `school_memberships_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_completions`
--
ALTER TABLE `task_completions`
  ADD CONSTRAINT `task_completions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_completions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_notes`
--
ALTER TABLE `task_notes`
  ADD CONSTRAINT `task_notes_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_resources`
--
ALTER TABLE `task_resources`
  ADD CONSTRAINT `task_resources_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_contact_message_id_foreign` FOREIGN KEY (`contact_message_id`) REFERENCES `contact_messages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
