@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rail Car Listing</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rail Car Name</th>
                                <th scope="col">Area</th>
                                <th scope="col">Status</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($railCars as $railCar)
                                    <tr>
                                        <th scope="row">{{$railCar->id}}</th>
                                        <td>{{$railCar->name}}</td>
                                        <td>{{$railCar->area}}</td>
                                        <td>{{$railCar->status}}</td>
                                        <td>{{$railCar->user->name}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('railcars.show',$railCar->id)}}">View</a>
                                            <a class="btn btn-success" href="{{route('railcars.edit',$railCar->id)}}">Edit</a>
                                            <form action="{{route('railcars.destroy',$railCar->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-warning" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    {{$railCars->links()}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
