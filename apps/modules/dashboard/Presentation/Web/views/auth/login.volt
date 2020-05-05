{% extends 'auth/layout.volt' %}

{% block title %}Login{% endblock %}

{% block content %}
<form method="POST" action="{{ url('login/submit') }}" class="login100-form validate-form">
  {# CSRF Token #}
  <input type='hidden' name="{{ this.security.getTokenKey() }}" value="{{ this.security.getToken() }}" />
<span class="login100-form-title p-b-26">
    Selamat Datang
  </span>
  <span class="login100-form-title p-b-48">

  </span>
  <p>{{ this.flashSession.output() }}</p>
  <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
    <input class="input100" type="text" name="keyValue">
    <span class="focus-input100" data-placeholder="Email"></span>
  </div>

  <div class="wrap-input100 validate-input" data-validate="Enter password">
    <span class="btn-show-pass">
      <i class="zmdi zmdi-eye"></i>
    </span>
    <input class="input100" type="password" name="password">
    <span class="focus-input100" data-placeholder="Password"></span>
  </div>

  <div class="container-login100-form-btn">
    <div class="wrap-login100-form-btn">
      <div class="login100-form-bgbtn"></div>
      <button class="login100-form-btn">
        Login
      </button>
    </div>
  </div>

  <div class="text-center p-t-115">
    <span class="txt1">
      Belum mempunyai akun?
    </span>

    <a class="txt2" href="{{ url('register') }}">
      Daftar disini
    </a>
  </div>
</form>
{% endblock %}