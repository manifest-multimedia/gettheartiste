<x-neptune-auth-layout>
    <x-slot name='title'> {{ __('Book An Artiste') }} </x-slot>


    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">


        <h4 class="auth-description">{{ __('Create your account to book complete your booking') }}</h4>


        <x-validation-errors class="mb-4" />

        <div class="row">
            <div class="form-group  col-md-6">
                <label for="firstname" class="mb-2">{{ __('First Name') }}</label>
                <input id="firstname" class="form-control" name="firstname" :value="old('firstname')"
                    placeholder="{{ __('First Name') }}" required autofocus />
            </div>

            <div class="form-group  col-md-6">
                <label for="lastname" class="mb-2">{{ __('Last Name') }}</label>
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                    placeholder="{{ __('Last Name') }}" required autocomplete="name" />
            </div>
        </div>

        <div class="row">
            <div class="form-group mt-2 mb-2  col-md-6">
                <label for="Email" class="mb-2 mt-2">{{ __('Email address') }}</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group mt-2 mb-2  col-md-6">
                <label for="Email" class="mb-2 mt-2">{{ __('Phone Number') }}</label>
                <input type="tel" id="phone" name="phone" class="form-control" required />
            </div>
        </div>

        <div class="row">
            <div class="form-gorup mt-2 mb-2 col-md-6">
                <label for="password" class="mt-2 mb-2">{{ __('Enter a secure password') }}</label>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                    placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="form-group mt-2 mb-2 col-md-6">
                <label for="password_confirmation" class="mt-2 mb-2">{{ __('Confirm password') }}</label>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" required
                    autocomplete="new-password" />
            </div>
        </div>


        {{-- required --}}
        <input type="hidden" name="orderID" value="345">
        <input type="hidden" name="amount" value="10"> {{-- required in kobo --}}
        <input type="hidden" name="quantity" value="100">
        <input type="hidden" name="currency" value="GHS">
        <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value']) }}">
        {{-- For other necessary things you want to add to your payload. it is optional though --}}
        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

        <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="auth-forgot-password float-end form-group mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>


        </div>

        <div class="auth-submit mt-4">
            <button type="submit" class="btn btn-primary submit-btn">Proceed to SignUp</button>
        </div>

    </form>


</x-neptune-auth-layout>
