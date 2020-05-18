{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<title>Document</title>--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

{{--</head>--}}

{{--<body>--}}

{{--@component('layouts.nav')--}}

{{--@endcomponent--}}

@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div style="display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap">
        @foreach($products as $product)
            <div class="card" style="width: 18rem; border: none; margin: 20px">
                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
                <div class="card-body">
                    <div>{{ $product->name }}</div>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="padding: 0px 20px">
                    <span>{{ $product->price }} €</span>

                    <a href="{{ url('/product/'. $product->id)}}">
                        <button type="button" class="btn btn-dark">Show</button>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center align-items-center pt-2">{{ $products->links() }}</div>
</div>
@endsection

{{--</body>--}}

{{--</html>--}}