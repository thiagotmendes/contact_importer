@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Add cotnact info') }}</div>

            <div class="card-body">
                @if(!empty($msg_success))
                    <div class="alert alert-success"> {{ $msg_success }}</div>
                @endif
                @if(session()->has('msg_error'))
                    <div class="alert alert-danger">
                        {{ session()->get('msg_error') }}
                    </div>
                @endif
                <form action="{{route('contact-store')}}" class="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="phone" class="form-control phone" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="birth_date" class="form-control" placeholder="Birth date">
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="franchise" class="form-control" placeholder="Franchise">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="credit_card" class="form-control" placeholder="Credit Card Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-outline-success btn-block">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
