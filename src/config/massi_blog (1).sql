-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 02:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `massi_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `aboutus` text NOT NULL,
  `fb` text NOT NULL,
  `tw` text NOT NULL,
  `ig` text NOT NULL,
  `yt` text NOT NULL,
  `pp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `aboutus`, `fb`, `tw`, `ig`, `yt`, `pp`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit nesciunt nihil cupiditate, vitae fuga id doloremque quos accusantium eius blanditiis odio incidunt! Totam voluptatem, dicta illo incidunt sunt vero. Error.\r\nDolorum illum amet recusandae in dicta exercitationem tempora a eligendi quibusdam enim sint, quaerat nobis impedit quis sed excepturi illo id cupiditate, labore ad odit. Reprehenderit minus incidunt optio nihil.', 'https://twitter.com/home', 'https://twitter.com/BeautyMassi?s=20&t=KltyOYnwp63O8BUXfW74_A', 'https://t.co/zSs7TrxiVi', 'https://www.youtube.com/@Massivlogs', 'marthapp-1371.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'massi', '3c63ea9217846fc82d68833f8f3ce182');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_posts`
--

CREATE TABLE `tbl_blog_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 is for publish\r\n0 is for draft',
  `cover_image` text NOT NULL,
  `post_content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog_posts`
--

INSERT INTO `tbl_blog_posts` (`id`, `title`, `cat_id`, `post_status`, `cover_image`, `post_content`, `date`) VALUES
(4, 'The Surprising Benefits of Journaling One Sentence Every Day', 1, 1, 'massiblog-4853.webp', '<p>Journaling is simply the act of thinking about your life and writing it down. That&rsquo;s it. Nothing more is needed. But despite its simplicity, the daily journal has played a key role in the careers of many prolific people.</p>\r\n<p>As you might expect, journaling is a favorite habit of many writers. From Mark Twain to Virginia Woolf, Francis Bacon to Joan Didion, John Cheever to Vladimir Nabokov.&nbsp;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-1-32936\" data-footnote-number=\"1\" data-footnote-identifier=\"1\" data-footnote-content=\"&lt;p&gt;Sources: The Bancroft Library at the University of California has a website with digitized versions of many of &lt;a href=\">Mark Twain&rsquo;s journals</a>; <a href=\"https://jamesclear.com/book/a-writers-diary\">A Writer&rsquo;s Diary</a> is a collection of Virginia Woolf&rsquo;s journals; Some of <a href=\"http://dla.library.upenn.edu/cocoon/dla/pacscl/ead.html?rows=100&amp;fq=genre_form_facet%3A%22Quakers%20--%20Diaries%22&amp;id=PACSCL_HAVERFORD_USPHCMC97501004&amp;\">Francis Bacon&rsquo;s journals</a> are archived at the Haverford College Quaker &amp; Special Collections at the University of Pennsylvania; Joan Didion detailed her journaling habit in her essay &ldquo;On Keeping a Notebook&rdquo; in her anthology <a href=\"https://jamesclear.com/book/slouching-towards-bethlehem\">Slouching Towards Bethlehem</a>; A selection of John Cheever&rsquo;s journals was published in&nbsp;<a href=\"https://jamesclear.com/book/the-journals-of-john-cheever\">The Journals of John Cheever</a>; <a href=\"https://jamesclear.com/book/insomniac-dreams\">Insomniac Dreams</a> is Vladimir Nabokov&rsquo;s dream diary.</p>\r\n<p>A journal was rarely far from any of these artists. Susan Sontag once claimed that her journal was&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Journaling has been utilized by scores of brilliant thinkers and inventors. Charles Darwin. Marie Curie. Leonardo da Vinci. Thomas Edison. Albert Einstein.&nbsp;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-3-32936\" data-footnote-number=\"3\" data-footnote-identifier=\"3\" data-footnote-content=\"&lt;p&gt; Sources: Portions of &lt;a href=\">Charles Darwin&rsquo;s Beagle voyage diary</a>; <a href=\"https://www.businessinsider.com/marie-curie-radioactive-papers-2015-8\">Marie Curie</a> kept lab notebooks (they are still radioactive, and will be for another 1500 years); Portions of <a href=\"https://www.bl.uk/collection-items/leonardo-da-vinci-notebook\">Leonardo da Vinci&rsquo;s&nbsp;notebooks</a> are held by the British Library and can be previewed online; <a href=\"http://edison.rutgers.edu/index.htm\">Thomas Edison</a> wrote more than five million pages of notes; Get a peek into <a href=\"https://www.pitt.edu/~jdnorton/Goodies/Zurich_Notebook/\">Albert Einstein&rsquo;s Zurich notebook</a></p>\r\n<p>\"&gt;Similarly, leaders and politicians throughout history have kept journals in one form or another. People like George Washington, Winston Churchill, and Marcus Aurelius.<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-4-32936\" data-footnote-number=\"4\" data-footnote-identifier=\"4\" data-footnote-content=\"&lt;p&gt;Sources: &lt;a href=\">George Washington&rsquo;s diaries</a> on the Library of Congress website; <a href=\"http://www.churchillarchive.com/\">Winston Churchill&rsquo;s personal notes</a> are digitized in an online archive; Marcus Aurelius&rsquo; <a href=\"https://jamesclear.com/book/meditations\">Meditations</a>&nbsp;is a collection of his personal writings.</p>\r\n<p>&nbsp;</p>\r\n<p>\"&gt;In the sporting world, athletes like Katie Ledecky, winner of multiple gold medals, and Eliud Kipchoge, the world record holder in the marathon, rely on journals to reflect on their daily workouts and improve their training.<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-5-32936\" data-footnote-number=\"5\" data-footnote-identifier=\"5\" data-footnote-content=\"&lt;p&gt;Sources: &lt;a href=\">Interview with Katie Ledecky&rsquo;s coach</a>;&nbsp;<a href=\"http://www.sweatelite.co/eliud-kipchoge-full-training-log-leading-marathon-world-record-attempt/\">Eliud Kipchoge&rsquo;s full training log</a>.</p>\r\n<p>&nbsp;</p>\r\n<p>\"&gt;</p>\r\n<p>&nbsp;</p>\r\n<p>Why have so many of history&rsquo;s greatest thinkers spent time journaling? What are the benefits?</p>\r\n<h2 id=\"title_0\">What Journaling Can Do for You</h2>\r\n<p>Nearly anyone can benefit from getting their thoughts out of their head and onto paper. There are more benefits to journaling than I have time to cover here, but allow me to point out a few of my favorites.</p>\r\n<p><strong>Journaling provides the opportunity to learn new lessons from old experiences.</strong>&nbsp;When looking back on her previous journal entries, Virginia Woolf remarked that she often &ldquo;found the significance to lie where I never saw it at the time.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-6-32936\" data-footnote-number=\"6\" data-footnote-identifier=\"6\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">A Writer&rsquo;s Diary</a>&nbsp;by Virginia Woolf.</p>\r\n<p>\"&gt;</p>\r\n<p>&nbsp;</p>\r\n<p>Reading your old journal entries is a bit like reading a great book for a second time. You pick up on new sentences and see the past in a different way. Only this time, you are re-reading the story of your life.</p>\r\n<p><strong>Journaling sharpens your memory.</strong></p>\r\n<p>&nbsp;When Cheryl Strayed wrote her hit book, <em>Wild</em>, she relied heavily on her journal. She recalled, &ldquo;My journal provided the who, what, how, when, and why with a specificity that memory might have blurred, but it also did something more: it offered me a frank and unvarnished portrait of myself at 26 that I couldn&rsquo;t have found anywhere else.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-7-32936\" data-footnote-number=\"7\" data-footnote-identifier=\"7\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">A Long Level Gaze</a> by Cheryl Straye</p>\r\n<p>Time will change your face without you noticing, but it will also change your thoughts without you realizing it. Our beliefs shift slowly as we gain experience and journal entries have the ability to freeze your thoughts in time. Seeing an old picture of yourself can be interesting because it reminds you of what you looked like, but reading an old journal entry can be even more surprising because it reminds you of how you thought.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Journaling motivates you to make the most of each day.</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>There is something about knowing that your day will be recorded that makes you want to make at least one good choice before the sun sets. I will sometimes find myself thinking, &ldquo;I want to have something good to write down tonight.&rdquo;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Journaling provides proof of your progress.</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Writing down one sentence about what went well today gives you something powerful to look at when you&rsquo;re feeling down. When you have a bad day, it can be easy to forget how much progress you have made. But with a journal, it&rsquo;s easier to keep a sense of perspective. One glance at your previous entries and you have proof of how much you have grown over the months and years.</p>\r\n<p>Of course, despite the numerous benefits of journaling, there is one problem.</p>\r\n<p>Many people like the&nbsp;<em>idea</em>&nbsp;of journaling, but few people stick with the&nbsp;<em>act</em>&nbsp;of journaling. It sounds great in theory, but making it a habit is another matter.</p>\r\n<p>This is where we return to Oprah&rsquo;s story.</p>\r\n<h2 id=\"title_1\">The Challenge of Making Journaling a Habit</h2>\r\n<p>In November 2012, after wrapping up her 25-year television career, Oprah wrote, &ldquo;For years I&rsquo;ve been advocating the power and pleasure of being grateful. I kept a gratitude journal for a full decade without fail&mdash;and urged you all to do the same. Then life got busy. My schedule overwhelmed me. I still opened my journal some nights, but my ritual of writing down five things I was grateful for every day started slipping away.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-8-32936\" data-footnote-number=\"8\" data-footnote-identifier=\"8\" data-footnote-content=\"&lt;p&gt;Quotes in this section are from &lt;a href=\">What Oprah Knows for Sure About Gratitude</a> by Oprah Winfrey.</p>\r\n<p>&nbsp;</p>\r\n<p>She picked up one of her old journals.</p>\r\n<p>&ldquo;I wondered why I no longer felt the joy of simple moments,&rdquo; Oprah said. &ldquo;Since 1996 I had accumulated more wealth, more responsibility, more possessions; everything, it seemed, had grown exponentially&mdash;except my happiness. How had I, with all my options and opportunities, become one of those people who never have time to feel delight? I was stretched in so many directions, I wasn&rsquo;t feeling much of anything. Too busy doing.&rdquo;</p>\r\n<p>She admitted, &ldquo;But the truth is, I was busy in 1996, too. I just made gratitude a daily priority. I went through the day looking for things to be grateful for, and something always showed up.&rdquo;</p>\r\n<p>Most people know that journaling is helpful, but they never get around to making it a priority. How can we make journaling frictionless? What is the simplest way that to get the benefits of journaling without it feeling like another obligation?</p>\r\n<h2 id=\"title_2\">How to Make Journaling Easy</h2>\r\n<p>I&rsquo;ve spent a fair bit of time thinking about how to make journaling easy over the past year. In fact, I thought so much about it that I partnered with the premium notebook maker Baron Fig to create the&nbsp;<a href=\"https://www.baronfig.com/products/clear-habit-journal\">Clear Habit Journal</a>&mdash;a combination dot grid notebook, daily journal, and habit tracker that not only makes it easier to journal, but also easier to build any habit.</p>\r\n<p>But before I start hawking my wares, let&rsquo;s get something straight.</p>\r\n<p>Here&rsquo;s the truth: There&rsquo;s no one &ldquo;right&rdquo; way to journal. You can do it wherever you want and in whatever way you want. All you need is a piece of paper or a blank document. However, although there is no right way to journal, there is an easy way to journal&hellip;</p>\r\n<p>Write one sentence per day.</p>\r\n<p>The primary advantage of journaling one sentence each day is that it makes journaling&nbsp;<em>fun</em>. It&rsquo;s easy to do. It&rsquo;s easy to feel successful. And if you feel good each time you finish journaling, then you&rsquo;ll keep coming back to it.</p>\r\n<p>A habit does not have to be impressive for it to be useful.</p>\r\n<h2 id=\"title_3\">Journaling Prompts That Make Journaling Easy</h2>\r\n<p>Let&rsquo;s talk about the process I designed to make journaling a cinch.</p>\r\n<p>Every&nbsp;<a href=\"https://www.baronfig.com/products/clear-habit-journal\">Habit Journal</a>&nbsp;is designed to make the process of keeping a daily journal as easy as possible. It starts with a section called One Line Per Day.</p>\r\n<p>At the top of each One Line Per Day page is space for a journaling prompt. Here are a few examples of journaling prompts you could use:</p>\r\n<ul>\r\n<li>What happened today? (Daily journal)<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-9-32936\" data-footnote-number=\"9\" data-footnote-identifier=\"9\" data-footnote-content=\"&lt;p&gt;I also like a slight variation on this, which I learned from Shawn Blanc who uses &ldquo;Highlight of the Day&rdquo; as his prompt.&lt;/p&gt;\"></a></li>\r\n<li>What am I grateful for today? (Gratitude journal)</li>\r\n<li>What is my most important task today? (Productivity journal)</li>\r\n<li>How did I sleep last night? (Sleep journal)</li>\r\n<li>How do I feel today? (Mood journal)</li>\r\n</ul>\r\n<p>Underneath the prompt are 31 lines. One line for each day of the month. This is where you&rsquo;ll write your one sentence each day.</p>\r\n<p>To start your journaling habit all you have to do is write your prompt for the month and jot down a few words each day. Once the month is complete, you can look back on 31 beautiful journal entries. The entire experience is designed to make journaling so easy that you can&rsquo;t help but do it each day.</p>\r\n<p>That&rsquo;s it. You can see a picture of the One Line Per Day section</p>\r\n<h2 id=\"title_4\">Where to Go From Here</h2>\r\n<p>When a habit feels like an annoyance, you&rsquo;re unlikely to stick with it.</p>\r\n<p>Journaling doesn&rsquo;t need to be a big production. Just write one sentence about what happened during the day. Whether you use&nbsp;<a href=\"https://www.baronfig.com/products/clear-habit-journal\">my habit journal</a>&nbsp;or not is beside the point.</p>\r\n<p>What matters is that you make it easy to show up. As Madeleine L&rsquo;Engle, author of&nbsp;<em>A Wrinkle in Time</em>, put it: &ldquo;Just write a little bit every day.&rdquo;<a style=\"box-sizing: border-box; background: none 0% 0% / 100% 88%; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 1; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/journaling-one-sentence\" rel=\"footnote\" name=\"note-10-32936\" data-footnote-number=\"10\" data-footnote-identifier=\"10\" data-footnote-content=\"&lt;p&gt;Quotation from her biography, &lt;a href=\">Madeleine L&rsquo;Engle</a> by Aaron Rosenberg</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/wPO22JxesYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '2022-12-13'),
(5, 'How to Make Your Future Habits Easy', 1, 1, 'massiblog-6405.webp', '<p>While researching&nbsp;<a href=\"http://atomichabits.com/\">Atomic Habits</a>, I came across a story that immediately struck me with its simplicity and power. It was the story of Oswald Nuckols, an IT developer from Natchez, Mississippi, and his simple strategy for making future habits easy.</p>\r\n<p>Nuckols refers to the approach as &ldquo;resetting the room.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/reset-the-room\" rel=\"footnote\" name=\"note-1-31673\" data-footnote-number=\"1\" data-footnote-identifier=\"1\" data-footnote-content=\"&lt;p&gt;Oswald Nuckols is an alias, used by request.&lt;/p&gt;\"></a></p>\r\n<p>For instance, when he finishes watching television, he places the remote back on the TV stand, arranges the pillows on the couch, and folds the blanket. When he leaves his car, he throws any trash away. Whenever he takes a shower, he wipes down the toilet while the shower is warming up. (As he notes, the &ldquo;perfect time to clean the toilet is right before you wash yourself in the shower anyway.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/reset-the-room\" rel=\"footnote\" name=\"note-2-31673\" data-footnote-number=\"2\" data-footnote-identifier=\"2\" data-footnote-content=\"&lt;p&gt;Saul_Panzer_NY, &ldquo;[Question] What One Habit Literally Changed Your Life?&rdquo; Reddit, June 5, 2017, https://www.reddit.com/r/getdisciplined/comments/6fgqbv/question_what_one_habit_literally_changed_your/diieswq.&lt;/p&gt;\"></a>)</p>\r\n<p>This might sound like he&rsquo;s just &ldquo;cleaning up&rdquo; but there is a key insight that makes his approach different. The purpose of resetting each room is not simply to clean up after the last action, but to prepare for the next action.</p>\r\n<p>&ldquo;When I walk into a room everything is in its right place,&rdquo; Nuckols wrote. &ldquo;Because I do this every day in every room, stuff always stays in good shape&nbsp;.&nbsp;.&nbsp;. People think I work hard but I&rsquo;m actually really lazy. I&rsquo;m just proactively lazy. It gives you so much time back.&rdquo;</p>\r\n<p>I have written previously about&nbsp;<a href=\"https://jamesclear.com/power-of-environment\">the power of the environment to shape your behavior</a>. Resetting the room is one way to put the power back in your own hands. Let&rsquo;s talk about how you can use it.</p>\r\n<h2 id=\"title_0\">The Power of Priming the Environment</h2>\r\n<p>Whenever you organize a space for its intended purpose, you are priming it to make the next action easy. This is one of the most practical and simple ways to improve your habits.</p>\r\n<p>For instance, my wife keeps a box of greeting cards that are presorted by occasion&mdash;birthday, sympathy, wedding, graduation, and more. Whenever necessary, she grabs an appropriate card and sends it off. She is incredibly good at remembering to send cards because she has reduced the friction of doing so.</p>\r\n<p>For years, I was the opposite. Someone would have a baby and I would think, &ldquo;I should send a card.&rdquo; But then weeks would pass and by the time I remembered to pick one up at the store, it was too late. The habit wasn&rsquo;t easy.</p>', '2022-12-13'),
(6, 'Why Facts Don’t Change Our Minds . Testing the ultimate power and bad effects of havibg very long article titles on website is very bad and teribel', 1, 1, 'massiblog-6734.webp', '<h2 id=\"title_0\">The Logic of False Beliefs</h2>\r\n<p>Humans need a reasonably accurate view of the world in order to survive. If your model of reality is wildly different from the actual world, then you struggle to take effective actions each day.<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-1-23317\" data-footnote-number=\"1\" data-footnote-identifier=\"1\" data-footnote-content=\"&lt;p&gt;Technically, your perception of the world is a hallucination. Every living being perceives the world differently and creates its own &ldquo;hallucination&rdquo; of reality. But I would say most of us have a &ldquo;reasonably accurate&rdquo; model of the actual physical reality of the universe. For example, when you drive down the road, you do not have full access to every aspect of reality, but your perception is accurate enough that you can avoid other cars and conduct the trip safely.&lt;/p&gt;\"></a></p>\r\n<p>However, truth and accuracy are not the only things that matter to the human mind. Humans also seem to have a deep desire to belong.</p>\r\n<p>In&nbsp;<a href=\"http://atomichabits.com/\">Atomic Habits</a>, I wrote, &ldquo;Humans are herd animals. We want to fit in, to bond with others, and to earn the respect and approval of our peers. Such inclinations are essential to our survival. For most of our evolutionary history, our ancestors lived in tribes. Becoming separated from the tribe&mdash;or worse, being cast out&mdash;was a death sentence.&rdquo;</p>\r\n<p>Understanding the truth of a situation is important, but so is remaining part of a tribe. While these two desires often work well together, they occasionally come into conflict.</p>\r\n<p>In many circumstances, social connection is actually more helpful to your daily life than understanding the truth of a particular fact or idea. The Harvard psychologist Steven Pinker put it this way, &ldquo;People are embraced or condemned according to their beliefs, so one function of the mind may be to hold beliefs that bring the belief-holder the greatest number of allies, protectors, or disciples, rather than beliefs that are most likely to be true.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-2-23317\" data-footnote-number=\"2\" data-footnote-identifier=\"2\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">Language, Cognition, and Human Nature: Selected Articles by Steven Pinker</a></p>\r\n<p>&nbsp;</p>\r\n<p>We don&rsquo;t always believe things because they are correct. Sometimes we believe things because they make us look good to the people we care about.</p>\r\n<p>I thought Kevin Simler put it well when he wrote, &ldquo;If a brain anticipates that it will be rewarded for adopting a particular belief, it&rsquo;s perfectly happy to do so, and doesn&rsquo;t much care where the reward comes from &mdash; whether it&rsquo;s pragmatic (better outcomes resulting from better decisions), social (better treatment from one&rsquo;s peers), or some mix of the two.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-3-23317\" data-footnote-number=\"3\" data-footnote-identifier=\"3\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">Crony Beliefs</a> by Kevin Simler</p>\r\n<p>&nbsp;</p>\r\n<p>False beliefs can be useful in a social sense even if they are not useful in a factual sense. For lack of a better phrase, we might call this approach &ldquo;factually false, but socially accurate.&rdquo;&nbsp;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-4-23317\" data-footnote-number=\"4\" data-footnote-identifier=\"4\" data-footnote-content=\"&lt;p&gt;I am reminded of &lt;a href=\">a tweet</a> I saw recently, which said, &ldquo;People say a lot of things that are factually false but socially affirmed. They&rsquo;re saying stupid things, but they are not stupid. It is intelligent (though often immoral) to affirm your position in a tribe and your deference to its taboos. This is conformity, not stupidity.&rdquo;</p>\r\n<p>When we have to choose between the two, people often select friends and family over facts.</p>\r\n<p>&nbsp;</p>\r\n<p>This insight not only explains why we might hold our tongue at a dinner party or look the other way when our parents say something offensive, but also reveals a better way to change the minds of others.</p>\r\n<h2 id=\"title_1\">Facts Don&rsquo;t Change Our Minds. Friendship Does.</h2>\r\n<p>Convincing someone to change their mind is really the process of convincing them to change their tribe. If they abandon their beliefs, they run the risk of losing social ties. You can&rsquo;t expect someone to change their mind if you take away their community too. You have to give them somewhere to go. Nobody wants their worldview torn apart if loneliness is the outcome.</p>\r\n<p>The way to change people&rsquo;s minds is to become friends with them, to integrate them into your tribe, to bring them into your circle. Now, they can change their beliefs without the risk of being abandoned socially.</p>\r\n<p>The British philosopher Alain de Botton suggests that we simply share meals with those who disagree with us:</p>\r\n<p>&ldquo;Sitting down at a table with a group of strangers has the incomparable and odd benefit of making it a little more difficult to hate them with impunity. Prejudice and ethnic strife feed off abstraction. However, the proximity required by a meal &ndash; something about handing dishes around, unfurling napkins at the same moment, even asking a stranger to pass the salt &ndash; disrupts our ability to cling to the belief that the outsiders who wear unusual clothes and speak in distinctive accents deserve to be sent home or assaulted. For all the large</p>', '2022-12-13'),
(7, 'Our Time in TORONTO,CANADA in a Vlog |Trying out SNACK from EVERY COUNTRY', 2, 1, 'massiblog-4280.webp', '<p data-birdsend-par-index=\"4\">In a lifetime of travel experiences through 50+ countries, this is one that will sit with high definition clarity at the top of my memory box.&nbsp;It is a hidden gem of Jordan. No, make that the Middle East. No make that the World.</p>\r\n<p data-birdsend-par-index=\"5\">In reflection, I only wish I soaked it up more.</p>\r\n<p data-birdsend-par-index=\"6\">Many times with my travels, it&rsquo;s in looking back where I feel the true value of the experience. I always wonder, &ldquo;<strong><em>Why didn&rsquo;t I embrace this fully at the time?&rdquo;</em></strong>&nbsp;Do you find that often with yourself?</p>\r\n<p data-birdsend-par-index=\"7\">I think it&rsquo;s probably because your five senses are taking everything in at once, making it hard to process it all at the time and understand what it means, or how it&rsquo;s moving you.</p>\r\n<p data-birdsend-par-index=\"8\">That&rsquo;s why making time for reflection is so valuable &ndash; and our memories are so precious. As we say,</p>', '2022-12-13'),
(9, 'Boohoo blogger bloggers', 1, 1, 'massiblog-3828.png', '<p>Most people know that journaling is helpful, but they never get around to making it a priority. How can we make journaling frictionless? What is the simplest way that to get the benefits of journaling without it feeling like another obligation?</p>\r\n<p>&nbsp;</p>\r\n<p>How to Make Journaling Easy</p>\r\n<p>I&rsquo;ve spent a fair bit of time thinking about how to make journaling easy over the past year. In fact, I thought so much about it that I partnered with the premium notebook maker Baron Fig to create the Clear Habit Journal&mdash;a combination dot grid notebook, daily journal, and habit tracker that not only makes it easier to journal, but also easier to build any habit.</p>\r\n<p>&nbsp;</p>\r\n<p>But before I start hawking my wares, let&rsquo;s get something straight.</p>\r\n<p>&nbsp;</p>\r\n<p>Here&rsquo;s the truth: There&rsquo;s no one &ldquo;right&rdquo; way to journal. You can do it wherever you want and in whatever way you want. All you need is a piece of paper or a blank document. However, although there is no right way to journal, there is an easy way to journal&hellip;</p>\r\n<p>&nbsp;</p>\r\n<p>Write one sentence per day.</p>\r\n<p>&nbsp;</p>\r\n<p>The primary advantage of journaling one sentence each day is that it makes journaling fun. It&rsquo;s easy to do. It&rsquo;s easy to feel successful. And if you feel good each time you finish journaling, then you&rsquo;ll keep coming back to it.</p>\r\n<p>&nbsp;</p>\r\n<p>A habit does not have to be impressive for it to be useful.</p>\r\n<p>&nbsp;</p>\r\n<p>Journaling Prompts That Make Journaling Easy</p>\r\n<p>Let&rsquo;s talk about the process I designed to make journaling a cinch.</p>\r\n<p>&nbsp;</p>\r\n<p>Every Habit Journal is designed to make the process of keeping a daily journal as easy as possible. It starts with a section called One Line Per Day.</p>\r\n<p>&nbsp;</p>\r\n<p>At the top of each One Line Per Day page is space for a journaling prompt. Here are a few examples of journaling prompts you could use:</p>\r\n<p>&nbsp;</p>\r\n<p>What happened today? (Daily journal)</p>\r\n<p>What am I grateful for today? (Gratitude journal)</p>\r\n<p>What is my most important task today? (Productivity journal)</p>\r\n<p>How did I sleep last night? (Sleep journal)</p>\r\n<p>How do I feel today? (Mood journal)</p>\r\n<p>Underneath the prompt are 31 lines. One line for each day of the month. This is where you&rsquo;ll write your one sentence each day.</p>\r\n<p>&nbsp;</p>\r\n<p>To start your journaling habit all you have to do is write your prompt for the month and jot down a few words each day. Once the month is complete, you can look back on 31 beautiful journal entries. The entire experience is designed to make journaling so easy that you can&rsquo;t help but do it each day.</p>\r\n<p>&nbsp;</p>\r\n<p>That&rsquo;s it. You can see a picture of the One Line Per Day section</p>\r\n<p>Where to Go From Here</p>\r\n<p>When a habit feels like an annoyance, you&rsquo;re unlikely to stick with it.</p>\r\n<p>Journaling doesn&rsquo;t need to be a big production. Just write one sentence about what happened during the day. Whether you use my habit journal or not is beside the point.</p>\r\n<p>&nbsp;</p>\r\n<p>What&nbsp;</p>', '2022-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'LifeStyle'),
(2, 'Travel'),
(3, 'Fashion'),
(5, 'Entertainment'),
(6, 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `comment`, `post_id`, `username`, `date`) VALUES
(1, 'dfjsj', 3, 'good', '0000-00-00'),
(2, 'ok good', 1, 'dalgames', '0000-00-00'),
(3, 'thanks', 1, 'massi', '0000-00-00'),
(4, 'eet', 3, 'godlove_01', '0000-00-00'),
(6, 'cool', 5, 'bereta', '0000-00-00'),
(8, 'Incidunt in sed dol', 7, 'cekynah', '0000-00-00'),
(9, '🔥🔥🔥', 9, 'Stahn', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vlogs`
--

