@component('mail::message')

@if($type == 'patient')
<h2>Hello, {{ $appointment->patient->fullName() }}</h2>
<p>This is the details of your new Appointment with <strong>{{ $appointment->doctor->fullName() }}</strong></p>
@elseif($type == 'doctor')
<h2>Hello, {{ $appointment->doctor->fullName() }}</h2>
<p>This is the details of your new Appointment with <strong>{{ $appointment->patient->fullName() }}</strong></p>
@endif

<p><strong>Appointment Date: </strong> {{ $appointment->reservation_date }}</p>

@component('mail::button', ['url' => $acceptUrl])
Accept
@endcomponent

@component('mail::button', ['url' => $declineUrl])
Decline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
