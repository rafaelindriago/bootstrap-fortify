@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-4">
                <div class="card bg-white">
                    <h5 class="card-header">
                        <span class="fas fa-fw fa-key"></span>
                        {{ __("Confirm Password") }}
                    </h5>

                    <div class="card-body">
                        <div class="alert alert-info"
                             role="alert">
                            <span class="fas fa-fw fa-info-circle"></span>
                            {{ __("Please confirm your password before continuing.") }}
                        </div>

                        <form method="POST"
                              action="{{ URL::route("password.confirm") }}">
                            @csrf

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

                            <div class="d-grid gap-2 mb-0">
                                <button class="btn btn-primary"
                                        type="submit">
                                    <span class="fas fa-fw fa-key"></span>
                                    {{ __("Confirm Password") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
