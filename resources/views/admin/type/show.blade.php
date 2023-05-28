@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>{{ $type->category }}</h1>
            <p>ID categorya: {{ $type->id }}</p>
            <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Back to types</a>
        </div>
    </div>
</div>
@endsection