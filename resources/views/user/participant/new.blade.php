@extends('layouts.skelet')

@section('content')
    <div class="mb-3">
        <a href="{{ route('user.index') }}" class="btn btn-primary">Вернуться</a>
    </div>

    @php
    $form = ['surname', 'name', 'patronym', 'age', 'phone', 'institute', 'group'];
    @endphp
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group list-group-flush">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item bg-transparent">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.participant.new.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($form as $el)
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="{{ $el }}" name="{{ $el }}"
                    value="{{ old($el) }}">
                <label for="{{ $el }}">{{ __('participant.' . $el) }}</label>
            </div>
        @endforeach
        <button class="btn btn-primary" type="submit">Отправить</button>
    </form>
    <script>
        $(document).ready(function() {
            $('#phone').mask('0 (000) 000 0000');
            $('#age').mask('00');
        });
    </script>
@endsection
