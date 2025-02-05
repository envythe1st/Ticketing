<x-app-layout>
    <x-slot name="header">
        <center>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ticketing List') }}
            </h2>
        </center>
        <div class="d-flex gap-2">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        </div>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Ticket</title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
