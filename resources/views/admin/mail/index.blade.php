@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <table id="leads-table" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Date</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($leads as $lead)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->created_at }}</td>
                        {{-- Action --}}
                        <td>
                            <a href="{{ route('admin.leads.show', $lead) }}"class="btn btn-light">Details</a>
                        </td>
                        <td>
                            {{-- Modal button for delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $lead->id }}">
                                Delete
                            </button>
                            {{-- /Modal button for delete --}}
                            {{-- Modal delete content --}}
                            <div class="modal fade" id="modal-{{ $lead->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Be careful, this operation is irreversible!
                                            Do you really want to delete <strong>{{ $lead->id }}</strong> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="post">
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
        </div>
    </div>
</div>
    
@endsection