@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.point') }}">Торговые точки</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Добавить торговую точку
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.point.update') }}" method="post">
                            <div class="form-group">
                                <label for="inputName">Название</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       value="{{$data->name}}"
                                       placeholder="Название торговой точки.">
                            </div>
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" >
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
