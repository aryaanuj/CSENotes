-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2021 at 09:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_csenotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT 'images/admin.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'anujarya', 'a91552a22e01f39068110a869b243d14', 'images/1595940189.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `catimage` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('published','upcoming') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `catname`, `create_date`, `catimage`, `description`, `status`) VALUES
(32, 'Machine Learning', '2020-07-28 18:02:19', '1595939386.png', 'Machine learning (ML) is the study of computer algorithms that improve automatically through experience. It is seen as a subset of artificial intelligence. Machine learning algorithms build a mathematical model based on sample data, known as training data, in order to make predictions or decisions without being explicitly programmed to do so.', 'upcoming'),
(33, 'Python', '2020-07-28 18:01:50', '1595939416.jpg', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python design philosophy emphasizes code readability with its notable use of significant whitespace.', 'upcoming'),
(34, 'TOC', '2020-07-28 18:00:56', '1595939456.jpg', 'Automata theory (also known as Theory Of Computation) is a theoretical branch of Computer Science and Mathematics, which mainly deals with the logic of computation with respect to simple machines, referred to as automata. ... Automata is originated from the word “Automaton” which is closely related to “Automation”.', 'published'),
(35, 'Digital Image Processing', '2020-09-17 11:50:46', '1600323646.jpg', 'Digital image processing is the use of a digital computer to process digital images through an algorithm. As a subcategory or field of digital signal processing, digital image processing has many advantages over analog image processing.', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL,
  `sub_topic` varchar(255) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `category`, `topic`, `content`, `post_date`, `status`, `sub_topic`) VALUES
(11, 'TOC', 'Non-Deterministic Finite Automata(NFA or NDFA)', '<p>Non-deterministic Finite Automata (NFA or NDFA) is category of Finite Automata. The differ- ence between deterministic and non-deterministic is choice of moves. In DFA a state read input and moves to only one state; but In NFA a state read one input and moves to either one state or more than one state or nothing to move (<em>&phi; </em>). NFA machine is not real.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; <img alt=\"\" src=\"post-images/1159580227.jpg\" style=\"height:128px; width:300px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"post-images/395778866.jpg\" style=\"height:310px; width:300px\" /></p>\r\n', '2020-07-26 15:20:31', 'unpublished', 'NO'),
(13, 'TOC', 'Non-Deterministic Finite Automata(NFA or NDFA)', '<h2><strong>Non-Deterministic Finite Automata(DFA)</strong></h2>\r\n\r\n<p><strong>Definition&nbsp;</strong>The DFA contains five tuples in a&nbsp;</p>\r\n\r\n<p><strong><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;M&nbsp;</em>= (<em>Q</em><em>,&nbsp;</em>&Sigma;<em>,&nbsp;</em><em>&delta;&nbsp;</em><em>,&nbsp;</em><em>q</em>0<em>,</em><em>&nbsp;</em><em>F</em>)</strong></p>\r\n\r\n<p>where,</p>\r\n\r\n<p><em>Q&nbsp;</em>is finite Set of states</p>\r\n\r\n<p>&Sigma; is input alphabet</p>\r\n\r\n<p><em>q</em>0 is start state&nbsp;<em>q</em>0 &isin;&nbsp;<em>Q</em></p>\r\n\r\n<p><em>F&nbsp;</em>is set of final states&nbsp;<em>Q&nbsp;</em>&supe;&nbsp;<em>F&nbsp;</em>(Q is superset of F)</p>\r\n\r\n<p><em>&delta;&nbsp;</em>is transition function&nbsp;<em>&delta;&nbsp;</em>:&nbsp;<em>Q&nbsp;</em>&times;&nbsp;<em>F&nbsp;</em>&rarr; 2<em>Q</em></p>\r\n\r\n<p>Every DFA is NFA.</p>\r\n\r\n<h2><strong>Example based of NFA</strong></h2>\r\n\r\n<p><strong>Example 1.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; start with a. Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/722831559.jpg\" style=\"height:173px; width:300px\" /></p>\r\n\r\n<p><strong>Example 2.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; which contains &rsquo;a&rsquo;.</p>\r\n\r\n<p>Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>ba</em><em>,&nbsp;</em><em>bba</em><em>,&nbsp;</em><em>bab</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/1203194560.jpg\" style=\"height:173px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Example 3.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; start with a. Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/1143349147.jpg\" style=\"height:182px; width:300px\" /></p>\r\n', '2020-07-26 15:35:16', 'published', 'DFA'),
(14, 'TOC', 'Non-Deterministic Finite Automata(NFA or NDFA)', '<p>The <em>&epsilon;</em>- transitions in NFA are given in order to move from one state to another without having any symbol from input alphabet &Sigma;.</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/878827421.jpg\" /></p>\r\n\r\n<h2>Definition</h2>\r\n\r\n<p>The <em>&epsilon;</em>&minus;NFA contains five tuples in a</p>\r\n\r\n<p><strong><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; M </em>= (<em>Q</em><em>, </em>&Sigma;<em>, </em><em>&delta; </em><em>, </em><em>q</em>0<em>,</em><em> </em><em>F</em>)</strong></p>\r\n\r\n<p>where,</p>\r\n\r\n<p><em>Q </em>is finite Set of states</p>\r\n\r\n<p>&Sigma; is input alphabet</p>\r\n\r\n<p><em>q</em>0 is start state <em>q</em>0 &isin; <em>Q</em></p>\r\n\r\n<p><em>F </em>is set of final states <em>Q </em>&supe; <em>F </em>(Q is superset of F)</p>\r\n\r\n<p><em>&delta; </em>is transition function <em>&delta; </em>: <em>Q </em>&times; {&Sigma; &cup; <em>&epsilon;</em>} &rarr; 2<em>Q</em></p>\r\n', '2020-07-26 15:35:10', 'published', 'ε-NFA'),
(18, 'Digital Image Processing', '1. Introduction of Digital Image Processing', '<p>Image processing&nbsp;is a method to perform some operations on an image, in order to get an enhanced image or to extract some useful information from it. It is a type of signal processing in which input is an image and output may be image or characteristics/features associated with that image. Nowadays, image processing is among rapidly growing technologies. It forms core research area within engineering and computer science disciplines too.</p>\r\n\r\n<p>Image processing basically includes the following three steps:</p>\r\n\r\n<ul>\r\n	<li>Importing the image via image acquisition tools;</li>\r\n	<li>Analysing and manipulating the image;</li>\r\n	<li>Output in which result can be altered image or report that is based on image analysis.</li>\r\n</ul>\r\n\r\n<p>There are two types of&nbsp;methods used for image processing&nbsp;namely,&nbsp;analogue and digital&nbsp;image processing. Analogue image processing can be used for the hard copies like printouts and photographs. Image analysts use various fundamentals of interpretation while using these visual techniques. Digital image processing techniques help in manipulation of the digital images by using computers. The three general phases that all types of data have to undergo while using digital technique are pre-processing, enhancement, and display, information extraction.</p>\r\n\r\n<p>In this lecture we will talk about a few fundamental definitions such as image, digital image, and digital image processing. Different sources of digital images will be discussed and examples for each source will be provided. The continuum from image processing to computer vision will be covered in this lecture. Finally we will talk about image acquisition and different types of image sensors.</p>\r\n', '2020-09-17 11:54:13', 'published', 'NO'),
(19, 'Digital Image Processing', '2. Sampling and quantization', '<p>In order to become suitable for digital processing, an image function f(x,y) must be digitized both spatially and in amplitude. Typically, a frame grabber or digitizer is used to sample and quantize the analogue video signal. Hence in order to create an image which is digital, we need to covert continuous data into digital form. There are two steps in which it is done:</p>\r\n\r\n<ul>\r\n	<li>Sampling</li>\r\n	<li>Quantization</li>\r\n</ul>\r\n\r\n<p>The sampling rate determines the spatial resolution of the digitized image, while the quantization level determines the number of grey levels in the digitized image. A magnitude of the sampled image is expressed as a digital value in image processing. The transition between continuous values of the image function and its digital equivalent is called quantization.</p>\r\n\r\n<p>The number of quantization levels should be high enough for human perception of fine shading details in the image. The occurrence of false contours is the main problem in image which has been quantized with insufficient brightness levels.&nbsp;</p>\r\n\r\n<p>In this lecture we will talk about two key stages in digital image processing. Sampling and quantization will be defined properly. Spatial and grey-level resolutions will be introduced and examples will be provided. An introduction on implementing the shown examples in MATLAB will be also given in this lecture.</p>\r\n', '2020-09-17 11:56:15', 'published', 'NO'),
(20, 'Digital Image Processing', '3. Resizing image', '<p>Image interpolation occurs when you resize or distort your image from one pixel grid to another. Image resizing is necessary when you need to increase or decrease the total number of pixels, whereas remapping can occur when you are correcting for lens distortion or rotating an image. Zooming refers to increase the quantity of pixels, so that when you zoom an image, you will see more detail.</p>\r\n\r\n<p>Interpolation works by using known data to estimate values at unknown points. Image interpolation works in two directions, and tries to achieve a best approximation of a pixel&#39;s intensity based on the values at surrounding pixels. Common interpolation algorithms can be grouped into two categories: adaptive and non-adaptive. Adaptive methods change depending on what they are interpolating, whereas non-adaptive methods treat all pixels equally. Non-adaptive algorithms include: nearest neighbor, bilinear, bicubic, spline, sinc, lanczos and others. Adaptive algorithms include many proprietary algorithms in licensed software such as: Qimage, PhotoZoom Pro and Genuine Fractals.</p>\r\n\r\n<p>Many compact digital cameras can perform both an optical and a digital zoom. A camera performs an optical zoom by moving the zoom lens so that it increases the magnification of light. However, a digital zoom degrades quality by simply interpolating the image. Even though the photo with digital zoom contains the same number of pixels, the detail is clearly far less than with optical zoom.&nbsp;</p>\r\n\r\n<p>In this lecture zooming and shrinking will be introduced and for this purpose interpolation is introduced and discussed. Many various interpolation techniques will be briefly introduced and three of them namely, nearest neighbour, bilinear, and bicubic interpolations will be discussed in more details with visual examples. Also required MATLAB comments for generating the shown examples will be provided.</p>\r\n', '2020-09-17 11:57:30', 'published', 'NO'),
(21, 'Digital Image Processing', '4. Aliasing and image enhancement', '<p>Digital sampling of any signal, whether sound, digital photographs, or other, can result in apparent signals at frequencies well below anything present in the original. Aliasing occurs when a signal is sampled at a less than twice the highest frequency present in the signal.&nbsp;Signals at frequencies above half the sampling rate&nbsp;must&nbsp;be filtered out to avoid the creation of signals at frequencies not present in the original sound. Thus digital sound recording equipment contains low-pass filters that remove any signals above half the sampling frequency.</p>\r\n\r\n<p>Since a sampler is a linear system, then if an input is a sum of sinusoids, the output will be a sum of sampled sinusoids. This suggests that if the input contains no frequencies above the Nyquist frequency, then it will be possible to reconstruct each of the sinusoidal components from the samples. This is an intuitive statement of the&nbsp;Nyquist-Shannon&nbsp;sampling theorem.</p>\r\n\r\n<p>Anti-aliasing is a process which attempts to minimize the appearance of aliased diagonal edges. Anti-aliasing gives the appearance of smoother edges and higher resolution. It works by taking into account how much an ideal edge overlaps adjacent pixels.</p>\r\n\r\n<p>In this lecture we will talk about spatial aliasing and anti-aliasing. Also we will start to talk about image enhancement. Two main categories of image enhancement will be introduced. Point process and neighbour process will be defined. Finally we will give an introduction on definition of contrast.</p>\r\n', '2020-09-17 11:58:18', 'published', 'NO'),
(22, 'Digital Image Processing', '5. Image enhancement: contrast enhancement', '<p>Image enhancement techniques have been widely used in many applications of image processing where the subjective quality of images is important for human interpretation. Contrast is an important factor in any subjective evaluation of image quality. Contrast is created by the difference in luminance reflected from two adjacent surfaces. In other words, contrast is the difference in visual properties that makes an object distinguishable from other objects and the background. In visual perception, contrast is determined by the difference in the colour and brightness of the object with other objects. Our visual system is more sensitive to contrast than absolute luminance; therefore, we can perceive the world similarly regardless of the considerable changes in illumination conditions. Many algorithms for accomplishing contrast enhancement have been developed and applied to problems in image processing.</p>\r\n\r\n<p>In this lecture we will talk about contrast enhancement. Linear and non-linear transformation functions such as image negatives, logarithmic transformations, power-law transformations, and piecewise linear transformations will be discussed. Histogram process and histogram of four basic grey-level characteristics will be introduced.</p>\r\n', '2020-09-17 12:00:04', 'published', 'Part I'),
(23, 'Digital Image Processing', '5. Image enhancement: contrast enhancement', '<p>If the contrast of an image is highly concentrated on a specific range, e.g. an image is very dark; the information may be lost in those areas which are excessively and uniformly concentrated. The problem is to optimize the contrast of an image in order to represent all the information in the input image.&nbsp;</p>\r\n\r\n<p>In this lecture we will talk about contrast enhancement. Histogram equalization will be introduced in details. Also the state-of-the-art techniques such as singular value equalization will be introduced and discussed.</p>\r\n', '2020-09-17 12:02:59', 'published', 'Part II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
