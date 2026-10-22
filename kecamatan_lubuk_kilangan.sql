-- =============================================================
-- Database: kecamatan_lubuk_kilangan
-- Website Resmi Kecamatan Lubuk Kilangan (Laravel 12)
-- Import file ini melalui phpMyAdmin / HeidiSQL / Adminer di Laragon
-- =============================================================

CREATE DATABASE IF NOT EXISTS `kecamatan_lubuk_kilangan`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `kecamatan_lubuk_kilangan`;

SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------
-- Table: migrations (opsional, agar Laravel tahu migrasi sudah jalan)
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('0001_01_01_000000_create_users_table', 1),
('2026_01_01_000001_create_kelurahans_table', 1),
('2026_01_01_000002_create_beritas_table', 1),
('2026_01_01_000003_create_galeris_table', 1),
('2026_01_01_000004_create_profil_pages_table', 1);

-- ---------------------------------------------------------------
-- Table: users
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator') NOT NULL DEFAULT 'operator',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Password asli: admin123 / operator123 (hash bcrypt, kompatibel Laravel Hash::check)
INSERT INTO `users` (`name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('Administrator', 'admin@lubukkilangan.padang.go.id', '$2y$10$TVhdgq.ZBk/G/durWGJZBOxHj5LF1tBLzneMnNKFfVk/Opta3/Fpa', 'admin', NOW(), NOW()),
('Operator Konten', 'operator@lubukkilangan.padang.go.id', '$2y$10$GHWRQGj0QcDQRVzNJEGPyOE363Slq7c.FGRF0kkMl7.WREhxSXjaq', 'operator', NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: password_reset_tokens
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------
-- Table: sessions
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------
-- Table: kelurahans
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `kelurahans`;
CREATE TABLE `kelurahans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama_lurah` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `jumlah_penduduk` int unsigned DEFAULT NULL,
  `luas_wilayah_km2` int unsigned DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelurahans_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kelurahans` (`nama`, `slug`, `nama_lurah`, `alamat_kantor`, `jumlah_penduduk`, `luas_wilayah_km2`, `deskripsi`, `created_at`, `updated_at`) VALUES
('Kelurahan Bandar Buat', 'kelurahan-bandar-buat', 'Drs. H. Yusrizal', 'Jl. Raya Indarung, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang', 15320, 4, 'Kelurahan Bandar Buat merupakan salah satu kelurahan di Kecamatan Lubuk Kilangan yang menjadi pusat aktivitas ekonomi dan perdagangan warga.', NOW(), NOW()),
('Kelurahan Indarung', 'kelurahan-indarung', 'Hj. Nurma Yunita, S.Sos', 'Jl. Raya Indarung No. 12, Kec. Lubuk Kilangan, Kota Padang', 9870, 6, 'Kelurahan Indarung dikenal sebagai kawasan industri karena keberadaan pabrik semen dan menjadi salah satu penyumbang pendapatan daerah.', NOW(), NOW()),
('Kelurahan Koto Lalang', 'kelurahan-koto-lalang', 'Ahmad Fauzi, S.STP', 'Jl. Koto Lalang, Kec. Lubuk Kilangan, Kota Padang', 6210, 5, 'Kelurahan Koto Lalang memiliki potensi wisata alam dan pertanian yang menjadi mata pencaharian sebagian besar warganya.', NOW(), NOW()),
('Kelurahan Padang Besi', 'kelurahan-padang-besi', 'Rina Marlina, S.E', 'Jl. Padang Besi, Kec. Lubuk Kilangan, Kota Padang', 7430, 3, 'Kelurahan Padang Besi berbatasan langsung dengan Kabupaten Solok dan berperan sebagai pintu gerbang selatan Kota Padang.', NOW(), NOW()),
('Kelurahan Baringin', 'kelurahan-baringin', 'Deni Kurniawan, S.Sos', 'Jl. Baringin, Kec. Lubuk Kilangan, Kota Padang', 5120, 4, 'Kelurahan Baringin merupakan kawasan permukiman yang terus berkembang dengan dukungan infrastruktur jalan yang memadai.', NOW(), NOW()),
('Kelurahan Batu Gadang', 'kelurahan-batu-gadang', 'Yulia Ningsih, S.Pd', 'Jl. Batu Gadang, Kec. Lubuk Kilangan, Kota Padang', 4890, 5, 'Kelurahan Batu Gadang memiliki bentang alam perbukitan dan menjadi kawasan penyangga hijau Kota Padang.', NOW(), NOW()),
('Kelurahan Tarantang', 'kelurahan-tarantang', 'Muhammad Rizki, S.STP', 'Jl. Tarantang, Kec. Lubuk Kilangan, Kota Padang', 3980, 7, 'Kelurahan Tarantang dikenal dengan potensi wisata alam air terjun dan perkebunan warga.', NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: beritas
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `beritas`;
CREATE TABLE `beritas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL DEFAULT 'Berita',
  `ringkasan` text,
  `isi` longtext NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `tanggal_publish` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `dilihat` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beritas_slug_unique` (`slug`),
  KEY `beritas_user_id_foreign` (`user_id`),
  CONSTRAINT `beritas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `beritas` (`judul`, `slug`, `kategori`, `ringkasan`, `isi`, `user_id`, `tanggal_publish`, `is_published`, `dilihat`, `created_at`, `updated_at`) VALUES
('BNN Pusat Gelar Press Conference Pengungkapan "Clandestine Lab" Narkotika di Tarantang', 'bnn-pusat-gelar-press-conference-abcde', 'Berita', 'BNN Pusat menggelar Press Conference Pengungkapan "Clandestine Lab" Narkotika di Kelurahan Tarantang, Kecamatan Lubuk Kilangan.', '<p>Badan Narkotika Nasional (BNN) Pusat menggelar konferensi pers terkait pengungkapan laboratorium narkotika tersembunyi (clandestine lab) yang berlokasi di wilayah Kelurahan Tarantang, Kecamatan Lubuk Kilangan. Kegiatan ini turut dihadiri oleh unsur muspika kecamatan sebagai bentuk dukungan terhadap penegakan hukum di wilayah setempat.</p>', 1, DATE_SUB(NOW(), INTERVAL 13 DAY), 1, 0, NOW(), NOW()),
('Pasca-Hujan Lebat, Camat Lubuk Kilangan Langsung Tinjau Titik Longsor', 'pasca-hujan-lebat-camat-tinjau-fghij', 'Berita', 'Menindaklanjuti hujan lebat yang mengguyur Kota Padang, Camat Lubuk Kilangan langsung meninjau titik longsor di wilayahnya.', '<p>Menindaklanjuti hujan lebat yang mengguyur Kota Padang beberapa hari terakhir, Camat Lubuk Kilangan bersama tim BPBD dan unsur terkait langsung meninjau titik-titik yang berpotensi longsor guna memastikan keselamatan warga sekitar.</p>', 1, DATE_SUB(NOW(), INTERVAL 16 DAY), 1, 0, NOW(), NOW()),
('Pastikan Keamanan & Aksesibilitas, Camat Lubuk Kilangan Monitoring Pemasangan Jembatan', 'pastikan-keamanan-aksesibilitas-klmno', 'Berita', 'Camat Lubuk Kilangan, Ibu Nurul Widya Siska Usman, memantau langsung proses pemasangan jembatan penghubung antar kelurahan.', '<p>Camat Lubuk Kilangan, Ibu Nurul Widya Siska Usman, S.H., M.Si, meninjau langsung proses pemasangan jembatan yang menghubungkan dua kelurahan guna memastikan keamanan dan aksesibilitas warga terjaga selama masa pengerjaan.</p>', 1, DATE_SUB(NOW(), INTERVAL 27 DAY), 1, 0, NOW(), NOW()),
('Selamat Atas Pelantikan Wali Kota dan Wakil Wali Kota Padang Periode 2025-2030', 'selamat-atas-pelantikan-wako-pqrst', 'Pengumuman', 'Segenap jajaran Kecamatan Lubuk Kilangan mengucapkan selamat atas pelantikan Wali Kota dan Wakil Wali Kota Padang periode 2025-2030.', '<p>Segenap jajaran Kecamatan Lubuk Kilangan turut mengucapkan selamat atas pelantikan Wali Kota dan Wakil Wali Kota Padang periode 2025-2030 yang dilaksanakan di Istana Negara, Jakarta.</p>', 1, DATE_SUB(NOW(), INTERVAL 45 DAY), 1, 0, NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: galeris
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `galeris`;
CREATE TABLE `galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text,
  `tanggal_kegiatan` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galeris_user_id_foreign` (`user_id`),
  CONSTRAINT `galeris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `galeris` (`judul`, `foto`, `keterangan`, `tanggal_kegiatan`, `user_id`, `created_at`, `updated_at`) VALUES
('Pelepasan Peserta Jambore KSB Kota Padang dari FKSB Kecamatan', 'default.jpg', 'Dokumentasi pelepasan peserta Jambore KSB Kota Padang dari FKSB Kecamatan Lubuk Kilangan.', DATE_SUB(CURDATE(), INTERVAL 5 DAY), 1, NOW(), NOW()),
('Press Conference Badan Narkotika Nasional Pusat', 'default.jpg', 'Dokumentasi konferensi pers pengungkapan clandestine lab narkotika di Tarantang.', DATE_SUB(CURDATE(), INTERVAL 13 DAY), 1, NOW(), NOW()),
('Monitoring Titik Longsor Pasca Hujan Lebat', 'default.jpg', 'Dokumentasi peninjauan titik longsor bersama BPBD Kota Padang.', DATE_SUB(CURDATE(), INTERVAL 16 DAY), 1, NOW(), NOW()),
('Kunjungan Kerja Wali Kota Padang', 'default.jpg', 'Dokumentasi kegiatan kunjungan kerja di wilayah Kecamatan Lubuk Kilangan.', DATE_SUB(CURDATE(), INTERVAL 30 DAY), 1, NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: profil_pages
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `profil_pages`;
CREATE TABLE `profil_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profil_pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profil_pages` (`judul`, `slug`, `konten`, `created_at`, `updated_at`) VALUES
('Sejarah Kecamatan', 'sejarah', '<p>Kecamatan Lubuk Kilangan adalah salah satu dari 11 kecamatan di Kota Padang, Provinsi Sumatera Barat, Indonesia. Kecamatan ini terletak di bagian selatan Kota Padang dan berbatasan langsung dengan Kabupaten Solok.</p><p>Silakan ubah konten ini melalui panel admin sesuai data resmi kecamatan.</p>', NOW(), NOW()),
('Visi dan Misi', 'visi-misi', '<h4>Visi</h4><p>Terwujudnya pelayanan publik yang prima, transparan, dan akuntabel di Kecamatan Lubuk Kilangan.</p><h4>Misi</h4><ol><li>Meningkatkan kualitas pelayanan administrasi kepada masyarakat.</li><li>Mendorong partisipasi masyarakat dalam pembangunan kecamatan.</li><li>Mewujudkan tata kelola pemerintahan yang bersih dari gratifikasi.</li></ol>', NOW(), NOW()),
('Struktur Organisasi', 'struktur-organisasi', '<p>Struktur organisasi Kecamatan Lubuk Kilangan terdiri dari Camat, Sekretaris Kecamatan, dan beberapa Kepala Seksi (Kasi) serta Kepala Sub Bagian (Kasubag). Unggah bagan struktur organisasi melalui panel admin.</p>', NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: pejabats
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `pejabats`;
CREATE TABLE `pejabats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pejabats` (`nama`, `jabatan`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
('Nurul Widya Siska Usman, S.H., M.Si', 'Camat', 'Memimpin penyelenggaraan pemerintahan, pembangunan, dan pelayanan masyarakat di Kecamatan Lubuk Kilangan.', 1, NOW(), NOW()),
('Ahmad Zaki, S.STP', 'Sekretaris Kecamatan', 'Berkomitmen dalam memberikan pelayanan prima dan inovasi untuk kemajuan masyarakat Lubuk Kilangan.', 2, NOW(), NOW()),
('Drs. H. Yusrizal', 'Kepala Seksi Pemerintahan', 'Menangani urusan administrasi pemerintahan dan kependudukan di tingkat kecamatan.', 3, NOW(), NOW()),
('Hj. Nurma Yunita, S.Sos', 'Kepala Seksi Kesejahteraan Sosial', 'Mengkoordinasikan program kesejahteraan sosial dan pemberdayaan masyarakat.', 4, NOW(), NOW());

-- ---------------------------------------------------------------
-- Table: kantor_pemerintahans
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `kantor_pemerintahans`;
CREATE TABLE `kantor_pemerintahans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL DEFAULT 'kelurahan',
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `urutan` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kantor_pemerintahans` (`nama`, `tipe`, `alamat`, `telepon`, `email`, `instagram`, `urutan`, `created_at`, `updated_at`) VALUES
('Kantor Camat Lubuk Kilangan', 'camat', 'Jl. Raya Indarung, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat', '(0751) 779069', 'kecluki@padang.go.id', '@keclubukkilangan', 1, NOW(), NOW()),
('Kelurahan Bandar Buat', 'kelurahan', 'Jl. Raya Indarung, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang', '-', 'bandarbuat@padang.go.id', '@keclubukkilangan', 2, NOW(), NOW()),
('Kelurahan Indarung', 'kelurahan', 'Jl. Raya Indarung No. 12, Kec. Lubuk Kilangan, Kota Padang', '-', 'indarung@padang.go.id', '@keclubukkilangan', 3, NOW(), NOW()),
('Kelurahan Koto Lalang', 'kelurahan', 'Jl. Koto Lalang, Kec. Lubuk Kilangan, Kota Padang', '-', 'kotolalang@padang.go.id', '@keclubukkilangan', 4, NOW(), NOW()),
('Kelurahan Padang Besi', 'kelurahan', 'Jl. Padang Besi, Kec. Lubuk Kilangan, Kota Padang', '-', 'padangbesi@padang.go.id', '@keclubukkilangan', 5, NOW(), NOW()),
('Kelurahan Baringin', 'kelurahan', 'Jl. Baringin, Kec. Lubuk Kilangan, Kota Padang', '-', 'baringin@padang.go.id', '@keclubukkilangan', 6, NOW(), NOW()),
('Kelurahan Batu Gadang', 'kelurahan', 'Jl. Batu Gadang, RT 03 RW 01, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat', '-', 'batugadang@gmail.com', '@keclubukkilangan', 7, NOW(), NOW()),
('Kelurahan Tarantang', 'kelurahan', 'Jl. Tarantang, Kec. Lubuk Kilangan, Kota Padang', '-', 'tarantang@padang.go.id', '@keclubukkilangan', 8, NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;
