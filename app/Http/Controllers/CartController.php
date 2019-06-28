<?php

namespace App\Http\Controllers;
use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request){

        $products=Product::find($request->product_id);
        cart::add([
            'id'=>$products->id,
            'name'=>$products->product_name,
            'qty'=>$request->qty,
            'price'=>$products->product_price,
            'options'=>[
                'image'=>$products->product_image
            ]
        ]);
       return redirect('cart/show');


    }
    public function cartShow(){
        $cart_elemenets = cart::content();
        Session::put('cart_elemenets', $cart_elemenets);


        return view('front-end.shopping-cart.cart-show', [
            'cart_elemenets' => $cart_elemenets
        ]);
    }
    public function cartDelete($id){

        Cart::remove($id);
        Session::forget('product_number');
        Session::forget('orderTotal');


        return redirect('cart/show')->with('message', 'Product delete from your Cart successfully !!');

    }
    public function cartUpdate(Request $request){
        $rowId=$request->rowId;
        Cart::update($rowId, $request->qty);

        return redirect('cart/show');
    }



}
