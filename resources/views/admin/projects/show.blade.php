@extends('layouts.app')

@section('content')
    <div class="container text-center my-4">
        <h1>{{ $project->name }}</h1>
        <a class="text-decoration-none text-black" href="{{ $project->git_link }}">GIT HUB PAGE</a>
        @if ($project->finished)
            <h6 class="text-success">Completato</h6>
        @else
            <h6 class="text-warning">In Lavorazione</h6>
        @endif
        @isset($project->type)
            <h5>Tipologia: {{ $project->type->name }}</h5>
        @else
            <h5>Tipologia non definita</h5>
        @endisset

        @isset($project->technologies)
            <hr>
            <h5>Tecnologie</h5>
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>
                        {{ $technology->name }}
                    </li>
                @endforeach
            </ul>
        @endisset
    </div>
@endsection
