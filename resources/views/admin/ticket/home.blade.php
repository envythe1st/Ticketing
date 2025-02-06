<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ticketing List') }}
            </h2>
        </center>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
            <span class="text-muted">|</span>
            <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary">Create Ticket</a>
        </div>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Ticket</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center mt-2">
                    <form method="GET" action="{{ route('admin.ticket.index') }}" class="flex gap-2">
                        <input type="text" name="search" placeholder="Search by ID, Group, Category, Status..."
                            class="form-input" value="{{ request()->get('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <table class="table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Group Name</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Details</th>
                            <th class="px-4 py-2">Handled By</th>
                            <th class="px-4 py-2">Sender</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">updated At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr id="ticket-{{ $ticket->id }}">
                                <td class="border px-4 py-2">{{ $ticket->id }}</td>
                                <td class="border px-4 py-2">{{ $ticket->group_name }}</td>
                                <td class="border px-4 py-2">{{ $ticket->category->category_name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $ticket->status }}</td>
                                <td class="border px-4 py-2">{{ $ticket->details }}</td>
                                <td class="border px-4 py-2">{{ $ticket->handledBy->name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $ticket->sender }}</td>
                                <td class="border px-4 py-2">{{ $ticket->created_at }}</td>
                                <td class="border px-4 py-2">{{ $ticket->updated_at }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('admin.ticket.edit', $ticket->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <span class="text-muted">|</span>
                                    <form action="{{ route('admin.ticket.delete', $ticket->id) }}" method="POST"
                                        style="display:inline-block;" id="delete-ticket-form-{{ $ticket->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript for handling delete request -->
    <script>
        const deleteForms = document.querySelectorAll('form[id^="delete-ticket-form-"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const ticketId = this.id.split('-')[3];

                document.getElementById(`ticket-${ticketId}`).remove();

                fetch(this.action, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}',
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Ticket deleted successfully.');
                        } else {
                            alert('An error occurred while deleting the ticket.');
                        }
                    })
                    .catch(error => {
                        alert('An error occurred.');
                    });
            });
        });
    </script>
</x-app-layout>
