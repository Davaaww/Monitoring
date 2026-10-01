<?php
// 1. KONEKSI DATABASE
$host = "localhost";
$user = "root"; 
$pass = "1234"; // <-- Ganti password Anda
$db   = "db_monitoring";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

// 2. MENGAMBIL DATA UNTUK KARTU RINGKASAN (COUNT)
$jml_observasi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM form_observasi"))['total'] ?? 0;
$jml_staf      = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM form_wawancara_staf"))['total'] ?? 0;
$jml_pm        = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM form_wawancara_pm"))['total'] ?? 0;
$jml_fgd       = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM form_fgd"))['total'] ?? 0;

// 3. MENGAMBIL DATA UNTUK GRAFIK (CHART.JS)
// Grafik 1: Kegiatan yang diamati (Observasi)
$query_kegiatan = mysqli_query($koneksi, "SELECT kegiatan, COUNT(*) as jumlah FROM form_observasi GROUP BY kegiatan");
$label_kegiatan = [];
$data_kegiatan = [];
while ($row = mysqli_fetch_assoc($query_kegiatan)) {
    $label_kegiatan[] = $row['kegiatan'] ? $row['kegiatan'] : 'Tidak Diisi';
    $data_kegiatan[] = $row['jumlah'];
}

// Grafik 2: Status Penerima Manfaat
$query_statuspm = mysqli_query($koneksi, "SELECT status_pm, COUNT(*) as jumlah FROM form_wawancara_pm GROUP BY status_pm");
$label_statuspm = [];
$data_statuspm = [];
while ($row = mysqli_fetch_assoc($query_statuspm)) {
    $label_statuspm[] = $row['status_pm'] ? $row['status_pm'] : 'Tidak Diisi';
    $data_statuspm[] = $row['jumlah'];
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring & Evaluasi</title>
    <!-- Memanggil Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary-color: #0b3d91; --secondary-color: #1e5aab; --bg-light: #f4f7f6; --text-main: #333; }
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 20px; background: var(--bg-light); color: var(--text-main); }
        .container { max-width: 1200px; margin: auto; }
        
        /* Header & Navigasi */
        .header { display: flex; justify-content: space-between; align-items: center; background: #fff; padding: 15px 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .header h2 { margin: 0; color: var(--primary-color); }
        .btn-back { text-decoration: none; background: var(--primary-color); color: #fff; padding: 10px 20px; border-radius: 5px; font-weight: bold; }
        
        /* Kartu Ringkasan (Summary Cards) */
        .summary-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 30px; }
        .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid #f2a900; }
        .card h3 { margin: 0; font-size: 36px; color: var(--primary-color); }
        .card p { margin: 5px 0 0; font-size: 14px; font-weight: bold; color: #666; }
        
        /* Area Grafik */
        .chart-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
        .chart-container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .chart-container h4 { margin-top: 0; color: var(--primary-color); text-align: center; }
        
        /* Area Kuantitatif (Google Sheets) */
        .kuantitatif-section { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Dashboard MONEV Terpadu</h2>
        <a href="index.html" class="btn-back">Kembali ke Beranda</a>
    </div>

    <!-- 1. KARTU RINGKASAN DATA KUALITATIF -->
    <div class="summary-grid">
        <div class="card">
            <h3><?php echo $jml_observasi; ?></h3>
            <p>Data Observasi</p>
        </div>
        <div class="card">
            <h3><?php echo $jml_staf; ?></h3>
            <p>Wawancara Staf</p>
        </div>
        <div class="card">
            <h3><?php echo $jml_pm; ?></h3>
            <p>Wawancara PM</p>
        </div>
        <div class="card">
            <h3><?php echo $jml_fgd; ?></h3>
            <p>Sesi FGD</p>
        </div>
    </div>

    <!-- 2. GRAFIK DATA KUALITATIF (CHART.JS) -->
    <div class="chart-grid">
        <div class="chart-container">
            <h4>Proporsi Kegiatan yang Diamati (Observasi)</h4>
            <canvas id="chartKegiatan"></canvas>
        </div>
        <div class="chart-container">
            <h4>Status Penerima Manfaat yang Diwawancara</h4>
            <canvas id="chartStatusPM"></canvas>
        </div>
    </div>

    <!-- 3. TEMPAT UNTUK DATA KUANTITATIF (GOOGLE FORMS/SHEETS) -->
    <div class="kuantitatif-section">
        <h4 style="color: var(--primary-color); margin-top: 0;">Integrasi Data Kuantitatif (Google Sheets)</h4>
        <p style="color: #666; font-size: 14px;">Di area ini, Anda bisa menyematkan (embed) diagram interaktif langsung dari Google Sheets kuesioner Anda.</p>
        <!-- Contoh tag iframe untuk Google Sheets (Nanti link diganti dengan link publish milik Anda) -->
        <div style="background: #f9f9f9; border: 1px dashed #ccc; padding: 50px; color: #999;">
            [ Area Embed Google Sheets / Looker Studio ]
        </div>
    </div>
</div>

<!-- SCRIPT PENGGAMBAR GRAFIK -->
<script>
    // Menangkap data PHP dan mengubahnya menjadi format Javascript (JSON)
    const labelKegiatan = <?php echo json_encode($label_kegiatan); ?>;
    const dataKegiatan = <?php echo json_encode($data_kegiatan); ?>;
    
    const labelStatusPM = <?php echo json_encode($label_statuspm); ?>;
    const dataStatusPM = <?php echo json_encode($data_statuspm); ?>;

    // Render Grafik 1 (Bar Chart / Diagram Batang)
    new Chart(document.getElementById('chartKegiatan'), {
        type: 'bar',
        data: {
            labels: labelKegiatan,
            datasets: [{
                label: 'Jumlah Observasi',
                data: dataKegiatan,
                backgroundColor: '#0b3d91',
                borderRadius: 4
            }]
        }
    });

    // Render Grafik 2 (Pie Chart / Diagram Lingkaran)
    new Chart(document.getElementById('chartStatusPM'), {
        type: 'doughnut',
        data: {
            labels: labelStatusPM,
            datasets: [{
                data: dataStatusPM,
                backgroundColor: ['#f2a900', '#28a745', '#dc3545', '#17a2b8']
            }]
        }
    });
</script>

</body>
</html>