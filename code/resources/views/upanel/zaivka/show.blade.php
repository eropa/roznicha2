@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.zaivka.index') }}">Заявка с сайта</a></li>
                <li class="breadcrumb-item active" aria-current="page">Оформление заявки</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Заявки №{{$data->id }}
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Кол-во</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sum=0;
                                ?>
                                @foreach($data->bodyzaivka as $item)
                                <tr>
                                    <td>{{$item->id }}</td>
                                    <td>{{$item->ass->name }}</td>
                                    <td> <img src="{{asset('/ass_tovar/'.$item->ass->image)}}" width="200"></td>
                                    <td>{{$item->count_toval }}</td>
                                    <td>{{$item->ass->price }}</td>
                                    <td>{{ round($item->ass->price*$item->count_toval,4,2) }}</td>
                                    <?php
                                    $sum=$sum+round($item->ass->price*$item->count_toval,4,2);
                                    ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        Итого : <span>{{$sum }} </span> руб.
                        <hr>
                        <a href="{{route('upaenl.zaivka.save',["id" => $data->id ])}}"
                           class="btn btn-success">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
