@component('mail::message')
# ClinicJet Doctor Signup

A Doctor with the following credentials signed up,

<b>Date/Time of account creation(yyyy-mm-dd):</b> {{$user->created_at}} <br>
<b>Doctor Name:</b> DR. {{$user->name}} <br>
<b>Doctor email id:</b> {{$user->email}} <br>
<b>Doctor Phone Number:</b> {{$user->phone}} <br>
<b>Doctor Speciality:</b> {{$user->doctorinfos->first()->speciality->speciality}} <br>
<b>Medical Council:</b> {{$user->doctorinfos->first()->medicalcouncil->name}} <br>
<b>Registration Number:</b> {{$user->doctorinfos->first()->registrationnumber}} <br>
<b>Registration Year:</b> {{$user->doctorinfos->first()->registrationyear->year}}

<div>If the above information is correct and authentic, please activate the user.</div><br>
<small><i style="color:red;">Please verify the information before activating the user.</i></small>

@component('mail::button', ['url' => url('useractivation/'.$user->isactivatedtoken),'color'=>'green'])
Activate User
@endcomponent
<br>
<b>Note:</b><i>This is a system generated email. Please do not reply.</i><br><br>

Warm Regards,<br>
Team {{ config('app.name') }}
@endcomponent
