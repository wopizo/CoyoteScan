@extends('.parts.app')
@section('content')

    <section class="registration_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="registration_part_form">
                    <div class="registration_part_form_inner">
                        <h3>Welcome ! <br>
                            Please fill the fields</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-lg-6 col-md-6">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="username" value=""
                                           placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="email" value=""
                                           placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                           placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="passwordConfirm"
                                           name="passwordConfirm"
                                           value=""
                                           placeholder="Password confirmation">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        create
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                           placeholder="Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="surname" name="surname" value=""
                                           placeholder="Surname">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="patronymic" name="patronymic" value=""
                                           placeholder="Patronymic">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="macAddress" name="macAddress" value=""
                                           placeholder="MAC address">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