CREATE TABLE `tbl_vlogs` (
  `id` int(11) NOT NULL,
  `name_of_vid` text NOT NULL,
  `thumbnail` text NOT NULL,
  `vid_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vlogs`
--

INSERT INTO `tbl_vlogs` (`id`, `name_of_vid`, `thumbnail`, `vid_link`) VALUES
(9, 'Creation High Season 1 : Episode 2 | SOCIAL MEDIA BATTLE', 'vid-thumb-5506.jpg', 'https://youtu.be/V-TdOeUKDCw'),
(10, 'Diary of a Teenage Girl (Official trailer)', 'vid-thumb-2875.jpg', 'https://youtu.be/VFs0U39Boc8'),
(11, 'How GOD Blessed Me with a 100% FULLY FUNDED Trip to CANADA 4 An EXCHANGE PROGRAM |Apply Too', 'vid-thumb-2906.jpg', 'https://youtu.be/HloDVN1o7Hc'),
(12, 'HOW NOT TO DESTROY YOUR SKIN USING KOJIC ACID SOAP 2021', 'vid-thumb-9932.jpg', 'https://youtu.be/rFUJm1or05M'),
(13, 'Blood & Water |Episode 2 |Anticipation(Netflix)', 'vid-thumb-5480.jpg', 'https://youtu.be/35yx8U3e5zY'),
(14, 'Creation High Season 1 : Episode 1 | NEW SCHOOL, NEW STUDENT', 'vid-thumb-1740.jpg', 'https://youtu.be/CJ29LctwtD4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vlogs`
--
ALTER TABLE `tbl_vlogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_vlogs`
--
ALTER TABLE `tbl_vlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
