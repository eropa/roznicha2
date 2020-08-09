@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.ass') }}">Ассортимент товара</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создать товар</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Добавить товар
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.ass.story') }}" method="post" id="formCreateAss">
                            <div class="form-group">
                                <label for="inputName">Название</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       required
                                       placeholder="Название товара.">
                            </div>
                            <div class="form-group">
                                <label for="inputBar">Бар-код товара</label>
                                <input type="text" class="form-control"
                                       id="inputBar"
                                       name="barcode"
                                       required
                                       placeholder="Бар-код товара">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sostav" value="1">
                                <label class="form-check-label" for="sostav">Составной товар( состоить из нескольких элементов)
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="selectGr">Группа товара</label>
                                <select class="form-control" id="selectGr" name="grass_id">
                                    <option value="0" selected>Нет группы</option>
                                    @foreach($datagrs as $datagr)
                                        <option value="{{$datagr->id}}">{{ $datagr->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @csrf
                            <button type="button" class="btn btn-primary" onclick="clSubmit()">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function clSubmit(){
            $('#formCreateAss').submit();
        }
    </script>
@endsection
