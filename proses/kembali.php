<?php 

    require "../config/config.php";
    if(isset($_POST['ubah'])) {
        // Ubah denda di tabel kembali
        $ubah = $konek->query("UPDATE kembali SET denda = '$_POST[denda]' WHERE id_kembali = '$_POST[id_kembali]'");

        // Ubah denda di tabel Denda
        $ubahDenda = $konek->query("UPDATE denda SET total_denda =  '$_POST[denda]' WHERE id_kembali = '$_POST[id_kembali]' ");
        if($ubah) {
            header("Location: ../manager/kembali.php?halaman=1");
        }
    }
    else if(isset($_GET['d'])) {
        $hapus = $konek->query("DELETE FROM kembali WHERE id_kembali = $_GET[d]");
        if($hapus) {
            header("Location: ../manager/kembali.php?halaman=1");
        }
    }

?>