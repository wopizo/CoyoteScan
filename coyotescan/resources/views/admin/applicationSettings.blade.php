@extends('.parts.app')
@section('content')

    <section class="app_settings padding_top padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="app_settings_content">
                        <form class="row contact_form" method="POST" novalidate="novalidate">
                            <div class="my-3 row col-md-12">
                                <div class="col-md-6">
                                    <h4>Авторизация</h4>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <div class="confirm-switch">
                                        <input type="checkbox" id="confirm-switch1" checked>
                                        <label for="confirm-switch1"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row col-md-12">
                                <div class="col-md-6">
                                    <h4>Флаг для пользователей</h4>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <div class="confirm-switch">
                                        <input type="checkbox" id="confirm-switch2" checked>
                                        <label for="confirm-switch2"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row col-md-12">
                                <div class="col-md-6">
                                    <h4>Флаг на MAC адреса</h4>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <div class="confirm-switch">
                                        <input type="checkbox" id="confirm-switch3" checked>
                                        <label for="confirm-switch3"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row col-md-12">
                                <div class="col-md-6">
                                    <h4>Флаги могут ставить</h4>
                                </div>
                                <div class="col-md-6 single-element-widget">
                                    <div class="default-select" id="default-select_2">
                                        <select style="display: none;">
                                            <option value="1">Пользователи</option>
                                            <option value="2">Администраторы</option>
                                            <option value="3">Пользователи и Администраторы</option>
                                        </select>
                                        <div class="nice-select" tabindex="0">
                                            <span class="current">Администраторы</span>
                                            <ul class="list">
                                                <li data-value="1" class="option">Пользователи</li>
                                                <li data-value="2" class="option selected">Администраторы</li>
                                                <li data-value="3" class="option">Пользователи и Администраторы</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn_3" type="submit" value="submit">Принять</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
