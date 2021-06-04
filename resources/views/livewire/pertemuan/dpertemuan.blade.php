<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="block mb-8">
            <a role="button" wire:click="showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-4 -3 28 28"><path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"></path></svg>
            Upload CSV</a>
        </div>

        @if($isOpen)
            @include('livewire.pertemuan.form1')
        @endif

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Kelas
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Matkul
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Matkul
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $kode_kelas[$dpertemuan->kelas_id] }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $kode_matkul[$dpertemuan->kelas_id] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $nama_matkul[$dpertemuan->kelas_id] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NIM
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status Kehadiran
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jam Masuk
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jam Keluar
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Durasi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($absensi as $key=>$absen)
                            <tr>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $nim[$krs_id[$absen->krs_id]]}}
                                </td>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $nama[$krs_id[$absen->krs_id]]}}
                                </td>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @foreach ($absensi as $absen)
                                            @if ($absen->pertemuan_id==$dpertemuan->pertemuan_id)
                                                Hadir
                                            @else
                                                Tidak Hadir
                                            @endif
                                        @endforeach
                                </td>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $absen->jam_masuk}}
                                </td>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $absen->jam_keluar}}
                                </td>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $absen->durasi}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                    </div>

                    <div class="mt-8">
                        <a href="javascript:history.back()" role="button" class="ml-8 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-1 0 21 20"><path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"></path></svg>
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>