<!DOCTYPE html>

<html lang="{{ Str::of(app()->getLocale())->replace("_", "-") }}">

    <head>
        <meta charset="utf-8">

        <meta name="viewport"
              content="width=device-width, initial-scale=1">

        <meta name="csrf-token"
              content="{{ Session::token() }}">

        <title>{{ Config::get("app.name", "Laravel") }}</title>

        @livewireStyles

        @vite(["resources/sass/app.scss", "resources/js/app.js"])
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand"
                       href="{{ URL::route("home") }}">
                        {{ Config::get("app.name", "Laravel") }}
                    </a>
                    <button class="navbar-toggler"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbar-supported-content"
                            type="button"
                            aria-controls="navbar-supported-content"
                            aria-expanded="false"
                            aria-label="{{ __("Toggle navigation") }}">
                        <span class="fas fa-fw fa-bars"></span>
                    </button>

                    <div class="collapse navbar-collapse"
                         id="navbar-supported-content">
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has("login"))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ URL::route("login") }}">
                                            <span class="fas fa-fw fa-sign-in"></span>
                                            {{ __("Login") }}
                                        </a>
                                    </li>
                                @endif

                                @if (Route::has("register"))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ URL::route("register") }}">
                                            <span class="fas fa-fw fa-user-plus"></span>
                                            {{ __("Register") }}
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       id="navbar-dropdown"
                                       data-bs-toggle="dropdown"
                                       href="#"
                                       role="button"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        <span class="fas fa-fw fa-user"></span>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="navbar-dropdown">
                                        <li>
                                            <form class="px-2"
                                                  action="{{ URL::route("logout") }}"
                                                  method="POST">
                                                @csrf

                                                <div class="d-grid gap-2 mb-0">
                                                    <button class="btn btn-danger"
                                                            type="submit">
                                                        <span class="fas fa-fw fa-sign-out"></span>
                                                        {{ __("Logout") }}
                                                    </button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield("content")

                @livewireScriptConfig
            </main>
        </div>
    </body>

</html>
