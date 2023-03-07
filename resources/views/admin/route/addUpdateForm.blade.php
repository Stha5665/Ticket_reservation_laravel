@extends('layouts.admin')
@empty($route)
    @section('title', 'AddRoute')
    @section('page', 'Route / Add')
@endempty
@isset($route)
    @section('title', 'EditRoute')
    @section('page', 'Route / Edit')
@endisset
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    @empty($route)
                    <h5 class="card-title">Add Route
                    </h5>
                    <!-- Browser Default Validation -->
                    <form action="{{url('/admin/route') }}" method="POST" class="row g-3">
                    @endempty
                    @isset($route)
                    <h5 class="card-title">Update Route
                    </h5>
                    <form action="{{url('/admin/route/'.$route->id) }}" method="POST" class="row g-3">
                    @method('PUT')
                    @endisset
                        @csrf
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Route Origin</label>
                            <input name="origin" type="text" class="form-control" id="validationDefault01" value="{{ $route->origin ?? '' }}">
                            @error('origin') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Route Destination</label>
                            <input name="destination" type="text" class="form-control" id="validationDefault01" value="{{ $route->destination ?? '' }}">
                            @error('destination') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
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