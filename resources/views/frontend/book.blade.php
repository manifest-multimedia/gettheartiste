<x-neptune-auth-layout>
    <x-slot name='title'> {{ __('Book Artiste') }} </x-slot>

    <x-slot name='image'>
        {{ $data->getFirstMediaUrl('artiste') ? $data->getFirstMedia('artiste')->getUrl('artiste') : asset('avatar.jpg') }}
    </x-slot>

    <h4 class="auth-description">{{ __('Book your Artiste here') }}</h4>


    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('book', $data->id) }}">
        @csrf
        <input type="hidden" id="currency" name="artiste_name" value="{{ $data->name }}">

        <div class="row">
            <div class="form-group">
                <label for="firstname" class="mb-2">{{ __('Artiste Name') }}</label>
                <input id="artiste_name" class="form-control" name="artiste_name" value="{{ $data->name }}"
                    :value="old('artiste_name')" placeholder="{{ __('Artiste Name') }}" required disabled />
            </div>
        </div>

        <div class="mt-4 row">
            <div class="form-group col-md-6">
                <label for="appt_date" class="mb-2">{{ __('Appointment Date') }}</label>
                <input type="date" id="appt_date" class="form-control" name="appt_date" :value="old('appt_date')"
                    placeholder="{{ __('Appointment Date') }}" required />
            </div>

            <div class="form-group col-md-6">
                <label for="lastname" class="mb-2">{{ __('Appointment Time') }}</label>
                <select name="appt_time" id="appt_time" class="form-control" required>
                    <option disabled value="">Select Time</option>
                    <option value="8:00">8:00</option>
                    <option value="9:00">9:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="8:00am">14:00</option>
                </select>
            </div>
        </div>

        <div class="mt-4 auth-submit">
            <button type="submit" class="btn btn-primary submit-btn">Book Appointment</button>
        </div>

    </form>


</x-neptune-auth-layout>
