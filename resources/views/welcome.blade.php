@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to the Administration Page') }}</div>

                <div class="card-body">
                    Click on login or register in the menu to get started :)
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
                        <a href="{{ route('guest.index') }}" class="btn btn-light">Go to public projects</a>
        </div>
    </div>
</div>
@endsection
