<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
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
                                        {{ $kode_kelas[$krs->kelas_id] }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $kode_matkul[$krs->kelas_id] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $nama_matkul[$krs->kelas_id] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-8">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pertemuan Ke
                                        </th>
                                        <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Materi
                                        </th>
                                        <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kehadiran
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pertemuans as $key=>$pertemuan)
                                <tr>
                                    <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $pertemuan->tanggal}}
                                    </td>
                                    <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $pertemuan->pertemuan_ke}}
                                    </td>
                                    <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $pertemuan->materi}}
                                    </td>
                                    <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @foreach ($absensi as $absen)
                                            @if ($absen->pertemuan_id==$pertemuan->pertemuan_id)
                                                Hadir
                                            @else
                                                Tidak Hadir
                                            @endif
                                        @endforeach

                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    <div class="flex space-x-8 mt-8">
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
