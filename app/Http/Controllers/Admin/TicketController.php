<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('bus', 'route')->get();
        return view('admin.ticket.index')-> with(['tickets' => $tickets, 'i' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::get();
        $routes = Route::get();
        return view('admin.ticket.addUpdateForm')->with(['buses' => $buses, 'routes' => $routes,]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $validData = $request->validated();
    
        Ticket::create($validData);

        return redirect('admin/ticket')->with('message', 'Ticket Successfully Added !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $buses = Bus::get();
        $routes = Route::get();
        return view('admin.ticket.addUpdateForm', compact('ticket', 'buses', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $ticket_id)
    {
        $validData = $request->validated();

        // To find ticket if bus is available for that ticket
    
        // $ticket = Bus::findOrFail($validData['bus_id'])
        //         ->ticket()->where('id', $ticket_id)->first();

        $ticket = Ticket::findOrFail($ticket_id);
        $ticket -> update([
            'bus_id' => $validData['bus_id'],
            'route_id' => $validData['route_id'],
            'price' => $validData['price'],
            'depart_date_time' => $validData['depart_date_time'],
        ]);

        return redirect('admin/ticket')->with('message', 'Ticket Successfully Updated !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        if($ticket != null){
            $ticket -> delete();
            return redirect('admin/ticket')->with('message', 'Ticket Successfully Deleted !!');

        }
    }
}
