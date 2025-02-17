<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\order\createOrder;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendMailOrder;



class OrderController extends Controller
{
   public function store(createOrder $request)
   {
      $order = new Order();

      $productID = Crypt::decrypt($request->product_id);
      $userID = Crypt::decrypt($request->customer_id);

      if(Order::where('product_id', $productID)->exists())
      {
         return "The product you already ordered";
      }
       $order->create([

         'customer_id' => $userID ,
         'product_id' => $productID,
         'date' => now(),
         'name' => $request->name,
         'phone' => $request->phone,
         'address' => $request->address,

      ]);
      SendMailOrder::dispatch($order);

      return redirect()->back()->with('success', 'Order placed successfully!');

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
      $orders = Order::latest()->get();

      return view('order.orders', compact('orders'));
   }

   public function removeOrder($id)
   {
      $order = Order::find(Crypt::decrypt($id));
      $order->delete();

      return redirect()->back()->with('removerOrder', "successfullly remove you'r order ");
   }

   
}

