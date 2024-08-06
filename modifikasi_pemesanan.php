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
    <?php $conn->close(); ?>

</body>

</html>