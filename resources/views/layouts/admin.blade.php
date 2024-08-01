<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('header')
</head>
<body>

    @include('includes.messages')

    <header>
        <div class="text">
            <i id="menu-action" class="fa-solid fa-bars"></i>
            <p class="logo">Admin Panel</p>
        </div>
        <div class="navigation-options">
            <div class="notifications">
                <div class="notification">
                    <i class="fa-regular fa-bell"></i>
                    <span class="counter">5</span>
                    <div class="notification-box">
                        <div class="header">
                            <p>Notificações</p>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <a href="">
                                        <p><b>Fulano</b> preencheu um lead!</p>
                                        <span>1 min atrás</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <p><b>Fulano</b> preencheu um lead!</p>
                                        <span>1 min atrás</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <p><b>Fulano</b> preencheu um lead!</p>
                                        <span>1 min atrás</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer">
                            <a href="">
                                <p>Veja todas as notificações</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="notification">
                    <i class="fa-regular fa-envelope"></i>
                    <span class="counter">+9</span>
                    <div class="notification-box">
                        <div class="header">
                            <p>Notificações</p>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <p>Fulano preencheu um lead!</p>
                                    <span>1 min atrás</span>
                                </li>
                                <li>
                                    <p>Fulano preencheu um lead!</p>
                                    <span>1 min atrás</span>
                                </li>
                                <li>
                                    <p>Fulano preencheu um lead!</p>
                                    <span>1 min atrás</span>
                                </li>
                            </ul>
                        </div>
                        <div class="footer">
                            <p>Veja todas as notificações</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="perfil">
                <a href="{{ route('user.index') }}">
                    <img src="{{ Auth()->user()->image ? asset('upload/users/' . Auth()->user()->image) : asset('img/user.png') }}" alt="">
                </a>
                <details>
                    <summary>
                        {{ Auth()->user()->name }}
                    </summary>
                    <ul>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <p><i class="fa-solid fa-user"></i> <span>Perfil</span></p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <p><i class="fa-solid fa-gear"></i> <span>Configurações</span></p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login.logout') }}">
                                <p><i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span></p>
                            </a>
                        </li>
                    </ul>
                </details>
            </div>
        </div>
    </header>
    <div class="container">
        <aside id="menu" class="active">
            <ul>
                <li>
                    <a href="{{ route('admin.home') }}" class="{{ request()->segment(2) == null ? 'active' : '' }}">
                        <p>
                            <span class="icon">
                                <i class="fa-solid fa-house"></i>
                            </span>
                            <span>Home</span>
                        </p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="{{ request()->segment(2) == 'blog' ? 'active' : '' }}">
                        <p>
                            <span class="icon">
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <span>Blog</span>
                        </p>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="page-content">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#menu-action').click(function() {
                $('#menu').toggleClass('active');
            });
            $('.notification i').click(function() {
                $('.notification i').not(this).removeClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
