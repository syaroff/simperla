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
                                    <h4 class="pt-3 px-4 mb-3">Tambah Kategori</h4>
                                    <form action="../proses/kategori.php" method="post">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="kategori">Kategori</label>
                                                    <input type="hidden" name="id_kategori" id="id_kategori" class="form-control">
                                                    <input type="text" name="kategori" id="kategori" class="form-control">
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
                                        <div class="col-12">
                                            <h4 class="pt-3 px-4 float-start">Data Kategori</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 my-3 px-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead class="text-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Kategori</th>
                                                        <th>Nama Kategori</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php require "../proses/readKategori.php" ?>
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
        const edit = (id_kategori,kategori) => {
            $('#id_kategori').val(id_kategori);
            $('#kategori').val(kategori);
        }
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            query = $('#search').val();
            window.location.href= "anggota.php?s=" + query + "&halaman=1";
        }); 
   </script>
</body>
</html>