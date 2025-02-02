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

                    <div class="mt-4">
                        @if (Auth::user()->role === 'superAdmin')
                            <a href="{{ route('superAdmin.index') }}" class="btn btn-primary">Ir al Panel de SuperAdmin</a>
                        @elseif (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.index') }}" class="btn btn-primary">Ir al Panel de Admin</a>
                        @else
                            <a href="{{ route('home') }}" class="btn btn-primary">Ir al Inicio</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
