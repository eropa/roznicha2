@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.users') }}">Пользователи</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Редактировать пользователя
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.users.update') }}" method="post">
                            <div class="form-group">
                                <label for="inputName">Имя пользователя</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       value="{{$data->name}}"
                                       placeholder="Ф.И.О.">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">email</label>
                                <input type="email" class="form-control"
                                       id="inputEmail"
                                       name="email"
                                       value="{{$data->email}}"
                                       placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="selectRole">Роль пользователя в системе</label>
                                <select class="form-control" id="selectRole" name="role" value="{{$data->role}}" >
                                    <option value="user"
                                        @if($data->role=="user")
                                            selected
                                        @endif
                                    >Пользователь</option>
                                    <option value="admin"
                                            @if($data->role=="admin")
                                            selected
                                        @endif>Администратор системы</option>
                                    <option value="kassir"
                                            @if($data->role=="kassir")
                                            selected
                                        @endif>Кассир</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="selectRole">К какой фирме закрепить</label>
                                <select class="form-control"  name="firma"  >
                                    <option value="0">Без фирмы</option>
                                    @foreach($dataCom as $item)
                                        <option value="{{$item->id}}">{{$item->short_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="selectRole">Склад</label>
                                <select class="form-control"name="point"  >
                                    <option value="0">Без склада</option>

                                    @foreach($dataPoint as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>
                        <form action="{{ route('upaenl.users.update') }}" method="post">
                            <div class="form-group">
                                <label for="inputParol">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="inputParol"
                                       name="password"
                                       placeholder="Пароль">
                            </div>
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
