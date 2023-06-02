<div>
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Registration Form
                    </div>
                    <div class="card-description">
                        For Our valued customer, Please fill up the form below to register.
                    </div>
                    <div class="d-flex flex-column">
                        <div class="mb-3">
                            <label>Fullname</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model='name'>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                wire:model='email'>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" class="form-control @error('phoneNo') is-invalid @enderror"
                                wire:model='phoneNo'>
                            @error('phoneNo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" wire:model='password'>
                            <input type="checkbox" onclick="showPassword()"> Show Password
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" wire:model='address'></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary w-100" wire:click='register'>Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function showPassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    @endpush
</div>
