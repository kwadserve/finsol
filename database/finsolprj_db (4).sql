-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'administrator@gmail.com',	'$2y$10$ljaTKT.GhUT5tKiLt3M/NuJ/gIm1huR1O3lnrP6OUk2A2QZFThHW6',	'jlUvPY5yRXU2642IaizylEuZu4EfxZo4yCRSXABfxKFWQWRxWavpRtCEBX16',	'2023-04-19 13:00:28',	'2023-04-19 13:00:28'),
(2,	'Moderator',	'moderator@gmail.com',	'$2y$10$2f4NRZSKpjtPpkZm20uCduefIfcyg28pxTC32XMQ8DrxdXFAirUKW',	NULL,	'2023-04-19 13:00:29',	'2023-04-19 13:00:29'),
(3,	'Manager',	'manager@gmail.com',	'$2y$10$ZJ71zbyVepI5c/gMx9lpXuiTnCt2fNUwQEqwRRmldWUqqUg65U8LG',	NULL,	'2023-04-19 13:00:29',	'2023-04-19 13:00:29');

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` longtext NOT NULL,
  `doc_key_name` varchar(100) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `gst_type_val` tinyint(2) NOT NULL,
  `for_partner_director` tinyint(2) DEFAULT '0',
  `for_multiple` varchar(30) DEFAULT NULL,
  `order` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `documents` (`id`, `doc_name`, `doc_key_name`, `filename`, `status`, `gst_type_val`, `for_partner_director`, `for_multiple`, `order`, `created_at`, `updated_at`) VALUES
(1,	'Pan Card',	'pancard_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:40:43',	'2023-04-21 18:40:43'),
(2,	'Aadhar Card',	'aadharcard_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:48:20',	'2023-04-21 18:48:20'),
(3,	'Voter Id or Passport',	'voterid_or_passport_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:52:03',	'2023-04-21 18:52:03'),
(4,	'Driving License',	'drivinglicence_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:52:33',	'2023-04-21 18:52:33'),
(5,	'Your Photo',	'userphoto_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:53:21',	'2023-04-21 18:53:21'),
(6,	'Rental Agreement',	'rentalagreement_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:53:50',	'2023-04-21 18:53:50'),
(7,	'Electricity Bill',	'electricitybill_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:54:19',	'2023-04-21 18:54:19'),
(8,	'Muncipal Reciept',	'municipallandreceipt_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:54:49',	'2023-04-21 18:54:49'),
(9,	'Aadhar Card of Land Lord',	'aadharpan_landlord_img',	NULL,	1,	1,	0,	NULL,	NULL,	'2023-04-21 18:55:24',	'2023-04-21 18:55:24'),
(10,	'PAN Card',	'p_pancard_img',	NULL,	1,	2,	1,	'Partner',	NULL,	'2023-04-22 20:02:14',	'2023-04-22 20:02:14'),
(11,	'Aadhar Card',	'p_aadharcard_img',	NULL,	1,	2,	1,	'Partner',	NULL,	'2023-04-22 20:02:38',	'2023-04-22 20:02:38'),
(12,	'Voter ID Card  Passport',	'p_voterid_or_passport_img',	NULL,	1,	2,	1,	'Partner',	NULL,	'2023-04-22 20:03:47',	'2023-04-22 20:03:47'),
(13,	'Driving License',	'p_drivinglicence_img',	NULL,	1,	2,	1,	'Partner',	NULL,	'2023-04-22 20:04:08',	'2023-04-22 20:04:08'),
(14,	'Photograph',	'p_userphoto_img',	NULL,	1,	2,	1,	'Partner',	NULL,	'2023-04-22 20:05:02',	'2023-04-22 20:05:02'),
(15,	'PAN Card',	'pancard_img',	NULL,	1,	2,	0,	NULL,	NULL,	'2023-04-22 20:02:14',	'2023-04-22 20:02:14'),
(16,	'Aadhar Card',	'aadharcard_img',	NULL,	1,	2,	0,	NULL,	NULL,	'2023-04-22 20:02:38',	'2023-04-22 20:02:38'),
(17,	'PAN Card',	'd_pancard_img',	NULL,	1,	3,	2,	'Director',	NULL,	'2023-04-22 20:02:14',	'2023-04-22 20:02:14'),
(18,	'Aadhar Card',	'd_aadharcard_img',	NULL,	1,	3,	2,	'Director',	NULL,	'2023-04-22 20:02:38',	'2023-04-22 20:02:38'),
(19,	'Voter ID Card  Passport',	'd_voterid_or_passport_img',	NULL,	1,	3,	2,	'Director',	NULL,	'2023-04-22 20:03:47',	'2023-04-22 20:03:47'),
(20,	'Driving License',	'd_drivinglicence_img',	NULL,	1,	3,	2,	'Director',	NULL,	'2023-04-22 20:04:08',	'2023-04-22 20:04:08'),
(21,	'Photograph',	'd_userphoto_img',	NULL,	1,	3,	2,	'Director',	NULL,	'2023-04-22 20:05:02',	'2023-04-22 20:05:02'),
(22,	'Company PAN Card',	'pancard_img',	NULL,	1,	3,	0,	NULL,	NULL,	'2023-04-22 20:02:14',	'2023-04-22 20:02:14'),
(23,	'MOA',	'moa_img',	NULL,	1,	3,	0,	NULL,	NULL,	'2023-04-22 20:02:38',	'2023-04-22 20:02:38'),
(24,	'AOA',	'aoa_img',	NULL,	1,	3,	0,	NULL,	NULL,	'2023-04-22 20:02:14',	'2023-04-22 20:02:14'),
(25,	'Aadhar Card Or Voter ID Card Or Passport',	'pan_aadhar_voterid_passport_img',	'pan-avp',	1,	4,	0,	'PAN',	NULL,	'2023-04-25 21:02:48',	'2023-04-25 21:02:48'),
(26,	'Driving Licence',	'pan_driving_license',	'pan-dl',	1,	4,	0,	'PAN',	NULL,	'2023-04-25 21:03:12',	'2023-04-25 21:03:12'),
(27,	'Photo',	'pan_your_photo',	'pan-userpic',	1,	4,	0,	'PAN',	NULL,	'2023-04-25 21:03:33',	'2023-04-25 21:03:33'),
(28,	'Aadhar Card Or Voter ID Card Or Passport',	'tan_aadhar_voterid_passport_img',	'tan-avp',	1,	5,	0,	'TAN',	NULL,	'2023-04-25 21:04:32',	'2023-04-25 21:04:32'),
(29,	'Driving Licence',	'tan_driving_license_img',	'tan-dl',	1,	5,	0,	'TAN',	NULL,	'2023-04-25 21:05:02',	'2023-04-25 21:05:02'),
(30,	'Photo',	'tan_your_img',	'tan-userpic',	1,	5,	0,	'TAN',	NULL,	'2023-04-25 21:05:28',	'2023-04-25 21:05:28'),
(31,	'Pan Card',	'tan_pan_img',	'tan-pan',	1,	5,	0,	'TAN',	NULL,	'2023-04-25 21:06:25',	'2023-04-25 21:06:25'),
(32,	'PAN Card',	'epf_pan_img',	'epf-pan',	1,	6,	0,	'EPF Company',	1,	'2023-04-27 22:08:20',	'2023-04-27 22:08:20'),
(33,	'Firm Documents like Deed / MOA & AOA (if applicable)',	'epf_firm_img',	'epf-firm',	1,	6,	0,	'EPF Company',	2,	'2023-04-27 22:09:13',	'2023-04-27 22:09:13'),
(34,	'Rent Agreement / Electricity Bill',	'epf_rent_elec_img',	'epf-rent-elec',	1,	6,	0,	'EPF Company',	3,	'2023-04-27 22:10:07',	'2023-04-27 22:10:07'),
(35,	'Declaration',	'epf_declaration_img',	'epf-dec',	1,	6,	0,	'EPF Company',	4,	'2023-04-27 22:10:43',	'2023-04-27 22:10:43'),
(36,	'KYC of all Employees',	'epf_kyc_img',	'epf-kyc',	1,	6,	0,	'EPF Company',	5,	'2023-04-27 22:11:10',	'2023-04-27 22:11:10'),
(37,	'Other registration certificate like GST, ESIC etc. (if applicable)',	'epf_certificate_img',	'epf-certificate',	1,	6,	0,	'EPF Company',	6,	'2023-04-27 22:11:46',	'2023-04-27 22:11:46'),
(38,	'Aadhar',	'epf_sign_aadhar_img',	'epf_sign_aadhar',	1,	6,	0,	'EPF Signatory',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(39,	'PAN',	'epf_sign_pan_img',	'epf_sign_pan',	1,	6,	0,	'EPF Signatory',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(40,	'Photo',	'epf_sign_photo_img',	'epf_sign_photo',	1,	6,	0,	'EPF Signatory',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(41,	'Spaceman signature',	'epf_sign_spaceman_img',	'epf_sign_spaceman',	1,	6,	0,	'EPF Signatory',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(42,	'Declaration',	'epf_sign_declare_img',	'epf_sign_declare',	1,	6,	0,	'EPF Signatory',	5,	'2023-04-27 22:48:40',	'2023-04-27 22:48:40'),
(43,	'Aadhar',	'epf_oth_aadhar_img',	'epf_oth_aadhar',	1,	6,	0,	'EPF Others',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(44,	'PAN',	'epf_oth_pan_img',	'epf_oth_pan',	1,	6,	0,	'EPF Others',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(45,	'Photo',	'epf_oth_photo_img',	'epf_oth_photo',	1,	6,	0,	'EPF Others',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(46,	'Spaceman signature',	'epf_oth_spaceman_img',	'epf_oth_spaceman',	1,	6,	0,	'EPF Others',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(47,	'PAN Card',	'esic_pan_img',	'esic_pan',	1,	7,	0,	'ESIC Company',	1,	'2023-04-27 22:08:20',	'2023-04-27 22:08:20'),
(48,	'Firm Documents like Deed / MOA & AOA (if applicable)',	'esic_firm_img',	'esic_firm',	1,	7,	0,	'ESIC Company',	2,	'2023-04-27 22:09:13',	'2023-04-27 22:09:13'),
(49,	'Rent Agreement / Electricity Bill',	'esic_rent_elec_img',	'esic_rent_elec',	1,	7,	0,	'ESIC Company',	3,	'2023-04-27 22:10:07',	'2023-04-27 22:10:07'),
(50,	'Declaration',	'esic_declaration_img',	'esic_dec',	1,	7,	0,	'ESIC Company',	4,	'2023-04-27 22:10:43',	'2023-04-27 22:10:43'),
(51,	'KYC of all Employees',	'esic_kyc_img',	'esic_kyc',	1,	7,	0,	'ESIC Company',	5,	'2023-04-27 22:11:10',	'2023-04-27 22:11:10'),
(52,	'Other registration certificate like GST, ESIC etc. (if applicable)',	'esic_certificate_img',	'esic_certificate',	1,	7,	0,	'ESIC Company',	6,	'2023-04-27 22:11:46',	'2023-04-27 22:11:46'),
(53,	'Aadhar',	'esic_sign_aadhar_img',	'esic_sign_aadhar',	1,	7,	0,	'ESIC Signatory',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(54,	'PAN',	'esic_sign_pan_img',	'esic_sign_pan',	1,	7,	0,	'ESIC Signatory',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(55,	'Photo',	'esic_sign_photo_img',	'esic_sign_photo',	1,	7,	0,	'ESIC Signatory',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(56,	'Spaceman signature',	'esic_sign_spaceman_img',	'esic_sign_spaceman',	1,	7,	0,	'ESIC Signatory',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(57,	'Declaration',	'esic_sign_declare_img',	'esic_sign_declare',	1,	7,	0,	'ESIC Signatory',	5,	'2023-04-27 22:48:40',	'2023-04-27 22:48:40'),
(58,	'Aadhar',	'esic_oth_aadhar_img',	'esic_oth_aadhar',	1,	7,	0,	'ESIC Others',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(59,	'PAN',	'esic_oth_pan_img',	'esic_oth_pan',	1,	7,	0,	'ESIC Others',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(60,	'Photo',	'esic_oth_photo_img',	'esic_oth_photo',	1,	7,	0,	'ESIC Others',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(61,	'Spaceman signature',	'esic_oth_spaceman_img',	'esic_oth_spaceman',	1,	7,	0,	'ESIC Others',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(62,	'PAN Card',	'trademark_pan_img',	'trademark_pan',	1,	8,	0,	'TRADEMARK Company',	1,	'2023-04-27 22:08:20',	'2023-04-27 22:08:20'),
(63,	'Firm Documents like Deed / MOA & AOA (if applicable)',	'trademark_firm_img',	'trademark_firm',	1,	8,	0,	'TRADEMARK Company',	2,	'2023-04-27 22:09:13',	'2023-04-27 22:09:13'),
(64,	'Rent Agreement / Electricity Bill',	'trademark_rent_elec_img',	'trademark_rent_elec',	1,	8,	0,	'TRADEMARK Company',	3,	'2023-04-27 22:10:07',	'2023-04-27 22:10:07'),
(65,	'Udamy Registration',	'trademark_udamy_img',	'trademark_udamy',	1,	8,	0,	'TRADEMARK Company',	4,	'2023-05-01 22:08:10',	'2023-05-01 22:08:10'),
(66,	'Logo',	'trademark_logo_img',	'trademark_logo',	1,	8,	0,	'TRADEMARK Company',	5,	'2023-05-01 22:08:12',	'2023-05-01 22:08:12'),
(67,	'Declaration',	'trademark_declaration_img',	'trademark_dec',	1,	8,	0,	'TRADEMARK Company',	6,	'2023-04-27 22:10:43',	'2023-04-27 22:10:43'),
(68,	'KYC of all Employees',	'trademark_kyc_img',	'trademark_kyc',	1,	8,	0,	'TRADEMARK Company',	7,	'2023-04-27 22:11:10',	'2023-04-27 22:11:10'),
(69,	'Other registration certificate like GST, ESIC etc. (if applicable)',	'trademark_certificate_img',	'trademark_certificate',	1,	8,	0,	'TRADEMARK Company',	8,	'2023-04-27 22:11:46',	'2023-04-27 22:11:46'),
(70,	'Aadhar',	'trademark_sign_aadhar_img',	'trademark_sign_aadhar',	1,	8,	0,	'TRADEMARK Signatory',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(71,	'PAN',	'trademark_sign_pan_img',	'trademark_sign_pan',	1,	8,	0,	'TRADEMARK Signatory',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(72,	'Photo',	'trademark_sign_photo_img',	'trademark_sign_photo',	1,	8,	0,	'TRADEMARK Signatory',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(73,	'Spaceman signature',	'trademark_sign_spaceman_img',	'trademark_sign_spaceman',	1,	8,	0,	'TRADEMARK Signatory',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(74,	'Declaration',	'trademark_sign_declare_img',	'trademark_sign_declare',	1,	8,	0,	'TRADEMARK Signatory',	5,	'2023-04-27 22:48:40',	'2023-04-27 22:48:40'),
(75,	'Attorney and affidavit (Formet Attached)',	'trademark_signaff_img',	'trademark_sign_aff',	1,	8,	0,	'TRADEMARK Signatory',	6,	'2023-05-01 22:27:06',	'2023-05-01 22:27:06'),
(76,	'Aadhar',	'trademark_oth_aadhar_img',	'trademark_oth_aadhar',	1,	8,	0,	'TRADEMARK Others',	2,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(77,	'PAN',	'trademark_pan_img',	'trademark_pan',	1,	8,	0,	'TRADEMARK Others',	3,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(78,	'Photo',	'trademark_oth_photo_img',	'trademark_oth_photo',	1,	8,	0,	'TRADEMARK Others',	4,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(79,	'Spaceman signature',	'trademark_oth_spaceman_img',	'trademark_oth_spaceman',	1,	8,	0,	'TRADEMARK Others',	5,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(80,	'Declaration',	'trademark_declaration_img',	'trademark_dec',	1,	8,	0,	'TRADEMARK Others',	6,	'2023-04-27 22:10:43',	'2023-04-27 22:10:43'),
(81,	'Attorney and affidavit (Formet Attached)',	'trademark_aff_img',	'trademark_aff',	1,	8,	0,	'TRADEMARK Others',	7,	'2023-04-27 22:11:10',	'2023-04-27 22:11:10'),
(82,	'Other registration certificate like GST, ESIC etc. (if applicable)',	'trademark_certificate_img',	'trademark_certificate',	1,	8,	0,	'TRADEMARK Others',	8,	'2023-04-27 22:11:46',	'2023-04-27 22:11:46'),
(83,	'Logo',	'trademark_logo_img',	'trademark_logo',	1,	8,	0,	'TRADEMARK Others',	1,	'2023-05-01 22:08:12',	'2023-05-01 22:08:12');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_admins_table',	1),
(2,	'2014_10_12_000000_create_users_table',	1),
(3,	'2014_10_12_100000_create_password_resets_table',	1),
(4,	'2019_07_01_060651_create_permission_tables',	1),
(5,	'2019_07_19_174507_create_products_table',	1);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\Admin',	1),
(2,	'App\\Models\\Admin',	2),
(3,	'App\\Models\\Admin',	3);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('blocked','pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_admin_id_foreign` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'administrator',	'admin',	'2023-04-19 13:00:28',	'2023-04-19 13:00:28'),
(2,	'moderator',	'admin',	'2023-04-19 13:00:28',	'2023-04-19 13:00:28'),
(3,	'manager',	'admin',	'2023-04-19 13:00:28',	'2023-04-19 13:00:28');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_year` smallint(5) unsigned DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `status`, `address`, `birth_year`, `image`, `original_image_path`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Parth',	'test@gmail.com',	'active',	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$hSmJ5QD/cdpBlKDWv3p2V.h20riZ0MEi79qzVvhjs/4AHIAd.mFBy',	'Du4sBw9vM70U5Faua3E4BiZQSWvVBmjcezs2Lm8EtPt9NX86PTOS8WykSQFj',	'2023-04-19 13:00:29',	'2023-04-19 13:00:29');

DROP TABLE IF EXISTS `users_directors`;
CREATE TABLE `users_directors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_gst_id` int(11) NOT NULL,
  `director_mobile` varchar(30) NOT NULL,
  `director_email` varchar(30) NOT NULL,
  `d_pancard_img` varchar(300) DEFAULT NULL,
  `d_aadharcard_img` varchar(300) DEFAULT NULL,
  `d_voterid_or_passport_img` varchar(300) DEFAULT NULL,
  `d_drivinglicence_img` varchar(300) DEFAULT NULL,
  `d_userphoto_img` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_directors` (`id`, `user_id`, `user_gst_id`, `director_mobile`, `director_email`, `d_pancard_img`, `d_aadharcard_img`, `d_voterid_or_passport_img`, `d_drivinglicence_img`, `d_userphoto_img`, `created_at`, `updated_at`) VALUES
