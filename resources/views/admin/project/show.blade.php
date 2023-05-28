@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- Project cover --}}
            <img src="@if (Str::startsWith($project->cover, 'http')) {{ $project->cover }} @else {{ asset('storage/' . $project->cover) }} @endif" alt="" class="img-fluid">
            {{-- / Project cover --}}
            {{-- Project details --}}
            <h1>{{ $project->title }}</h1>
            <p>{{ $project->description }}</p>
            <div>
                Category: {{ Str::ucfirst($project->type?->category) ?: 'Nessuna categoria' }}
            </div>
            
            @if(count($project->technologies) > 0)
            <div>
                Technologies:
                @foreach ($project->technologies as $technology)
                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="text-decoration-none">
                    {{ Str::ucfirst($technology->technology) }}
                </a>
                @endforeach
            </div>
            @endif
            {{-- / Project details --}}
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to projects</a>
        </div>
    </div>
</div>
@endsection