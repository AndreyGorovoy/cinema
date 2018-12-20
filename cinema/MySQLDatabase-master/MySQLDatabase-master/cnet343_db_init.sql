-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 01:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cnet343proj`
--
CREATE DATABASE IF NOT EXISTS `cnet343proj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cnet343proj`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
`booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `screening_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(5, 12, 1),
(4, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
`film_id` int(11) NOT NULL,
  `imdb_id` varchar(10) NOT NULL,
  `film_name` varchar(60) NOT NULL,
  `age_rating` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `director` varchar(60) NOT NULL,
  `writers` varchar(60) NOT NULL,
  `language` varchar(60) NOT NULL,
  `origin` varchar(60) NOT NULL,
  `awards` varchar(60) NOT NULL,
  `metascore` int(2) NOT NULL,
  `imdb_rating` float NOT NULL,
  `imdb_votes` int(6) NOT NULL,
  `image_loc` varchar(255) NOT NULL,
  `actors` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `imdb_id`, `film_name`, `age_rating`, `year`, `runtime`, `release_date`, `genre`, `description`, `director`, `writers`, `language`, `origin`, `awards`, `metascore`, `imdb_rating`, `imdb_votes`, `image_loc`, `actors`) VALUES
(1, 'tt0258463', 'The Bourne Identity', '12A', 2002, '119min', '2002-06-14', 'Action, Mystery, Thriller', 'A man is picked up by a fishing boat, bullet-riddled and suffering from amnesia, before racing to elude assassins and regain his memory.', 'Doug Liman', 'Tony Gilroy (screenplay), W. Blake Herron (screenplay), Robe', 'English, French, German, Dutch, Italian', 'USA, Germany, Czech Republic', '3 wins & 4 nominations.', 68, 7.9, 338323, 'http://ia.media-imdb.com/images/M/MV5BMTQ3MDA4MDIyN15BMl5BanBnXkFtZTYwOTg0Njk4._V1_SX300.jpg', 'Matt Damon, Franka Potente, Chris Cooper, Clive Owen'),
(2, 'tt0372183', 'The Bourne Supremacy', '12A', 2004, '108min', '2004-07-23', 'Action, Thriller', 'When Jason Bourne is framed for a CIA operation gone awry, he is forced to resume his former life as a trained assassin to survive.', 'Paul Greengrass', 'Robert Ludlum (novel), Tony Gilroy (screenplay)', 'English, Russian, German, Italian', 'USA, Germany', '5 wins & 20 nominations', 73, 7.8, 285195, 'http://ia.media-imdb.com/images/M/MV5BMTAxODk0MjEyMjZeQTJeQWpwZ15BbWU2MDgzMzExNw@@._V1_SX300.jpg', 'Matt Damon, Franka Potente, Brian Cox, Julia Stiles'),
(4, 'tt0440963', 'The Bourne Ultimatum', '12A', 2007, '115min', '2007-08-03', 'Action, Thriller', 'Jason Bourne dodges a ruthless CIA official and his agents from a new assassination program while searching for the origins of his life as a trained killer.', 'Paul Greengrass', 'Tony Gilroy (screenplay), Scott Z. Burns (screenplay), Georg', 'English, French, Arabic, Russian, Spanish', 'USA, Germany', 'Won 3 Oscars. Another 24 wins & 34 nominations.', 85, 8.1, 398098, 'http://ia.media-imdb.com/images/M/MV5BMTgzNjMwOTM3N15BMl5BanBnXkFtZTcwMzA5MDY0MQ@@._V1_SX300.jpg', 'Matt Damon, Julia Stiles, David Strathairn, Scott Glenn'),
(5, 'tt1194173', 'The Bourne Legacy', '12A', 2012, '135min', '2012-08-10', 'Action, Adventure, Mystery', 'An expansion of the universe from Robert Ludlum''s novels, centered on a new hero whose stakes have been triggered by the events of the previous three films.', 'Tony Gilroy', ' Tony Gilroy (screenplay), Dan Gilroy (screenplay), Tony Gil', 'English, Russian, Filipino', 'USA, Japan', '1 win & 11 nominations', 61, 6.7, 194226, 'http://ia.media-imdb.com/images/M/MV5BMTc4Njk3MDM1Nl5BMl5BanBnXkFtZTcwODgyOTMxOA@@._V1_SX300.jpg', 'Jeremy Renner, Scott Glenn, Stacy Keach, Edward Norton'),
(6, 'tt0903624', 'The Hobbit: An Unexpected Journey', '12A', 2012, '169min', '2012-12-14', 'Adventure, Fantasy', 'A reluctant hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home - and the gold within it - from the dragon Smaug.', 'Peter Jackson', ' Fran Walsh (screenplay), Philippa Boyens (screenplay), Pete', 'English', 'USA, New Zealand', 'Nominated for 3 Oscars. Another 12 wins & 57 nominations.', 58, 8, 524726, 'http://ia.media-imdb.com/images/M/MV5BMTcwNTE4MTUxMl5BMl5BanBnXkFtZTcwMDIyODM4OA@@._V1_SX300.jpg', 'Ian McKellen, Martin Freeman, Richard Armitage, Ken Stott'),
(7, 'tt1170358', 'The Hobbit: The Desolation of Smaug', '12A', 2013, '161min', '0000-00-00', 'Adventure, Fantasy', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.', 'Peter Jackson', ' Fran Walsh (screenplay), Philippa Boyens (screenplay), Pete', 'English', 'USA, New Zealand', 'Nominated for 3 Oscars. Another 15 wins & 70 nominations.', 66, 8, 382989, 'http://ia.media-imdb.com/images/M/MV5BMzU0NDY0NDEzNV5BMl5BanBnXkFtZTgwOTIxNDU1MDE@._V1_SX300.jpg', 'Ian McKellen, Martin Freeman, Richard Armitage, Ken Stott'),
(8, 'tt2310332', 'The Hobbit: The Battle of the Five Armies', '12A', 2014, '144min', '2014-12-17', 'Adventure, Fantasy', 'Bilbo and Company are forced to engage in a war against an array of combatants and keep the Lonely Mountain from falling into the hands of a rising darkness.', 'Peter Jackson', ' Fran Walsh (screenplay), Philippa Boyens (screenplay), Pete', 'English', 'USA, New Zealand', 'Nominated for 1 Oscar. Another 2 wins & 6 nominations.', 59, 7.7, 173637, 'http://ia.media-imdb.com/images/M/MV5BODAzMDgxMDc1MF5BMl5BanBnXkFtZTgwMTI0OTAzMjE@._V1_SX300.jpg', 'Ian McKellen, Martin Freeman, Richard Armitage, Ken Stott'),
(9, 'tt0241527', 'Harry Potter and the Sorcerer''s Stone', 'PG', 2001, '152min', '2001-11-16', 'Adventure, Family, Fantasy', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.', 'Chris Columbus', 'J.K. Rowling (novel), Steve Kloves (screenplay)', 'English', 'UK, USA', 'ominated for 3 Oscars. Another 14 wins & 58 nominations.', 64, 7.5, 369225, 'http://ia.media-imdb.com/images/M/MV5BMTYwNTM5NDkzNV5BMl5BanBnXkFtZTYwODQ4MzY5._V1_SX300.jpg', ' Richard Harris, Maggie Smith, Robbie Coltrane, Saunders Tri'),
(10, 'tt0295297', 'Harry Potter and the Chamber of Secrets', 'PG', 2002, '161min', '2002-11-15', 'Adventure, Family, Fantasy', 'Harry ignores warnings not to return to Hogwarts, only to find the school plagued by a series of mysterious attacks and a strange voice haunting him.', 'Chris Columbus', 'J.K. Rowling (novel), Steve Kloves (screenplay)', 'English', 'UK, USA, Germany', 'Nominated for 3 BAFTA Film Awards. Another 10 wins & 32 nomi', 63, 7.3, 319229, 'http://ia.media-imdb.com/images/M/MV5BMTcxODgwMDkxNV5BMl5BanBnXkFtZTYwMDk2MDg3._V1_SX300.jpg', 'Daniel Radcliffe, Rupert Grint, Emma Watson, Richard Griffit'),
(11, 'tt0304141', 'Harry Potter and the Prisoner of Azkaban', 'PG', 2004, '142min', '2004-06-04', 'Adventure, Family, Fantasy', 'It''s Harry''s third year at Hogwarts; not only does he have a new "Defense Against the Dark Arts" teacher, but there is also trouble brewing. Convicted murderer Sirius Black has escaped the Wizards'' Prison and is coming after Harry.', 'Alfonso Cuarón', 'J.K. Rowling (novel), Steve Kloves (screenplay)', 'English', 'UK, USA', 'Nominated for 2 Oscars. Another 13 wins & 39 nominations.', 82, 7.8, 315927, 'http://ia.media-imdb.com/images/M/MV5BMTY4NTIwODg0N15BMl5BanBnXkFtZTcwOTc0MjEzMw@@._V1_SX300.jpg', 'Daniel Radcliffe, Richard Griffiths, Pam Ferris, Fiona Shaw'),
(12, 'tt0330373', 'Harry Potter and the Goblet of Fire', '12A', 2005, '157min', '2005-11-18', 'Adventure, Family, Fantasy', 'Harry finds himself mysteriously selected as an under-aged competitor in a dangerous tournament between three schools of magic.', 'Mike Newell', 'J.K. Rowling (novel), Steve Kloves (screenplay)', 'English, French', 'UK, USA', 'Nominated for 1 Oscar. Another 11 wins & 38 nominations.', 81, 7.6, 321671, 'http://ia.media-imdb.com/images/M/MV5BMTI1NDMyMjExOF5BMl5BanBnXkFtZTcwOTc4MjQzMQ@@._V1_SX300.jpg', 'Eric Sykes, Timothy Spall, David Tennant, Daniel Radcliffe'),
(13, 'tt0373889', 'Harry Potter and the Order of the Phoenix', '12A', 2007, '138min', '2007-07-11', 'Adventure, Family, Fantasy', 'With their warning about Lord Voldemort''s return scoffed at, Harry and Dumbledore are targeted by the Wizard authorities as an authoritarian bureaucrat slowly seizes power at Hogwarts.', 'David Yates', 'Michael Goldenberg (screenplay), J.K. Rowling (novel)', 'English', 'UK, USA', 'Nominated for 2 BAFTA Film Awards. Another 15 wins & 34 nomi', 71, 7.4, 295395, 'http://ia.media-imdb.com/images/M/MV5BMTM0NTczMTUzOV5BMl5BanBnXkFtZTYwMzIxNTg3._V1_SX300.jpg', ' Daniel Radcliffe, Harry Melling, Jason Boyd, Richard Mackli'),
(14, 'tt0417741', 'Harry Potter and the Half-Blood Prince', 'PG', 2009, '138min', '2009-07-15', 'Adventure, Family, Fantasy', 'As Harry Potter begins his sixth year at Hogwarts, he discovers an old book marked as "the property of the Half-Blood Prince" and begins to learn more about Lord Voldemort''s dark past.', 'David Yates', 'Steve Kloves (screenplay), J.K. Rowling (novel)', 'English', 'UK, USA', 'Nominated for 1 Oscar. Another 7 wins & 27 nominations.', 78, 7.5, 262285, 'http://ia.media-imdb.com/images/M/MV5BNzU3NDg4NTAyNV5BMl5BanBnXkFtZTcwOTg2ODg1Mg@@._V1_SX300.jpg', 'Daniel Radcliffe, Michael Gambon, Dave Legeno, Elarica Galla'),
(16, 'tt0926084', 'Harry Potter and the Deathly Hallows: Part 1', '12A', 2010, '146min', '2010-11-19', 'Adventure, Family, Fantasy', 'As Harry races against time and evil to destroy the Horcruxes, he uncovers the existence of three most powerful objects in the wizarding world: the Deathly Hallows.', 'David Yates', 'Steve Kloves (screenplay), J.K. Rowling (novel)', 'English', 'UK, USA', 'Nominated for 2 Oscars. Another 13 wins & 48 nominations.', 65, 7.7, 268747, 'http://ia.media-imdb.com/images/M/MV5BMTQ2OTE1Mjk0N15BMl5BanBnXkFtZTcwODE3MDAwNA@@._V1_SX300.jpg', 'Bill Nighy, Emma Watson, Richard Griffiths, Harry Melling'),
(17, 'tt1201607', 'Harry Potter and the Deathly Hallows: Part 2', '12A', 2011, '130min', '2011-07-15', 'Adventure, Fantasy, Mystery', 'Harry, Ron and Hermione search for Voldemort''s remaining Horcruxes in their effort to destroy the Dark Lord as the final battle rages on at Hogwarts..', 'David Yates', 'Steve Kloves (screenplay), J.K. Rowling (novel)', 'English', 'UK, USA', 'Nominated for 3 Oscars. Another 48 wins & 75 nominations.', 87, 8.1, 425987, 'http://ia.media-imdb.com/images/M/MV5BMTY2MTk3MDQ1N15BMl5BanBnXkFtZTcwMzI4NzA2NQ@@._V1_SX300.jpg', 'Ralph Fiennes, Michael Gambon, Alan Rickman, Daniel Radcliff'),
(18, 'tt0110912', 'Pulp Fiction', 'R', 1994, '154min', '1994-10-14', 'Crime, Drama, Thriller', 'The lives of two mob hit men, a boxer, a gangster''s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Quentin Tarantino', 'Quentin Tarantino (story), Roger Avary (story)', 'English, Spanish, French', 'USA', 'won 1 Oscar. Another 63 wins & 47 nominations.', 94, 8.9, 1086222, 'http://ia.media-imdb.com/images/M/MV5BMjE0ODk2NjczOV5BMl5BanBnXkFtZTYwNDQ0NDg4._V1_SX300.jpg', 'Tim Roth, Amanda Plummer, Laura Lovelace, John Travolta'),
(19, 'tt0158983', 'South Park: Bigger Longer & Uncut', 'R', 1999, '81 min', '1999-06-30', 'Animation, Comedy, Musical', 'When the four boys see an R-rated movie featuring Canadians Terrance & Phillip, they are pronounced "corrupted", and their parents pressure the United States to wage war against Canada.', 'Trey Parker', 'Trey Parker (television series South Park), Matt Stone (tele', 'English', 'USA', 'Nominated for 1 Oscar. Another 7 wins & 10 nominations.', 73, 7.8, 141, 'http://ia.media-imdb.com/images/M/MV5BMTk4NjQzMTI0MV5BMl5BanBnXkFtZTcwODAxNTIyMQ@@._V1_SX300.jpg', ''),
(20, 'tt2803854', 'Spider Man: Lost Cause', 'N/A', 2014, '140 min', '2014-09-26', 'Action, Comedy, Drama', 'Peter Parker a lone child discovers that his parents were in a horrifying plot to make mankind change. getting bitten by his fathers invention he develops super powers to tries to find ...', 'Joey Lever', 'Joey Lever, Andrew Miles', 'English', 'UK', 'N/A', 0, 7.6, 22, 'N/A', ''),
(21, 'tt2949840', 'Itsy Bitsy Spider-Man', 'TV-', 2013, '23 min', '2013-06-09', 'Animation, Action, Adventure', 'Spider-Man and his team are turned into mini-versions of themselves.', 'Tim Maltby, Alex Soto', 'Kevin Burke, Joe Casey, Joe Kelly, Duncan Rouleau, Steven T.', 'N/A', 'N/A', 'N/A', 0, 6.9, 42, 'http://ia.media-imdb.com/images/M/MV5BMTc1MjcyODk2NV5BMl5BanBnXkFtZTgwMTM5OTQzMDE@._V1_SX300.jpg', ''),
(23, 'tt1392170', 'The Hunger Games', 'PG-', 2012, '142 min', '2012-03-23', 'Adventure, Sci-Fi', 'Katniss Everdeen voluntarily takes her younger sister''s place in the Hunger Games, a televised fight to the death in which two teenagers from each of the twelve Districts of Panem are chosen at random to compete.', 'Gary Ross', 'Gary Ross (screenplay), Suzanne Collins (screenplay), Billy ', 'English', 'USA', 'Nominated for 1 Golden Globe. Another 32 wins & 40 nominatio', 67, 7.3, 572, 'http://ia.media-imdb.com/images/M/MV5BMjA4NDg3NzYxMF5BMl5BanBnXkFtZTcwNTgyNzkyNw@@._V1_SX300.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `screenings`
--

DROP TABLE IF EXISTS `screenings`;
CREATE TABLE IF NOT EXISTS `screenings` (
`screening_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `screening_date` date NOT NULL,
  `screen_number` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screenings`
--

INSERT INTO `screenings` (`screening_id`, `venue_id`, `film_id`, `screening_date`, `screen_number`) VALUES
(1, 1, 1, '2015-02-27', 3),
(2, 1, 6, '2015-02-27', 5),
(3, 2, 1, '2015-02-27', 2),
(4, 3, 1, '2015-02-27', 10),
(5, 3, 17, '2015-03-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `sname` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `sname`, `dob`, `mobile`, `email`, `password`) VALUES
(1, 'Andy', 'Legassick', '1993-09-15', '+447895678931', 'andy.legassick@project.com', 'bcef7a046258082993759bade995b3ae8bee26c7'),
(2, 'Sam', 'Kadoche', '1990-05-17', '+447580351642', 'sam.kadoche@project.com', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0'),
(3, 'andrew', 'Sillifant', '1990-05-14', '+447758623154', 'andrew.sillifant@project.com', '02e0a999c50b1f88df7a8f5a04e1b76b35ea6a88'),
(12, 'James', 'Dingle', '1987-12-01', '+447895861235', 'james.dingle@project.com', '474ba67bdb289c6263b36dfd8a7bed6c85b04943'),
(13, 'admin', 'admin', '0000-00-00', '0000000000000', 'admin@project.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(14, 'Joe', 'Bloggs', '1990-12-25', '+447566821352', 'joe.bloggs@project.com', '16a9a54ddf4259952e3c118c763138e83693d7fd');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

DROP TABLE IF EXISTS `venues`;
CREATE TABLE IF NOT EXISTS `venues` (
`venue_id` int(11) NOT NULL,
  `venue_name` varchar(60) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `postcode`, `latitude`, `longitude`) VALUES
(1, 'Plymouth', 'PL4 0LG', 50.3671, -4.12533),
(2, 'Milton Keynes', 'MK9 3XS', 52.0414, -0.749001),
(3, 'Coventry', 'CV1 3AZ', 52.4077, -1.51912);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`booking_id`), ADD KEY `screening_id_idx` (`screening_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
 ADD PRIMARY KEY (`film_id`), ADD UNIQUE KEY `imdb_id` (`imdb_id`);

--
-- Indexes for table `screenings`
--
ALTER TABLE `screenings`
 ADD PRIMARY KEY (`screening_id`), ADD UNIQUE KEY `venue_id` (`venue_id`,`film_id`), ADD KEY `film_id_idx` (`film_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `mobile` (`mobile`,`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
 ADD PRIMARY KEY (`venue_id`), ADD UNIQUE KEY `venue_name` (`venue_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `screenings`
--
ALTER TABLE `screenings`
MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
ADD CONSTRAINT `screening_id` FOREIGN KEY (`screening_id`) REFERENCES `screenings` (`screening_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `screenings`
--
ALTER TABLE `screenings`
ADD CONSTRAINT `film_id` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
