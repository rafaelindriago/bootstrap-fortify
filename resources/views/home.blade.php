@extends("layouts.app")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card bg-white">
                    <h5 class="card-header">
                        <span class="fas fa-fw fa-tachometer-alt"></span>
                        {{ __("Dashboard") }}
                    </h5>

                    <div class="card-body">
                        @if (Session::has("status"))
                            <div class="alert alert-success"
                                 role="alert">
                                <span class="fas fa-fw fa-check-circle"></span>
                                {{ Session::get("status") }}
                            </div>
                        @endif

                        {{ __("You are logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
