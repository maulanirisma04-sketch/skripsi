<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard - Praktik Mandiri Bidan Fitriana
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HEADER CARD -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    Selamat Datang 👋
                </h3>
                <p class="text-gray-600 mt-1">
                    Sistem Informasi Rekam Medis Praktik Mandiri Bidan Fitriana
                </p>
            </div>

            <!-- MENU GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- PASIEN -->
                <a href="/pasien" class="bg-blue-500 hover:bg-blue-600 text-white p-6 rounded-xl shadow">
                    <h4 class="text-lg font-bold">Data Pasien</h4>
                    <p class="text-sm mt-1">Kelola data pasien</p>
                </a>

                <!-- KUNJUNGAN -->
                <a href="/kunjungan" class="bg-green-500 hover:bg-green-600 text-white p-6 rounded-xl shadow">
                    <h4 class="text-lg font-bold">Kunjungan</h4>
                    <p class="text-sm mt-1">Input pemeriksaan pasien</p>
                </a>

                <!-- REKAM MEDIS -->
                <a href="/rekam-medis" class="bg-purple-500 hover:bg-purple-600 text-white p-6 rounded-xl shadow">
                    <h4 class="text-lg font-bold">Rekam Medis</h4>
                    <p class="text-sm mt-1">Data pemeriksaan pasien</p>
                </a>

                <!-- OBAT -->
                <a href="/obat" class="bg-red-500 hover:bg-red-600 text-white p-6 rounded-xl shadow">
                    <h4 class="text-lg font-bold">Obat & Stok</h4>
                    <p class="text-sm mt-1">Manajemen obat</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>