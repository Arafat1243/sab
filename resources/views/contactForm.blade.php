@component('mail::message')
# Contact from {{config('app.name')}}
Contact Name: {{$details['name']}}<br>
Contact E-mail: {{$details['email']}}<br>
Contact Number: {{$details['number']}}<br>
Contact Message:
@component('mail::panel')
{{$details['message']}}
@endcomponent
@endcomponent
