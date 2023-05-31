@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <h1>Messaggio numero {{ $lead->id }}</h1>
            <h2>Inviato da: <span>{{ $lead->name }}</span></h2>
            <div><small>{{ $lead->email }}</small></div>
            <p>{{ $lead->message }}</p>
            <div>Inviato il: {{ $lead->created_at }}</div>
            <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">Back to leads</a>
        </div>
    </div>
</div>
@endsection