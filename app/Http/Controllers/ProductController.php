<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'data' => $product
        ],200); 
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
    public function store(StoreProductRequest $request)
    {
        try {
            //code...
            if($request->product_image){
                //store image in storage
                $imageName = time().$request->product_image->getClientOriginalName();
                $request->product_image->storeAs('public/uploads/product',$imageName);
            }
            else{
                $imageName = null;
            }
            Product::create([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_image' => $imageName,
                'product_price'=> $request->product_price,
                'product_url' => $request->product_url,
                'product_meta' => $request->product_meta,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'product_feature' =>$request->product_feature,
            ]);

            return response()->json([
                'status' => "sucess!!",
                'message' => 'Product Added Sucessfully!'
            ],200);

        } catch (\Exception $e) {
            //Return Json Response
            return response()->json([
                'status' => "failed!!",
                'message' => "Something Went Wrong"
            ],500);
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
