@extends('layouts.admin')
@empty($bus)
    @section('title', 'AddBus')
    @section('page', 'Bus / Add')
@endempty
@isset($bus)
    @section('title', 'EditBus')
    @section('page', 'Bus / Edit')
@endisset
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    @empty($bus)
                    <h5 class="card-title">Add Bus
                    </h5>
                    <!-- Browser Default Validation -->
                    <form action="{{url('/admin/bus') }}" method="POST" class="row g-3">
                    @endempty
                    @isset($bus)
                    <h5 class="card-title">Update Bus
                    </h5>
                    <form action="{{url('/admin/bus/'.$bus->id) }}" method="POST" class="row g-3">
                    @method('PUT')
                    @endisset
                        @csrf
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Bus Name</label>
                            <input name="name" type="text" class="form-control" id="validationDefault01" value="{{ $bus->name ?? '' }}">
                            @error('name') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Seat Capacity</label>
                            <input type="number" name="seat_capacity" class="form-control" id="validationDefault02" value="{{ $bus->seat_capacity ?? '' }}">
                            @error('seat_capacity') 
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