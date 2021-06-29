@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.clients') }}">Клиенты</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Редактировать клиента
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.clients.update') }}" method="post">
                            <div class="form-group">
                                <label for="inputName">Ф.И.О.</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       value="{{ $datas->name }}"
                                       required
                                       placeholder="Ф.И.О.">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Телефон</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="phone"
                                       value="{{ $datas->phone }}"
                                       required
                                       placeholder="Телефон">
                            </div>
                            <div class="form-group">
                                <label for="inputName">email</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       value="{{ $datas->email }}"
                                       name="email"
                                       placeholder="email">
                            </div>
                            <input type="hidden" name="id" value="{{ $datas->id }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
