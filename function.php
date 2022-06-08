<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "aplikasi_kita");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;
    $kode_unik = htmlspecialchars($data['kode_unik']);
    $nama_owner = htmlspecialchars($data['nama_owner']);
    $nama_device = htmlspecialchars($data['nama_device']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $tanggal_in = $data['tanggal_in'];
    $status = $data['status'];

//    $sql = "INSERT INTO tb_data VALUES ('$kode_unik','$nama_owner','$nama_device','$keterangan','$tanggal_in','$status'";
    $esqiel = "INSERT INTO `tb_data` (`no`, `kode_unik`, `nama_owner`, `nama_device`, `keterangan`, `tanggal_in`, `status`) VALUES (NULL, '$kode_unik', '$nama_owner', '$nama_device', '$keterangan', '$tanggal_in', '$status');";

    mysqli_query($koneksi, $esqiel);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($no)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM tb_data WHERE no = $no");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data,$no)
{
    global $koneksi;

    $kode_unik = htmlspecialchars($data['kode_unik']);
    $nama_owner = htmlspecialchars($data['nama_owner']);
    $nama_device = htmlspecialchars($data['nama_device']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $tanggal_in = $data['tanggal_in'];
    $status = $data['status'];

    // UPDATE `tb_data` SET `status` = 'sedang diservice' WHERE `tb_data`.`no` = 1;

    $esqiel = "UPDATE `tb_data` SET `status` = '$status' WHERE `tb_data`.`no` = $no;";

    mysqli_query($koneksi, $esqiel);

    return mysqli_affected_rows($koneksi);
}