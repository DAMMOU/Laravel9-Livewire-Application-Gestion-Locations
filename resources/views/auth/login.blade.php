@extends('layouts.authentification')

@section('container')

    <div class="login-box bg-dark" style="width:700px;">

        <div class="card card-outline card-primary bg-dark">
            <div class="card-header text-center">
            <a href="#"class="h1" style="color:#b3b6b9"><b>ToussaD</b>Location</a>
            </div>

            <div class="card-body bg-dark">

                <p class="login-box-msg">Sign in to start your session</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        </div>

                    </div>
                </form>



            </div>
<h1 style="color:#fff;">wilderman.claire@example.org     password</h1>
        </div>

    </div>
    </div>



@endsection
