@component('mail::message')
# Welcome to ClinicJet <i>Dr. {{$user->name}}</i>
# Thank you for verifying your email. 

Your account will be activated shortly. <br>
Kindly Login to start using clinicJet.

@component('mail::button', ['url' => url('/login'),'color'=>'green'])
Login Now
@endcomponent

Warm Regards,<br>
Team {{ config('app.name') }}
@endcomponent