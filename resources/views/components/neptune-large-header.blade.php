    <div class="media-body mt-3 mb-4">
        <h4 class="m-b-0">Welcome back {{getFirstName(Auth::user()->firstname)}}!</h4>

    </div>
        {{-- @if(Auth::user()->account_status==0)
            <div class="alert alert-warning"> Hello {{getFirstName(Auth::user()->name)}}, your account setup is incomplete. <a href="/account-setup">Click Here</a> to setup your business profile!</div>
        @endif --}}