(7,	1,	36,	'123212123123',	'123123123@ggg.com',	'PANCard_1_0_1682372392.jpg,PANCard_2_0_1682372392.jpeg',	'AadharCard_1_0_1682372392.jpg,AadharCard_2_0_1682372392.jpeg',	'',	'',	'',	'2023-04-24 16:09:52',	'2023-04-24 16:09:52'),
(8,	1,	36,	'23123123',	'234234@eee.com',	'',	'AadharCard_1_1_1682372392.jpg',	'',	'',	'',	'2023-04-24 16:09:52',	'2023-04-24 16:09:52');

DROP TABLE IF EXISTS `users_epf_details`;
CREATE TABLE `users_epf_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `epf_email` varchar(30) DEFAULT NULL,
  `epf_mobile` varchar(30) DEFAULT NULL,
  `epf_type` varchar(30) NOT NULL,
  `epf_pan_img` longtext,
  `epf_firm_img` longtext,
  `epf_rent_elec_img` longtext,
  `epf_declaration_img` longtext,
  `epf_kyc_img` longtext,
  `epf_certificate_img` longtext,
  `epf_oth_pan_img` longtext,
  `epf_oth_aadhar_img` longtext,
  `epf_oth_photo_img` longtext,
  `epf_oth_spaceman_img` longtext,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_epf_details` (`id`, `user_id`, `epf_email`, `epf_mobile`, `epf_type`, `epf_pan_img`, `epf_firm_img`, `epf_rent_elec_img`, `epf_declaration_img`, `epf_kyc_img`, `epf_certificate_img`, `epf_oth_pan_img`, `epf_oth_aadhar_img`, `epf_oth_photo_img`, `epf_oth_spaceman_img`, `created_at`, `updated_at`) VALUES
