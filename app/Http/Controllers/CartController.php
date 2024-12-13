<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @return void
     */
    public function show(): void
    {
        // متد برای نمایش سبد خرید (کاربر)
    }

    /**
     * @param  Request  $request
     * @return void
     */
    public function add(Request $request): void
    {
        // متد برای افزودن آیتم به سبد خرید
    }

    /**
     * @return void
     */
    public function adminShow(): void
    {
        // متد برای نمایش سبد خرید (ادمین)
    }

    /**
     * @param  int  $id
     * @return void
     */
    public function removeItem(int $id): void
    {
        // متد برای حذف آیتم از سبد خرید (ادمین)
    }
}
