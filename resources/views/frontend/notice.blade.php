<x-frontend-layout>


    <div class="card notice">
      <div class="card-body">
        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
          @csrf

          <x-validation-errors class="mb-4" />

          <input type="hidden" name="firstname" value="{{$input->firstname}}" required />
          <input type="hidden" name="lastname" value="{{$input->lastname}}" required />
          <input type="hidden" name="email" value="{{$input->email}}" required />
          <input type="hidden" name="phone" value="{{$input->phone}}" required />
          <input type="hidden" name="phonenumber" value="{{$input->phone}}" required />
          <input type="hidden" name="country" value="{{$input->phone}}" required />
          <input type="hidden" name="city" value="{{$input->phone}}" required />
          <input type="hidden" name="password" value="{{$input->password}}" required />
          <input type="hidden" name="terms" value="{{$input->terms}}" required />


          <h2 style="color: #4c4b50" class="text-center card-title"><u>PAYMENT NOTICE</u></h2>
          <br>
          <h6 class="mb-2 card-subtitle text-muted">Hi {{$input->firstname}}!</h6>
          <p class="text-center1 card-text">To finalize your <strong>Sign Up</strong>, a token of <strong>GHC 10</strong> has to be made. This is an assurance fee to secure consultation with our agents and proceed to book your preferred artistes.
            Kindly click on <i>"Proceed"</i> to make payment and complete the <i>Sign Up</i> process</p>
            <br>
          <div class="action-btn">
            <a href="https://gettheartiste.com" class="card-link text-red">Cancel</a>
          <button type="submit" class="btn btn-primary btn-green submit-btn">Proceed</button>
          </div>
      </form>

      </div>
    </div>

  </x-frontend-layout>
