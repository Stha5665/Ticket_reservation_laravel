@extends('layouts.admin')
@empty($ticket)
    @section('title', 'AddTicket')
    @section('page', 'Ticket / Add')
@endempty
@isset($ticket)
    @section('title', 'EditTicket')
    @section('page', 'Ticket / Edit')
@endisset
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    @empty($ticket)
                    <h5 class="card-title">Add Ticket</h5>
                    <form action="{{url('/admin/ticket') }}" method="POST" class="row g-3">
                    @endempty

                    @isset($ticket)
                    <h5 class="card-title">Update Ticket</h5>
                    <form action="{{url('/admin/ticket/'.$ticket->id) }}" method="POST" class="row g-3">
                    @method('PUT')
                    @endisset
                        @csrf

                        <div class="col-md-6">
                            <div class="">
                                <label>Select Bus</label>
                                <select name="bus_id" class="form-control">
                                    @foreach($buses as $bus)
                                        <option @isset($ticket->bus_id){{ $ticket->bus_id == $bus->id ? 'selected' : ''}}@endisset value="{{$bus->id}}">{{$bus->name}}</option>
                                    @endforeach
                                </select>
                                @error('bus') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label>Select Route</label>
                                <!-- If isset ticket->route_id returns the ticket route_id. And if that ticket route_id matches with given route, selected will be added -->
                                <select name="route_id" class="form-control">
                                    @foreach($routes as $route)
                                        <option @isset($ticket->route_id) {{ $ticket->route_id == $route->id ? 'selected' : ''}}@endisset value="{{$route->id}}"> {{$route->origin}} - {{$route->destination}}</option>
                                    @endforeach
                                </select>
                                @error('route_id') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div>
                                <label> Selling Price</label>
                                <input type="number" name="price" class="form-control" step=".01" value="{{$ticket->price ?? ''}}" />
                                @error('price') 
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label>Depart Date</label>
                                <input type="datetime-local" class="form-control" name="depart_date_time" value="{{$ticket->depart_date_time ?? ''}}" required />
                            
                                @error('depart_date_time') 
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection