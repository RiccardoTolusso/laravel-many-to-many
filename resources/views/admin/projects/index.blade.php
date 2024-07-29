@extends('layouts.app')

@section('content')
    <div class="container text-center">

        <h1>PROGETTI</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Link</th>
                    <th>Terminato</th>
                    <th>Controlli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->git_link }}</td>
                        <td>
                            @if ($project->finished)
                                &check;
                            @else
                                &cross;
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">👁️</a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">✏️</a>
                            <form class="d-inline" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
