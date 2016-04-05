--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `createdAt` datetime NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `createdAt`, `postId`) VALUES
  (17, 'Lorem ipsum dolor sit amet, perfecto periculis ex sed, ea homero laoreet scribentur sea. Vidisse fastidii nominati sed no, mei ad elit probo voluptua. Sit nostro neglegentur ex, te audiam vocibus mea, sed ne simul euismod inimicus. Eam ne alterum maluisset, dico alia adversarium ne eam.', '2016-04-05 07:55:00', 2),
  (18, 'Erat torquatos adolescens sit ei, ius ut nullam noluisse. Tota dolore verear mel ei, qui esse persius antiopam ne. Eu aeque assueverit delicatissimi nec, dignissim scriptorem has et.', '2016-04-05 07:55:36', 2),
  (19, 'Atqui recusabo ad per, cu detraxit consulatu dissentias cum. Sit nominavi perpetua et, ferri possit efficiantur his id. Ius et commodo indoctum.\n', '2016-04-05 18:02:09', 3),
  (21, 'Et paulo petentium eam. Aperiri perfecto assentior ut qui, ludus tation putant ei qui, at vim fastidii ullamcorper.', '2016-04-05 18:15:02', 3),
  (23, 'prompta patrioque sit et. Cu nam illud deleniti luptatum, mea idque oratio cu, ei altera mediocrem quo.', '2016-04-05 18:37:13', 3),
  (25, 'Easily add a heading container to your panel with', '2016-04-05 18:38:44', 3),
  (57, 'asdfasdfasf', '2016-04-06 01:07:41', 3),
  (58, 'asdfasfasdf', '2016-04-06 01:07:44', 3),
  (59, 'adfa sdfkla;sldfkas d', '2016-04-06 01:07:50', 3),
  (60, 'asdfa sdf', '2016-04-06 01:07:53', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `email`, `message`, `createdAt`) VALUES
  (2, 'Post Two', 'anonym2@gmail.com', 'Here is the page in question. Learn it. Live it. Love it. Open it in a new tab and don''t come back until you''ve hit', '2016-04-05 23:01:55'),
  (3, 'Post Three', 'anonym@gmail.com', '<p>The first child of the root element is usually the <code>&lt;head&gt;</code> element. The <code>&lt;head&gt;</code> element contains metadata information <em>about</em> the page, rather than the body of the page itself. (The body of the page is, unsurprisingly, contained in the <code>&lt;body&gt;</code> element.) The <code>&lt;head&gt;</code> element itself is rather boring, and it hasn''t changed in any interesting way in <abbr>HTML5</abbr>. The good stuff is what''s <em>inside</em> the <code>&lt;head&gt;</code> element. And for that, we turn once again to <a href="examples/blog-original.html">our example page</a>:\n\n</p>', '2016-04-05 23:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `post-id-index` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_post` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
