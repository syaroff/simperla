<?php 

    require "../config/config.php";

    if(isset($_POST['simpan'])) {
        $simpan = $konek->query("INSERT INTO pinjam (id_anggota,id_buku,jumlah,tanggal_pinjam,jadwal_kembali,`status`) VALUES ('$_POST[id_anggota]','$_POST[id_buku]','$_POST[jumlah]','$_POST[tanggal_pinjam]','$_POST[jadwal_kembali]','1')");

        $data = $konek->query("SELECT stok FROM buku WHERE id_buku='$_POST[id_buku]'");
        foreach($data as $row) { $stok = $row['stok'] - $_POST['jumlah']; }

        $updateBuku = $konek->query("UPDATE buku SET stok='$stok' WHERE id_buku = '$_POST[id_buku]'");

        if($simpan) {
            header("Location: ../manager/pinjam.php?halaman=1");
        }
    }
    else if(isset($_POST['ubah'])) {
        $simpan = $konek->query("UPDATE pinjam SET id_anggota='$_POST[id_anggota]',id_buku='$_POST[id_buku]',jumlah='$_POST[jumlah]',tanggal_pinjam='$_POST[tanggal_pinjam]',jadwal_kembali='$_POST[jadwal_kembali]' WHERE id_pinjam = $_POST[id_pinjam] ");

        $data = $konek->query("SELECT stok FROM buku WHERE id_buku='$_POST[id_buku]'");
        foreach($data as $row) { $stok = $row['stok'] - $_POST['jumlah']; }

        $updateBuku = $konek->query("UPDATE buku SET stok='$stok' WHERE id_buku = '$_POST[id_buku]'");

        if($simpan) {
            header("Location: ../manager/pinjam.php?halaman=1");
        }
    }
    else if(isset($_GET['stok'])) {

        $data = $konek->query("SELECT stok FROM buku WHERE id_buku='$_GET[stok]'");
        foreach($data as $row) { $stok = $row['stok'] + $_GET['jumlah']; }

        $updateBuku = $konek->query("UPDATE buku SET stok='$stok' WHERE id_buku = '$_GET[stok]'");

    }
    else if(isset($_POST['kembalikan'])) {
        $date = date("Y-m-d");
        // Insert tabel kembali
        $insertKembali = $konek->query("INSERT INTO kembali (id_anggota,id_buku,jumlah,tanggal_pinjam,jadwal_kembali,tanggal_kembali,denda) VALUES ('$_POST[idAnggota]','$_POST[idBuku]','$_POST[jmlh]','$_POST[tgl_pinjam]','$_POST[jdwl_kembali]','$date','$_POST[denda]')");

        // Ambil data id_kembali
        $data = $konek->query("SELECT id_kembali FROM kembali ORDER BY id_kembali DESC LIMIT 1");
        foreach($data as $row) { $id_kembali = $row['id_kembali']; }

        // Insert Tabel Denda
        $insertDenda = $konek->query("INSERT INTO denda (id_kembali,tanggal,total_denda) VALUES ('$id_kembali','$date','$_POST[denda]')");

        // Ambil data Buku
        $data = $konek->query("SELECT stok FROM buku WHERE id_buku='$_POST[idBuku]'");
        foreach($data as $row) { $stok = $row['stok'] + $_POST['jmlh']; }

        // Update Buku
        $upBuku = $konek->query("UPDATE buku SET stok = '$stok' WHERE id_buku = '$_POST[idBuku]'");

        // update status pinjam
        $upPinjam = $konek->query("UPDATE pinjam SET `status` = 0 WHERE id_pinjam = $_POST[idPinjam]");
        if($insertKembali) {
            header("Location: ../manager/pinjam.php?halaman=1");
        }

    }
?>