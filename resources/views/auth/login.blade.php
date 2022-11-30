<x-neptune-auth-layout>
    <x-slot name='title'> {{ __('Login') }} </x-slot>

    <p class="auth-description">{{ __('Please sign-in to your account.') }}</p>


    <x-slot name='image'>
        {{ asset('/neptune/images/backgrounds/enjoy-music.webp') }}
    </x-slot>





    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="auth-credentials">
        <x-validation-errors class="mb-4" />
        <form method='post' action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="mb-2 font-weight-semibold" for="userName">{{ 'Email' }}:</label>
                <div class="input-affix">
                    <i class="prefix-icon anticon anticon-user"></i>
                    <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}"
                        name="email" required autofocus>
                </div>
            </div>
            <div class="mt-2 mb-2 form-group">
                <label class="font-weight-semibold" for="password">{{ __('Password') }}:</label>
                @if (Route::has('password.request'))
                    <a class="float-right pt-2 pb-2 font-size-13 text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

                <div class="mt-2 input-affix m-b-10">
                    <i class="prefix-icon anticon anticon-lock"></i>
                    <input type="password" class="form-control" id="password" placeholder="{{ __('Password') }}"
                        name="password" required autocomplete="current-password">
                </div>
            </div>
    </div>
    <div class="form-group">
        <div class="auth-submit">
            <div class="form-group">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <span class="mt-3 font-size-13 text-muted auth-forgot-password float-end">
                {{ __("Don't have an account?") }}
                <a class="small" href="/register">{{ __('Sign up') }}</a>
            </span>
            <button class="mt-2 btn btn-primary">{{ __('Sign In') }}</button>
        </div>
    </div>
    </form>
    </div>




</x-neptune-auth-layout>
