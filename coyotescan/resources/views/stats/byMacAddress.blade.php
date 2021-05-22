@extends('.parts.app')

@section("title")Статистика по @isset($mac){{$mac}}@endisset адресу@endsection

@section('content')

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_inner">
                        <h2>Статистика по @isset($mac){{$mac}}@endisset адресу</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="user_management padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="sidebar_wrapper">
                        <div class="product_sidebar">
                            <form method="GET" action="{{ route('macAddressStatisticsPage', $id) }}">
                                <div class="single_sidebar">
                                    <div class="form-inline my-3">
                                        <label for="timeStart" class="col-md-3">От</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" id="timeStart"
                                                   name="timeStart"   value="@isset($inputs['timeStart']){{ $inputs['timeStart'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="form-inline my-3">
                                        <label for="timeFinish" class="col-md-3">До</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" id="timeFinish"
                                                   name="timeFinish"  value="@isset($inputs['timeFinish']){{ $inputs['timeFinish'] }}@endisset">
                                        </div>
                                    </div>
                                    <div class="switch-wrap d-flex justify-content-between my-3">
                                        <div class="col-md-9">
                                            Только отмеченные
                                        </div>
                                        <div class="col-md-3">
                                            <div class="primary-switch ">
                                                <input type="checkbox" id="primary-switch" name="marked"  @isset($inputs['marked']){{ 'checked' }}@endisset>
                                                <label for="primary-switch"></label>
                                            </div>
                                        </div>
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
                                <th scope="col">Адрес станции</th>
                                <th scope="col">Время</th>
                                <th scope="col">MAC адрес</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($data)
                                @foreach($data as $record)
                                    <tr class="table_row_1">
                                        <td class="table_text_1"><a class="link_1" href="{{route('stationStatisticsPage', $record['stationId'])}}">{{ $record['address'] }}</a></td>
                                        <td class="table_text_1">{{ $record['time'] }}</td>
                                        <td class="table_text_1">
                                            @foreach($record['mac_addresses'] as $address)
                                                <a class="link_1" href="{{route('macAddressStatisticsPage', $address['id'])}}">{{ $address['address'] }}</a><br>
                                            @endforeach
                                        </td>
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
