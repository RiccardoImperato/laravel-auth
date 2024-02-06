@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.projects.index') }}">Indietro</a>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <label for="title" class="form-label">Titolo progetto</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection
