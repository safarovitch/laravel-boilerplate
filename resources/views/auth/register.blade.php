<x-guest-layout>

    <div class="position-fixed top-0 end-0 start-0 bg-img-start"
        style="height: 32rem; background-image: url('svg/components/card-6.svg')">
        <!-- Shape -->
        <div class="shape shape-bottom zi-1">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
            </svg>
        </div>
        <!-- End Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <a class="d-flex justify-content-center mb-5" href="/">
            <img class="zi-2" src="{{ setting('logo_light') }}" alt="{{setting('app_name')}}" style="width: 8rem;">
        </a>

        <div class="mx-auto" style="max-width: 30rem;">
            <!-- Card -->
            <div class="card card-lg mb-5">
                <div class="card-body">
                    <!-- Form -->


                    <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation">

                        <div class="text-center">
                            <div class="mb-5">
                                <h1 class="display-5">Register</h1>
                            </div>
                        </div>
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <input id="name" class="form-control block mt-1 w-full @error('name') is-invalid @enderror"
                                type="text" name="name" :value="old('name')" required autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <input id="email"
                                class="form-control block mt-1 w-full @error('email') is-invalid @enderror" type="email"
                                name="email" :value="old('email')" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <input id="password"
                                class="form-control block mt-1 w-full @error('password') is-invalid @enderror"
                                type="password" name="password" required autocomplete="new-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <input id="password_confirmation"
                                class="form-control block mt-1 w-full @error('password_confirmation') is-invalid @enderror"
                                type="password" name="password_confirmation" required />

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="btn btn-primary btn-lg w-100">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
    <!-- End Content -->
</x-guest-layout>