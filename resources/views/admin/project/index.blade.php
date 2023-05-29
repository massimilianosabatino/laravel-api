@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 text-end">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-secondary">New project</a>
        </div>
        {{-- Project list --}}
        <div class="col-md-10 p-4 border rounded">
            <h2>All projects</h2>
            <table id="project-table" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Private</th>
                    <th scope="col" colspan="3" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <img class="img-fluid thumb" src="@if (Str::startsWith($project->cover, 'http')) {{ $project->cover }} @else {{ asset('storage/' . $project->cover) }} @endif" alt="{{ $project->title }}">
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->type?->category ?: 'Uncategorized' }}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" {{ $project->private ? 'checked' : '' }} id="flexCheckDefault" aria-label="Private project">
                            </td>
                            {{-- Action button --}}
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-light">Details</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-light">Edit</a>
                            </td>
                            <td>
                                {{-- Modal button for delete --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $project->id }}">
                                    Delete
                                </button>
                                {{-- /Modal button for delete --}}
                                {{-- Modal delete content --}}
                                <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Be careful, this operation is irreversible!
                                                Do you really want to delete <strong>{{ $project->title }}</strong> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
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