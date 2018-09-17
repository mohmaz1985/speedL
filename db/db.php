-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2017 at 08:48 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `speedLinkDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `order_recorder` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=>active,2=>delete',
  `publish` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `showInHomePage` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'yes=>1,no=>0',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `image`, `categories`, `lang`, `order_recorder`, `status`, `publish`, `showInHomePage`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'About Speed Link', '<p>Smartlink<sup>&reg;</sup>&nbsp;Communications is a Jordanian Private Shareholding Company that will operate as a Global Broadband Satellite Services Provider that will operate in the Middle East, North Africa, and further Eastern Europe regions.</p>\r\n<p>Smartlink<sup>&reg;</sup>&nbsp;Communications is the only VSAT Licensed company in Jordan and has its own IDirect Platform collocated in Smartlink head office in Amman to provide 2-Way High speed internet access including home users, small business &amp; corporate, government offices and remote sites, VoIP (Voice over IP), Video Conferencing, International Voice Gateways with GSM Operators, and Assets Tracking-Fleet Management Systems with the most affordable prices ever offered.</p>\r\n<p>The gateways are built around several transponders of space segment utilizing the latest technologies implemented by Newskies for being the world&rsquo;s leader in Satellite Communications. Smartlink<sup>&reg;</sup>&nbsp;will be utilizing one of the most recently launched satellite Arabsat Bader-4, Express AM44 and Thor 10-02.</p>\r\n<p>&nbsp;</p>\r\n<p>Smartlink<sup>&reg;</sup>&nbsp;Communications is the only VSAT Licensed company in Jordan and has its own IDirect Platform collocated in Smartlink head office in Amman to provide 2-Way High speed internet access including home users, small business &amp; corporate, government offices and remote sites, VoIP (Voice over IP), Video Conferencing, International Voice Gateways with GSM Operators, and Assets Tracking-Fleet Management Systems with the most affordable prices ever offered.</p>\r\n<p>The gateways are built around several transponders of space segment utilizing the latest technologies implemented by Newskies for being the world&rsquo;s leader in Satellite Communications. Smartlink<sup>&reg;</sup>&nbsp;will be utilizing one of the most recently launched satellite Arabsat Bader-4, Express AM44 and Thor 10-02.</p>\r\n<p>&nbsp;</p>', 'uploadFile/about/About Speed Link_2017_11_04_11_11_08.png', '7', 'en', 5, 1, 1, 1, 1509017486, 1, 1509865644, 1),
(3, 'شسشسي', '<p style=\"text-align: right;\">شسيشيسشي</p>', 'uploadFile/about/شسشسي_2017_10_26_02_10_54.jpg', '10', 'ar', 2, 1, 1, 1, 1509019974, 1, 1509791831, 1),
(4, 'Our Team', '<p>Smartlink<sup>&reg;</sup>&nbsp;Communications brings together the resources of an expert team of satellite and network engineers with extensive knowledge and experience in Satellite Broadband &amp; Wireless Internet Services and Telecommunications, working to advance and strive towards all aspects of our customers&rsquo; requirements.</p>\r\n<p>We have assembled our Support Team, available on a 24&times;7 basis, to be well versed in a variety of technologies, since the quality of technical support is as important as the quality of technology services provided to our customers.</p>\r\n<p>The Satellite operations used by Smartlink<sup>&reg;</sup>&nbsp;are based in a state of the art Network Operations Center (NOC) in Amman &amp; Riyadh. With redundant Fiber Internet Backbone connections, and an expert team of trained technical staff and on-call support personnel, Smartlink<sup>&reg;</sup>&nbsp;is committed to provide its customers with unparalleled service and support.</p>', 'uploadFile/about/Our Team_2017_11_05_07_11_34.jpg', '19', 'en', 4, 1, 1, 0, 1509791490, 1, 1509862594, 1),
(5, 'The Misssion', '<p>Smartlink<sup>&reg;</sup>&nbsp;is aiming to provide users with high quality Internet services and data communications, using the latest Satellite Technology available. Smartlink<sup>&reg;</sup>&nbsp;is keen to offer professional systems integration solutions in Information Technology, Satellite Communications, and High-speed Internet Services. Smartlink<sup>&reg;</sup>&nbsp;will achieve its goal by delivering architectural solutions and the most cost efficient technology solutions for business integration requirements.</p>', '', '18', 'en', 1, 1, 1, 0, 1509791777, 1, 1509865525, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parentid` int(11) NOT NULL,
  `modelID` int(11) NOT NULL,
  `showINList` tinyint(1) NOT NULL COMMENT '1=>yes,2=>no',
  `numberOfUse` int(11) NOT NULL DEFAULT '0',
  `lang` varchar(2) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parentid`, `modelID`, `showINList`, `numberOfUse`, `lang`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Main News', 0, 3, 1, 3, 'en', 1508998122, 1, 1509016090, 1),
(2, 'قائمة الاخبار', 0, 3, 1, 1, 'ar', 1508998703, 1, 0, 0),
(3, 'Contact Us', 0, 5, 1, 3, 'en', 1509004387, 1, 0, 0),
(4, 'اتصل بنا', 0, 5, 1, 2, 'ar', 1509006544, 1, 0, 0),
(7, 'About Speed Link', 0, 6, 1, 1, 'en', 1509016115, 1, 1509790612, 1),
(10, 'من نحن', 0, 6, 1, 1, 'ar', 1509019951, 1, 0, 0),
(11, 'VSAT', 0, 8, 1, 2, 'en', 1509022923, 1, 1509781048, 1),
(12, 'الخدمات', 0, 8, 1, 0, 'ar', 1509023014, 1, 0, 0),
(16, 'VOIP', 0, 8, 1, 2, 'en', 1509781066, 1, 0, 0),
(17, 'Projects', 0, 8, 1, 1, 'en', 1509781112, 1, 0, 0),
(18, 'Our Mission', 0, 6, 1, 1, 'en', 1509790634, 1, 0, 0),
(19, 'Our Team', 0, 6, 1, 1, 'en', 1509790651, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `order_recorder` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=>active,2=>delete',
  `publish` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `description`, `image`, `categories`, `lang`, `order_recorder`, `status`, `publish`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Contact US', '<p>Phone: 000</p>\r\n<p>email: <a href=\"mailto:aa.@.com\">aa.@.com</a></p>\r\n<p>qqq</p>', '', '3', 'en', 1, 1, 0, 1509004778, 1, 1509004791, 1),
(2, 'Contact US33333', '<p><strong><u>Head Office:</u></strong><br />7<sup>th</sup>&nbsp;Circle &ndash; Ibrahim Al-Qattan St. Villa#77&nbsp;<br />P.O. Box: 3060 Amman<br />Code: 11821 Jordan<br />Tel: +962 79 7775444<br />&nbsp;<strong>Emails</strong></p>\r\n<p>&nbsp;</p>\r\n<p>info@smartlinkcomm.com<br />sales@smartlinkcomm.com</p>\r\n<p><strong>Contact</strong></p>\r\n<p>support@smartlinkcomm.com</p>', '', '3', 'en', 2, 1, 1, 1509005899, 1, 1509801281, 1),
(3, 'اتصل بنا', '<p>ظذشسيشسسيشسيشيشيشسي</p>', '', '4', 'ar', 5, 1, 1, 1509006622, 1, 1509006639, 1),
(5, 'يسشسيشي', '<p>شسيشيسشي</p>', '', '4', 'ar', 3, 1, 1, 1509006669, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1507278291),
('m130524_201442_init', 1507278304),
('m160207_131617_create_ymd_categories_table', 1508639180);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `order_recorder` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=>active,2=>delete',
  `publish` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `showInHomePage` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>0',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `categories`, `lang`, `order_recorder`, `status`, `publish`, `showInHomePage`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'DAMA (Demand Assignment Multiple Access) ', '<p>Newsss&nbsp; DAMA (Demand Assignment Multiple Access) is a VSAT system without a Hub that supports many applications in one network. Satellite Bandwidth (Transponder) cost saving is the greatest advantage of this system and it supports customer applications as IP, or Frame Relay protocols.</p>\r\n<p>Using DAMA (Mesh) topology, Smartlink<sup>&reg;</sup>&nbsp;provides remote-to-remote direct connectivity using a single hop solution. Smartlink<sup>&reg;</sup>&nbsp;provides total DAMA turnkey solutions for designing the network, installation of the remote DAMA Terminals, commissioning and the remote maintenance, using a very powerful NMS (Network Management System).</p>\r\n<p>This service is most suitable for the requirements of corporate customers, Banks, Defense organizations, Governmental institutions, Air Traffic Control and for Oil &amp; Gas companies.</p>\r\n<p>&nbsp;</p>', 'uploadFile/news/DAMA (Demand Assignment Multiple Access) _2017_11_04_01_11_23.jpg', '1', 'en', 2, 1, 1, 1, 1509004951, 1, 1509798983, 1),
(2, 'DAMA (Demand Assignment Multiple Access)22', '<p>Newsss2222&nbsp; DAMA (Demand Assignment Multiple Access) is a VSAT system without a Hub that supports many applications in one network. Satellite Bandwidth (Transponder) cost saving is the greatest advantage of this system and it supports customer applications as IP, or Frame Relay protocols.</p>\r\n<p>Using DAMA (Mesh) topology, Smartlink<sup>&reg;</sup>&nbsp;provides remote-to-remote direct connectivity using a single hop solution. Smartlink<sup>&reg;</sup>&nbsp;provides total DAMA turnkey solutions for designing the network, installation of the remote DAMA Terminals, commissioning and the remote maintenance, using a very powerful NMS (Network Management System).</p>\r\n<p>This service is most suitable for the requirements of corporate customers, Banks, Defense organizations, Governmental institutions, Air Traffic Control and for Oil &amp; Gas companies.</p>', 'uploadFile/news/DAMA (Demand Assignment Multiple Access)22_2017_11_04_12_11_23.jpg', '1', 'en', 1, 1, 1, 1, 1509005548, 1, 1509794543, 1),
(3, 'سسس', '<p style=\"text-align: right;\">ششسشسشس</p>', '', '2', 'ar', 3, 1, 2, 0, 1509015610, 1, 0, 0),
(4, 'Newsss3333  DAMA (Demand Assignment Multiple Access) ', '<p>Newsss3333&nbsp; DAMA (Demand Assignment Multiple Access) is a VSAT system without a Hub that supports many applications in one network. Satellite Bandwidth (Transponder) cost saving is the greatest advantage of this system and it supports customer applications as IP, or Frame Relay protocols.</p>\r\n<p>Using DAMA (Mesh) topology, Smartlink<sup>&reg;</sup>&nbsp;provides remote-to-remote direct connectivity using a single hop solution. Smartlink<sup>&reg;</sup>&nbsp;provides total DAMA turnkey solutions for designing the network, installation of the remote DAMA Terminals, commissioning and the remote maintenance, using a very powerful NMS (Network Management System).</p>\r\n<p>This service is most suitable for the requirements of corporate customers, Banks, Defense organizations, Governmental institutions, Air Traffic Control and for Oil &amp; Gas companies.</p>\r\n<p>Newsss3333&nbsp; DAMA (Demand Assignment Multiple Access) is a VSAT system without a Hub that supports many applications in one network. Satellite Bandwidth (Transponder) cost saving is the greatest advantage of this system and it supports customer applications as IP, or Frame Relay protocols.</p>\r\n<p>Using DAMA (Mesh) topology, Smartlink<sup>&reg;</sup>&nbsp;provides remote-to-remote direct connectivity using a single hop solution. Smartlink<sup>&reg;</sup>&nbsp;provides total DAMA turnkey solutions for designing the network, installation of the remote DAMA Terminals, commissioning and the remote maintenance, using a very powerful NMS (Network Management System).</p>\r\n<p>This service is most suitable for the requirements of corporate customers, Banks, Defense organizations, Governmental institutions, Air Traffic Control and for Oil &amp; Gas companies.</p>', '', '1', 'en', 4, 1, 1, 1, 1509799013, 1, 1509799150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `order_recorder` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=>active,2=>delete',
  `publish` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `link`, `description`, `image`, `lang`, `order_recorder`, `status`, `publish`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'ArabSat', 'http://www.google.com', '<p><strong>Satellites</strong>, Founded in 1976 by the 21 member-states of the Arab League, Arabsat has been serving the growing needs of the Arab world for over 30 years. Now ranked as the world&rsquo;s 9th largest satellite operator, and by far the leading satellite services provider in the Arab world, it reaches millions of homes in over 100 countries across the Middle East, Africa and Europe; including more than 164 million people within the 21 Arab countries. Operating a growing fleet of 4 satellites at the 26&deg; East and 30.5&deg; East positions of the geostationary orbit, Arabsat is the only satellite operator in the region offering the full spectrum of Broadcast, Telecommunications and Broadband services.</p>', 'uploadFile/partners/ArabSat_2017_11_04_02_11_08.png', 'en', 3, 1, 1, 1509021564, 1, 1509800588, 1),
(3, 'NewSkies', 'http://www.googlexxx.com', '<p><strong>Satellites</strong>, the world&rsquo;s leaders in satellite communications. A new, high-powered broadband multimedia satellite NSS6 was launched in December 2002 @ 95 degrees east. This Ku-and Ka-band satellite is the mist sophisticated and flexible satellite in the region for DTH Television, broadband content delivery and corporate data services in all Asian markets from Japan to the Middle East. This satellite uses the latest satellite technologies available in the market.</p>', 'uploadFile/partners/NewSkies_2017_11_04_02_11_38.png', 'en', 1, 1, 1, 1509021583, 1, 1509800558, 1),
(4, 'جوجل', 'http://www.google.com', '', 'uploadFile/partners/جوحل_2017_10_26_02_10_45.jpg', 'ar', 4, 1, 2, 1509021825, 1, 1509021856, 1),
(5, 'Orange', 'http://www.orange.jo', '<p>Orange its launch in 1994 in the UK market, Orange has been synonymous with making mobile communications an intuitive part of everyday life. Orange is widely perceived as a global international brand that stretches across the world due to its creative philosophy that focuses not on technology and products, but on the benefits they bring to people. Orange endeavors to bring customers closer to the people, information and entertainment they value, whenever wherever. Today the home of Orange has become Paris following their acquisition by France Telecom in August 2000. In June 2006, as part of France Telecom Group&rsquo;s integrated operator strategy to deliver simple convergent products, Orange became the single brand for mobile, internet and TV offers in France, the United Kingdom, the Netherlands and Spain, strengthening Orange&rsquo;s position as the number two mobile and internet services brand in Europe. In addition, Orange Business Services became the new banner for business communications solutions and services. Orange is one of the world&rsquo;s leading telecommunications operators with over 153 million customers in 220 countries worldwide.</p>', 'uploadFile/partners/Orange_2017_11_04_02_11_24.png', 'en', 5, 1, 1, 1509800678, 1, 1509800998, 1),
(6, 'ND', 'http://www.ND.com', '<p><strong>SatCom</strong>&nbsp;is a leading global supplier of satellite based<br />broadband VSAT, broadcast and military communication network solutions. Our<br />innovative technologies are deployed in broadcast, enterprise, telecom, media,<br />Internet, government and military environments worldwide. Customers choose ND<br />SatCom as a reliable source of comprehensive and secure turnkey and tailored<br />system engineered solutions.</p>', 'uploadFile/partners/ND_2017_11_04_02_11_05.png', 'en', 6, 1, 1, 1509800705, 1, 1509800981, 1),
(7, 'iDirect', 'http://www.iDirect.com', '<p>iDirect is another leading global supplier of satellite based broadband VSAT. VT iDirect (iDirect), a subsidiary of VT Systems, is transforming the way the world gets and stays connected. The company&rsquo;s satellite-based IP communications technology enables constant connectivity for voice, video and data applications in diverse and challenging environments. These include extending private networks to remote offices; supporting mobile connectivity across land, sea and air; providing rural telephony and Internet broadband; and maintaining communications in the wake of disasters and network failures. The iDirect Intelligent Platform&trade; integrates advanced technology into iDirect&rsquo;s portfolio of hubs, routers and network management software to address the growing complexity of deploying and managing global IP networks.</p>', 'uploadFile/partners/iDirect_2017_11_04_02_11_58.png', 'en', 7, 1, 1, 1509800758, 1, 1509800971, 1),
(8, 'Verscom', 'http://www.verscom.com', '<p>Verscom International is emerging as one of the world&rsquo;s most innovative and effective next-generation &ldquo;Infrastructure Solutions&rdquo; and &ldquo;Telecom Services&rdquo; provider. Its advanced carrier architecture solutions, innovative next-generation services and revenue-ready managed IP voice solutions are driving aggressive growth, and turning market opportunity into service profitability for network operators and VoIP service providers across the emerging markets.</p>', 'uploadFile/partners/Verscom_2017_11_04_02_11_47.png', 'en', 8, 1, 1, 1509800807, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `order_recorder` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=>active,2=>delete',
  `showInHeader` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>yes,0=>no',
  `showInHomePage` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>yes,0=>no',
  `publish` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `categories`, `lang`, `order_recorder`, `status`, `showInHeader`, `showInHomePage`, `publish`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Two-Way Broadband Internet Solution (DVB-RCS)', '<p>Digital Video Broadcast with Return Channel System (DVB-RCS and DVB-RCS-S2) is the fastest and the most efficient two-way Broadband Internet services ever offered by the VSAT industry.</p>\r\n<p>Broadband Internet services using DVB-RCS and DVB-RCS-S2 can transmit up to 2 Mbps and receive up to 8 Mbps using a dish as small as 0.75m and no larger than 1.2m. This service can be adjusted to fit the requirement of all users such as individual users, business applications, corporate customers, Universities, Government institutes, Internet cafes and even ISP&rsquo;s.</p>\r\n<p>DVB-RCS and DVB-RCS S2 technology can be used for more than just the Internet, it is an ideal platform for VOIP, VPN networks with Video conferencing capabilities. It can also be utilized as an efficient method connecting to the Global ISDN gateways for distance learning and Telemedicine applications.</p>\r\n<p>Smartlink<sup>&reg;</sup>&lsquo;s Hub comprises of an Earth station communicating over a New Skies NSS6 satellite, to provide end-to-end IP communication to a large number of Terminals. The Hub provides control and monitoring functions for all transmit and receive operations. It generates control and timing signals for the operation of the remote stations, receives the remote return signals, and provides accounting functions and interactive services.</p>', 'uploadFile/services/Two-Way Broadband Internet Solution (DVB-RCS)_2017_11_04_10_11_19.jpg', '11', 'en', 2, 1, 1, 0, 1, 1509022941, 1, 1509792152, 1),
(2, 'Voice over Internet Protocol (VoIP)', '<p>The Voice over IP (VoIP) telephony revolution has been a long time coming. Every business in every industry is rolling out VoIP applications. Vendors are reporting sales of millions of VoIP handsets. VoIP is recognized as the next telephony technology to be deployed.</p>\r\n<p>Smartlink<sup>&reg;</sup>&nbsp;is deploying multi-service, carrier-grade and high-performance platform that will enable Smartlink<sup>&reg;</sup>&nbsp;to evolve its core competencies with new services such as the consumer white labeled residential/business Voice over Broadband (VoBB), hosted enterprise services, calling card and call back service, Wholesale Interconnects and much more</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"/speedLink/backend/web/uploads/services/VOIP.png\" alt=\"\" width=\"354\" height=\"201\" /></p>\r\n<p>Smartlink&reg; offers many services that can be grouped into two categories:</p>\r\n<p>Managed Services<br />Smartlink&reg; managed services is a comprehensive set of &ldquo;outsourced, hosted or partitioned&rdquo; applications including calling card, broadband telephony, call shop, call back, wholesale VoIP switch partitioning:<br />&bull; Residential Broadband IP Telephony.<br />&bull; Business Broadband IP Telephony.<br />&bull; Calling shops.<br />&bull; Prepaid/Postpaid Calling Card.<br />&bull; PC/Mobile hand-set softphone.</p>', 'uploadFile/services/Voice over Internet Protocol (VoIP)_2017_11_04_08_11_06.jpg', '16', 'en', 1, 1, 1, 0, 1, 1509022984, 1, 1509781326, 1),
(3, 'VSAT', '<p>Each of your assets to be tracked is equipped with an FMS Hardware Module &amp; Satellite Antenna which receives the GPS position information. The module regularly communicates back to the data center via the ORBCOMM satellite network, using 30 low-earth orbit satellites. An optional two-way, in-cab message display terminal allows real-time communications between the driver and dispatcher.</p>\r\n<p>Each of your assets to be tracked is equipped with an FMS Hardware Module &amp; Satellite Antenna which receives the GPS position information. The module regularly communicates back to the data center via the ORBCOMM satellite network, using 30 low-earth orbit satellites. An optional two-way, in-cab message display terminal allows real-time communications between the driver and dispatcher.</p>\r\n<p>Each of your assets to be tracked is equipped with an FMS Hardware Module &amp; Satellite Antenna which receives the GPS position information. The module regularly communicates back to the data center via the ORBCOMM satellite network, using 30 low-earth orbit satellites. An optional two-way, in-cab message display terminal allows real-time communications between the driver and dispatcher.</p>', '', '11', 'en', 3, 1, 0, 1, 1, 1509792097, 1, 1509792615, 1),
(4, 'VOIP', '<p>The Voice over IP (VoIP) telephony revolution has been a long time coming. Every business in every industry is rolling out VoIP applications. Vendors are reporting sales of millions of VoIP handsets. VoIP is recognized as the next telephony technology to be deployed.</p>\r\n<p>Smartlink<sup>&reg;</sup>&nbsp;is deploying multi-service, carrier-grade and high-performance platform that will enable Smartlink<sup>&reg;</sup>&nbsp;to evolve its core competencies with new services such as the consumer white labeled residential/business Voice over Broadband (VoBB), hosted enterprise services, calling card and call back service, Wholesale Interconnects and much more</p>', '', '16', 'en', 4, 1, 0, 1, 1, 1509792967, 1, 0, 0),
(5, 'Projects', '<p>Smartlink&reg; Wholesale Services operates a global infrastructure of carrier interconnects and direct routes through various switching facilities. Specific focus is given to providing high quality termination services to niche destinations in developing markets around the World.</p>\r\n<p>Through our long standing relationships with direct customers and suppliers including PTTs, competitive carriers and unique direct route operators, Smartlink&reg; has a regional focus on inbound and outbound traffic facilitated by:<br />&bull; Global high quality, competitive termination rates<br />&bull; Dedicated account managers<br />&bull; Smartlink&reg; International Voice Gateways<br />&bull; 24 X 7 X 365 NOC and customer support<br />&bull; Dynamic and customized routing procedures to maintain premium quality<br />&bull; commitment for all customers&rsquo; requirements.<br />&bull; CLI and roaming supported<br />&bull; Accurate Billing</p>\r\n<p>&nbsp;</p>', '', '17', 'en', 5, 1, 0, 1, 1, 1509793077, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `titleEN` varchar(255) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `modelName` varchar(255) NOT NULL,
  `modelTableName` varchar(255) NOT NULL,
  `dataPerPageEN` int(11) NOT NULL,
  `dataPerPageAR` int(11) NOT NULL,
  `categories` tinyint(1) NOT NULL COMMENT 'yes=>1,no=>2',
  `status` tinyint(1) NOT NULL COMMENT 'active=>1,delete=>2',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `titleEN`, `titleAR`, `modelName`, `modelTableName`, `dataPerPageEN`, `dataPerPageAR`, `categories`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Settings', 'الاعدادات', 'Settings', 'settings', 2, 4, 2, 1, 1508079125, 1, 1509018090, 1),
(2, 'Users Management', 'ادارة المستخدمين', 'UsersManagement', 'uesr', 1, 3, 2, 1, 1508079988, 1, 1508995694, 1),
(3, 'News', 'الاخبار', 'News', 'news', 1, 1, 1, 1, 1508566761, 1, 1509017978, 1),
(4, 'Categories', 'الفئات', 'Categories', 'categories', 4, 1, 2, 1, 1508987227, 1, 1509018072, 1),
(5, 'Contact Us', 'اتصل بنا', 'Contact', 'contact', 1, 2, 1, 1, 1509004356, 1, 1509015477, 1),
(6, 'About Us', 'من نحن', 'About', 'about', 1, 4, 1, 1, 1509015844, 1, 0, 0),
(7, 'Partners', 'الشركاء', 'Partners', 'partners', 3, 3, 2, 1, 1509020273, 1, 1509021655, 1),
(8, 'Services', 'الخدمات', 'Services', 'services', 1, 3, 1, 1, 1509022351, 1, 1509022964, 1),
(9, 'Site Information', 'معلومات الموقع', 'SiteInformation', 'siteInformation', 1, 1, 2, 1, 1509025251, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siteInformation`
--

