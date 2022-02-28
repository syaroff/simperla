<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM pinjam");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    
    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM pinjam INNER JOIN anggota ON pinjam.id_anggota = anggota.id_anggota INNER JOIN buku ON pinjam.id_buku = buku.id_buku ORDER BY id_pinjam DESC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_pinjam']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['tanggal_pinjam']?></td>
                <td><?=$row['jadwal_kembali']?></td>
                <td>
                    <span class="badge bg-<?= ($row['status'] > 0) ? 'danger' : 'success' ?>">
                        <?= ($row['status'] > 0) ? 'DIPINJAM' : 'DIKEMBALIKAN' ?>
                    </span>
                </td>
                <td>
                    <button onclick="kembali('<?=$row['id_pinjam']?>','<?=$row['id_anggota']?>','<?=$row['id_buku']?>','<?=$row['jumlah']?>','<?=$row['tanggal_pinjam']?>','<?=$row['jadwal_kembali']?>')" class="btn btn-success mr-1 mb-1 mb-md-1"><i class="las la-check-circle fs-5"></i></button>
                    <button id="btn-edit" onclick="edit('<?=$row['id_pinjam']?>','<?=$row['id_anggota']?>','<?=$row['id_buku']?>','<?=$row['jumlah']?>','<?=$row['tanggal_pinjam']?>','<?=$row['jadwal_kembali']?>')" class="btn btn-edit btn-warning mr-1 mb-1 mb-lg-1"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/pinjam.php?d=<?=$row['id_pinjam'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM pinjam INNER JOIN anggota ON pinjam.id_anggota = anggota.id_anggota INNER JOIN buku ON pinjam.id_buku = buku.id_buku WHERE id_pinjam LIKE '%$_GET[s]%' OR nama LIKE '%$_GET[s]%' OR  judul LIKE '%$_GET[s]%' OR tanggal_pinjam LIKE '%$_GET[s]%' OR no_hp LIKE '%$_GET[s]%' ORDER BY id_pinjam DESC  LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_pinjam']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['tanggal_pinjam']?></td>
                <td><?=$row['jadwal_kembali']?></td>
                <td>
                    <span class="badge bg-<?= ($row['status'] > 0) ? 'danger' : 'success' ?>">
                        <?= ($row['status'] > 0) ? 'DIPINJAM' : 'DIKEMBALIKAN' ?>
                    </span>
                </td>
                <td>
                    <button onclick="kembali('<?=$row['id_pinjam']?>','<?=$row['id_anggota']?>','<?=$row['id_buku']?>','<?=$row['jumlah']?>','<?=$row['tanggal_pinjam']?>','<?=$row['jadwal_kembali']?>')" class="btn btn-success mr-1 mb-1 mb-md-1"><i class="las la-check-circle fs-5"></i></button>
                    <button id="btn-edit" onclick="edit('<?=$row['id_pinjam']?>','<?=$row['id_anggota']?>','<?=$row['id_buku']?>','<?=$row['jumlah']?>','<?=$row['tanggal_pinjam']?>','<?=$row['jadwal_kembali']?>')" class="btn btn-edit btn-warning mr-1 mb-1 mb-lg-1"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/pinjam.php?d=<?=$row['id_pinjam'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>