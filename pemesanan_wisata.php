<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <h5 class="card-header text-white bg-secondary">Create / Edit Data</h5>
            <div class="card-body">
                <form action="" method="POST">
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
                        <label for="time" class="form-label">Waktu Pelaksanaan Perjalanan:</label>
                        <input type="text" class="form-control" id="time" name="time" required>
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
                            <input class="form-check-input" type="checkbox" value="transportasi" id="makanan">
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
                        <label for="price" class="form-label">Harga Paket Perjalanan:</label abel>
                        <input type="number" class="form-control" id="price" name="price" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Jumlah Tagihan:</label>
                        <input type="number" class="form-control" id="total" name="total" readonly>
                    </div>
                    <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary">
                    <input type="submit" name="hitung" id="hitung" value="hitung" class="btn btn-primary">
                    <input type="submit" name="reset" id="reset" value="Reset" class="btn btn-danger">
                </form>
            </div>
        </div>
        <!-- Tabel Pesanan -->
        <div class="card mt-4">
            <h5 class="card-header text-white bg-secondary">Daftar Pesanan</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Phone</th>
                            <th>Jumlah Peserta</th>
                            <th>Jumlah Hari</th>
                            <th>Akomodasi</th>
                            <th>Transportasi</th>
                            <th>Service/Makanan</th>
                            <th>Harga Paket</th>
                            <th>Total Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tabel_pemesanan";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['nama_pemesan'] . "</td>";
                                echo "<td>" . $row['no_hp'] . "</td>";
                                echo "<td>" . $row['jumlah_peserta'] . "</td>";
                                echo "<td>" . $row['jumlah_hari'] . "</td>";
                                echo "<td>" . ($row['akomodasi'] == 1 ? 'Y' : 'N') . "</td>";
                                echo "<td>" . ($row['transportasi'] == 1 ? 'Y' : 'N') . "</td>";
                                echo "<td>" . ($row['service_makanan'] == 1 ? 'Y' : 'N') . "</td>";
                                echo "<td>" . number_format($row['harga_paket']) . "</td>";
                                echo "<td>" . number_format($row['total_tagihan']) . "</td>";
                                echo "<td>
                                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-info'>Edit</a>
                                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['hitung'])) {
            // Kalkulasi Harga Paket dan Total Tagihan
            $hargaPenginapan = isset($_POST['penginapan']) ? 1000000 : 0;
            $hargaTransportasi = isset($_POST['transportasi']) ? 1200000 : 0;
            $hargaMakanan = isset($_POST['makanan']) ? 500000 : 0;

            $totalHargaLayanan = $hargaPenginapan + $hargaTransportasi + $hargaMakanan;
            $jumlahPeserta = $_POST['participants'];
            $totalTagihan = $totalHargaLayanan * $jumlahPeserta;

            echo "<script>
                document.getElementById('price').value = $totalHargaLayanan;
                document.getElementById('total').value = $totalTagihan;
            </script>";
        } elseif (isset($_POST['simpan'])) {
            // Menyimpan Data ke Database
            $namaPemesan = $_POST['namaPemesan'];
            $noHp = $_POST['noHp'];
            $tanggalPesan = $_POST['date'];
            $waktuPelaksanaan = $_POST['time'];
            $jumlahPeserta = $_POST['participants'];
            $hargaPaket = $_POST['price'];
            $totalTagihan = $_POST['total'];

            $sql = "INSERT INTO tabel_pemesanan (nama_pemesan, no_hp, tanggal_pesan, waktu_pelaksanaan, jumlah_peserta, harga_paket, total_tagihan)
                    VALUES ('$namaPemesan', '$noHp', '$tanggalPesan', '$waktuPelaksanaan', '$jumlahPeserta', '$hargaPaket', '$totalTagihan')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif (isset($_POST['reset'])) {
            // Reset Form
            echo "<script>document.forms[0].reset();</script>";
        }
    }


    $conn->close();
    ?>
</body>

</html>