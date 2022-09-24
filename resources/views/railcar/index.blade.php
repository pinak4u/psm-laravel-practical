@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rail Car Listing
                    @hasrole('normal')
                        <span class="float-end">
                            <a href="{{route('railcars.create')}}" class="btn btn-sm btn-primary ">Add Rail Car</a>
                        </span>
                    @endrole
                </div>

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
                                            <a class="btn btn-sm btn-primary " href="{{route('railcars.show',$railCar->id)}}" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                            @hasrole('normal')
                                                <a class="btn btn-sm btn-success" href="{{route('railcars.edit',$railCar->id)}}" title="Edit" data-toggle="tooltip"><i class="fa fa-pen"></i></a>
                                            @endhasrole
                                            <form class="d-inline-block" action="{{route('railcars.destroy',$railCar->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
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
