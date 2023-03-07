@extends('layouts.admin')
@section('title', 'Routepage')
@section('page', 'Route')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Route List</h3>
                <a href="{{ url('admin/route/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="bi bi-geo-alt-fill" style="margin-right:5px"></i><span>Add Route</span></a>

            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>  @forelse($routes as $route)
                  <tr>
                    <th scope="row">{{ ++$i}}</th>
                    <td>{{$route->origin}}</td>
                    <td>{{$route->destination}}</td>
                    <td class="d-flex">               
                      <a href="{{url('admin/route/'.$route->id.'/edit')}}" class="btn btn-sm btn-outline-success" ><i class="bi bi-pen"></i></a>
                      
                      <form action="{{ route('route.destroy', $route->id)}}" method="POST" style="margin-left:5px;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button> 
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <th scope="row" colspan="4">No Route Found</th>
                  </tr>
                  @endforelse
                </table>
                {{ $routes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection