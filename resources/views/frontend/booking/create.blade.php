@extends('layouts.frontendLayout')
@section('content') 

        <div class="row">
            <div class="seat">
                <div class="card bg-light">
                    <div class="card-header">Seats</div>
                    <div class="card-body">
                        <form action="{{route('bookings.store')}}" method="POST">
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                            <div class="row">
                                @csrf
                                <div class="col-md-5">
                                    <p class="text-center">Left (Doorside)</p>
                                    @for ($i=1; $i <= $ticket->bus->seat_capacity/2; $i+=2)
                                    <ul class="seats">
                                        
                                        <li><input type="checkbox" name="tickets[{{$i}}]" value="{{$i}}" @foreach ($bookings as $booking )
                                            @if($booking->seat_no == $i)
                                                {{'disabled checked'}}
                                            @endif
                                        @endforeach><label>{{$i}}</label></li>
                                        <li><input type="checkbox" name="tickets[{{$i+1}}]" value="{{$i+1}}" @foreach ($bookings as $booking )
                                            @if($booking->seat_no == $i+1)
                                                {{'disabled checked'}}
                                            @endif
                                            @endforeach><label>{{$i+1}}</label></li>
                                        
                                    </ul>
                                    @endfor
                                </div>
                                <div class="col-md-5">
                                    <p class="text-center">Right</p>
                                    @for ($i=($ticket->bus->seat_capacity/2)+1; $i <= $ticket->bus->seat_capacity; $i+=2)

                                    <ul class="seats">
                                        <li><input type="checkbox" name="tickets[{{$i}}]" value="{{$i}}" @foreach ($bookings as $booking )
                                                @if($booking->seat_no == $i)
                                                    {{'disabled checked'}}
                                                @endif
                                            @endforeach><label>{{$i}}</label>
                                        </li>
                                        <li><input type="checkbox" name="tickets[{{$i+1}}]" value="{{$i+1}}" @foreach ($bookings as $booking )
                                            @if($booking->seat_no == $i+1)
                                                {{'disabled checked'}}
                                            @endif
                                            @endforeach><label>{{$i+1}}</label>
                                        </li>
                                    </ul>
                                    @endfor

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Book</button>
                        </form>
                        
                    </div>

                </div>
            </div>
            
        </div>

@endsection