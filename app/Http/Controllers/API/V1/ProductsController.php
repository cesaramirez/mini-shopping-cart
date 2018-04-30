<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;

class ProductsController extends Controller
{
    /**
     * products property.
     */
    protected $products;

    /**
     * Constructor.
     *
     * @param \App\Product; $carts
     */
    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->get();

        return ProductResource::collection($products);
    }
}
