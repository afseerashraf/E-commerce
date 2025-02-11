<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
   public function order(String $id)
   {
        $product = Product::find(Crypt::decrypt($id));
        $order = new Order();
        $order->product_id = $product->id;
        $order->date = now();
        $order->save();

   }

}
