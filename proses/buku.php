<?php 

    require "../config/config.php";
    if(isset($_POST['simpan'])) {
        $simpan = $konek->query("INSERT INTO buku (judul,id_kategori,stok,penulis,penerbit,tahun) VALUES ('$_POST[judul]','$_POST[kategori]','$_POST[stok]','$_POST[penulis]','$_POST[penerbit]','$_POST[tahun]')");
        if($simpan) {
            header("Location: ../manager/buku.php?halaman=1");
        }
    }
    else if(isset($_POST['ubah'])) {
        $ubah = $konek->query("UPDATE buku SET judul='$_POST[judul]', id_kategori='$_POST[kategori]', stok='$_POST[stok]', penulis='$_POST[penulis]', penerbit='$_POST[penerbit]', tahun='$_POST[tahun]' WHERE id_buku= $_POST[id_buku]");
        if($ubah) {
            header("Location: ../manager/buku.php?halaman=1");
        }
    }
    else if(isset($_GET['d'])) {
        $hapus = $konek->query("DELETE FROM buku WHERE id_buku = $_GET[d]");
        echo "DELETE FROM buku WHERE id_buku = $_GET[d]";
        if($hapus) {
            header("Location: ../manager/buku.php?halaman=1");
        }
    }

?>