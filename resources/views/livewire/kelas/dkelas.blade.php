<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

        @if(session()->has('info'))
            <div class="bg-green-500 mb-4 py-2 px-6">
                <div>
                    <h1 class="text-white text-sm">{{ session('info') }}</h1>
                </div>
            </div>
        @endif

        @if(session()->has('delete'))
            <div class="bg-green-500 mb-4 py-2 px-6">
                <div>
                    <h1 class="text-white text-sm">{{ session('delete') }}</h1>
                </div>
            </div>
        @endif

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th colspan="2" scope="col" width="50" class="font-bold px-6 py-3 bg-green-100 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"> DETAIL KELAS {{$dkelas->kode_kelas}}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Kelas
                                    </th>
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$dkelas->kode_kelas}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Mata Kuliah
                                    </th>
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$dkelas->kode_matkul}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Mata Kuliah
                                    </th>
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$dkelas->nama_matkul}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tahun
                                    </th>
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$dkelas->tahun}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Semester
                                    </th>
                                    @if($dkelas->semester==1)
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{'Ganjil'}}
                                    </td>
                                    @elseif($dkelas->semester==2)
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{'Genap'}}
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        SKS
                                    </th>
                                    <td scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$dkelas->sks}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex space-x-8 mt-8">
                        <a href="javascript:history.back()" role="button" class="ml-8 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-1 0 21 20"><path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"></path></svg>
                            Kembali
                        </a>
                        <a onclick="location.href=' {{ route( 'dmahasiswa', [$this->kelasId]) }} '" role="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 1 24 25"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Detail Mahasiswa
                        </a>
                        <!-- belum diganti -->
                        <a onclick="location.href=' {{ route( 'pertemuan', [$this->kelasId]) }} '" role="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 -2 20 23"><path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path></svg>
                            Detail Pertemuan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
