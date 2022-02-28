<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM buku");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    
    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori ORDER BY judul ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr> 
                <td><?=$no++?></td>
                <td><?=$row['id_buku']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['kategori']?></td>
                <td><?=$row['stok']?></td>
                <td><?=$row['penulis']?></td>
                <td><?=$row['penerbit']?></td>
                <td><?=$row['tahun']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_buku']?>','<?=$row['judul']?>','<?=$row['id_kategori']?>','<?=$row['stok']?>','<?=$row['penulis']?>','<?=$row['penerbit']?>','<?=$row['tahun']?>')" class="btn btn-warning mr-1 mb-1 mb-lg-0"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/buku.php?d=<?=$row['id_buku'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku LIKE '%$_GET[s]%' OR judul LIKE '%$_GET[s]%' OR kategori LIKE '%$_GET[s]%' OR penulis LIKE '%$_GET[s]%' OR penerbit LIKE '%$_GET[s]%' OR tahun LIKE '%$_GET[s]%' ORDER BY judul ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_buku']?></td>
                <td><?=$row['judul']?></td>
                <td><?=$row['kategori']?></td>
                <td><?=$row['stok']?></td>
                <td><?=$row['penulis']?></td>
                <td><?=$row['penerbit']?></td>
                <td><?=$row['tahun']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_buku']?>','<?=$row['judul']?>','<?=$row['id_kategori']?>','<?=$row['stok']?>','<?=$row['penulis']?>','<?=$row['penerbit']?>','<?=$row['tahun']?>')" class="btn btn-warning mr-1 mb-1 mb-lg-0"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/buku.php?d=<?=$row['id_buku'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>