<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM kembali");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    
    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM kembali INNER JOIN anggota ON kembali.id_anggota = anggota.id_anggota INNER JOIN buku ON kembali.id_buku = buku.id_buku ORDER BY id_kembali DESC  LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_kembali']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['tanggal_pinjam']?></td>
                <td><?=$row['jadwal_kembali']?></td>
                <td><?=$row['tanggal_kembali']?></td>
                <td><?=$row['denda']?></td>
                <td>
                    <button id="btn-edit" onclick="edit('<?=$row['id_kembali']?>','<?=$row['denda']?>')" class="btn btn-edit btn-warning mr-1 mb-1 mb-lg-1"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/kembali.php?d=<?=$row['id_kembali'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM kembali INNER JOIN anggota ON kembali.id_anggota = anggota.id_anggota INNER JOIN buku ON kembali.id_buku = buku.id_buku WHERE id_kembali LIKE '%$_GET[s]%' OR nama LIKE '%$_GET[s]%' OR  judul LIKE '%$_GET[s]%' OR tanggal_pinjam LIKE '%$_GET[s]%' OR tanggal_kembali LIKE '%$_GET[s]%' OR no_hp LIKE '%$_GET[s]%' ORDER BY id_kembali DESC  LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_kembali']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['tanggal_pinjam']?></td>
                <td><?=$row['jadwal_kembali']?></td>
                <td><?=$row['tanggal_kembali']?></td>
                <td><?=$row['denda']?></td>
                <td>
                    <button id="btn-edit" onclick="edit('<?=$row['id_kembali']?>','<?=$row['denda']?>')" class="btn btn-edit btn-warning mr-1 mb-1 mb-lg-1"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/kembali.php?d=<?=$row['id_kembali'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>