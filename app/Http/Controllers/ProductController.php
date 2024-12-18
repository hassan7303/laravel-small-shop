<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ProductResource;
use App\Http\Requests\UpdateProduct;
use Illuminate\Contracts\View\View;
use App\Http\Requests\StoreProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show all products
     * 
     * @return ResourceCollection
     */
    public function index():ResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Show product by id
     * 
     * @param  Request  $request
     * @param  int  $id
     * 
     * @return ProductResource
     */
    public function show(Request $request, int $id):ProductResource
    {
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Create Product Form
     * 
     * @return View
     */
    public function formCreate():View
    {
        dd("create product");
        // return view('products.create');
    }


    /**
     * store product.
     * 
     * @param  Request  $request
     * 
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // dd($request);
       $product = Product::create($request->all());

        return response()->json([
            'message' => "محصول با موفقیت ایجاد شد.",
            'data' => new ProductResource($product)
        ], 201);
    }
    
    /**
     * form Edit product.
     * 
     * @param  int  $id
     * 
     * @return View
     */
    public function formEdit($id):View
    {
        dd("edit product");
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * update product by id.
     * 
     * @param  Request  $request
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateProduct $request, int $id): JsonResponse
    {
        dd("update product");
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        
        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت به‌روزرسانی شد.",
            'data' => new ProductResource($product)
        ], 200);
    }

    /**
     * delete product by id.
     * 
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function destroy(int $id):JsonResponse
    {
        Product::findOrFail($id)->delete();

        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت حذف شد."
        ], 200);
    }
}
