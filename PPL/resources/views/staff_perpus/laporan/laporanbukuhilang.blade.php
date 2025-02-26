<x-staffperpustakaan-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Laporan Buku Hilang</h1>
        
        <!-- Filter rentang bulan dan tahun -->
        <form action="{{ route('staff_perpus.laporan.laporanbukuhilang') }}" method="GET" class="mb-6" id="filter-form">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Filter Bulan Awal -->
                <div>
                    <label for="bulan_awal" class="block text-sm font-medium text-gray-700">Bulan Awal</label>
                    <select name="bulan_awal" id="bulan_awal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1" {{ $bulan_awal == 1 ? 'selected' : '' }}>Januari</option>
                        <option value="2" {{ $bulan_awal == 2 ? 'selected' : '' }}>Februari</option>
                        <option value="3" {{ $bulan_awal == 3 ? 'selected' : '' }}>Maret</option>
                        <option value="4" {{ $bulan_awal == 4 ? 'selected' : '' }}>April</option>
                        <option value="5" {{ $bulan_awal == 5 ? 'selected' : '' }}>Mei</option>
                        <option value="6" {{ $bulan_awal == 6 ? 'selected' : '' }}>Juni</option>
                        <option value="7" {{ $bulan_awal == 7 ? 'selected' : '' }}>Juli</option>
                        <option value="8" {{ $bulan_awal == 8 ? 'selected' : '' }}>Agustus</option>
                        <option value="9" {{ $bulan_awal == 9 ? 'selected' : '' }}>September</option>
                        <option value="10" {{ $bulan_awal == 10 ? 'selected' : '' }}>Oktober</option>
                        <option value="11" {{ $bulan_awal == 11 ? 'selected' : '' }}>November</option>
                        <option value="12" {{ $bulan_awal == 12 ? 'selected' : '' }}>Desember</option>
                    </select>
                </div>

                <!-- Filter Tahun Awal -->
                <div>
                    <label for="tahun_awal" class="block text-sm font-medium text-gray-700">Tahun Awal</label>
                    <input type="number" name="tahun_awal" id="tahun_awal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $tahun_awal }}">
                </div>

                <!-- Filter Bulan Akhir -->
                <div>
                    <label for="bulan_akhir" class="block text-sm font-medium text-gray-700">Bulan Akhir</label>
                    <select name="bulan_akhir" id="bulan_akhir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1" {{ $bulan_akhir == 1 ? 'selected' : '' }}>Januari</option>
                        <option value="2" {{ $bulan_akhir == 2 ? 'selected' : '' }}>Februari</option>
                        <option value="3" {{ $bulan_akhir == 3 ? 'selected' : '' }}>Maret</option>
                        <option value="4" {{ $bulan_akhir == 4 ? 'selected' : '' }}>April</option>
                        <option value="5" {{ $bulan_akhir == 5 ? 'selected' : '' }}>Mei</option>
                        <option value="6" {{ $bulan_akhir == 6 ? 'selected' : '' }}>Juni</option>
                        <option value="7" {{ $bulan_akhir == 7 ? 'selected' : '' }}>Juli</option>
                        <option value="8" {{ $bulan_akhir == 8 ? 'selected' : '' }}>Agustus</option>
                        <option value="9" {{ $bulan_akhir == 9 ? 'selected' : '' }}>September</option>
                        <option value="10" {{ $bulan_akhir == 10 ? 'selected' : '' }}>Oktober</option>
                        <option value="11" {{ $bulan_akhir == 11 ? 'selected' : '' }}>November</option>
                        <option value="12" {{ $bulan_akhir == 12 ? 'selected' : '' }}>Desember</option>
                    </select>
                </div>

                <!-- Filter Tahun Akhir -->
                <div>
                    <label for="tahun_akhir" class="block text-sm font-medium text-gray-700">Tahun Akhir</label>
                    <input type="number" name="tahun_akhir" id="tahun_akhir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $tahun_akhir }}">
                </div>

                <div class="flex justify-center items-end">
                    <button type="submit" class="mt-4 w-full sm:w-auto bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Filter</button>
                </div>
            </div>
        </form>

        <h2 class="text-2xl font-semibold mb-4">Total Buku Hilang: <span class="text-indigo-600">{{ $jumlah_buku_hilang }}</span></h2>

        <!-- Tabel Daftar Buku Hilang -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6">Judul Buku</th>
                        <th class="py-3 px-6">Kode Peminjam</th>
                        <th class="py-3 px-6">Tanggal Peminjaman</th>
                        <th class="py-3 px-6">Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku_hilang as $transaksi)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $transaksi->buku->judul_buku }}</td>
                            <td class="py-3 px-6">{{ $transaksi->kode_peminjam }}</td>
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($transaksi->tgl_awal_peminjaman)->format('d F Y') }}</td>
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($transaksi->tgl_pengembalian)->format('d F Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3 text-red-500">
                                Tidak ada data buku hilang
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <br>
                <!-- Menampilkan tombol pagination -->
                <div class="pagination-container">
                    {{ $buku_hilang->links() }}
                </div>
    </div>

    <script>
        // Event listener untuk menangani penekanan tombol Enter
        document.getElementById('filter-form').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Mencegah aksi default Enter (seperti form submit biasa)
                this.submit(); // Kirim form ketika tombol Enter ditekan
            }
        });
    </script>
</x-staffperpustakaan-layout>
