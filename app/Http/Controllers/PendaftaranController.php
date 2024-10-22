<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Orangtua;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Site;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string',
            'email' => 'required|email',
            'alamat_lengkap' => 'required|string',
            'kode_pos' => 'required|string',
            'nama_sekolah' => 'required|string',
            'jurusan' => 'required|string',
            'tahun_lulus' => 'required|string',
            'nilai_rata_rata' => 'required|string',
            'nama_orang_tua' => 'required|string',
            'pekerjaan_orang_tua' => 'required|string',
            'no_telepon_orang_tua' => 'required|string',
            'alamat_orang_tua' => 'required|string',
            'foto_diri' => 'nullable|file|mimes:jpg,png,jpeg',
            'ktp' => 'nullable|file|mimes:jpg,png,jpeg',
            'ijazah' => 'nullable|file|mimes:jpg,png,jpeg',
            'transkrip_nilai' => 'nullable|file|mimes:jpg,png,jpeg',
            'surat_rekomendasi' => 'nullable|file|mimes:jpg,png,jpeg',
            'program_studi_pilihan' => 'required|string',
            'tingkat_pendidikan' => 'required|string',
            'program_kelas' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('foto_diri')) {
            $validatedData['foto'] = $request->file('foto_diri')->store('uploads/foto_diri', 'public');
        }
        if ($request->hasFile('ktp')) {
            $validatedData['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }
        if ($request->hasFile('ijazah')) {
            $validatedData['ijazah'] = $request->file('ijazah')->store('uploads/ijazah', 'public');
        }
        if ($request->hasFile('transkrip_nilai')) {
            $validatedData['transkrip_nilai'] = $request->file('transkrip_nilai')->store('uploads/transkrip_nilai', 'public');
        }
        if ($request->hasFile('surat_rekomendasi')) {
            $validatedData['surat_rekomendasi'] = $request->file('surat_rekomendasi')->store('uploads/surat_rekomendasi', 'public');
        }

        // Simpan data student
        $student = Student::create([
            'nama_lengkap' =>  $validatedData['nama_lengkap'],
            'jenis_kelamin' =>  $validatedData['jenis_kelamin'],
            'tempat_lahir' =>  $validatedData['tempat_lahir'],
            'tanggal_lahir' =>  $validatedData['tanggal_lahir'],
            'no_telepon' =>  $validatedData['no_telepon'],
            'email' =>  $validatedData['email'],
            'alamat_lengkap' =>  $validatedData['alamat_lengkap'],
            'kode_pos' =>  $validatedData['kode_pos'],
            'nama_sekolah' =>  $validatedData['nama_sekolah'],
            'jurusan' =>  $validatedData['jurusan'],
            'tahun_lulus' =>  $validatedData['tahun_lulus'],
            'nilai_rata_rata' =>  $validatedData['nilai_rata_rata'],
            'foto' =>  $validatedData['foto'] ?? null,
            'ktp' =>  $validatedData['ktp'] ?? null,
            'ijazah' =>  $validatedData['ijazah'] ?? null,
            'transkrip_nilai' =>  $validatedData['transkrip_nilai'] ?? null,
            'surat_rekomendasi' =>  $validatedData['surat_rekomendasi'] ?? null,
        ]);

        // Simpan data orang tua dengan student_id dari data mahasiswa yang baru saja disimpan
        $orangtua = Orangtua::create([
            'nama_orang_tua' =>  $validatedData['nama_orang_tua'],
            'pekerjaan_orang_tua' =>  $validatedData['pekerjaan_orang_tua'],
            'no_telepon_orang_tua' =>  $validatedData['no_telepon_orang_tua'],
            'alamat_orang_tua' =>  $validatedData['alamat_orang_tua'],
            'student_id' => $student->id, // foreign key
        ]);

        // Cari program studi pilihan berdasarkan nama_program pakai where nanti kalau admin udah jadi
        $program = Program::firstOrCreate(
            ['nama_program' => $validatedData['program_studi_pilihan']],
            // Kamu bisa menambahkan kolom lain jika perlu, seperti deskripsi program, dll.
        );

        // Simpan data pendaftaran dengan student_id dan program_id
        $registration = Registration::create([
            'student_id' => $student->id, // foreign key
            'program_id' => $program->id,  // foreign key
            'tingkat_pendidikan' =>  $validatedData['tingkat_pendidikan'],
            'kelas' =>  $validatedData['program_kelas'],
        ]);

        $site = Site::first();

        // Buat PDF setelah data disimpan
        $this->generatePDF($student, $orangtua, $program, $registration, $site);

        return redirect()->route('data', $student->id)
            ->with('success', 'Data berhasil disimpan!');
        // return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        // Ambil data dari database
        $student = Student::findOrFail($id);
        $orangtua = Orangtua::where('student_id', $id)->first();
        $registration = Registration::where('student_id', $id)->first();
        $program = Program::where('id', $registration->program_id)->first(); // Menggunakan program_id dari data pendaftaran
        $site = Site::first();
        // Mengirim data ke view
        return view('data', compact('student', 'orangtua', 'registration', 'program', 'site'));
    }




    // Fungsi untuk menghasilkan PDF
    private function generatePDF($student, $orangtua, $program, $registration, $site)
    {
        // Inisialisasi Dompdf
        $dompdf = new Dompdf();

        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        // Konten HTML untuk PDF
        $html = '
        <html>

        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                }

                h1, h2, h3 {
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

                table, th, td {
                    border: 1px solid black;
                }

                th, td {
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
                    margin-top: -30px; /* Menaikkan posisi dengan margin negatif */
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
            <table style="width: 100%; border-collapse: collapse; border: none;">
                <tr>
                    <td style="width: 50%; text-align: right; vertical-align: top; border: none;">
                        <img src="' . asset('/storage/' . $site->logo) . '" alt="gambar" style="width: 100px; height: auto;">
                    </td>
                    <td style="width: 50%; text-align: left; border: none;">
                        <h4>' . htmlspecialchars($site->universitas) . '</h4>
                        <p style="font-size: 12px;">' . htmlspecialchars($site->alamat_perusahaan) . '<br>Telp: ' . htmlspecialchars($site->no_telepon_perusahaan) . '</p>
                    </td>
                </tr>
            </table>
        </div>


            <h2 style="text-align: center">DATA REGISTRASI CALON SISWA BARU</h2>

            <p style="font-size: 12px;">Berikut adalah data registrasi calon siswa baru yang telah diisi secara online melalui portal kami. Harap periksa kembali semua data yang telah dimasukkan.</p>

            <h5 style="text-align: left">Data Pribadi Calon Siswa</h5>
            <table style="font-size: 12px;">
                <tr><th>No. Pendaftaran</th><td>' . htmlspecialchars($student->id) . '</td></tr>
                <tr><th>Nama Lengkap</th><td>' . htmlspecialchars($student->nama_lengkap) . '</td></tr>
                <tr><th>Jenis Kelamin</th><td>' . htmlspecialchars($student->jenis_kelamin) . '</td></tr>
                <tr><th>Tempat, Tanggal Lahir</th><td>' . htmlspecialchars($student->tempat_lahir) . ', ' . htmlspecialchars($student->tanggal_lahir) . '</td></tr>
                <tr><th>Alamat</th><td>' . htmlspecialchars($student->alamat_lengkap) . '</td></tr>
                <tr><th>No. Telepon</th><td>' . htmlspecialchars($student->no_telepon) . '</td></tr>
                <tr><th>Email</th><td>' . htmlspecialchars($student->email) . '</td></tr>
                <tr><th>Tingkat Kelas</th><td>' . htmlspecialchars($program->nama_program) . '</td></tr>
                <tr><th>Tingkat Pendidikan</th><td>' . htmlspecialchars($registration->tingkat_pendidikan) . '</td></tr>
                <tr><th>Kelas Yang Dipilih</th><td>' . htmlspecialchars($registration->kelas) . '</td></tr>
            </table>

            <h5 style="text-align: left">Data Orang Tua</h5>
            <table style="font-size: 12px;">
                <tr><th>Nama Orang Tua</th><td>' . htmlspecialchars($orangtua->nama_orang_tua) . '</td></tr>
                <tr><th>Pekerjaan</th><td>' . htmlspecialchars($orangtua->pekerjaan_orang_tua) . '</td></tr>
                <tr><th>No. Telepon Orang Tua</th><td>' . htmlspecialchars($orangtua->no_telepon_orang_tua) . '</td></tr>
                <tr><th>Alamat Orang Tua</th><td>' . htmlspecialchars($orangtua->alamat_orang_tua) . '</td></tr>
            </table>

            <h5 style="text-align: left">Data Sekolah</h5>
            <table style="font-size: 12px;">
                <tr><th>Nama Sekolah</th><td>' . htmlspecialchars($student->nama_sekolah) . '</td></tr>
                <tr><th>Minat/ Prestasi</th><td>' . htmlspecialchars($student->jurusan) . '</td></tr>
                <tr><th>Tahun Lulus</th><td>' . htmlspecialchars($student->tahun_lulus) . '</td></tr>
                <tr><th>NEM</th><td>' . htmlspecialchars($student->nilai_rata_rata) . '</td></tr>
            </table>

            <!-- Tambahkan halaman baru -->
            <div class="page-break"></div>

            <!-- Konten untuk halaman kedua (LAMPIRAN) -->
        <div class="center">
            <h2>LAMPIRAN</h2>

            <h3>Foto Diri</h3>
            <img src="' . url("storage/" . $student->foto) . '" class="image-center" style="width: 60%; max-height: 60vh; object-fit: cover;" alt="Foto Diri">
            
            <!-- Page Break to ensure each image goes to the next page -->
            <div style="page-break-after: always;"></div>

            <h3>KTP</h3>
            <img src="' . url("storage/" . $student->ktp) . '" class="image-center" style="width: 60%; max-height: 60vh; object-fit: cover;" alt="KTP">
            
            <div style="page-break-after: always;"></div>

            <h3>Ijazah</h3>
            <img src="' . url("storage/" . $student->ijazah) . '" class="image-center" style="width: 60%; max-height: 60vh; object-fit: cover;" alt="Ijazah">
            
            <div style="page-break-after: always;"></div>

            <h3>Transkrip Nilai</h3>
            <img src="' . url("storage/" . $student->transkrip_nilai) . '" class="image-center" style="width: 60%; max-height: 60vh; object-fit: cover;" alt="Transkrip Nilai">
            
            <div style="page-break-after: always;"></div>

            <h3>Surat Rekomendasi</h3>
            <img src="' . url("storage/" . $student->surat_rekomendasi) . '" class="image-center" style="width: 60%; max-height: 60vh; object-fit: cover;" alt="Surat Rekomendasi">
        </div>

        </body>
        </html>';


        // Set konten HTML
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Simpan PDF ke file
        $output = $dompdf->output();
        $pdfFileName = 'Pendaftaran_' . $student->nama_lengkap . '.pdf';

        // Buat folder jika belum ada
        $pdfFolderPath = public_path('storage/uploads/pdf');
        if (!file_exists($pdfFolderPath)) {
            mkdir($pdfFolderPath, 0777, true);
        }

        // Simpan file PDF
        $filePath = $pdfFolderPath . '/' . $pdfFileName;
        file_put_contents($filePath, $output);

        session(['pdf_file_name' => $pdfFileName]);
    }
}
