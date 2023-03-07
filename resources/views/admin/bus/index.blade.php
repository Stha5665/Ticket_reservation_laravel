@extends('layouts.admin')
@section('title', 'Buspage')
@section('page', 'Bus')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bus List</h3>
                <a href="{{ url('admin/bus/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="bi bi-bus-front" style="margin-right:5px"></i><span>Add Bus</span></a>

            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Seat Capacity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($buses as $key => $bus)
                  <tr>
                    <th scope="row">{{ $key + 1}}</th>
                    <td>{{$bus->name}}</td>
                    <td>{{$bus->seat_capacity}}</td>
                    <td class="d-flex">               
                      <a href="{{url('admin/bus/'.$bus->id.'/edit')}}" class="btn btn-sm btn-outline-success" ><i class="bi bi-pen"></i></a>
                      
                      <form action="{{ route('bus.destroy', $bus->id)}}" method="POST" style="margin-left:5px;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button> 
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <th scope="row" colspan="4">No Bus Found</th>
                  </tr>
                  @endforelse
                </table>
                {{ $buses->links() }}
            </div>
        </div>
    </div>
</div>
@endsection