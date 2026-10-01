<?php
// koneksi db
$host = "localhost";
$user = "root"; 
$pass = "1234";
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // data identitas
    $kode_lokasi  = mysqli_real_escape_string($koneksi, $_POST['kode_lokasi']);
    $nama_lembaga = mysqli_real_escape_string($koneksi, $_POST['nama_lembaga']);
    $waktu        = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $observer     = mysqli_real_escape_string($koneksi, $_POST['observer']);
    $kegiatan     = isset($_POST['kegiatan']) ? mysqli_real_escape_string($koneksi, $_POST['kegiatan']) : '';

    // data baris tabel 1
    $obs1_pilihan = isset($_POST['obs1_pilihan']) ? mysqli_real_escape_string($koneksi, $_POST['obs1_pilihan']) : '';
    $obs1_catatan = mysqli_real_escape_string($koneksi, $_POST['obs1_catatan']);
    
    // upload foto
    $obs1_foto = ''; 
    if (isset($_FILES['obs1_foto']) && $_FILES['obs1_foto']['error'] == 0) {
        $nama_file = time() . "_" . basename($_FILES['obs1_foto']['name']);
        $lokasi_sementara = $_FILES['obs1_foto']['tmp_name'];
        $lokasi_tujuan = "uploads/" . $nama_file;
        
        if (move_uploaded_file($lokasi_sementara, $lokasi_tujuan)) {
            $obs1_foto = $nama_file;
        }
    }

    // insert induk
    $query = "INSERT INTO form_observasi 
              (kode_lokasi, nama_lembaga, waktu, observer, kegiatan, obs1_pilihan, obs1_catatan, obs1_foto) 
              VALUES 
              ('$kode_lokasi', '$nama_lembaga', '$waktu', '$observer', '$kegiatan', '$obs1_pilihan', '$obs1_catatan', '$obs1_foto')";

    if (mysqli_query($koneksi, $query)) {
        $id_observasi = mysqli_insert_id($koneksi);

        // insert anak (naratif)
        if (isset($_POST['waktu_kegiatan'])) {
            $jumlah_baris = count($_POST['waktu_kegiatan']);
            for ($i = 0; $i < $jumlah_baris; $i++) {
                if (!empty(trim($_POST['waktu_kegiatan'][$i]))) {
                    $w_kegiatan = mysqli_real_escape_string($koneksi, $_POST['waktu_kegiatan'][$i]);
                    $deskripsi  = mysqli_real_escape_string($koneksi, $_POST['deskripsi'][$i]);
                    $makna      = mysqli_real_escape_string($koneksi, $_POST['makna'][$i]);
                    $sumber     = mysqli_real_escape_string($koneksi, $_POST['sumber'][$i]);

                    $query_anak = "INSERT INTO observasi_naratif (id_observasi, waktu_kegiatan, deskripsi, makna, sumber) 
                                   VALUES ('$id_observasi', '$w_kegiatan', '$deskripsi', '$makna', '$sumber')";
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