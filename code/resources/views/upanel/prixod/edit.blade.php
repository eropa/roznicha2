@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('upaenl.prixod') }}">Приходы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактировать расxод</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <form>
                                    <div class="form-group">
                                        <label for="listPos">Поставщик</label>
                                        <select class="form-control" id="listPos" >
                                            <option value="0">Выберите из списка</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="listPoints">Торговая точка</label>
                                        <select class="form-control" id="listPoints" >
                                            <option value="0">Выберите торговую точку</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputRasxod">Расход</label>
                                        <input class="form-control" type="text" id="inputRasxod"
                                               placeholder="#9999 22/02/2020" >
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Оплачен</label>
                                    </div>
                                    <button type="button" class="btn btn-primary" v-if="visibleBtnCreate">Соxранить</button>
                                </form>
                                <hr>
                                Итого зак.руб - <br>
                                Итого прод.руб - <br>

                            </div>
                            <div class="col-md-9">
                                <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#dataAddModal">
                                    +
                                </button>

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">бар-код</th>
                                        <th scope="col">название</th>
                                        <th scope="col">Кол-во</th>
                                        <th scope="col">цена зак.</th>
                                        <th scope="col">итого.</th>
                                        <th scope="col">цена прод.</th>
                                        <th scope="col">итого.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="number" class="form-control" style="width: 105px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" style="width: 95px">
                                        </td>
                                        <td></td>
                                        <td>
                                            <input type="number" class="form-control" style="width: 95px">
                                        </td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
