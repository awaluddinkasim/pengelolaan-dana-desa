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

<x-layout title="Pengeluaran">

    <x-ui.card>


        <!-- Modal toggle -->
        <button data-modal-target="form-modal" data-modal-toggle="form-modal"
            class="block mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah Data
        </button>

        <x-ui.modal id="form-modal" title="Tambah Pengeluaran">
            <form action="{{ route('pengeluaran.store') }}" method="post" autocomplete="off">
                @csrf
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <x-form.input label="Tahun Anggaran" id="tahun" name="tahun_anggaran" :required="true" />
                    <x-form.input type="date" label="Tanggal Pengeluaran" id="tanggal" name="tanggal_pengeluaran"
                        :required="true" />
                    <x-form.input label="Penerima" id="penerima" name="penerima" :required="true" />
                    <x-form.textarea name="keterangan" label="Keterangan" id="keterangan"
                        :required="true"></x-form.textarea>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                    <button data-modal-hide="form-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Tutup
                    </button>
                </div>
            </form>
        </x-ui.modal>

        <x-form.errors />


        <table id="datatable">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Tahun Anggaran
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Pengeluaran
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Penerima
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
                @foreach ($daftarPengeluaran as $pengeluaran)
                    <tr>
                        <td>{{ $pengeluaran->tahun_anggaran }}</td>
                        <td>{{ Carbon\Carbon::parse($pengeluaran->tanggal_pengeluaran)->isoFormat('DD MMMM Y') }}</td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pengeluaran->penerima }}</td>
                        <td>Rp. {{ number_format($pengeluaran->details->sum('jumlah')) }}</td>
                        <td>
                            <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700"
                                onclick="document.location.href= '{{ route('pengeluaran-detail.index', $pengeluaran->id) }}'">
                                Detail
                            </button>
                            <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="post"
                                class="inline">
                                @csrf
                                @method('delete')
                                <button
                                    class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-ui.card>
</x-layout>
