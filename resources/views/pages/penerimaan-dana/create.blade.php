<x-layout title="Input Penerimaan Dana">
    <x-ui.card>
        <x-form.errors />

        <form action="{{ route('penerimaan-dana.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <div class="col-span-2">
                    <x-form.input name="tahun_anggaran" label="Tahun Anggaran" id="tahun" :required="true" />
                </div>
                <x-form.input name="sumber_dana" label="Sumber Dana" id="sumber_dana" :required="true" />
                <x-form.select name="apbd_id" label="APBD" id="apbd_id">
                    @foreach ($daftarAPBD as $apbd)
                        <option value="{{ $apbd->id }}">{{ $apbd->nomor_perdes }} - Tahun {{ $apbd->tahun }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.input type="date" name="tanggal_penerimaan" label="Tanggal Penerimaan" id="tanggal"
                    :required="true" />
                <x-form.input name="jumlah" label="Jumlah" id="jumlah" :required="true" />
            </div>
            <button type="submit"
                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-ui.card>
</x-layout>
