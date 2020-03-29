@extends('master')
@section('title', 'Оформить заказ')

@section('content')
    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость: <b>{{$order->getFullPrice()}} ₽.</b></p>
            <form action="{{route('orderConfirm')}}" method="POST">
                <div>
                    <p>Укажите свои имя, номер телефона, город; марку,модель и год выпуска вашего авто, чтобы наш менеджер мог с вами связаться:</p>

                    <div class="container">
                        <div class="form-group">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @error('town')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Город: </label>
                            <div class="col-lg-4">
                                <input type="text" name="town" id="town" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @error('car_manufacturer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Марка автомобиля: </label>
                            <div class="col-lg-4">
                                <input type="text" name="car_manufacturer" id="car_manufacturer" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @error('car_model')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Модель авто: </label>
                            <div class="col-lg-4">
                                <input type="text" name="car_model" id="car_model" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @error('year_manufacture')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Год выпуска автомобиля: </label>
                            <div class="col-lg-4">
                                <input type="text" name="year_manufacture" id="year_manufacture" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                </div>
            </form>
        </div>
    </div>
@endsection
