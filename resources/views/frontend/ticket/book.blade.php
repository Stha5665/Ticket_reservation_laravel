@extends('layouts.frontendLayout')
@section('content') 

        <div class="row">
            <div class="seat">
                <div class="card bg-light">
                    <div class="card-header">Seats</div>
                    <div class="card-body">
                        <div class="row">

                        
                        <div class="col-md-5">
                            <ul class="seats">
                                <li><input type="checkbox"><label>1A</label></li>
                                <li><input type="checkbox">2</li>
                                
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <ul class="seats">
                                <li><input type="checkbox"><label>1A</label></li>
                                <li><input type="checkbox">2</li>
                                
                            </ul>
                        </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            
        </div>

@endsection