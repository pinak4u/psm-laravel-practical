@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">RailCar View Page</div>

                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <div class="form-control">{{$railCar->name}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>User Name</label>
                                    <div class="form-control">{{$railCar->user->name}}</div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <div class="form-control">{{$railCar->status}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="area">Area</label>
                                    <div class="form-control">{{$railCar->area}}</div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="arrival_date">Arrival Date</label>
                                    <div class="form-control">{{$railCar->arrival_date}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="due_date">Due Date</label>
                                    <div class="form-control">{{$railCar->due_date}}</div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
