<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return response()->json([
            'data' => $category
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
    public function store(StorecategoryRequest $request)
    {
        try {
            //code...
            if($request->category_image){
                //store image in storage
                $imageName = time().$request->category_image->getClientOriginalName();
                $request->category_image->storeAs('public/uploads/category',$imageName);
            }
            else{
                $imageName = null;
            }
            Category::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'category_image' => $imageName,
                'category_url' => $request->category_url,
                'category_meta' => $request->category_meta,
            ]);

            return response()->json([
                'status' => "sucess!!",
                'message' => 'category Added Sucessfully!'
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
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}
