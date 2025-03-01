@push('scripts')
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


<x-layout title="Akun Saya">
    <x-ui.card>

        <x-form.errors />

        <div class="md:flex">
            <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0"
                data-tabs-active-classes="text-white bg-indigo-700 dark:bg-blue-600"
                data-tabs-active-classes="bg-gray-50 hover:bg-gray-100" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li>
                    <button
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:cursor-pointer hover:text-gray-900 transition duration-300 bg-gray-100  hover:bg-indigo-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">
                        <i data-lucide="user" class="me-2"></i>

                        Profile
                    </button>
                </li>
                <li>
                    <button
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:cursor-pointer hover:text-gray-900 transition duration-300 bg-gray-100  hover:bg-indigo-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        data-tabs-target="#password" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">
                        <i data-lucide="lock-keyhole-open" class="me-2"></i>

                        Ganti Password
                    </button>
                </li>
            </ul>
            <div id="default-tab-content" class="flex-grow">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 " id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <form action="{{ route('account.update-profile') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf

                        <x-form.input label="Nama" id="nama" name="nama" :value="$user->nama"
                            :required="true" />
                        <x-form.input label="Email" id="email" name="email" :value="$user->email"
                            :required="true" />

                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="password" role="tabpanel"
                    aria-labelledby="password-tab">
                    <form action="{{ route('account.update-password') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <x-form.input type="password" label="Password Baru" id="password" name="password"
                            :required="true" />
                        <x-form.input type="password" label="Konfirmasi Password" id="password_confirmation"
                            name="password_confirmation" :required="true" />

                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-ui.card>


</x-layout>
