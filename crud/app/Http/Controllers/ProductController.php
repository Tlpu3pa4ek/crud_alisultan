<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function getInfo(){
        $results = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.id',
                'products.name',
                'products.quantity',
                'products.price',
                'products.category_id',
                'categories.name as category_name'
            )
            ->get();

//        $results = Product::join('categories', 'products.category_id', '=', 'categories.id')
//            ->select(
//                'products.id',
//                'products.name',
//                'products.quantity',
//                'products.price',
//                'products.category_id',
//                'categories.name as category_name'
//            )
//            ->get();

        return $results;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $productByCreated = $product->save();
        if ($productByCreated){
            return 'product was created';
        } else {
            return "product wasn't created";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->update();
        return 'data was updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product->delete()) {
            return 'successfully deleted';
        } else {
            return 'not deleted';
        }
    }
}
