@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.users') }}">Пользователи</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создать</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Добавить пользователя
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.users.store') }}" method="post">
                            <div class="form-group">
                                <label for="inputName">Имя пользователя</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       placeholder="Ф.И.О.">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">email</label>
                                <input type="email" class="form-control"
                                       id="inputEmail"
                                       name="email"
                                       placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="selectRole">Роль пользователя в системе</label>
                                <select class="form-control" id="selectRole" name="role">
                                    <option value="user">Пользователь</option>
                                    <option value="admin">Администратор системы</option>
                                    <option value="kassir">Кассир</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputParol">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="inputParol"
                                       name="password"
                                       placeholder="Пароль">
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
