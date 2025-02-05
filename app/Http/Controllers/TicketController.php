<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //HOME
    public function index()
    {
        $tickets = Ticket::with(['category', 'handledBy'])->get();

        if (Auth::user()->m_role == 'admin') {
            return view('admin.ticket.home', compact('tickets'));
        } else {
            return view('home', compact('tickets'));
        }
    }



    //CREATE
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.ticket.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:m_category,id',
            'status' => 'required|string|max:50',
            'details' => 'required|string',
            'handled_by' => 'nullable|exists:users,id',
            'sender' => 'required|string|max:200',
        ]);

        Ticket::create($request->all());

        return redirect()->route('admin.ticket.create')->with('success', 'Ticket created successfully.');
    }

    //EDIT OR UPDATE
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        return view('admin.ticket.edit', compact('ticket', 'categories', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:m_category,id',
            'status' => 'required|string|max:50',
            'details' => 'required|string',
            'handled_by' => 'nullable|exists:users,id',
            'sender' => 'required|string|max:200',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'group_name' => $request->group_name,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'handled_by' => $request->handled_by,
            'details' => $request->details,
            'sender' => $request->sender,
        ]);

        return redirect()->route('admin.ticket.edit', $id)->with('success', 'Ticket updated successfully!');
    }

    //SOFT DELETE
    public function delete($id)
    {
        // Temukan tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        return response()->json(['success' => true]);
    }
}
