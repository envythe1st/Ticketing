<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </center>
        <div>
            <a href="{{ route('admin.dashboard') }}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <div class="text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" class="w-32 h-32 rounded-full mx-auto">
                @else
                    <img src="https://via.placeholder.com/150" class="w-32 h-32 rounded-full mx-auto">
                @endif
                <h2 class="text-xl font-semibold mt-4">{{ $user->name }}</h2>
                <p class="text-gray-600 mt-2">{{ $user->bio }}</p>
                <a href="{{ route('profile.edit') }}"
                    class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">Edit Profile</a>
            </div>
        </div>
    </div>
</x-app-layout>
