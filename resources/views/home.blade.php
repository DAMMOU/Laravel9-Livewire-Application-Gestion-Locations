
@extends('layouts.master')


@section("contenu")
    <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card card-primary card-outline">

                            <div class="card-header">
                                <h5 class="m-0">jlhlb</h5>
                                @foreach ( auth()->user()->roles as $role )
                                <h5 class="m-0">{{$role->nom}} </h5>  
                                @endforeach
                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Bienvenu, <b>{{lastname()}} </b> </h6>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>

                        </div>
                    </div>
                </div>
    
    </div>

@endsection







{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}