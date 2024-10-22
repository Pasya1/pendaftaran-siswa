<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body class="font-rubik">
    <x-navbar :site="$site" />


    <main>
        <div class="container-fluid">
            <section id="dashboard"
                class="relative left-0 w-full h-screen bg-cover bg-center -top-[100px] bg-gradient-to-b from-white/0 to-white/100 bg-black/60"
                style="background-image: url('{{ Storage::url($site->background) }}')">
                <div class="absolute inset-0 bg-gradient-to-b from-white/0 to-white/95 bg-black/60 backdrop-blur-[2px]">
                </div>
                <div class="flex flex-col md:flex-row relative text-white pt-60 px-4 md:pt-80 md:px-20">
                    <!-- Text Section -->
                    <div class="md:w-1/2 mb-10 md:mb-0 md:mt-0 mt-[6rem] text-center md:text-left">
                        <h1 class="text-2xl md:text-3xl font-bold">Selamat Datang</h1>
                        <h1 class="text-4xl md:text-5xl font-bold">Calon Siswa Baru</h1>
                    </div>

                    <!-- Empty Space (Optional) -->
                    <div class="md:w-1/3 flex justify-center ">
                        <div style="background-color: {{ $site->primary_color ?? '#AD49E1' }}"
                            class="box-border md:w-1 md:h-20 w-20 h-1 md:mt-0 -mt-[8rem] rounded">
                        </div>
                    </div>

                    <!-- Logo Section -->
                    <div class="md:w-1/2 flex md:-mt-5 md:mr-10 -mt-[18rem]">
                        <img class="h-40 md:h-[8rem] h-[5rem] w-auto" src="{{ Storage::url($site->logo) }}"
                            alt="Your Company">
                        <h1 class="text-3xl md:text-5xl md:ms-5 md:mt-3 font-bold">{{ $site->universitas }}</h1>
                    </div>
                </div>
            </section>

            <section class="-top-[5rem]" id="product">
                <div class="lg:ms-40">
                    <h2
                        class="md:text-4xl md:w-[30rem] w-[30rem] text-[#5D5D5D] font-semibold text-2xl w-[20rem] px-4 md:px-0">
                        Pilih
                        Jenis Kelas
                        Sesuai
                        Kebutuhanmu!
                    </h2>
                    <p class="text-gray-600 mt-4 md:text-2xl text-1xl px-4 md:px-0">Tentukan pilihanmu sekarang dan
                        mulai
                        langkah
                        menuju masa
                        depan
                        gemilang!
                    </p>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:mx-40 px-4 md:px-0 mb-[10rem] gap-8 mt-10">
                    <!-- Kelas Reguler -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4 flex justify-center items-center">
                            <img src="{{ asset('img/reguler_icon.png') }}" class="w-[7rem] h-15" alt="Kelas Reguler">
                        </div>
                        <h3 class="text-xl font-bold text-center">Kelas Reguler</h3>
                        <p class="text-gray-500 mt-2 text-center">Cocok untuk kamu yang ingin belajar dalam jadwal
                            kelas standar.</p>
                        <a href="/pendaftaran"style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                            class="block text-white mt-4 py-2 rounded-[10px]  text-center hover:opacity-85 transition ease-in-out">Daftar</a>
                    </div>

                    <!-- Kelas Beasiswa -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4 text-4xl flex justify-center items-center">
                            <img src="{{ asset('img/karyawan_icon.png') }}" class="w-[7rem] h-15" alt="Kelas Karyawan">
                        </div>
                        <h3 class="text-xl font-bold text-center">Beasiswa</h3>
                        <p class="text-gray-500 mt-2 text-center">Daftarkan dirimu melalui jalur beasiswa dan dapatkan
                            benefitnya.</p>
                        <a href="/pendaftaran" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                            class="block text-white mt-4 py-2 rounded-[10px] text-center hover:opacity-85 transition ease-in-out">Daftar</a>
                    </div>

                    <!-- Kelas Online -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4 text-4xl flex justify-center items-center">
                            <img src="{{ asset('img/online_icon.png') }}" class="w-[6rem] h-15" alt="Kelas Online">
                        </div>
                        <h3 class="text-xl font-bold text-center">Kelas Online</h3>
                        <p class="text-gray-500 mt-2 text-center">Belajar dari mana saja dan kapan saja dengan kelas
                            berbasis digital.</p>
                        <a href="/pendaftaran" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                            class="block text-white mt-4 py-2 rounded-[10px] text-center hover:opacity-85 transition ease-in-out">Daftar</a>
                    </div>
                </div>

            </section>

            <section class="lg:mx-40 lg:my-[25rem] md:px-0 px-4 mb-10" id="contact">
                <div style="background-color: {{ $site->primary_color ?? '#AD49E1' }}"
                    class="flex flex-col md:flex-row items-start p-6 rounded-[32px] space-y-6 md:space-y-0 md:space-x-8">

                    <!-- Section Kontak -->
                    <div class="text-white space-y-4 flex-1">
                        <h2 class="text-2xl font-bold">Get in Touch</h2>
                        <p>Butuh Bantuan? Hubungi Kami!</p>

                        <div class="flex items-center space-x-4">
                            <div class="rounded-full w-8 h-8 flex items-center justify-center"
                                style="background-color: {{ $site->secondary_color }}; flex-shrink: 0; overflow: hidden;">
                                <img src="{{ asset('img/Phone.png') }}" class="w-5 h-5" alt="">
                            </div>
                            <span class="whitespace-normal">{{ $site->no_telepon_perusahaan }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="rounded-full w-8 h-8 flex items-center justify-center"
                                style="background-color: {{ $site->secondary_color }}; flex-shrink: 0; overflow: hidden;">
                                <img src="{{ asset('img/Mail.png') }}" class="w-5 h-5" alt="">
                            </div>
                            <span class="whitespace-normal">{{ $site->email_perusahaan }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="rounded-full w-8 h-8 flex items-center justify-center"
                                style="background-color: {{ $site->secondary_color }}; flex-shrink: 0; overflow: hidden;">
                                <img src="{{ asset('img/Location.png') }}" class="w-5 h-5" alt="">
                            </div>
                            <span class="whitespace-normal">{{ $site->alamat_perusahaan }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="rounded-full w-8 h-8 flex items-center justify-center"
                                style="background-color: {{ $site->secondary_color }}; flex-shrink: 0; overflow: hidden;">
                                <img src="{{ asset('img/Clock.png') }}" class="w-5 h-5" alt="">
                            </div>
                            <span class="whitespace-normal">{{ $site->jam_operasional_perusahaan }}</span>
                        </div>
                    </div>

                    <!-- Section Google Map -->
                    <div class="flex-shrink-0 w-full md:w-[36rem] h-[18rem]">
                        <div style="outline-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                            class="outline rounded-lg outline-[1.5rem] outline-purple-300 h-full">
                            <iframe src="{{ $site->google_maps_embed_code }}" width="100%" height="100%"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>





        </div>

        <x-footer :site="$site" />



    </main>

</body>

</html>
