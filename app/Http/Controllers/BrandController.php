<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Item;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Show All Items here!";

        $brands = Brand::all();
         return view('backend.brands.index',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       //want ouput all since use all()
         $brands = Brand::all();
        //want ouput all since use all()

        return view('backend.brands.create',compact('brands'));
        
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
           
           "photo" => 'required|image'

           
        ]);


        //If include file, upload file
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimage'),$imageName);// store photo into public/backend/itemimg 

        $path = 'backend/brandimage/'.$imageName;// do upload with name(path)


        $brand =new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        //redirect
        return redirect()->route('brands.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('Backend.brands.detail',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
         $brands = Brand::all();
        

        return view('backend.brands.edit',compact('brands','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
       //Validation
        $request->validate([
           
           "name" => 'required',
           
           "photo" => 'sometimes',
           "oldphoto" => 'required'
        ]);


        //If include file, upload file
        if($request->hasFile('photo'))
        {
            $imageName = time().'.'.$request->photo->extension();

            $request->photo->move(public_path('backend/brandimage'),$imageName);// store photo into public/backend/itemimg
            $path = 'backend/brandimage/'.$imageName;// 
        }else{
            $path = $request->oldphoto;// do upload with name(path)
        }


        //Data insert
        
        
        $brand->name = $request->name;
        $brand->photo = $path;
       
        $brand->save();


        //redirect
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
         unlink($brand->photo);
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
