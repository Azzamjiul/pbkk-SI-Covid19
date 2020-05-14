<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Final Project PBKK">
    <meta name="author" content="Fandy Kuncoro Adianto & Ahmad Syauqi">
    <title>{% block title %}{% endblock %} | SI-COVID19</title>
    <link rel="icon" type="image/png" href="{{ url('assets/img/logo.png') }}" />
    {# <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> #}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ url('assets/Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f2f2f2;
        }
        .navbar {
            padding-left: 15rem;
            padding-right: 15rem;
        }
        .nav-item {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
        .content {
            padding: 2rem 15rem;
        }

    </style>

    {% block styles %}{% endblock %}

</head>
<body>
    {% include 'partials/header.volt' %}
    <div class="content">
        {% block content %}{% endblock %}
    </div>

    <script src="{{ url('assets/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    {% block scripts %}{% endblock %}
</body>
</html>


