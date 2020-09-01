@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.prixod') }}">Приходы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создать приход</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <prixod-component
                            :listpoints="{{\App\services\getData::getPoints()}}"
                            :listpos="{{\App\services\getData::getPoss()}}"
                        ></prixod-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
