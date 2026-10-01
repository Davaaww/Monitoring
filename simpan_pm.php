<?php
// koneksi db
$host = "localhost";
$user = "root"; 
$pass = "1234"; 
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // data identitas & p1-p17
    $kode_informan = mysqli_real_escape_string($koneksi, $_POST['kode_informan']);
    $lembaga       = mysqli_real_escape_string($koneksi, $_POST['lembaga']);
    $layanan       = mysqli_real_escape_string($koneksi, $_POST['layanan']);
    $lama          = mysqli_real_escape_string($koneksi, $_POST['lama']);
    $status_pm     = mysqli_real_escape_string($koneksi, $_POST['status_pm']);
    $duk_komunikasi = mysqli_real_escape_string($koneksi, $_POST['dukungan_komunikasi']);
    
    $p1 = mysqli_real_escape_string($koneksi, $_POST['p1']); $p2 = mysqli_real_escape_string($koneksi, $_POST['p2']);
    $p3 = mysqli_real_escape_string($koneksi, $_POST['p3']); $p4 = mysqli_real_escape_string($koneksi, $_POST['p4']);
    $p5 = mysqli_real_escape_string($koneksi, $_POST['p5']); $p6 = mysqli_real_escape_string($koneksi, $_POST['p6']);
    $p7 = mysqli_real_escape_string($koneksi, $_POST['p7']); $p8 = mysqli_real_escape_string($koneksi, $_POST['p8']);
    $p9 = mysqli_real_escape_string($koneksi, $_POST['p9']); $p10 = mysqli_real_escape_string($koneksi, $_POST['p10']);
    $p11 = mysqli_real_escape_string($koneksi, $_POST['p11']); $p12 = mysqli_real_escape_string($koneksi, $_POST['p12']);
    $p13 = mysqli_real_escape_string($koneksi, $_POST['p13']); $p14 = mysqli_real_escape_string($koneksi, $_POST['p14']);
    $p15 = mysqli_real_escape_string($koneksi, $_POST['p15']); $p16 = mysqli_real_escape_string($koneksi, $_POST['p16']);
    $p17 = mysqli_real_escape_string($koneksi, $_POST['p17']);

    // insert induk
    $query_induk = "INSERT INTO form_wawancara_pm 
                   (kode_informan, lembaga, layanan, lama, status_pm, dukungan_komunikasi, 
                    p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17) 
                   VALUES 
                   ('$kode_informan', '$lembaga', '$layanan', '$lama', '$status_pm', '$duk_komunikasi', 
                    '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9', '$p10', '$p11', '$p12', '$p13', '$p14', '$p15', '$p16', '$p17')";

    if (mysqli_query($koneksi, $query_induk)) {
        $id_wawancara = mysqli_insert_id($koneksi);

        // insert anak (ringkasan)
        if (isset($_POST['perubahan'])) {
            $jumlah_baris = count($_POST['perubahan']);
            for ($i = 0; $i < $jumlah_baris; $i++) {
                if (!empty(trim($_POST['perubahan'][$i]))) {
                    $perubahan  = mysqli_real_escape_string($koneksi, $_POST['perubahan'][$i]);
                    $hambatan   = mysqli_real_escape_string($koneksi, $_POST['hambatan'][$i]);
                    $pengalaman = mysqli_real_escape_string($koneksi, $_POST['pengalaman'][$i]);
                    $kesiapan   = mysqli_real_escape_string($koneksi, $_POST['kesiapan'][$i]);
                    $perbaikan  = mysqli_real_escape_string($koneksi, $_POST['perbaikan'][$i]);

                    $query_anak = "INSERT INTO pm_ringkasan (id_wawancara, perubahan, hambatan, pengalaman, kesiapan, perbaikan) 
                                   VALUES ('$id_wawancara', '$perubahan', '$hambatan', '$pengalaman', '$kesiapan', '$perbaikan')";
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