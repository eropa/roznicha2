@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Заказы</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="wrapper" style="display: flex;flex-wrap: wrap;max-width: 100%;overflow: auto">

                        <div class="status" style="width: 180px;background: #95c5ed;margin-left: 10px;margin-right: 10px">
                            <center><b>Заявки</b></center>

                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                            <b>Заявка №221</b><br>
                            <b>Клиенты №76</b><br>
                            <b>Сумма 10 руб.</b><br>
                            <b>Дата 23.06.2021 11:54</b><br>
                            </div>

                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №231</b><br>
                                <b>Клиенты №51</b><br>
                                <b>Сумма 12 руб.</b><br>
                                <b>Дата 23.06.2021 14:42</b><br>
                            </div>

                        </div>
                        <div class="status" style="width: 180px;background: #95c5ed;margin-left: 10px;margin-right: 10px">
                            <center><b>Куxня</b></center>

                        </div>
                        <div class="status" style="width: 180px;background: #95c5ed;margin-left: 10px;margin-right: 10px">
                            <center><b>В пути(доставка)</b></center>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №211</b><br>
                                <b>Клиенты №16</b><br>
                                <b>Сумма 250 руб.</b><br>
                                <b>Дата 22.06.2021 09:32</b><br>
                            </div>

                        </div>
                        <div class="status" style="width: 180px;background: #95c5ed;margin-left: 10px;margin-right: 10px">
                            <center><b>Оплата</b></center>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №356</b><br>
                                <b>Клиенты -(касса)</b><br>
                                <b>Сумма 24 руб.</b><br>
                                <b>Дата 25.06.2021 17:32</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №354</b><br>
                                <b>Клиенты -(касса)</b><br>
                                <b>Сумма 21 руб.</b><br>
                                <b>Дата 25.06.2021 17:22</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №351</b><br>
                                <b>Клиенты -(касса)</b><br>
                                <b>Сумма 21 руб.</b><br>
                                <b>Дата 25.06.2021 17:21</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №349</b><br>
                                <b>Клиенты -(касса)</b><br>
                                <b>Сумма 21 руб.</b><br>
                                <b>Дата 25.06.2021 17:20</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №348</b><br>
                                <b>Клиенты №11</b><br>
                                <b>Сумма 28 руб.</b><br>
                                <b>Дата 25.06.2021 17:18</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №347</b><br>
                                <b>Клиенты -(касса)</b><br>
                                <b>Сумма 28 руб.</b><br>
                                <b>Дата 25.06.2021 17:17</b><br>
                            </div>
                            <div class="item_order" style="width: 100%;background: rgba(74,255,72,0.46);margin-top: 5px;margin-top: 5px">
                                Загрузить еще
                            </div>
                        </div>
                        <div class="status" style="width: 180px;background: #95c5ed;margin-left: 10px;margin-right: 10px">
                            <center><b>Возврат</b></center>
                            <div class="item_order" style="width: 100%;background: #b6fff3;margin-top: 2px;margin-top: 2px">
                                <b>Заявка №131</b><br>
                                <b>Клиенты №24</b><br>
                                <b>Сумма 50 руб.</b><br>
                                <b>Дата 15.06.2021 09:32</b><br>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Информация о заказе  <b> №221</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                   Заявка  <b> №221</b><br>
                   Клиенты  <b>№76 (Чардак И.С.) 77812331</b><br>
                   Сумма  <b>10 руб.</b><br>
                   Дата  <b>23.06.2021 11:54</b><br>
                    Информация  : <b>1) пирожок с вищней - 2шт.</b><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#exampleModalCenter').modal('show');
    </script>
@endsection
