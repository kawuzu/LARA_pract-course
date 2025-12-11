<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            {{ __('Профиль пользователя') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Обновление информации --}}
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <h3 class="text-lg font-medium mb-4">Личные данные</h3>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Имя</label>
                        <input type="text" name="name" class="mt-1 w-full border rounded p-2"
                               value="{{ old('name', auth()->user()->name) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" class="mt-1 w-full border rounded p-2"
                               value="{{ old('email', auth()->user()->email) }}">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Сохранить
                    </button>
                </form>
            </div>

            {{-- Изменение пароля --}}
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <h3 class="text-lg font-medium mb-4">Изменить пароль</h3>

                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Новый пароль</label>
                        <input type="password" name="password" class="mt-1 w-full border rounded p-2">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Изменить
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
