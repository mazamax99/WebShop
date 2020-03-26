@extends('master')
@section('title', 'Товар')
@section('content')
        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Цена: <b>{{$product->price}}</b></p>
        <img src={{\Illuminate\Support\Facades\Storage::url($product->image)}}>
        <p>{{$product->description}}</p>

        <form action="{{route('basket-add',$product)}}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

            @csrf        </form>
@endsection
