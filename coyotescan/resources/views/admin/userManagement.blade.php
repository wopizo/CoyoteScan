@extends('.parts.app')
@section('content')
    <section class="user_management padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="user_management_content table_1">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="table_header_1">
                                <th scope="col">Имя пользователя</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Флаг</th>
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
                                <td class="table_text_1">Vasya1993</td>
                                <td class="table_text_1">vasya12331@gmail.com</td>
                                <td class="table_text_1">
                                    <div class="form-group p_star">
                                        <div class="confirm-switch">
                                            <input type="checkbox" id="confirm-switch1" checked>
                                            <label for="confirm-switch1"></label>
                                            <input type="hidden" name="userId" value="user.id">
                                        </div>
                                    </div>
                                </td>
                                <td><a href="/station/id/edit" class="link_1 table_text_1">Удалить</a></td>
                            </tr>
                            <tr class="table_row_1">
                                <td class="table_text_1">Kolya</td>
                                <td class="table_text_1">kolyaMail223@gmail.com</td>
                                <td class="table_text_1">
                                    <form method="POST" action="/user/id/edit">
                                        <div class="form-group p_star">
                                            <div class="confirm-switch">
                                                <input type="checkbox" id="confirm-switch2" checked>
                                                <label for="confirm-switch2"></label>
                                                <input type="hidden" name="userId" value="user.id">
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td><a href="/user/id/delete" class="link_1 table_text_1">Удалить</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
