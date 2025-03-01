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

<x-layout title="Publikasi">

    <x-ui.card>


        <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700 mb-3"
            onclick="document.location.href= '{{ route('pengguna.create') }}'"> Tambah Data
        </button>


        <table id="datatable">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Email
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nama
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Terdaftar
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Role
                        </span>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->email }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            @if (auth()->user()->id == $user->id)
                                <button class="rounded-lg bg-indigo-300 text-white py-2 px-4  disabled" disabled>
                                    Edit
                                </button>
                                <button class="rounded-lg bg-red-300 text-white py-2 px-4  disabled" disabled>
                                    Hapus
                                </button>
                            @else
                                <button class="rounded-lg bg-indigo-600 text-white py-2 px-4 hover:bg-indigo-700"
                                    onclick="document.location.href= '{{ route('pengguna.edit', $user->id) }}'"> Edit
                                </button>
                                <form action="{{ route('pengguna.destroy', $user->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{-- @foreach ($daftarPublikasi as $publikasi)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $publikasi->judul }}</td>
                        <td>{{ $publikasi->jenis_publikasi }}</td>
                        <td>{{ $publikasi->tahun_anggaran }}</td>
                        <td>{{ Carbon\Carbon::parse($publikasi->tanggal_publikasi)->isoFormat('DD MMMM Y') }}</td>
                        <td>
                            <form action="{{ route('publikasi.destroy', $publikasi->id) }}" method="post"
                                class="inline">
                                @csrf
                                @method('delete')
                                <button class="rounded-lg bg-red-600 text-white py-2 px-4 hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                @endforeach --}}
            </tbody>
        </table>
    </x-ui.card>
</x-layout>
