-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2022 at 07:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`) VALUES
(1, 'admin01', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin02', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `QueQuan` varchar(50) NOT NULL,
  `MaPB` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `QueQuan`, `MaPB`) VALUES
(12, 'Phan Hai', 'Ha Nam', 'KD'),
(25, 'Tiến bịp', 'Ha Noi', 'KT'),
(26, 'Tiến bịp', 'Quảng Ninh', 'KD'),
(28, 'Tiến bịp', 'Quảng Ninh', 'KT'),
(29, 'Hai Huoc', 'Hai Duong', 'KT'),
(30, 'Lê Hải Anh', 'Thái Nguyên', 'KT'),
(31, 'Lê Hải Anh', 'Thái Nguyên', 'KT'),
(32, 'Lê Hải Ninh', 'Thái Bình', 'KD'),
(33, 'Lê Hải Nam', 'Bình Định', 'LT'),
(34, 'Lê Hải Nghĩa', 'Thái Nguyên', 'KT'),
(35, 'Lê Hải Duy', 'Thái Bình', 'KD'),
(36, 'Lê Hải Thế', 'Bình Định', 'LT'),
(37, 'Lê Hải Đạo', 'Thái Nguyên', 'KT'),
(38, 'Lê Hải Tùng', 'Thái Bình', 'KD'),
(39, 'Lê Hải Linh', 'Bình Định', 'LT'),
(40, 'Lê Hải Vương', 'Thái Nguyên', 'KT'),
(41, 'Lê Hải Huyền', 'Thái Bình', 'KD'),
(42, 'Lê Hải', 'Bình Định', 'LT'),
(43, 'Lê Hải Dương', 'Thái Nguyên', 'KT'),
(44, 'Lê Hải Đức', 'Thái Bình', 'KD'),
(45, 'Lê Hải Quỳnh', 'Bình Định', 'LT'),
(46, 'Trần Hương', 'Thái Nguyên', 'KT'),
(47, 'Lê Văn Lâm', 'Thái Bình', 'KD'),
(48, 'Phạm Hải Thảo', 'Bình Định', 'LT'),
(49, 'Hai Huoc', 'Ha Noi', 'KD');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` varchar(10) NOT NULL,
  `TenPB` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`) VALUES
('KD', 'Kinh doanh'),
('KT', 'Kỹ thuật'),
('LT', 'Lập trình');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaPB` (`MaPB`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaPB`) REFERENCES `phongban` (`MaPB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
