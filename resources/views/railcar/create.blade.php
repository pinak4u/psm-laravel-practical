@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.css')}}" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">RailCar Create Page</div>

                <div class="card-body">
                    <form action="{{route('railcars.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" >Name</label>
                                <input id="name" placeholder="Enter Name Here Please" type="text" value="{{ old('name') }}" class="form-control" name="name">
                                @error('name')
                                    <span class="mt-2 error-text">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="{{\App\Models\RailCar::STATUS_PARKED}}">{{\App\Models\RailCar::STATUS_PARKED}}</option>
                                    <option value="{{\App\Models\RailCar::STATUS_SHIPPED}}">{{\App\Models\RailCar::STATUS_SHIPPED}}</option>
                                    <option value="{{\App\Models\RailCar::STATUS_LOADING}}">{{\App\Models\RailCar::STATUS_LOADING}}</option>
                                    <option value="{{\App\Models\RailCar::STATUS_LOADED}}">{{\App\Models\RailCar::STATUS_LOADED}}</option>
                                    <option value="{{\App\Models\RailCar::STATUS_ARCHIVED}}">{{\App\Models\RailCar::STATUS_ARCHIVED}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="area" >Area</label>
                                <select name="area" id="area" class="form-control">
                                    <option value="{{\App\Models\RailCar::AREA_YARD}}">{{\App\Models\RailCar::AREA_YARD}}</option>
                                    <option value="{{\App\Models\RailCar::AREA_NORTH_GATE}}">{{\App\Models\RailCar::AREA_NORTH_GATE}}</option>
                                    <option value="{{\App\Models\RailCar::AREA_SOUTH_SIDE}}">{{\App\Models\RailCar::AREA_SOUTH_SIDE}}</option>
                                    <option value="{{\App\Models\RailCar::AREA_PLATFORM_1}}">{{\App\Models\RailCar::AREA_PLATFORM_1}}</option>
                                    <option value="{{\App\Models\RailCar::AREA_PLATFORM_2}}">{{\App\Models\RailCar::AREA_PLATFORM_2}}</option>
                                    <option value="{{\App\Models\RailCar::AREA_PLATFORM_3}}">{{\App\Models\RailCar::AREA_PLATFORM_3}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-6">
                                <label for="arrival_date">Arrival Date</label>
                                <input id="arrival_date" placeholder="Select Your Arrival Date Please" type="text" value="{{ old('arrival_date') }}" class="form-control" name="arrival_date">
                                @error('arrival_date')
                                    <span class="mt-2 error-text"  > {{$message}} </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="due_date" >Due Date</label>
                                <input id="due_date" placeholder="Select Your Due Date Please" type="text" value="{{old('due_date')}}" class="form-control" name="due_date">
                                @error('due_date')
                                    <span class="mt-2 error-text" > {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#arrival_date, #due_date').datetimepicker({});
    });
</script>
@endsection

