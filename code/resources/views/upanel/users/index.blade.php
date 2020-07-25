@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Список пользователей

                        <a class="btn btn-success"
                            href="{{ route('upaenl.users.create') }}"
                            role="button">
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">role</th>
                                    <th scope="col">event</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <th scope="row">{{$data->id}}</th>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->role}}</td>
                                            <td><a class="btn btn-warning"
                                                   href="{{ route('upaenl.users.edit',['id'=>$data->id]) }}"
                                                   role="button">
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <a class="btn btn-danger"
                                                   href="{{ route('upaenl.users.destroy',['id'=>$data->id]) }}"
                                                   role="button">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
