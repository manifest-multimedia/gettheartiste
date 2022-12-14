<x-neptune-auth-layout>
    <x-slot name='title'> {{__('Book Artiste')}} </x-slot>



    <p class="auth-description">{{__("Music is the heartbeat of men!")}}<br>{{__('Create your account to book your favorite artiste now')}}</p>


            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" id="paymentForm">
                @csrf

                <div class="row">
                    <div class="form-group  col-md-6">
                        <label for="firstname" class="mb-2">{{__('First Name')}}</label>
                        <input id="firstname" class="form-control" name="firstname" :value="old('firstname')" placeholder="{{__('First Name')}}" required autofocus />
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="lastname" class="mb-2">{{__('Last Name')}}</label>
                        <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" placeholder="{{__('Last Name')}}" required autocomplete="name" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-2 mb-2  col-md-6">
                        <label for="Email" class="mb-2 mt-2">{{__('Email address')}}</label>
                        <input type="email" id="email-address" class="form-control" required />
                    </div>
                    <div class="form-group mt-2 mb-2  col-md-6">
                        <label for="Email" class="mb-2 mt-2">{{__('Phone Number')}}</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required />
                    </div>
                </div>


                <div class="row">
                    <div class="form-gorup mt-2 mb-2 col-md-6">
                        <label for="password" class="mt-2 mb-2">{{__('Enter a secure password')}}</label>
                          <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="{{__('Password')}}" required autocomplete="new-password" />
                      </div>

                      <div class="form-group mt-2 mb-2 col-md-6">
                          <label for="password_confirmation" class="mt-2 mb-2">{{__('Confirm password')}}</label>
                          <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="{{__('Password Confirmation')}}" required autocomplete="new-password" />
                      </div>
                </div>



                <input type="hidden" id="currency" name="currency"
                    value="GHS">
                <input type="hidden" id="amount" name="amount"
                value="10" id="">
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
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
                    <button type="submit" class="btn btn-primary submit-btn" onclick="payWithPaystack(event)">Proceed to Book</button>
                </div>

            </form>


    </x-neptune-auth-layout>
