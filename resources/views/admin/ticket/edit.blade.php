<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Ticket') }}
            </h2>
        </center>
        <p><a href="{{ route('admin.ticket.index') }}" class="btn btn-primary">Back</a></p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label>Group Name</label>
                    <input type="text" name="group_name" class="form-control" value="{{ $ticket->group_name }}"
                        required>
                </div>

                <div>
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $ticket->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" value="{{ $ticket->status }}"
                        required>
                </div>

                <div>
                    <label>Details</label>
                    <textarea name="details" class="form-control" required>{{ $ticket->details }}</textarea>
                </div>

                <div>
                    <label>Handled By</label>
                    <select name="handled_by" class="form-control">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $ticket->handled_by == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Sender</label>
                    <input type="text" name="sender" class="form-control" value="{{ $ticket->sender }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
