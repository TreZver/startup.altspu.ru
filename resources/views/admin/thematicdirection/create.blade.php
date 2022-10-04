@extends('admin.layouts.skelet')


@section('title', 'Добавить тематическое направление')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group list-group-flush">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item bg-transparent">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.thematicdirection.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="name" class="form-control" >
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
