@component('mail::message')
# {{$auctions->title}}

Eshte ankand i ri sapo u hap.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/auctions/'.$auctions->slug])
Kliko per te pare lajmin
@endcomponent

<small>Ky eshte nje mesazh automatik ju lutem mos ktheni pergjigjje,</small><br>
EcoHigjiena
@endcomponent