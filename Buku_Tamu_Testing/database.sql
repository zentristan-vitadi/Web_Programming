-- ============================================
--  Script SQL: Buku Tamu Digital
--  SMK Informatika Pesat
-- ============================================

-- Buat database
CREATE DATABASE IF NOT EXISTS db_buku_tamu;

-- Gunakan database
USE db_buku_tamu;

-- Buat tabel tamu
CREATE TABLE IF NOT EXISTS tamu (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    nama        VARCHAR(100) NOT NULL,
    no_hp       VARCHAR(15)  NOT NULL,
    instansi    VARCHAR(100) NOT NULL,
    keperluan   TEXT         NOT NULL,
    bertemu     VARCHAR(100) NOT NULL,
    tanggal     DATE         NOT NULL,
    jam         TIME         NOT NULL,
    dibuat_pada TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data (opsional, bisa dihapus)
INSERT INTO tamu (nama, no_hp, instansi, keperluan, bertemu, tanggal, jam) VALUES
('Budi Santoso',  '081234567890', 'Dinas Pendidikan',     'Kunjungan monitoring',    'Kepala Sekolah', '2025-01-15', '09:00:00'),
('Siti Rahayu',   '085678901234', 'PT Maju Jaya',         'Presentasi kerja sama',   'Wakil Kepala',   '2025-01-16', '10:30:00'),
('Ahmad Fauzi',   '087890123456', 'Universitas Nusantara', 'Rekrutmen mahasiswa PKL', 'Ketua Jurusan',  '2025-01-17', '13:00:00');
