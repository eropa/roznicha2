@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Клиенты</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Клиенты
                        <a class="btn btn-success"
                           href="{{ route('upaenl.clients.add') }}"
                           role="button">
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>

                    <div class="card-body">
                        Список клиентов

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Ф.И.О</th>
                                    <th scope="col">телефон</th>
                                    <th scope="col">почта</th>
                                    <th scope="col">event</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                <a class="btn btn-warning"
                                                   href="{{ route('upaenl.clients.edit',['id'=>$data->id]) }}"
                                                   role="button">
                                                    <i class='fas fa-edit'></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="{{ route('upaenl.clients.delete',['id'=>$data->id]) }}"
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
