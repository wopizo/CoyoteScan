@extends('.parts.app')

@section("title")Профиль пользователя@endsection

@section('content')

    <section class="profile_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="registration_part_form">
                    <div class="registration_part_form_inner">
                        <h3>Личный кабинет</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <form method="POST" action="{{ route('editNames') }}" class="row contact_form">
                                    @csrf
                                    <div class="col-md-12 form-group p_star row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-left">Имя</label>

                                        <div class="col-md-10">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ Auth::user()->name }}" required autocomplete="name"
                                                   autofocus
                                                   placeholder="Имя">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group p_star row">
                                        <label for="sname"
                                               class="col-md-4 col-form-label text-md-left">Фамилия</label>

                                        <div class="col-md-10">
                                            <input id="sname" type="text"
                                                   class="form-control" name="sname"
                                                   autocomplete="sname" required autofocus placeholder="Фамилия"
                                                   value="{{Auth::user()->sname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group p_star row">
                                        <label for="fname"
                                               class="col-md-4 col-form-label text-md-left">Отчество</label>

                                        <div class="col-md-10">
                                            <input id="fname" type="text"
                                                   class="form-control" name="fname"
                                                   autocomplete="fname" required autofocus placeholder="Отчество"
                                                   value="{{Auth::user()->fname}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-success">
                                            Изменить
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="col-md-12 form-group p_star row">
                                    <h4>Email: {{Auth::user()->email}} </h4>
                                    <form method="POST"
                                          action="{{ route('editMarked')}}">
                                        @csrf
                                        @if (Auth::user()->isMarked == 1) <h4>Отмечен: Да</h4>
                                        <button type="submit" class="btn btn-danger">Убрать метку</button>
                                        @else <h4>Отмечен: Нет</h4>
                                        <button type="submit" class="btn btn-success">Отметиться</button> @endif
                                    </form>
                                </div>
                                <div class="col-md-12 form-group p_star row">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr class="table_header_1">
                                            <th scope="col">MAC-адреса:</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table_row_1">
                                            <form method="POST" action="{{ route('addUserMac') }}">
                                                @csrf
                                                <td class="table_text_1">
                                                    <input id="mac" type="text"
                                                           class="form-control" name="mac" required autocomplete="mac"
                                                           autofocus
                                                           placeholder="Мак-адрес">
                                                </td>
                                                <td class="table_text_1">
                                                    <button type="submit" class="btn btn-success">
                                                        Добавить
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @isset($data)
                                            @foreach($data as $address)
                                                <tr class="table_row_1">
                                                    <td class="table_text_1">
                                                        <a class="link_1"
                                                           href="{{route('macAddressStatisticsPage', $address['id'])}}">{{ $address['address'] }}</a>
                                                        <br>
                                                    </td>
                                                    <td class="table_text_1">
                                                        <form method="POST"
                                                              action="{{ route('removeUserMac', $address['id']) }}"
                                                              class="row contact_form">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                Удалить
                                                            </button>
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
                </div>
            </div>
        </div>
    </section>

@endsection
