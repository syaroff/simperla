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
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="pt-3 px-4 float-start">Data Peminjaman</h4>
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
                                                        <th>ID Kembali</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Jadwal Kembali</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Denda</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php require "../proses/readKembali.php" ?>
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
   <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalKembali" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Denda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/kembali.php" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="denda" class="mb-2" >Denda</label>
                                <input type="hidden" name="id_kembali" id="id_kembali">
                                <input type="number" name="denda" id="denda" class="form-control" value="0" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </form>
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
        const edit = (id_kembali,denda) => {
            $('#id_kembali').val(id_kembali);
            $('#denda').val(denda);
            $('#modalEdit').modal('show');
            
        }
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            query = $('#search').val();
            window.location.href= "kembali.php?s=" + query + "&halaman=1";
        }); 
   </script>
</body>
</html>