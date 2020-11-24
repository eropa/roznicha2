@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Заявка с сайта</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Заявки
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Пользователь ID</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Комментарии</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->user_id }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->comment_zaivka }}</td>
                                    <td>
                                        <a href="{{ route('upaenl.zaivka.show',["id" => $data->id ])  }}">Оформить</a>
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
@endsection
