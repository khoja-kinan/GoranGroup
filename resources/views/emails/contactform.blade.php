@component('mail::message')



#You have new message

<br>
<strong>Email From:</strong>
<br>
{{$data['email']}}
<br>
<strong>message:</strong>
<br>
{{$data['message']}}


@endcomponent
