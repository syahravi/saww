@extends('layouts.home-app', ['title' => 'Data Nilai Akhir Santri'])

@section('content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">📊 Data Nilai Akhir Santri</h2>

        <!-- Input Pencarian -->
        <div class="flex justify-center mb-6">
            <input type="text" id="search" placeholder="🔍 Cari nama santri..."
                class="w-1/3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                onkeyup="filterSantri()">
        </div>

        <div class="overflow-hidden bg-white shadow-xl rounded-xl">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-green-600 to-green-500 text-white uppercase text-sm">
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama Santri</th>
                        <th class="px-6 py-4 text-left">Nilai Akhir</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="santriTable" class="bg-gray-50 text-gray-700">
                    @foreach ($nilaiAkhir as $key => $data)
                        <tr class="border-b border-gray-200 hover:bg-green-100 transition duration-300">
                            <td class="px-6 py-4 font-semibold">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 nama-santri">{{ $data->santri->nama_santri }}</td>
                            <td class="px-6 py-4 font-bold text-green-700">{{ number_format($data->nilai_akhir, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('penilaian.pdf', $data->santri->nama_santri) }}"
                                    class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-500 hover:scale-105 transition duration-300">
                                    📥 Download PDF
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('admin.hasil.pdf') }}"
                class="bg-gradient-to-r from-green-600 to-green-500 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:scale-105 transition duration-300">
                📥 Download Semua Data Rangking
            </a>
        </div>
    </div>

    <!-- Script untuk Filter Nama Santri -->
    <script>
        function filterSantri() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("#santriTable tr");

            rows.forEach(row => {
                let namaSantri = row.querySelector(".nama-santri").innerText.toLowerCase();
                if (namaSantri.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
@endsection
