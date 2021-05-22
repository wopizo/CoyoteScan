@extends('.parts.app')
@section('content')

    <section class="profile_part section_padding ">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="col-md-12 form-group p_star">
                        <label for="username">Username</label>
                        <input type="text" class="form-control disabled-field" id="username" name="username"
                               value="VinniPuh1995"
                               placeholder="Username" disabled>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <label for="email">Email</label>
                        <input type="text" class="form-control disabled-field" id="email" name="email"
                               value="vinni@gmail.com"
                               placeholder="Email" disabled>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <label for="password">Password</label>
                        <input type="password" class="form-control disabled-field" id="password" name="password"
                               value=""
                               placeholder="*******" disabled>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row align-items-center">
                        <div class="col-md-12 form-group p_star">
                            <label for="name">Name</label>
                            <input type="text" class="form-control disabled-field" id="name" name="name" value="Mike"
                                   placeholder="Name" disabled>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control disabled-field" id="surname" name="surname"
                                   value="Churchill"
                                   placeholder="Surname" disabled>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="patronymic">Patronymic</label>
                            <input type="text" class="form-control disabled-field" id="patronymic" name="patronymic"
                                   value="Johns"
                                   placeholder="Patronymic" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <a href="#" class="unDisable_link">Unlock</a>
            </div>
        </div>
    </section>

@endsection
