<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($status as $s)

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding-bottom:15px;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        {{ $s['url'] }} <br />
                        Status Code: {{ $s['status_code']}} <br />
                        @isset($s['body_response'])
                        Ultima consulta: {{ $s['lastUpdate'] }} <br />

                        <x-nav-link :href="route('render-status', $s['id'])">
                            {{ __('Visualiza corpo da mensagem') }}
                        </x-nav-link>
                        @endisset
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>
