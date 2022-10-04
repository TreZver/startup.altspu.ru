<div>
    <ul class="list-unstyled me-md-n3 rounded-1" data-role="menu">
        @php
            $arResult = [
                [
                    'SELECTED' => true,
                    'TEXT' => 'ssdfsdfds',
                    'ICON' => 'fa-space-shuttle',
                    'LINK' => '',
                ],
                [
                    'SELECTED' => true,
                    'TEXT' => 'ssdfsdfds',
                    'ICON' => 'fa-space-shuttle',
                    'LINK' => '',
                ],
            ];
        @endphp

        @foreach ($arResult as $arItem)
            <li
                class="py-2 px-3 mb-1 border-primary shadow-sm bg-primary_dark @if ($arItem['SELECTED']) border-start border-4 border-primary_light @endif">
                <a class="d-block link-light text-decoration-none" href="{{ $arItem['LINK'] }}">
                    <div @isset($arItem['SELECTED']) class="ms-n1" @endisset>
                        @isset($arItem['ICON'])
                            <i class="me-1 fa {{ $arItem['ICON'] }}" aria-hidden="true"></i>
                            {{ $arItem['TEXT'] }}
                        @endisset
                    </div>

                </a>
            </li>
        @endforeach

    </ul>
</div>
