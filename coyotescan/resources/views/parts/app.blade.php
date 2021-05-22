<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield("title")</title>
    <link rel="icon" type="image/png" href="https://image.flaticon.com/icons/png/512/1392/1392816.png" />

    <link rel="stylesheet" href="../../css/nice-select.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- <link rel="stylesheet" href="../css/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/flaticon.css">
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <!-- <link rel="stylesheet" href="../css/slick.css"> -->
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
<!-- navbar -->
<header class="main_menu home_menu" id="header_content">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="https://avatars.mds.yandex.net/get-pdb/4700242/1f27c026-1262-4275-9944-5852f4388570/s1200" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/about">Домой</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Статистика
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/stat/common">Общая информация</a>
                                    <a class="dropdown-item" href="/stat/by-mac-address">По MAC адресу</a>
                                    <a class="dropdown-item" href="/stat/by-station">По станциям</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Администратор
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="/admin/application-settings">Настройки приложения</a>
                                    <a class="dropdown-item" href="/admin/station-management">Управление станциями</a>
                                    <a class="dropdown-item" href="/admin/user-management">Управление пользователями</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Пользователь
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                                    <a class="dropdown-item" href="/user/profile">Редактировать профиль</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer_part">
    <div class="footer_inner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                            <a href="/"><img src="https://avatars.mds.yandex.net/get-pdb/4700242/1f27c026-1262-4275-9944-5852f4388570/s1200" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="social_icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved
                        </P>
                        <div class="copyright_link">
                            <a href="#">Turms & Conditions</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="../../js/jquery-1.12.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.magnific-popup.js"></script>
<script src="../../js/swiper.min.js"></script>
<script src="../../js/mixitup.min.js"></script>
<!-- <script src="../js/owl.carousel.min.js"></script> -->
<script src="../../js/jquery.nice-select.min.js"></script>
<!-- <script src="../js/slick.min.js"></script> -->
<script src="../../js/jquery.counterup.min.js"></script>
<script src="../../js/waypoints.min.js"></script>
<script src="../../js/contact.js"></script>
<script src="../../js/jquery.ajaxchimp.min.js"></script>
<script src="../../js/jquery.form.js"></script>
<script src="../../js/jquery.validate.min.js"></script>
<script src="../../js/mail-script.js"></script>

<script src="../../js/custom.js"></script>
<script src="../../js/app.js"></script>
</body>
</html>
