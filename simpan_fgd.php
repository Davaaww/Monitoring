<?php
// koneksi db
$host = "localhost";
$user = "root"; 
$pass = "1234"; 
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // data identitas & t1-t11
    $tanggal        = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $fasilitator    = mysqli_real_escape_string($koneksi, $_POST['fasilitator']);
    $notulis        = mysqli_real_escape_string($koneksi, $_POST['notulis']);
    $jumlah_peserta = mysqli_real_escape_string($koneksi, $_POST['jumlah_peserta']);
    
    $t1 = mysqli_real_escape_string($koneksi, $_POST['t1']); $t2 = mysqli_real_escape_string($koneksi, $_POST['t2']);
    $t3 = mysqli_real_escape_string($koneksi, $_POST['t3']); $t4 = mysqli_real_escape_string($koneksi, $_POST['t4']);
    $t5 = mysqli_real_escape_string($koneksi, $_POST['t5']); $t6 = mysqli_real_escape_string($koneksi, $_POST['t6']);
    $t7 = mysqli_real_escape_string($koneksi, $_POST['t7']); $t8 = mysqli_real_escape_string($koneksi, $_POST['t8']);
    $t9 = mysqli_real_escape_string($koneksi, $_POST['t9']); $t10 = mysqli_real_escape_string($koneksi, $_POST['t10']);
    $t11 = mysqli_real_escape_string($koneksi, $_POST['t11']);

    // insert induk
    $query_induk = "INSERT INTO form_fgd 
                   (tanggal, fasilitator, notulis, jumlah_peserta, t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11) 
                   VALUES 
                   ('$tanggal', '$fasilitator', '$notulis', '$jumlah_peserta', '$t1', '$t2', '$t3', '$t4', '$t5', '$t6', '$t7', '$t8', '$t9', '$t10', '$t11')";

    if (mysqli_query($koneksi, $query_induk)) {
        $id_fgd = mysqli_insert_id($koneksi);

        // insert anak (matriks)
        if (isset($_POST['masalah'])) {
            $jumlah_baris = count($_POST['masalah']);
            for ($i = 0; $i < $jumlah_baris; $i++) {
                if (!empty(trim($_POST['masalah'][$i]))) {
                    $masalah   = mysqli_real_escape_string($koneksi, $_POST['masalah'][$i]);
                    $penyebab  = mysqli_real_escape_string($koneksi, $_POST['penyebab'][$i]);
                    $dampak    = mysqli_real_escape_string($koneksi, $_POST['dampak'][$i]);
                    $praktik   = mysqli_real_escape_string($koneksi, $_POST['praktik'][$i]);
                    $usulan    = mysqli_real_escape_string($koneksi, $_POST['usulan'][$i]);
                    $pj        = mysqli_real_escape_string($koneksi, $_POST['pj'][$i]);
                    $prioritas = mysqli_real_escape_string($koneksi, $_POST['prioritas'][$i]);

                    $query_anak = "INSERT INTO fgd_matriks (id_fgd, masalah, penyebab, dampak, praktik, usulan, pj, prioritas) 
                                   VALUES ('$id_fgd', '$masalah', '$penyebab', '$dampak', '$praktik', '$usulan', '$pj', '$prioritas')";
                    mysqli_query($koneksi, $query_anak);
                }
            }
        }
        echo "<script>alert('Data disimpan!'); window.location.href = 'kualitatif.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);
?>