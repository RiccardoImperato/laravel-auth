@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.dashboard') }}">Torna alla dashboard</a> -
    <a href="{{ route('admin.projects.create') }}">Nuovo progetto</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <div>
                    {{ $project->title }} - <a href="{{ route('admin.projects.show', $project) }}">Dettagli</a> - <a
                        href="{{ route('admin.projects.edit', $project) }}">Modifica</a>
                </div>
                {{-- Button trigger modal  --}}
                <button type="button" class="btn btn-danger btn-sm my-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-{{ $project->id }}">
                    Elimina progetto
                </button>
                {{-- Button trigger modal  --}}

                {{-- Modal  --}}
                <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare: {{ $project->title }}?
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Elimina">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal  --}}
            </li>
        @endforeach
    </ul>
@endsection
