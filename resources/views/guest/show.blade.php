@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="@if (Str::startsWith($project->cover, 'http')) {{ $project->cover }} @else {{ asset('storage/' . $project->cover) }} @endif" alt="" class="img-fluid">
            <h1>{{ $project->title }}</h1>
            <p>{{ $project->description }}</p>
                <a href="{{ route('guest.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection