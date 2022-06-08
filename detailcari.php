<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataPelanggan diklik maka
if (isset($_POST['tombolCari'])) {
    $output = '';
    // mengambil data pelanggan dari nis yang berasal dari dataPelanggan
    $sql = "SELECT * FROM tb_data WHERE kode_unik = '" . $_POST['kode_unik'] . "'";
    $result = mysqli_query($koneksi, $sql);
    $res = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);
    if ($total == 0){
        echo "<script>alert('kode unik tidak ditemukan :( ');window.location.href='index.php'</script>";
    }

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                        <div class="col-md">
                            <h3 class="text-center fw-bold text-uppercase">Hasil Pencarian</h3>
                            <hr>
                        </div>
                        <tr>
                            <th width="40%">Kode Unik</th>
                            <td width="60%">' . $row['kode_unik'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Owner</th>
                            <td width="60%">' . $row['nama_owner'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Device</th>
                            <td width="60%">' . $row['nama_device'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Keterangan</th>
                            <td width="60%">' . $row['keterangan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal Masuk</th>
                            <td width="60%">' . $row['tanggal_in'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Status</th>
                            <td width="60%">' . $row['status'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';

} else {
    echo "<script>alert('kode unik tidak ditemukan :( ');window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Aplikasi Service Komputer</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">Aplikasi Service Komputer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container mx-auto">
        <div class="row mt-5 mb-5">
            <div class="col-md pt-5 pb-5">
                <div class="text-center pt-5 pb-5">
                    <?php echo $output ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <footer class="bg-primary text-white text-center" style="padding: 5px;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: red;"></i> by <u style="color: #fff;">Athala Naufal Pratama</u></p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>