<?php include 'includes/header.php'; ?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pemesanan</title>
    <style>
        .mx-auto {
            width: 70%;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
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
                    $namaPemesan = $_POST['namaPemesan'];
                    $noHp = $_POST['noHp'];
                    $tanggalPesan = $_POST['date'];
                    $waktuPelaksanaan = $_POST['time'];
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
                                tanggal_pesan = '$tanggalPesan',
                                waktu_pelaksanaan = '$waktuPelaksanaan',
                                jumlah_peserta = '$jumlahPeserta', 
                                jumlah_hari = '$jumlahHari', 
                                akomodasi = '$akomodasi', 
                                transportasi = '$transportasi', 
                                service_makanan = '$serviceMakanan', 
                                harga_paket = '$hargaPaket', 
                                total_tagihan = '$totalTagihan' 
                            WHERE id = $id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Data berhasil diperbarui!</div>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                ?>

                <form action="" method="POST" id="formPemesanan">
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
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d', strtotime($row['tanggal_pesan'])); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="time" class="form-label">Waktu Pelaksanaan Perjalanan:</label>
                        <input type="text" class="form-control" id="time" name="time" value="<?php echo $row['waktu_pelaksanaan']; ?>" required>
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
    </div>

    <script>
        document.getElementById('formPemesanan').addEventListener('submit', function(event) {
            if (!document.getElementById('price').value || !document.getElementById('total').value) {
                event.preventDefault();
                alert('Silakan klik tombol "Hitung" terlebih dahulu untuk menghitung harga sebelum memperbarui.');
            }
        });

        document.getElementById('hitung').addEventListener('click', function() {
            let hargaPenginapan = document.getElementById('penginapan').checked ? 1000000 : 0;
            let hargaTransportasi = document.getElementById('transportasi').checked ? 1200000 : 0;
            let hargaMakanan = document.getElementById('makanan').checked ? 500000 : 0;

            let totalHargaLayanan = hargaPenginapan + hargaTransportasi + hargaMakanan;
            let jumlahPeserta = document.getElementById('participants').value;

            let totalTagihan = totalHargaLayanan * jumlahPeserta;

            document.getElementById('price').value = totalHargaLayanan;
            document.getElementById('total').value = totalTagihan;
        });

        document.getElementById('reset').addEventListener('click', function() {
            document.getElementById('formPemesanan').reset();
        });
    </script>

    <?php
    // Tutup koneksi setelah selesai
    $conn->close();
    ?>
</body>

</html>