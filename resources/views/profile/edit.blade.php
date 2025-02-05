<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Profile') }}
            </h2>
        </center>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700">{{ __('Bio') }}</label>
                    <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="mt-4">
                    <label for="photo"
                        class="block text-sm font-medium text-gray-700">{{ __('Profile Photo') }}</label>
                    <input type="file" name="photo" id="photo" class="mt-1 block w-full">
                    @if ($user->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $user->photo) }}" class="w-24 h-24 rounded-full">
                        </div>
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md">{{ __('Save Changes') }}</button>
                    <a href="{{ route('profile.show') }}"
                        class="ml-4 px-4 py-2 bg-gray-600 text-white rounded-md">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
