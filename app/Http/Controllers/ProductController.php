<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductPost;
use App\Services\ProductService;
use \Illuminate\Http\Request;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        return view('product.index', [
            'products' => $this->service->all()->orderBy('name')->paginate(25),
        ]);
    }

    public function update(UpdateProductPost $request, $id)
    {
        $response = $this->service->update($id, $request->only(['price']));
        if($response)
            return $response;
    }
}
