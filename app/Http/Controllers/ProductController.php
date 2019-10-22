<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'name' => 'max:255|required',
            'price' => 'numeric|required',
            'description' => 'max:255|required',
            'image' => 'image|required'
          ]);

          $img = $request->image;
          $new_img_name = Time().$img->getClientOriginalName();
          $img->move('uploads/products',$new_img_name);

          Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => '/uploads/products/' . $new_img_name
          ]);
          return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.single')->with('product', Product::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          return view('product.edit')->with('product', Product::find($id));
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
      $this->validate($request,[
        'name' => 'max:255|required',
        'price' => 'numeric|required',
        'description' => 'max:255|required',
      ]);

      $product = Product::find($id);

      if($request->hasFile('image'))
      {
        $img = $request->image;
        $new_img_name = Time().$img->getClientOriginalName();
        $img->move('uploads/products',$new_img_name);
        $product->image = '/uploads/products/' . $new_img_name;
      }

      $product->name = $request->name;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->save();

      return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
