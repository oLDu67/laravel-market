<?php

namespace App\Modules\Frontend\Category\Controllers;


use App\ProductCategories;
use App\ProductCategoryRelation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category_id = (int) func_get_arg(1);

        $products = ProductCategoryRelation::where('product_category_relations.category_id',$category_id)
            ->leftJoin('products as p','p.id','=','product_category_relations.product_id')
            ->leftJoin('product_images as pi','pi.product_id','=','p.id')
            ->select('p.*','product_category_relations.category_id','pi.image_name')
            ->get();

        $category = ProductCategories::where('id',$category_id)->first();
        return view('Category::index',['products'=>$products,'category_name'=>$category->category_name,'category_id'=>$category->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
