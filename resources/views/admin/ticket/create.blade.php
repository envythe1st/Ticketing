<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Ticket') }}
            </h2>
        </center>
        <p><a href="{{ route('admin.ticket.index') }}" class="btn btn-primary">Back</a></p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('admin.ticket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700">Group Name</label>
                        <input type="text" name="group_name" class="form-control w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700">Category</label>
                        <select name="category_id" class="form-control w-full border-gray-300 rounded-lg">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700">Status</label>
                        <input type="text" name="status" class="form-control w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700">Details</label>
                        <textarea name="details" class="form-control w-full border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <div>
                        <label>Handled By</label>
                        <select name="handled_by" class="form-control">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700">Sender</label>
                        <input type="text" name="sender" class="form-control w-full border-gray-300 rounded-lg" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
