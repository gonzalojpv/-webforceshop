<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['product']   = new Product();
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        list( $rules, $messages ) = $this->_rules();

        $this->validate( $request, $rules, $messages );

        $new_product = new Product();
        $new_product->name = $request->input('name');
        $new_product->slug = Str::slug($request->input('name'), '-');
        $new_product->description = $request->input('description');
        $new_product->long_description = $request->input('long_description');
        $new_product->price = $request->input('price');
        $new_product->save();

        //Store Image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $new_product->addMediaFromRequest('image')->toMediaCollection('images');
        }

        //return back()->with(['notify' => 'Usuario creado correctamente.']);
        return redirect()->route('admin.products.index')->with('notify', 'Product added successfully.');
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
        $data['product'] = Product::find($id);
        return view('admin.products.edit', $data);
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
        $product = Product::find($id);
        list( $rules, $messages ) = $this->_rules(FALSE);

        $this->validate( $request, $rules, $messages );

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');

        $product->save();

        //Store Image
        if( $request->hasFile('image') && $request->file('image')->isValid() ) {
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.products.index')->with('notify', 'Update.');
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

        if ( ! $product ) {
            return back()->with(['error' => 'Product no found.']);
        }

        $product->delete();

        return back()->with(['nnotify' => 'Product removed.']);
    }

    private function _rules() {
        $messages = [
            'name.required'  => 'Name is required.',
            'description.required'  => 'Description is required.',
            'price.required' => 'Email is required.'
        ];
        $rules = [
            'name'   => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:255'],
            'price'  => ['required', 'numeric'],
        ];
        return array($rules, $messages);
    }
}
