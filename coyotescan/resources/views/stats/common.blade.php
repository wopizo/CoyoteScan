@extends('.parts.app')

@section("title")Общая статистика@endsection

@section('content')

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_inner">
                        <h2>Общая статистика</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center content container_main">
                <div class="col-md-4">
                    <div class="sidebar_wrapper">
                        <div class="product_sidebar">
                            <form method="GET" action="{{ route('statisticsPage') }}">
                                <div class="single_sidebar">
                                    <div class="col-md-12 mt-30">
                                        <input type="text" class="input_1" name="search" placeholder="Адрес..." value="@isset($inputs['search']){{ $inputs['search'] }}@endisset">
                                        <i class="ti-search"></i>
                                    </div>
                                    <div class="form-inline my-3">
                                        <label for="timeStart" class="col-md-3">От</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" id="timeStart"
                                                   name="timeStart" value="@isset($inputs['timeStart']){{ $inputs['timeStart'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-inline my-3">
                                        <label for="timeFinish" class="col-md-3">До</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" id="timeFinish"
                                                   name="timeFinish" value="@isset($inputs['timeFinish']){{ $inputs['timeFinish'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="switch-wrap d-flex justify-content-between my-3">
                                        <div class="col-md-9">
                                            Только отмеченные
                                        </div>
                                        <div class="col-md-3">
                                            <div class="primary-switch ">
                                                <input type="checkbox" id="primary-switch" name="marked" @isset($inputs['marked']){{ 'checked' }}@endisset>
                                                <label for="primary-switch"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3 row col-md-12">
                                    <div class="col-md-4 my-auto my-0">
                                        Уникальность*
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control my-1" id="step" name="stepval"
                                               value="@isset($inputs['stepval']){{ $inputs['stepval'] }}@endisset">
                                    </div>
                                    <div class="col-md-3 single-element-widget my-1">
                                        <div class="default-select" id="default-select_2">
                                            <select style="display: none;" name="steptype">
                                                <option value="1" @if($inputs['steptype'] == 1){{ 'selected' }}@endif>Минут</option>
                                                <option value="2" @if($inputs['steptype'] == 2){{ 'selected' }}@endif>Часов</option>
                                                <option value="3" @if($inputs['steptype'] == 3){{ 'selected' }}@endif>Дней</option>
                                                <option value="4" @if($inputs['steptype'] == 4){{ 'selected' }}@endif>Месяцев</option>
                                            </select>
                                            <div class="nice-select" tabindex="0">
                                                <span class="current">Дней</span>
                                                <ul class="list">
                                                    <li data-value="1" @if($inputs['steptype'] == 1)class="option selected" @else class="option"@endif>Минут</li>
                                                    <li data-value="2" @if($inputs['steptype'] == 2)class="option selected" @else class="option"@endif>Часов</li>
                                                    <li data-value="3" @if($inputs['steptype'] == 3)class="option selected" @else class="option"@endif>Дней</li>
                                                    <li data-value="4" @if($inputs['steptype'] == 4)class="option selected" @else class="option"@endif>Месяцев</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12 my-0">
                                    <div class="col">
                                        <sub>*MAC адрес, зафиксированный раз в <span id="val"></span> <span id="type"></span></sub>
                                    </div>
                                </div>
                                <div class="my-3" style="text-align: center">
                                    <button type="submit" class=" button-rounded primary-bg w-50 btn_1">Поиск</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="user_management_content table_1">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="table_header_1">
                                <th scope="col" class="table_text_1">
                                    Адрес
                                </th>
                                <th scope="col" class="table_text_1">
                                    Количество
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($data)
                                @foreach($data as $station)
                                    <tr class="table_row_1">
                                        <td class="table_text_1"><a class="link_1" href="{{route('stationStatisticsPage', $station['id'])}}">{{ $station['address'] }}</a></td>
                                        <td class="table_text_1">{{ $station['count'] }}</td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
