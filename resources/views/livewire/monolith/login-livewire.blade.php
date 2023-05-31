<div>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="d-flex flex-row justify-content-center">
                                <div class="brand-logo">
                                    <img src="{{ asset('images/eben-ezar-logo.jpg') }}" alt="logo">
                                </div>
                            </div>
                            <h4>Eben Ezar Login Portal</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <div class="pt-3">
                                @if($auth)
                                    <div class="text-danger mt-2" role="alert">
                                        <strong>{{ $auth }}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        wire:model="email" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required wire:model='password'>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">

                                    <div class="form-check ml-4">
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                wire:model='remember'>
                                            {{ __('Keep me signed in') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <button type="button" wire:click='login'
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                {{--                                <div class="mb-2"> --}}
                                {{--                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn"> --}}
                                {{--                                        <i class="ti-facebook mr-2"></i>Connect using facebook --}}
                                {{--                                    </button> --}}
                                {{--                                </div> --}}
                                {{-- <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</div>
