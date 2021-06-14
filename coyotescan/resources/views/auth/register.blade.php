@extends('.parts.app')

@section("title")Регистрация@endsection

@section('content')

    <section class="registration_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="registration_part_form">
                    <div class="registration_part_form_inner">
                        <h3>Заполните поля для регистрации</h3>
                        <form method="POST" action="{{ route('register') }}" class="row contact_form">
                            @csrf

                            <div class="col-lg-6 col-md-6">
                                <div class="col-md-12 form-group p_star row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-left">Email</label>

                                    <div class="col-md-10">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-left">Пароль</label>

                                    <div class="col-md-10">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="new-password" placeholder="Пароль">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-left">Подтвердите пароль</label>

                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль">
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-success">
                                        Зарегистрироваться
                                    </button>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="col-md-12 form-group p_star row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-left">Имя</label>

                                    <div class="col-md-10">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Имя">

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
                                               autocomplete="sname"  required autofocus placeholder="Фамилия">
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star row">
                                    <label for="fname"
                                           class="col-md-4 col-form-label text-md-left">Отчество</label>

                                    <div class="col-md-10">
                                        <input id="fname" type="text"
                                               class="form-control" name="fname"
                                               autocomplete="fname"  required autofocus placeholder="Отчество">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
