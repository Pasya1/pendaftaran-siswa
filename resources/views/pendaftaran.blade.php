<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function formHandler() {
            return {
                step: 1,
                next() {
                    const currentStep = document.querySelector(`[x-show="step === ${this.step}"]`);
                    const requiredFields = currentStep.querySelectorAll(
                        'input[required], select[required], textarea[required]'
                    );

                    let allFilled = this.checkRequiredFields(requiredFields);

                    // Memeriksa validitas email hanya pada step 1
                    let emailValid = true;
                    if (this.step === 1) { // Validasi hanya pada step 1
                        const emailInput = currentStep.querySelector('input[type="email"]');
                        emailValid = emailInput && emailInput.value.includes('@') && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(
                            emailInput.value);
                    }

                    if (allFilled && emailValid && this.step < 5) {
                        this.step++;
                    } else if (!allFilled) {
                        alert("Harap lengkapi semua field yang wajib diisi sebelum melanjutkan.");
                    } else if (!emailValid && this.step === 1) {
                        alert("Format email tidak valid. Harap periksa kembali email Anda.");
                    }
                },
                previous() {
                    if (this.step > 1) this.step--;
                },
                submitForm() {
                    const currentStep = document.querySelector(`[x-show="step === ${this.step}"]`);
                    const requiredFields = currentStep.querySelectorAll(
                        'input[required], select[required], textarea[required]'
                    );

                    let allFilled = this.checkRequiredFields(requiredFields);

                    if (allFilled) {
                        // Menampilkan konfirmasi sebelum submit hanya jika syarat terpenuhi
                        const confirmSubmit = confirm("Apakah Anda yakin ingin mengirimkan form ini?");
                        if (confirmSubmit) {
                            // Hanya submit jika checkbox terms disetujui
                            const termsCheckbox = document.getElementById('termsCheckbox');
                            if (termsCheckbox.checked) {
                                document.querySelector('form').submit();
                            } else {
                                alert("Anda harus menyetujui syarat dan ketentuan sebelum mengirimkan data.");
                            }
                        }
                    } else {
                        alert("Harap lengkapi semua field yang wajib diisi sebelum mengirimkan form.");
                    }
                },
                checkRequiredFields(fields) {
                    let allFilled = true;
                    fields.forEach(field => {
                        if (!field.value) {
                            allFilled = false;
                            field.classList.add(
                                'border-red-500'); // Menambahkan border merah pada field yang kosong
                        } else {
                            field.classList.remove(
                                'border-red-500'); // Menghapus border merah jika field sudah terisi
                        }
                    });
                    return allFilled;
                }
            }
        }
    </script>

    <style>
        input[type=text]:focus {
            border-color: <?=$site->secondary_color ?>;
        }

        input[type=textarea]:focus {
            border-color: <?=$site->secondary_color ?>;
        }

        input[type=date]:focus {
            border-color: <?=$site->secondary_color ?>;
        }

        input[type=email]:focus {
            border-color: <?=$site->secondary_color ?>;
        }

        select:focus {
            border-color: <?=$site->secondary_color ?>;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: <?=$site->secondary_color ?>;
            color: <?=$site->primary_color ?>;
        }

        input[type="checkbox"]:checked {
            background-color: <?=$site->secondary_color ?>;
            border-color: <?=$site->secondary_color ?>;
        }
    </style>


</head>

