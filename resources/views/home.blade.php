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
                    <p>
                        Fist of all, i would to like to thanks for the opportunity.
                    </p>
                    <p>
                        I have some time that don't work directly with Laravel, and this was a great experience, thanks.
                    </p>

                    <p>
                        I tried to prioritize the main functions required,  like insert new data and import files, and creating all of then using a Laravel standart
                        without using plugins or dependencies.
                    </p>

                    <p>
                        Thanks for all, and i hope see you soon
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
