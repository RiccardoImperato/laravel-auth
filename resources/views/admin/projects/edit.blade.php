@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.projects.index') }}">Indietro</a>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title" class="form-label">Titolo progetto</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ $project->title }}">
        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection
