@extends('layouts.app')
@section('content')

    <section>
        <div class="container mainCart">
            <div style="width: 60%">
                @if(count($products->cart) > 0)

                @foreach($products->cart as $key => $product)
                    <div class="cardCart" >
                        <img  class="imageCart" src="{{ $product->shoes->image }}"/>
                        <div>
                            <article class="cartName">{{ $product->shoes->name }}</article>
                            <article class="d-flex align-items-center pt-1">
                              <span class="font-weight-lighter" style="color: lightgray">PRICE :</span>
                                <span class="ml-2 font-weight-bold">{{ $product->shoes->price }} €</span>
                            </article>
                            <article class="d-flex align-items-center pt-1">
                                <span class="font-weight-lighter" style="color: lightgray;">COLOR :</span>
                                <span  class="ml-2 font-weight-bold text-capitalize">{{ $product->color }}</span>
                            </article>

                            <article class="d-flex align-items-center pt-1">
                                <span class="font-weight-lighter" style="color: lightgray;">SIZE :</span>
                                <span  class="ml-2 font-weight-bold text-capitalize">{{ $product->size }}</span>
                            </article>

                            <div class="d-flex align-items-center pt-2">
                                <span  class="buttonQt">
                                     <form  method="post" action="{{ route('basket.less') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id" value="{{ $key }}">
                                        <button style="border: none; background: transparent" type="submit">-</button>
                                    </form>
                                </span>
                                <article class="qtUp"><b>{{ $product->quantity }}</b></article>
                                  <span  class="buttonQt">
                                    <form  method="post" action="{{ route('basket.more') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id" value="{{ $key }}">
                                        <button style="border: none; background: transparent" type="submit">+</button>
                                    </form>
                                </span>

                            </div>
                        </div>
                        <div class="forTrash">
                            <form  method="post" action="{{ route('basket.remove') }}">
                              @csrf
                                <input type="hidden" name="id" value="{{ $key }}">
                                <button type="submit" style="background: transparent; border: none; outline: none">
                                    <img style="width: 20px;" src="https://img.icons8.com/color/80/000000/delete-forever.png"/>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                    @else
                        <p>
                            Aucun produit dans votre panier
                        </p>
                @endif

                {{--<article v-else style="font-size: 150%">--}}
                    {{--No product in your cart--}}
                {{--</article>--}}
            </div>
            <div class="summaryCart">
                <div class="insideSummary">
                    <article style="font-size: 150%; padding-bottom: 10px">
                        Summary
                    </article>
                    <div class="d-flex justify-content-between align-items-center priceLine">
                        <article>Quantity Products : </article>
                        <article style="font-size: 120%; font-weight: bold"> {{ $products->getTotalQt() ?? 0 }} </article>
                    </div>
                    <div class="d-flex justify-content-between align-items-center priceLine">
                        <article>Subtotal: </article>
                        <article style="font-size: 120%; font-weight: bold"> {{ $products->getTotalPrice() ?? 0 }} € </article>
                    </div>
                    <div class="d-flex justify-content-between align-items-center priceLine">
                        <article>Shipping : </article>
                        <article style="font-size: 120%; font-weight: bold"> 0 € </article>
                    </div>
                    <div class="d-flex justify-content-between align-items-center priceLine">
                        <article>Total : </article>
                        <article style="font-size: 120%; font-weight: bold"> {{ $products->getTotalPrice() ?? 0 }} € </article>
                    </div>
                    @if(count($products->cart) > 0)
                    <a style="color: white" href="{{ route('payment') }}">
                        <button style="width: 100%; margin-top: 20px" class="btn btn-dark">
                             Go  payment
                        </button>
                    </a>
                        @else
                        <button disabled style="width: 100%; margin-top: 20px" class="btn btn-dark">
                            Go  payment
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection