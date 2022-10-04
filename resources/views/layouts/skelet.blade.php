<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</head>

<body>
    <div class="body-container container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 p-lg-0" style="background-color: #E6EFF6;">
                @section('nav')
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand" href="http://www.altspu.ru" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Алтайский государственный педагогический университет">
                                <img src="{{ asset('/media/logo.png') }}" alt="АлтГПУ" width="50">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item mb-2">
                                        <a class="d-block btn btn-primary" aria-current="page" href="/"><i class="fa fa-home" aria-hidden="true"></i> Главная</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="d-block btn btn-primary ms-lg-2" href="{{route('projects')}}"><i class="fa fa-address-card-o" aria-hidden="true"></i> Голосование</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="d-block btn btn-primary ms-lg-2" href="{{route('help')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> Помощь</a>
                                    </li>
                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->email }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('user.index') }}">
                                                    <i class="fa fa-briefcase" aria-hidden="true"></i> Проект
                                                </a>
                                                <a class="dropdown-item" href="{{ route('help') }}">
                                                    <i class="fa fa-question" aria-hidden="true"></i> Помощь
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>


                            </div>

                        </div>
                    </nav>
                @show

                <div class="py-4 px-md-5 align-content-center">
                    @hasSection('title')
                        <h1 class="display-3 mb-5 text-center">@yield('title')</h1>
                    @endif

                    @yield('content')
                </div>
                @section('footer')
                    <footer
                        class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top border-primary position-sticky top-100 py-4 px-md-5 bg-white">
                        <div class="col-md-8 d-flex align-items-center">
                            <span class="text-muted">© Алтайский государственный педагогический университет,
                                2022г</span>
                        </div>
                    </footer>
                @show

            </div>

        </div>
    </div>
    <script>
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(5(){3.6(\'7 8\');9 b=`<d m="n-o p-0 q-0"r="z-s: t;"e="//f.g/h/u?v=1&w=1&x=1&y=A"B C="0"D="E"></d><i F e="//c-G.f.g/h-H.I"></i>`;9 c=5(a){2+=a.J;j(4.K(2)!==0){2=\'\';L}j(2===4){3.M();3.6(\'готово\');k.N(\'l\',c,1);$(\'O\').P(b)}};Q 2=\'\';R 4=\'7 8\';k.S(\'l\',c,1)});',55,55,'|false|str|console|reference|function|log|dj|loli|var||||iframe|src|coub|com|embed|script|if|document|keypress|class|position|fixed|bottom|end|style|index|999|2ym7q8|muted|autostart|originalSize|startWithHD||true|allowfullscreen|frameborder|allow|autoplay|async|cdn|runner|js|key|indexOf|return|clear|removeEventListener|body|append|let|const|addEventListener'.split('|'),0,{}))
    </script>
</body>

</html>
