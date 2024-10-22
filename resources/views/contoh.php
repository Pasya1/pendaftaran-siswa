<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        p {
            text-align: justify;
        }

        table {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .center {
            text-align: center;
        }

        .image-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }

        .header-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-info img {
            width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Untuk memisahkan halaman */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="header-info">
        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
            <div style="width: 30%;">
                <img src="' . url(" img/logo_default.png") . '" alt="UNESA" style="width: 100px; height: auto;">
            </div>
            <div style="width: 65%; text-align: left;">
                <h2>Kampus Ketintang</h2>
                <p>Jalan Ketintang, Surabaya, Jawa Timur<br>Telp: +62 31-8289000</p>
            </div>
        </div>
    </div>

    <h2 style="text-align: center">DATA REGISTRASI CALON MAHASISWA BARU</h2>

    <p>Berikut adalah data registrasi calon mahasiswa baru yang telah diisi secara online melalui portal kami. Harap periksa kembali semua data yang telah dimasukkan.</p>

    <h4 style="text-align: left">Data Pribadi Calon Mahasiswa</h4>
    <table style="font-size: 12px;">
        <tr><th>No. Pendaftaran</th><td>' . htmlspecialchars($student->id) . '</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>' . htmlspecialchars($student->nama_lengkap) . '</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>' . htmlspecialchars($student->jenis_kelamin) . '</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>' . htmlspecialchars($student->tempat_lahir) . ', ' . htmlspecialchars($student->tanggal_lahir) . '</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>' . htmlspecialchars($student->alamat_lengkap) . '</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>' . htmlspecialchars($student->no_telepon) . '</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>' . htmlspecialchars($student->email) . '</td>
                </tr>
                <tr>
                    <th>Program Studi Pilihan</th>
                    <td>' . htmlspecialchars($program->nama_program) . '</td>
                </tr>
                <tr>
                    <th>Tingkat Pendidikan</th>
                    <td>' . htmlspecialchars($registration->tingkat_pendidikan) . '</td>
                </tr>
                <tr>
                    <th>Kelas Yang Dipilih</th>
                    <td>' . htmlspecialchars($registration->kelas) . '</td>
                </tr>
                </table>

                <h4 style="text-align: left">Data Orang Tua</h4>
                <table style="font-size: 12px;">
                    <tr>
                        <th>Nama Orang Tua</th>
                        <td>' . htmlspecialchars($orangtua->nama_orang_tua) . '</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>' . htmlspecialchars($orangtua->pekerjaan_orang_tua) . '</td>
                    </tr>
                    <tr>
                        <th>No. Telepon Orang Tua</th>
                        <td>' . htmlspecialchars($orangtua->no_telepon_orang_tua) . '</td>
                    </tr>
                    <tr>
                        <th>Alamat Orang Tua</th>
                        <td>' . htmlspecialchars($orangtua->alamat_orang_tua) . '</td>
                    </tr>
                </table>

                <h4 style="text-align: left">Data Sekolah</h4>
                <table style="font-size: 12px;">
                    <tr>
                        <th>Nama Sekolah</th>
                        <td>' . htmlspecialchars($student->nama_sekolah) . '</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>' . htmlspecialchars($student->jurusan) . '</td>
                    </tr>
                    <tr>
                        <th>Tahun Lulus</th>
                        <td>' . htmlspecialchars($student->tahun_lulus) . '</td>
                    </tr>
                    <tr>
                        <th>Nilai Rata-rata</th>
                        <td>' . htmlspecialchars($student->nilai_rata_rata) . '</td>
                    </tr>
                </table>

                <!-- Tambahkan halaman baru -->
                <div class="page-break"></div>


                <!-- Konten untuk halaman kedua (LAMPIRAN) -->
                <div class="center">
                    <h2>LAMPIRAN</h2>
                    <h3>Foto Diri</h3>
                    <img src="' . url(" storage/" . $student->foto_diri) . '" class="image-center" alt="Foto Diri">
                    <h3>KTP</h3>
                    <img src="' . url(" storage/" . $student->ktp) . '" class="image-center" alt="KTP">
                    <h3>Ijazah</h3>
                    <img src="' . url(" storage/" . $student->ijazah) . '" class="image-center" alt="Ijazah">
                    <h3>Transkrip Nilai</h3>
                    <img src="' . url(" storage/" . $student->transkrip_nilai) . '" class="image-center" alt="Transkrip Nilai">
                    <h3>Surat Rekomendasi</h3>
                    <img src="' . url(" storage/" . $student->surat_rekomendasi) . '" class="image-center" alt="Surat Rekomendasi">
                </div>
</body>

</html>';