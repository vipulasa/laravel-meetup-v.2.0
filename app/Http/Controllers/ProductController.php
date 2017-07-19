<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'data' => Product::all()
        ];
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
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'menu_id' => 'required|exists:menus,id',
            'price' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return [
                'errors' => $validator->messages()
            ];
        }

        return [
            'data' => (new Product())->create($request->all())
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return array
     */
    public function show(Product $product)
    {
        return [
            'data' => $product
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return array
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'menu_id' => 'required|exists:menus,id',
            'price' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return [
                'errors' => $validator->messages()
            ];
        }

        return [
            'data' => $product->update($request->all())
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return array
     */
    public function destroy(Product $product)
    {
        return [
            'data' => $product->delete()
        ];
    }
}
