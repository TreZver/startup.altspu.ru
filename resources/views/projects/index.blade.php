@extends('layouts.main')

@section('title', 'Голосование')

@section('content')

        <div class="alert alert-info mb-3" role="alert">
            <p>"Проектная деятельность студентов - Алтайский край 2022" против нечестного голосования, из подсчета были убраны "Лайки" не из РФ.</p>
        </div>

        <div class="row row-cols-1 row-cols-lg-3 g-3">
            @foreach ($project as $arItem)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title border-bottom border-primary border-3 pb-2">{{ $arItem->name }}</h5>
                            <div class="ratio ratio-16x9">
                                @isset($arItem->image)
                                    <img class="w-100" src="{{ asset($arItem->image) }}" alt="{{ $arItem->name }}">
                                @endisset
                            </div>
                            <span class="badge  bg-primary_dark">{{ $arItem->getThematicDirection() }}</span>
                        </div>
                        <div class="card-body d-flex align-items-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @isset($arItem->file)
                                    <a target="_blank" href="{{ asset('storage/' . $arItem->file) }}"
                                        class="btn btn-primary">Подробнее</a>
                                @endisset
                                @isset($arItem->link)
                                    <a href="{{ $arItem->link }}" target="_blank" class="btn btn-outline-primary">Ссылка <i
                                            class="fa fa-external-link" aria-hidden="true"></i></a>
                                @endisset
                                <button class="btn btn-outline-danger likeit" data-project-id="{{ $arItem->id }}">
                                    <div class="cnt-wrapper">
                                        <i class="fa fa-lg fa-heart me-2" aria-hidden="true"></i>
                                        <span class="cnt">0</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <script>
            Likeit = {
                list: [],
                class: '.likeit',
                classActive: 'vs-likeit-active',
                classCnt: 'vs-likeit-cnt',
                classAction: 'vs-likeit-action',
                list: [],
                onLike: function(data) {},
                onClick: function() {
                    let project_id = $(this).data('project-id');
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                            method: "GET",
                            dataType: "json",
                            async: false,
                            url: "{{ route('setLike') }}",
                            data: {
                                id: project_id,
                                "_token": token
                            }
                        })
                        .done(function(response) {
                            var search = '.likeit[data-project-id="' + project_id + '"]';
                            var cnt = response.cnt;
                            var button = $(search);
                            $(button).toggleClass('active');
                            $(button).find('.cnt').text(cnt);
                        })
                        .fail(function(response) {
                            console.log(response);
                        });
                },
                init: function() {
                    $arButtonList = $(Likeit.class);

                    /* Массив элементов */
                    var list = [];
                    $arButtonList.each(function(index, value) {
                        let project_id = $(this).data('project-id');
                        list.push(project_id);
                    });
                    Likeit.list = [...new Set(list)];

                    $arButtonList.click(Likeit.onClick);

                    var data = Likeit.onList(Likeit.list);
                    $.each(data, function(key, dataElement) {

                        let elementid = dataElement.element_id;
                        let cnt = dataElement.cnt;
                        let active = dataElement.active;

                        var search = '.likeit[data-project-id="' + elementid + '"]';
                        var button = $(search);
                        button.each(function(i, v) {
                            if (active) {
                                $(v).addClass('active');
                            }
                            $(v).find('.cnt-wrapper').show();
                            $(v).find('.cnt').text(cnt);
                        })
                    });
                },
                onList: function(data) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    var result = [];
                    $.ajax({
                            method: "POST",
                            dataType: "json",
                            async: false,
                            url: "{{ route('likedata') }}",
                            data: {
                                list: data,
                                "_token": token
                            }
                        })
                        .done(function(response) {
                            result = response;
                        });
                    return result;
                }
            };
            $(function() {
                Likeit.init();
            });
        </script>
    @endsection
