@extends('layouts.admin')
@section('title', 'Ticketpage')
@section('page', 'Ticket')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ticket List</h3>
                <a href="{{ url('admin/ticket/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="bi bi-ticket" style="margin-right:5px"></i><span>Add Ticket</span></a>

            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bus Name</th>
                    <th scope="col">Route</th>
                    <th scope="col">Price</th>
                    <th scope="col">Depart DateTime</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>  @forelse($tickets as $ticket)
                  <tr>
                    <th scope="row">{{ ++$i}}</th>
                    <td>{{$ticket->bus->name}}</td>
                    <td>{{$ticket->route->origin}} - {{$ticket->route->destination}}</td>
                    <td>{{$ticket->price}}</td>
                    <td>{{$ticket->depart_date_time}}</td>
                    <td class="d-flex">               
                      <a href="{{url('admin/ticket/'.$ticket->id.'/edit')}}" class="btn btn-sm btn-outline-success" ><i class="bi bi-pen"></i></a>
                      
                      <form action="{{ route('ticket.destroy', $ticket->id)}}" method="POST" style="margin-left:5px;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button> 
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <th scope="row" colspan="4">No Ticket Found</th>
                  </tr>
                  @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection