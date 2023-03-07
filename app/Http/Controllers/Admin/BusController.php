<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Http\Requests\BusFormRequest;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();

        $buses = Bus::latest()->paginate(4);

        // return view('admin.bus.index', compact('buses'))->with('i', (request()->input('page', 1)-1)*3);
        return view('admin.bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bus.addUpdateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusFormRequest $request)
    {
        $validData = $request->validated();

        $bus = new Bus;
        $bus->name = $validData['name'];
        $bus->seat_capacity = $validData['seat_capacity'];
        $bus->save();

        return redirect('admin/bus')->with('message', 'Bus successfully added !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit($bus)
    {
        $bus = Bus::findOrFail($bus);
        return view('admin.bus.addUpdateForm', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(BusFormRequest $request, $bus_id)
    {
        $validData = $request->validated();
        $bus = Bus::findOrFail($bus_id);
        $bus->name = $validData['name'];
        $bus->seat_capacity = $validData['seat_capacity'];
        $bus->update();

        return redirect('admin/bus')->with('message', 'Bus successfully Updated !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($bus)
    {
        $bus = Bus::findOrFail($bus);
        $bus->delete();
        return redirect('admin/bus')->with('message', 'Bus successfully Deleted !!');
    }
}
