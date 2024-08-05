CREATE DATABASE IF NOT EXISTS db_travel_wisata;
USE db_travel_wisata;

CREATE TABLE IF NOT EXISTS tabel_pemesanan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(255) NOT NULL,
    no_hp VARCHAR(15) NOT NULL,
    jumlah_peserta INT(11) NOT NULL,
    jumlah_hari INT(11) NOT NULL,
    akomodasi BOOLEAN NOT NULL DEFAULT 0,
    transportasi BOOLEAN NOT NULL DEFAULT 0,
    service_makanan BOOLEAN NOT NULL DEFAULT 0,
    harga_paket DECIMAL(15,2) NOT NULL,
    total_tagihan DECIMAL(15,2) NOT NULL
);
