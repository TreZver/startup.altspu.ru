@extends('layouts.main')

@section('title', 'Новый проект')
@section('content')
    @php
    $form = [['name' => 'name'], ['name' => 'link'],  ['name' => 'exec_fio'], ['name' => 'exec_dolj']];
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
    <form action="{{ route('user.new.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFileLg" class="form-label">{{ __('projects.' . 'file') }}</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" value="{{ old('file') }}">
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" name="thematic_direction">
                @php
                    $value = old('thematic_direction');
                @endphp
                <option value="">Не выбрано</option>
                @foreach ($ThematicDirection as $arItem)
                    <option value="{{ $arItem->id }}" 
                        @if ($value == $arItem->id) selected @endif
                    >
                        {{ $arItem->title }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">{{ __('projects.' . 'thematic_direction') }}</label>
        </div>
        @foreach ($form as $el)
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="{{ $el['name'] }}" name="{{ $el['name'] }}"
                    value="{{ old($el['name']) }}">
                <label for="{{ $el['name'] }}">{{ __('projects.' . $el['name']) }}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <script>
        $(document).ready(function() {
            $('#phone').mask('0 (000) 000 0000');
            $('#age').mask('00');
        });
    </script>
@endsection
