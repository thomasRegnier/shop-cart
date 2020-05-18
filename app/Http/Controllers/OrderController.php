<?php

namespace App\Http\Controllers;

use App\Order;
use App\product;
use Illuminate\Http\Request;
use App\Basket;
use App\MailTrap;
use Illuminate\Support\Facades\Mail;
use Session;


use App\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request, OrderProduct $orderProduct )
    {
        //
        $request->validate([
            'name'=>'required',
            'email' => 'required|email',
            'address' => 'required',
            'cardNumber' => 'required|numeric|digits:16',
            'cardExpiryYY' => 'required|numeric|digits:2',
            'cardExpiryMM' => 'required|numeric|digits:2',
            'cardCVC' => 'required|numeric|digits:3',
            'city' => 'required|',
            'postalCode' => 'required|numeric|digits:5'
        ]);


        $order = new Order();
        $bsk = new Basket();
        $order->userName = $request['name'];
        $order->userEmail = $request['email'];
        $order->userAddress = $request['address'] . ' ' . $request['city'] . ' ' . $request['postalCode'];
        $order->total = $bsk->getTotalPrice();

        $order->save();

        $lastId = $order->id;

        foreach ($bsk->cart as $bs){
            $orderProducts = new OrderProduct();

            $orderProducts->order_id = $lastId;
            $orderProducts->product_id = $bs->shoes->id;
            $orderProducts->quantity = $bs->quantity;
            $orderProducts->color = $bs->color;
            $orderProducts->size = $bs->size;

            $orderProducts->save();
        }

        $displayOrder = Order::find($lastId);

        Mail::to($request->get('email'))->send(new MailTrap($displayOrder));

        Mail::to("thomas.regnier3001@gmail.com")->send(new MailTrap($displayOrder));

        Session::forget('basket');

        return view('order', ['order' => $displayOrder]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
