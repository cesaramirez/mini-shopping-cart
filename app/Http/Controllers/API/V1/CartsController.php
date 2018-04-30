<?php

namespace App\Http\Controllers\API\V1;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartsResource;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    protected $carts;

    public function __construct(Cart $carts)
    {
        $this->carts = $carts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = $this->carts->with('item')->get();

        return CartsResource::collection($carts);
    }

    /**
     * Delete all registers.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleleAll()
    {
        $this->carts->truncate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->carts->where('product_colors_id', $request->product_colors_id);
        if ($item->count()) {
            $item->increment('quantity');
            $item = $item->first();
        } else {
            $item = $this->carts->create([
                'product_colors_id' => $request->product_colors_id,
                'quantity'          => 1,
            ]);
        }

        return new CartsResource($item);
    }

    public function checkout(Request $request)
    {
        \Mail::to($request->user())->send(new OrderShipped($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cart $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, Request $request)
    {
        $item = $this->carts->where('product_colors_id', $productId)->first();
        $item->decrement('quantity');
        if ($item->quantity === 0) {
            $item->delete();
        }

        return response(null, 200);
    }
}
