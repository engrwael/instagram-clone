@component('mail::message')
Congrats...

@component('mail::panel')
Your Profile is Generated Successfully, Enjoy...
@endcomponent

@component('mail::button', ['url' => $url, 'color'=>'success'])
View Profile
@endcomponent

Thanks,<br>
FreeCodeGram
@endcomponent
