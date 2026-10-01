# Monitoring
# Portal Sistem Monitoring dan Evaluasi 

Sistem terpadu untuk pengumpulan, pengelolaan, dan visualisasi data monitoring serta evaluasi yang menggabungkan data kualitatif (PHP & MySQL lokal) dan data kuantitatif (Google Forms & Sheets).

## Struktur Proyek

* `index.html`: Beranda / portal navigasi utama.
* `Kuantitatif.html`: Modul tautan instrumen Google Forms.
* `Kualitatif.php`: Formulir pengumpulan data kualitatif (Observasi, Wawancara Staf, Wawancara PM, FGD, Integrasi).
* `Monitoring.php`: Dasbor terpadu visualisasi data kualitatif (Chart.js) dan kuantitatif (Google Forms analytics embed).
* `simpan_*.php`: Berkas pemroses backend untuk menyimpan data kualitatif ke database MySQL.

## Cara Instalasi dan Menjalankan Sistem

### 1. Persiapan Database
1. Buka MySQL Workbench atau klien MySQL Anda.
2. Lakukan *Import* file **`db_monitoring.sql`** ke dalam server MySQL lokal Anda untuk membuat basis data dan seluruh tabel relasional yang dibutuhkan.

### 2. Konfigurasi Koneksi Database
Buka seluruh berkas backend PHP (`simpan_observasi.php`, `simpan_staf.php`, `simpan_pm.php`, `simpan_fgd.php`, `simpan_integrasi.php`, dan `Monitoring.php`), lalu sesuaikan *password* database MySQL lokal Anda pada bagian variabel koneksi:
```php
$host = "localhost";
$user = "root";
$pass = "MASUKKAN_PASSWORD_MYSQL_ANDA_DI_SINI";
$db   = "db_monitoring";
