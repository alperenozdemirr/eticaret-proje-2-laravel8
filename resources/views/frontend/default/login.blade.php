@extends('frontend.layout')
@section('title','Giriş Yap')
@section('content')

    <div class="d-flex justify-content-center">

        <div class="col-md-4 mt-12 mb-12">
            <form action="{{route('user.authenticate')}}" method="POST">
                @CSRF
            <div class="col-md-12">
                <label>Email Adresi</label>
                <div class="form-group"><input class="form-control"  type="email" name="email" placeholder="Email Adresi"></div>
            </div>
            <div class="col-md-12">
                <label>Şifre</label>
                <div class="form-group"><input class="form-control"  type="password" name="password" placeholder="Şifre"></div>
            </div>
            <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember_me" class="custom-control-input" id="register-policy">
                        <label class="custom-control-label"  for="register-policy">Beni Hatırla</label>
                    </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-dark col-md-12">Giriş Yap</button>
                </div>
            </div>
            <div style="text-align: center" class="col-md-12">
                <a href="{{route('user.registerPage')}}">Hala Üye Değilmisin?</a>
            </div></form>
        </div>

    </div>
@endsection
@section('css') @endsection
@section('js')@endsection
