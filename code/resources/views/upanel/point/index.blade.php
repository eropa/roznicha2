@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Торговые точки</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Торговые точки
                        <a class="btn btn-success"
                           href="{{ route('upaenl.point.create') }}"
                           role="button">
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>

                    <div class="card-body">
                        Список торговых точек

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">название точки</th>
                                    <th scope="col">event</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($points as $point)
                                        <tr>
                                            <td>{{$point->id}}</td>
                                            <td>{{$point->name}}</td>
                                            <td>
                                                <a class="btn btn-warning"
                                                   href="{{ route('upaenl.point.edit',['id'=>$point->id]) }}"
                                                   role="button">
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <a class="btn btn-danger"
                                                   href="{{ route('upaenl.point.delete',['id'=>$point->id]) }}"
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
