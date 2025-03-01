<x-layout title="Edit Pengguna">
    <div class="grid lg:grid-cols-2 gap-4">
        <img src="{{ asset('assets/images/pengguna.svg') }}" alt="" class="hidden lg:block w-2/3 xl:w-1/2 mx-auto">
        <x-ui.card>
            <x-form.errors />

            <form action="{{ route('pengguna.update', $user) }}" method="post" autocomplete="off">
                @method('PUT')
                @csrf
                <x-form.input label="Nama" id="nama" name="nama" :value="$user->nama" :required="true" />
                <x-form.input label="Email" id="email" name="email" :value="$user->email" :required="true" />
                <x-form.input label="Ganti Password" id="password" name="password" type="password" />
                <x-form.select label="Role" id="role" name="role">
                    <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                    <option value="operator" @if ($user->role == 'operator') selected @endif>Operator</option>
                </x-form.select>

                <button type="submit"
                    class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </x-ui.card>
    </div>
</x-layout>
