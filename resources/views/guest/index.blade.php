@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8">
            <ul>
                @foreach ($projects as $project)
                    <a href="{{ route('guest.show', $project->slug) }}"><li>{{ $project->title }}</li></a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection