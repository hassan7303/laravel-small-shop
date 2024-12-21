<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategory;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\View\View;

class CategoryController extends Controller
{

     /**
     * Show all categorys
     *
     * @return ResourceCollection
     */
    public function index():ResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

     /**
     * Show Category by id
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return CategoryResource
     */
    public function show(Request $request, int $id):CategoryResource
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    /**
     * Create Category Form
     *
     * @return View
     */
    public function formCreate():View
    {
        dd("create Category");
        //  return view('category.index');
    }


    /**
     * store Category.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // dd($request);
       $category = Category::create($request->all());

        return response()->json([
            'message' => "محصول با موفقیت ایجاد شد.",
            'data' => new CategoryResource($category)
        ], 201);
    }

    /**
     * form Edit Category.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function formEdit($id):View
    {
        $category = Category::findOrFail($id);

        return view('admin.categorys.edit', compact('Category'));
    }

    /**
     * update Category by id.
     *
     * @param  UpdateCategory  $request
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function update(UpdateCategory $request, int $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت به‌روزرسانی شد.",
            'data' => new CategoryResource($category)
        ], 200);
    }

    /**
     * delete Category by id.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id):JsonResponse
    {
        Category::findOrFail($id)->delete();

        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت حذف شد."
        ], 200);
    }

}
