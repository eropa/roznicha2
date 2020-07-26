@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Профиль</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Редактировать профиль
                    </div>
                    <div class="card-body">
                        <form action="{{ route('upaenl.profil.update') }}" method="post">
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
                                       readonly
                                       value="{{$data->email}}"
                                       placeholder="email">
                            </div>

                            <input type="hidden" name="type" value="1">
                            @csrf
                            <button type="submit" class="btn btn-primary">Обновить данные</button>
                        </form>
                        <form action="{{ route('upaenl.profil.update') }}" method="post">
                            <div class="form-group">
                                <label for="inputParol">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="inputParol"
                                       name="password"
                                       placeholder="Пароль">
                            </div>
                            <input type="hidden" name="type" value="2">
                            <button type="submit" class="btn btn-primary">Обновить пароль</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Компания
                    </div>
                    <div class="card-body">
                        @if(is_null($company))
                            <form action="{{ route('upaenl.profil.compaycreate') }}" method="post">
                                <div class="form-group">
                                    <label for="inputShot">Короткое название фирмы</label>
                                    <input type="text"
                                           class="form-control"
                                           id="inputShot"
                                           name="short_name"
                                           required
                                           placeholder="Короткое название фирмы">
                                </div>
                                <div class="form-group">
                                    <label for="inputFull">Полное название фирмы</label>
                                    <textarea class="form-control" id="inputFull" rows="3" name="full_name" required></textarea>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-primary">Создать компанию</button>
                            </form>
                        @else
                            <form action="{{ route('upaenl.profil.compayupdate') }}" method="post">
                                <div class="form-group">
                                    <label for="inputShot">Короткое название фирмы</label>
                                    <input type="text"
                                           class="form-control"
                                           id="inputShot"
                                           name="short_name"
                                           value="{{$company->short_name}}"
                                           required
                                           placeholder="Короткое название фирмы">
                                </div>
                                <div class="form-group">
                                    <label for="inputFull">Полное название фирмы</label>
                                    <textarea class="form-control" id="inputFull" rows="3" name="full_name" required>{{$company->full_name}}</textarea>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-primary">Обновить данные компании</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
