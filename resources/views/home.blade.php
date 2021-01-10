@extends('auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Thank you for register, please sign in to return') }}
                    <p class="mb-0">
                        <a href="/admin" class="text-center">Please access here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
