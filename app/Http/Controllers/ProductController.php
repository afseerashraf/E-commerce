<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\CreateProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //This function is process only user side
    public function home()
    {
        $electronics = DB::table('products')->where('categorie', 'electronics')->latest()->limit(3)->get();
        $cosmetics = DB::table('products')->where('categorie', 'cosmetics')->latest()->limit(3)->get();
        $clothes = DB::table('products')->where('categorie', 'clothing')->latest()->limit(3)->get();

        return view('home', compact('electronics', 'cosmetics', 'clothes'));
    }

    public function index(Request $request)
    {
        if($request->ajax())
        {
            $product = Product::query();
            return DataTables::eloquent($product)
           
            ->addColumn('created_at', function($product){
                return Carbon::parse($product->created_at)->format('Y-m-d');

            })
            ->addColumn('action', function($product){
                return '
                    <a href="'.route('products.edit', $product->id).'" class="btn btn-success edit-product">Edit</a>
                    <button data-id="'.$product->id.'" class="btn btn-danger btn-sm delete-product">Delete</button>
                ';
            })

         
            ->rawColumns(['action'])
            ->make(true);
        }
       return view('product.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProduct $request)
    {
        $product = new Product();
        $input = [
            'name' => $request->name,
            'description' => $request-> description,
            'price' => $request->price,  
            'categorie' => $request->categorie, 
         
        ];
       
        if($request->hasfile('image')){
            $fileName = time().'.'.$request->image->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('uploads/images', $request->image, $fileName);
            
            $input['image'] = $fileName;
            
           }
        $product->create($input);

        return redirect()->route('products.create')->flash('success', 'Success fully created new product');
    }

    /**
     * Display the specified resource.
     */

        
    //This function is process only user side
    public function showOrder(String $user_id, string $product_id)
    {
        $user = User::find(Crypt::decrypt($user_id));
        $product = Product::find(Crypt::decrypt($product_id));
        return view('product.order', compact('user', 'product'));
    }

    public function show()
    {

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if($product)
        {
            $product->delete();
            return response()->json(['status' => 'success', 'message' => 'product deleted successfully']);

        }
        return response()->json(['status' => 'error', 'message' => 'product not found'], 404);

    }


    public function productCart(string $id)
    {
        $product = Product::find(Crypt::decrypt($id));
        Session::put('product', $product);

        return view('product.cart');
    }

    public function cartRemove(string $id)
    {
        $decryptedId = Crypt::decrypt($id);
    
        if (Session::has('product')) {
            $product = Session::get('product');
    
            if ($product->id == $decryptedId) {
                Session::forget('product');
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product removed from cart'
                ]);
            }
        }
    
        return response()->json([
            'status' => 'not_found',
            'message' => 'Product not found in cart'
        ]);
    }
    

}
