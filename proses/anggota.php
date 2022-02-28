<?php 

    require "../config/config.php";
    if(isset($_POST['simpan'])) {
        $simpan = $konek->query("INSERT INTO anggota (nisn,nama,kelas,jk,alamat,no_hp) VALUES ('$_POST[nisn]','$_POST[nama]','$_POST[kelas]','$_POST[jk]','$_POST[alamat]','$_POST[no_hp]')");
        if($simpan) {
            header("Location: ../manager/anggota.php?halaman=1");
        }
    }
    else if(isset($_POST['ubah'])) {
        $simpan = $konek->query("UPDATE anggota SET nisn='$_POST[nisn]', nama='$_POST[nama]', kelas='$_POST[kelas]', jk='$_POST[jk]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]' WHERE id_anggota= $_POST[id_anggota]");
        if($simpan) {
            header("Location: ../manager/anggota.php?halaman=1");
        }
    }
    else if(isset($_GET['d'])) {
        $hapus = $konek->query("DELETE FROM anggota WHERE id_anggota = $_GET[d]");
        if($hapus) {
            header("Location: ../manager/anggota.php?halaman=1");
        }
    }

?>