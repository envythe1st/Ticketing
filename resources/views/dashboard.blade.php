<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard User') }}
            </h2>
        </center>
        <div>
            <a href="{{ route('user.ticket') }}">See Ticket</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div>
                        <a href="{{ route('profile.show') }}"
                            class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">My Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
