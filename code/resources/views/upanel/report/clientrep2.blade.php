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
                                <th scope="col">Название</th>
                                <th scope="col">кол-во</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <?php
                                    $datasAss=\App\Models\Ass::all();
                                    $ras=\App\Models\Rash::where('client',$data->id)->WhereDate('created_at','>=',$data1)
                                            ->WhereDate('created_at','<=',$data2)
                                            ->get()->pluck('id')->toArray();
                                ?>
                                @foreach($datasAss as $dataAs)
                                    <?php

                                        $dataTovars=\App\Models\Rasb::WhereIn('rash_id',$ras)
                                            ->where('ass_id',$dataAs->id)
                                        ->get();
                                        $sumTovar=0;
                                        foreach ($dataTovars as $dataTovar){
                                            $sumTovar=$sumTovar+$dataTovar->count;
                                        }

                                        ?>
                                    @if($sumTovar>0)
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>{{ $dataAs->name }}</td>
                                            <td>{{ $sumTovar }}</td>
                                        </tr>

                                    @endif


                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
