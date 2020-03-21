@extends('master')
@section('title', 'Главная')
@section('content')
        <h1>Все товары</h1>
        <div class="row">
            @foreach($product as $product)
            @include('card', compact('product'))
                @endforeach
        </div>
@endsection
