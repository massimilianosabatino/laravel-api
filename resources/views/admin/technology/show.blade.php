@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>{{ $technology->technology }}</h1>
            <p>ID categorya: {{ $technology->id }}</p>
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Back to technologies</a>
        </div>
    </div>
</div>
@endsection