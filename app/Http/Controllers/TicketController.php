<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use App\Models\Project;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $query = Ticket::with('ticketType', 'project');
    
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('title', 'like', '%' . $search . '%');
            });
        }
    
        $tickets = $query->get();
    
        return view('tickets.index', compact('tickets'));
    }
    

public function create()
{
    return view('tickets.create', [
        'ticketTypes' => TicketType::all(),
        'projects' => Project::all()
    ]);
}


public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ticket_type_id' => 'required|exists:ticket_types,id',
        'project_id' => 'required|exists:projects,id',
        'assign_at' => 'required|date',
    ]);

    $validated['status'] = 'open';

    Ticket::create($validated);

    // Setelah simpan, alihkan ke halaman daftar tiket
    return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dibuat.');
    
}



    public function edit($id)
{
    $ticket = Ticket::findOrFail($id);
    $ticketTypes = TicketType::all();
    $projects = Project::all();

    return view('tickets.edit', compact('ticket', 'ticketTypes', 'projects'));
}

public function update(Request $request, Ticket $ticket)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ticket_type_id' => 'required|exists:ticket_types,id',
        'project_id' => 'required|exists:projects,id',
        'assign_at' => 'required|date',
        'status' => 'required|in:open,progress,closed,cancel',
    ]);

    $ticket->update($request->all());

    return redirect()->route('admin.dashboard')->with('success', 'Tiket berhasil diperbarui.');
}


public function dashboard()
{
    $totalTickets = Ticket::count();

    $statusCounts = Ticket::select('status')
        ->selectRaw('count(*) as total')
        ->groupBy('status')
        ->pluck('total', 'status');

    $latestTickets = Ticket::with('ticketType', 'project')
        ->orderBy('assign_at', 'desc')
        ->limit(5)
        ->get();

    return view('admin.dashboard', compact('totalTickets', 'statusCounts', 'latestTickets'));
}

public function dashboardEdit(Ticket $ticket)
{
    return view('admin.dashboard', [
        'editTicket' => $ticket,
        'tickets' => Ticket::with('ticketType', 'project')->get(),
        'totalTickets' => Ticket::count(),
        'statusCounts' => Ticket::select('status')
            ->selectRaw('count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status'),
        'latestTickets' => Ticket::latest('assign_at')->take(5)->get(),
        'ticketTypes' => TicketType::all(),
        'projects' => Project::all()
    ]);
}


public function destroy(Ticket $ticket)
{
    $ticket->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Tiket berhasil dihapus.');
}



}
