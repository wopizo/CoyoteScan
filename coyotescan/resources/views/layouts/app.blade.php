<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @yield("content")
        @include("inc.test_inside")
    </div>
</body>
</html>
