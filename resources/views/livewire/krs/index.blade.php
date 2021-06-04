<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                            <tr>
                                <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kode Kelas
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kode Matkul
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Matkul
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pilihan
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($krses as $key=>$krs)
                            <tr>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{$key+1}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $kode_kelas[$krs->kelas_id] }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $kode_matkul[$krs->kelas_id] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $nama_matkul[$krs->kelas_id] }}
                                </td>
                                    <td>
                                        <!-- <button wire:click="edit({{ $krs->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Detail
                                        </button> -->
                                        <button onclick="location.href=' {{ route( 'dkrs', [$krs->krs_id]) }} '" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Detail
                                        </button>

                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{$krses->links()}}
                  </div>
                </div>
            </div>
        </div>

    </div>
</div>
