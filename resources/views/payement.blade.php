@extends('layouts.app')
@section('content')

    {{--<div class="container">--}}
    {{--@auth--}}
    {{--<div>--}}
    {{--<article>--}}
    {{--{{ Auth::user()->name }}--}}
    {{--{{ Auth::user()->email }}--}}
    {{--</article>--}}
    {{--</div>--}}
    {{--@else--}}
    {{--<articla>--}}
    {{--<a href="{{ route('login') }}">Please login</a>--}}
    {{--</articla>--}}
    {{--@endauth--}}
    {{--</div>--}}


    <section class="container">
        <div class="card">

            <div class="card-body">

                <div class="cardCart justify-content-space-between" style="box-shadow: none; border-bottom: 1px solid black; border-radius: 0px">
                    <div class="col-1">
                    </div>
                    <div class="d-flex align-items-center" style="width: 100%">
                        <article class="cartName col-5">Product</article>

                        <article class="cartName col-2">Quantity</article>

                        <article class="cartName col-2">
                            <span class="text-capitalize">Color</span>
                        </article>

                        <article class="cartName col-2">
                            <span class="  text-capitalize">Size</span>
                        </article>

                        <article class="cartName col-2">
                            <span class="font-weight-bold">Price</span>
                        </article>
                    </div>
                </div>

                @if(count($products->cart) > 0)
                    @foreach($products->cart as $key => $product)
                        <div class="cardCart justify-content-space-between">
                            <div class="col-1">
                                <img class="imageCart" src="{{ $product->shoes->image }}" style="width: 50px"/>
                            </div>
                            <div class="d-flex align-items-center" style="width: 100%">
                                <article class="cartName col-5">{{ $product->shoes->name }}</article>

                                <article class="cartName col-2">{{ $product->quantity }}</article>

                                <article class="col-2">
                                    <span class="  text-capitalize">{{ $product->color }}</span>
                                </article>

                                <article class="col-2">
                                    <span class="  text-capitalize">{{ $product->size }}</span>
                                </article>

                                <article class="col-2">
                                    <span class="font-weight-bold">{{ $product->shoes->price }} €</span>
                                </article>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="font-size: 150%; padding: 20px" class="d-flex justify-content-between align-items-center">
                    <span>
                        Total :
                    </span>

                    <span>
                        {{ $products->getTotalPrice() ?? 0 }} €
                    </span>
                </div>

                <form style="margin: auto" method="post" action="{{ route('paid') }}">
                    @csrf
                    <div class="d-flex justify-content-between">

                        <div class="col-5">
                            <div class="card">
                                <div class="card-header">Personal information</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text"
                                               class="form-control  @error('name') is-invalid @enderror"
                                               id="exampleInputPassword1" name="name"
                                               placeholder="Name"
                                               value="{{ Auth::user()->name ?? '' }}"
                                        >
                                        @if($errors->has('name'))
                                            <small>{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email"
                                               class="form-control  @error('email') is-invalid @enderror"
                                               id="exampleInputEmail1" name="email"
                                               aria-describedby="emailHelp" placeholder="Enter email"
                                               value="{{ Auth::user()->email ?? '' }}"
                                        >
                                        @if($errors->has('email'))
                                            <small>{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text"
                                               class="form-control  @error('address') is-invalid @enderror"
                                               id="exampleInputPassword1"
                                               name="address" placeholder="Address"
                                               value="{{ old('address') }}"
                                        >
                                        @if($errors->has('address'))
                                            <small>{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Postal code</label>
                                        <input type="text"
                                               class="form-control  @error('postalCode') is-invalid @enderror"
                                               id="exampleInputPassword1"
                                               name="postalCode" placeholder="75010" maxlength="5"
                                               value="{{ old('postalCode') }}"

                                        >
                                        @if($errors->has('postalCode'))
                                            <small>{{ $errors->first('postalCode') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text"
                                               class="form-control  @error('city') is-invalid @enderror"
                                               id="exampleInputPassword1" name="city"
                                               placeholder="Paris"
                                               value="{{ old('city') }}"

                                        >
                                        @if($errors->has('city'))
                                            <small>{{ $errors->first('city') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--@auth--}}
                            {{--@else--}}
                            {{--<article class="pt-2">--}}
                            {{--<a href="{{ route('login') }}">Please login</a> OR <a href="{{ route('register') }}">register</a>--}}
                            {{--</article>--}}
                            {{--@endauth--}}
                        </div>


                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Payment information
                                </div>
                                <div class="card-body">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                        <input
                                                type="tel"
                                                class="form-control  @error('cardNumber') is-invalid @enderror"
                                                name="cardNumber"
                                                placeholder="Valid Card Number"
                                                maxlength="16"
                                                value="{{ old('cardNumber') }}"

                                        />
                                    </div>
                                    @if($errors->has('cardNumber'))
                                        <small>{{ $errors->first('cardNumber') }}</small>
                                    @endif
                                    <div class="row pt-3">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group ">
                                                <label for="cardExpiry"><span
                                                            class="hidden-xs">Expiration date</span></label>
                                                {{--<input--}}
                                                {{--type="tel"--}}
                                                {{--class="form-control"--}}
                                                {{--name="cardExpiry"--}}
                                                {{--placeholder="MM / YY"--}}
                                                {{--/>--}}
                                                <div class="d-flex align-items-center">
                                                    <input
                                                            type="tel"
                                                            class="form-control  @error('cardExpiryMM') is-invalid @enderror"
                                                            name="cardExpiryMM"
                                                            placeholder="MM"
                                                            style="width: 30%"
                                                            maxlength="2"
                                                            value="{{ old('cardExpiryMM') }}"

                                                    />

                                                    <span style="margin: 0px 10px">/</span>
                                                    <input
                                                            type="tel"
                                                            class="form-control @error('cardExpiryYY') is-invalid @enderror"
                                                            name="cardExpiryYY"
                                                            placeholder="YY"
                                                            style="width: 30%"
                                                            maxlength="2"
                                                            value="{{ old('cardExpiryYY') }}"
                                                    />

                                                </div>
                                            </div>
                                            <div>
                                                @if($errors->has('cardExpiryYY'))
                                                    <small>{{ $errors->first('cardExpiryYY') }}</small><br>
                                                @endif
                                                @if($errors->has('cardExpiryMM'))
                                                    <small>{{ $errors->first('cardExpiryMM') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cardCVC">Code cvc</label>
                                                <input
                                                        type="tel"
                                                        class="form-control @error('cardCVC') is-invalid @enderror"
                                                        name="cardCVC"
                                                        placeholder="CVC"
                                                        maxlength="3"
                                                        value="{{ old('cardCVC') }}"

                                                />
                                                @if($errors->has('cardCVC'))
                                                    <small>{{ $errors->first('cardCVC') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 20px">
                        <button type="submit" class="btn btn-primary">Payment</button>
                    </div>


                    {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger" style="margin-top: 20px">--}}
                    {{--<article>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                    {{--</article>--}}
                    {{--</div>--}}
                    {{--@endif--}}

                </form>
            </div>
        </div>
    </section>

@endsection