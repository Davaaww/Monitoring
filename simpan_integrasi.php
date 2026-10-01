<?php
// koneksi db
$host = "localhost";
$user = "root"; 
$pass = "1234"; 
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // insert induk
    $query_induk = "INSERT INTO form_integrasi () VALUES ()"; 
    
    if (mysqli_query($koneksi, $query_induk)) {
        $id_integrasi = mysqli_insert_id($koneksi);

        // insert anak (11 indikator)
        if (isset($_POST['indikator'])) {
            $jumlah_baris = count($_POST['indikator']);
            for ($i = 0; $i < $jumlah_baris; $i++) {
                $indikator    = mysqli_real_escape_string($koneksi, $_POST['indikator'][$i]);
                $quan         = mysqli_real_escape_string($koneksi, $_POST['quan'][$i]);
                $sumber_qual  = mysqli_real_escape_string($koneksi, $_POST['sumber_qual'][$i]);
                $temuan_qual  = mysqli_real_escape_string($koneksi, $_POST['temuan_qual'][$i]);
                $hubungan     = mysqli_real_escape_string($koneksi, $_POST['hubungan'][$i]);
                $interpretasi = mysqli_real_escape_string($koneksi, $_POST['interpretasi'][$i]);
                $implikasi    = mysqli_real_escape_string($koneksi, $_POST['implikasi'][$i]);

                if (!empty(trim($quan)) || !empty(trim($temuan_qual))) {
                    $query_anak = "INSERT INTO integrasi_detail 
                                   (id_integrasi, indikator, quan, sumber_qual, temuan_qual, hubungan, interpretasi, implikasi) 
                                   VALUES 
                                   ('$id_integrasi', '$indikator', '$quan', '$sumber_qual', '$temuan_qual', '$hubungan', '$interpretasi', '$implikasi')";
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