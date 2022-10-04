@extends('layouts.main')

@section('title', __('You are logged in!'))

@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="{{ route('user.index') }}">Проект</a>
    </div>
@endsection
