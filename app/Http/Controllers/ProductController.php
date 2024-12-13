<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        // متد برای دریافت لیست محصولات
    }

    /**
     * @param  Request  $request
     * @return void
     */
    public function store(Request $request): void
    {
        // متد برای افزودن محصول جدید
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, int $id): void
    {
        // متد برای ویرایش محصول
    }

    /**
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void
    {
        // متد برای حذف محصول
    }
}
