@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Остаток</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-body">
                    <rostatok-component></rostatok-component>
                </div>
            </div>
        </div>
    </div>
@endsection
