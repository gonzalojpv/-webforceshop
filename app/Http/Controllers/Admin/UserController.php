<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user']   = new User();
        return view('admin.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->user = null;

        list( $rules, $messages ) = $this->_rules();

        $this->validate( $request, $rules, $messages );

        $new_user = new User();
        $new_user->name = $request->input('name');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();

        $notification = 'User created successfully.';
        return back()->with(compact('notification'));
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
        $data['user'] = User::find($id);
        return view('admin.users.edit', $data);
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
        $this->user = User::find($id);
        list( $rules, $messages ) = $this->_rules(FALSE);

        $this->validate( $request, $rules, $messages );

        $this->user->name = $request->input('name');

        if ($request->input('password')) {
            $this->user->password = Hash::make($request->input('password'));
        }

        $this->user->save();

        $notification = 'User update successfully.';
        return back()->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ( ! $user ) {
            return back()->with(['error' => 'User no found.']);
        }

        $user->delete();

        $notification = 'User removed.';
        return back()->with(compact('notification'));
    }

    private function _rules($insert = TRUE) {

        $hashed_password = null;
        $messages = [
            'name.required'  => 'Name is required.',
            'email.required' => 'Email is required.'
        ];

        if ($this->user) {
            $hashed_password = $this->user->password;
        }

        $rules = [
            'name'   => ['required', 'string', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
            'oldPassword'=> "password_hash_check:$hashed_password|string|min:6",
            'newPassword' => 'required_with:oldPassword|confirmed|min:6',
        ];

        if ( $insert ) {
            $rules = [
                'name'   => ['required', 'string', 'max:255'],
                'email'  => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }

        return array($rules, $messages);
    }
}
