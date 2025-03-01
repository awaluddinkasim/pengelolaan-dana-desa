@push('scripts')
    <script type="module">
        new DataTable("#datatable", {
            searchable: true,
        });
    </script>

    @if (Session::has('success'))
        <script type="module">
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ Session::get('success') }}',
            })
        </script>
    @endif
@endpush

<x-layout title="Penerimaan Dana">

    <x-ui.card>
        <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700 mb-3"
            onclick="document.location.href= '{{ route('penerimaan-dana.create') }}'"> Tambah Data
        </button>

        <table id="datatable">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Sumber Dana
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            APBD
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tahun Anggaran
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Penerimaan
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Jumlah
                        </span>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPenerimaanDana as $penerimaanDana)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $penerimaanDana->sumber_dana }}
                        </td>
                        <td>{{ $penerimaanDana->apbd?->nomor_perdes ?? '-' }}</td>
                        <td>{{ $penerimaanDana->tahun_anggaran }}</td>
                        <td>{{ Carbon\Carbon::parse($penerimaanDana->tanggal_penerimaan)->isoFormat('DD MMMM Y') }}</td>
                        <td>Rp. {{ number_format($penerimaanDana->jumlah) }}</td>
                        <td>
                            <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700"
                                onclick="document.location.href= '{{ route('penerimaan-dana.edit', $penerimaanDana->id) }}'">
                                Edit
                            </button>
                            <form action="{{ route('penerimaan-dana.destroy', $penerimaanDana->id) }}" method="post"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-ui.card>
</x-layout>
