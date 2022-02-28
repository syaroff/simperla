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
                                    <h4 class="pt-3 px-4 mb-3">Tambah Pinjaman</h4>
                                    <form action="../proses/pinjam.php" method="post">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="id_anggota" class="mb-2">ID Anggota</label>
                                                    <input type="hidden" name="id_pinjam" id="id_pinjam" class="form-control">
                                                    <input type="number" name="id_anggota" id="id_anggota" placeholder="Ex : 12" class="form-control" required>
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="id_buku" class="mb-2">ID Buku</label>
                                                    <input type="number" name="id_buku" id="id_buku" placeholder="Ex : 123" class="form-control" required>
                                                </div>
                                                <div class="col-12 col-lg-4 mb-3">
                                                    <label for="jumlah" class="mb-2">Jumlah</label>
                                                    <input type="number" name="jumlah" id="jumlah" placeholder="Banyak buku yang dipinjam" class="form-control">
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3">
                                                    <label for="tanggal_pinjam" class="mb-2">Tanggal Pinjam</label>
                                                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"  class="form-control" required>
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3">
                                                    <label for="jadwal_kembali" class="mb-2">Jadwal Kembali</label>
                                                    <input type="date" name="jadwal_kembali" id="jadwal_kembali"  class="form-control" required>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-3">
                                                    <p class="text-muted">Note : Jika anggota masih ada dalam tabel peminjaman,anggota tidak bisa meminjam buku meskipun status peminjaman sudah selesai.</p>
                                                </div>
                                                <div class="col-12 mb-2">
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
                                                        <th>ID Anggota</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Jadwal Kembali</th>
                                                        <th>Status</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php require "../proses/readPinjam.php" ?>
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
   <div class="modal fade" id="modalKembali" tabindex="-1" aria-labelledby="modalKembali" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kembalikan Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/pinjam.php" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="jmlh">Jumlah</label>
                                <input type="number" name="jmlh" id="jmlh" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="hidden" name="idPinjam" id="idPinjam" class="form-control">
                                <input type="hidden" name="idAnggota" id="idAnggota" class="form-control">
                                <input type="hidden" name="idBuku" id="idBuku" class="form-control">
                                <label for="tgl_pinjam" class="mb-2" >Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="jdwl_kembali" class="mb-2" >Jadwal Kembali</label>
                                <input type="date" name="jdwl_kembali" id="jdwl_kembali" class="form-control" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="denda" class="mb-2" >Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control" value="0" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="kembalikan" class="btn btn-primary">Kembalikan</button>
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
        const edit = (id_pinjam,id_anggota,id_buku,jumlah,tgl_pinjam,jdwl_kembali) => {
            $('#id_pinjam').val(id_pinjam);
            $('#id_anggota').val(id_anggota);
            $('#id_buku').val(id_buku);
            $('#jumlah').val(jumlah);
            $('#tanggal_pinjam').val(tgl_pinjam);
            $('#jadwal_kembali').val(jdwl_kembali);
            $.ajax({
                type: "GET",
                url: "../proses/pinjam.php?stok=" + id_buku + "&jumlah=" + jumlah
            });
            
        }
        const kembali = (idPinjam,id_anggota,id_buku,jumlah,tgl_pinjam,jdwl_kembali) => {
            $('#idPinjam').val(idPinjam);
            $('#idAnggota').val(id_anggota);
            $('#idBuku').val(id_buku);
            $('#jmlh').val(jumlah);
            $('#tgl_pinjam').val(tgl_pinjam);
            $('#jdwl_kembali').val(jdwl_kembali);
            $('#modalKembali').modal('show');
            
        }
        $('.btn-edit').on('click', function () {
            $(this).parent().parent().parent().find('.btn-edit-clicked').removeAttr("disabled")
            $(this).parent().parent().parent().find('.btn-edit-clicked').removeClass("btn-edit-clicked");
            $(this).addClass("btn-edit-clicked");
            $(this).attr('disabled','');
        });
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            query = $('#search').val();
            window.location.href= "pinjam.php?s=" + query + "&halaman=1";
        }); 
   </script>
</body>
</html>