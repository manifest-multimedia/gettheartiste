<x-neptune-auth-layout>
    <x-slot name='title'> {{ __('Book An Artiste') }} </x-slot>

    <x-slot name='image'>
        {{ asset('/neptune/images/backgrounds/enjoy-music.webp') }}
    </x-slot>

    <form method="POST" action="{{ route('confirm') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        @csrf

        <h4 class="auth-description">{{ __('Create an account to book an Artiste') }}</h4>


        <x-validation-errors class="mb-4" />

        <div class="row">
            <div class="form-group col-md-6">
                <label for="firstname" class="mb-2">{{ __('First Name') }}</label>
                <input id="firstname" class="form-control" name="firstname" :value="old('firstname')"
                    placeholder="{{ __('First Name') }}" required autofocus />
            </div>

            <div class="form-group col-md-6">
                <label for="lastname" class="mb-2">{{ __('Last Name') }}</label>
                <x-jet-input id="lastname" class="block w-full mt-1" type="text" name="lastname" :value="old('lastname')"
                    placeholder="{{ __('Last Name') }}" required />
            </div>
        </div>

        <div class="row">
            <div class="mt-2 mb-2 form-group col-md-6">
                <label for="Email" class="mt-2 mb-2">{{ __('Email address') }}</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mt-2 mb-2 form-group col-md-6">
                <label for="phone" class="mt-2 mb-2">{{ __('Phone Number') }}</label>
                <input style="width: 100%" type="tel" id="phone" name="phone" class="form-control" required>

                <input type="hidden" name="phonenumber" id="result">
                <span style="color: red" id="error-msg" class="hide"></span>
            </div>
        </div>

        <div class="row">
            <div class="mt-2 mb-2 form-group col-md-6">
                <label for="country" class="mt-2 mb-2">{{ __('Country') }}</label>
                <input type="text" name="country" class="form-control">
            </div>

            <div class="mt-2 mb-2 form-group col-md-6">
                <label for="city" class="mt-2 mb-2">{{ __('City') }}</label>
                <input type="text" id="city" name="city" class="form-control" required />
            </div>
        </div>

        <div class="row">
            <div class="mt-2 mb-2 form-gorup col-md-6">
                <label for="password" class="mt-2 mb-2">{{ __('Enter a secure password') }}</label>
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password"
                    placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="mt-2 mb-2 form-group col-md-6">
                <label for="password_confirmation" class="mt-2 mb-2">{{ __('Confirm password') }}</label>
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" required
                    autocomplete="new-password" />
            </div>
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <span style="margin-left: 10px" class="ml-2">
                            {!! __('I agree to the :terms_of_service', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="text-sm text-gray-600 underline hover:text-gray-900">' .
                                    __('Terms of Service') .
                                    '</a>',
                            ]) !!}
                        </span>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="mt-4 auth-forgot-password float-end form-group">
            <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>


        </div>

        <div class="mt-4 auth-submit">
            <button type="submit" class="btn btn-primary submit-btn show_confirm">Proceed to SignUp</button>
        </div>

    </form>

</x-neptune-auth-layout>
