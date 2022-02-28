<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/main.style.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"><link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <title>Selamat Datang di SIMPERLA - Sistem Informasi Perpustakaan Sekolah</title>
</head>
<body>
    <div class="container-fluid bg-gradient-ungu">
        <div class="row align-items-center" style="min-height: 100vh;">
            
            <div class="col-md-6 col-lg-6 col-xl-3 col-11 mx-auto mt-0">
                <div class="col-12 text-white text-center mb-0">
                    <h4 style="letter-spacing: .1em;">SIMPERLA</h4>
                    <p>Sistem Informasi Perpustakaan Sekolah</p>
                </div>
                <div class="card">
                    <div class="card-body py-5">
                        <h3 class="fw-bold text-center">Sign In</h3>
                        <p class="text-center fs-6 text-muted">Anda harus login terlebih dahulu</p>
                        <form action="./proses/login.php" method="post" class="px-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="las la-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="las la-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="pasword" id="pasword" required>
                            </div>
                            <input type="submit" name="signin" value="Sign In" class="btn btn-primary bg-gradient-ungu w-100" style="box-shadow: none;border:none;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>