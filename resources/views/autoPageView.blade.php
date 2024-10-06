@extends('layouts.base')

@section('webmaster')

@endsection

@section('page.title', '')

@section('description', '')

@section('keywords', '')

@section('content')

@php
    session(['maincity' => $city]);
@endphp

<p class="content">
@if(isset($main))
{{$main}}
@elseif(isset($about))
{{$about}}
@elseif(isset($news))
{{$news}}
@endif

</p>

@endsection