-- =============================================================
-- PATCH: Tambahan tabel `pejabats` untuk fitur Pejabat Struktural
-- Jalankan file ini di database yang SUDAH ADA (kecamatan_lubuk_kilangan)
-- Tidak perlu import ulang seluruh database.
-- =============================================================

USE `kecamatan_lubuk_kilangan`;

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

-- Tambahkan juga baris migrasi ini supaya Laravel tahu migrasi sudah tercatat
-- (opsional, hanya perlu jika Anda nanti menjalankan `php artisan migrate`)
INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2026_01_01_000005_create_pejabats_table', 1);
