-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2026 at 01:06 PM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u385330174_ytigtt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creator_link_submissions`
--

CREATE TABLE `creator_link_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submission_date` date NOT NULL,
  `platform` varchar(20) NOT NULL,
  `submitted_link` text NOT NULL,
  `access_token` varchar(64) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creator_link_unlocks`
--

CREATE TABLE `creator_link_unlocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unlock_date` date NOT NULL,
  `platform` varchar(20) NOT NULL,
  `access_token` varchar(64) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `clicked_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `expires_at` datetime NOT NULL,
  `used_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creator_link_unlocks`
--

INSERT INTO `creator_link_unlocks` (`id`, `unlock_date`, `platform`, `access_token`, `session_id`, `ip_address`, `clicked_at`, `available_at`, `expires_at`, `used_at`, `created_at`, `updated_at`) VALUES
(1, '2026-05-14', 'ig', '54a538653f296cdedc3f2d840a2efcb67275b2b5', 'dGsCZXI3XQ0aNA1S7oZkOfLziddJzgDtD0NdFN5K', '44.212.244.90', '2026-05-14 15:36:52', '2026-05-14 15:37:02', '2026-05-14 15:46:52', NULL, '2026-05-14 15:36:52', '2026-05-14 15:36:52'),
(2, '2026-05-15', 'yt', 'd850b773194597f5766cbe4d8b341733ec9f09ca', 'W3O2a5gI7sFGZ71Wj5CskNu0shJXSiBu3ZOmdXcY', '2401:4900:891c:8789:14d5:903:b54c:70cd', '2026-05-15 05:51:55', '2026-05-15 05:52:05', '2026-05-15 06:01:55', NULL, '2026-05-15 05:51:55', '2026-05-15 05:51:55'),
(3, '2026-05-15', 'yt', '99e5735c4ea662dfe199729e31fac96ade4cfa3c', 'msjmD9tqSXVDVb9moQ4eNEN4aiaMw1rkQhtezDe7', '2401:4900:882e:5078:6907:1090:3bbb:ac13', '2026-05-15 06:55:47', '2026-05-15 06:55:57', '2026-05-15 07:05:47', NULL, '2026-05-15 06:55:47', '2026-05-15 06:55:47'),
(4, '2026-05-15', 'ig', 'e4a9905c19544f0c967105f4c75399bb72b3da26', 'msjmD9tqSXVDVb9moQ4eNEN4aiaMw1rkQhtezDe7', '2401:4900:882e:5078:6907:1090:3bbb:ac13', '2026-05-15 06:56:18', '2026-05-15 06:56:28', '2026-05-15 07:06:18', NULL, '2026-05-15 06:56:18', '2026-05-15 06:56:18'),
(5, '2026-05-15', 'tt', '07216e4313622c62275eabc864316e8c0932ef1d', 'msjmD9tqSXVDVb9moQ4eNEN4aiaMw1rkQhtezDe7', '2401:4900:882e:5078:6907:1090:3bbb:ac13', '2026-05-15 06:57:37', '2026-05-15 06:57:47', '2026-05-15 07:07:37', NULL, '2026-05-15 06:57:37', '2026-05-15 06:57:37'),
(6, '2026-05-15', 'yt', '72b42abe1ee887882d0f709e24e7f1a59389055b', 'TLDcXMQTG1AZ93zpnQ21rwY2ZH45G4hDIHXPZ0bO', '223.185.44.245', '2026-05-15 07:07:58', '2026-05-15 07:08:08', '2026-05-15 07:17:58', NULL, '2026-05-15 07:07:58', '2026-05-15 07:07:58'),
(7, '2026-05-15', 'ig', '16794c13ec2f8298edf87f5f8eeb78da37a010a0', 'TLDcXMQTG1AZ93zpnQ21rwY2ZH45G4hDIHXPZ0bO', '223.185.44.245', '2026-05-15 07:07:31', '2026-05-15 07:07:41', '2026-05-15 07:17:31', NULL, '2026-05-15 07:07:31', '2026-05-15 07:07:31'),
(8, '2026-05-15', 'yt', 'cba64b62559ed8da36d5c16e301e8588a95b6530', 'GlnbJ8QrAHyxTAl9WAJBDWJ14ISVJzPDICGFqAQN', '2401:4900:882e:5078:d2c:5756:77ba:9b01', '2026-05-15 11:55:37', '2026-05-15 11:55:47', '2026-05-15 11:58:37', '2026-05-15 11:56:04', '2026-05-15 11:55:37', '2026-05-15 11:56:04'),
(9, '2026-05-15', 'ig', 'f2d7cca1118538eb173115d5c46329845381bf11', 'GlnbJ8QrAHyxTAl9WAJBDWJ14ISVJzPDICGFqAQN', '2401:4900:882e:5078:d2c:5756:77ba:9b01', '2026-05-15 11:57:18', '2026-05-15 11:57:28', '2026-05-15 12:00:18', NULL, '2026-05-15 11:57:18', '2026-05-15 11:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `creator_link_winners`
--

CREATE TABLE `creator_link_winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `winner_date` date NOT NULL,
  `platform` varchar(20) NOT NULL,
  `submission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `winner_link` text NOT NULL,
  `clicks` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creator_link_winners`
