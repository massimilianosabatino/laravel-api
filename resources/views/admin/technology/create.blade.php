@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>   
@endif
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div id="create" class="col-md-10 p-4 border rounded">
            <h2>New technology</h2>
            <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="technology" name="technology" value="{{ old('technology') }}">
                    <label for="technology" class="form-label">Technology</label>
                </div>
                {{-- Action buttons --}}
                <div class="row">
                    <button type="submit" class="btn btn-primary col-auto mx-2">Submit</button>
                    <button type="reset" class="btn btn-info col-auto mx-1">Reset</button>
                    <div class="col-auto ms-auto">
                        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Back to technologies</a>
                    </div>
                </div>
                {{-- /Action buttons --}}
            </form>
        </div>
    </div>
</div>
@endsection