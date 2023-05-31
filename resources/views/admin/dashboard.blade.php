@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Dashboard home card --}}
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                    {{-- Feed reader --}}
                    <div class="news mt-3">
                        <h2>News feed</h2>
                        <div class="news-group">
                            <h3>Laravel</h3>
                            @foreach ($news as $item)
                            <div class="news-element mb-3">
                                <h4>{{ $item['name'] }} <small>{{ $item['pubDate'] }}</small></h4>
                                <div class="news-description">{!! $item['description'] !!}</div>
                                <div class="news-link"><a href="{{ $item['link'] }}" target="blank">Read more</a></div>
                            </div>    
                            @endforeach
                        </div>
                    </div>
                    {{-- / Feed reader --}}
                </div>
            </div>
            {{-- / Dashboard home card --}}
        </div>
    </div>
    {{-- Statistic card --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>
                <div class="card-body">
                    <div class="col-6">
                        Totale progetti: {{ $countProjectTotal }}
                    </div>
                    <div class="col-6">
                        
                        Categoria con più progetti: {{Str::ucfirst($getMaxCategoryName->category) }} -> {{ $getMaxCategory->number }} progetti
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Gestione progetti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- / Statistic card --}}
    {{-- Projects quick menu --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col col-lg-6 text-center d-flex">
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Gestione progetti</a>
                        </div>
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-light">Aggiungi progetto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- / Projects quick menu --}}
    {{-- Category and technologies quick menu --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categorie e sottocategorie</div>
                <div class="card-body d-flex">
                    <div class="col col-lg-6 text-center d-flex">
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.types.index') }}" class="btn btn-light">Gestione categorie</a>
                        </div>
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.types.create') }}" class="btn btn-light">Aggiungi categoria</a>
                        </div>
                    </div>
                    <div class="col col-lg-6 text-center d-flex">
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.technologies.index') }}" class="btn btn-light">Gestione technologie</a>
                        </div>
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.technologies.create') }}" class="btn btn-light">Aggiungi technologia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- / Category and technologies quick menu --}}
    {{-- Leads quick menu --}}
    <div class="row justify-content-center align-items-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Leads</div>
                <div class="card-body d-flex">
                    <div class="col col-lg-6 text-center d-flex">
                        <div class="col col-lg-6">
                            <a href="{{ route('admin.leads.index') }}" class="btn btn-light">Gestione leads</a>
                        </div>
                        <div class="col col-lg-6">
                            <small class="align-middle">Messaggi ricevuti: {{ $leadsCount }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //Leads quick menu --}}
</div>
@endsection
