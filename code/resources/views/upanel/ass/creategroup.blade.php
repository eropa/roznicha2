@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.ass') }}">Ассортимент товара</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создать группу товара</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Добавить контрагента
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upaenl.gr.story') }}" method="post">
                            <div class="form-group">
                                <label for="inputName">Название</label>
                                <input type="text" class="form-control"
                                       id="inputName"
                                       name="name"
                                       placeholder="Название контрагента.">
                            </div>
                            <div class="form-group">
                                <label for="selectGr">Родитель</label>
                                <select class="form-control" id="selectGr" name="parent_id">
                                    <option value="0" selected>Нет родител.группы</option>
                                    @foreach($datagrs as $datagr)
                                        <option value="{{$datagr->id}}">{{ $datagr->name }}</option>
                                    @endforeach
                                </select>
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