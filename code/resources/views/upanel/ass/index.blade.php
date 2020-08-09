@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ассортимент товара</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ассортимент
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Добавить
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('upaenl.gr.create') }}">Добавить группу товара</a>
                                    <a class="dropdown-item" href="#">Товар</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        Ассортимент

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Бар-код</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Группа товара</th>
                                    <th scope="col">event</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($datagrs as $datagr)
                                        <tr>
                                        <td>{{$datagr->id}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('upaenl.ass.gr',['id'=>$datagr->id]) }}">
                                                {{$datagr->name}}
                                            </a>
                                          </td>
                                        <td>
                                            <a class="btn btn-warning"
                                               href="{{ route('upaenl.ass.gredit',['id'=>$datagr->id]) }}"
                                               role="button">
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <a class="btn btn-danger"
                                               href="{{ route('upaenl.ass.grdelete',['id'=>$datagr->id]) }}"
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
