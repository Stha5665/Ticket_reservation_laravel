@extends('layouts.frontendLayout')
@section('content')

<div class="row">
    <div class="col">
    	<h1>All happiness depends on a<br>Bus Comfort</h1>
        <a href="/tickets">Book Now</a>
    </div>
	<div class="col">
        <img src="{{asset('/images/frontend/pic1.jpg') }}" class="feature-img">
    </div>
</div>

@endsection