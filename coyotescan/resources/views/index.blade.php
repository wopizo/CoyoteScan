@extends('parts.app')

@section("title")Главная страница@endsection

@section('content')
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_inner">
                        <h2>Главная Страница</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="padding_top padding_bottom">
        <div class="container">

            @isset($error)
                <div class="alert alert-primary" role="alert">
                    {{$error}}
                </div>
            @endisset

            <div class="row my-5">
                <div class="col-md-1 my-auto">
                    <img src="../img/database_ico.png">
                </div>
                <div class="col-md-4 my-auto">
                    <h4 class="text_1">Общая статистика</h4>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('statisticsPage') }}"><div class="arrow"></div></a>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-md-1 my-auto">
                    <img src="../img/mac_address_ico.png">
                </div>
                <div class="col-md-4 my-auto">
                    <h4 class="text_1">Статистика по MAC адресу</h4>
                </div>
                <div class="col-md-6  my-auto">
                    <form method="GET" action="{{ route('toMac') }}" class="form-inline">
                        <input type="text" class="form-control my-1" id="macId" name="macId" placeholder="MAC адрес...">
                        <button class="btn btn-outline" type="submit">Найти</button>
                    </form>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-md-1 my-auto">
                    <img src="../img/station_ico.png">
                </div>
                <div class="col-md-4 my-auto">
                    <h4 class="text_1">Статистика по станции</h4>
                </div>
                <div class="col-md-6  my-auto">
                    <form method="GET" action="{{ route('toStation') }}" class="form-inline">
                        <input type="text" class="form-control my-1" id="stationId" name="stationId" placeholder="Адрес станции...">
                        <button class="btn btn-outline" type="submit">Найти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
