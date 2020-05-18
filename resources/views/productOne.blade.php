@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex" style="padding: 20px; margin-top: 50px">
            <div>
                <img style="width: 700px"  src="{{ $product->image }}" alt="Card image cap">
            </div>
            <div>
                <article style="font-size: 130%; font-weight: bold">{{ $product->name  }}</article>
                <p class="text-justify" style="font-weight: lighter; padding-top: 10px ">{{ $product->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <article>Price</article>
                    <article style="font-weight: bold">{{ $product->price }} €</article>
                </div>

                <form method="post" action="{{ route('basket.add') }}">
                    @csrf
                    <input type="hidden" name="shoes" value="{{ $product->id }}">
                    <div style="padding-top: 10px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Size</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="size">
                            <option value="" >Choose...</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                        </select>
                    </div>

                    <div style="padding-top: 10px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Color</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="color">
                            <option value="">Choose...</option>
                            <option value="red">Red</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                        </select>
                    </div>

                    <div style="padding-top: 30px" class="text-right">
                        <button type="submit" class="btn btn-dark">Add to cart</button>
                    </div>
                </form>


                @if ($errors->any())
                    <div class="alert alert-danger" style="margin-top: 20px">
                        <article>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </article>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success" style="margin-top: 20px">
                        <article>
                            <li>{{ session('success') }}</li>
                        </article>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" style="margin-top: 20px">
                        <article>
                            <li>{{ session('error') }}</li>
                        </article>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
