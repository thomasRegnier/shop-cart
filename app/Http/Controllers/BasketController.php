<?php

namespace App\Http\Controllers;

use App\Basket;
use App\product;
use Illuminate\Http\Request;

use Monolog\Processor\ProcessIdProcessor;
use Session;


class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {

     //   $basket = Session::get('basket') ?? [];

//        $sumPrice = array_reduce($basket, function($carry, $item)
//        {
//            return $carry + $item->shoes->price * $item->quantity ;
//        });
//        $sumQt = array_reduce($basket, function($carry, $item)
//        {
//            return $carry + $item->quantity;
//        });


//        $cart = (object)[
//            'products' => $basket,
//            'total' => $test->getTotalPrice(),
//            'qt' => $test->getTotalQt()
//        ];
        $cart = new Basket();

        return view('basket' ,['products' => $cart]);


    }

    public function moreQt(Request $request){

        Session::get('basket')[$request->id]->quantity = Session::get('basket')[$request->id]->quantity + 1;

        Session::put('basket', Session::get('basket'));

        return back();

    }


    public function lessQt(Request $request){

        $basket = Session::get('basket');
        if ($basket[$request->id]->quantity === 1){

            unset($basket[$request->id]);

        } else{
            $basket[$request->id]->quantity =  $basket[$request->id]->quantity - 1;
        }

        Session::put('basket', $basket);

        return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, product $product)
    {
        //


        $request->validate([
            'color'=>'required',
            'size' => 'required'
        ]);

        $data = (object)[
            'shoes' =>  $product->findOrfail($request->shoes),
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => 1
        ];

        if (Session::get('basket')){
            $id = $request->shoes;
            $size = $request->size;
            $color = $request->color;
            $neededObject = current(array_filter(
                Session::get('basket'),
                function ($e) use ($id, $size, $color) {
                    if ($e->shoes->id == $id && $e->size === $size && $e->color === $color){
                        return $e;
                    }
                }
            ));

            if($neededObject){

                $request->session()->flash('error','Ce produit est déja dans votre panier' );

                return redirect()->route('product', ['id' => $request->shoes]);
            }

        }

        Session::push('basket', $data);

        $request->session()->flash('success','Produit ajouté au panier' );

        return redirect()->route('product', ['id' => $request->shoes]);

    }


    public function remove(Request $request){

        $array = Session::get('basket');


        unset($array[$request->id]);

        Session::put('basket', $array);


        return back();
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
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
    }


    public function toPayment(){

        $cart = new Basket();

        return view('payement' ,['products' => $cart]);

    }

}
