<?php 
    session_start();
    if(empty($_SESSION['username'])) {
            header("location: ../index.php");
    }
    require "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/main.style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"><link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <title>Admin Dashboard - Sistem Informasi Perpustakaan Sekolah</title>
</head>
<body>
   <div class="container-fluid">
      <div class="row flex-nowrap">
         <?php include "../components/sidebar.php" ?>
         <div class="col px-0 w-100">
         <?php include "../components/navatas.php" ?>
         <div class="col-12 px-3 py-4">
                    <div class="row">
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php $selOrder = mysqli_query($konek,"SELECT COUNT(*) AS total FROM `pinjam`");$rowOrder=mysqli_fetch_assoc($selOrder); ?>
                                        <h1><?=$rowOrder['total']?></h1>
                                        <p>Jumlah Total Peminjaman</p>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-12 col-md-3 my-2">
                            <div class="card bg-gradient-ungu text-white">
                            <div class="card-body py-4">
                                    <center>
                                        <h1><span class="las la-plus-circle"></span></h1>
                                        <a href="order.php" class="text-decoration-none text-white">Tambah Peminjaman</a>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php 
                                            $selHasil = mysqli_query($konek,"SELECT COUNT(*) as total FROM buku");
                                            $total = 0;
                                            while($rowHasil = mysqli_fetch_assoc($selHasil)) {
                                                $total += $rowHasil['total'];
                                            }
                                        ?>
                                        <h1><?=$total?></h1>
                                        <p>Jumlah Total Judul Buku</p>
                                    </center>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 my-2">
                            <div class="card bg-gradient-ungu text-white">
                            <div class="card-body py-4">
                                    <center>
                                    <h1><span class="las la-plus-circle"></span></h1>
                                        <a href="order.php" class="text-decoration-none text-white">Tambah Buku</a>
                                    </center>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="pt-3 px-4 mb-3">Tabel Data Buku</h4>
                                    <div class="container-fluid my-3">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center ">
                                                    <thead class="text-white" style="background-color: var(--ungu);">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID Buku</th>
                                                            <th>Judul</th>
                                                            <th>Kategori</th>
                                                            <th>Stok</th>
                                                            <th>Pengarang</th>
                                                            <th>Penerbit</th>
                                                            <th>Tahun</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $selectPinjam = $konek->query("SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori ORDER BY id_buku DESC LIMIT 10");
                                                            $no = 1;
                                                            foreach($selectPinjam as $row) {
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
                                                                </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="pt-3 px-4 mb-3">Laporan Singkat Peminjaman Buku</h4>
                                    <div class="col-12 my-3 px-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead class="text-white" style="background-color: var(--ungu);">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Pinjam</th>
                                                        <th>Nama Peminjam</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Jadwal Kembali</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                        $selectPinjam = $konek->query("SELECT * FROM pinjam INNER JOIN anggota ON pinjam.id_anggota = anggota.id_anggota INNER JOIN buku ON pinjam.id_buku = buku.id_buku ORDER BY id_pinjam DESC  LIMIT 10");
                                                        $no = 1;
                                                        foreach($selectPinjam as $row) {
                                                    ?>  
                                                            <tr>
                                                                <td><?=$no++?></td>
                                                                <td><?=$row['id_pinjam']?></td>
                                                                <td><?=$row['nama']?></td>
                                                                <td><?=$row['judul']?></td>
                                                                <td><?=$row['jumlah']?></td>
                                                                <td><?=$row['tanggal_pinjam']?></td>
                                                                <td><?=$row['jadwal_kembali']?></td>
                                                                <td>
                                                                    <span class="badge bg-<?= ($row['status'] > 0) ? 'danger' : 'success' ?>">
                                                                        <?= ($row['status'] > 0) ? 'DIPINJAM' : 'DIKEMBALIKAN' ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
         </div>
      </div>
   </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

   <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $('#total').text(<?= $total?>);
        });
   </script>
</body>
</html>