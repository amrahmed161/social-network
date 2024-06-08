<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Network</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('layouts/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('layouts/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Alertify -->
    <link rel="stylesheet" href="{{ asset('layouts/plugins/alertify/css/alertify.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('layouts/css/adminlte.min.css') }}">

    <meta name="description" content="Connect with friends, family, and people you know. Share photos and videos, send messages, and get updates.">
    <meta property="og:title" content="Social Network">
    <meta property="og:description" content="Connect with friends, family, and people you know. Share photos and videos, send messages, and get updates.">
    @yield("styles")
</head>

<body class="">
    @include("layouts.header")

    @yield("content")

    @include("layouts.footer")
    <!-- jQuery -->
    <script src="{{ asset('layouts/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset("layouts/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
    <!-- Alertify -->
    <script src="{{ asset("layouts/plugins/alertify/alertify.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('layouts/js/adminlte.min.js') }}"></script>

    @yield("scripts")
</body>

</html>
