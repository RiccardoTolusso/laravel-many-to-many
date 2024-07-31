@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <h1>INSERISCI UN NUOVO PROGETTO</h1>
        @isset($project)
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="row row-cols-1 g-4">
                @method('PUT')
            @else
                <form action="{{ route('admin.projects.store') }}" method="POST" class="row row-cols-1 g-4">
                @endisset
                @csrf
                <div class="col">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control text-center" id="inputName"
                        value="{{ old('name', $project->name ?? '') }}">
                </div>
                <div class="col">
                    <label for="inputGit" class="form-label">Link Repo Github</label>
                    <input type="text" name="git_link" class="form-control text-center" id="inputGit"
                        value="{{ old('git_link', $project->git_link ?? '') }}">
                </div>
                <div class="col">
                    <label for="inputFinished" class="form-label">Status Progetto</label>
                    <select name="finished" id="inputFinished" class="form-control text-center">
                        <option value="0" @if (old('finished', $project->finished ?? '') == '0') selected @endif>In fase di sviluppo
                        </option>
                        <option value="1" @if (old('finished', $project->finished ?? '') == '1') selected @endif>Terminato e revisionato
                        </option>
                    </select>
                </div>
                @isset($types)
                    <div class="col">
                        <label for="inputType" class="form-label">Tipologia di Progetto</label>
                        <select name="type_id" id="inputType" class="form-control text-center">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if (old('type_id', $project->type->id ?? '') == $type->id) selected @endif>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endisset
                <div class="col">
                    <label for="inputType" class="form-label">Tecnologie utilizzate</label>
                    @foreach ($technologies as $technology)
                        <div>
                            <input type="checkbox" name="technology[]" value="{{ $technology->id }}">
                            {{ $technology->name }}
                        </div>
                    @endforeach
                </div>
                <div class="col py-3">
                    @isset($project)
                        <button class="btn btn-success px-4"> Modifica Progetto </button>
                    @else
                        <button class="btn btn-success px-4"> Aggiungi Progetto </button>
                    @endisset
                </div>

            </form>
    </div>
@endsection
