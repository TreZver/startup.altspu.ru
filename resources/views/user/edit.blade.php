@extends('layouts.main')

@section('title', 'Редактировать проект')
@section('content')
    <div class="mb-3">
        <a href="{{ route('user.index') }}" class="btn btn-primary">Вернуться</a>
    </div>
    @php
    $form = [['name' => 'name'], ['name' => 'link'], ['name' => 'exec_fio'], ['name' => 'exec_dolj']];
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
    <form action="{{ route('user.edit.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <a href="{{ asset('storage/' . $project->file) }}" class="d-block border p-2 bg-white"><i class="fa fa-file"
                    aria-hidden="true"></i> Сохраненнный вариант файла, Не выбирайте файл, если не хотите его
                заменить</a><br>
            <label for="formFileLg" class="form-label">{{ __('projects.' . 'file') }}</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" value="{{ old('file') }}">
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" name="thematic_direction">
                @php
                    $value = old('thematic_direction') == '' ? $project['thematic_direction'] : old('thematic_direction');
                @endphp
                <option value="">Не выбрано</option>
                @foreach ($ThematicDirection as $arItem)
                    <option value="{{ $arItem->id }}" @if ($value == $arItem->id) selected @endif>
                        {{ $arItem->title }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">{{ __('projects.' . 'thematic_direction') }}</label>
        </div>

        @foreach ($form as $el)
            @php
                $value = old($el['name']) == '' ? $project[$el['name']] : old($el['name']);
                if (!empty($el['type'])) {
                    $type = $el['type'];
                } else {
                    $type = 'text';
                }
                
            @endphp
            <div class="form-floating mb-3">
                <input type="{{ $type }}" class="form-control" id="{{ $el['name'] }}"
                    name="{{ $el['name'] }}" value="{{ $value }}">
                <label for="{{ $el['name'] }}">{{ __('projects.' . $el['name']) }}</label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#phone').mask('0 (000) 000 0000');
            $('#age').mask('00');
        });
    </script>


@endsection
