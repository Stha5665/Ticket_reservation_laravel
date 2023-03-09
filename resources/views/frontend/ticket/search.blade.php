@extends('layouts.frontendLayout')
@section('content') 
        <div class="d-flex flex-row" style="width: 80vw; margin-top: 40px;">   
            <div class="card bg-light" style="width: 50%">
                <div class="card-header">
                    <h3>Search Ticket</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('ticket.show') }}" method="GET">
                    
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Origin</label>
                                <select class="form-select" name="origin">
                                    
                                    @foreach ($tickets as $ticket) 
                                            
                                    <option value="{{$ticket->route->origin}}"> {{ $ticket->route->origin }}</option>;
                                            
                                    @endforeach
                                
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Destination</label>
                                <select class="form-select" name="destination">
                                    @foreach ($tickets as $ticket) 
                                    <option value="{{$ticket->route->destination}}">{{ $ticket->route->destination }}</option>;      
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                        </div>
                            
                    </form>
                </div>
           
            </div>
        
        </div>
@endsection