@extends('admin.layouts.skelet')


@section('title', 'Добавить тематическое направление')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{ route('admin.thematicdirection.update',$ThematicDirection->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="name" class="form-control" value="{{ $ThematicDirection->title }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
