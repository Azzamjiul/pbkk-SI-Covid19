{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<h1> Selamat Datang! </h1>
username: {{ auth['username'] }}<br>
email: {{ auth['email'] }}

<form method="POST" action="{{ url('logout/submit') }}">
    {# CSRF Token #}
    <input type='hidden' name="{{ this.security.getTokenKey() }}" value="{{ this.security.getToken() }}" />
    <button type="submit" class="btn btn-lg btn-warning">Logout</button>
</form>
{% endblock %}

{% block scripts %}

{% endblock %}