<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shalinks</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/88c86ccbe6.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>@import url('https://fonts.googleapis.com/css?family=Kosugi');</style>
</head>
<body>
    <div id="app" class = "wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class = "logoImage" src="{{asset('images/shalinks.png')}}" alt="ロゴ画像">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link added-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link added-link" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user() -> image == null)
                                        <img alt = "プロフィール画像" src = "{{ asset('images/default_user_image.png') }}" class = "p-image">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    @else
                                    <img alt="プロフィール画像" src="{{ Storage::disk('s3')->url(Auth::user()->image) }}" class = "p-image">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user() -> id !== 31)
                                    <a class="dropdown-item" href="/show/{{Auth::user()->id}}">
                                        プロフィール設定
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        新規登録
                                    </a>
                                @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest

                                <li class="nav-item">
                                    <a class="nav-link added-link" href="about">Shalinksとは</a>
                                </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('my_status'))
            <div class="container mt-2">
                <div class="alert alert-success">
                    {{ session('my_status') }}
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <p class = "footer-p"><small>&copy; 2020 Shalinks</small></p>
        </footer>
    </div>
    <script>
        $(function(){
            $('.btn-area').on('click',function(){
                $(this).parent().next().slideToggle();
            });

            $('.copy-btn-area').click(function(){
                let clipboard = $('<textarea></textarea>');
                clipboard.val($(this).prev().text());
                $(this).append(clipboard);
                clipboard.select();
                document.execCommand('copy');
                clipboard.remove();
                alert('urlをコピーしました');
            });
        });
</script>
</body>
</html>
