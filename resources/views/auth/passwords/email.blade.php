@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-4">
                <div class="card bg-white">
                    <h5 class="card-header">
                        <span class="fas fa-fw fa-lock"></span>
                        {{ __("Reset Password") }}
                    </h5>

                    <div class="card-body">
                        @if (Session::has("status"))
                            <div class="alert alert-success"
                                 role="alert">
                                <span class="fas fa-fw fa-check-circle"></span>
                                {{ Session::get("status") }}
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ URL::route("password.email") }}">
                            @csrf

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

                            <div class="d-grid gap-2 mb-0">
                                <button class="btn btn-primary"
                                        type="submit">
                                    <span class="fas fa-fw fa-lock"></span>
                                    {{ __("Send Password Reset Link") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
