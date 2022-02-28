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
                        <div class="col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="pt-3 px-4 mb-3">Tambah Buku</h4>
                                    <form action="../proses/buku.php" method="post">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="judul">Judul</label>
                                                    <input type="hidden" name="id_buku" id="id_buku" class="form-control">
                                                    <input type="text" name="judul" id="judul" class="form-control">
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="kategori">Kategori</label>
                                                    <select name="kategori" id="kategori" class="form-control">
                                                        <option value="0" selected disabled>Pilih Kategori</option>
                                                        <?php 

                                                            $data = $konek->query("SELECT * FROM kategori ORDER BY kategori ASC");
                                                            foreach($data as $row) {
                                                        ?>
                                                                <option value="<?=$row['id_kategori']?>"><?=$row['kategori']?></option>
                                                        <?php
                                                            }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="stok">Stok</label>
                                                    <input type="number" name="stok" id="stok" class="form-control">
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="penulis">Penulis</label>
                                                    <input type="text" name="penulis" id="penulis" class="form-control">
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="penerbit">Penerbit</label>
                                                    <input type="text" name="penerbit" id="penerbit" class="form-control">
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="tahun">Tahun</label>
                                                    <input type="number" name="tahun" id="tahun" class="form-control">
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-ungu text-white px-3">
                                                    <input type="submit" name="ubah" value="Ubah" class="btn btn-warning px-3">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="pt-3 px-4 float-start">Data Buku</h4>
                                        </div>
                                        <div class="col-4 pt-2">
                                            <div class="container">
                                                <div class="input-group">
                                                    <button id="btn-search" class="input-group-text"><i class="las la-search"></i></button>
                                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 my-3 px-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead class="text-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Buku</th>
                                                        <th>Judul</th>
                                                        <th>Kategori</th>
                                                        <th>Stok</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php require "../proses/readBuku.php" ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                        <?php 
                                        for($x=1;$x<=$total_halaman;$x++){
                                            ?> 
                                            <li class="page-item mx-1 <?php echo ($_GET['halaman'] == $x) ? 'active' : 'not' ?>"><a class="page-link rounded-circle" href="?halaman=<?= $x ?>"><?php echo $x; ?></a></li>
                                            <?php
                                        }
                                        ?>				
                                        </ul>
                                    </nav>
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
           
        });
        const edit = (id_buku,judul,id_kategori,stok,penulis,penerbit,tahun) => {
            $('#id_buku').val(id_buku);
            $('#kategori').val(id_kategori);
            $('#judul').val(judul);
            $('#stok').val(stok);
            $('#penulis').val(penulis);
            $('#penerbit').val(penerbit);
            $('#tahun').val(tahun);
        }
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            query = $('#search').val();
            window.location.href= "buku.php?s=" + query + "&halaman=1";
        }); 
   </script>
</body>
</html>