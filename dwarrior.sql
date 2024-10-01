-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2024-09-11 08:24:18
-- 伺服器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dwarrior`
--

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Order_number` int DEFAULT NULL COMMENT '訂單編號',
  `Username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員',
  `Product` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品',
  `Num` int DEFAULT NULL COMMENT '數量',
  `Price` int DEFAULT NULL COMMENT '價格',
  `Creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '下單時間',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `car`
--

INSERT INTO `car` (`id`, `Order_number`, `Username`, `Product`, `Num`, `Price`, `Creat_at`) VALUES
(1, 1, 'aa', 'aas', 2, 190, '2024-09-11 08:22:27');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號',
  `Password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員密碼',
  `Email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員信箱',
  `State` tinyint NOT NULL DEFAULT '1' COMMENT '會員狀態(1:啟用/0:停權)',
  `Level` int NOT NULL DEFAULT '100' COMMENT '會員等級',
  `Product_progress` int DEFAULT NULL COMMENT '訂購商品',
  `Product_returns` int DEFAULT NULL COMMENT '退貨',
  `Uid01` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`ID`, `Username`, `Password`, `Email`, `State`, `Level`, `Product_progress`, `Product_returns`, `Uid01`, `Created_at`) VALUES
(14, 'owner02', '$2y$10$se2z7WMRpX3n7gY/nPPoRe3/0CvwdFF7QVJxCCAQdprQ5sYtRPQ7O', 'owner@test.com', 1, 300, NULL, NULL, '75ee2d49', '2024-08-13 01:29:08'),
(15, 'owner01', '$2y$10$A0AXiWtlZJE4mbZ59jRFkOc85uCn09K4LldYvCQjSwP93.G9F9alO', '1234', 1, 900, NULL, NULL, '8c1ad883', '2024-08-15 03:36:19'),
(18, 'owner08', '$2y$10$lK88mRzfDup/Hk4bjqqvj.MXmeNyLxtZmRazxhTPEn/JYjiRDeAXy', '123456', 1, 400, NULL, NULL, NULL, '2024-08-20 06:45:33'),
(19, 'owner09', '$2y$10$bau0888gmcACkDXN4UGTDeJkab4wKfNZBpM/VMewKnXiqYCN3Ynze', '123456', 1, 300, NULL, NULL, NULL, '2024-08-20 06:45:49'),
(20, 'owner10', '$2y$10$U9bLD5rpbDridVz8CRvkMOC.l.3gbecSGeOnm9PVKOg9JqFyUZPeC', '123456', 0, 200, NULL, NULL, '96fc37f5', '2024-08-20 06:46:10'),
(21, 'owner11', '$2y$10$jSyDqqvLylyE94QIebrEceRPjAYehRx6pwmfxgpkKDZjknGUmL7k6', '123456', 0, 200, NULL, NULL, NULL, '2024-08-20 07:24:39'),
(22, 'owner12', '$2y$10$b.ILHhohExpUtVPbRxfJnu7TqcmYlSbo88O7XNZgQRlhsZV0QFhnW', '123456', 1, 300, NULL, NULL, '382ee2d1', '2024-08-20 07:25:02'),
(24, 'owner07', '$2y$10$fiD8yRuQ3UFlMqZ9N50FvOKVQyUNYS4UPN9/89F5YxmRMF/qWJO1S', '132456', 1, 200, NULL, NULL, 'e87251b9', '2024-08-20 07:27:02'),
(31, 'owner21', '$2y$10$3YXJ6uJo0m0VB.LTn/yQ2.UvcIVL86ASMy1bwhk7seVDvCHwgJ4Ua', '123456', 1, 200, NULL, NULL, 'd0da7aeb', '2024-08-22 02:01:42'),
(34, 'owner25', '123456', '654331', 1, 400, NULL, NULL, '123456789', '2024-09-02 07:00:52'),
(35, 'owner26', '123456', '654321', 1, 300, NULL, NULL, '123456789', '2024-09-02 07:00:52'),
(36, 'owner40', '$2y$10$mnG1agEouXtMLSJvzpQPsuZoRx1iKW6NCtOVoStJN4EUELpXMRoRm', 'owner@test.com', 1, 100, NULL, NULL, NULL, '2024-09-09 07:39:56'),
(38, 'owner42', '$2y$10$iFU.GHgOYJQUEF4sh5YHGeITypDpepFz5VC693XcLxINXdubg2RH2', 'owner@test.com', 1, 100, NULL, NULL, NULL, '2024-09-09 07:40:07'),
(39, 'owner43', '$2y$10$FWyjj3ECgDfNucf8SyC7ReQX.f2kFu1Vv.IS.AY6FfvmQDdDFEIE.', 'owner@test.com', 1, 100, NULL, NULL, NULL, '2024-09-09 07:40:12'),
(41, 'owner45', '$2y$10$MS7YsCpKpSO4LjjjwyMfY.hCQbMqYg3bRBiBiznQGq2Z1XW1vE2Q6', 'owner@test.com', 1, 100, NULL, NULL, NULL, '2024-09-09 07:40:18'),
(43, 'owner47', '$2y$10$26qrRGFrUSrAIkvnB8Ipoe46OdyGU8Sv/jel7v/toueAIiejV2Rsu', 'owner12@test.com', 1, 100, NULL, NULL, NULL, '2024-09-10 06:46:58'),
(44, 'owner50', '$2y$10$78sb3sAmR.ykwCieaS0fyuZQL422GaTzIJm9P6efotcnQdRSwiUqS', '1236@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-10 06:47:16'),
(45, 'owner51', '$2y$10$f1dwS9q8l94lpa09c/T3h.aqa5x22ZkyXVXFkmBdgdWxyZeLYE1lq', '1236@gmail.com', 0, 400, NULL, NULL, NULL, '2024-09-10 06:59:31'),
(46, 'owner52', '$2y$10$9kLoYtQezgSWE6sEmRrPau4Sh0.eqZygFOJywJIuhxyc6KA61FmFC', 'ddd@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-11 06:29:21'),
(47, 'owner53', '$2y$10$5R/FRbuAnWPe7NrHlVSvEuYdc93Z0m2wVjyrlNDNHIm2IxmBpiVj.', 'ddd@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-11 06:38:28'),
(48, 'owner54', '$2y$10$AFN8UJ/EGyZXTJUtGMa.Oe43bt8uAntfGQkjkINDlH/F.jHRVyYra', 'ddd@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-11 07:12:03'),
(49, 'owner55', '$2y$10$t.WQkAtQz/P6YV9.cxRTNua7Kl9I1L1gSOMMxzPIfzYCLI9mOHX3q', 'ddd@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-11 07:46:24'),
(50, 'owner57', '$2y$10$irJkAHfHU1Abx/tVgTXbE.GCmfxhWqzy96FpOTjPonwIhzyE0uVYq', 'ddd@gmail.com', 1, 100, NULL, NULL, NULL, '2024-09-11 08:05:05'),
(51, 'owner58', '$2y$10$dF7YDB5Mu.mg6VO8e./kwu4dE29kFkUW0TIlngmRRj.N5YgW4y71q', 'ddd@gmail.com', 1, 100, NULL, NULL, 'bfe571d0', '2024-09-11 08:07:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
