-- =============================================================
-- PATCH: Tambahan tabel `kantor_pemerintahans` untuk fitur Alamat Pemerintahan
-- Jalankan file ini di database yang SUDAH ADA (kecamatan_lubuk_kilangan)
-- Tidak perlu import ulang seluruh database.
-- =============================================================

USE `kecamatan_lubuk_kilangan`;

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

-- Catatan opsional untuk Laravel migrate tracking
INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2026_01_01_000006_create_kantor_pemerintahans_table', 1);
