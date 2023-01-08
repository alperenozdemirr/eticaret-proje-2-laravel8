<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çift Kimlik Doğrulama</title>
    <style>
        html,body{
            margin: 0 auto;
            padding: 0;
            font-family: 'Ubuntu', sans-serif;
        }
        .contanier{
            width:100%;
            height:100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .loginPanel{
            width:400px;
            padding-top: 25px;
            padding-bottom: 25px;
        }
        .h2{
            text-align: center;
        }
        .loginPanel h2{
            display: inline-block;
            color: black;
            font-size:22px;
            text-align: center;

        }
        .loginPanel span{
            display: flex;
            flex-direction: column;

        }
        .loginPanel span p{
            display: inline-block;
            color: black;
            font-size:15px;
            margin-left: 2.5%;

        }
        .loginPanel form span input{
            width:95%;
            margin-left:2.5%;
            padding-left:7px;
            font-size:25px;
            border:1px solid #cacaca;
            border-radius:4px;
            float: left;
            height:45px;
            text-align: center;
            letter-spacing: 4px;
        }
        .btnLogin{
            width:95%;
            padding-bottom:15px;
            padding-top:15px;
            border: none;
            border-radius:10px;
            color: white;
            font-size:15px;
            margin-top:20px;
            margin-left:2.5%;
            text-align: center;
            cursor: pointer;
            transition: 0.8s;
            background-color:black;
        }
        .btnLogin:hover{
            opacity: 0.7;
        }
        /* renk kodu - rgb(252, 213, 53) - sarı */
        .loginPanel a{
            color:black ;
            text-decoration: none;
            font-size:15px;
            float: left;
            margin-left:2.5%;
            padding-top:10px;
        }
        .rememberme{
            display: flex;
            justify-content:flex-start;
            align-items: center;
            color:black;
            margin-top:10px;
            margin-left: 10px;
        }

    </style>
</head>
<body>
<div class="contanier">
    <div class="loginPanel">
        <div class="h2">
            <h2>Çift Kimlik Doğrulama</h2>
        </div>
        @if(Session::has('codeSuccess'))
            <p style="color:green;text-align: center">
                {{session('codeSuccess')}}
            </p>
        @endif
        <p style="color:black;text-align: center">
            Birkez deneme hakkınız vardır<br>
            Yanlış girilirse tekrardan bilgileri doldurmanız gerekecektir
        </p>
        <form method="POST" action="{{route('confirmation')}}">
            @CSRF
            <span>
				<p></p><input type="number"  name="code">
			</span>
            <a style="color:white" href="{{route('getCode')}}" class="btnLogin">Kod Al</a>
            <button type="submit" class="btnLogin">Kodu Doğrula</button>

            <span style="text-align: center;">
	</span>

        </form>


    </div>
</div>
</body>
</html>

