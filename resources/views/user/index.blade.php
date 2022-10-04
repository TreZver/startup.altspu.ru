@extends('layouts.main')

@section('title', 'Проект ' . '"' . $project->name . '"')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2>
                Проект
                <a href="{{ route('user.edit.index') }}" type="button" class="btn btn-primary">Редактировать</a>
            </h2>
            <hr>
            <table class="table table-striped caption-top table-bordered">
                <tbody>
                    <tr>
                        <th colspan="2" scope="row"><a target="_blank" href="{{ asset('storage/' . $project->file) }}"><i
                                    class="fa fa-file" aria-hidden="true"></i> Файл(скачать)</a></th>
                    </tr>
                    @php
                        switch ($project->status) {
                            case 1:
                                $class = 'table-warning';
                                break;
                            case 2:
                                $class = 'table-warning';
                                break;
                            case 3:
                                $class = 'table-success';
                                break;
                            default:
                                $class = 'table-warning';
                        }
                        
                    @endphp
                    <tr>
                        <th scope="row">Статус проекта</th>
                        <td class="{{ $class }}">{{ $project->getStatus() }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Название проекта</th>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Тематическое направление</th>
                        <td>{{ $project->getThematicDirection() }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ссылка</th>
                        <td>
                            <a target="_blank" rel="noopener" href="{{ $project->link }}">{{ $project->link }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Ф.И.О. руководителя (полностью, если есть)</th>
                        <td>{{ $project->exec_fio }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Должность руководителя (полностью, если есть)</th>
                        <td>{{ $project->exec_dolj }}</td>
                    </tr>
                <tfoot class="table-dark">
                    <td>Дата изменения</td>
                    <td>{{ $project->updated_at }}</td>
                </tfoot>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h2>Участники <a href="{{ route('user.participant.new.index') }}" class="btn btn-primary">добавить</a></h2>
            <ul class="list-group list-group-flush">
                @foreach ($participants as $participan)
                    <li class="list-group-item">
                        <a href="{{ route('user.participant.index', ['id' => $participan->id]) }}">
                            {{ $participan->getFIO() }}
                        </a>
                        <a class="me-3" href="{{ route('user.participant.edit', $participan->id) }}"><i
                                class="ms-3 fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{ route('user.participant.delete.action', $participan->id) }}"
                            class="d-inline-block" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-default">
                                <i class="fa fa-solid fa-trash text-danger"></i>
                            </button>
                        </form>

                    </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
