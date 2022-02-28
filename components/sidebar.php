<!-- Sidebar  -->
<nav id="sidebar">
            <h3 class="p-3 mb-0">Admin Panel</h3>

            <ul class="list-unstyled components mt-0 pt-0">
                <p class="text-center fs-5 sidebar-header p-2"> <?php echo $_SESSION['username'] ?></p>
                <li>
                    <a href="index.php" class="text-decoration-none fs-6 text-white"><i class="las la-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="anggota.php?halaman=1" class="text-decoration-none fs-6 text-white"><i class="las la-user"></i> Anggota</a>
                </li>
                <li>
                    <a href="#produkBuku" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-decoration-none fs-6 text-white "><i class="las la-book-open"></i> Buku</a>
                    <ul class="collapse list-unstyled" id="produkBuku">
                        <li>
                            <a href="kategori.php?halaman=1" class="text-decoration-none text-white">Data Kategori</a>
                        </li>
                        <li>
                            <a href="buku.php?halaman=1" class="text-decoration-none text-white">Data Buku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#transaksi" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-decoration-none fs-6 text-white "><i class="las la-edit"></i> Transaksi</a>
                    <ul class="collapse list-unstyled" id="transaksi">
                        <li>
                            <a href="pinjam.php?halaman=1" class="text-decoration-none text-white">Peminjaman</a>
                        </li>
                        <li>
                            <a href="kembali.php?halaman=1" class="text-decoration-none text-white">Pengembalian</a>
                        </li>
                        <li>
                            <a href="denda.php?halaman=1" class="text-decoration-none text-white">Denda</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../proses/logout.php" class="download text-decoration-none">Sign Out</a>
                </li>
            </ul>
        </nav>
