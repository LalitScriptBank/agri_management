<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Product;

use Illuminate\Http\Request;
use Auth;
// use Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        $user = Cart::where('user_id',Auth::id());
        return view('cart',compact('products','user'));

    }


     public function mycart()
    {
         $products = User::find(Auth::id())->carts()->get();
         
 return view('mycart',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
        ]);


         $data = new Cart;
         if (Auth::user()) {
             $data->name = $request->name;
         $data->product_id = $request->product_id;
         $data->user_id = Auth::id();
         $data->price = $request->price;

         $data->save();

            // Cart::add(['id' => $request->product_id,'product_id' => $request->product_id, 'name' => $request->name,'user_id' => Auth::id(), 'quantity' => 1, 'price' => $request->price, 'options' => ['size' => 'large']]);


         return redirect()->back()->with('status','Added To Cart');
         } else {
            return view('login');
         }
         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
