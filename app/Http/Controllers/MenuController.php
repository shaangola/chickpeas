<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;
use Cookie;
use Tracker;
use Session;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu)
    {
        $menus = Menu::with('getmenu')->where('menu_type', '1')->get();
        $menuType= MenuType::orderBy('id')->pluck('title','id');
        $menus_list = Menu::where('parent_id', '0')->orderBy('title')->pluck('title','id');
        return view('create', ['menu' => $menu,'menuType'=>$menuType,'menus_list'=>$menus_list ]);
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
        //dd($request->all());
        $items = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'menu_type' => 'required',
            'full_price' => 'required|numeric',
          ]);
        Menu::create($items);
        //$menu = Menu::save($request->all());
        return redirect('menu/create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $menus = Menu::with('children')->where('parent_id', '0')->get();
        //$menus =$menus->toArray();
        //dd($menus);
        
        return view('dashboard',compact('menus'));
        
        //return view('backend.categories.create')->with('categories', $menu);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
