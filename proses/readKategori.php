<?php 

    require "../config/config.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM kategori");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    
    if(!isset($_GET['s'])) {
        $data2 = mysqli_query($konek,"SELECT * FROM kategori ORDER BY kategori ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>  
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_kategori']?></td>
                <td><?=$row['kategori']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_kategori']?>','<?=$row['kategori']?>')" class="btn btn-warning mr-1 mb-1 mb-lg-0"><i class="las la-edit fs-5"></i></button>
                    <a href="../proses/kategori.php?d=<?=$row['id_kategori'] ?>" class="btn btn-danger"><i class="las la-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>