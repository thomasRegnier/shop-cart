@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Your command
        </div>
        <div class="card-body">
            <div>
                <span style="font-weight: bold">Name : </span>  {{ $order->userName }}
            </div>
            <div>
                <span style="font-weight: bold">Email :</span>  {{ $order->userEmail }}
            </div>

            <div>
             <span style="font-weight: bold">Address :</span>    {{ $order->userAddress }}
            </div>

            <div>
                <span style="font-weight: bold">Total :</span>  {{ $order->total }} €
            </div>


            <div class="row pt-3" style="font-weight: bold; border-bottom: 1px solid black">

                <div class="col-6">
                    Product
                </div>

                <div class="col-2">
                    Color
                </div>

                <div class="col-2">
                    Size
                </div>

                <div class="col-2">
                    Quantity
                </div>
            </div>

            @foreach($order->orderProducts as $odr)
                <div class="row">
                    <div class="col-6">
                        {{ $odr->productsInOrder->name }}
                    </div>
                    <div class="col-2">
                        {{ $odr->color }}
                    </div>

                    <div class="col-2">
                        {{ $odr->size}}
                    </div>

                    <div class="col-2">
                        {{ $odr->quantity}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection