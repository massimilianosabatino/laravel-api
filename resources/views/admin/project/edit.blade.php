@extends('layouts.app')

@section('content')
{{-- Error handler --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>   
@endif
{{-- /Error handler --}}
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div id="edit" class="col-md-10 p-4 border rounded edit">
            <h2>Edit project</h2>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
                    <label for="title" class="form-label">Title</label>
                </div>
                {{-- Image section --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cover" name="cover" value="{{ old('cover', $project->cover) }}">
                    <label for="cover" class="form-label">Cover image url or path</label>
                </div>
                <div class="mb-3">
                    <img class="img-fluid" id="file-preview" src="@if (Str::startsWith($project->cover, 'http')) {{ $project->cover }} @else {{ asset('storage/' . $project->cover) }} @endif">
                </div>
                <div class="mb-3">
                    <label for="cover-upload" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="cover-upload" name="cover-upload">
                  </div>
                {{-- /Image section --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $project->description) }}">
                    <label for="description" class="form-label">Description</label>
                </div>
                {{-- Category --}}
                <div class="form-floating mb-3">
                    <select class="form-select" name="type_id" id="category">
                        <option value="" {{ $project->type_id == '' ? 'selected' : '' }}>Select category</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->category }}</option>
                        @endforeach
                      </select>
                      <label for="category">Select category</label>
                </div>
                {{-- /Category --}}
                {{-- Technologies --}}
                <div class=" mb-3">
                    <div>Select techonologies</div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="technologies-{{ $loop->iteration }}" value="{{ $technology->id }}" 
                                {{-- Print projects assigned tag, if any error retrive old checked--}}
                                @if($errors->any())
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                @else
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} 
                                @endif
                                {{-- /Print projects assigned tag, if any error retrive old checked--}}
                            name="technologies[]">
                            <label class="form-check-label" for="technologies-{{ $loop->iteration }}">{{ $technology->technology }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- /Technologies --}}
                <div class="form-floating mb-3">
                    <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $project->link) }}">
                    <label for="link" class="form-label">Project external link</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="client" name="client" value="{{ old('client', $project->client) }}">
                    <label for="client" class="form-label">Client</label>
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" id="private" name="private" value="{{ old('private', $project->private) }}" @checked(old('private', $project->private))>
                    <label for="private" class="form-check-label">Private project</label>
                </div>
                {{-- Action buttons --}}
                <div class="row">
                    <button type="submit" class="btn btn-primary col-auto mx-2">Submit</button>
                    <button type="reset" class="btn btn-info col-auto mx-1">Reset</button>
                    <div class="col-auto ms-auto">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to projects</a>
                    </div>
                </div>
                {{-- /Action buttons --}}
            </form>
        </div>
    </div>
</div>
@endsection