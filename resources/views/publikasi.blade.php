<x-lp-layout>



    <div class="bg-indigo-200">

        <div class="mx-auto max-w-2xl py-24 sm:py-36 lg:py-42 ">
            <div class="text-center">
                <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">
                    Publikasi Desa
                </h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Dokumen resmi dan informasi
                    keuangan desa yang dipublikasikan untuk transparansi publik

                </p>
            </div>

        </div>
    </div>
    <div class="px-7 md:px-32 lg:px-56 xl:px-72 my-16">

        <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Publikasi</h3>

        @foreach ($daftarPublikasi as $publikasi)
            <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 mb-4">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-blue-500 text-white rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    {{ ucfirst($publikasi->jenis_publikasi) }}
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $publikasi->judul }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 line-clamp-3">
                            {{ $publikasi->deskripsi }}
                        </p>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Tanggal publikasi:
                            {{ Carbon\Carbon::parse($publikasi->tanggal_publikasi)->format('d M Y') }}
                        </div>
                        <a href="{{ asset('files/' . $publikasi->file) }}" download
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-lp-layout>
