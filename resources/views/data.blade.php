<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-rubik">
    <x-navbar :site="$site" />
    @if (session('success'))
        <script>
            Swal.fire({
                html: `
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('img/Verified Account.png') }}" class="w-[7rem] h-[7rem] text-center mb-2">
                <h5 class="font-bold">Data Telah Disimpan</h5>
            </div>
        `,
                showCancelButton: true,
                confirmButtonText: `
            <div class="flex items-center">
                <img src="{{ asset('img/PDF_icon.png') }}" class="mr-1" style="width: 20px; height: 20px;"> Unduh Data PDF
            </div>
        `,
                cancelButtonText: `
            <div class="flex items-center justify-center text-center w-[100px] h-[20px]"> Close</div>
        `,
                allowOutsideClick: false,
                customClass: {
                    popup: 'rounded-[32px] p-8',
                    confirmButton: 'bg-[#D3FFDF] text-[#44C25F] px-4 py-2 mb-2 mx-2 w-30 outline-none rounded-lg hover:opacity-90',
                    cancelButton: 'bg-[#F8D3D3] text-[#E14949] px-4 py-2 mb-2 mx-2 w-30 rounded-lg hover:opacity-90'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    const pdfFileName = '{{ session('pdf_file_name') }}';
                    const pdfUrl = `/storage/uploads/pdf/${pdfFileName}`;
                    window.open(pdfUrl, '_blank');
                } else {
                    Swal.close();
                }
            });
        </script>
    @endif

    <main class="md:pb-[40rem] lg:pb-[40rem] pb-[155rem]">
        <div class="container-fluid">
            <section id="data_pendaftar_baru"
                class="relative left-0 w-full h-screen bg-cover bg-center -top-[100px] px-4 md:px-0"
                style="background-image: url('{{ Storage::url($site->background) }}')">
                <div class="absolute inset-0 bg-gradient-to-b from-white/0 to-white/95 bg-black/60 backdrop-blur-[2px]">
                </div>

                <div class="bg-white shadow-lg rounded-[32px] py-3 max-w-4xl mx-auto relative top-[8rem]">
                    <div class=" rounded-t-[32px] px-12 max-w-4xl py-3 relative -top-[15px]"
                        style="background-color: {{ $site->primary_color }}">
                        <h2 class="text-lg font-bold text-white">Data Pendaftaran Anda</h2>
                    </div>
                    <div class="text-sm px-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if ($student)
                            <div>
                                <label for="namaLengkap" class="block text-sm font-light text-gray-700">Nama
                                    Lengkap</label>
                                <input type="text" id="namaLengkap" name="nama_lengkap" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->nama_lengkap }}" readonly>
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-light text-gray-700">Jenis Kelamin
                                </label>
                                <input type="text" id="jenis_kelamin" name="jenis_kelamin" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->jenis_kelamin }}" readonly>
                            </div>
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-light text-gray-700">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->tempat_lahir }}" readonly>
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-light text-gray-700">Tanggal Lahir
                                </label>
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->tanggal_lahir }}" readonly>
                            </div>
                            <div>
                                <label for="no_telepon" class="block text-sm font-light text-gray-700">No Telepon
                                </label>
                                <input type="text" id="no_telepon" name="no_telepon" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->no_telepon }}" readonly>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-light text-gray-700">Email
                                </label>
                                <input type="text" id="email" name="email" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->email }}" readonly>
                            </div>
                            <div>
                                <label for="alamatLengkap" class="block text-sm font-light text-gray-700">Alamat
                                    Lengkap</label>
                                <textarea id="alamatLengkap" name="alamat_lengkap" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    rows="2" readonly>{{ $student->alamat_lengkap }}</textarea>
                            </div>
                            <div>
                                <label for="kode_pos" class="block text-sm font-light text-gray-700">Kode Pos
                                </label>
                                <input type="text" id="kode_pos" name="kode_pos" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->kode_pos }}" readonly>
                            </div>
                            <div>
                                <label for="nama_sekolah" class="block text-sm font-light text-gray-700">Nama
                                    Sekolah</label>
                                <input type="text" id="nama_sekolah" name="nama_sekolah" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->nama_sekolah }}" readonly>
                            </div>
                            <div>
                                <label for="jurusan" class="block text-sm font-light text-gray-700">Minat/ Prestasi
                                </label>
                                <input type="text" id="jurusan" name="jurusan" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->jurusan }}" readonly>
                            </div>
                            <div>
                                <label for="tahun_lulus" class="block text-sm font-light text-gray-700">Tahun Lulus
                                </label>
                                <input type="text" id="tahun_lulus" name="tahun_lulus" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->tahun_lulus }}" readonly>
                            </div>
                            <div>
                                <label for="rata_rata" class="block text-sm font-light text-gray-700">NEM </label>
                                <input type="text" id="rata_rata" name="rata_rata" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $student->nilai_rata_rata }}" readonly>
                            </div>
                        @endif

                        @if ($orangtua)
                            <div>
                                <label for="nama_orang_tua" class="block text-sm font-light text-gray-700">Nama Orang
                                    Tua/Wali
                                </label>
                                <input type="text" id="nama_orang_tua" name="nama_orang_tua" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $orangtua->nama_orang_tua }}" readonly>
                            </div>
                            <div>
                                <label for="pekerjaan_orang_tua"
                                    class="block text-sm font-light text-gray-700">Pekerjaan Orang Tua/Wali
                                </label>
                                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $orangtua->pekerjaan_orang_tua }}" readonly>
                            </div>
                            <div>
                                <label for="no_telepon_orang_tua" class="block text-sm font-light text-gray-700">Nomor
                                    Orang Tua/Wali
                                </label>
                                <input type="text" id="no_telepon_orang_tua" name="no_telepon_orang_tua" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $orangtua->no_telepon_orang_tua }}" readonly>
                            </div>
                            <div>
                                <label for="alamat_orang_tua" class="block text-sm font-light text-gray-700">Alamat
                                    Orang Tua/Wali</label>
                                <textarea id="alamat_orang_tua" name="alamat_orang_tua" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    rows="2" readonly>{{ $orangtua->alamat_orang_tua }}</textarea>
                            </div>
                        @endif
                    </div>
                    <div class="text-sm px-12 py-5 grid grid-cols-1 md:grid-cols-5 gap-4">
                        @if ($student)
                            @if ($student->foto)
                                <div class="flex flex-col items-center space-y-3">
                                    <a href="{{ asset('storage/' . $student->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Diri"
                                            class="rounded-lg shadow-md w-48 h-48 object-cover">
                                    </a>
                                    <p>Foto Diri</p>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <p>Foto Diri Tidak Tersedia</p>
                                </div>
                            @endif

                            @if ($student->ktp)
                                <div class="flex flex-col items-center space-y-3">

                                    <a href="{{ asset('storage/' . $student->ktp) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $student->ktp) }}" alt="Foto KTP"
                                            class="rounded-lg shadow-md w-48 h-48 object-cover">
                                    </a>
                                    <p>Foto KTP</p>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <p>Foto KTP Tidak Tersedia</p>
                                </div>
                            @endif

                            @if ($student->surat_rekomendasi)
                                <div class="flex flex-col items-center space-y-3">
                                    <a href="{{ asset('storage/' . $student->surat_rekomendasi) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $student->surat_rekomendasi) }}"
                                            alt="Foto Surat Rekomendasi"
                                            class="rounded-lg shadow-md w-48 h-48 object-cover">
                                    </a>
                                    <p>Foto Surat Rekomendasi</p>
                                </div>
                            @else
                                <div class="flex flex-col items-center text-center space-y-3">
                                    <div class="rounded-lg flex items-center justify-center mx-5 text-center shadow-md w-40 h-48 bg-white"
                                        title="Tidak Ada Foto">
                                        <span class="text-6xl text-gray-500" aria-label="Tidak Ada Foto"
                                            title="Tidak Ada Foto">X</span>
                                    </div>
                                    <p>Foto Surat Rekomendasi</p>
                                </div>
                            @endif
                        @else
                            <p>*Tidak Ada Foto.</p>
                        @endif
                        @if ($student->ijazah)
                            <div class="flex flex-col items-center space-y-3">

                                <a href="{{ asset('storage/' . $student->ijazah) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $student->ijazah) }}" alt="Foto Ijazah"
                                        class="rounded-lg shadow-md w-48 h-48 object-cover">
                                </a>
                                <p>Foto Ijazah</p>
                            </div>
                        @else
                            <div class="flex flex-col items-center">
                                <p>Foto Ijazah Tidak Tersedia</p>
                            </div>
                        @endif

                        @if ($student->transkrip_nilai)
                            <div class="flex flex-col items-center space-y-3">

                                <a href="{{ asset('storage/' . $student->transkrip_nilai) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $student->transkrip_nilai) }}"
                                        alt="Foto Transkrip Nilai"
                                        class="rounded-lg shadow-md w-48 h-48 object-cover">
                                </a>
                                <p>Foto Transkrip Nilai</p>
                            </div>
                        @else
                            <div class="flex flex-col items-center">
                                <p>Foto Transkrip Nilai Tidak Tersedia</p>
                            </div>
                        @endif


                    </div>
                    <div class="text-sm px-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if ($program)
                            <div>
                                <label for="nama_program" class="block text-sm font-light text-gray-700">Tingkat Kelas
                                </label>
                                <input type="text" id="nama_program" name="nama_program" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $program->nama_program }}" readonly>
                            </div>
                        @endif

                        @if ($registration)
                            <div>
                                <label for="tingkat_pendidikan" class="block text-sm font-light text-gray-700">Tingkat
                                    Pendidikan
                                </label>
                                <input type="text" id="tingkat_pendidikan" name="tingkat_pendidikan" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $registration->tingkat_pendidikan }}" readonly>
                            </div>
                            <div>
                                <label for="kelas" class="block text-sm font-light text-gray-700">Kelas
                                </label>
                                <input type="text" id="kelas" name="kelas" required
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                                    value="{{ $registration->kelas }}" readonly>
                            </div>
                        @endif
                    </div>


                    <div class="flex justify-center space-x-10 text-sm text-center my-12 px-4 md:px-0">
                        <!-- Tombol Kembali -->
                        <a href="/"
                            class="inline-block items-center justify-center text-center flex px-4 py-2 bg-gray-600 text-white w-[24rem] text-gray-100 rounded hover:opacity-90">
                            Kembali
                        </a>

                        <!-- Tombol Unduh PDF -->
                        @if (session('pdf_file_name'))
                            <a href="{{ url('storage/uploads/pdf/' . session('pdf_file_name')) }}"
                                class="inline-block font-bold px-4 py-2 bg-[#D3FFDF] text-[#44C25F] w-[24rem] rounded hover:opacity-85 flex justify-center items-center space-x-2"
                                target="_blank">
                                <img src="{{ asset('img/PDF_icon.png') }}" alt="PDF Icon" class="w-6 h-6">
                                <span>Unduh Data PDF</span>
                            </a>
                        @else
                            <p class="text-red-500">File PDF tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer :site="$site" />
</body>

</html>
