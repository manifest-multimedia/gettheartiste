<p>Hi <strong>Admin</strong>,</p>

<p>New Appointment is pending for approval</p>


<p>
    <strong>Appointment Status</strong>: {{ $data['status'] }} <br>
    <strong>Appointment Booked by</strong>: {{ $data['firstname'] }} {{ $data['lastname'] }} <br>
    <strong>Artiste Booked</strong>: {{ $data['artiste'] }} <br>
    <strong>Appointment Date</strong>: {{ $data['date'] }} <br>
    <strong>Appointment Time</strong>: {{ $data['time'] }} <br>
</p>

<p>Login to <a href="{{ route('dashboard') }}">here</a> to manage this booking request.</p>

<p>
    Best Regards.
    GetTheArtiste
</p>