(11,	1,	'12123@gg.com',	'9901204610',	'Others',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'epf_oth_pan_1_87501.jpg,epf_oth_pan_2_45531.jpeg',	'epf_oth_aadhar_1_59931.jpg',	'epf_oth_photo_1_45231.jpg,epf_oth_photo_2_44341.jpg',	'epf_oth_spaceman_1_69851.jpg,epf_oth_spaceman_2_85541.jpeg',	'2023-05-01 15:13:35',	'2023-05-01 15:13:35'),
(10,	1,	NULL,	NULL,	'Company',	'epf-pan_1_44361.jpg',	'epf-firm_1_51321.jpg,epf-firm_2_45871.jpeg',	'epf-rent-elec_1_79231.jpg',	'epf-dec_1_69841.jpg',	'epf-kyc_1_82261.jpg',	'epf-certificate_1_44181.jpeg',	NULL,	NULL,	NULL,	NULL,	'2023-05-01 15:12:56',	'2023-05-01 15:12:56');

DROP TABLE IF EXISTS `users_epf_signatory`;
CREATE TABLE `users_epf_signatory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_epf_id` int(11) NOT NULL,
  `epf_sign_mobile` varchar(30) NOT NULL,
  `epf_sign_email` longtext NOT NULL,
  `epf_sign_pan_img` longtext,
  `epf_sign_aadhar_img` longtext,
  `epf_sign_photo_img` longtext,
  `epf_sign_spaceman_img` longtext,
  `epf_sign_declare_img` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_epf_signatory` (`id`, `user_id`, `user_epf_id`, `epf_sign_mobile`, `epf_sign_email`, `epf_sign_pan_img`, `epf_sign_aadhar_img`, `epf_sign_photo_img`, `epf_sign_spaceman_img`, `epf_sign_declare_img`, `created_at`, `updated_at`) VALUES
(14,	1,	10,	'234234234234',	'242324@fff.com',	'epf_sign_pan_1_1_6974.jpg',	'epf_sign_aadhar_1_1_7432.jpg,epf_sign_aadhar_2_1_2504.jpeg',	'epf_sign_photo_1_1_3252.jpg',	'epf_sign_spaceman_1_1_5724.jpeg',	'epf_sign_declare_1_1_8713.jpeg',	'2023-05-01 15:12:56',	'2023-05-01 15:12:56'),
(13,	1,	10,	'1223123213',	'lavanya@gmail.om',	'epf_sign_pan_1_0_4927.jpg,epf_sign_pan_2_0_6538.jpeg',	'epf_sign_aadhar_1_0_5055.jpg',	'epf_sign_photo_1_0_6848.jpg',	'epf_sign_spaceman_1_0_4257.jpg',	'epf_sign_declare_1_0_6374.jpg',	'2023-05-01 15:12:56',	'2023-05-01 15:12:56');

DROP TABLE IF EXISTS `users_esic_details`;
CREATE TABLE `users_esic_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `esic_email` varchar(30) DEFAULT NULL,
  `esic_mobile` varchar(30) DEFAULT NULL,
  `esic_type` varchar(30) NOT NULL,
  `esic_pan_img` longtext,
  `esic_firm_img` longtext,
  `esic_rent_elec_img` longtext,
  `esic_declaration_img` longtext,
  `esic_kyc_img` longtext,
  `esic_certificate_img` longtext,
  `esic_oth_pan_img` longtext,
  `esic_oth_aadhar_img` longtext,
  `esic_oth_photo_img` longtext,
  `esic_oth_spaceman_img` longtext,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_esic_details` (`id`, `user_id`, `esic_email`, `esic_mobile`, `esic_type`, `esic_pan_img`, `esic_firm_img`, `esic_rent_elec_img`, `esic_declaration_img`, `esic_kyc_img`, `esic_certificate_img`, `esic_oth_pan_img`, `esic_oth_aadhar_img`, `esic_oth_photo_img`, `esic_oth_spaceman_img`, `created_at`, `updated_at`) VALUES
(21,	1,	NULL,	NULL,	'Company',	'esic_pan_1_72761.jpg',	'esic_firm_1_89431.jpg,esic_firm_2_27751.jpeg',	'esic_rent_elec_1_62731.jpg',	'esic_dec_1_40331.jpg',	'esic_kyc_1_61311.jpg',	'esic_certificate_1_30131.jpg',	NULL,	NULL,	NULL,	NULL,	'2023-05-01 14:59:37',	'2023-05-01 14:59:37'),
(22,	1,	'12123@gg.com',	'9901204610',	'Others',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'esic_oth_pan_1_77781.jpg',	'esic_oth_aadhar_1_45401.jpg,esic_oth_aadhar_2_50901.jpeg',	NULL,	NULL,	'2023-05-01 15:01:35',	'2023-05-01 15:01:35');

DROP TABLE IF EXISTS `users_esic_signatory`;
CREATE TABLE `users_esic_signatory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_esic_id` int(11) NOT NULL,
  `esic_sign_mobile` varchar(30) NOT NULL,
  `esic_sign_email` longtext NOT NULL,
  `esic_sign_pan_img` longtext,
  `esic_sign_aadhar_img` longtext,
  `esic_sign_photo_img` longtext,
  `esic_sign_spaceman_img` longtext,
  `esic_sign_declare_img` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_esic_signatory` (`id`, `user_id`, `user_esic_id`, `esic_sign_mobile`, `esic_sign_email`, `esic_sign_pan_img`, `esic_sign_aadhar_img`, `esic_sign_photo_img`, `esic_sign_spaceman_img`, `esic_sign_declare_img`, `created_at`, `updated_at`) VALUES
