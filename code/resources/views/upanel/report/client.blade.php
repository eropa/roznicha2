@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="#">Отчеты</a></li>
                <li class="breadcrumb-item active" aria-current="page">Клиенты</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-body">
                    <form action="{{ route('upaenl.report.clientpost') }}"     method="post">


                    <div class="row">
                        Вид
                        <select class="form-control" name="type1" id="exampleFormControlSelect1" required >
                            <option value="">Выберите вид</option>
                            <option value="1">Оплаты</option>
                            <option value="2">Кол-во по рецепту</option>
                        </select>
                    </div>
                    <div class="row">
                        Дата с
                        <input type="datetime-local" class="form-control"
                               id="inputName"
                               name="data1"
                               required
                               placeholder="Название торговой точки.">
                        по
                        <input type="datetime-local" class="form-control"
                               id="inputName"
                               name="data2"
                               required
                               placeholder="Название торговой точки.">
                    </div>
                        @csrf
                    <div class="row">
                      <input type="submit" class="btn-success btn">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
