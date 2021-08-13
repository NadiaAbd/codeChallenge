<?php

namespace App\Http\Controllers;
use App\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tickets::latest()->paginate(5);
    
        return view('tickets.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'category' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'description' => 'required'
        ]);
    
        Tickets::create($request->all());
     
        return redirect()->route('tickets.index')
                        ->with('success','Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $ticket)
    {
        return view('tickets.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $ticket)
    {
        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $ticket)
    {
        $request->validate([
            'category' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'description' => 'required'
        ]);
    
        $ticket->update($request->all());
    
        return redirect()->route('tickets.index')
                        ->with('success','Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $ticket)
    {
        $ticket->delete();
    
        return redirect()->route('tickets.index')
                        ->with('success','Ticket deleted successfully');
    }
}