(22,	1,	21,	'123123123',	'Lavanya@fff.com',	'esic_sign_pan_1_0_4045.jpg',	'esic_sign_aadhar_1_0_8390.jpg,esic_sign_aadhar_2_0_6201.jpeg',	'esic_sign_photo_1_0_4070.jpg',	'esic_sign_spaceman_1_0_6129.jpg',	'esic_sign_declare_1_0_8794.jpg,esic_sign_declare_2_0_8065.jpg',	'2023-05-01 14:59:37',	'2023-05-01 14:59:37');

DROP TABLE IF EXISTS `users_gst_details`;
CREATE TABLE `users_gst_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `gst_type` varchar(11) NOT NULL,
  `mobile_linked_aadhar` varchar(11) DEFAULT NULL,
  `trade_name` varchar(20) DEFAULT NULL,
  `pancard_img` longtext,
  `aadharcard_img` longtext,
  `voterid_or_passport_img` longtext,
  `drivinglicence_img` longtext,
  `userphoto_img` longtext,
  `rentalagreement_img` longtext,
  `electricitybill_img` longtext,
  `municipallandreceipt_img` longtext,
  `aadharpan_landlord_img` longtext,
  `moa_img` longtext,
  `aoa_img` longtext,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_gst_details` (`id`, `user_id`, `email_id`, `gst_type`, `mobile_linked_aadhar`, `trade_name`, `pancard_img`, `aadharcard_img`, `voterid_or_passport_img`, `drivinglicence_img`, `userphoto_img`, `rentalagreement_img`, `electricitybill_img`, `municipallandreceipt_img`, `aadharpan_landlord_img`, `moa_img`, `aoa_img`, `status`, `created_at`, `updated_at`) VALUES
