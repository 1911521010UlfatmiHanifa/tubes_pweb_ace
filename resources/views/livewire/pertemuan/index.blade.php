<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="block mb-8">
            <a role="button" wire:click="showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="-4 -3 28 28"><path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"></path></svg>
                Tambah Pertemuan</a>
        </div>

        @if($isOpen)
            @include('livewire.pertemuan.form')
        @endif

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
                                <th scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pertemuan
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Materi
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pilihan
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pertemuans as $key=>$pertemuan)
                            <tr>
                                <td scope="col" width="50" class="font-bold px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{$key+1}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $pertemuan->pertemuan_ke }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $pertemuan->tanggal }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $pertemuan->materi }}
                                </td>
                                    <td>
                                        <button onclick="location.href=' {{ route( 'dpertemuan', [$pertemuan->pertemuan_id]) }} '" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Detail
                                        </button>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{$pertemuans->links()}}
                  </div>
                </div>
            </div>
        </div>

    </div>
</div>
