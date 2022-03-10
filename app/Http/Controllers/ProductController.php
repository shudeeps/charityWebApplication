<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Session;
// use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

  
    public function getIndex()
    {


        $products = Product::all();
        //dd($products);

        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {

        $product = Product::find($id);


        // dd(session()->get('cart')->totalQty);
        $oldCart =  $request->session()->has('cart') ?   $request->session()->get('cart') : null;

        $cart = new cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        $value = $request->session()->get('cart');
        //dd($value);

        return redirect()->route('product.index');
    }

    public function getReduceByOne($id){
        $oldCart =  session()->has('cart') ? session()->get('cart') : null;

        $cart = new cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items)>0){
            session()->put('cart', $cart);
        } else{
            session()->forget('cart');
        }


        return redirect()->route('product.shoppingCart');

    }


    public function getRemoveItem($id){
        $oldCart =  session()->has('cart') ? session()->get('cart') : null;

        $cart = new cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items)>0){
            session()->put('cart', $cart);
        } else{
            session()->forget('cart');
        }

     
        return redirect()->route('product.shoppingCart');

    }

    public function getCart()
    {

        if (!session()->has('cart')) {
            return view('shop.shoping-cart', ['products' => null]);
        }

        $oldCart = session()->get('cart');

     
        $cart = new Cart($oldCart);
       // dd($cart);
        return view('shop.shoping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){

      
        if (!session()->has('cart')) {
            return view('shop.shoping-cart', ['products' => null]);
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        //dd($cart);
        $total=$cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);

    }

    public function postCheckout(Request $request){

       if (!session()->has('cart')) {
            return view('shop.shoping-cart', ['products' => null]);
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart=serialize($cart);
        $order->address=$request->input('address');
        $order->name=$request->input('name');
        $order->payment_id='234324';

           
        Auth::user()->orders()->save($order);


         session()->forget('cart');
         return redirect()->route('user.profile');



    }
}
