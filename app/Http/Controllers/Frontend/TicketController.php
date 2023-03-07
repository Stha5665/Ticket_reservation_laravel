<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Route;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::get();
        return view('frontend.ticket.search', compact('tickets'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $route = Route::where(['origin' => $request->origin, 'destination' => $request->destination])->first();
        
        // $route = Route::where(['origin' => $request->origin, 'destination' => $request->destination])->first('id');
        // $tickets = Ticket::where('route_id', $route->id)->get();

        $tickets = $route->ticket;
        return view('frontend.ticket.index', compact('tickets'));
    }

    public function book(Ticket $ticket){

        dd($ticket);
        return view('frontend.ticket.book', compact('ticket'));
    

    }

}
