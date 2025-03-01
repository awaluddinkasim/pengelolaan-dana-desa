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


<x-layout title="Detail Pengeluaran">
    <div class="grid md:grid-cols-5 gap-4">
        <div class="col-span-2">
            <x-ui.card>
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Tahun Anggaran</h4>
                <p class="mb-3">{{ $pengeluaran->tahun_anggaran }}</p>

                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Tanggal Pengeluaran</h4>
                <p class="mb-3">{{ Carbon\Carbon::parse($pengeluaran->tanggal)->isoFormat('D MMMM Y') }}</p>

                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Penerima</h4>
                <p class="mb-3">{{ $pengeluaran->penerima }}</p>

                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Jumlah Pengeluaran</h4>
                <p class="mb-3"> Rp. {{ number_format($pengeluaran->details->sum('jumlah')) }}</p>

                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Keterangan</h4>
                <p class="mb-3">{{ $pengeluaran->keterangan }}</p>

            </x-ui.card>
        </div>

        <div class="col-span-3">
            <x-ui.card>
                <!-- Modal toggle -->
                <button data-modal-target="form-modal" data-modal-toggle="form-modal"
                    class="block mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Data
                </button>

                <x-ui.modal id="form-modal" title="Tambah Pengeluaran">
                    <form action="{{ route('pengeluaran-detail.store', $pengeluaran) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <x-form.input label="Uraian" id="uraian" name="uraian" :required="true" />
                            <x-form.input label="Volume" id="volume" name="volume" :required="true" />
                            <x-form.input label="Satuan" id="satuan" name="satuan" :required="true" />
                            <x-form.input label="Harga Satuan" id="harga_satuan" name="harga_satuan"
                                :required="true" />
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
                                    Uraian
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Volume
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Satuan
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Harga Satuan
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Total
                                </span>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarPengeluaranItem as $item)
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->uraian }}</td>
                                <td>{{ $item->volume }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>Rp. {{ number_format($item->harga_satuan) }}</td>
                                <td>Rp. {{ number_format($item->jumlah) }}</td>
                                <td>
                                    <form action="{{ route('pengeluaran-detail.destroy', [$pengeluaran, $item]) }}"
                                        method="post" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-ui.card>
        </div>
    </div>
</x-layout>
