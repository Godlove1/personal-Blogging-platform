-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 08:21 AM
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
(1, '\"eryeryryer\" it\'s', 'https://twitter.com/home', 'https://twitter.com/BeautyMassi?s=20&t=KltyOYnwp63O8BUXfW74_A', 'https://www.youtube.com/@Massivlogs', 'https://www.youtube.com/@Massivlogs', 'marthapp-1371.jpg');

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
  `post_seo` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog_posts`
--

INSERT INTO `tbl_blog_posts` (`id`, `title`, `cat_id`, `post_status`, `cover_image`, `post_content`, `post_seo`, `date`) VALUES
(5, 'How to Make Your Future Habits Easy', 1, 1, 'massiblog-6405.webp', '<p>While researching&nbsp;<a href=\"http://atomichabits.com/\">Atomic Habits</a>, I came across a story that immediately struck me with its simplicity and power. It was the story of Oswald Nuckols, an IT developer from Natchez, Mississippi, and his simple strategy for making future habits easy.</p>\r\n<p>Nuckols refers to the approach as &ldquo;resetting the room.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/reset-the-room\" rel=\"footnote\" name=\"note-1-31673\" data-footnote-number=\"1\" data-footnote-identifier=\"1\" data-footnote-content=\"&lt;p&gt;Oswald Nuckols is an alias, used by request.&lt;/p&gt;\"></a></p>\r\n<p>For instance, when he finishes watching television, he places the remote back on the TV stand, arranges the pillows on the couch, and folds the blanket. When he leaves his car, he throws any trash away. Whenever he takes a shower, he wipes down the toilet while the shower is warming up. (As he notes, the &ldquo;perfect time to clean the toilet is right before you wash yourself in the shower anyway.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/reset-the-room\" rel=\"footnote\" name=\"note-2-31673\" data-footnote-number=\"2\" data-footnote-identifier=\"2\" data-footnote-content=\"&lt;p&gt;Saul_Panzer_NY, &ldquo;[Question] What One Habit Literally Changed Your Life?&rdquo; Reddit, June 5, 2017, https://www.reddit.com/r/getdisciplined/comments/6fgqbv/question_what_one_habit_literally_changed_your/diieswq.&lt;/p&gt;\"></a>)</p>\r\n<p>This might sound like he&rsquo;s just &ldquo;cleaning up&rdquo; but there is a key insight that makes his approach different. The purpose of resetting each room is not simply to clean up after the last action, but to prepare for the next action.</p>\r\n<p>&ldquo;When I walk into a room everything is in its right place,&rdquo; Nuckols wrote. &ldquo;Because I do this every day in every room, stuff always stays in good shape&nbsp;.&nbsp;.&nbsp;. People think I work hard but I&rsquo;m actually really lazy. I&rsquo;m just proactively lazy. It gives you so much time back.&rdquo;</p>\r\n<p>I have written previously about&nbsp;<a href=\"https://jamesclear.com/power-of-environment\">the power of the environment to shape your behavior</a>. Resetting the room is one way to put the power back in your own hands. Let&rsquo;s talk about how you can use it.</p>\r\n<h2 id=\"title_0\">The Power of Priming the Environment</h2>\r\n<p>Whenever you organize a space for its intended purpose, you are priming it to make the next action easy. This is one of the most practical and simple ways to improve your habits.</p>\r\n<p>For instance, my wife keeps a box of greeting cards that are presorted by occasion&mdash;birthday, sympathy, wedding, graduation, and more. Whenever necessary, she grabs an appropriate card and sends it off. She is incredibly good at remembering to send cards because she has reduced the friction of doing so.</p>\r\n<p>For years, I was the opposite. Someone would have a baby and I would think, &ldquo;I should send a card.&rdquo; But then weeks would pass and by the time I remembered to pick one up at the store, it was too late. The habit wasn&rsquo;t easy.</p>', '', '2022-12-13'),
(6, 'Why Facts Don’t Change Our Minds . Testing the ultimate power and bad effects of havibg very long article titles on website is very bad and teribel', 1, 1, 'massiblog-6734.webp', '<h2 id=\"title_0\">The Logic of False Beliefs</h2>\r\n<p>Humans need a reasonably accurate view of the world in order to survive. If your model of reality is wildly different from the actual world, then you struggle to take effective actions each day.<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-1-23317\" data-footnote-number=\"1\" data-footnote-identifier=\"1\" data-footnote-content=\"&lt;p&gt;Technically, your perception of the world is a hallucination. Every living being perceives the world differently and creates its own &ldquo;hallucination&rdquo; of reality. But I would say most of us have a &ldquo;reasonably accurate&rdquo; model of the actual physical reality of the universe. For example, when you drive down the road, you do not have full access to every aspect of reality, but your perception is accurate enough that you can avoid other cars and conduct the trip safely.&lt;/p&gt;\"></a></p>\r\n<p>However, truth and accuracy are not the only things that matter to the human mind. Humans also seem to have a deep desire to belong.</p>\r\n<p>In&nbsp;<a href=\"http://atomichabits.com/\">Atomic Habits</a>, I wrote, &ldquo;Humans are herd animals. We want to fit in, to bond with others, and to earn the respect and approval of our peers. Such inclinations are essential to our survival. For most of our evolutionary history, our ancestors lived in tribes. Becoming separated from the tribe&mdash;or worse, being cast out&mdash;was a death sentence.&rdquo;</p>\r\n<p>Understanding the truth of a situation is important, but so is remaining part of a tribe. While these two desires often work well together, they occasionally come into conflict.</p>\r\n<p>In many circumstances, social connection is actually more helpful to your daily life than understanding the truth of a particular fact or idea. The Harvard psychologist Steven Pinker put it this way, &ldquo;People are embraced or condemned according to their beliefs, so one function of the mind may be to hold beliefs that bring the belief-holder the greatest number of allies, protectors, or disciples, rather than beliefs that are most likely to be true.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-2-23317\" data-footnote-number=\"2\" data-footnote-identifier=\"2\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">Language, Cognition, and Human Nature: Selected Articles by Steven Pinker</a></p>\r\n<p>&nbsp;</p>\r\n<p>We don&rsquo;t always believe things because they are correct. Sometimes we believe things because they make us look good to the people we care about.</p>\r\n<p>I thought Kevin Simler put it well when he wrote, &ldquo;If a brain anticipates that it will be rewarded for adopting a particular belief, it&rsquo;s perfectly happy to do so, and doesn&rsquo;t much care where the reward comes from &mdash; whether it&rsquo;s pragmatic (better outcomes resulting from better decisions), social (better treatment from one&rsquo;s peers), or some mix of the two.&rdquo;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-3-23317\" data-footnote-number=\"3\" data-footnote-identifier=\"3\" data-footnote-content=\"&lt;p&gt;&lt;a href=\">Crony Beliefs</a> by Kevin Simler</p>\r\n<p>&nbsp;</p>\r\n<p>False beliefs can be useful in a social sense even if they are not useful in a factual sense. For lack of a better phrase, we might call this approach &ldquo;factually false, but socially accurate.&rdquo;&nbsp;<a style=\"box-sizing: border-box; background: none; color: rgb(17, 17, 17); text-decoration: none; padding: 0.325em; border: none; transition: opacity 0.25s ease 0s; position: relative; z-index: 5; top: -0.2em; display: inline; margin: 0px 0.1em 0px 0.2em; height: 0.9em; width: 1.78em; border-radius: 0.6em; cursor: pointer; opacity: 0.5; backface-visibility: hidden; line-height: 0; vertical-align: middle;\" href=\"https://jamesclear.com/why-facts-dont-change-minds\" rel=\"footnote\" name=\"note-4-23317\" data-footnote-number=\"4\" data-footnote-identifier=\"4\" data-footnote-content=\"&lt;p&gt;I am reminded of &lt;a href=\">a tweet</a> I saw recently, which said, &ldquo;People say a lot of things that are factually false but socially affirmed. They&rsquo;re saying stupid things, but they are not stupid. It is intelligent (though often immoral) to affirm your position in a tribe and your deference to its taboos. This is conformity, not stupidity.&rdquo;</p>\r\n<p>When we have to choose between the two, people often select friends and family over facts.</p>\r\n<p>&nbsp;</p>\r\n<p>This insight not only explains why we might hold our tongue at a dinner party or look the other way when our parents say something offensive, but also reveals a better way to change the minds of others.</p>\r\n<h2 id=\"title_1\">Facts Don&rsquo;t Change Our Minds. Friendship Does.</h2>\r\n<p>Convincing someone to change their mind is really the process of convincing them to change their tribe. If they abandon their beliefs, they run the risk of losing social ties. You can&rsquo;t expect someone to change their mind if you take away their community too. You have to give them somewhere to go. Nobody wants their worldview torn apart if loneliness is the outcome.</p>\r\n<p>The way to change people&rsquo;s minds is to become friends with them, to integrate them into your tribe, to bring them into your circle. Now, they can change their beliefs without the risk of being abandoned socially.</p>\r\n<p>The British philosopher Alain de Botton suggests that we simply share meals with those who disagree with us:</p>\r\n<p>&ldquo;Sitting down at a table with a group of strangers has the incomparable and odd benefit of making it a little more difficult to hate them with impunity. Prejudice and ethnic strife feed off abstraction. However, the proximity required by a meal &ndash; something about handing dishes around, unfurling napkins at the same moment, even asking a stranger to pass the salt &ndash; disrupts our ability to cling to the belief that the outsiders who wear unusual clothes and speak in distinctive accents deserve to be sent home or assaulted. For all the large</p>', '', '2022-12-13'),
(18, 'Commodi explicabo D', 5, 1, 'massiblog-6460369b2933f.jpg', '<p>PROJECT UNDERSTANDING AND COMPREHENSION (A7)<br>&nbsp;</p>\r\n<p>Interpretation of Problem statement:</p>\r\n<p>The Student File Evaluation System is a project aimed at evaluating the academic performance of students and determining their eligibility for graduation from a specific university (in this case study, University of Buea). The system is designed to accept student data, such as grades, credits, school, program, and test scores, and compare them against cut-off points to determine the eligibility of students for graduation.</p>\r\n<p>&nbsp;</p>\r\n<p>Problematics, Proposed solution and why it is best:<br>A computerized student file evaluation system offers several advantages over a manual file evaluation system is currently being used whose disadvantages/problems faced using the manual system and how the new system will be preferred.</p>\r\n<p>&nbsp;First and foremost, a computerized system allows for much quicker and more efficient evaluation of student files. With a few clicks, evaluators can access and review all necessary information on a student, rather than sifting through pages of paper records.</p>\r\n<p>With a manual system, it is difficult to keep track of student files over time, and it can be challenging to generate reports or analyze data. A computerized system, on the other hand, allows for easy tracking of student information, which can be used to identify trends and patterns over time</p>\r\n<p>&nbsp;Moreover, a computerized system can provide greater accuracy and reliability than a manual system, as it can automatically perform calculations and comparisons, reducing the risk of human error.&nbsp;</p>\r\n<p>Additionally, a computerized system offers greater security and privacy protections, as access to records can be restricted and logins can be tracked. Finally, a computerized system allows for greater accessibility of records, as they can be easily accessed from multiple locations and by multiple evaluators simultaneously, allowing for faster and more streamlined decision-making processes.</p>\r\n<p>&nbsp;</p>\r\n<p>By gathering this information, evaluators can assess the student\'s performance and progress over time, as well as identify areas where additional support or intervention may be needed. A computerized system can help streamline this process and allow for faster and more efficient evaluation of student files.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>ANALYSIS<br>A System administrator will be responsible for maintaining the system, adding new students, updating student records, and generating pdf reports. Here is a brief demo of how the system will work:</p>\r\n<p>1. Login to the system: The administrator logs into the system using their credentials, after which they will have access to the admin dashboard where they will be able to</p>\r\n<p>2. Add new students: The administrator will be able to add new students to the system by providing the necessary details, including the student\'s name, school, program, and grades as on the student&rsquo;s file.</p>\r\n<p>3. Add new &amp; update Major courses: The administrator will be able to add new major courses to the system.</p>\r\n<p>4. Update student records: The administrator will be able to update the student records in case there are any changes in the student\'s data.</p>\r\n<p>5. Check student eligibility: The school administrator(s) or panel in charge of admitting students into the computer science master&rsquo;s program will be able to check eligible students by selecting a sorting category that is alphabetically by grades, number_of_attempts.&nbsp;</p>\r\n<p>6. Generate admission list: For all eligible students, the system would generate an admission list in alphabetical order, which the administrator could download and print out for analysis.</p>\r\n<p>&nbsp;</p>\r\n<p>Technical Requirements:<br>Frontend/interactivity: HTML5, SCSS/CSS5 and Tailwind, jQuery ui and JavaScript.</p>\r\n<p>Backend: PHP</p>\r\n<p>Query language: MySQL/SQL</p>\r\n<p>Database: PhpMyAdmin</p>\r\n<p>&nbsp;</p>\r\n<p>Non-technical Requirements:<br>1. The system should be user-friendly.</p>\r\n<p>2. The system should be easy to use and secure.</p>\r\n<p>3. The system should be able to generate reports.</p>\r\n<p>4. The system should be able to handle multiple requests simultaneously.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>LOW-LEVEL-DIAGRAM</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>DESIGN</p>\r\n<p>Methology</p>\r\n<p>Agile Methology: The reason for using the Agile development methodology for a web file evaluation system is that it allows for flexibility and adaptability in the development process. This means that changes and improvements can be made quickly and efficiently as the project progresses.</p>\r\n<p>&nbsp;</p>\r\n<p>Architecture:</p>\r\n<p>The system will be built using a three-tier architecture, with a presentation layer (web interface), an application layer (business logic), and a data layer (database).<br>The presentation layer will be built using HTML, CSS, and JavaScript.<br>The application layer will be built using a server-side language such as PHP.<br>The data layer will be built using a relational database management system such as MySQL or PostgreSQL.</p>', 'Explicabo Enim comm', '2023-05-14'),
(21, 'Veniam qui ex et ex', 3, 1, 'massiblog-646037cf7289f.jpg', '<p>dyittttttti</p>', 'Do eos ratione incid', '2023-05-14');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
