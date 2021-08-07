<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- ENLACE AL CSS DE BOOTSTRAP -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{ __('messages.go_home_label') }}</a>
                    @else
                        <a href="{{ route('changeLocale', 'it' ) }}">{{ app()->getLocale() }}</a>
                        <a href="{{ route('login') }}">{{ __('messages.login_label') }}</a>
                        <a href="{{ route('login_app') }}">{{ __('messages.login_app_label') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('messages.register_label') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>
                <h2>{{ __( 'messages.welcome' ) }}</h2>
                <h4>{{ __( 'messages.welcome_app' ) }}</h4>

                <form class="" action="{{route('changeLocale')}}" method="post">
                    @crsf
                    <label>{{ _('messages.locale_label') }}</label>
                    <select class="form-control" name="locale" onchange="this.form.submit()">
                        <option value="en" >{{ __('messages.english_language_label') }}</option>
                        <option value="es" >{{__('messages.spanish_language_label')}}</option>
                        <option value="fr" >{{__('messages.frech_language_label')}}</option>
                        <option value="it" >{{__('messages.italian_language_label')}}</option>
                        <option value="pt" >{{__('messages.portugues_language_label')}}</option>
                        <option value="jp" >{{__('messages.japanese_language_label')}}</option>
                    </select>
                </form>
            </div>
        </div>
    </body>
</html>
