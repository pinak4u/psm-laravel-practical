<?php

namespace App\Http\Controllers;

use App\Http\Requests\RailCarCreateRequest;
use App\Http\Requests\RailCarEditRequest;
use App\Models\RailCar;
use App\Models\User;

class RailCarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $railCars = RailCar::with(['user'])->paginate(10);
        return view('railcar.index',compact('railCars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('railcar.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RailCarCreateRequest $request)
    {
        //
        $request->merge(['user_id'=>$request->user()->id]);
        RailCar::create($request->only(['user_id','name','status','area','arrival_date','due_date']));
        $railCars = RailCar::paginate(10);
        return redirect()->route('railcars.index',compact($railCars));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $railCar = RailCar::findOrFail($id);
        return view('railcar.show',compact('railCar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $railCar = RailCar::findOrFail($id);
        return view('railcar.update',compact('railCar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RailCarEditRequest $request, $id)
    {
        $railCar = RailCar::findOrFail($id);
        if (empty($railCar)){
            return redirect()->back('404');
        }
        $railCar->update($request->only(['user_id','name','status','area','arrival_date','due_date']));
        $railCars = RailCar::paginate(10);
        return redirect()->route('railcars.index',compact($railCars));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        RailCar::destroy($id);
        $railCars = RailCar::paginate(10);
        return redirect()->route('railcars.index',compact($railCars));
    }
}
