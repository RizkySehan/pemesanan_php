<?php include 'includes/header.php'; ?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pemesanan</title>
    <style>
        .card {
            margin: 50px 200px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h5 class="card-header text-white bg-secondary">Edit Data Pemesanan</h5>
        <div class="card-body">

            <?php
            // Ambil data berdasarkan ID
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tabel_pemesanan WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "Data tidak ditemukan.";
                    exit;
                }
            }

            // Update data ketika form disubmit
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
                $id = $_POST['id'];
                $namaPemesan = $_POST['namaPemesan'];
                $noHp = $_POST['noHp'];
                $tanggalPesan = $_POST['date'];
                $jumlahPeserta = $_POST['participants'];
                $jumlahHari = $_POST["time"];
                $akomodasi = isset($_POST['penginapan']) ? 1 : 0;
                $transportasi = isset($_POST['transportasi']) ? 1 : 0;
                $serviceMakanan = isset($_POST['makanan']) ? 1 : 0;
                $hargaPaket = $_POST['price'];
                $totalTagihan = $_POST['total'];

                $sql = "UPDATE tabel_pemesanan SET 
                                nama_pemesan = '$namaPemesan', 
                                no_hp = '$noHp', 
                                jumlah_peserta = '$jumlahPeserta', 
                                jumlah_hari = '$jumlahHari', 
                                akomodasi = '$akomodasi', 
                                transportasi = '$transportasi', 
                                service_makanan = '$serviceMakanan', 
                                harga_paket = '$hargaPaket', 
                                total_tagihan = '$totalTagihan' 
                            WHERE id = $id";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='modifikasi_pemesanan.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>

            <form action="" method="POST" id="formPemesanan">
                <!-- Input untuk menyimpan ID yang akan di-update -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="mb-3">
                    <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="namaPemesan" name="namaPemesan" value="<?php echo $row['nama_pemesan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="noHP" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="noHP" name="noHp" value="<?php echo $row['no_hp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Pesan:</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Jumlah Hari:</label>
                    <input type="number" class="form-control" id="time" name="time" value="<?php echo $row['jumlah_hari']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="service" class="form-label">Option Pelayanan Paket Perjalanan:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="penginapan" name="penginapan" id="penginapan" <?php echo $row['akomodasi'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="penginapan">
                            Penginapan (Rp 1.000.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="transportasi" name="transportasi" id="transportasi" <?php echo $row['transportasi'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="transportasi">
                            Transportasi (Rp 1.200.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="makanan" name="makanan" id="makanan" <?php echo $row['service_makanan'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="makanan">
                            Makanan (Rp 500.000)
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="participants" class="form-label">Jumlah Peserta:</label>
                    <input type="number" class="form-control" id="participants" name="participants" min="1" value="<?php echo $row['jumlah_peserta']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga Paket Perjalanan:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['harga_paket']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Jumlah Tagihan:</label>
                    <input type="number" class="form-control" id="total" name="total" value="<?php echo $row['total_tagihan']; ?>" readonly>
                </div>
                <input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
                <input type="button" name="hitung" id="hitung" value="Hitung" class="btn btn-primary">
                <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-danger">
            </form>
        </div>
    </div>


    <script>
        let isHitungClicked = false; // Variabel untuk menyimpan status klik tombol Hitung

        function updatePriceAndTotal() {
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
            updatePriceAndTotal();
            isHitungClicked = true; // Set status klik tombol Hitung ke true
            document.getElementById('update').disabled = false; // Aktifkan tombol Update
        });

        // Event listeners untuk setiap perubahan input relevan
        document.getElementById('participants').addEventListener('input', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });
        document.getElementById('time').addEventListener('input', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });
        document.getElementById('penginapan').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });
        document.getElementById('transportasi').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });
        document.getElementById('makanan').addEventListener('change', function() {
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });

        document.getElementById('reset').addEventListener('click', function() {
            document.getElementById('formPemesanan').reset();
            isHitungClicked = false; // Reset status klik tombol Hitung
            document.getElementById('update').disabled = true; // Nonaktifkan tombol Update
        });
    </script>

    <?php
    // Tutup koneksi setelah selesai
    $conn->close();
    ?>
</body>

</html>