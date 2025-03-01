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

<x-layout title="APBD">

    <x-ui.card>
        <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700 mb-3"
            onclick="document.location.href= '{{ route('apbd.create') }}'"> Tambah Data
        </button>

        <table id="datatable">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Nomor Perdes
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Perdes
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tahun APBD
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Total Pendapatan
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Total Belanja
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Total Pembiayaan
                        </span>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarAPBD as $apbd)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $apbd->nomor_perdes }}
                        </td>
                        <td>{{ Carbon\Carbon::parse($apbd->tanggal_perdes)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $apbd->tahun }}</td>
                        <td>Rp. {{ number_format($apbd->total_pendapatan) }}</td>
                        <td>Rp. {{ number_format($apbd->total_belanja) }}</td>
                        <td>Rp. {{ number_format($apbd->total_pembiayaan) }}</td>
                        <td>
                            <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700"
                                onclick="document.location.href= '{{ route('apbd.edit', $apbd->id) }}'"> Edit
                            </button>
                            <form action="{{ route('apbd.destroy', $apbd->id) }}" method="post" class="inline">
                                @csrf
                                @method('delete')
                                <button class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700"> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-ui.card>
</x-layout>
