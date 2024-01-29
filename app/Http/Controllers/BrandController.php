<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brand = Brand::all();
        return response()->json( [
            'data' => $brand
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
    public function store(StoreBrandRequest $request)
    {
        try {
            //code...
            if($request->brand_image){
                //store image in storage
                $imageName = time().$request->brand_image->getClientOriginalName();
                $request->brand_image->storeAs('public/uploads/brand',$imageName);
            }
            else{
                $imageName = 1;
            }
            // $imageName = 1;
            
            // Storage::disk('public')->put($imageName, file_get_contents($request->image));
            // return $request->brand_meta;

            // Brand::create($request->validated());
            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_description' => $request->brand_description,
                'brand_image' => $imageName,
                'brand_url' => $request->brand_url,
                'brand_meta' => $request->brand_meta,
            ]);
            // Menu::create($request);

            return response()->json([
                'status' => "sucess!!",
                'message' => 'Menu Added Sucessfully!'
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
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
