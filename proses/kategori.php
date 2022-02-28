<?php 

    require "../config/config.php";
    if(isset($_POST['simpan'])) {
        $simpan = $konek->query("INSERT INTO kategori (kategori) VALUES ('$_POST[kategori]')");
        if($simpan) {
            header("Location: ../manager/kategori.php?halaman=1");
        }
    }
    else if(isset($_POST['ubah'])) {
        $ubah = $konek->query("UPDATE kategori SET kategori='$_POST[kategori]' WHERE id_kategori= $_POST[id_kategori]");
        if($ubah) {
            header("Location: ../manager/kategori.php?halaman=1");
        }
    }
    else if(isset($_GET['d'])) {
        $hapus = $konek->query("DELETE FROM kategori WHERE id_kategori= $_GET[d]");
        if($hapus) {
            header("Location: ../manager/kategori.php?halaman=1");
        }
    }

?>