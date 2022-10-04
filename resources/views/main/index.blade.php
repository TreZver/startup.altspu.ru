@extends('layouts.main')


@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col-12">
                <div class="position-relative">
                    <div id="baner-gl" class="ratio overflow-hidden" style="--bs-aspect-ratio: 50%;">
                        <img class="d-none d-lg-block h-auto" src="/media/1.png" alt="">
                    </div>
                    <div id="title-wrapper"
                        class="col-12 position-absolute top-50 start-50 translate-middle text-center text-white">
                        <h1 class="display-4 text-lg-primary">Проектная деятельность студентов - Алтайский край 2022</h1>
                        <a href="{{ route('user.index') }}"
                            class="btn border border-primary btn-lg mx-auto mt-3 text-white">Принять
                            участие</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <a href="{{ asset('/doc/img20220505_12211863.pdf') }}" class="d-block border p-3 bg-white rounded-3 text-decoration-none" target="_blank">
                    <i class="fa fa-lg fa-file-pdf-o" aria-hidden="true"></i>
                    Положение о проведении студенческого конкурса "Цифровые стартапы"
                </a>
            </div>
            <div class="col-12">
                <p>
                    Целью и задачами проведения Конкурса являются повышение
                    интереса студентов к научно-исследовательской и учебно-методической
                    деятельности, стимулирование цифрового творчества, воспитания чувства
                    гордости за достижения отечественной науки, формирование у обучающихся
                    ценности научного знания, расширение их общего кругозора, популяризация
                    информационных технологий.
                </p>

                <h2 class="border-bottom pb-3 my-3">Сроки проведения</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">
                        23-25 мая 2022 г. - прием заявок и работ на конкурс;
                    </li>
                    <li class="list-group-item bg-transparent">
                        26-27 мая 2022 г. - проверка соответствия работ условиям конкурса;
                    </li>
                    <li class="list-group-item bg-transparent">
                        30-31 мая 2022 г. - Интернет-голосование;
                    </li>
                    <li class="list-group-item bg-transparent">
                        30-31 мая 2022 г. - защита проектов, награждение победителей и участников Конкурса.
                    </li>
                </ul>
                <h2 class="border-bottom pb-3 my-3">На Конкурс принимаются работы по следующим номинациям:</h2>
                <ul class="list-group list-group-flush">
                    @foreach ($ThematicDirection as $arItem)
                        <li class="list-group-item bg-transparent">
                            {{$arItem->title}}
                        </li>
                    @endforeach
                </ul>
                <h2 class="border-bottom pb-3 my-3">Регистрация:</h2>
                <a target="_blank" class="d-block bg-light p-3 px-4 rounded text-decoration-none" href="{{ route('user.index') }}">
                    <i class="fa fa-lg fa-external-link me-2 " aria-hidden="true"></i> Открыть форму
                </a>
            </div>
        </div>
    </div>
    <style>
        #title-wrapper>* {
            color: var(--bs-primary) !important;
        }

        #title-wrapper>a {
            border-color: var(--bs-primary) !important;
        }

        @media (min-width: 992px) {
            #title-wrapper>* {
                color: var(--bs-light) !important;
                border-color: var(--bs-primary) !important;
            }
        }
        @media (max-width: 992px) {
            #baner-gl{
                --bs-aspect-ratio: 90% !important;
            }
        }
    </style>
@endsection
