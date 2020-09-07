<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subcategories = Subcategory::all();
         //$categories = Category::all();
        //dd($items);
         return view('backend.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$subcategories = Subcategory::all();
        $categories = Category::all();
        //want ouput all since use all()

        return view('backend.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
           
           "name" => 'required',
           "category_id" => 'required'
           
        ]);
        $subcategory=new Subcategory;
       
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        
        $subcategory->save();

        //redirect
        return redirect()->route('subcategories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('Backend.subcategories.detail',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
       
       $categories = Category::all();

        return view('backend.subcategories.edit',compact('subcategory','categories'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
           
           "name" => 'required',
           "category_id" => 'required'

           
        ]);

        //Data insert
        
        //$subcategory=new Subcategory;
        $subcategory->name = $request->name;
       $subcategory->category_id = $request->category_id;
       
        $subcategory->save();


        //redirect
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        // unlink($subcategory->photo);
        $subcategory->delete();

        return redirect()->route('subcategories.index');
    }
}
