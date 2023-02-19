
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(99, 3, 'Sneakers Shoes ', 23, 2, 'Uf703698392f045239e6d84e326108c3fN.jpg_300x300.png'),
(101, 3, 'Hand bag & Shoulder Bag for Girls', 4, 3, 'product-15.jpg'),
(109, 3, 'Cosmetic Brush Set', 10, 0, 'H5f2f6db6cd3c4939a17eaf2edfbada11t.jpg_300x300.png'),
(110, 3, 'Printed Linen Shirt', 4, 0, 'd1ae49c34350de7fd2cca400267777dc.jpg'),
(111, 3, 'DIY Set  Up Doll ', 16, 0, 'H2a51a0e6503046bb8f2fd623f7336d1ce.jpg_300x300.png'),
(139, 14, 'Flats Sandals For Girls', 13, 1, 'abcf178b3b990b5cb81288778f865d72.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(15, 17, 'moshin', 'user2@gmail.com', '0327467839', 'very good website ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(29, 14, 'asim khan afridi', '03107671408', 'asim88978@gmail.com', 'paypal', 'flat no. B-386 mujahid colony nazimabad np 4 karaci, nazimabad, karachi, Pakistan - 74600', ', Cotton Dresses (1) , stone numerals (1) ', 42, '05-Dec-2022', 'pending'),
(30, 17, 'moshin', '111', 'asim88978@gmail.com', 'paytm', 'flat no. B-386 mujahid colony nazimabad np 4 karaci, aptech, karachi, Pakistan - 74600', ', Hand bag & Shoulder Bag for Girls (1) ', 4, '05-Dec-2022', 'pending'),
(31, 14, 'asim khan afridi', '31413', 'asim88978@gmail.com', 'credit card', 'flat no. B-386 mujahid colony nazimabad np 4 karaci, aptech, karachi, Pakistan - 74600', ', Watches -Luxury Gold Stainless Steel Round  (1) ', 16, '05-Dec-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `productcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categroy` varchar(255) DEFAULT NULL,
  `for` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productId`, `productcode`, `name`, `discription`, `price`, `image`, `categroy`, `for`) VALUES
(5, '00000001', '01', 'Hand bag & Shoulder Bag for Girls', '_*High quality slin_*  Lady use for best  Lady cross sling  Check quality vedio  Awesome quality ', '4', 'product-15.jpg', 'Bags', 'Women'),
(6, '00000002', '02', 'Ladies Fancy Heel Sandal', 'Owing to the rich industrial experience and expertise in this business, we are involved in providing a supreme quality array ofLadies Fancy Heel Sandal.', '18', 'product-11.jpg', 'Sandals', 'Women'),
(10, '00000004', '04', 'Summer Lilun Dress For Women', 'hduqwhdqwdghqwdbh', '7', '9d2203146f3cba4710b3c5bc4bbd9ffe.jpg', 'Dress', 'Women'),
(11, '00000005', '05', 'Emporio Armani Men’s Quartz Watch', 'Brand New100% OriginalComes with Tag and Emporio Armani PackagingProduct specificationsWatch Information', '110', '69233c85282034bc0eb3cb01bccdae86.jpg', 'Watches', 'Men'),
(12, '00000003', '03', 'Printed Linen Shirt', 'Size Chest(21) Length (38) New Collection Reasonable price Sleeves length (18Inch) 100% same Product Unique Design', '4', 'd1ae49c34350de7fd2cca400267777dc.jpg', 'Dress', 'Women'),
(17, '00000006', '06', 'Sneakers Shoes ', 'Crafted from supple leather, the Greca trainers are characterized by understated, clean lines and the graphic Greca pattern on the midsole. The low top design is embellished with boldly printed Greca accents.', '23', 'Uf703698392f045239e6d84e326108c3fN.jpg_300x300.png', 'Shoes', 'Men'),
(18, '00000007', '07', 'Fender T-Shirt ', 'Evoking sunsets, soft winds and great music, you’ll always hang loose in this vintage surf inspired unisex tee from our California Collection.', '30', '100-Cotton-Custom-Plus-Size-Embroidery-T.jpg_300x300.jpg', 'Shirts', 'Men'),
(19, '00000008', '08', 'Cosmetic Brush Set', 'Can Be Removable and Easy To Wash: Through the perfect design, you can easy to install and dismantle it. The washable material make you can finish to clean it in less than 1 mins.', '10', 'H5f2f6db6cd3c4939a17eaf2edfbada11t.jpg_300x300.png', 'Cosmetic', 'Women'),
(20, '00000009', '09', 'Swaroski Necklace', 'As a truly American designer, Anne Klein put fashion on the map. The Anne Klein lifestyle appeals to a modern woman – with collections that are clean and polished. Today the Anne Klein brand carries on its heritage with designs that convey the look and fe', '30', 'HTB1O7LdbMKG3KVjSZFLq6yMvXXa1.jpg_300x300.jpg', 'Jewellery', 'Women'),
(21, '00000010', '10', 'stone numerals', 'Brand New100% OriginalComes with Tag and Emporio Armani PackagingProduct specificationsWatch Information', '18', 'H2be6503073cb44eea59e44520f4984f5V.jpg_300x300.png', 'Watches', 'Women'),
(22, '00000011', '11', 'Stylish Handbag', 'Handcrafted Desiger Evening Bag made by keeping in mind the latest fashion of women. It is very easy to carry with ampler of space and will definitely boost your look and personality with its great art work.', '35', 'H5554b75578c844999a50e5b920208f9cK.jpg_300x300.png', 'Bags', 'Women'),
(23, '00000012', '12', 'DIY Set  Up Doll ', 'Alisa 2 in 1 doll for kids 3 years old and above Box size: 26cm width, 30cm height  Note: we prefer cash on delivery. Thank you.', '16', 'H2a51a0e6503046bb8f2fd623f7336d1ce.jpg_300x300.png', 'Toys', 'Kids'),
(24, '00000013', '13', 'Cotton Dresses', 'This cotton frocks for girls ,cotton frocks for kids ,baby cotton dress ,handmade baby cotton frocks ,cotton ki frock ,cotton frock for baby girl ,white cotton frock for baby girl ,cotton ke frock ,cotton frock for 3 year girl', '24', 'H6cc1bcaad6d24eeb95cb7f40dc3db89ay.png_300x300.png', 'Dress', 'Kids'),
(25, '00000014', '14', 'Womens Runners', 'These shoes have been made with high quality man made leather material with a textile upper to ensure durability as well as breathability.', '34', '1_319047e8-365c-43ea-8cee-4e50edf253ec.png', 'Shoes', 'Women'),
(26, '00000015', '15', 'Goku Digital Printed Full Sleeve T-Shirt For Men', 'Soft Trendy Stylish Comfortable Premium quality', '23', 'bbbbe22c2aab7b577da620b0e0ee53f3.jpg', 'Shirt', 'Men'),
(27, '00000016', '16', 'Boys Knitted Night Wear - Blue', 'Regular Fit Casual Wear Material: Knitted Imported Machine Washable', '24', 'z579180521_2_1024x1024.jpg', 'Shirts', 'Kids'),
(28, '00000017', '17', 'GIRLS DOLL PLAY SET FOR KIDS', 'Collect them all! Rich Style Play Set with Magical Fun! The Ingredients to inspire the imaginations of Children! The Beat Gift For kids Explore the Possibilities! Fashion styles Specification Colours and contents May vary from Illustrations for ages 3 and', '8', 'z654440201_3_1024x1024.jpg', 'Toys', 'Kids'),
(29, '00000018', '18', 'Flats Sandals For Girls', 'High quality material, comfortable and soft, improves posture.Great choice for summer and winter as well. Suitable for outdoor walking,Entertainment, leisure, party, work and other occasions, color sturdy andstylish Trendy and stylish design. ', '13', 'abcf178b3b990b5cb81288778f865d72.jpg', 'Sandals', 'Women'),
(31, '00000019', '19', 'Genuine Cow Leather Wallet For Men- High Quality Material', 'Hight quality Genuine Cow Leather wallet for Men.This ﻿wallet gives a wonderful look to your outfit.We had manufacture this wallet genuine Cow leather.This is really a best gift to give to your loved ones Wallet', '10', 'aff181e5d2141489802704e6a2cb8fd4.png', 'Wallet', 'Men'),
(32, '00000020', '20', 'Watches -Luxury Gold Stainless Steel Round ', 'Watch parameters Length of watch with buckle: 24.5CM The diameter of the watch dial: 4.1CM The thickness of the watch dial: 1CM Bandwidth of the watch: 2CM Movement', '16', 'b1fa568cd1556de8b491c01a80750e04.jpg', 'Watches', 'Men'),
(34, '00000021', '21', 'Heart Pendant Necklace for Girls Silver Color', 'Heart Pendant Necklace for Girls Silver Color Slim and Smart Design Women Casual Heart-shaped Pendant Necklace for Ladies Fashion Jewelry', '18', '3e03119a2fcae2c75815bc287d48ca51.jpg', 'Jewellery', 'Women'),
(35, '00000022', '22', 'Pack of 12 Branded Matte Long-Lasting Lipsticks', 'Waterproof & Long Lasting - Give you a sexy experience .It’s silky, exquisite and elegant, make up your lips lightly, suitable for all seasons makeup, especially in office, dating, shopping, summer party with friends', '20', 'a4c11e2046e9d917ed3afb120a2a71d2.jpg', 'Cosmetic', 'Women'),
(36, '00000023', '23', 'Stitched Embrioded Silk Dress for Girls', 'Shirt Length 36 Trouser lenght 37 Chest size 20 2 Pc Silk Embrioded Dress 2 PC Readmade & Ready To Wear Dress Beautiful Dress for Events Likes Parties Outing Picnic etc. If any cheap refund polciy available. free Voucher for store followers 100 % gurrantt', '27', '3ec15b712dbd6dd1d1fb3aede56651d3.jpg', 'Dress', 'Women'),
(37, '00000024', '24', 'Flat sandal for women', 'High quality material, comfortable and soft, improves posture. Great choice for summer and winter as well. Suitable for outdoor walking, Entertainment, leisure, party, work and other occasions, color sturdy and stylish Trendy and stylish design', '15', '467245bcf2e7c39488efff9831e1c1ed.jpg', 'Sandals', 'Women'),
(38, '00000025', '25', 'Brandino-RED Avenger Cotton Printed T-Shirt for Mens', 'A T-shirt is a style of men fabric shirt, named after the T shape of the body and sleeves. It is normally associated with short sleeves, a round neckline, known as a crew neck, with no collar.', '14', '8cfd65f9e0982309b2724926667098b6.jpg', 'Shirts', 'Men'),
(39, '00000026', '26', 'Tarseel - Embroided NAVY BLUE FIT & FLARE DENIM DRESS', 'this dress is perfect for breastfeeding moms - you can easily unfasten it up to waist, if necessary composition: 75% cotton, 23% polyester, 2%lycra colour: navy blue', '11', 'a58ca95b11efdff1953ba5e4c24464fb.jpg', 'Dress', 'Women'),
(40, '00000027', '27', 'Premium Quality Luxury Ladies Hand Bag with Top Handle For Girls', 'Premium Quality Luxury Ladies Hand Bag with Handle For Girls. Crystal Bride Clutch top-grade which is sparkling and dazzling mix clear crystal and silver metal silver tone Luxury Ladies Hand Bag with Top Handlebow clasp which can be opened and closed smoo', '16', '0b17effa851dd59db37c7b2520a9f7aa.jpg', 'Bags', 'Women'),
(41, '00000028', '28', 'Theseen Traders Flats sandals for women', 'High quality material, comfortable and soft, improves posture. Great choice for summer and winter as well. Suitable for outdoor walking, Entertainment, leisure, party, work and other occasions, color sturdy and stylish Trendy and stylish design.', '13', '07e168986832679610dac96dafc34c26.jpg', 'Sandals', 'Women'),
(42, '00000029', '29', 'Stylish New Design Shoes for Men', 'Manufactured locally Gender: Men Outsole material : Rubber Style: sportsSeason: Autumn, Spring, Summer, Winter Application: Outdoor Features: Fashion / Breathable / Comfortable / Driver/ Casual/ washable', '16', '0b06331d336a04c6cf15211a040238c1.jpg', 'Shoes', 'Men'),
(43, '00000030', '30', ' Fashion Magnetic Wrist Watch for Girls', 'Product details of HS Collections Fashion Magnetic Wrist Watch for Girls HS924', '18', '4f656ffa1c8641480b5f5612c17faab5.jpg', 'Watches', 'Women'),
(44, '00000031', '31', 'MISS ROSE 11 Pcs (Eyeshadow, Foundation, Blusher, Kabuki) Set Of Makeup Brushes', '11 Pieces Professional Makeup Brush Set Bamboo Material Face Base Brushes Cosmetic Tools Beauty Makeup Brushes11 makeup brushes included:1 x kabuki eco brush (app 5.5cm)1 x flat top brush (10cm application)', '7', '10f65d57cec90b130c9c810ec5c38fe3.jpg', 'Cosmetic', 'Women'),
(45, '00000032', '32', 'Neck Chocker Necklace Jewelry Birthday Gift for Women Girls', 'Unique design and Perfect choice for ladies & girls High quality material / Trendy Choker Necklace The size of this charm necklace is adjustable. Perfect gift Fit for any occasion / Stylish Neck Patti For girls', '23', '87cb3ecbd2b903c91485f23092313e7c.jpg', 'Jewellery', 'Women'),
(46, '0000033', '33', 'Baby Angel Guitar Playing Swing Doll Toys For Girls', 'Baby Toys presenting Baby Angel Guitar Playing Swing Doll Toys For Girls. It carries a guitar which will play while the doll swing. The doll will sing a beautiful song. She will play guitar in their amazing swing style. Your baby will loves this Baby Ange', '7', 'dl.jpg', 'Toys', 'Kids'),
(47, '00000034', '34', 'Money Bag for Girls ', '4 Color available: Light Pink, Grey, Brown, Dark Grey Material: PU Leather; Size: 18.8(L)x10.5(W)x1.8(H)cm, 7.4*4.1*0.7 inch Structure: 2 x cash compartments, 14 x card holders, 2 x photo holders, 3 x note holders Suitable for casual and formal occasions', '8', 'e343b04efb493795864d061b3a3ec3c8 (1).jpg', 'Wallet', 'Women'),
(51, '00000035', '35', 'spiderman Spider man Costume Action Suit Set Super Hero Costume for Kids', 'Local Quality At Reasonable Rates Package: 1x shirt1x pantand 1x Shawl Embedded Mask Spider man Kids Costume  Polyester  Best For Kids  Local Quality At Reasonable Rates  Package: 1x shirt 1x trouser  1x  Mask', '13', 'e446fe8d836ac2495d41110243bdb78e.jpg', 'Dress', 'Kids'),
(52, '00000036', '36', 'Men\'s Hawaiian Shirts, Summer Casual Short Sleeve', 'Design: Classic shirt with Hawaiian print, perfect to be worn as a regular shirt or basic layer. Goes well with casual pants and stylish jeans for the daily look.Material: Made from high quality cotton blend, soft and breathable, lightweight and quick dry', '14', '9eae6f06da3d6692ede77fcaf880204a.jpg', 'Shirts', 'Men'),
(53, '00000037', '37', 'Men Ethnic Style Print Shirt with Pocket, Short Sleeve', 'Material: This shirt is made of polyester fabric which is breathable, skin-friendly and comfortable to wear, easy to fit any body figure for your daily wearing.Features: Button-up blouse is easy to wear and take off. With bust pocket for decoration and st', '15', '1fd5e83f77f8cb1364ded511716ea413.jpg', 'Shirts', 'Men'),
(54, '00000038', '38', 'Kenneth Cole New York - Stainless Steel Wrist Watch for Men', 'Display: Analog Mechanism: Quartz Dial color: Black and Gold Dial shape: Round Case Material: Stainless steel Case Color: Black Band material: Stainless Steel Band Color: Black Glass: Mineral Water resistance: 30 meters Wrist watch for Men', '23', 'afae5963be566706bdf14e46be06345b.jpg', 'Watches', 'Men'),
(55, '00000039', '39', 'Shoes For Mens, running and jogging shoes for Men', 'Running and jogging Sneakers For Men Best for Gym and sports Activities. specification:  Smooth,  Comfortable,  Odorless  good Quality washable good looking The Ultimate Running and Jogging sneakers which best For Gym and Sports Activities', '27', '97fea2a1e1c966a805f5fa2ba424da48.jpg', 'Shoes', 'Men'),
(56, '00000040', '40', 'CUSTOMIZE NAME AND PICTURE ENGRAVED WALLET AND KEYCHAIN WITH BOX PACKING', 'A beautiful gift for your loved once Pure guaranteed leather Note: this is not a return able or cancel able item Perfect gifts, photo engraved on wallet and keychain,could be personalized with your own photo5card slots,2 pockets for cash,1 ID windowA beau', '18', 'de004ea7aeb338deedb662c785371036.jpg', 'Wallet', 'Men'),
(57, '00000041', '41', 'Princess Party Wedding Kid Girl Sundress', 'Main Color: AS The PictureNew in FashionMaterial: Polyester+Cotton Newest Fashion Kids Baby Girls Pink Velvet Dress !!  High quality and Brand new 100%  Main Color: AS The Picture  New in Fashion', '13', '77ea13628b426f30691ed412c08e57ac.jpg', 'Dress', 'Kids'),
(58, '00000042', '42', 'Titanium Finger Ring With Cuboid Rectangle Neck Pendant For Boys And Men', 'Packed with Love and Care in Beautiful Bellina Jewellery Box which is Perfect for Gifting to Your Loved ones. Made of Premium Quality Material, Light Weight, Latest Trending Design and skin Friendly Product. Occasion Type: Birthday', '11', '3066a838da76b9a32f3a318f67354b8e.jpg', 'Jewellery', 'Men'),
(59, '00000043', '43', 'Men Loose Printing Sunscreen Three Quarter Sleeve Kimono Cardigan Shirt', 'Made of breathable fabric, soft, light, and comfortable to wear.. Fashionable printing pattern with vivid color makes a retro and stylish look for you..', '16', 'd416326cf5618c0e3a69e0d9847616ec.jpg', 'Shirts', 'Men'),
(60, '00000044', '44', 'Make Up Sets Eyeshadow Lipstick Eyebrow Concealer Powder Brush Complete Cosmetics Kit For Female Beginner Student Full Set', '1. Primary makeup set, fully equipped, easy to carry, high quality, safe and reliable. 2. Contains multi-color matte eye shadow and glitter eye shadow, lip gloss, eyebrow cream, makeup pen, concealer, eye cream, etc., to meet your daily makeup needs. 3. L', '37', 'Make-Up-Sets-Eyeshadow-Lipstick-Eyebrow-Concealer-Powder-Brush-Complete-Cosmetics-Kit-For-Female-Beginner-Student.jpg_Q90.jpg_.png', 'Cosmetic', 'Women'),
(61, '00000045', '45', 'Mini Backpack Women mall School Bag Girl Bowknot Leaf Hollow Cute Backpack', 'The bag is perfect in workmanship. The elegant design can show your beautiful temperament.  More humanized design for you. Multiple straps change as your like . And it can feel free to change  It is very suitable for Wedding , party, ball, daily casual we', '16', 'Mini-Backpack-Women-PU-Backpack-Cute-Elegant-Bag-Small-School-Bag-Girl-Bowknot-Leaf-Hollow-Cute.jpg_220x220xz.jpg_.png', 'Bags', 'Women'),
(62, '00000046', '46', '12 Large Dinosaur Toys (7\") for Kids', 'KIDS DINOSAUR TOYS: Through these dinosaur toys for toddlers, your kids will experience the era of the dinosaurs! Let them play with these realistic dinosaur toys, discover sounds from dino toys like this set, and see the earth as it once was through thei', '16', '61W7LQobsaL._AC_UL320_.jpg', 'Toys', 'Kids'),
(63, '00000047', '47', 'GUESS Men\'s Leather Slim Bifold Wallet', 'STORAGE CAPACITY: With 6 card pockets, a clear ID window, and a currency pocket, there is more than enough room for all of your essentials. EVERYDAY FUNCTIONALITY: Enjoy this versatile and durable slim bifold wallet made for both style and utility. This w', '10', '8152ZCItLgS._AC_UL320_.jpg', 'Wallet', 'Men'),
(64, '00000048', '48', 'Blue Casual Sneakers AT7136', 'Made in the USA or Imported Rubber sole Durable synthetic upper with mesh panels for added breathability & comfort Plush foam sockliner for increased underfoot comfort EVA midsole delivers a lightweight & responsive ride Rubber outsole for traction & dura', '46', 'e22fd64fccb75f528f7e8c5521b6a960.jpg', 'Shoes', 'Men'),
(65, '00000049', '49', ' Golden Butterfly Pendant Necklace for Women', 'Fashion Golden Butterfly Pendant Necklace for Women & Gilrls Occasion:Daily-Dancing Party-Wedding-Engagement-Anniversary Material: Stainless Steel Fine Quality Product', '19', 'd814716a67bc0df509b3d1d25ed4ba6c.jpg', 'Jewellery', 'Women'),
(66, '00000050', '50', 'Maahru - Blue Braid Ankle Strap Sandle For Women', 'Open toe aqua blue flat sandals with tie-fastening ankle strap, branded insoles and leather braided lining outer, these flat sandals from Maahru are the ideal footwear to highlight your semi-formal look.', '38', '6a7746257acc8894dd7d4bfd95e96bca.jpg', 'Sandals', 'Women'),
(67, '00000051', '51', 'Baby Tops Pants Suit, Short Sleeve Round Neck Shirt Sports Pullover Kid Boy’s Shorts,', 'Special designed loose tops set, breathable cotton blend clothes for spring / fall Suitable for many occasions, great for party, birthday party, holiday, beach, photo , daily wear This tops suit for kid which is ple and cute, beautiful and fashionable, so', '12', '8db7a347a39dfc84a3aae26aa8f4a845.jpg', 'Dress', 'Kids'),
(68, '00000051', '51', ' Pearl Handle Mini Bag, Jelly Bag Female Purse', 'Types of bags:Handbags & Crossbody bags Main Material:PU Size :19 CM length 12 CM Height 6 CM Width All demensions are measured byhand, please allow 1-2cm deviations. NO of Pockets : 1 Exterior:Silt Pocket Gender:Women Number of Handles/Straps:Single', '27', 'e29c50f4b2084ec066a5daf11c79c098.jpg', 'Bags', 'Women'),
(69, '00000053', '53', 'Men\'s Casual Plaid Hooded Shirts,', 'Design: Fashion color block plaid, with hooded, classic and stylish. Long sleeve, buttons, easy and convenient to wear. Material: Made of cotton blend, breathable and comfort; wind resistant, warm enough to wear.', '15', 'f03311540e742352f1068ee8077dbc5c.jpg', 'Shirts', 'Men'),
(70, '00000054', '54', 'Casual Shoes For Men', 'Fashion Shoes For Men Casual Partywear Boys Sneakers Original Pictures attached Light Weight Best Comfortable Boot Color: Blue Size: 40-44 (7-10)', '32', '4685d6edec2eb74d8f30dc054cc288ac.jpg', 'Shoes', 'Men'),
(71, '00000055', '55', 'Code Cross Body HandBags For women', 'This Bag is made of Good Quality. It features an attractive design making it a must-have accessory in your collection. we sell different kinds of bags for women & girls.', '23', 'ba064d693783acbc57f9f006fd27f4fe.jpg', 'Bags', 'Women'),
(72, '00000056', '56', 'Flat Sandals For Women Flat Black Velvet Sandal For women', 'High quality material,comfortable and soft, improves posture. Great choice for summer and winter aswell. Suitable for outdoor walking, Entertainment, leisure, party, work andother occasions, color sturdy and stylish Trendy and stylish design.', '24', '147780c1a2ebb0f8f44cee930667cb9d.jpg', 'Sandals', 'Women'),
(73, '00000057', '57', 'Digital LED waterproof military sports  functioned watch for men ', 'Special dial design for precise time management. The watch is at very reasonable price as compared to market. Unique design, great gift for yourself or your friends its compact size for carrying easily Time function with month, date, hour, minute display ', '19', '6f0ce95df60006bca08ec56ca7d9bcdd.jpg', 'Watches', 'Men'),
(74, '00000058', '58', 'Heart shape Necklace Pendant with Silver Chain for Girls & Women', 'Pretty Red Crystal Zircon Heart shape Necklace Pendant with Silver Chain for Girls & Women Material: Alloy Crystal Perimeter: 43 cm Pendant: 2*1.5cm Occasion: Party, Wedding, Birthday, Anniversary etc Gender: Female Fine Quality We Always Deliver More Tha', '34', '6a340d792649359fe90afbdd4e4e0549.jpg', 'Jewellery', 'Women'),
(75, '00000059', '59', 'Pack of 5 lipstick', 'Looking for some 5 in 1 lipstick? so you are at right place. We are providing 5 in 1 matte lipsticks in 2 shades, Poppy and nude. So choose from the best colors options and also gift this 5 in 1 lipstick to all your fellows. So what are you waiting for? p', '25', 'f1d2909aa3fe95f89a3ee97c1cc1804c.png', 'Cosmetic', 'Women'),
(76, '00000060', '60', 'Doctor Set For Kids - 8 pieces - Pink', 'Baby Toys presenting the perfect toy set Doctors Set for Kids and enhance their passion for becoming a doctor. Made with durable plastic material, this set includes everything from stethoscope to thermometer that reflects light and sound on its usage. Sui', '14', '26fa255b70b8cbe5b1fdc55eddd3f366 (1).jpg', 'Toys', 'Kids'),
(77, '00000061', '61', 'Women Long Sleeve Chain Printed Shirts', 'Package included:1 Blouse Material:95% Polyester+5% Spandex Colors:Black,Red,Beige Sleeve Length:Full Sleevee Neckline:Turn-Down-Collar Pattern:Printing Buckle chain:Button Down Front,ButtonCuffs Thickness:Thin Style:Leisure,Bohemian,Retro,Europe Season:S', '26', '3f0352bab895e6a15382d24f07933ef9.jpg', 'Shirts', 'Women'),
(78, '00000062', '62', 'Long Wallets for girls Clutch for women', 'A wonderful design clutch bag/hand purse comes with glittering stars from front and back. Plain red high quality PU leather with golden Bling Bee logo adds more beauty to its design. This decorated bag has some stylish, amazing looks and shape that is imp', '16', '17f2d77b85e208460aadf02bcf533752.jpg', 'Wallet', 'Women'),
(79, '00000063', '63', 'Kids Sandals Remium Quality Footwear Branded', 'its good quality sandal for awesome kids for the age of 1 to 5 year kids Sizes available: 21 to 28 Its good quality sandal Stylish look comfortable to wear light weight both formal and casual wear', '12', 'ae8b61238b3bf06d9fc3e0ab8477b2f5.jpg', 'Sandals', 'Kids'),
(80, '00000064', '64', 'Handmade Doll House Furniture Kit DIY Mini Dollhouse Wooden Toy For Kids', 'Brand new and high quality. You can DIY a dream house, full of imagination and fun. LED light, ornament, furniture are quite realistic and cleverly designed. The collection and crafting is also inspiring adults to get their architect mapping modules done.', '11', '0424c7fd45ad72ac02a6fbda2949d7a8.jpg', 'Toys', 'Kids'),
(81, '00000065', '65', 'Super Stylish & Mini Wallet with Button - Slim Card Holder For Boys', 'Hight quality Genuine Cow Leather wallet for Men.This ﻿wallet gives a wonderful look to your outfit.We had manufacture this wallet genuine Cow leather.This is really a best gift to give to your loved ones Wallet', '4', '9c42d5792d92c03c466cda0dd64c5c14.jpg', 'Wallet', 'Men'),
(82, '00000066', '66', 'Beauty Make-up Box Toy Set - Princess Makeup Kit For Girls', 'Ali Ali gifts presenting Beauty Make-up Box Toy Set - Princess Makeup Kit For Girls. Baby girl will enjoy with fun using this Make-up Box.Make-up Box look beautiful and attractive. Baby girl definitely enjoy a lots from this item. You can watch the produc', '23', 'b445370611ffbc685484f4199310a22b.jpg', 'Cosmetic', 'Kids'),
(83, '00000067', '67', 'Small Pikachu Stuffed Bag for Boys and Girls School Bag Gift for Kids', 'Item Type: School Bags Pattern Type: Cartoon Type: Backpack Main Material: Cotton Fabric Item Length: 21cm Item Weight: 0.15kg Closure Type: zipper Item Width: 9cm Material Composition: cotton Item Height: 23cm', '11', '519bfea444c9dae3a4d3beeb9d8bca54.jpg', 'Bags', 'Kids'),
(84, '00000068', '68', 'Black Men Sports black Sneaker Running Walking Gym Casual Fashion Shoes', 'Premium Quality sheosBlack Men Sports Sneaker Running Walking GymCasual Fashion ShoesRunningBreathable', '34', 'f4120514b86990299fc2372af1addf18.jpg', 'Shoes', 'Men'),
(85, '00000069', '69', 'Kids Spiderman 3D Display Watch For Kids - Cartoon Watch For Boys & Girls', 'Buy this kids watch after watching the video Best Material watch for kids Attractive Durable Some Thing That Kids Will Definately Enjoy. Cartoon kids Watch with Projector display for kids Small kids will surely love it.Features time and date', '4', 'fdb173df0219a759db4ce9f0249e1ec7.jpg', 'Watches', 'Kids'),
(86, '00000070', '70', 'Elegant Female Pearl Earrings Set Zircon Pearl Earings Women Party Accessories 9 Pairs/Set', 'Type: EarringsGender: Women,Girl Style Korean Beauty CuteMaterial AlloyOccasions Party Banquet Dating Cocktail etcFeatures Charming Simple Design KoreanSize Same as model pictureNotes Due to the light and screen setting difference', '21', '229f50670b40b284b7e1b77268f0cca9.jpg', 'Jewellery', 'Women'),
(87, '00000071', '71', '12pcs Set Mini Cute Lipstick Travel Set Waterproof Lip Kit', 'Features: Brand New & High quality. Portable size, easy to carry. Suitable for professional use or home use. This Lipstick Set is particularly suitable for tourists to carry when the tourists go out.', '17', '4c43ed1aa0a980f8efa1765d6041816e.png', 'Cosmetic', 'Women'),
(88, '00000072', '72', 'olorful Waffle Building Blocks - Brain and Educational Little Tikes Block Toys for kids', 'Note: Peg Board Puzzle - Pegged - jigsaw Brain Game Pin Blocks - Smart Sticks Stick Building Blocks - Snowflake Snow Flake - Alphabet Letters Words - A to Z - Counting 1 to 20 - Learning Spelling - Educational Buildings Block - Waffle Building Blocks - Br', '5', '9bbd3cdd2a539c8794d73c846b4a0b9f.jpg', 'Toys', 'Kids'),
(89, '00000073', '73', 'Mini Trifold Short Card Holder Wallet for Women', 'Gender: Women Premium Quality Small Card Holder Wallet Material: PU Leather Wallet Type: Trifold Total Compartment: 9 Pockets for Cards: 5 Pockets for Money: 1 Dimensions : L 3.5 inch x W 4.5 inch Item Weight: 0.20 kg', '12', 'd3a294ce815da4d0c57da61cc2901652.jpg', 'Wallet', 'Women'),
(90, '00000074', '74', 'Laptop & Casual Bag - Laptop Backpack for Men | School - College & University Carry Backpack |', ' Travel Backpack For Boys - 16.5-Inch Laptop and USB Casual Backpack - Laptop Backpack for Men - A stylish & High-quality bag which enhance your lifestyle! Outdoor Travel Bag for Men/Women/College/Teen/Travel Durable, Light Weight with Multi Compartment I', '29', '76283d9b2c87ca160b9815e2d99e0238.jpg', 'Bags', 'Men'),
(91, '00000075', '75', 'Foot Forward 592 Flats sandals for women Flat sandal for women', 'Ladies Flat Sandals For Girls and Women Party Ladies Flat Sandals. Casual Ladies Flat Sandals. Stylish Ladies Flat Sandals. Comfortable girls Flat Sandals. These are soft and easy to wear Flat Sandals for women in different colors mentioned above. You can', '23', 'd68183b41265287c3dce22759737a72f.jpg', 'Sandals', 'Women'),
(92, '00000076', '76', 'candy color women shoes sports shoes', 'Running and jogging Sneakers For Men Best for Gym and sports Activities. specification: Smooth, Comfortable, Odorless good Quality washable good looking The Ultimate Running and Jogging sneakers which best For Gym and Sports Activities', '33', 'f3ddb6f7b9693aa89f62c7eba92a8b1a.jpg', 'Shoes', 'Women'),
(93, '00000077', '77', 'LouisWill Classic Men Diamond Watches Luxury Gold', 'WATCH BAND:24cm length and 20mm width（Gentle hint: the watch band can be dismantled and adjusted by adjusting the needle in the package.）,stainless steel watch band,hidden butterfly pushed button,fadeless,ventilate,prevent perspiration,fit wrist,quality a', '45', 'df8a16f69124dab21494216498ee2790.jpg', 'Watches', 'Men'),
(94, '00000078', '78', 'Mini kitchen play set - water flow system - Satisfied', 'Hello I am mini kitchen play set .I am very satisfied quality.Girls love me very much and plays with me Grab me now Hello I am mini kitchen play set I am very satisfied quality Girls love me very much and plays with me. Grab me now', '5', '77807a437c6bf2b1652e5f28d329a995.jpg', 'Toys', 'Kids'),
(95, '00000079', '79', 'CUSTOMIZE NAME ON WALLET WITH BOX PACKING ', 'You can customize name on Wallet WITH BOX PACKING5 card slots,2 pockets for cash, 1 ID windowA beautiful gift for your relative on any occasionPure guaranteed cow leatherUnique designA reliable productPacked with wonderful boxYou can send us your Name thr', '12', 'd075eb686fd9d58e08be4c3b866de087.jpg', 'Wallet', 'Men'),
(96, '00000080', '80', 'Imported Makeup Kit Complete Makeup Box Travelling', 'makeup kit - mini makeup kit - eye makeup kit - professional makeup kit - make up - eyeshadow kit - glitter eyeshadow kit - 4 shade eyeshadow kit - shimmer eyeshadow kit - eyeshadow kits - face powder - face powder kit - face powder brush - blushon - blus', '11', '8768e3218e294c5381c6694302e16a70.jpg', 'Cosmetic', 'Women'),
(97, '00000081', '81', 'Royal Blue Stone Jewelry Set For Women & Girls - Silver', 'Elegant & Decent Royal Blue Jewellery Set - Silver Delivered Same Product as shown in image 100% Brand New Quality Suitable for all occasions like Weddings, Birthday, Casual & Home Parties Quantity: ( Necklace+Earrings) Neclace Chain Length: 50cm Pendant ', '29', '746cfd54285f5fd1928ff642fa28312c.jpg', 'Jewellery', 'Women'),
(98, '00000082', '82', 'Ajrak Embroidery Stitched Frock For Girls Linan Dress For Girls', 'Ajrak Embroidery Stitched Frock For Girls Linan Dress For Girls Stylish Design Stitched Ajrak Frock For Girls Length-35 Chest-19 Sleeve-18 Fabric:Linan', '20', 'e0586087d792a2a9ca3487d5425f5075.jpg', 'Dress', 'Women'),
(99, '00000083', '83', 'Man and Woman Vintage Shirt Hawaii Beach Wear Short Sleeves', 'Made of top-class material, skin-friendly and breathable.. Loose shirt of short sleeves and turn-down collar.. Unique pattern printed tops, stylish and fashion.. Suitable for daily wear, party, shopping, etc.. Description:  Name: Shirt  Fabric Name: Cotto', '11', '64c5e0d57b37f4700413a2a09fad0cce.jpg', 'Shirts', 'Men'),
(100, '00000084', '84', 'Handbags for Girls, Women, Ladies, Tote Bag, Purse and Shoulder Bag', 'Extra one long Strip With Handbag Handbags for girls, women, ladies, Tote Bag, Purse and Shoulder bagze may be 2cm/1 inch inaccuracy due to hand measure. These measurements are meant as a guide to help you select the correct size. Please take your own mea', '23', 'fd7ecf78d565266be11628aa251573ae.jpg', 'Bags', 'Women'),
(101, '00000085', '85', 'Metro Wedge Sandal for Her - Elegent Style Wedges for Women', 'Gender: Women Color: 100% Same as in the picture Indoor & Outdoor Fashion Party and casual wear Sturdy and stylish. High quality material Convenient design Trendy and stylish Unique and new Design Easy to Wear 100% Original Picture Of The Item High qualit', '22', '00b74fb6ca5f417ea0831632f8f3a2db.jpg', 'Sandals', 'Women'),
(102, '00000086', '86', 'Calza Lace-Up Mens Sports Shoes for Men', 'Stay active throughout your athletic endeavors in these Lace-Up Mens Sport shoes by Calza.An extra stretch and durability is provided to the shoes owing to it being infused with a good quality knitted material.The cushioned insole with a lace up detailing', '34', 'f737181244b05376da76f70dd6aa5910.jpg', 'Shoes', 'Men'),
(103, '00000087', '87', 'Fngeen Steel Belt Men\'S Quartz Calendar Luminous Casual Watch', 'enuine watch, Official Direct Delivery,quality assurance! new listing, leading the trend of watches Reasonable pricing, quality service Precise movement. Precise time and keep good time. Your best choice for everyone as a gift. After-sales protection, con', '44', '8e0819a43d30f014585a20d266b8cb6a.jpg', 'Watches', 'Men'),
(104, '00000088', '88', 'Mermaid Makeup Brush Set 10 pieces', '10pcs makeup brushes kit.Keep in line with the fashion! Do your makeup with this professional makeup brush set.Bring yourself an even and charming makeup. Be the focus.Features:[10 brushes] A full set 10pcs brushes, co-use to draw a charming and delicate ', '21', 'f146efeac08d16cd2c78d080e283d521.jpg', 'Cosmetic', 'Women'),
(105, '00000089', '89', 'Bridal jewellery set of 3 pcs', 'necklace set typebridal wear materialmetal multi droppers and earrings occasionformal attractive design', '11', '867c238e966f31045551b0687f7db04e.jpg', 'Jewellery', 'Women'),
(106, '00000090', '90', 'Pieces 3-Storey Villa Family DIY Accessories Assembly Toy Girl Gift', 'This beautifully designed doll house will inspire your children and provide hours of entertainment. Creative games have never been so fun! All kinds of furniture can be placed anywhere, which can encourage creativity, imaginative games and improve coordin', '11', 'd1c44b3ff9dab4fbe81564116c7cf7fd.jpg', 'Toys', 'Kids'),
(107, '00000091', '91', 'Money Bag Pure Color Organizer Women Wallet', 'Zipper design allows you to open and close the wallet easily and prevents loss of items. In addition, this wallet is very small and portable, easy to carry and store. Easy to open and close with the zipper design, this wallet makes it very convenient for ', '11', '4595db4e717b588a0a8aac615e0f284b.jpg', 'Wallet', 'Women'),
(108, '00000092', '92', 'Stitched Cut Work Two Piece Suit for Women - Casual Dresses for Women', 'The Stitched Cut Work Two Piece Suit for Women available in many different colors because everyone has her own different choice in colors but it is only available in One Size that means there is no size variation available and this size is approximatley m', '43', '47baa6c44e8ff43f69706a53ecd7dc9b.jpg', 'Dress', 'Women'),
(109, '00000093', '93', 'Kohlapuri chappal sandles for girls in sale Stylish sandals for girls', 'Ladies Slippers For Girls and Women Party Ladies Slippers. Casual Ladies slippers. Stylish Ladies slippers. Comfortable girls slippers. These are soft and easy to wear Slippers for women in different colors mentioned above. You can choose your slipper siz', '25', '3ff90dd4ed99b07c8ffab11ce70fa948.jpg', 'Sandals', 'Women'),
(110, '00000094', '94', '3 Colors Waterproof Eye Shadow Eyebrow Powder Make Up Palette Women', 'The product adopts a three-layer 3-in-1 design, and one plate contains eyebrow powder The powdery texture is fine and smooth, easy to spread, easy to apply, and the color is natural. The color is full, the color is rich, and the color rendering is high. W', '11', '06640bb467a2f3f07c92e4f6376ccb24.jpg', 'Cosmetic', 'Women'),
(111, '00000095', '95', 'Jewellery Set - Kundan - Necklace, Earrings & Maang-Tika - with Golden Combination - Artificial Jewelry for Women & Girls - Fashion Jewelry', '100% Original Product as in Picture Golden Combination Premium Imported Quality Long-Lasting Polish Very Reasonable Price New Trending Design Best for weddings and parties Outstanding Graceful Look Complete Set Weight:110 gramsNecklace weight:76 grams Ear', '34', '16589fe9528ed2a0cf3c883fd76b186b.jpg', 'Jewellery', 'Women'),
(112, '00000096', '96', 'Plastic Camel Toy For Kids ( Boys & Girls ) - Collective Toy', 'Best Item For Gift Decoration Piece Best Toys For kids ( Boys & Girls ) 6 inches Approx', '4', '8ea0d8bca332f30059a0803c205c04b9.jpg', 'Toys', 'Kids'),
(113, '00000097', '97', 'Viso Shirt for Men', 'Casual Wear Shirts for Men Shirts for Men', '12', '9df53c994fc405ed56f593c5ad61b134.jpg', 'Shirts', 'Men'),
(114, '00000098', '98', 'ADIDAS UNISEX COURT VISION 2', 'Keep the defence guessing. These adidas basketball shoes have a sock-like fit for increased stability whenmaking end-to-end plays. A lightweight Bounce midsole offers the comfort you need to nail jumper after jumper.  Sock-like fit Lace closure Textile up', '57', '62629f9e33d2edbc2f39aebf1f5df9b3.jpg', 'Shoes', 'Women'),
(115, '00000099', '99', 'School Bag for Boys and Girls, Perfect Size for Class KG to 1', ' designed our 16 Inch Backpack to withstand even the toughest, homework-filled school days. Made from super durable 600-denier polyester fabric with an interior moisture-resistant nylon lining, the 15 Inch Backpack is capable of handling anything you thro', '25', '0fec3a7b437c468ae8b4c2a0f0b237f0.jpg', 'Bags', 'Kids'),
(116, '00000100', '100', 'Female long section wild Wellet Clutch Bag Women Purse', 'shop new design clutches for girls and women from  Clutch Bags Collections. this latest design large sized clutch is suitable for all occasion such as wedding, prom, birthday, outdoor etc.it is available in one design which can match any outfit. this clut', '27', '69c67c9612c50fb53f2931978576545f.jpg', 'Wallet', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(14, 'emp', 'user@gmail.com', '111', 'user'),
(15, 'asim', 'asim88978@gmail.com', 'asim', 'admin'),
(16, 'emo', 'empolyoe123@gmail.com', '12345', 'emp'),
(17, 'moshin', 'user2@gmail.com', '222', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
