<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('headscripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <a class="nav-link" href="{{route('companies.list')}}">Institutii</a>
                            <a class="nav-link" href="{{route('documents.list')}}">Documentele mele</a>
                        @endauth

                            @if (\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <div class="dropdown ml-auto">
                                    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                    </a>

                                    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

                                        <div class="notifications-wrapper">
                                            @foreach (\Illuminate\Support\Facades\Auth::user()->notifications as $notification)
                                                <div class="notification-item" style="background: @if($notification->is_seen == 0) grey @else #D3D3D3 @endif">
                                                    <p class="item-title">{{$notification->text}}</p><br>

                                                </div>
                                            @endforeach

                                        </div>
                                    </ul>

                                </div>

                            @endif

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->getFullName() }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.show')}}">Profil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(count(Auth::user()->companies) > 0)
                                        <a class="dropdown-item" href="{{route('paper.create')}}">Adauga document </a>
                                        <a class="dropdown-item" href="{{route('admin.companies.list')}}">Institutii (Admin)</a>
                                    @endif

                                    @if(Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{route('admin.users.pending')}}">Cereri de cont</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container-fluid">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
