<html>
    <head>
        <title>
            Печать
        </title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 style="text-align: center">
                    П Р И X О Д № {{$data->id }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h2 style="text-align: center">
                    ОТ :{{$data->created_at }}
                </h2>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <div class="col-6">
                Клиент : {{$data->pos->name }}
            </div>
            <div class="col-6">
                Торговая точка : {{$data->point->name }}
            </div>
        </div>
        <div class="row" style="text-align: center">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">п/п</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Цена зак.</th>
                    <th scope="col">Сумма зак.</th>
                    <th scope="col">Цена пр.</th>
                    <th scope="col">Сумма пр.</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sumpri1=0;
                    $sumpri2=0;
                ?>
                @foreach($data->bodypri as $item)
                <tr>
                    <th scope="row">{{$item->pos_ass }}</th>
                    <td>{{$item->ass->name }}</td>
                    <td>{{$item->count }}</td>
                    <td>{{$item->price_zak }}</td>
                    <td>{{ round($item->price_zak *$item->count ,4,2) }}</td>
                    <td>{{$item->price_prod }}</td>
                    <td>{{ round($item->price_prod *$item->count ,4,2) }}</td>
                    <?php $sumpri1=$sumpri1+round($item->price_zak *$item->count ,4,2)?>
                    <?php $sumpri2=$sumpri2+round($item->price_prod *$item->count ,4,2)?>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3>ИТОГО (зак.) : {{$sumpri1}} руб. </h3>
            <h3>ИТОГО (прод.) : {{$sumpri2}} руб. </h3>
        </div>
        <div>

        </div>
    </div>



    </body>
</html>
