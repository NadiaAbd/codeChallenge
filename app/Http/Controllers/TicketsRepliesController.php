<?php

namespace App\Http\Controllers;
use App\TicketsReplies;
use Illuminate\Http\Request;

class TicketsRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TicketsReplies::latest()->paginate(5);
    
        return view('ticketsReplies.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticketsReplies.create');
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
            'content' => 'required',
        ]);
    
        TicketsReplies::create($request->all());
     
        return redirect()->route('ticketsReplies.index')
                        ->with('success','Ticket Replies created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketsReplies  $ticketsReplies
     * @return \Illuminate\Http\Response
     */
    public function show(TicketsReplies $ticketsReply)
    {
        return view('ticketsReplies.show',compact('ticketsReply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketsReplies $ticketsReplies
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketsReplies $ticketsReply)
    {
        return view('ticketsReplies.edit',compact('ticketsReply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketsReplies $ticketsReplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketsReplies $ticketsReplies)
    {
        $request->validate([
            'content' => 'required'
        ]);
    
        $ticketsReplies->update($request->all());
    
        return redirect()->route('ticketsReplies.index')
                        ->with('success','Ticket Replies updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketsReplies $ticketsReplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketsReplies $ticketsReplies)
    {
        $ticketsReplies->delete();
    
        return redirect()->route('ticketsReplies.index')
                        ->with('success','Ticket Replies deleted successfully');
    }
}
