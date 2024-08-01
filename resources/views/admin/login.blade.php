<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</li>
            </ul>
        </div>
    @endif
    <main>
        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <h1><i class="fa-solid fa-lock"></i> Login</h1>
            <div class="inputs">
                <div class="input">
                    <input type="text" name="login" placeholder="login">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="senha">
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>
            <button type="submit">Logar</button>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.alert').ready(function() {
                setTimeout(() => {
                    $('.alert').addClass('hide');
                }, 4000);
                setTimeout(() => {
                    $('.alert').remove();
                }, 8000);
            });
        });
    </script>
</body>
</html>
