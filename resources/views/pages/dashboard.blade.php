<x-layout title="Dashboard">

    <!-- Kartu Informasi Utama -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Total Penerimaan -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 font-medium">Total Penerimaan</p>
                    <p class="text-xl font-semibold text-gray-800">Rp
                        {{ number_format($totalPenerimaan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Total Pengeluaran -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 font-medium">Total Pengeluaran</p>
                    <p class="text-xl font-semibold text-gray-800">Rp
                        {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Saldo Anggaran -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 font-medium">Saldo Anggaran</p>
                    <p class="text-xl font-semibold text-gray-800">Rp
                        {{ number_format($saldoAnggaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Penerimaan & Pengeluaran Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <!-- Penerimaan Dana Terbaru -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Penerimaan Dana Terbaru</h3>
            @if (count($penerimaanTerbaru) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sumber Dana</th>
                                <th scope="col"
                                    class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($penerimaanTerbaru as $penerimaan)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ Carbon\Carbon::parse($penerimaan->tanggal_penerimaan)->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ $penerimaan->sumber_dana }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 text-right">Rp
                                        {{ number_format($penerimaan->jumlah, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex justify-end">
                    <a href="{{ route('penerimaan-dana.index') }}"
                        class="text-sm text-blue-600 hover:text-blue-800">Lihat semua
                        penerimaan</a>
                </div>
            @else
                <div class="flex items-center justify-center h-48">
                    <p class="text-gray-500">Belum ada data penerimaan untuk tahun {{ $tahunAnggaran }}</p>
                </div>
            @endif
        </div>

        <!-- Pengeluaran Terbaru -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Pengeluaran Terbaru</h3>
            @if (count($pengeluaranTerbaru) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Penerima</th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Keterangan</th>
                                <th scope="col"
                                    class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pengeluaranTerbaru as $pengeluaran)
                                @php
                                    $total = 0;
                                    foreach ($pengeluaran->details as $detail) {
                                        $total += $detail->volume * $detail->harga_satuan;
                                    }
                                @endphp
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ Carbon\Carbon::parse($pengeluaran->tanggal_pengeluaran)->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ $pengeluaran->penerima }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ Str::limit($pengeluaran->keterangan, 30) }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 text-right">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex justify-end">
                    <a href="{{ route('pengeluaran.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Lihat
                        semua
                        pengeluaran</a>
                </div>
            @else
                <div class="flex items-center justify-center h-48">
                    <p class="text-gray-500">Belum ada data pengeluaran untuk tahun {{ $tahunAnggaran }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Publikasi Terbaru & Penerimaan Berdasarkan Sumber -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Penerimaan Berdasarkan Sumber -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Penerimaan Berdasarkan Sumber</h3>
            @if (count($penerimaanBySumber) > 0)
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sumber Dana</th>
                                <th scope="col"
                                    class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($penerimaanBySumber as $sumber)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                        {{ $sumber->sumber_dana }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 text-right">Rp
                                        {{ number_format($sumber->total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex items-center justify-center h-64">
                    <p class="text-gray-500">Belum ada data penerimaan untuk tahun {{ $tahunAnggaran }}</p>
                </div>
            @endif
        </div>

        <!-- Publikasi Terbaru -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Publikasi Terbaru</h3>
            @if (count($publikasiTerbaru) > 0)
                <div class="space-y-4">
                    @foreach ($publikasiTerbaru as $publikasi)
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center">
                                <div class="p-2 rounded-md bg-blue-100 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <p class="ml-2 text-xs text-gray-500 uppercase">
                                    {{ $publikasi->jenis_publikasi }}</p>
                            </div>
                            <h4 class="mt-2 text-sm font-medium text-gray-800">{{ $publikasi->judul }}</h4>
                            <p class="text-xs text-gray-500 mt-1">Dipublikasikan:
                                {{ Carbon\Carbon::parse($publikasi->tanggal_publikasi)->format('d M Y') }}</p>
                            <div class="mt-3">
                                <a href="{{ asset('files/' . $publikasi->file) }}" download
                                    class="text-xs text-blue-600 hover:text-blue-800 flex items-center">
                                    <span>Unduh File</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 flex justify-end">
                    <a href="{{ route('publikasi.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        Lihat semua publikasi
                    </a>
                </div>
            @else
                <div class="flex items-center justify-center h-48">
                    <p class="text-gray-500">Belum ada publikasi untuk tahun {{ $tahunAnggaran }}</p>
                </div>
            @endif
        </div>
    </div>

</x-layout>