CREATE TABLE `siteInformation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `footerInfo` text NOT NULL,
  `metaTag` text NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siteInformation`
--

INSERT INTO `siteInformation` (`id`, `title`, `adminEmail`, `footerInfo`, `metaTag`, `youtube`, `twitter`, `facebook`, `linkedin`, `lang`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'رابط السرعة لتكنولوجيا الاتصالات', 'info@a.com', 'رابط السرعة لتكنولوجيا الاتصالات', 'رابط, السرعة, لتكنولوجيا ,الاتصالات', 'http://www.youtube.com', 'http://www.twitter.com', 'http://www.facebook.com', 'http://www.linkedin.com', 'ar', 1509025122, 1, 1509788895, 1),
(2, 'Speed Link For Telecom Technology', 'info@a.com', 'Speed Link For Telecom Technology', 'Speed,Link,For,Telecom,Technology', 'http://www.youtube.com', 'http://www.twitter.com', 'http://www.facebook.com', 'http://www.linkedin.com', 'en', 1509025666, 1, 1509788751, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullName_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fullName_ar` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `jobTitle_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `jobTitle_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(3) NOT NULL COMMENT 'admin=>201,user=>202,me=>203',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `lastLogin` int(11) NOT NULL,
  `lastLogout` int(11) NOT NULL,
  `forceLogout` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullName_en`, `fullName_ar`, `jobTitle_en`, `jobTitle_ar`, `image`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `type`, `status`, `lastLogin`, `lastLogout`, `forceLogout`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'mohammad', 'Mohammad Alsayyed', 'محمد السيد', 'Web Development', 'مطور مواقع الالكترونية', 'uploadFile/userImage/mohammad_2017_10_14_09_10_47.jpg', 'LyUEvj-7uhwpEfgcvL_agLyy-3iGZdGY', '$2y$13$5bTR7XOmcm5wZwWIKs2YY.PMiPTBrXilDUq0HWAEiI2LUypul7sQW', NULL, 'mohmaz1985@yahoo.com', 203, 101, 1509865481, 1509859029, 1, 1507962784, 0, 1509028367, 1),
(2, 'zaid', 'Zaid Mazen', 'زيد مازن', 'Account', 'محاسب', 'uploadFile/userImage/zaid_2017_10_14_10_10_34.jpg', 'dj4RQk-KOEjeTQeskTTR-v1HLWz1Lf5G', '$2y$13$xSoeSS2F7YrNkSu4VLnaGOGtMLZfbW.jmEvtR58fXVhxDNJOcxI7O', NULL, 'zaid@yahoo.com', 201, 101, 1508567313, 1508501914, 1, 1507962842, 1, 1508567474, 2),
(6, 'zaid33', 'tt', '', 'ttt', '', '', 'l1uCife1wEpLUmTCaDGaxTQk4bUmi-zj', '$2y$13$TyhkdMEHuSgffqkMXGLOoOclY80c7/RJMB5l1FaPDDTQmri3sGoCW', NULL, 'ttt@t.com', 201, 101, 0, 0, 0, 1508086578, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteInformation`
--
ALTER TABLE `siteInformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `siteInformation`
--
ALTER TABLE `siteInformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;