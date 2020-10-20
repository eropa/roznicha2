@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.ass') }}">Ассортимент товара</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактировать товар</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Редактировать товар
                    </div>

                    <div class="card-body">
                        <editass-component
                            :data="{{$data}}"
                            :datagrs="{{$datagrs}}"
                            :arrasostav="{{$arrasostav}}"
                            >
                        </editass-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
