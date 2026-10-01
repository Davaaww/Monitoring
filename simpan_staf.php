<?php
// koneksi db
$host = "localhost";
$user = "root"; 
$pass = "1234"; 
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // data identitas & s1-s18
    $kode_informan = mysqli_real_escape_string($koneksi, $_POST['kode_informan']);
    $lembaga       = mysqli_real_escape_string($koneksi, $_POST['lembaga']);
    $jabatan       = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $lama_bekerja  = mysqli_real_escape_string($koneksi, $_POST['lama_bekerja']);
    $waktu         = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $pewawancara   = mysqli_real_escape_string($koneksi, $_POST['pewawancara']);
    
    $s1 = mysqli_real_escape_string($koneksi, $_POST['s1']); $s2 = mysqli_real_escape_string($koneksi, $_POST['s2']);
    $s3 = mysqli_real_escape_string($koneksi, $_POST['s3']); $s4 = mysqli_real_escape_string($koneksi, $_POST['s4']);
    $s5 = mysqli_real_escape_string($koneksi, $_POST['s5']); $s6 = mysqli_real_escape_string($koneksi, $_POST['s6']);
    $s7 = mysqli_real_escape_string($koneksi, $_POST['s7']); $s8 = mysqli_real_escape_string($koneksi, $_POST['s8']);
    $s9 = mysqli_real_escape_string($koneksi, $_POST['s9']); $s10 = mysqli_real_escape_string($koneksi, $_POST['s10']);
    $s11 = mysqli_real_escape_string($koneksi, $_POST['s11']); $s12 = mysqli_real_escape_string($koneksi, $_POST['s12']);
    $s13 = mysqli_real_escape_string($koneksi, $_POST['s13']); $s14 = mysqli_real_escape_string($koneksi, $_POST['s14']);
    $s15 = mysqli_real_escape_string($koneksi, $_POST['s15']); $s16 = mysqli_real_escape_string($koneksi, $_POST['s16']);
    $s17 = mysqli_real_escape_string($koneksi, $_POST['s17']); $s18 = mysqli_real_escape_string($koneksi, $_POST['s18']);

    // insert induk
    $query_induk = "INSERT INTO form_wawancara_staf 
                   (kode_informan, lembaga, jabatan, lama_bekerja, waktu, pewawancara, 
                    s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13, s14, s15, s16, s17, s18) 
                   VALUES 
                   ('$kode_informan', '$lembaga', '$jabatan', '$lama_bekerja', '$waktu', '$pewawancara', 
                    '$s1', '$s2', '$s3', '$s4', '$s5', '$s6', '$s7', '$s8', '$s9', '$s10', '$s11', '$s12', '$s13', '$s14', '$s15', '$s16', '$s17', '$s18')";

    if (mysqli_query($koneksi, $query_induk)) {
        $id_wawancara = mysqli_insert_id($koneksi);

        // insert anak (ringkasan)
        if (isset($_POST['temuan'])) {
            $jumlah_baris = count($_POST['temuan']);
            for ($i = 0; $i < $jumlah_baris; $i++) {
                if (!empty(trim($_POST['temuan'][$i]))) {
                    $temuan    = mysqli_real_escape_string($koneksi, $_POST['temuan'][$i]);
                    $bukti     = mysqli_real_escape_string($koneksi, $_POST['bukti'][$i]);
                    $faktor    = mysqli_real_escape_string($koneksi, $_POST['faktor'][$i]);
                    $kaitan    = mysqli_real_escape_string($koneksi, $_POST['kaitan'][$i]);
                    $implikasi = mysqli_real_escape_string($koneksi, $_POST['implikasi'][$i]);

                    $query_anak = "INSERT INTO staf_ringkasan (id_wawancara, temuan, bukti, faktor, kaitan, implikasi) 
                                   VALUES ('$id_wawancara', '$temuan', '$bukti', '$faktor', '$kaitan', '$implikasi')";
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