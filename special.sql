-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-03-28 14:36
-- 서버 버전: 10.4.11-MariaDB
-- PHP 버전: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `special`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `score` varchar(3) NOT NULL,
  `att` date NOT NULL DEFAULT current_timestamp(),
  `inatt` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `event`
--

INSERT INTO `event` (`id`, `name`, `phone`, `score`, `att`, `inatt`) VALUES
(1, 'asd', '010-8005-7870', '8', '2022-03-24', '1'),
(2, 'sad', '010-8005-7870', '8', '2022-03-25', '2'),
(3, 'asd', '010-8005-7871', '8', '2022-03-24', '1'),
(4, 'asd', '010-8005-7872', '8', '2022-03-24', '1'),
(5, 'asd', '010-8005-7875', '8', '2022-03-24', '1'),
(7, 'asd', '010-8005-7870', '8', '2022-03-26', '3');

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `product` varchar(50) NOT NULL,
  `shop` varchar(50) NOT NULL,
  `purdate` date NOT NULL DEFAULT current_timestamp(),
  `contents` varchar(2000) NOT NULL,
  `score` varchar(3) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`id`, `name`, `product`, `shop`, `purdate`, `contents`, `score`, `image`) VALUES
(1, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(2, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(3, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(4, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(5, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(6, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(7, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(8, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(9, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(10, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(11, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(12, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(13, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(14, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(15, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(16, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(17, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(18, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(19, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(20, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(21, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(22, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(23, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(24, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(25, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(26, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(27, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(28, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(29, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(30, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(31, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(32, 'das', 'asd', 'asd', '2022-03-11', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '6', '1648081523business.jpg'),
(33, 'asd', 'asd', 'asd', '2022-03-31', 'asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda', '9', '1648110139business.jpg,1648110140calc.jpg,1648110139business.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `location`, `image`) VALUES
(1, '풋고추', '창원시', '창원시_풋고추.jpg'),
(2, '고추', '진주시', '진주시_고추.jpg'),
(3, '굴', '통영시', '통영시_굴.jpg'),
(4, '멸치', '사천시', '사천시_멸치.jpg'),
(5, '단감', '김해시', '김해시_단감.jpg'),
(6, '대추', '밀양시', '밀양시_대추.jpg'),
(7, '유자', '거제시', '1648207955business.jpg'),
(8, '매실', '양산시', '양산시_매실.jpg'),
(9, '수박', '의령군', '의령군_수박.jpg'),
(10, '곶감', '함안군', '함안군_곶감.jpg'),
(11, '양파', '창녕군', '창녕군_양파.jpg'),
(12, '방울토마토', '고성군', '고성군_방울토마토.jpg'),
(13, '마늘', '남해군', '남해군_마늘.jpg'),
(14, '녹차', '하동군', '하동군_녹차.jpg'),
(15, '약초', '산청군', '산청군_약초.jpg'),
(16, '밤', '함양군', '함양군_밤.jpg'),
(17, '사과', '거창군', '거창군_사과.jpg'),
(18, '돼지고기', '합천군', '합천군_돼지고기.jpg');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 테이블의 AUTO_INCREMENT `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
