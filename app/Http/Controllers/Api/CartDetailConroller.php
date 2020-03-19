<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\CartDetail;
use App\Cart;
use Validator;
use Session;

use App\Http\Resources\CartDetail as CartDetailResource;
use Dirape\Token\Token;

class CartDetailConroller extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts_details = CartDetail::all();
        return $this->sendResponse(CartDetailResource::collection($carts_details), 'Carts details retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'quantity'   => 'required',
        ]);

        if ( $validator->fails() ) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cart_detail = new CartDetail();
        $cart_detail->cart_id = $this->getCartId($request);
        $cart_detail->product_id = $input['product_id'];
        $cart_detail->quantity = $input['quantity'];
        $cart_detail->save();

        return $this->sendResponse(new CartDetailResource($cart_detail), 'Cart detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart_detail = CartDetail::find($id);

        if (is_null($cart_detail)) {
            return $this->sendError('Cart detail not found.');
        }

        return $this->sendResponse(new CartDetailResource($cart_detail), 'Cart detail retrieved successfully.');
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
    public function destroy(CartDetail $cart_detail)
    {
         $cart_detail->delete();
        return $this->sendResponse([], 'Cart detail deleted successfully.');
    }

    private function getCartId($request) {

        $old_cart = Session::exists('_cart') ? Session::get('_cart') : null;

        var_dump( $old_cart );

        if ( $old_cart ) {
            $cart = Cart::where([ 'session_id' => $old_cart->session_id, 'status' => 'Active' ])->exists();

            if ($cart)
                return $cart->id;

        }

        $cart = new Cart();
        $cart->session_id = (new Token())->Unique('carts', 'session_id', 60);
        $cart->save();

        Session::put('_cart', $cart);

        $old_cart = Session::has('_cart') ? Session::get('_cart') : null;
        var_dump( $old_cart );
        return $cart->id;
    }
}
