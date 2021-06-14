@extends('.parts.app')

@section("title")Войти@endsection

@section('content')

    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Впервые на сайте?</h2>
                            <p>В таком случае вам необходимо пройти процедуру регистрации.</p>
                            <a href="/register" class="btn_3">Создать аккаунт</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_inner">
                            <h3>Добро пожаловать ! <br></h3>
                            <form class="row contact_form" method="POST" action="{{ route('login') }}"
                                  novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-left">Логин</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Логин">

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

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password" placeholder="Пароль">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Войти
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
