@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Add cotnact info') }}</div>



            <div class="card-body">
                <div class="mb-4">
                    <a href="{{route('contact-create')}}" class="btn btn-success mr-3">
                        Add New contact
                    </a>
                    <a href="" class="btn btn-outline-info">
                        Import contacts by CSV file
                    </a>
                </div>
                <table class="table table-bordered table-striped table-dark">
                    <theader>
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Credit Card</th>
                            <th>Franchise</th>
                            <th>Email</th>
                        </tr>
                    </theader>
                    <tbody>
                    @foreach($listContact as $contact)
                        <tr>
                            <th>{{$contact->name}}</th>
                            <th>{{$contact->date_birth}}</th>
                            <th>{{$contact->phone}}</th>
                            <th>{{$contact->address}}</th>
                            <th>{{$contact->credcard}}</th>
                            <th>{{$contact->franchise}}</th>
                            <th>{{$contact->email}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
