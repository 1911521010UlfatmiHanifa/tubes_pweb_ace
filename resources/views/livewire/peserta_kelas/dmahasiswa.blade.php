<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

        @if($isOpen)
            @include('livewire.peserta_kelas.form')
        @endif

        @if($isDel)
            @include('livewire.peserta_kelas.confirmation_delete')
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
                                        {{ $dkelas->kode_kelas }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $dkelas->kode_matkul }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $dkelas->nama_matkul }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="block mb-8 mt-8">
                        <a wire:click="showModal()" role="button" class="ml-8 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-4 -3 28 28"><path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"></path></svg>
                            Tambah Mahasiswa
                        </a>
                    </div>

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

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th scope="col" width="50" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No.
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NIM
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Mahasiswa
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="font-bold px-6 py-3 bg-green-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pilihan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($mahasiswas as $key => $mhs)
                                <tr>
                                    <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{$key+1}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $mhs->nim }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $mhs->nama }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $mhs->email }}
                                    </td>
                                    <td>
                                        <a wire:click="showDel({{ $mhs-> krs_id }})" role="button" class="ml-8 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-1 0 21 20"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></svg>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{$mahasiswas->links()}}
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
