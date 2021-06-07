-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 06:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE IF NOT EXISTS `condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `condition`) VALUES
(1, 'Used'),
(3, 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE IF NOT EXISTS `hardware` (
  `id_hard` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `con_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id_hard`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`id_hard`, `item_id`, `type`, `total`, `con_id`) VALUES
(1, 1, 'Logitech', 9, 'Used'),
(2, 3, 'Logitech', 11, 'Used'),
(3, 1, 'Ultra', 2, 'Repair'),
(4, 5, 'Samsung xxx2', 10, 'Ready'),
(5, 4, 'MSI Gaming', 2, 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `itemh`
--

CREATE TABLE IF NOT EXISTS `itemh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `itemh`
--

INSERT INTO `itemh` (`id`, `item`) VALUES
(1, 'Mouse'),
(3, 'Keyboard'),
(4, 'CPU'),
(5, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`) VALUES
(1, 'Office'),
(3, 'Adobe');

-- --------------------------------------------------------

--
-- Table structure for table `reqh`
--

CREATE TABLE IF NOT EXISTS `reqh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `item` varchar(128) NOT NULL,
  `exp` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqh`
--

INSERT INTO `reqh` (`id`, `user`, `email`, `item`, `exp`, `status`) VALUES
(1, 'Atlet Olimpiade', 'tempebacem909@gmail.com', 'CPU', 'Request yang bisa main tetris dengan lancar tanpa patah2', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `reqn`
--

CREATE TABLE IF NOT EXISTS `reqn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `exp` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqn`
--

INSERT INTO `reqn` (`id`, `user`, `email`, `exp`, `status`) VALUES
(1, 'Atlet Olimpiade', 'tempebacem909@gmail.com', 'Internet e kebanteren', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `reqo`
--

CREATE TABLE IF NOT EXISTS `reqo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `exp` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqo`
--

INSERT INTO `reqo` (`id`, `user`, `email`, `exp`, `status`) VALUES
(1, 'Atlet Olimpiade', 'tempebacem909@gmail.com', 'Kursi alias dengklek', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `reqr`
--

CREATE TABLE IF NOT EXISTS `reqr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `exp` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqr`
--

INSERT INTO `reqr` (`id`, `user`, `email`, `exp`, `status`) VALUES
(1, 'Atlet Olimpiade', 'tempebacem909@gmail.com', 'Laptopku processor e AMD digenakno dadi INTEL XEON', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `reqs`
--

CREATE TABLE IF NOT EXISTS `reqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `soft` varchar(128) NOT NULL,
  `exp` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqs`
--

INSERT INTO `reqs` (`id`, `user`, `email`, `soft`, `exp`, `status`) VALUES
(1, 'Atlet Olimpiade', 'tempebacem909@gmail.com', 'Adobe', 'Photoshop', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Ali Hasymi GG', 'tempebacem061099@gmail.com', 'default.jpg', '$2y$10$1s4hWUEGVE9TF/mNnCw9.OVysq7Yok9zIjWEtCwarGE6kO2hRnMge', 1, 1, 1580726540),
(2, 'Atlet Olimpiade', 'tempebacem909@gmail.com', '6823fd728858fe6262d91809b68dbb6788946.jpg', '$2y$10$w64iW8xhQQK32hUXylfcVOWj8Tgt15Nbi9bui4x5joIi5qyjCvw4i', 2, 1, 1580726811),
(3, 'User GG', 'daniel.admn24@gmail.com', 'default.jpg', '$2y$10$JvKIOJmrbUV2ce//h90xTuRRIkXcBcp11HxErRHJQTR1mXdU7kP6C', 2, 1, 1581572893);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
