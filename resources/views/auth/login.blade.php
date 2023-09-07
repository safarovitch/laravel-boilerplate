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


          <form method="POST" action="{{ route('login') }}" class="js-validate needs-validation">

            <div class="text-center">
              <div class="mb-5">
                <h1 class="display-5">Sign in</h1>
              </div>
            </div>
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
              <x-label for="email" :value="__('Email')" class="form-label" />

              <input id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                type="email" name="email" value="{{old('email')}}" required autofocus />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
              <x-label for="password" :value="__('Password')" />

              <input id="password" class="form-control form-control-lg mb-2 @error('password') is-invalid @enderror"
                type="password" name="password" required autocomplete="current-password" />

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              @if (Route::has('password.request'))
              <a class="form-label-link mt-2" href="{{ route('password.request') }}">{{ __('Forgot your password?')
                }}</a>
              @endif
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-button class="btn btn-primary btn-lg w-100">
                {{ __('Log in') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
      <!-- End Card -->

    </div>
  </div>
  <!-- End Content -->
</x-guest-layout>