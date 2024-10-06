@props(['cityname'=>'Ничего не найдено'])

@if(isset($city))

<section class="headerBlock">
<a class="link1" href="{{'/select'}}">{{$cityname}}</a>
<a class="link2" href="{{'/'.$city}}">Главная</a>
<a class="link2" href="{{'/'.$city.'/'.'about'}}">О нас</a>
<a class="link2" href="{{'/'.$city.'/'.'news'}}">Новости</a>
</section>
@endif

</section>