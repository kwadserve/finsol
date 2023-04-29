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
(25,	'Aadhar Card Or Voter ID Card Or Passport',	'pan_aadhar_voterid_passport_img',	'pan-avp',	1,	4,	0,	NULL,	NULL,	'2023-04-25 21:02:48',	'2023-04-25 21:02:48'),
(26,	'Driving Licence',	'pan_driving_license',	'pan-dl',	1,	4,	0,	NULL,	NULL,	'2023-04-25 21:03:12',	'2023-04-25 21:03:12'),
(27,	'Photo',	'pan_your_photo',	'pan-userpic',	1,	4,	0,	NULL,	NULL,	'2023-04-25 21:03:33',	'2023-04-25 21:03:33'),
(28,	'Aadhar Card Or Voter ID Card Or Passport',	'tan_aadhar_voterid_passport_img',	'tan-avp',	1,	5,	0,	NULL,	NULL,	'2023-04-25 21:04:32',	'2023-04-25 21:04:32'),
(29,	'Driving Licence',	'tan_driving_license_img',	'tan-dl',	1,	5,	0,	NULL,	NULL,	'2023-04-25 21:05:02',	'2023-04-25 21:05:02'),
(30,	'Photo',	'tan_your_img',	'tan-userpic',	1,	5,	0,	NULL,	NULL,	'2023-04-25 21:05:28',	'2023-04-25 21:05:28'),
(31,	'Pan Card',	'tan_pan_img',	'tan-pan',	1,	5,	0,	NULL,	NULL,	'2023-04-25 21:06:25',	'2023-04-25 21:06:25'),
(32,	'PAN Card',	'epf_pan_img',	'epf-pan',	1,	6,	0,	'EPF Company',	1,	'2023-04-27 22:08:20',	'2023-04-27 22:08:20'),
(33,	'Firm Documents like Deed / MOA & AOA (if applicable)',	'epf_firm_img',	'epf-firm',	1,	6,	0,	'EPF Company',	2,	'2023-04-27 22:09:13',	'2023-04-27 22:09:13'),
(34,	'Rent Agreement / Electricity Bill',	'epf_rent_elec_img',	'epf-rent-elec',	1,	6,	0,	'EPF Company',	3,	'2023-04-27 22:10:07',	'2023-04-27 22:10:07'),
(35,	'Declaration',	'epf_declaration_img',	'epf-dec',	1,	6,	0,	'EPF Company',	4,	'2023-04-27 22:10:43',	'2023-04-27 22:10:43'),
(36,	'KYC of all Employees',	'epf_kyc_img',	'epf-kyc',	1,	6,	0,	'EPF Company',	5,	'2023-04-27 22:11:10',	'2023-04-27 22:11:10'),
(37,	'Other registration certificate like GST, ESIC etc. (if applicable)',	'epf_certificate_img',	'epf-certificate',	1,	6,	0,	'EPF Company',	6,	'2023-04-27 22:11:46',	'2023-04-27 22:11:46'),
(38,	'Aadhar',	'epf_sign_pan_img',	'epf_sign_pan',	1,	6,	0,	'EPF Signatory',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(39,	'PAN',	'epf_sign_aadhar_img',	'epf_sign_aadhar',	1,	6,	0,	'EPF Signatory',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(40,	'Photo',	'epf_sign_photo_img',	'epf_sign_photo',	1,	6,	0,	'EPF Signatory',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(41,	'Spaceman signature',	'epf_sign_spaceman_img',	'epf_sign_spaceman',	1,	6,	0,	'EPF Signatory',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37'),
(42,	'Declaration',	'epf_sign_declare_img',	'epf_sign_declare',	1,	6,	0,	'EPF Signatory',	5,	'2023-04-27 22:48:40',	'2023-04-27 22:48:40'),
(43,	'Aadhar',	'epf_oth_aadhar_img',	'epf_oth_aadhar',	1,	6,	0,	'EPF Others',	1,	'2023-04-27 22:47:16',	'2023-04-27 22:47:16'),
(44,	'PAN',	'epf_oth_pan_img',	'epf_oth_pan',	1,	6,	0,	'EPF Others',	2,	'2023-04-27 22:48:23',	'2023-04-27 22:48:23'),
(45,	'Photo',	'epf_oth_photo_img',	'epf_oth_photo',	1,	6,	0,	'EPF Others',	3,	'2023-04-27 22:48:28',	'2023-04-27 22:48:28'),
(46,	'Spaceman signature',	'epf_oth_spaceman_img',	'epf_oth_spaceman',	1,	6,	0,	'EPF Others',	4,	'2023-04-27 22:48:37',	'2023-04-27 22:48:37');

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
(1,	'Parth',	'test@gmail.com',	'active',	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$hSmJ5QD/cdpBlKDWv3p2V.h20riZ0MEi79qzVvhjs/4AHIAd.mFBy',	'dXvS2SaW08DOhbAJiMPM8xGDqz7os1na8JgVUbv1wACNb8v0X2E5sbeyNWKh',	'2023-04-19 13:00:29',	'2023-04-19 13:00:29');

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
(6,	1,	NULL,	NULL,	'Company',	'epf-pan_1_60191.jpg',	'epf-firm_1_56581.jpeg',	'epf-rent-elec_1_56061.jpg,epf-rent-elec_2_69311.jpeg',	'epf-dec_1_33781.jpg',	'epf-kyc_1_38211.jpg,epf-kyc_2_38511.jpeg',	'epf-certificate_1_73061.jpg,epf-certificate_2_69551.jpg',	NULL,	NULL,	NULL,	NULL,	'2023-04-28 15:30:52',	'2023-04-28 15:30:52'),
(9,	1,	'12123@gg.com',	'9901204610',	'Others',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'epf_oth_pan_1_77331.jpg',	'epf_oth_aadhar_1_30721.jpg',	'epf_oth_photo_1_35131.jpg,epf_oth_photo_2_73431.jpeg',	'epf_oth_spaceman_1_79401.jpg,epf_oth_spaceman_2_29461.jpeg',	'2023-04-28 16:06:30',	'2023-04-28 16:06:30');

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
(11,	1,	6,	'1223123213',	'lavanya@gmail.om',	'Aadhar_1_0_1682715652.jpg',	'PAN_1_0_1682715652.jpg,PAN_2_0_1682715652.jpeg',	'Photo_1_0_1682715652.jpg',	'Spacemansignature_1_0_1682715652.jpg',	'Declaration_1_0_1682715652.jpg',	'2023-04-28 15:30:52',	'2023-04-28 15:30:52'),
(12,	1,	6,	'234234234234',	'242324@fff.com',	'Aadhar_1_1_1682715652.jpg',	'PAN_1_1_1682715652.jpeg',	'Photo_1_1_1682715652.jpeg',	'Spacemansignature_1_1_1682715652.jpeg',	'Declaration_1_1_1682715652.jpg',	'2023-04-28 15:30:52',	'2023-04-28 15:30:52');

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
(4,	1,	'Individual',	'lucky2@gmail.com',	'pan-avp_1_44041.jpg',	'pan-dl_1_47161.jpg',	'pan-userphoto_1_26731.jpeg',	'2023-04-25 16:17:58',	'2023-04-25 21:47:58');

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
(1,	1,	'Individual',	'lucky2@gmail.com',	'tan-avp_1_61991.jpg,tan-avp_2_63611.jpeg',	NULL,	NULL,	'tan-pan_1_43261.jpg',	'2023-04-25 16:26:25',	'2023-04-25 21:56:25');

-- 2023-04-29 08:33:56
