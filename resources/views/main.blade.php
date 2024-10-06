@extends('layouts.base')

@section('webmaster')
<link rel="stylesheet" href="/css/miniplace.css">
@endsection

@section('page.title', '')

@section('description', '')

@section('keywords', '')

@section('content')


@if(session('maincity')!=null&&!isset($selectFlag))
<script>
    window.location.replace("{{ url('/' . session('maincity')) }}");
</script>
@endif
@php($class = 'class1')

@for($i=0; $i < count($country); $i++)
    <p class="area">{{$country[$i]['name']}}</p>

    <div class="cityBlock" id="{{$country[$i]['name']}}">
    @for($j=0; $j < count($country[$i]['cities']); $j++)

    @if($country[$i]['cities'][$j]['name']==session('maincityname'))
        @php($class = 'class2')
    @else
    @php($class = 'class1')
    @endif
        <a class="{{$class}}" href="{{'/'.$country[$i]['cities'][$j]['slug']}}" data-country="{{$country[$i]['name']}}">{{$country[$i]['cities'][$j]['name']}}</a>
        <span>{{"  -  "}}</span>
    @endfor
    </div>

@endfor


@endsection