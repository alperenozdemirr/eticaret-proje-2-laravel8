<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>

</head>
<body>
<div class="contanier">
    <div class="loginPanel">
        <div class="h2">
            <h2>Admin Login</h2>
        </div>
        @if(Session::has('error'))
            <p style="color:darkred;text-align: center">
                Hata:{{session('error')}}
            </p>
        @endif
        @if(Session::has('logout'))
            <p style="color:green;text-align: center">
                {{session('logout')}}
            </p>
        @endif
        <form method="POST" action="{{route('bekci.authenticate')}}">
            @CSRF
            <span>
				<p>E-posta</p><input type="email" value="{{old('email')}}" name="email">
			</span>
            <span>
			<p>Şifre</p><input type="password" name="password">
		</span>
            <div class="rememberme">
                <input  type="checkbox" name="remember_me" value="1">Beni Hatırla
            </div>
            <button type="submit" class="btnLogin">Giriş Yap</button>

            <span style="text-align: center;">
		<a href="{{route('index')}}">Websiteye Git</a>
	</span>

        </form>


    </div>
</div>
</body>
</html>
