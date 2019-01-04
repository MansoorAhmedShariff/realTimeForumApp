<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = CategoryResource::collection(Category::latest()->get());

        if($Categories != null){
            return response()->json(['message'=>'Categories Found', 'Categories'=>$Categories]);
         }else{
            return response()->json(['message'=>'No Categories Found']);
         }//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = str_slug($request->name);
        $category = Category::create($request->all());
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $Category = new CategoryResource($category);
        return ['Category'=>$Category];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request['slug'] = str_slug($request->name);
        $category->update($request->all());
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("Deleted Succssfully", 200);
    }
}
