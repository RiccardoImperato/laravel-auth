@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.projects.create') }}">Nuovo progetto</a>
    <ul>
        @foreach ($projects as $project)
            <li>{{ $project->title }}</li>
        @endforeach
    </ul>
@endsection
