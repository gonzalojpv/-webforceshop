<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\CartDetail;
use App\Cart;
use Validator;
use Session;

use App\Http\Resources\CartDetail as CartDetailResource;
use App\Http\Resources\Cart as CartResource;
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
        $cart = Cart::find($id);

        if (is_null($cart)) {
            return $this->sendError('Cart detail not found.');
        }

        return $this->sendResponse(new CartResource($cart), 'Cart retrieved successfully.');
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
    public function destroy($id)
    {
        $cart_detail = CartDetail::find($id);
        $cart_detail->delete();

        return $this->sendResponse([], 'Cart item removed successfully.');
    }

    private function getCartId($request) {

        $session_id = $request->input('_cart');

        if ( $session_id ) {
            $cart = Cart::where([ 'session_id' => $session_id, 'status' => 'Active' ])->get()->first();

            if ($cart)
                return $cart->id;

        }

        $cart = new Cart();
        $cart->session_id = (new Token())->Unique('carts', 'session_id', 60);
        $cart->save();
        return $cart->id;
    }
}
