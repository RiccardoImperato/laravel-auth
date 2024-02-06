@extends('layouts.admin')

@section('content')
    <div class="my-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Torna alla dashboard</a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">Nuovo progetto</a>
    </div>
    <ul class="list-unstyled">
        @foreach ($projects as $project)
            <li>
                <div class="d-flex justify-content-between align-items-center border-bottom my-3">
                    <div>{{ $project->id }} - {{ $project->title }}</div>
                    <div>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary btn-sm">Dettagli</a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary btn-sm">Modifica</a>
                        {{-- Button trigger modal  --}}
                        <button type="button" class="btn btn-danger btn-sm my-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal-{{ $project->id }}">
                            Elimina progetto
                        </button>
                    </div>
                </div>

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
