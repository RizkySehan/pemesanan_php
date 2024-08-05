<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $namaPemesan = $_POST['namaPemesan'];
    $noHp = $_POST['noHp'];
    $jumlahPeserta = $_POST['participants'];
    $jumlahHari = $_POST['days'];
    $akomodasi = isset($_POST['akomodasi']) ? 1 : 0;
    $transportasi = isset($_POST['transportasi']) ? 1 : 0;
    $serviceMakanan = isset($_POST['service_makanan']) ? 1 : 0;
    $hargaPaket = $_POST['price'];
    $totalTagihan = $_POST['total'];

    $sql = "UPDATE tabel_pemesanan SET
            nama_pemesan='$namaPemesan',
            no_hp='$noHp',
            jumlah_peserta='$jumlahPeserta',
            jumlah_hari='$jumlahHari',
            akomodasi='$akomodasi',
            transportasi='$transportasi',
            service_makanan='$serviceMakanan',
            harga_paket='$hargaPaket',
            total_tagihan='$totalTagihan'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tabel_pemesanan WHERE id='$id'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    // Display the form with the fetched data for editing
}
