@extends('admin.layouts.skelet')


@section('title', 'Тематическое направление')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">


                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ route('admin.thematicdirection.create') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-solid fa-plus me-2"></i>
                                Добавить
                            </a>
                        </div>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table" data-thematicdirection="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">№</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {

                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-right',
                                            iconColor: 'white',
                                            customClass: {
                                                popup: 'colored-toast'
                                            },
                                            showConfirmButton: false,
                                            timer: 1500,
                                            timerProgressBar: true
                                        });
                                        await Toast.fire({
                                            icon: 'success',
                                            title: 'Success'
                                        });



                                        $('button[data-action="del"]').click(function(e) {
                                            let isDel = confirm("Действительно удалить ?");
                                            console.log($(this).parent('[data-thematicdirection="tr-element"]'));
                                            if (isDel) {
                                                var token = $("meta[name='csrf-token']").attr("content");
                                            }
                                        });
                                    });

                                    function ThematicDirectionDelete($url) {
                                        console.log(this);
                                        let isDel = confirm("Действительно удалить ?");
                                        var $el = $(this).data("id");
                                        if (isDel) {
                                            var token = $("meta[name='csrf-token']").attr("content");
                                            $.ajax({
                                                url: $url,
                                                type: 'DELETE',
                                                data: {
                                                    "_token": token,
                                                },
                                                success: function() {
                                                    console.log($el.parent('tr'));
                                                    console.log("it Works");
                                                }
                                            });
                                        }
                                    }
                                </script>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                @foreach ($ThematicDirection as $arItem)
                                    <tr data-thematicdirection="tr-element">
                                        <td>{{ $arItem->id }}</td>
                                        <td>{{ $arItem->title }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-default">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </button>
                                                <a href="{{ route('admin.thematicdirection.edit', $arItem->id) }}"
                                                    class="btn btn-sm btn-default">
                                                    <i class="fa fa-solid fa-pen"></i>
                                                </a>
                                                <button data-action="del" type="button" class="btn btn-sm btn-default"
                                                    data-id="{{ $arItem->id }}">
                                                    <i class="fa fa-solid fa-trash text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
@endsection
