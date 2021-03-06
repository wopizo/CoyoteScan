@extends('.parts.app')

@section("title")Управление пользователями@endsection

@section('content')

    <section class="station_management padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="station_management_content table_1">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="table_header_1">
                                <form method="GET" action="{{ route('userAdminPageSearch') }}">
                                    <th scope="col">
                                        <div class="row">
                                            <div class="col-md-6 text-md-left">ФИО</div>
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
                            @isset($data)
                                @foreach($data as $user)
                                    <tr class="table_row_1">
                                        <td class="table_text_1">
                                            {{ $user['fio'] }}
                                        </td>
                                        <td class="table_text_1">
                                            <form method="POST"
                                                  action="{{ route('userAdminChange', $user['id']) }}"
                                                  class="row contact_form">
                                                @csrf
                                                @if ($user['isMarked'] == 0)
                                                    <button type="submit" class="btn btn-success">Отметить</button>
                                                @else
                                                    <button type="submit" class="btn btn-danger">Снять метку</button>
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
