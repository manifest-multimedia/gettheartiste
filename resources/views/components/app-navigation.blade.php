   <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
   <!-- Side Nav START -->
   <div class="app-menu">
       <ul class="accordion-menu">
           @can('isSuperAdmin')
               <li class="sidebar-title">
                   SUPER ADMIN
               </li>
               <li>
                   <a href="{{ url('') }}"><i
                           class="material-icons-two-tone">supervised_user_circle</i>Administration</a>
               </li>
           @endcan
           @can('isAdmin')
               <li class="sidebar-title">
                   ADMIN NAVIGATION
               </li>
           @elsecan('isUser')
               <li class="sidebar-title">
                   USER NAVIGATION
               </li>
           @endcan
           @can('isUser')
               <li>
                   <a href="{{ URL::Route('home') }}"><i class="material-icons-two-tone">alarm_add</i>Book Appointment</a>
               </li>
           @endcan
           <li>
               <a href="{{ URL::Route('dashboard') }}"><i class="material-icons-two-tone">alarm_on</i>Appointments</a>
           </li>

           @can('isSuperAdmin')
               <li>
                   <a href="{{ route('artistes') }}"><i class="material-icons-two-tone">mic_external_on</i>Artistes</a>
               </li>
           @endcan


           {{--  <li>
               <a href="#finance"><i class="material-icons-two-tone"> payments</i>Finance<i
                       class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
               <ul class="sub-menu" style="">
                   <li>
                       <a href="{{ url('quotes') }}">Quotes</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Invoices</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Payroll Management</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Reports</a>
                   </li>


               </ul>
           </li>
           <li>
               <a href="#warehousing"><i class="material-icons-two-tone"> width_normal</i>Warehousing<i
                       class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
               <ul class="sub-menu" style="">
                   <li>
                       <a href="{{ route('warehouse') }}">Overview</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Products</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Stock Management</a>
                   </li>
                   <li>
                       <a href="{{ url('') }}">Reports</a>
                   </li>


               </ul>
           </li>
           <li>
               <a href="#crm"><i class="material-icons-two-tone">ads_click</i>CRM<i
                       class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
               <ul class="sub-menu" style="">
                   <li>
                       <a href="{{ url('contacts') }}">Contacts</a>
                   </li>
                   <li>
                       <a href="{{ url('sms') }}">SMS</a>
                   </li>
               </ul>
           </li>

           <li>
               <a href="#settings"><i class="material-icons-two-tone">settings</i>Settings<i
                       class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
               <ul class="sub-menu" style="">
                   <li>
                       <a href="{{ url('account-setup') }}">Account Setup</a>
                   </li>
                   <li>
                       <a href="{{ url('upgrade') }}">Upgrade</a>
                   </li>
                   <li>
                       <a href="{{ url('user/profile') }}">User Profile</a>
                   </li>
                   <li>
                       <a href="{{ url('business-profiles') }}">Business Profiles</a>
                   </li>

               </ul>
           </li> --}}


           <li class="sidebar-title">
               LOGOUT
           </li>
           <li>
               <a href="#logout" onclick="event.preventDefault();logout()"><i
                       class="material-icons-two-tone">power</i>Logout</a>
           </li>

       </ul>
   </div>
