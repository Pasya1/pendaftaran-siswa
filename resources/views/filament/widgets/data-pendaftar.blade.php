<x-filament::widget>
    <x-filament::card class="w-full">
        <h2 class="text-xl font-bold mb-4">Data Pendaftar</h2>
        <div class="overflow-x-auto">
            <table
                class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden text-center justify-center items-center">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Siswa
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tingkat Kelas
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tingkat Pendidikan
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Program Kelas
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrasi as $registration)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $registration->student->id }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $registration->student->nama_lengkap }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                {{ $registration->program->nama_program }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                {{ $registration->tingkat_pendidikan }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                {{ $registration->kelas }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::card>
</x-filament::widget>
