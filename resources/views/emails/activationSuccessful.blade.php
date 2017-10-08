@component('mail::message')
# Account Activated

Thank you for joining ClinicJet. <br>
Your account is now activated. Please Login by clicking the button below.

@component('mail::button', ['url' => url('login'),'color'=>'green'])
Login Now
@endcomponent

Warm Regards,<br>
Team {{ config('app.name') }}
@endcomponent
