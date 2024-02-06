@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.projects.index') }}">Indietro</a>
    <h3>{{ $project->title }}</h3>
@endsection
