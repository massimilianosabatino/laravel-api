@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 text-end">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-secondary">New technology</a>
        </div>
        {{-- Project list --}}
        <div class="col-md-10 p-4 border rounded">
            <h2>All technologies</h2>
            <table id="project-table" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Technology</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Technology ID</th>
                    <th scope="col" colspan="3" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($technologies as $technology)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $technology->technology }}</td>
                            <td>{{ $technology->slug }}</td>
                            <td>{{ $technology->id }}</td>
                            {{-- Action button --}}
                            <td>
                                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-light">Details</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-light">Edit</a>
                            </td>
                            <td>
                                {{-- Modal button for delete --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $technology->id }}">
                                    Delete
                                </button>
                                {{-- /Modal button for delete --}}
                                {{-- Modal delete content --}}
                                <div class="modal fade" id="modal-{{ $technology->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Be careful, this operation is irreversible!
                                                Do you really want to delete <strong>{{ $technology->technology }}</strong> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /Modal delete content --}}
                            </td>
                            {{-- /Action button --}}
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{-- /Project list --}}
    </div>
</div>
@endsection