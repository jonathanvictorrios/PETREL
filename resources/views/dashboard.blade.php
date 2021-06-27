<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
<<<<<<< HEAD
            {{ __('Dashboard') }}
=======
            {{ __('Principal') }}
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<<<<<<< HEAD
                <x-jet-welcome />
=======
                <!-- <x-jet-welcome /> -->
                @include('home')
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
            </div>
        </div>
    </div>
</x-app-layout>
