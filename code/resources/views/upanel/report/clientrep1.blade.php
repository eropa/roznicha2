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

                    <div class="table-responsive">
                        Дата  с {{ $data1 }}  по{{ $data2 }}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Ф.И.О</th>
                                <th scope="col">телефон</th>
                                <th scope="col">Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <?php
                                        $ras=\App\Models\Rash::where('client',$data->id)
                                            ->whereDate('created_at','>=',$data1)
                                            ->whereDate('created_at','<=',$data2)
                                            ->get();

                                        $sum=0;
                                        foreach($ras as $f){
                                            $sum=$sum+$f->sum;
                                        }
                                    ?>
                                    <td>{{ $sum }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
