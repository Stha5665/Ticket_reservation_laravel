
@extends('layouts.frontendLayout')
@section('content') 
<div class="d-flex flex-row" style="width: 90vw;">

    <div class="d-flex flex-column flex-shrink-0 p-2 bg-light" style="width: 90%;">
        <h1 class="text-center">Ticket List</h1>
        <div class="row" style="margin-top: 20px">
               <div class="col-md-12 ">
                   <div class="card">
    
                       <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Price</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Departure</th>
                                        <th>Bus Name</th>
                                        <th>Ticket Remaining</th>
                                        <th class="col-md-3">No of tickets</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tickets as $ticket) 
                                    <tr>
                                        <td>{{$ticket->id  }}</td>
                                        <td>{{$ticket->price  }}</td>
                                        <td>{{ $ticket->route->origin }}</td>
                                        <td>{{ $ticket->route->destination }}</td>
                                        <td>{{ $ticket->depart_date_time }}</td>
                                        <td>{{$ticket->bus->name }}</td>
                                        <td>{{$ticket->bus->seat_capacity }}</td>
                                        <td>
                                            <!-- <div class="d-flex"> -->
                                                <form action="" method="POST">
                                                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                       
                                                    <input type="number" class="form-control" name="ticket_quantity" min="1" max="{{$ticket->bus->seat_capacity}}" required />
                                                    <button type="submit" class="btn btn-sm btn-outline-success m-1" onclick="return confirm('Are you sure you want to Book the ticket ?')"><i class="fa fa-book">Book</i></button>
                                                </form>
                                            <!-- </div> -->

                                        </td>
                                       
                                        <td>
                                            <a href="/tickets/book/" class="btn btn-sm btn-outline-success m-1"><i class="fa fa-book">Book</i></a>
                                            
                                            <a href="/public/bus/getBusDetails?id=" class="btn btn-sm btn-outline-success mt-1">Bus<i class="fa fa-bus" style="margin-left: 2px;" ></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection