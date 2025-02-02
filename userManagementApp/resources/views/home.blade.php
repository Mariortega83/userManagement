@extends('layouts.app')

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


                    <div class="mt-3">



                        @if (trim(auth()->user()->role) === 'admin')
                        <a href="{{ route('admin') }}" class="btn btn-primary">Ir al Panel de Admin</a>
                        @elseif (trim(auth()->user()->role) === 'user')
                        <a href="{{ route('user') }}" class="btn btn-primary">Ir al Panel de Usuario</a>
                        @elseif (trim(auth()->user()->role) === 'superAdmin')
                        <a class="btn btn-secondary">Ir a Inicio</a>
                        
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection