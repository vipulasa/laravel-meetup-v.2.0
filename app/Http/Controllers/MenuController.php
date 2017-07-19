<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return [
            'data' => Menu::all()
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
            'title' => 'required'
        ]);

        if($validator->fails()){
            return [
                'errors' => $validator->messages()
            ];
        }

        return [
            'data' => (new Menu())->create($request->all())
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu $menu
     * @return array
     */
    public function show(Menu $menu)
    {
        return [
            'data' => $menu
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Menu $menu
     * @return array
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()){
            return [
                'errors' => $validator->messages()
            ];
        }

        return [
            'data' => $menu->update($request->all())
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu $menu
     * @return array
     */
    public function destroy(Menu $menu)
    {
        return [
            'data' => $menu->delete()
        ];
    }

    public function products($menu_id)
    {
        return [
            'data' => (new Menu)->find($menu_id)->products
        ];
    }
}