<body class="font-rubik">
    <x-navbar :site="$site" />
    <main class="pb-[20rem] md:pb-0 lg:pb-0">
        <div class="container-fluid" x-data="formHandler()">
            <section id="daftar" class="relative left-0 w-full h-screen bg-cover bg-center px-4 md:px-0 -top-[100px]"
                style="background-image: url('{{ Storage::url($site->background) }}')">
                <div class="absolute inset-0 bg-gradient-to-b from-white/0 to-white/95 bg-black/60 backdrop-blur-[2px]">
                </div>
                <div class="bg-white shadow-lg rounded-[32px] py-3 max-w-4xl mx-auto relative top-[8rem]">

                    <h1 class="text-center text-2xl font-semibold mb-3">Form Pendaftaran</h1>

                    <!-- Tab Navigation -->
                    <ul style="background-color: {{ $site->secondary_color ?? '#EBD3F8' }}"
                        class="flex justify-center rounded-[32px] h-[9rem] py-3 md:space-x-[3rem] space-x-1 mb-6 md:text-sm text-[9px]">
                        <li>
                            <button @click="step = 1" :disabled="step < 1" :class="step === 1 ?"
                                class="text-white p-1 md:px-2 px-1 rounded-[32px]"
                                :style="{
                                    backgroundColor: step === 1 ? '{{ $site->primary_color ?? '#AD49E1' }}' :
                                        '{{ $site->primary_color }}',
                                    opacity: step < 1 ? 0.7 : 1
                                }">Data
                                Pribadi</button>
                        </li>
                        <li>
                            <button @click="step = 2" :disabled="step < 2" :class="step === 2 ?"
                                class="text-white p-1 md:px-2 px-1 rounded-[32px]"
                                :style="{
                                    backgroundColor: step === 2 ? '{{ $site->primary_color ?? '#AD49E1' }}' :
                                        '{{ $site->primary_color }}',
                                    opacity: step < 2 ? 0.7 : 1
                                }">Data
                                Pendidikan</button>
                        </li>
                        <li>
                            <button @click="step = 3" :disabled="step < 3" :class="step === 3 ?"
                                class="text-white p-1 md:px-2 px-1 rounded-[32px]"
                                :style="{
                                    backgroundColor: step === 3 ? '{{ $site->primary_color ?? '#AD49E1' }}' :
                                        '{{ $site->primary_color }}',
                                    opacity: step < 3 ? 0.7 : 1
                                }">Data
                                Wali</button>
                        </li>
                        <li>
                            <button @click="step = 4" :disabled="step < 4" :class="step === 4 ?"
                                class="text-white p-1 md:px-2 px-1 rounded-[32px]"
                                :style="{
                                    backgroundColor: step === 4 ? '{{ $site->primary_color ?? '#AD49E1' }}' :
                                        '{{ $site->primary_color }}',
                                    opacity: step < 4 ? 0.7 : 1
                                }">Data
                                Dokumen</button>
                        </li>
                        <li>
                            <button @click="step = 5" :disabled="step < 5" :class="step === 5 ?"
                                class="text-white p-1 md:px-2 px-1 rounded-[32px]"
                                :style="{
                                    backgroundColor: step === 5 ? '{{ $site->primary_color ?? '#AD49E1' }}' :
                                        '{{ $site->primary_color }}',
                                    opacity: step < 5 ? 0.7 : 1
                                }">Akademik
                                Pilihan</button>
                        </li>
                    </ul>

                </div>
                <div class="bg-white shadow-lg rounded-[32px] p-8 max-w-4xl mx-auto relative top-[0rem]">

                    <!-- Form Content -->
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Data Pribadi -->
                        <div x-show="step === 1">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div>
                                    <label for="namaLengkap" class="block text-sm font-light text-gray-700">Nama
                                        Lengkap</label>
                                    <input type="text" id="namaLengkap" name="nama_lengkap" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1">
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label for="jenisKelamin" class="block text-sm font-light text-gray-700">Jenis
                                        Kelamin</label>
                                    <select id="jenisKelamin" name="jenis_kelamin" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1">
                                        <option></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <!-- Tempat Lahir -->
                                <div>
                                    <label for="tempatLahir" class="block text-sm font-light text-gray-700">Tempat
                                        Lahir</label>
                                    <input type="text" id="tempatLahir" name="tempat_lahir" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>

                                <!-- Tanggal Lahir -->
                                <div>
                                    <label for="tanggalLahir" class="block text-sm font-light text-gray-700">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tanggalLahir" name="tanggal_lahir" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>

                                <!-- No Telepon -->
                                <div>
                                    <label for="noTelepon" class="block text-sm font-light text-gray-700">No
                                        Telepon</label>
                                    <!-- Input nomor telepon -->
                                    <input type="text" id="noTelepon" name="no_telepon" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>

                                <!-- Email -->
                                <div x-data="{
                                    email: '',
                                    emailValid: false,
                                    emailTouched: false, // Menandakan apakah pengguna sudah mulai mengetik di kolom email
                                    validateEmail() {
                                        this.emailTouched = true; // Set touched menjadi true saat input dimulai
                                        this.emailValid = this.email.includes('@') && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email);
                                    }
                                }">
                                    <label for="email" class="block text-sm font-light text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" required x-model="email"
                                        @input="validateEmail"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        x-bind:class="emailValid || !emailTouched ? '' : 'border-red-500'">
                                    <p x-show="!emailValid && emailTouched" class="text-red-500 text-xs mt-1">Format
                                        email tidak valid.</p>
                                </div>


                                <!-- Alamat Lengkap -->
                                <div>
                                    <label for="alamatLengkap" class="block text-sm font-light text-gray-700">Alamat
                                        Lengkap</label>
                                    <textarea id="alamatLengkap" name="alamat_lengkap" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        rows="2"></textarea>
                                </div>

                                <!-- Kode Pos -->
                                <div>
                                    <label for="kodePos" class="block text-sm font-light text-gray-700">Kode
                                        Pos</label>
                                    <input type="text" id="kodePos" name="kode_pos" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1  font-light">
                                </div>
                            </div>
                        </div>

                        <!-- Data Pendidikan -->
                        <div x-show="step === 2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Sekolah -->
                                <div>
                                    <label for="namaSekolah" class="block text-sm font-light text-gray-700">Nama
                                        Sekolah Pendidikan Terakhir</label>
                                    <input type="text" id="namaSekolah" name="nama_sekolah" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>

                                <!-- Jurusan -->
                                <div>
                                    <label for="jurusan" class="block text-sm font-light text-gray-700">Minat/
                                        Prestasi</label>
                                    <input type="text" id="jurusan" name="jurusan" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>
                                <!-- Tahun Lulus -->
                                <div>
                                    <label for="tahun_lulus" class="block text-sm font-light text-gray-700">Tahun
                                        Lulus</label>
                                    <input type="number" id="tahun_lulus" name="tahun_lulus" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        min="1900" max="2099"
                                        title="Masukkan tahun dengan 4 digit, misal: 2024">
                                </div>


                                <!-- Nilai NEM -->
                                <div>
                                    <label for="rata_rata" class="block text-sm font-light text-gray-700">Nilai
                                        NEM</label>
                                    <input type="number" id="rata_rata" name="nilai_rata_rata" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        step="0.01" min="0" max="100"
                                        title="Masukkan nilai NEM berupa angka, misal: 39.85" placeholder="39.85">
                                </div>



                            </div>
                        </div>

                        <!-- Data Wali -->
                        <div x-show="step === 3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Wali -->
                                <div>
                                    <label for="namaWali" class="block text-sm font-light text-gray-700">Nama Orang
                                        Tua
                                        Wali</label>
                                    <input type="text" id="namaWali" name="nama_orang_tua" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>

                                {{-- Pekerjaan Orang Tua --}}
                                <div>
                                    <label for="pekerjaanOrangtua"
                                        class="block text-sm font-light text-gray-700">Pekerjaan Orang Tua
                                    </label>
                                    <input type="text" id="pekerjaanOrangtua" name="pekerjaan_orang_tua" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                </div>
                                <!-- No Telepon Wali -->
                                <div>
                                    <label for="noTeleponWali" class="block text-sm font-light text-gray-700">No
                                        Telepon Orang Tua</label>
                                    <!-- Input nomor telepon -->
                                    <input type="text" id="noTeleponWali" name="no_telepon_orang_tua" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>

                                {{-- Alamat Orang tua --}}
                                <div>
                                    <label for="alamatOrangtua" class="block text-sm font-light text-gray-700">Alamat
                                        Lengkap Orang Tua</label>
                                    <textarea id="alamatOrangtua" name="alamat_orang_tua" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light"
                                        rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Data Dokumen -->
                        <div x-show="step === 4">
                            <div class="grid gap-2">
                                {{-- Foto Diri --}}
                                <label for="fotoDiri" class="block text-sm font-light text-gray-700 mt-3">
                                    Foto 3x4
                                </label>
                                <input type="file" name="foto_diri" required
                                    class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        hover:file:opacity-85 hover:file:text-white
                                    "
                                    id="fotoDiri" />
                                {{-- KTP --}}
                                <label for="KTP" class="block text-sm font-light text-gray-700 mt-7">
                                    KTP (Bagian Depan)
                                </label>
                                <input type="file" name="ktp" required
                                    class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-[#AD49E1]
                                        hover:file:opacity-85 hover:file:text-white
                                    "
                                    id="KTP" />
                                {{-- Ijazah --}}
                                <label for="ijazah" class="block text-sm font-light text-gray-700 mt-7">
                                    Ijazah
                                </label>
                                <input type="file" name="ijazah" required
                                    class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-[#AD49E1]
                                        hover:file:opacity-85 hover:file:text-white
                                    "
                                    id="ijazah" />

                                {{-- Transkrip Nilai --}}
                                <label for="transkripNilai" class="block text-sm font-light text-gray-700 mt-7">
                                    Transkrip Nilai
                                </label>
                                <input type="file" name="transkrip_nilai" required
                                    class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-[#AD49E1]
                                        hover:file:opacity-85 hover:file:text-white
                                    "
                                    id="transkripNilai" />

                                {{-- Surat Rekomendasi --}}
                                <label for="suratRekomendasi" class="block text-sm font-light text-gray-700 mt-7">
                                    Surat Rekomendasi (Jika Ada)
                                </label>
                                <input type="file" name="surat_rekomendasi"
                                    class="block mb-7 w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-[#AD49E1]
                                        hover:file:opacity-85 hover:file:text-white
                                    "
                                    id="suratRekomendasi" />


                            </div>
                        </div>

                        <!-- Data Akademik Pilihan -->
                        <div x-show="step === 5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- Program Studi Pilihan --}}
                                <div>
                                    <label for="programStudipilihan"
                                        class="block text-sm font-light text-gray-700">Tingkat Kelas</label>
                                    <select id="programStudipilihan" name="program_studi_pilihan" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                        <option></option>
                                        <option value="kelas7">Kelas 7 (Siswa Baru)</option>
                                        <option value="kelas8">Kelas 8 (Siswa Pindahan)</option>
                                        <option value="kelas9">Kelas 9 (Siswa Pindahan)</option>
                                    </select>
                                </div>
                                {{-- Tingkat Pendidikan --}}
                                <div>
                                    <label for="tingkatPendidikan"
                                        class="block text-sm font-light text-gray-700">Tingkat
                                        Pendidikan</label>
                                    <select id="tingkatPendidikan" name="tingkat_pendidikan" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                        <option></option>
                                        <option value="mts">Madrasah Tsanawiyah</option>
                                    </select>
                                </div>
                                {{-- Kelas yang dipilih --}}
                                <div>
                                    <label for="programKelas" class="block text-sm font-light text-gray-700">Kelas
                                        Yang
                                        Dipilih</label>
                                    <select id="programKelas" name="program_kelas" required
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 font-light">
                                        <option></option>
                                        <option value="reguler">Reguler</option>
                                        <option value="beasiswa">Beasiswa</option>
                                        <option value="online">Online</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between mt-5">
                            <button type="button" @click="previous()" x-show="step >= 1"
                                class="bg-gray-300 text-white py-2 px-4 mr-2 w-[27rem] rounded-lg hover:bg-gray-400 disabled:opacity-50">Sebelumnya</button>
                            <button type="button" @click="next()" x-show="step < 5" x-bind:disabled="!emailValid"
                                style="background-color: {{ $site->primary_color ?? '#AD49E1' }}"
                                class="text-white py-2 px-4 ms-2 w-[27rem] rounded-lg hover:opacity-85">Selanjutnya</button>
                            <button id="openModalButton"type="button" x-show="step === 5"
                                class=" text-white py-2 px-4 ms-2 w-[27rem] rounded-lg hover:opacity-85"
                                style="background-color: {{ $site->primary_color ?? '#AD49E1' }}">Submit</button>
                        </div>
                        <!-- Modal -->
                        <div id="confirmationModal"
                            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                            <div id="modalContent"
                                class="bg-white rounded-[32px] p-6 md:px-4 px-4 w-[40rem] relative">

                                <!-- Modal Content -->
                                <h2 class="text-lg font-bold text-gray-800 mb-4">Peringatan !</h2>
                                <p class="text-sm text-gray-600">
                                    Pastikan semua informasi yang Anda isi sudah benar! Setelah Anda mengirimkan data
                                    ini, perubahan tidak akan dapat dilakukan secara langsung.
                                </p>
                                <ul class="list-disc ml-5 text-sm text-gray-600 my-4">
                                    <li>Periksa kembali nama lengkap, email, program studi yang dipilih, dan data
                                        penting lainnya.</li>
                                    <li>Pastikan dokumen yang Anda unggah sudah sesuai dengan persyaratan.</li>
                                </ul>
                                <p class="text-sm text-gray-600 mb-4">
                                    Jika Anda sudah yakin, klik tombol di bawah ini untuk menyimpan data Anda secara
                                    aman. Data Anda
                                    akan kami lindungi dan gunakan sesuai dengan kebijakan privasi kami.
                                </p>

                                <!-- Checkbox Terms -->
                                <div class="flex items-center mb-4">
                                    <input id="termsCheckbox" type="checkbox"
                                        style="border-color: {{ $site->primary_color ?? '#AD49E1' }}"
                                        class="mr-2 w-4 h-4 border-2 appearance-none rounded focus:outline-none checked:bg-purple-600 checked:border-purple-600">
                                    <label for="termsCheckbox" class="text-sm text-gray-600">I agree to all the <a
                                            href="#" class="underline"
                                            style="color: {{ $site->primary_color ?? '#AD49E1' }}">Terms</a> and <a
                                            href="#" class=" underline"
                                            style="color: {{ $site->primary_color ?? '#AD49E1' }}">Privacy
                                            Policy</a></label>
                                </div>

                                <p class="mb-2 text-sm font-bold">Anda yakin untuk menyimpan data?</p>

                                <!-- Buttons -->
                                <div class="flex space-x-2">
                                    <button id="ubahDataButton"
                                        class="bg-gray-300 text-sm text-gray-600 px-4 py-2 rounded-[40px] w-[10rem] hover:opacity-80"
                                        type="button" disabled>Ubah Data</button>
                                    <button id="simpanDataButton"
                                        style="color: {{ $site->primary_color ?? '#AD49E1' }}; background-color: {{ $site->secondary_color ?? '#EBD3F8' }}"
                                        class=" text-sm  px-4 py-2 rounded-[40px] w-[10rem] hover:opacity-80"
                                        type="submit" disabled>Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>


        </div>
    </main>
    <x-footer :site="$site" />
</body>

</html>
<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        let programStudipilihan = document.getElementById('programStudipilihan').value;
        let tingkatPendidikan = document.getElementById('tingkatPendidikan').value;
        let programKelas = document.getElementById('programKelas').value;

        if (programStudipilihan && tingkatPendidikan && programKelas) {
            document.getElementById('confirmationModal').classList.remove('hidden');
        } else {
            alert('Harap isi semua field yang diperlukan sebelum melanjutkan!');
        }
    });

    document.getElementById('ubahDataButton').addEventListener('click', function() {
        document.getElementById('confirmationModal').classList.add('hidden');
    });

    // Prevent closing modal by clicking outside the modal content
    document.getElementById('confirmationModal').addEventListener('click', function(event) {
        if (event.target === this) {
            this.classList.add('hidden');
        }
    });


    document.getElementById('termsCheckbox').addEventListener('change', function() {
        let isChecked = this.checked;
        document.getElementById('ubahDataButton').disabled = !isChecked;
        document.getElementById('simpanDataButton').disabled = !isChecked;
    });
</script>
