<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ trans('messages.title') }}</title>
        <!-- CSS And JavaScript -->
        {{ Html::style(mix('css/app.css')) }}
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="">{{ trans('user.hello') }}, {{ Auth::user()->fullname }}</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        <li><a href="{{ action('Auth\AuthController@logout') }}">{{ trans('user.logout') }}</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        @yield('content')
    </body>
</html>
