<?php
include 'koneksi.php';

$id = $_GET['id'];

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $sql = "DELETE FROM tabel_pemesanan WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    exit;
}
?>

<script>
    if (confirm("Apakah anda ingin menghapus pesanan?")) {
        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>&confirm=yes";
    } else {
        window.location.href = "index.php";
    }
</script>