<?php include 'includes/header.php'; ?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            margin: 50px 200px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h5 class="card-header text-white bg-secondary">Form Pemesanan Paket Travel Adventure</h5>
        <div class="card-body">
            <form action="" method="POST" id="formPemesanan">
                <div class="mb-3">
                    <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="namaPemesan" name="namaPemesan" required>
                </div>
                <div class="mb-3">
                    <label for="noHP" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="noHP" name="noHp" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Pesan:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Jumlah Hari:</label>
                    <input type="number" class="form-control" id="time" name="time" required>
                </div>

                <div class="mb-3">
                    <label for="service" class="form-label">Option Pelayanan Paket Perjalanan:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="penginapan" name="penginapan" id="penginapan">
                        <label class="form-check-label" for="penginapan">
                            Penginapan (Rp 1.000.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="transportasi" name="transportasi" id="transportasi">
                        <label class="form-check-label" for="transportasi">
                            Transportasi (Rp 1.200.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="makanan" name="makanan" id="makanan">
                        <label class="form-check-label" for="makanan">
                            Makanan (Rp 500.000)
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="participants" class="form-label">Jumlah Peserta:</label>
                    <input type="number" class="form-control" id="participants" name="participants" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga Paket Perjalanan:</label>
                    <input type="number" class="form-control" id="price" name="price" readonly>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Jumlah Tagihan:</label>
                    <input type="number" class="form-control" id="total" name="total" readonly>
                </div>
                <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary">
                <input type="button" name="hitung" id="hitung" value="Hitung" class="btn btn-primary">
                <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-danger">
            </form>
        </div>
    </div>


    <script>
        let isHitungClicked = false; // Variabel untuk menyimpan status klik tombol Hitung

        function simpanPriceAndTotal() {
            let hargaPenginapan = document.getElementById('penginapan').checked ? 1000000 : 0;
            let hargaTransportasi = document.getElementById('transportasi').checked ? 1200000 : 0;
            let hargaMakanan = document.getElementById('makanan').checked ? 500000 : 0;

            let totalHargaLayanan = hargaPenginapan + hargaTransportasi + hargaMakanan;
            let jumlahPeserta = document.getElementById('participants').value;
            let jumlahHari = document.getElementById('time').value;

            let totalTagihan = totalHargaLayanan * jumlahPeserta * jumlahHari;

            document.getElementById('price').value = totalHargaLayanan;
            document.getElementById('total').value = totalTagihan;
        }

        document.getElementById('formPemesanan').addEventListener('submit', function(event) {
            if (!isHitungClicked) {
                event.preventDefault();
                alert('Silakan klik tombol "Hitung" terlebih dahulu untuk menghitung harga sebelum menyimpan.');
            }
        });

        document.getElementById('hitung').addEventListener('click', function() {
            simpanPriceAndTotal();
            isHitungClicked = true; // Set status klik tombol Hitung ke true
            document.getElementById('simpan').disabled = false; // Aktifkan tombol Simpan
        });

        // Event listeners untuk setiap perubahan input relevan
        document.getElementById('participants').addEventListener('input', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });
        document.getElementById('time').addEventListener('input', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });
        document.getElementById('penginapan').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });
        document.getElementById('transportasi').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });
        document.getElementById('makanan').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });

        document.getElementById('reset').addEventListener('click', function() {
            document.getElementById('formPemesanan').reset();
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('simpan').disabled = true; // Nonaktifkan tombol Simpan
        });
    </script>

    <?php
    include 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
        $namaPemesan = $_POST['namaPemesan'];
        $noHp = $_POST['noHp'];
        $tanggalPesan = $_POST['date'];
        $jumlahPeserta = $_POST['participants'];
        $jumlahHari = $_POST['time'];
        $akomodasi = isset($_POST['penginapan']) ? 1 : 0;
        $transportasi = isset($_POST['transportasi']) ? 1 : 0;
        $serviceMakanan = isset($_POST['makanan']) ? 1 : 0;
        $hargaPaket = $_POST['price'];
        $totalTagihan = $_POST['total'];

        $sql = "INSERT INTO tabel_pemesanan (nama_pemesan, no_hp, jumlah_peserta, jumlah_hari, akomodasi, transportasi, service_makanan, harga_paket, total_tagihan)
                VALUES ('$namaPemesan', '$noHp', '$jumlahPeserta', '$jumlahHari', '$akomodasi', '$transportasi', '$serviceMakanan', '$hargaPaket', '$totalTagihan')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil disimpan!'); window.location.href='modifikasi_pemesanan.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>

</html>