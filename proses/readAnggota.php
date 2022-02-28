<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM anggota");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    
    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM anggota ORDER BY nama ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_anggota']?></td>
                <td><?=$row['nisn']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['kelas']?></td>
                <td><?php echo ($row['jk'] > 1) ? 'Perempuan' : 'Laki Laki' ?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['no_hp']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_anggota']?>','<?=$row['nisn']?>','<?=$row['nama']?>','<?=$row['kelas']?>','<?=$row['jk']?>','<?=$row['alamat']?>','<?=$row['no_hp']?>')" class="btn btn-warning mr-1 mb-1 mb-lg-0"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/anggota.php?d=<?=$row['id_anggota'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM anggota WHERE id_anggota LIKE '%$_GET[s]%' OR nama LIKE '%$_GET[s]%' OR  kelas LIKE '%$_GET[s]%' OR alamat LIKE '%$_GET[s]%' OR no_hp LIKE '%$_GET[s]%' ORDER BY nama ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_anggota']?></td>
                <td><?=$row['nisn']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['kelas']?></td>
                <td><?php echo ($row['jk'] > 1) ? 'Perempuan' : 'Laki Laki' ?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['no_hp']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_anggota']?>','<?=$row['nisn']?>','<?=$row['nama']?>','<?=$row['kelas']?>','<?=$row['jk']?>','<?=$row['alamat']?>','<?=$row['no_hp']?>')" class="btn btn-warning mr-1 mb-1 mb-lg-0"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/anggota.php?d=<?=$row['id_anggota'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>