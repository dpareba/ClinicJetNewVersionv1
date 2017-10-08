@component('mail::message')
# Welcome to ClinicJet DR. {{$user->name}}.

Welcome to the ClinicJet family. Kindly verify your email-id.

@component('mail::button', ['url' => url('register/confirm/'.$user->token),'color'=>'green'])
VERIFY EMAIL
@endcomponent

<br>
<b>Note:</b><i>This is a system generated email. Please do not reply.</i>
<br><br>
Warm Regards,<br>
Team {{ config('app.name') }}
@endcomponent
