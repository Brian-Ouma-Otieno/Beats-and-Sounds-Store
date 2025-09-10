-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 08:32 AM
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
-- Database: `beats_and_sounds`
--

-- --------------------------------------------------------

--
-- Table structure for table `aaa`
--

CREATE TABLE `aaa` (
  `id` int(11) NOT NULL,
  `aa` varchar(256) NOT NULL,
  `aaaa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `aaa`
--

INSERT INTO `aaa` (`id`, `aa`, `aaaa`) VALUES
(1, 'hhh', 12),
(2, 'gg', 34),
(3, 'lll', 34),
(4, 'mk', 90),
(5, 'Kazadi', 35),
(6, 'Empire Kid', 33),
(7, 'Empire Kid', 0),
(8, 'Empire Kid', 0),
(9, 'Empire Kid', 33),
(10, 'Empire Kid', 33),
(11, 'Empire Kid', 33),
(12, 'Empire Kid', 33),
(13, '[{\"beat_name\":\"Mombasa\"}]', 0),
(14, '[{\"beat_name\":\"Sambusa\"}]', 40),
(15, '[{\"Bid\":\"22\",\"beat_name\":\"Sambusa\",\"author\":\"Bayal\",\"Bprice\":\"40.00\"}]', 0),
(16, '[{\"Bid\":\"23\",\"beat_name\":\"Dare me\",\"author\":\"Empire Kid\",\"Bprice\":\"33.00\"}]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_editor_users`
--

CREATE TABLE `admin_editor_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_editor_users`
--

INSERT INTO `admin_editor_users` (`id`, `username`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(1, 'Brian Alkaline', 'brianalkaline51@gmail.com', 'password', '2023-05-09 10:50:10', '2024-06-09 06:06:38', 'admin,editor');

-- --------------------------------------------------------

--
-- Table structure for table `afro_beat`
--

CREATE TABLE `afro_beat` (
  `id` int(11) UNSIGNED NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `afro_beat`
--

INSERT INTO `afro_beat` (`id`, `beat_name`, `author`, `image`, `price`, `audio`, `date_uploaded`) VALUES
(1, 'Gurudumu', 'Pupwe Empire', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-08 11:25:40'),
(2, 'Gurudumu Remix', 'Ndimbwa', '/Beats and sounds store/Images/images 2/pexels-rakicevic-nenad-769525.jpg', '0.00', '', '2023-03-23 09:21:35'),
(3, 'Sambusa', 'Bayal', '/Beats and sounds store/Images/images/pexels-suzy-hazelwood-2718645.jpg', '0.00', '', '2023-03-23 09:22:25'),
(4, 'Retro', 'Fik Made It', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:23:29'),
(5, 'Mombasa', 'Clint Mashariki', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:23:29'),
(6, 'Nisubiri', 'Vinyl Black', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:25:43'),
(7, 'Wamoto', 'Wazito CMS', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:25:43'),
(8, 'Happy Times', 'Brenda Joy', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:27:38'),
(9, 'My Love', 'Mona Amor', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:27:38'),
(10, 'Number One', 'Browness', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 09:51:08'),
(11, 'Tamanisha', 'Smash Kid', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:29:49'),
(12, 'Kerewa', 'Phabby', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:31:43'),
(13, 'Kurupuka', 'Harlona', '/Beats and sounds store/Images/images 2/pexels-asad-maldives.jpg', '0.00', '', '2023-03-20 06:31:43'),
(15, 'Dare me', 'Empire Kid', '/Beats and sounds store/Uploads/e91fd5e2fdb5f116c69523b04a465f87.jpg', '33.00', 'Maid with the Flaxen Hair.mp3', '2023-05-03 08:42:50'),
(22, 'Sambusa', 'Bayal', '/Beats and sounds store/Uploads/fccdc9c69184020a3bdc89b7bb29d8f0.jpg', '40.00', 'Sleep Away.mp3', '2023-05-03 09:03:42'),
(23, 'Dare me', 'Empire Kid', '/Beats and sounds store/Uploads/e91fd5e2fdb5f116c69523b04a465f87.jpg', '33.00', 'Maid with the Flaxen Hair.mp3', '2023-05-03 09:27:21'),
(33, 'Lie', 'Kazadi', '/Beats and sounds store/Uploads/2e037cc5510e819776344998c83b477d.jpg', '35.00', 'KHALIGRAPH__JONES_-_MBONA_INSTRUMENTAL_(Produced_by_Vinc_On_The_Beat)(128k).mp3', '2023-06-20 20:18:59'),
(34, 'Lie', 'Kazadi', '/Beats and sounds store/Uploads/b298469083155935d948fb859019555b.jpg', '35.00', 'KHALIGRAPH__JONES_-_MBONA_INSTRUMENTAL_(Produced_by_Vinc_On_The_Beat)(128k).mp3', '2023-06-20 20:20:13'),
(35, 'Lie', 'Kazadi', '/Beats and sounds store/Uploads/0b76bd82a2f2a772d25d6ee0d568098d.jpg', '35.00', 'Mapopo-Bugi_(Kenny Flex &amp; Rhyme Rio).mp3', '2023-06-20 22:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `amapiano`
--

CREATE TABLE `amapiano` (
  `id` int(11) UNSIGNED NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `amapiano`
--

INSERT INTO `amapiano` (`id`, `beat_name`, `author`, `image`, `price`, `audio`, `date_uploaded`) VALUES
(1, 'Sherehe', 'Ndimbwa', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$20', '', '2023-03-21 08:22:01'),
(2, 'Niacheni', 'Rofessor', '/Beats and sounds store/Images/images 2/pexels-rakicevic-nenad-769525.jpg', '$25', '', '2023-03-21 08:22:01'),
(3, 'Shaka Zulu', 'Zombie', '/Beats and sounds store/Images/images/pexels-suzy-hazelwood-2718645.jpg', '$15', '', '2023-03-23 09:23:31'),
(4, 'Gustavo', 'Adam', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$35', '', '2023-03-21 08:26:22'),
(5, 'Daily ', 'Maphorisa', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$40', '', '2023-03-21 08:27:58'),
(6, 'Africa', 'JJ cool', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$20', '', '2023-03-21 08:27:58'),
(7, 'Mambo Shwari', 'J boy', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$36', '', '2023-03-21 08:29:45'),
(8, 'Tujirushe', 'Kelechi', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$37', '', '2023-03-21 08:29:45'),
(9, 'Wasi wasi', 'Kalicha', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$18', '', '2023-03-21 08:31:04'),
(10, 'Tingisha', 'Boss Raja', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$41', '', '2023-03-21 08:31:04'),
(11, 'Jilete', 'Nero Boy', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$23', '', '2023-03-21 08:32:25'),
(12, 'Kamanda', 'Tivianny', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$24', '', '2023-03-21 08:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `beats`
--

CREATE TABLE `beats` (
  `id` int(11) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `featured` int(11) NOT NULL,
  `reg_userCartid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `beats`
--

INSERT INTO `beats` (`id`, `genre`, `beat_name`, `author`, `image`, `price`, `audio`, `date_uploaded`, `featured`, `reg_userCartid`) VALUES
(16, 'afrobeats', 'FOREVER', 'Unknown', '/Beats and sounds store/Uploads/45c24e89f00c4eee666955b4069a80d2.jpg', '1', 'FOREVER.mp3', '2024-05-10 08:04:33', 0, 0),
(17, 'afrobeats', 'afrobeat-instrumental', 'Unknown', '/Beats and sounds store/Uploads/6dfa535fc23631ccff3f1712202a736d.jpg', '1', 'afrobeat-instrumental.mp3', '2024-05-10 08:04:33', 0, 0),
(18, 'afrobeats', 'afro-dancehall', 'Unknown', '/Beats and sounds store/Uploads/018c97df8e2a1b20fd6d18913e2adcf3.jpg', '1', 'afro-dancehall.mp3', '2024-05-02 11:35:32', 0, 0),
(19, 'afrobeats', '4MULA', 'Unknown', '/Beats and sounds store/Uploads/ab67618c3c5aac0bda359d7249a9bac3.jpg', '1', '4MULA.mp3', '2024-05-02 11:46:43', 0, 0),
(20, 'afrobeats', 'Beat ME', 'Unknown', '/Beats and sounds store/Uploads/c27610a28772ab8ec06798054e39118c.jpg', '1', 'Beat ME.mp3', '2024-04-16 12:12:04', 0, 0),
(21, 'afrobeats', 'ENERGY', 'Unknown', '/Beats and sounds store/Uploads/97482dff355eb0e732a4322d9b1ea37a.jpg', '1', 'ENERGY.mp3', '2024-04-16 11:51:07', 0, 0),
(22, 'afrobeats', 'Fireboy type beat', 'Unknown', '/Beats and sounds store/Uploads/ea5f323fde88c417650e06ea0dfc5175.jpg', '1', 'Fireboy type beat.mp3', '2024-03-28 08:31:29', 0, 0),
(23, 'afrobeats', 'Got Yu', 'Unknown', '/Beats and sounds store/Uploads/a7a544afe6afe6d1bc7277ac11961ff1.jpg', '1', 'Got Yu.mp3', '2024-03-28 08:32:00', 0, 0),
(24, 'afrobeats', 'MAMA', 'Unknown', '/Beats and sounds store/Uploads/3c086841a277600ee7b2dbbcef25dc3f.jpg', '1', 'MAMA.mp3', '2024-04-16 12:11:58', 0, 0),
(25, 'afrobeats', 'Rema Type beat', 'Unknown', '/Beats and sounds store/Uploads/0f01ad029cfef1e84bbc0153b3dcedc9.jpg', '1', 'Rema Type beat.mp3', '2024-03-28 08:33:09', 0, 0),
(26, 'afrobeats', 'Free Afrobeat instrumental', 'Unknown', '/Beats and sounds store/Uploads/23db20a762a36223e75558ff6b539728.jpg', '1', 'Free Afrobeat instrumental.mp3', '2024-03-28 08:35:18', 0, 0),
(27, 'afrobeats', 'lowest-ebb', 'Unknown', '/Beats and sounds store/Uploads/befa66a39124d64f6708609ae138e3a4.jpg', '1', 'lowest-ebb.mp3', '2024-03-28 08:37:41', 0, 0),
(28, 'afrobeats', 'unlock-me', 'Unknown', '/Beats and sounds store/Uploads/73d640b3d1ea46ad2806665782b76b58.jpg', '1', 'unlock-me.mp3', '2024-03-28 08:38:22', 0, 0),
(29, 'amapiano', 'Amapiano Beat', 'Unknown', '/Beats and sounds store/Uploads/8774e8a0b0a20bfdcd2720ab5605b183.jpg', '1', 'Amapiano Beat.mp3', '2024-04-19 15:49:26', 0, 0),
(30, 'amapiano', 'Bololo  Asake Type Beat', 'Unknown', '/Beats and sounds store/Uploads/5bc7648094af0cfca73889512dd35125.jpg', '1', 'Bololo  Asake Type Beat.mp3', '2024-05-02 11:48:05', 0, 0),
(31, 'amapiano', 'Bumela', 'Unknown', '/Beats and sounds store/Uploads/d3da945f92af3e12dc7738e3a1e3092e.jpg', '1', 'Bumela.mp3', '2024-05-02 11:50:32', 0, 0),
(32, 'amapiano', 'Chu', 'Unknown', '/Beats and sounds store/Uploads/48f0296773610be5c8a0b06fca5d7f7d.jpg', '1', 'Chu.mp3', '2024-05-02 11:52:56', 0, 0),
(33, 'amapiano', 'Free Amapiano Beat', 'Unknown', '/Beats and sounds store/Uploads/7ba75d505b0d239a16b47442d1d4759c.jpg', '1', 'Free Amapiano Beat.mp3', '2024-03-28 09:39:58', 0, 0),
(34, 'amapiano', 'GILGAMESHNO', 'Unknown', '/Beats and sounds store/Uploads/8bb99cd210b5ccae64c7034861f8f908.jpg', '1', 'GILGAMESHNO.mp3', '2024-03-28 09:41:22', 0, 0),
(35, 'amapiano', 'MACHALA type beat', 'Unknown', '/Beats and sounds store/Uploads/88d566e9da38ca4ec6f35760bad889a6.jpg', '1', 'MACHALA type beat.mp3', '2024-03-28 09:41:50', 0, 0),
(36, 'amapiano', 'NO PRESSURE', 'Unknown', '/Beats and sounds store/Uploads/d19d2a1d05e1db6da36780625c350f5d.jpg', '1', 'NO PRESSURE.mp3', '2024-03-28 09:42:51', 0, 0),
(37, 'amapiano', 'Olamide Type Beat', 'Unknown', '/Beats and sounds store/Uploads/2333cbe56763e2b7078e1c7bffc84d6b.jpg', '1', 'Olamide Type Beat.mp3', '2024-03-28 09:43:19', 0, 0),
(38, 'amapiano', 'PARTY Melodic type beat', 'Unknown', '/Beats and sounds store/Uploads/6c7cc213243b2d85d09f4e6fd3f9d752.jpg', '1', 'PARTY Melodic type beat.mp3', '2024-05-02 11:56:11', 0, 0),
(39, 'amapiano', 'PUNU', 'Unknown', '/Beats and sounds store/Uploads/ce01fac2655c94ec7e74025b63804e12.jpg', '1', 'PUNU.mp3', '2024-03-28 09:44:40', 0, 0),
(40, 'amapiano', 'Zinoleesky  Type Beat', 'Unknown', '/Beats and sounds store/Uploads/c30fe6309204c922c47365d497f67596.jpg', '1', 'Zinoleesky  Type Beat.mp3', '2024-05-02 11:53:50', 0, 0),
(41, 'Trap', 'Down Hype Beat', 'Unknown', '/Beats and sounds store/Uploads/d4ace959eddeef33a8634a2183c44864.jpg', '1', 'Down Hype Beat.mp3', '2024-04-19 15:49:31', 0, 0),
(42, 'Trap', 'Drake Type Beat', 'Unknown', '/Beats and sounds store/Uploads/e76a82dd8ce2faee80036ad8b22ec831.jpg', '1', 'Drake Type Beat.mp3', '2024-04-18 11:15:57', 0, 0),
(43, 'Trap', 'Hard Hip Hop Rap', 'Unknown', '/Beats and sounds store/Uploads/7f3aba509df6ba1b4d9a8607482a2a8c.jpg', '1', 'Hard Hip Hop Rap.mp3', '2024-04-18 11:02:35', 0, 0),
(44, 'Trap', 'Hype Freestyle Type Beat', 'Unknown', '/Beats and sounds store/Uploads/cdb575b06f8afbb585245d328dd3b304.jpg', '1', 'Hype Freestyle Type Beat.mp3', '2024-03-28 10:01:46', 0, 0),
(45, 'Trap', 'Hype Type Trap Beat', 'Unknown', '/Beats and sounds store/Uploads/552268d6dbe1634ea3188bb4484ce29d.jpg', '1', 'Hype Type Trap Beat.mp3', '2024-03-28 10:02:15', 0, 0),
(46, 'Trap', 'Put In Work  HARD Trap', 'Unknown', '/Beats and sounds store/Uploads/23715982752a63957b239361591dc1eb.jpg', '1', 'Put In Work  HARD Trap.mp3', '2024-03-28 10:02:59', 0, 0),
(47, 'Trap', 'SPEED DRILL HIP HOP', 'Unknown', '/Beats and sounds store/Uploads/d37f10eff849bb5ce84f4a3109d2cb54.jpg', '1', 'SPEED DRILL HIP HOP.mp3', '2024-03-28 10:03:28', 0, 0),
(48, 'Trap', 'TRAP INSTRUMENTAL', 'Unknown', '/Beats and sounds store/Uploads/86319cb700bcf68ebc07c1b9371cc94d.jpg', '1', 'TRAP INSTRUMENTAL.mp3', '2024-03-28 10:04:30', 0, 0),
(49, 'Trap', 'Unique Trap Beat', 'Unknown', '/Beats and sounds store/Uploads/4fc52ed8374349a5b047a43194bf57f2.jpg', '1', 'Unique Trap Beat.mp3', '2024-03-28 10:04:53', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL,
  `beats_and_samples` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expire_date` datetime NOT NULL,
  `reg_userCartid` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `beat_id`, `beats_and_samples`, `genre`, `beat_name`, `author`, `image`, `price`, `audio`, `added_date`, `expire_date`, `reg_userCartid`, `code`) VALUES
(1, 0, '[{\"Bid\":\"23\",\"beat_name\":\"Dare me\",\"author\":\"Empire Kid\",\"Bprice\":\"33.00\"}]', '', '', '', '', '', '', '2023-10-30 12:33:23', '2023-07-05 20:17:01', 0, '0'),
(2, 0, '[{\"Bid\":\"23\",\"beat_name\":\"Dare me\",\"author\":\"Empire Kid\",\"Bprice\":\"33.00\"}]', '', '', '', '', '', '', '2023-10-30 12:33:23', '2023-07-05 20:19:55', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `reg_userCartid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `beat_name`, `author`, `image`, `audio`, `reg_userCartid`) VALUES
(1, 'FOREVER', 'Unknown', '/Beats and sounds store/Uploads/45c24e89f00c4eee666955b4069a80d2.jpg', 'FOREVER.mp3', 1),
(2, 'Amapiano Beat', 'Unknown', '/Beats and sounds store/Uploads/8774e8a0b0a20bfdcd2720ab5605b183.jpg', 'Amapiano Beat.mp3', 1),
(3, 'FOREVER', 'Unknown', '/Beats and sounds store/Uploads/45c24e89f00c4eee666955b4069a80d2.jpg', 'FOREVER.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre`, `parent`) VALUES
(1, 'afrobeat', '0'),
(2, 'amapiano', '0'),
(3, 'Trap', '0'),
(4, 'Dancehall', '0'),
(5, 'Kwaito', '0'),
(6, 'AfroHouse', '0'),
(7, 'Afro House', '0'),
(8, 'AfroHousee', '0'),
(9, 'AfroHouse1', '0'),
(10, 'AfroHouse2', '0'),
(11, 'afrobeats', '0'),
(17, 'Bongo', '0'),
(25, 'afrobeats', '0');

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'Brian', 'Alkaline', 'Alkalinebrian51@gmail.com', '2004-12-31 22:27:25'),
(2, 'Alkaline', 'Brian', 'brianalkaline51@gmail.com', '2004-12-31 22:27:25'),
(3, 'Mona ', 'Bentez', 'monabentez2000@gmail.com', '2023-03-08 09:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` longtext NOT NULL,
  `pwdResetToken` text NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'ddhfjjkgkg', '4965b18ffae9ad58', '$2y$10$MfvgCMFrmBoQLN9LvgNXFue6pHm28Fgd9Soyu2B9MKLnONnpMgZMW', '1684843039'),
(6, '', '4c046eefe5b9e0c0', '$2y$10$Gt44igy46iIzFbmOPkA/DOsM25q3uQtFhsWDCxtUlCvEdz5zdwCHy', '1684843113'),
(11, 'brianalkaline52@gmail.com', '01f199a95d92fce4', '$2y$10$wM5iwVoi0jmnplN0KswCqOXPF.Pw611oyjMLExno5GpJQgFYRZHvy', '1685015745'),
(17, 'brianalkaline51@gmail.com', '1aaa6f01240a7074', '$2y$10$BpXGoPrL7zuUSeAoh5FUcOuzv6My8Mmgkd5bhSvfgO9AXaOFCcqWi', '1710156751');

-- --------------------------------------------------------

--
-- Table structure for table `regular_users`
--

CREATE TABLE `regular_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_userStatus` int(11) NOT NULL DEFAULT 0,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `regular_users`
--

INSERT INTO `regular_users` (`id`, `username`, `email`, `password`, `reg_userStatus`, `join_date`, `last_login`) VALUES
(1, 'Brian', 'brianalkaline51@gmail.com', '$2y$10$LywhhBfkqTXawfuxMXt6h.YOyWmSfuN0IHRfdlPvRgh/s0tq3yP8.', 0, '2023-05-16 11:22:55', '2024-05-10 11:06:00'),
(2, 'Bayal', 'brianalkaline52@gmail.com', '$2y$10$ohHHXmnOItMbM.057mBFVeacVkqulJ2bI./X5Dy/.EvynwYXBqFaG', 0, '2023-05-16 13:13:40', '2024-05-08 15:16:33'),
(3, 'Alkaline', 'brianalkaline53@gmail.com', '$2y$10$UHpIsECsrfSomaxaHW9LG.ZFRnNc8uPUTYStOOzM2Kg9rtfzYYNRC', 0, '2023-05-29 13:30:16', '2024-05-02 15:26:31'),
(4, 'Brayo', 'brianalkaline54@gmail.com', '$2y$10$ZcsdlJXtDW2Wdt4B864U3eFE2rGEIikoosN5TE4ea3c5DntvBqc0u', 0, '2023-05-29 13:32:54', '2024-03-11 13:54:36'),
(5, 'Dyer', 'brianalkaline55@gmail.com', '$2y$10$Egc8z1ks6/RaYVjpCJuykunWB11Ia1YBUSao0.bvae3i.sh.VkLme', 0, '2024-03-11 13:51:46', '2024-03-11 13:55:22'),
(6, 'Yobra', 'brianalkaline56@gmail.com', '$2y$10$CZ1fGNExskCkzq99rv2AUeUojosAexcblPUyLGW93hEWBdLthxh.a', 0, '2024-03-14 12:40:22', '2024-03-15 11:10:33'),
(7, 'Andrew', 'njayaandrew@gmail.com', '$2y$10$N3IkjAEgseiOXfUcgbQc6ufcQ9aL8YxegvGcQLlR6auhyEhcILL7G', 0, '2024-04-01 15:05:29', '2024-04-09 12:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` int(11) UNSIGNED NOT NULL,
  `sample_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sample_audio` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `BPM` varchar(255) NOT NULL,
  `sample_key` varchar(255) NOT NULL,
  `sample_code` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `sample_name`, `author`, `image`, `price`, `sample_audio`, `instrument`, `genre`, `BPM`, `sample_key`, `sample_code`, `date_uploaded`) VALUES
(1, 'Drill hats.wav', 'Fik Made It', '/Beats and sounds store/Images/images 2/pexels-hakan-erenler-289756.jpg', '$10', '', 'Open Hats', 'UK Drill', '140', 'C#m', '0', '2023-04-04 11:42:47'),
(2, 'Drill Snare.wav', 'Bayal', '/Beats and sounds store/Images/images 2/pexels-pixabay-164907.jpg', '$15', '', 'Snare', 'UK Drill', '140', 'C#m', '0', '2023-04-04 11:51:11'),
(3, 'Guitar', 'Alkaline', '/Beats and sounds store/Samples Uploads/ae7bdb99b76feecf972cca998d28af41.jpg', '20', 'mgfljunior@gmail.com_2021-07-16 10-54-28_Rough_3.wav', '', 'None', '120', 'C#m', 'BSS_2', '2023-06-22 19:42:39'),
(4, 'Jazz Guitar', 'Fik Made It', '/Beats and sounds store/Samples Uploads/b8daf1d2a2561bf76cc74cfabf915c74.jpg', '25', 'Jazz Guitar (1).wav', 'Guitar', 'None', '98', 'C#', 'BSS_3', '2023-06-22 19:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `MerchantRequestID` varchar(255) NOT NULL,
  `CheckoutRequestID` varchar(255) NOT NULL,
  `ResultCode` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `MpesaReceiptNumber` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `reg_userCartid` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `MerchantRequestID`, `CheckoutRequestID`, `ResultCode`, `Amount`, `MpesaReceiptNumber`, `PhoneNumber`, `TransactionDate`, `reg_userCartid`, `beat_id`) VALUES
(1, '10901-120004573-1', 'ws_CO_19072023190603085768168060', '0', '1', 'RGJ7XFLLZR', '25416307679', '2024-04-25 10:55:50', 2, 17),
(35, '', '', '', '', '', '', '0000-00-00 00:00:00', 3, 38),
(36, '', '', '', '', '', '', '0000-00-00 00:00:00', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `trap`
--

CREATE TABLE `trap` (
  `id` int(11) UNSIGNED NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trap`
--

INSERT INTO `trap` (`id`, `beat_name`, `author`, `image`, `price`, `audio`, `date_uploaded`) VALUES
(1, 'Memories', 'Bayal', '/Beats and sounds store/Images/images 2/pexels-led-supermarket-577514.jpg', '$50', '', '2023-03-21 09:55:51'),
(2, 'Retro', 'Fik Made It', '/Beats and sounds store/Images/images 2/pexels-hakan-erenler-289756.jpg', '$45', '', '2023-03-21 09:55:51'),
(3, 'Broken Relationships', 'Lillow', '/Beats and sounds store/Images/images 2/pexels-led-supermarket-577514.jpg', '$35', '', '2023-03-21 09:59:16'),
(4, 'Popping', 'Doubt', '/Beats and sounds store/Images/images 2/pexels-hakan-erenler-289756.jpg', '$20', '', '2023-03-21 09:59:16'),
(5, 'Incredible Me', 'HyperKid', '/Beats and sounds store/Images/images 2/pexels-led-supermarket-577514.jpg', '$32', '', '2023-03-21 10:02:30'),
(6, 'Mombasa', 'Rambo Wawili', '/Beats and sounds store/Images/images 2/pexels-hakan-erenler-289756.jpg', '$50', '', '2023-03-21 10:02:30'),
(7, 'Maunyama', 'Rambo Wawili', '/Beats and sounds store/Images/images 2/pexels-led-supermarket-577514.jpg', '$45', '', '2023-03-21 10:04:05'),
(8, 'Barida', 'Rambo Wawili', '/Beats and sounds store/Images/images 2/pexels-hakan-erenler-289756.jpg', '$48', '', '2023-03-21 10:04:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaa`
--
ALTER TABLE `aaa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_editor_users`
--
ALTER TABLE `admin_editor_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afro_beat`
--
ALTER TABLE `afro_beat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amapiano`
--
ALTER TABLE `amapiano`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beats`
--
ALTER TABLE `beats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `regular_users`
--
ALTER TABLE `regular_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trap`
--
ALTER TABLE `trap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aaa`
--
ALTER TABLE `aaa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_editor_users`
--
ALTER TABLE `admin_editor_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `afro_beat`
--
ALTER TABLE `afro_beat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `amapiano`
--
ALTER TABLE `amapiano`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beats`
--
ALTER TABLE `beats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `regular_users`
--
ALTER TABLE `regular_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `trap`
--
ALTER TABLE `trap`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
