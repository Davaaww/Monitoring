<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Kualitatif - Terpadu</title>
    <style>
        :root { --primary-color: #0b3d91; --secondary-color: #1e5aab; --bg-light: #f4f7f6; --text-main: #333; }
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 20px; color: var(--text-main); background: #f4f7f6; }
        .container { max-width: 1000px; margin: 20px auto; background: #fff; padding: 30px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        h2 { color: var(--primary-color); text-align: center; border-bottom: 3px solid #f2a900; padding-bottom: 10px; margin-top: 0; }
        .btn-back { background: transparent; color: var(--primary-color); border: 1px solid var(--primary-color); padding: 8px 16px; font-weight: bold; border-radius: 4px; cursor: pointer; text-decoration: none; margin-bottom: 20px; display: inline-block; }
        .btn-back:hover { background: var(--bg-light); }
        .menu-grid { display: grid; grid-template-columns: 1fr; gap: 10px; margin-bottom: 30px; }
        .btn-menu { background: var(--primary-color); color: #fff; padding: 15px; border: none; font-size: 15px; font-weight: bold; border-radius: 6px; cursor: pointer; text-align: left; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-menu:hover { background: var(--secondary-color); transform: translateY(-2px); }
        .form-section { display: none; animation: fadeIn 0.4s; background: var(--bg-light); padding: 20px; border-radius: 8px; border: 1px solid #ccc; }
        .active-section { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        h3 { color: var(--primary-color); margin-top: 0; border-bottom: 2px solid var(--primary-color); padding-bottom: 5px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px; }
        label { font-weight: bold; font-size: 13px; display: block; margin-bottom: 5px; }
        input[type="text"], select, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; font-size: 13px; }
        th, td { border: 1px solid #aaa; padding: 10px; vertical-align: top; }
        th { background: #d9ead3; text-align: center; }
        .center { text-align: center; }
        .btn-submit { background: var(--primary-color); color: white; padding: 12px 24px; border: none; font-weight: bold; width: 100%; margin-top: 20px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .question-box { background: #fff; padding: 15px; margin-bottom: 15px; border-left: 5px solid var(--primary-color); box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .q-title { font-weight: bold; font-size: 14px; color: var(--primary-color); margin-bottom: 5px; }
        .q-probe { font-size: 12px; color: #666; font-style: italic; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.html" class="btn-back">⬅ Kembali ke Beranda</a>
    <h2>MODUL PENILAIAN KUALITATIF</h2>
    
    <div id="main-menu" class="menu-grid">
        <button class="btn-menu" onclick="showForm('form-observasi')">1. Lembar Ceklis dan Catatan Observasi Lapangan</button>
        <button class="btn-menu" onclick="showForm('form-wawancara-staf')">2. Pedoman Wawancara Mendalam (Pengelola/Staf)</button>
        <button class="btn-menu" onclick="showForm('form-wawancara-pm')">3. Pedoman Wawancara Mendalam (Penerima Manfaat)</button>
        <button class="btn-menu" onclick="showForm('form-fgd')">4. Catatan Skenario Focus Group Discussion (FGD)</button>
        <button class="btn-menu" onclick="showForm('form-integrasi')">5. Lembar Integrasi Temuan QUAN-qual</button>
    </div>

    <!-- form observasi -->
    <div id="form-observasi" class="form-section">
        <button class="btn-back" onclick="showMenu()">⬅ Kembali ke Menu Kualitatif</button>
        <h3>1. LEMBAR CEKLIS DAN OBSERVASI LAPANGAN</h3>
        <form action="simpan_observasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-grid">
                <div><label>Kode Lokasi:</label><input type="text" name="kode_lokasi" required></div>
                <div><label>Nama Lembaga:</label><input type="text" name="nama_lembaga" required></div>
                <div><label>Tanggal/Waktu:</label><input type="date" name="waktu" required></div>
                <div><label>Observer:</label><input type="text" name="observer" required></div>
            </div>
            <label>Kegiatan yang diamati:</label>
            <input type="radio" name="kegiatan" value="Lingkungan"> Lingkungan residensial &nbsp;
            <input type="radio" name="kegiatan" value="Terapi"> Terapi &nbsp;
            <input type="radio" name="kegiatan" value="Vokasional"> Vokasional &nbsp;
            <input type="radio" name="kegiatan" value="Lainnya"> Lainnya
            
            <div style="overflow-x: auto;">
                <table style="min-width: 900px;">
                    <tr>
                        <th width="30">No</th><th width="80">Fokus</th><th width="120">Indikator</th><th>Hal yang Diamati</th><th width="30">Ya</th><th width="30">Tdk</th><th width="30">Blm</th><th width="200">Catatan/Bukti Lapangan (Upload)</th><th width="50">RM</th>
                    </tr>
                    
                    <tr>
                        <td class="center">1</td><td>Input</td><td>Aksesibilitas fisik</td>
                        <td>Akses masuk, jalur, toilet, ruang layanan dapat digunakan.</td>
                        <td class="center"><input type="radio" name="obs1_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs1_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs1_pilihan" value="Blm"></td>
                        <td><textarea name="obs1_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs1_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1/E1</td>
                    </tr>
                    <tr>
                        <td class="center">2</td><td>Input</td><td>Akses informasi</td>
                        <td>Tersedia media/dukungan komunikasi yang dipahami PM.</td>
                        <td class="center"><input type="radio" name="obs2_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs2_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs2_pilihan" value="Blm"></td>
                        <td><textarea name="obs2_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs2_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1/E1</td>
                    </tr>
                    <tr>
                        <td class="center">3</td><td>Input</td><td>Ruang terapi</td>
                        <td>Ruang aman, nyaman, privasi, sesuai fungsi.</td>
                        <td class="center"><input type="radio" name="obs3_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs3_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs3_pilihan" value="Blm"></td>
                        <td><textarea name="obs3_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs3_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1/E1</td>
                    </tr>
                    <tr>
                        <td class="center">4</td><td>Input</td><td>Peralatan terapi</td>
                        <td>Peralatan tersedia, layak, aman, dan digunakan.</td>
                        <td class="center"><input type="radio" name="obs4_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs4_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs4_pilihan" value="Blm"></td>
                        <td><textarea name="obs4_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs4_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1</td>
                    </tr>
                    <tr>
                        <td class="center">5</td><td>Input</td><td>Ruang vokasional</td>
                        <td>Ruang praktik sesuai keterampilan & dukung keselamatan.</td>
                        <td class="center"><input type="radio" name="obs5_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs5_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs5_pilihan" value="Blm"></td>
                        <td><textarea name="obs5_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs5_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1/E1</td>
                    </tr>
                    <tr>
                        <td class="center">6</td><td>Input</td><td>Alat vokasional</td>
                        <td>Alat/bahan tersedia & dapat digunakan PM.</td>
                        <td class="center"><input type="radio" name="obs6_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs6_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs6_pilihan" value="Blm"></td>
                        <td><textarea name="obs6_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs6_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M1</td>
                    </tr>
                    <tr>
                        <td class="center">7</td><td>Proses</td><td>Kehadiran petugas</td>
                        <td>Petugas/instruktur hadir menjalankan peran.</td>
                        <td class="center"><input type="radio" name="obs7_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs7_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs7_pilihan" value="Blm"></td>
                        <td><textarea name="obs7_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs7_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3/M4</td>
                    </tr>
                    <tr>
                        <td class="center">8</td><td>Proses terapi</td><td>Kesesuaian</td>
                        <td>Aktivitas terapi sesuai tujuan/sasaran.</td>
                        <td class="center"><input type="radio" name="obs8_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs8_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs8_pilihan" value="Blm"></td>
                        <td><textarea name="obs8_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs8_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3</td>
                    </tr>
                    <tr>
                        <td class="center">9</td><td>Proses terapi</td><td>Partisipasi PM</td>
                        <td>PM terlibat aktif sesuai kemampuan.</td>
                        <td class="center"><input type="radio" name="obs9_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs9_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs9_pilihan" value="Blm"></td>
                        <td><textarea name="obs9_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs9_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3/E1</td>
                    </tr>
                    <tr>
                        <td class="center">10</td><td>Proses terapi</td><td>Individualisasi</td>
                        <td>Petugas menyesuaikan cara/bantuan dengan PM.</td>
                        <td class="center"><input type="radio" name="obs10_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs10_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs10_pilihan" value="Blm"></td>
                        <td><textarea name="obs10_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs10_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M2</td>
                    </tr>
                    <tr>
                        <td class="center">11</td><td>Proses terapi</td><td>Komunikasi</td>
                        <td>Petugas memberi penjelasan dipahami PM.</td>
                        <td class="center"><input type="radio" name="obs11_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs11_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs11_pilihan" value="Blm"></td>
                        <td><textarea name="obs11_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs11_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3/E1</td>
                    </tr>
                    <tr>
                        <td class="center">12</td><td>Proses terapi</td><td>Penghormatan hak</td>
                        <td>Interaksi hormati privasi, pilihan, tidak merendahkan.</td>
                        <td class="center"><input type="radio" name="obs12_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs12_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs12_pilihan" value="Blm"></td>
                        <td><textarea name="obs12_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs12_foto" accept="image/*" style="font-size:11px;"></td><td class="center">E1</td>
                    </tr>
                    <tr>
                        <td class="center">13</td><td>Proses terapi</td><td>Keamanan</td>
                        <td>Prosedur tidak berisiko, keselamatan diawasi.</td>
                        <td class="center"><input type="radio" name="obs13_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs13_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs13_pilihan" value="Blm"></td>
                        <td><textarea name="obs13_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs13_foto" accept="image/*" style="font-size:11px;"></td><td class="center">E1</td>
                    </tr>
                    <tr>
                        <td class="center">14</td><td>Proses terapi</td><td>Umpan balik</td>
                        <td>Petugas respons atas perkembangan PM.</td>
                        <td class="center"><input type="radio" name="obs14_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs14_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs14_pilihan" value="Blm"></td>
                        <td><textarea name="obs14_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs14_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3</td>
                    </tr>
                    <tr>
                        <td class="center">15</td><td>Vokasional</td><td>Kesesuaian</td>
                        <td>Praktik sesuai keterampilan dipelajari.</td>
                        <td class="center"><input type="radio" name="obs15_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs15_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs15_pilihan" value="Blm"></td>
                        <td><textarea name="obs15_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs15_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4</td>
                    </tr>
                    <tr>
                        <td class="center">16</td><td>Vokasional</td><td>Proporsi praktik</td>
                        <td>PM dapat kesempatan praktik nyata.</td>
                        <td class="center"><input type="radio" name="obs16_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs16_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs16_pilihan" value="Blm"></td>
                        <td><textarea name="obs16_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs16_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4</td>
                    </tr>
                    <tr>
                        <td class="center">17</td><td>Vokasional</td><td>Adaptasi</td>
                        <td>Instruktur sesuaikan alat/tempo kemampuan PM.</td>
                        <td class="center"><input type="radio" name="obs17_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs17_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs17_pilihan" value="Blm"></td>
                        <td><textarea name="obs17_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs17_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4/E1</td>
                    </tr>
                    <tr>
                        <td class="center">18</td><td>Vokasional</td><td>Keselamatan</td>
                        <td>Alat digunakan aman, pengawasan memadai.</td>
                        <td class="center"><input type="radio" name="obs18_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs18_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs18_pilihan" value="Blm"></td>
                        <td><textarea name="obs18_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs18_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4/E1</td>
                    </tr>
                    <tr>
                        <td class="center">19</td><td>Vokasional</td><td>Kemandirian</td>
                        <td>PM diberi kesempatan tugas sendiri.</td>
                        <td class="center"><input type="radio" name="obs19_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs19_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs19_pilihan" value="Blm"></td>
                        <td><textarea name="obs19_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs19_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4/E4</td>
                    </tr>
                    <tr>
                        <td class="center">20</td><td>Vokasional</td><td>Umpan balik</td>
                        <td>Instruktur jelaskan koreksi/perbaikan.</td>
                        <td class="center"><input type="radio" name="obs20_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs20_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs20_pilihan" value="Blm"></td>
                        <td><textarea name="obs20_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs20_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4</td>
                    </tr>
                    <tr>
                        <td class="center">21</td><td>Vokasional</td><td>Simulasi</td>
                        <td>Terlihat simulasi kerja/produksi nyata.</td>
                        <td class="center"><input type="radio" name="obs21_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs21_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs21_pilihan" value="Blm"></td>
                        <td><textarea name="obs21_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs21_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M4/E2</td>
                    </tr>
                    <tr>
                        <td class="center">22</td><td>Residensial</td><td>Kemandirian</td>
                        <td>Rutinitas beri kesempatan aktivitas mandiri.</td>
                        <td class="center"><input type="radio" name="obs22_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs22_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs22_pilihan" value="Blm"></td>
                        <td><textarea name="obs22_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs22_foto" accept="image/*" style="font-size:11px;"></td><td class="center">E3/E5</td>
                    </tr>
                    <tr>
                        <td class="center">23</td><td>Residensial</td><td>Interaksi</td>
                        <td>Dukung relasi, komunikasi & partisipasi PM.</td>
                        <td class="center"><input type="radio" name="obs23_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs23_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs23_pilihan" value="Blm"></td>
                        <td><textarea name="obs23_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs23_foto" accept="image/*" style="font-size:11px;"></td><td class="center">E3/E5</td>
                    </tr>
                    <tr>
                        <td class="center">24</td><td>Residensial</td><td>Pilihan</td>
                        <td>PM peroleh ruang sampaikan pendapat.</td>
                        <td class="center"><input type="radio" name="obs24_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs24_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs24_pilihan" value="Blm"></td>
                        <td><textarea name="obs24_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs24_foto" accept="image/*" style="font-size:11px;"></td><td class="center">E1</td>
                    </tr>
                    <tr>
                        <td class="center">25</td><td>Tindak lanjut</td><td>Pencatatan</td>
                        <td>Ada pencatatan kehadiran, kemajuan dll.</td>
                        <td class="center"><input type="radio" name="obs25_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs25_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs25_pilihan" value="Blm"></td>
                        <td><textarea name="obs25_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs25_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M3/M4</td>
                    </tr>
                    <tr>
                        <td class="center">26</td><td>Tindak lanjut</td><td>Respons</td>
                        <td>Ada bantuan bila terjadi kesulitan.</td>
                        <td class="center"><input type="radio" name="obs26_pilihan" value="Ya"></td><td class="center"><input type="radio" name="obs26_pilihan" value="Tdk"></td><td class="center"><input type="radio" name="obs26_pilihan" value="Blm"></td>
                        <td><textarea name="obs26_catatan" rows="2" style="width:100%;"></textarea><input type="file" name="obs26_foto" accept="image/*" style="font-size:11px;"></td><td class="center">M5</td>
                    </tr>
                </table>
            </div>

            <h4 style="color: var(--primary-color); border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px;">Catatan Naratif Observasi</h4>
            <div style="overflow-x: auto;">
                <table style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th>Waktu/Kegiatan</th><th>Deskripsi Fakta Terlihat</th><th>Makna Awal/Isu</th><th>Sumber Dikonfirmasi</th><th width="50">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="body-naratif">
                        <tr>
                            <td><textarea name="waktu_kegiatan[]" rows="2" style="width: 100%; box-sizing: border-box;"></textarea></td>
                            <td><textarea name="deskripsi[]" rows="2" style="width: 100%; box-sizing: border-box;"></textarea></td>
                            <td><textarea name="makna[]" rows="2" style="width: 100%; box-sizing: border-box;"></textarea></td>
                            <td><textarea name="sumber[]" rows="2" style="width: 100%; box-sizing: border-box;"></textarea></td>
                            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-naratif')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px; cursor:pointer;">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" onclick="tambahBarisNaratif()" style="background: #28a745; color: white; border: none; padding: 8px 15px; margin-top: 10px; cursor: pointer; border-radius: 4px; font-weight: bold;">+ Tambah Baris Catatan</button>

            <button type="submit" class="btn-submit">SIMPAN DATA OBSERVASI</button>
        </form>
    </div>

    <!-- form staf -->
    <div id="form-wawancara-staf" class="form-section">
        <button type="button" class="btn-back" onclick="showMenu()">⬅ Kembali ke Menu Kualitatif</button>
        <h3>2. WAWANCARA MENDALAM - STAF/PENGELOLA</h3>
        <form action="simpan_staf.php" method="POST">
            <div class="form-grid">
                <div><label>Kode Informan:</label><input type="text" name="kode_informan" required></div>
                <div><label>Lembaga:</label><input type="text" name="lembaga" required></div>
                <div><label>Jabatan/Profesi:</label><input type="text" name="jabatan" required></div>
                <div><label>Lama Bekerja:</label><input type="text" name="lama_bekerja" required></div>
                <div><label>Tanggal/Waktu:</label><input type="text" name="waktu" required></div>
                <div><label>Pewawancara:</label><input type="text" name="pewawancara" required></div>
            </div>
            
            <div class="question-box"><div class="q-title">S1 (M1) Kesiapan Input</div><textarea name="s1" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S2 (M2) Asesmen</div><textarea name="s2" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S3 (M2) Perencanaan individual</div><textarea name="s3" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S4 (M3) Terapi</div><textarea name="s4" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S5 (M3) Kompetensi & supervisi</div><textarea name="s5" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S6 (M4) Vokasional</div><textarea name="s6" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S7 (M4) Kerja/usaha</div><textarea name="s7" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S8 (M5) Hambatan</div><textarea name="s8" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S9 (M5) Faktor pendukung</div><textarea name="s9" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S10 (M5) Monitoring & koreksi</div><textarea name="s10" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S11 (E1) Kesesuaian & mutu</div><textarea name="s11" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S12 (E2) Output</div><textarea name="s12" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S13 (E3) Outcome terapi</div><textarea name="s13" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S14 (E4) Outcome vokasional</div><textarea name="s14" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S15 (E5) Pascalayanan</div><textarea name="s15" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S16 (E5) Ketergantungan vs kemandirian</div><textarea name="s16" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S17 (E6) Perbaikan</div><textarea name="s17" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">S18 (QUAN-qual) Pendalaman</div><textarea name="s18" rows="3"></textarea></div>

            <h4 style="color: var(--primary-color); border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px;">Ringkasan Wawancara Staf</h4>
            <div style="overflow-x: auto;">
                <table style="min-width: 800px;">
                    <thead>
                        <tr><th>Temuan Utama</th><th>Bukti/Contoh</th><th>Faktor Penyebab/Pendukung</th><th>Kaitan dg Temuan QUAN</th><th>Implikasi/Rekomendasi</th><th width="50">Aksi</th></tr>
                    </thead>
                    <tbody id="body-ringkasan-staf">
                        <tr>
                            <td><textarea name="temuan[]" rows="2"></textarea></td>
                            <td><textarea name="bukti[]" rows="2"></textarea></td>
                            <td><textarea name="faktor[]" rows="2"></textarea></td>
                            <td><textarea name="kaitan[]" rows="2"></textarea></td>
                            <td><textarea name="implikasi[]" rows="2"></textarea></td>
                            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-ringkasan-staf')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px; cursor:pointer;">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" onclick="tambahBarisStaf()" style="background: #28a745; color: white; border: none; padding: 8px 15px; margin-top: 10px; cursor: pointer; border-radius: 4px; font-weight: bold;">+ Tambah Baris Ringkasan</button>
            <button type="submit" class="btn-submit">SIMPAN DATA WAWANCARA STAF</button>
        </form>
    </div>

    <!-- form pm -->
    <div id="form-wawancara-pm" class="form-section">
        <button type="button" class="btn-back" onclick="showMenu()">⬅ Kembali ke Menu Kualitatif</button>
        <h3>3. WAWANCARA MENDALAM - PENERIMA MANFAAT (PM)</h3>
        <form action="simpan_pm.php" method="POST">
            <div class="form-grid">
                <div><label>Kode Informan:</label><input type="text" name="kode_informan" required></div>
                <div><label>Lembaga:</label><input type="text" name="lembaga" required></div>
                <div><label>Layanan yang diikuti:</label><input type="text" name="layanan" placeholder="Terapi / Vokasional / Keduanya"></div>
                <div><label>Lama mengikuti layanan:</label><input type="text" name="lama" required></div>
                <div><label>Status:</label><select name="status_pm"><option>Masih tinggal</option><option>Sudah selesai layanan</option></select></div>
                <div><label>Dukungan Komunikasi:</label><input type="text" name="dukungan_komunikasi" placeholder="Misal: Bahasa Isyarat / Tidak perlu"></div>
            </div>

            <div class="question-box"><div class="q-title">P1 (M2/E1) Awal layanan</div><textarea name="p1" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P2 (M2/E1) Pilihan</div><textarea name="p2" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P3 (M3) Pengalaman terapi</div><textarea name="p3" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P4 (M3/E1) Hubungan dg petugas</div><textarea name="p4" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P5 (M4) Pengalaman vokasional</div><textarea name="p5" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P6 (M4) Kerja/usaha</div><textarea name="p6" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P7 (M5) Hambatan</div><textarea name="p7" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P8 (M5) Respons masalah</div><textarea name="p8" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P9 (E1) Kesesuaian</div><textarea name="p9" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P10 (E1) Hak & kualitas</div><textarea name="p10" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P11 (E2) Hasil langsung</div><textarea name="p11" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P12 (E3) Perubahan terapi</div><textarea name="p12" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P13 (E4) Perubahan vokasional</div><textarea name="p13" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P14 (E5) Kesiapan keluar</div><textarea name="p14" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P15 (E5) Keberlanjutan</div><textarea name="p15" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P16 (E6) Perbaikan</div><textarea name="p16" rows="3"></textarea></div>
            <div class="question-box"><div class="q-title">P17 (QUAN-qual) Pendalaman</div><textarea name="p17" rows="3"></textarea></div>

            <h4 style="color: var(--primary-color); border-bottom: 1px solid #ccc; margin-top: 30px;">Ringkasan Wawancara PM</h4>
            <div style="overflow-x: auto;">
                <table style="min-width: 800px;">
                    <thead>
                        <tr><th>Perubahan/Manfaat</th><th>Hambatan</th><th>Pengalaman Kualitas/Hak</th><th>Kesiapan/Keberlanjutan</th><th>Hal yang Perlu Diperbaiki</th><th width="50">Aksi</th></tr>
                    </thead>
                    <tbody id="body-ringkasan-pm">
                        <tr>
                            <td><textarea name="perubahan[]" rows="2"></textarea></td>
                            <td><textarea name="hambatan[]" rows="2"></textarea></td>
                            <td><textarea name="pengalaman[]" rows="2"></textarea></td>
                            <td><textarea name="kesiapan[]" rows="2"></textarea></td>
                            <td><textarea name="perbaikan[]" rows="2"></textarea></td>
                            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-ringkasan-pm')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px; cursor:pointer;">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" onclick="tambahBarisPM()" style="background: #28a745; color: white; border: none; padding: 8px 15px; margin-top: 10px; cursor: pointer; font-weight: bold;">+ Tambah Baris Ringkasan PM</button>
            <button type="submit" class="btn-submit">SIMPAN DATA WAWANCARA PM</button>
        </form>
    </div>

    <!-- form fgd -->
    <div id="form-fgd" class="form-section">
        <button type="button" class="btn-back" onclick="showMenu()">⬅ Kembali ke Menu Kualitatif</button>
        <h3>4. CATATAN HASIL FOCUS GROUP DISCUSSION (FGD)</h3>
        <form action="simpan_fgd.php" method="POST">
            <div class="form-grid">
                <div><label>Tanggal Pelaksanaan:</label><input type="date" name="tanggal" required></div>
                <div><label>Fasilitator:</label><input type="text" name="fasilitator" required></div>
                <div><label>Notulis:</label><input type="text" name="notulis" required></div>
                <div><label>Jumlah Peserta:</label><input type="text" name="jumlah_peserta" required></div>
            </div>

            <h4 style="color: var(--primary-color); border-bottom: 1px solid #ccc; margin-top:20px;">Catatan Diskusi Per Tahap</h4>
            <div class="question-box"><div class="q-title">1. Pembukaan & Harapan</div><textarea name="t1" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">2. Pemanasan</div><textarea name="t2" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">3. Input & kesiapan</div><textarea name="t3" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">4. Asesmen & individualisasi</div><textarea name="t4" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">5. Proses terapi</div><textarea name="t5" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">6. Proses vokasional</div><textarea name="t6" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">7. Hasil layanan</div><textarea name="t7" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">8. Hambatan & praktik baik</div><textarea name="t8" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">9. Konfrontasi temuan</div><textarea name="t9" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">10. Prioritas perbaikan</div><textarea name="t10" rows="2"></textarea></div>
            <div class="question-box"><div class="q-title">11. Penutup & Kesepakatan</div><textarea name="t11" rows="2"></textarea></div>
            
            <h4 style="color: var(--primary-color); border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px;">Matriks Prioritas Hasil FGD</h4>
            <div style="overflow-x: auto;">
                <table style="min-width: 900px;">
                    <thead>
                        <tr><th>Masalah/Gap</th><th>Penyebab Utama</th><th>Dampak pada PM</th><th>Praktik Baik</th><th>Usulan Perbaikan</th><th>Penanggung Jawab</th><th>Prioritas</th><th width="50">Aksi</th></tr>
                    </thead>
                    <tbody id="body-matriks-fgd">
                        <tr>
                            <td><textarea name="masalah[]" rows="2"></textarea></td>
                            <td><textarea name="penyebab[]" rows="2"></textarea></td>
                            <td><textarea name="dampak[]" rows="2"></textarea></td>
                            <td><textarea name="praktik[]" rows="2"></textarea></td>
                            <td><textarea name="usulan[]" rows="2"></textarea></td>
                            <td><textarea name="pj[]" rows="2"></textarea></td>
                            <td><select name="prioritas[]"><option>Tinggi</option><option>Sedang</option><option>Rendah</option></select></td>
                            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-matriks-fgd')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px; cursor:pointer;">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" onclick="tambahBarisFGD()" style="background: #28a745; color: white; border: none; padding: 8px 15px; margin-top: 10px; cursor: pointer; font-weight: bold;">+ Tambah Baris Matriks</button>
            <button type="submit" class="btn-submit">SIMPAN DATA FGD</button>
        </form>
    </div>

    <!-- form integrasi -->
    <div id="form-integrasi" class="form-section">
        <button type="button" class="btn-back" onclick="showMenu()">⬅ Kembali ke Menu Kualitatif</button>
        <h3>5. LEMBAR INTEGRASI TEMUAN QUAN-qual</h3>
        <form action="simpan_integrasi.php" method="POST">
            <div style="overflow-x: auto;">
                <table style="min-width: 1000px;">
                    <thead>
                        <tr><th width="150">RM/Indikator</th><th>Temuan QUAN</th><th>Sumber qual</th><th>Temuan qual/Bukti</th><th width="120">Hubungan Data</th><th>Interpretasi Terintegrasi</th><th>Implikasi</th></tr>
                    </thead>
                    <tbody>
                        <?php 
                        $indikators = ["M1 - Input", "M2 - Asesmen & perencanaan", "M3 - Proses terapi", "M4 - Proses vokasional", "M5 - Hambatan & TL", "E1 - Kesesuaian & kualitas", "E2 - Output", "E3 - Outcome terapi", "E4 - Outcome vokasional", "E5 - Indikasi dampak", "E6 - Kebutuhan perbaikan"];
                        foreach($indikators as $ind) {
                            echo "<tr>";
                            echo "<td><input type='hidden' name='indikator[]' value='$ind'>$ind</td>";
                            echo "<td><textarea name='quan[]' rows='3'></textarea></td>";
                            echo "<td><textarea name='sumber_qual[]' rows='3'></textarea></td>";
                            echo "<td><textarea name='temuan_qual[]' rows='3'></textarea></td>";
                            echo "<td><select name='hubungan[]'><option>Menguatkan</option><option>Menjelaskan</option><option>Memperluas</option><option>Berbeda</option></select></td>";
                            echo "<td><textarea name='interpretasi[]' rows='3'></textarea></td>";
                            echo "<td><textarea name='implikasi[]' rows='3'></textarea></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn-submit">SIMPAN INTEGRASI DATA</button>
        </form>
    </div>

</div>

<!-- script navigasi -->
<script>
    // show hide form
    function showForm(formId) {
        document.getElementById('main-menu').style.display = 'none';
        var forms = document.getElementsByClassName('form-section');
        for(var i = 0; i < forms.length; i++) {
            forms[i].classList.remove('active-section');
        }
        document.getElementById(formId).classList.add('active-section');
    }

    // kembali ke menu
    function showMenu() {
        var forms = document.getElementsByClassName('form-section');
        for(var i = 0; i < forms.length; i++) {
            forms[i].classList.remove('active-section');
        }
        document.getElementById('main-menu').style.display = 'grid';
    }

    // hapus baris
    function hapusBaris(button, tableId) {
        var row = button.parentNode.parentNode;
        var tbody = document.getElementById(tableId);
        if (tbody.rows.length > 1) {
            tbody.removeChild(row);
        } else {
            alert("Tabel minimal harus menyisakan 1 baris isian.");
        }
    }

    // tambah baris naratif
    function tambahBarisNaratif() {
        var tbody = document.getElementById('body-naratif');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><textarea name="waktu_kegiatan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="deskripsi[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="makna[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="sumber[]" rows="2" style="width: 100%;"></textarea></td>
            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-naratif')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px;">X</button></td>
        `;
        tbody.appendChild(newRow);
    }

    // tambah baris staf
    function tambahBarisStaf() {
        var tbody = document.getElementById('body-ringkasan-staf');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><textarea name="temuan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="bukti[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="faktor[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="kaitan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="implikasi[]" rows="2" style="width: 100%;"></textarea></td>
            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-ringkasan-staf')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px;">X</button></td>
        `;
        tbody.appendChild(newRow);
    }

    // tambah baris pm
    function tambahBarisPM() {
        var tbody = document.getElementById('body-ringkasan-pm');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><textarea name="perubahan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="hambatan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="pengalaman[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="kesiapan[]" rows="2" style="width: 100%;"></textarea></td>
            <td><textarea name="perbaikan[]" rows="2" style="width: 100%;"></textarea></td>
            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-ringkasan-pm')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px;">X</button></td>
        `;
        tbody.appendChild(newRow);
    }

    // tambah baris fgd
    function tambahBarisFGD() {
        var tbody = document.getElementById('body-matriks-fgd');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><textarea name="masalah[]" rows="2" style="width:100%;"></textarea></td>
            <td><textarea name="penyebab[]" rows="2" style="width:100%;"></textarea></td>
            <td><textarea name="dampak[]" rows="2" style="width:100%;"></textarea></td>
            <td><textarea name="praktik[]" rows="2" style="width:100%;"></textarea></td>
            <td><textarea name="usulan[]" rows="2" style="width:100%;"></textarea></td>
            <td><textarea name="pj[]" rows="2" style="width:100%;"></textarea></td>
            <td><select name="prioritas[]"><option>Tinggi</option><option>Sedang</option><option>Rendah</option></select></td>
            <td class="center"><button type="button" onclick="hapusBaris(this, 'body-matriks-fgd')" style="background:#dc3545; color:white; border:none; padding:5px; border-radius:4px;">X</button></td>
        `;
        tbody.appendChild(newRow);
    }
</script>

</body>
</html>