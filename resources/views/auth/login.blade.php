@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-4">
                <div class="card bg-white">
                    <h5 class="card-header">
                        <span class="fas fa-fw fa-sign-in"></span>
                        {{ __("Login") }}
                    </h5>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ URL::route("login") }}">
                            @csrf

                            @if (Session::has("status"))
                                <div class="alert alert-success"
                                     role="alert">
                                    <span class="fas fa-fw fa-check-circle"></span>
                                    {{ Session::get("status") }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label"
                                       for="email">{{ __("Email Address") }}</label>

                                <input id="email"
                                       name="email"
                                       type="email"
                                       value="{{ Request::old("email") }}"
                                       @class(["form-control", "is-invalid" => $errors->has("email")])
                                       autocomplete="email"
                                       autofocus>

                                @error("email")
                                    <div class="invalid-feedback"
                                         role="alert">
                                        <span class="fas fa-fw fa-exclamation-circle"></span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                       for="password">{{ __("Password") }}</label>

                                <input id="password"
                                       name="password"
                                       type="password"
                                       @class(["form-control", "is-invalid" => $errors->has("password")])
                                       autocomplete="current-password">

                                @error("password")
                                    <div class="invalid-feedback"
                                         role="alert">
                                        <span class="fas fa-fw fa-exclamation-circle"></span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           id="remember"
                                           name="remember"
                                           type="checkbox"
                                           @checked(Request::old("remember"))>

                                    <label class="form-check-label"
                                           for="remember">
                                        {{ __("Remember Me") }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-0">
                                <button class="btn btn-primary"
                                        type="submit">
                                    <span class="fas fa-fw fa-sign-in"></span>
                                    {{ __("Login") }}
                                </button>
                            </div>

                            @if (Route::has("password.request"))
                                <div class="mt-3 text-center">
                                    <a class="btn btn-link"
                                       href="{{ URL::route("password.request") }}">
                                        {{ __("Forgot Your Password?") }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
