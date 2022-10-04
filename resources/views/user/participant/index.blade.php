@extends('layouts.skelet')

@section('content')
    <div class="mb-3">
        <a href="{{ route('user.index') }}" class="btn btn-primary">Вернуться</a>
        <a href="{{ route('user.participant.edit.action',$Participant->id) }}" class="btn btn-primary">Редактировать</a>
    </div>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">ФИО</th>
                <td>{{ $Participant->getFIO() }}</td>
            </tr>
            <tr>
                <th scope="row">Возраст</th>
                <td>{{ $Participant->age }}</td>
            </tr>
            <tr>
                <th scope="row">Телефон</th>
                <td>{{ $Participant->phone }}</td>
            </tr>
            <tr>
                <th scope="row">Институт</th>
                <td>{{ $Participant->institute }}</td>
            </tr>
            <tr>
                <th scope="row">Группа</th>
                <td>{{ $Participant->gruppa }}</td>
            </tr>
        </tbody>
    </table>
@endsection
