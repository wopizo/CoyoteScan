@extends('.parts.app')
@section('content')

    <section class="station_management padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="station_management_content table_1">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="table_header_1">
                                <th scope="col">Название</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">
                                    <form method="GET" class="form-inline">
                                        <input type="text" class="form-control" placeholder="Поиск"
                                               name="filter">
                                    </form>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table_row_1">
                                <td class="table_text_1">Пульт</td>
                                <td class="table_text_1">ул.Пушкина дом колотушкина город Пенза ул.Пушкина дом
                                    колотушкина
                                    город Пенза
                                </td>
                                <td><a href="/station/id/edit" class="link_1 table_text_1">Редактировать</a></td>
                            </tr>
                            <tr class="table_row_1">
                                <td class="table_text_1">Кот</td>
                                <td class="table_text_1">Диван кровать кольцо свинья</td>
                                <td><a href="/station/id/edit" class="link_1 table_text_1">Редактировать</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
