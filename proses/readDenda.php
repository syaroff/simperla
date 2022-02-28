<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM denda");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    $total = 0;

    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM denda ORDER BY tanggal DESC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
            $total += $row['total_denda'];
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_denda']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['total_denda']?></td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM denda WHERE id_kembali LIKE '%$_GET[s]%' OR tanggal LIKE '%$_GET[s]%' OR total_denda LIKE '%$_GET[s]%' ORDER BY tanggal DESC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
            $total += $row['total_denda'];
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_denda']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['total_denda']?></td>
            </tr>
<?php
        }
    }

?>