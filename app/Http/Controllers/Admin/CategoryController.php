<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category']   = new Category();
        return view('admin.categories.create', $data);
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

        $new_category = new Category();
        $new_category->name = $request->input('name');
        $new_category->description = $request->input('description');
        $new_category->save();

        //return back()->with(['notify' => 'Usuario creado correctamente.']);
        return redirect()->route('admin.categories.index')->with('notify', 'Category added successfully.');
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
       $data['category'] = Category::find($id);
        return view('admin.categories.edit', $data);
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
        $category = Category::find($id);
        list( $rules, $messages ) = $this->_rules(FALSE);

        $this->validate( $request, $rules, $messages );

        $category->name = $request->input('name');

        if ($request->input('description')) {
            $category->description = $request->input('description');
        }

        $category->save();
        return redirect()->route('admin.categories.index')->with('notify', 'Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if ( ! $category ) {
            return back()->with(['error' => 'category no found.']);
        }

        $category->delete();

        return back()->with(['nnotify' => 'category removed.']);
    }

    private function _rules($insert = TRUE) {
        $messages = [
            'name.required'  => 'Name is required.',
        ];

        $rules = [
            'name'   => ['required', 'string', 'max:255'],
        ];

        return array($rules, $messages);
    }
}
