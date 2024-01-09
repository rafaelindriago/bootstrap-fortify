@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-4">
                <div class="card bg-white">
                    <h5 class="card-header">
                        <span class="fas fa-fw fa-user-plus"></span>
                        {{ __("Register") }}
                    </h5>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ URL::route("register") }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label"
                                       for="name">{{ __("Name") }}</label>

                                <input id="name"
                                       name="name"
                                       type="text"
                                       value="{{ Request::old("name") }}"
                                       @class(["form-control", "is-invalid" => $errors->has("name")])
                                       autocomplete="name"
                                       autofocus>

                                @error("name")
                                    <div class="invalid-feedback"
                                         role="alert">
                                        <span class="fas fa-fw fa-exclamation-circle"></span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                       for="email">{{ __("Email Address") }}</label>

                                <input id="email"
                                       name="email"
                                       type="email"
                                       value="{{ Request::old("email") }}"
                                       @class(["form-control", "is-invalid" => $errors->has("email")])
                                       autocomplete="email">

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
                                       autocomplete="new-password">

                                @error("password")
                                    <div class="invalid-feedback"
                                         role="alert">
                                        <span class="fas fa-fw fa-exclamation-circle"></span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                       for="password-confirm">{{ __("Confirm Password") }}</label>

                                <input class="form-control"
                                       id="password-confirm"
                                       name="password_confirmation"
                                       type="password"
                                       autocomplete="new-password">
                            </div>

                            <div class="d-grid gap-2 mb-0">
                                <button class="btn btn-primary"
                                        type="submit">
                                    <span class="fas fa-fw fa-user-plus"></span>
                                    {{ __("Register") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
