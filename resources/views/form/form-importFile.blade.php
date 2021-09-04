@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('teste') }}</div>

                    <div class="card-body">
                        <form action="{{route('import-store')}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="import_file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-info">
                                SAVE
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
