@component('mail::message')
# {{$news->title}}

Eshte shtuar nje post i ri.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/news/'.$news->slug])
Kliko per te pare lajmin
@endcomponent

<small>Ky eshte nje mesazh automatik ju lutem mos ktheni pergjigjje,</small><br>
EcoHigjiena
@endcomponent
