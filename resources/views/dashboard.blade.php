<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b bg-green-100 border-gray-200 sm:rounded-lg">
                        <h1 class="text-center text-bold mt-8 text-xl">WELCOME TO</h1>
                        <h1 class="text-center text-bold mt-4 mb-8 text-xl">SISTEM INFORMASI REKAPITULASI PERKULIAHAN</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
