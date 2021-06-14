@extends('.parts.app')

@section("title")Управление станциями@endsection

@section('content')

    <section class="station_management padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="station_management_content table_1">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="table_header_1">
                                <form method="GET" action="{{ route('stationAdminPageSearch') }}">
                                    <th scope="col">Название</th>
                                    <th scope="col">
                                        <div class="row">
                                            <div class="col-md-6 text-md-left">Адрес</div>
                                            <div class="col-md-6 text-md-right">
                                                <input type="text" class="form-control" placeholder="Поиск"
                                                       name="search">
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <button type="submit" class="btn btn-success">Применить</button>
                                    </th>
                                </form>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table_row_1">
                                <form method="POST"
                                      action="{{ route('stationAdminAdd') }}"
                                      class="row contact_form">
                                @csrf
                                <td class="table_text_1">
                                    <input id="name" type="text"
                                           class="form-control" name="name" required autocomplete="name"
                                           autofocus
                                           placeholder="Идентификатор">
                                </td>
                                <td class="table_text_1">
                                    <input id="address" type="text"
                                           class="form-control" name="address" required autocomplete="address"
                                           autofocus
                                           placeholder="Адрес">
                                </td>
                                <td class="table_text_1">
                                            <button type="submit" class="btn btn-success">Добавить</button>
                                </td>
                                </form>
                            </tr>
                            @isset($data)
                                @foreach($data as $station)
                                    <tr class="table_row_1">
                                        <td class="table_text_1">
                                            {{ $station['name'] }}
                                        </td>
                                        <td class="table_text_1">
                                            <a class="link_1"
                                               href="{{route('stationStatisticsPage', $station['id'])}}">{{ $station['address'] }}</a>
                                            <br>
                                        </td>
                                        <td class="table_text_1">
                                            <form method="POST"
                                                  action="{{ route('stationAdminChange', $station['id']) }}"
                                                  class="row contact_form">
                                                @csrf
                                                @if ($station['isOutdated'] == 0)
                                                    <button type="submit" class="btn btn-danger">Деактивировать</button>
                                                @else
                                                    <button type="submit" class="btn btn-success">Активировать</button>
                                                @endif
                                            </form>
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
