<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\order\createOrder;
use App\Models\User;

class OrderController extends Controller
{
   public function store(createOrder $request)
   {
      $order = new Order();
      $order->create([
         'customer_id' => Crypt::decrypt($request->customer_id),
         'product_id' =>Crypt::decrypt($request->product_id),
         'date' => now(),
         'name' => $request->name,
         'phone' => $request->phone,
         'address' => $request->address,
      ]);
      return redirect()->route('order.orders')->with('success', 'Order placed successfully!');

   }

   public function showOrders(String $id)
   {
      $user = User::find(crypt::decrypt($id));

      if (!$user) {
         return abort(404, 'User not found');
      }

      return view('user.order', compact('user'));
   }

   public function orders()
   {
      $orders = Order::all();

      return view('order.orders', compact('orders'));
   }
}
