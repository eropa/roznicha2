@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deletes'))
            <div class="alert alert-danger">
                {{ session('deletes') }}
            </div>
        @endif

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Приходы</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Приходы
                        <a class="btn btn-success"
                           href="{{ route('upaenl.prixod.create') }}"
                           role="button">
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>

                    <div class="card-body">
                        <prixodlist-component  :listpoints="{{\App\services\getData::getPoints()}}"
                                               :listpos="{{\App\services\getData::getPoss()}}"></prixodlist-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
