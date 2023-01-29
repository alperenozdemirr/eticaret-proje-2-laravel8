@extends('frontend.layout')
@section('title','Kayıt Ol')
@section('content')<form method="POST" action="{{route('cacheRegister')}}">
    @CSRF
    <div class="d-flex justify-content-center">

        <div class="col-md-4 mt-12 mb-12">
            <div class="col-md-12">
                <label>Adınız Soyadınız</label>
                <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Adınız Soyadınız"></div>
            </div>
            <div class="col-md-12">
                <label>Email Adresi</label>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email Adresi"></div>
            </div>
            <div class="col-md-12">
                <label>Şifre</label><span style="color: #fcb941" class="float-right">8/<span id="passwordLength"></span></span>
                <div class="form-group"><input id="password"  class="form-control" type="password" name="password" placeholder="Şifre"></div>
            </div>
            <div class="col-md-12">
                <label>Tekrar Şifre</label> <span style="color: #fcb941" class="float-right">8/<span id="tryPasswordLength"></span></span>
                <div class="form-group"><input id="tryPassword" class="form-control" type="password" name="confirmPassword" placeholder="Tekrar Şifre"></div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-dark col-md-12">Kayıt Ol</button>
                </div>
            </div>
            <div style="text-align: center" class="col-md-12">
                <a href="{{route('user.loginPage')}}">Giriş Yap</a>
            </div>
        </div>

    </div></form>
        <script>
                var password=document.getElementById("password");
                var tryPassword=document.getElementById("tryPassword");
                var passLength=document.getElementById("passwordLength");
                var tryPassLength=document.getElementById("tryPasswordLength");
                passLength.innerHTML="0";
                tryPassLength.innerHTML="0";
                password.addEventListener('keyup', (event) => {
                    passLength.innerHTML=""+password.value.length;
                })
                tryPassword.addEventListener('keyup', (event) => {
                    tryPassLength.innerHTML=""+tryPassword.value.length;
                    if(tryPassword.value==password.value && tryPassword.value>=8){
                        tryPassword.style.borderColor="#43aa69";
                        password.style.borderColor="#43aa69";
                    }else {
                        tryPassword.style.borderColor="red";
                        password.style.borderColor="red";
                    }
                })
        </script>
@endsection
@section('css') @endsection
@section('js')@endsection
