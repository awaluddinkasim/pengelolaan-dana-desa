<x-layout title="Input APBD">
    <x-ui.card>
        <x-form.errors />

        <form action="{{ route('apbd.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <div class="col-span-2">
                    <x-form.input label="Tahun" id="tahun" name="tahun" :required="true" />
                </div>
                <x-form.input label="Nomor Perdes" id="nomor_perdes" name="nomor_perdes" :required="true" />
                <x-form.input label="Tanggal Perdes" type="date" id="tanggal_perdes" name="tanggal_perdes"
                    :required="true" />
                <div class="col-span-2">
                    <x-form.input label="Total Pendapatan" id="total_pendapatan" name="total_pendapatan"
                        :required="true" />
                </div>
                <x-form.input label="Total Belanja" id="total_belanja" name="total_belanja" :required="true" />
                <x-form.input label="Total Pembiayaan" id="total_pembiayaan" name="total_pembiayaan"
                    :required="true" />
            </div>
            <button type="submit"
                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-ui.card>
</x-layout>
