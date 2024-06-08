@extends('layouts.app')
@section('content')
    <div class="register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="/" class="h1"><b>Social </b>Network</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('/api/register') }}" method="post">
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password_confirmation" type="password" class="form-control"
                                placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('login') }}" class="text-center">I already have an account</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();

                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    password_confirmation: $('#password_confirmation').val()
                };

                $.ajax({
                    url: "{{ url('/api/register') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 200) {
                            // Save token in cookies
                            document.cookie = "token=" + response.token + ";path=/";
                            
                            window.location.href = "/home";
                        }
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                alertify.error(errors[key][0]);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
