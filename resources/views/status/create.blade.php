<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/status">
                        @csrf

                        <label for="url">Url</label>
                        <input id="url" name="url" type="text" class="@error('url') is-invalid @enderror">
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button :class="{ danger: isDeleting }">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