--

INSERT INTO `creator_link_winners` (`id`, `winner_date`, `platform`, `submission_id`, `winner_link`, `clicks`, `created_at`, `updated_at`) VALUES
(1, '2026-05-14', 'yt', NULL, 'https://www.youtube.com/shorts/FjW6ZZGeqZ8', 12, '2026-05-14 15:34:50', '2026-05-14 15:34:50'),
(2, '2026-05-14', 'ig', NULL, 'https://www.instagram.com/p/Bh8psJYH1lq', 8, '2026-05-14 15:34:50', '2026-05-14 15:34:50'),
(3, '2026-05-14', 'tt', NULL, 'https://tiktok.com', 1, '2026-05-14 15:34:50', '2026-05-14 15:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_05_14_120452_create_sessions_table', 1),
(4, '2026_05_14_124715_create_visitor_logs_table', 1),
(5, '2026_05_14_125833_create_creator_link_tables', 1),
(6, '2026_05_14_132000_create_creator_link_winners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5Z5tOsU0LJEpnOWbjqnReguGAt24qgHLYL1taU8f', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1dnZm1YQUFzYlVuZ1FhQ09BbkIxZU1Ia2Vjak8xeU1VTEtrZ3ZtWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3Lnl0aWd0dC5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778830787),
('7Y0ZoSYi4OYm4OxHu5trxVJQVFDy0lBNc9BjuZpb', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTNWWjdUb1FNNDkzOEdnWHZZOVpqVEpSTzI4YXVISjB2d2FGUU0zayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778830889),
('98RNdLNavF6SK0HCXVSOjbOFdOK6jtmC9ifRGaOr', NULL, '2401:4900:882e:5078:b950:a570:f900:bb77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWlhWG5MbE5DUmZiOFBlaURsTUJ6RDllMGhzT2xhNUZ2emMycDRzNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778850011),
('CMXr3lpjNukDly7CH7GNM49HEWMpbPEGHNQd56xs', NULL, '44.212.244.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1B2R0syWFFORnM4amE1Sm9ZSFlLWXNacmF3THp1eG9lcm85Y0RPQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778848222),
('dokzE4OVGduJUHJhOFpshSDhkns9VkDWlicC1IX6', NULL, '2a03:b0c0:1:e0::c00:9001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaENsdDNiSXBZU2RJME9NNlZRQmNNWng3OFJMU3ZKcHRnM2p1M0ZyeiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778836376),
('GlnbJ8QrAHyxTAl9WAJBDWJ14ISVJzPDICGFqAQN', NULL, '2401:4900:882e:5078:d2c:5756:77ba:9b01', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmMyZDFVSEJEMllVQVFXVUp3Q2VuaVo0NURWQVU0U0dnc0ZxSGhPNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778846485),
('HA7mV1cBIjbOZThcDOnlNWOOCRREHXHDpjdPs8Vc', NULL, '103.105.165.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVhmRmRreDM5cUdHMjlneGRjb0V6cTR5MHF4dHlBSXd0SjBvUWZUcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778846347),
('ihV7YAivJzxvpYjCx1OYvmPiDUlQBkonH5Pb8yHJ', NULL, '193.0.203.158', 'Python/3.11 aiohttp/3.11.11', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3g4ZEdMU1RXcGdIRVRSZnA0cXFEdFlnUmNDRFh3b3RWUzF0SVhPdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778829393),
('msjmD9tqSXVDVb9moQ4eNEN4aiaMw1rkQhtezDe7', NULL, '2401:4900:882e:5078:6907:1090:3bbb:ac13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW80RmVTblN4dlJFN3g0bmxVUVV3blhEOUpQM1JKOW4yNGpHbWk0NSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778830574),
('pxKEvYloAxau0RprphawD2B1dJOKnvr96CWYJ1k7', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXBHN282Z0xtazR6dGI4UUk3QlFGN2N6cFFwZ2w1NWZQakRXWWRRYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3Lnl0aWd0dC5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778832828),
('TLDcXMQTG1AZ93zpnQ21rwY2ZH45G4hDIHXPZ0bO', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnhQVzlEVk5iY2xVM2tXdW1sb25naVhiWmJXUUsxbUxJZTZjYTR6ayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778830779),
('ve7CQetphDwMTEYJjyFdjGSUveeg0ZfeXrXAY0lo', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUZLa2xsVXJadEZ1OE0xVnE4ZzdrZFJpVU05SThlMEFkQnBYUFdhdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3Lnl0aWd0dC5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778850284),
('W3O2a5gI7sFGZ71Wj5CskNu0shJXSiBu3ZOmdXcY', NULL, '2401:4900:891c:8789:14d5:903:b54c:70cd', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHk2dGR6cnRCOWQxbFh0akNGVlpUSmN5YXA3TmNmSDdmOGgyejIzaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8veXRpZ3R0LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778824322),
('WCmRnfxOVmPS7lwM7f2nSXd8n6U13azlHMxVawIw', NULL, '223.185.44.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTZYa1F5cjJMQloxckF5Y25tMWlFeGZFaHR2SXJkZFZsRGZMN1lwdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3Lnl0aWd0dC5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778850300);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_logs`
--

CREATE TABLE `visitor_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent_hash` varchar(64) DEFAULT NULL,
  `visited_on` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_logs`
--

INSERT INTO `visitor_logs` (`id`, `session_id`, `ip_address`, `user_agent_hash`, `visited_on`, `created_at`, `updated_at`) VALUES
(1, 'dGsCZXI3XQ0aNA1S7oZkOfLziddJzgDtD0NdFN5K', '44.212.244.90', '9884896580bbd9285b8a0782ea7ae63de01ed5f471d1bab6202de0630c0399a3', '2026-05-14', '2026-05-14 15:37:03', '2026-05-14 15:37:03'),
(2, 'P9BtKnNwL84a6uJgGwHHrAaiETDlcBOLvQCkgiHL', '194.230.158.210', '5beaa3b505de56996b1f0d12f63f1696c36ac6f62cb9fd28fe57be3a7bacbfb9', '2026-05-14', '2026-05-14 16:20:07', '2026-05-14 16:20:07'),
(3, 'hKB42nmQdUWrWIOoNhUPtW19uYQcIbMbHikDCXiZ', '100.31.202.79', '93471414a280d667b4d37824ff5e6b205d7e14c7467624e0e1e6b66bce483db2', '2026-05-14', '2026-05-14 18:03:18', '2026-05-14 18:03:18'),
(4, '6eQl2uYYH3rwv8u4wId8zTe6pVsmTJjPYG5Ndmbk', '2401:4900:882e:5078:7d56:5eed:1eba:2b34', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-14', '2026-05-14 19:33:32', '2026-05-14 19:33:32'),
(5, 'Iny9WwJpzExmtycTqMKTBTw4NtvD2Cs8UXP1t7lV', '104.168.71.148', '031e6249d3395c48b0cb0135a2325727610b347c69b597d259f42884794031fe', '2026-05-14', '2026-05-14 20:50:57', '2026-05-14 20:50:57'),
(6, 'aRhYdfmHIAX766yGZYEMLz9gkLa9yRbPZbvy6eJJ', '104.168.71.160', '031e6249d3395c48b0cb0135a2325727610b347c69b597d259f42884794031fe', '2026-05-14', '2026-05-14 20:51:31', '2026-05-14 20:51:31'),
(7, '0pj0pktUjtdagPJRoAdRT8C5nEQcdsArT56Pvrw5', '104.168.71.172', '031e6249d3395c48b0cb0135a2325727610b347c69b597d259f42884794031fe', '2026-05-14', '2026-05-14 20:53:01', '2026-05-14 20:53:01'),
(8, 'gVwRAXcUBJJgI1hy6cvqrRuXpcoCiGnvwdEDTy5e', '2a02:4780:3:1::3', '1c5c75fda7279264269435437b955840025da8baa92b3d4b3e0cca9349723f71', '2026-05-15', '2026-05-15 03:15:05', '2026-05-15 03:15:05'),
(9, 'W3O2a5gI7sFGZ71Wj5CskNu0shJXSiBu3ZOmdXcY', '2401:4900:891c:8789:14d5:903:b54c:70cd', '9884896580bbd9285b8a0782ea7ae63de01ed5f471d1bab6202de0630c0399a3', '2026-05-15', '2026-05-15 05:52:02', '2026-05-15 05:52:02'),
(10, 'msjmD9tqSXVDVb9moQ4eNEN4aiaMw1rkQhtezDe7', '2401:4900:882e:5078:6907:1090:3bbb:ac13', '9884896580bbd9285b8a0782ea7ae63de01ed5f471d1bab6202de0630c0399a3', '2026-05-15', '2026-05-15 07:36:14', '2026-05-15 07:36:14'),
(11, 'TLDcXMQTG1AZ93zpnQ21rwY2ZH45G4hDIHXPZ0bO', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 07:39:39', '2026-05-15 07:39:39'),
(12, '7Y0ZoSYi4OYm4OxHu5trxVJQVFDy0lBNc9BjuZpb', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 07:41:29', '2026-05-15 07:41:29'),
(13, 'ihV7YAivJzxvpYjCx1OYvmPiDUlQBkonH5Pb8yHJ', '193.0.203.158', 'f87006d4d0ff435fb19878ccdcab5f5c6eac00ef98dae430a74f2689320f4b98', '2026-05-15', '2026-05-15 07:16:33', '2026-05-15 07:16:33'),
(14, '5Z5tOsU0LJEpnOWbjqnReguGAt24qgHLYL1taU8f', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 07:39:47', '2026-05-15 07:39:47'),
(15, 'pxKEvYloAxau0RprphawD2B1dJOKnvr96CWYJ1k7', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 08:13:48', '2026-05-15 08:13:48'),
(16, 'dokzE4OVGduJUHJhOFpshSDhkns9VkDWlicC1IX6', '2a03:b0c0:1:e0::c00:9001', 'bd33e731a9dc71ed698fb3458da6dbe5d3ecceab239d26bc9d1da14c96e63705', '2026-05-15', '2026-05-15 09:12:56', '2026-05-15 09:12:56'),
(17, 'CMXr3lpjNukDly7CH7GNM49HEWMpbPEGHNQd56xs', '44.212.244.90', '9884896580bbd9285b8a0782ea7ae63de01ed5f471d1bab6202de0630c0399a3', '2026-05-15', '2026-05-15 12:30:22', '2026-05-15 12:30:22'),
(18, 'GlnbJ8QrAHyxTAl9WAJBDWJ14ISVJzPDICGFqAQN', '2401:4900:882e:5078:d2c:5756:77ba:9b01', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 12:01:25', '2026-05-15 12:01:25'),
(19, 'HA7mV1cBIjbOZThcDOnlNWOOCRREHXHDpjdPs8Vc', '103.105.165.2', '0947dfa249bc5f884ef72d90b8bf40ce75885a289f59011695425fd6b8f45bfb', '2026-05-15', '2026-05-15 11:59:07', '2026-05-15 11:59:07'),
(20, '98RNdLNavF6SK0HCXVSOjbOFdOK6jtmC9ifRGaOr', '2401:4900:882e:5078:b950:a570:f900:bb77', '9884896580bbd9285b8a0782ea7ae63de01ed5f471d1bab6202de0630c0399a3', '2026-05-15', '2026-05-15 13:00:11', '2026-05-15 13:00:11'),
(21, 've7CQetphDwMTEYJjyFdjGSUveeg0ZfeXrXAY0lo', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 13:04:44', '2026-05-15 13:04:44'),
(22, 'WCmRnfxOVmPS7lwM7f2nSXd8n6U13azlHMxVawIw', '223.185.44.245', 'ef78bc17265d32e6c02d6cc23189e096909db7f5084bb8d0fe20ac7585d8c803', '2026-05-15', '2026-05-15 13:05:00', '2026-05-15 13:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `creator_link_submissions`
--
ALTER TABLE `creator_link_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_link_submissions_submission_date_index` (`submission_date`),
  ADD KEY `creator_link_submissions_platform_index` (`platform`),
  ADD KEY `creator_link_submissions_access_token_index` (`access_token`),
  ADD KEY `creator_link_submissions_session_id_index` (`session_id`);

--
-- Indexes for table `creator_link_unlocks`
--
ALTER TABLE `creator_link_unlocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `creator_link_unlocks_access_token_unique` (`access_token`),
  ADD UNIQUE KEY `creator_link_unlocks_unlock_date_session_id_platform_unique` (`unlock_date`,`session_id`,`platform`),
  ADD KEY `creator_link_unlocks_unlock_date_index` (`unlock_date`),
  ADD KEY `creator_link_unlocks_session_id_index` (`session_id`);

--
-- Indexes for table `creator_link_winners`
--
ALTER TABLE `creator_link_winners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `creator_link_winners_winner_date_platform_unique` (`winner_date`,`platform`),
  ADD KEY `creator_link_winners_submission_id_foreign` (`submission_id`),
  ADD KEY `creator_link_winners_winner_date_index` (`winner_date`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitor_logs_session_id_visited_on_unique` (`session_id`,`visited_on`),
  ADD KEY `visitor_logs_visited_on_index` (`visited_on`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creator_link_submissions`
--
ALTER TABLE `creator_link_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `creator_link_unlocks`
--
ALTER TABLE `creator_link_unlocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `creator_link_winners`
--
ALTER TABLE `creator_link_winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creator_link_winners`
--
ALTER TABLE `creator_link_winners`
  ADD CONSTRAINT `creator_link_winners_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `creator_link_submissions` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