(23,	1,	'lavanyab16@gmail.com',	'Individual',	NULL,	'Trade Name',	'PanCard_1_1682366161.jpg',	NULL,	NULL,	NULL,	'YourPhoto_1_1682366161.jpeg',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2023-04-24 14:26:01',	'2023-04-24 14:26:01'),
(39,	1,	'12123@gg.com',	'Firm',	NULL,	'12312',	'PANCard_1_1682372567.jpg',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2023-04-24 16:12:47',	'2023-04-24 16:12:47'),
(36,	1,	'assaW@gmail.com',	'Company',	NULL,	'12312',	'PANCard_1_1682372392.jpg,PANCard_2_1682372392.jpeg',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2023-04-24 16:09:52',	'2023-04-24 16:09:52');

DROP TABLE IF EXISTS `users_pan_details`;
CREATE TABLE `users_pan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `pan_aadhar_voterid_passport_img` varchar(300) DEFAULT NULL,
  `pan_driving_license` varchar(300) DEFAULT NULL,
  `pan_your_photo` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_pan_details` (`id`, `user_id`, `mobile_number`, `email_id`, `pan_aadhar_voterid_passport_img`, `pan_driving_license`, `pan_your_photo`, `created_at`, `updated_at`) VALUES
(7,	1,	'9901204614',	'12123@gg.com',	'pan-avp_1_52351.jpg,pan-avp_2_54361.jpg',	'pan-dl_1_62461.jpg',	'pan-userpic_1_63841.jpg',	'2023-05-01 15:24:40',	'2023-05-01 20:54:40');

DROP TABLE IF EXISTS `users_partners`;
CREATE TABLE `users_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_gst_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `partner_mobile` varchar(30) NOT NULL,
  `partner_email` varchar(30) NOT NULL,
  `p_pancard_img` varchar(300) DEFAULT NULL,
  `p_aadharcard_img` varchar(300) DEFAULT NULL,
  `p_voterid_or_passport_img` varchar(300) DEFAULT NULL,
  `p_drivinglicence_img` varchar(300) DEFAULT NULL,
  `p_userphoto_img` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_partners` (`id`, `user_gst_id`, `user_id`, `partner_mobile`, `partner_email`, `p_pancard_img`, `p_aadharcard_img`, `p_voterid_or_passport_img`, `p_drivinglicence_img`, `p_userphoto_img`, `created_at`, `updated_at`) VALUES
(28,	24,	0,	'34234234',	'abcd@ff.com',	'PANCard_1_0_1682366337.jpg,PANCard_2_0_1682366337.jpeg',	'',	'',	'',	'Photograph_1_0_1682366337.jpg',	'2023-04-24 14:28:57',	'2023-04-24 14:28:57'),
(29,	24,	0,	'2222222222222',	'cde12121@gmail.com',	'PANCard_1_1_1682366337.jpg',	'',	'',	'',	'Photograph_1_1_1682366337.jpeg,Photograph_2_1_1682366337.jpg',	'2023-04-24 14:28:57',	'2023-04-24 14:28:57'),
(30,	39,	1,	'123',	'ddwww@ff.com',	'PANCard_1_0_1682372567.jpg,PANCard_2_0_1682372567.jpeg',	'',	'',	'',	'',	'2023-04-24 16:12:47',	'2023-04-24 16:12:47'),
(31,	39,	1,	'2222222222222',	'cde12121@gmail.com',	'PANCard_1_1_1682372567.jpg',	'',	'',	'',	'',	'2023-04-24 16:12:47',	'2023-04-24 16:12:47');

DROP TABLE IF EXISTS `users_tan_details`;
CREATE TABLE `users_tan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `tan_aadhar_voterid_passport_img` varchar(300) DEFAULT NULL,
  `tan_driving_license_img` varchar(300) DEFAULT NULL,
  `tan_your_img` varchar(300) DEFAULT NULL,
  `tan_pan_img` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_tan_details` (`id`, `user_id`, `mobile_number`, `email_id`, `tan_aadhar_voterid_passport_img`, `tan_driving_license_img`, `tan_your_img`, `tan_pan_img`, `created_at`, `updated_at`) VALUES
(7,	1,	'9901204610',	'lucky2@gmail.com',	'tan-avp_1_80251.jpg,tan-avp_2_69241.jpeg',	'tan-dl_1_52561.jpg',	NULL,	NULL,	'2023-05-01 15:54:36',	'2023-05-01 21:24:36');

DROP TABLE IF EXISTS `users_trademark_details`;
CREATE TABLE `users_trademark_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trademark_email` varchar(30) DEFAULT NULL,
  `trademark_mobile` varchar(30) DEFAULT NULL,
  `trademark_type` varchar(30) NOT NULL,
  `trademark_pan_img` longtext,
  `trademark_firm_img` longtext,
  `trademark_rent_elec_img` longtext,
  `trademark_declaration_img` longtext,
  `trademark_kyc_img` longtext,
  `trademark_certificate_img` longtext,
  `trademark_udamy_img` longtext,
  `trademark_logo_img` longtext,
  `trademark_oth_aadhar_img` longtext,
  `trademark_oth_photo_img` longtext,
  `trademark_oth_spaceman_img` longtext,
  `trademark_aff_img` longtext,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_trademark_details` (`id`, `user_id`, `trademark_email`, `trademark_mobile`, `trademark_type`, `trademark_pan_img`, `trademark_firm_img`, `trademark_rent_elec_img`, `trademark_declaration_img`, `trademark_kyc_img`, `trademark_certificate_img`, `trademark_udamy_img`, `trademark_logo_img`, `trademark_oth_aadhar_img`, `trademark_oth_photo_img`, `trademark_oth_spaceman_img`, `trademark_aff_img`, `created_at`, `updated_at`) VALUES
(25,	1,	NULL,	NULL,	'Company',	'trademark_pan_1_59531.jpg',	'trademark_firm_1_44001.jpg,trademark_firm_2_79121.jpg',	'trademark_rent_elec_1_75411.jpg',	'trademark_dec_1_50141.jpg',	'trademark_kyc_1_61941.jpg',	'trademark_certificate_1_48581.jpg',	'trademark_udamy_1_36051.jpg',	'trademark_logo_1_76861.jpg',	NULL,	NULL,	NULL,	NULL,	'2023-05-02 15:54:12',	'2023-05-02 15:54:12'),
(24,	1,	'12123@gg.com',	'9901204610',	'Others',	'trademark_pan_1_36481.jpg,trademark_pan_2_49131.jpeg',	NULL,	NULL,	'trademark_dec_1_41471.jpeg',	NULL,	'trademark_certificate_1_86311.jpg',	NULL,	'trademark_logo_1_49401.jpg',	'trademark_oth_aadhar_1_75221.jpg',	'trademark_oth_photo_1_22081.jpg',	'trademark_oth_spaceman_1_21931.jpg',	'trademark_aff_1_50731.jpg',	'2023-05-02 15:49:34',	'2023-05-02 15:49:34');

DROP TABLE IF EXISTS `users_trademark_signatory`;
CREATE TABLE `users_trademark_signatory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_trademark_id` int(11) NOT NULL,
  `trademark_sign_mobile` varchar(30) NOT NULL,
  `trademark_sign_email` longtext NOT NULL,
  `trademark_sign_pan_img` longtext,
  `trademark_sign_aadhar_img` longtext,
  `trademark_sign_photo_img` longtext,
  `trademark_sign_spaceman_img` longtext,
  `trademark_sign_declare_img` longtext,
  `trademark_signaff_img` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users_trademark_signatory` (`id`, `user_id`, `user_trademark_id`, `trademark_sign_mobile`, `trademark_sign_email`, `trademark_sign_pan_img`, `trademark_sign_aadhar_img`, `trademark_sign_photo_img`, `trademark_sign_spaceman_img`, `trademark_sign_declare_img`, `trademark_signaff_img`, `created_at`, `updated_at`) VALUES
(23,	1,	25,	'432234234',	'asAS@GMAIL.COM',	'trademark_sign_pan_1_0_4199.jpg,trademark_sign_pan_2_0_2058.jpg',	'trademark_sign_aadhar_1_0_8574.jpg',	'trademark_sign_photo_1_0_6468.jpg',	'trademark_sign_spaceman_1_0_5353.jpg',	NULL,	NULL,	'2023-05-02 15:54:12',	'2023-05-02 15:54:12'),
(24,	1,	25,	'123123213',	'234234@ddd.com',	'trademark_sign_pan_1_1_9000.jpg',	'trademark_sign_aadhar_1_1_4535.jpeg',	'trademark_sign_photo_1_1_3883.jpg',	'trademark_sign_spaceman_1_1_3737.jpg',	NULL,	NULL,	'2023-05-02 15:54:12',	'2023-05-02 15:54:12');

-- 2023-05-03 10:12:55
