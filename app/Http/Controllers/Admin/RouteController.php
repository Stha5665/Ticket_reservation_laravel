<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\RouteFormRequest;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $routes = Route::paginate(3);
        return view('admin.route.index', compact('routes'))->with('i', (request()->input('page', 1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.route.addUpdateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteFormRequest $request)
    {
        $validData = $request->validated();

        $route = new Route;
        $route->origin = $validData['origin'];
        $route->destination = $validData['destination'];
        $route->save();
        return redirect('admin/route')->with('message', 'Route successfully added !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        return view('admin.route.addUpdateForm', compact('route'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(RouteFormRequest $request, Route $route)
    {
        $validData = $request->validated();

        if($route != null){
            $route->origin = $validData['origin'];
            $route->destination = $validData['destination'];
            $route->update();
            return redirect('admin/route')->with('message', 'Route successfully updated !!');

        }else{
            return redirect('admin/route')->with('error', 'No Route Found');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy($route_id)
    {
        $route = Route::findOrFail($route_id);
        $route->delete();
        return redirect('admin/route')->with('message', 'Route Successfully Deleted !!');
    }
}
