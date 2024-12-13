<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param  Request  $request
     * @return void
     */
    public function create(Request $request):void
    {
        // متد برای ثبت سفارش جدید
    }

    /**
     * @return void
     */
    public function index():void
    {
        // متد برای مشاهده تمام سفارش‌ها (ادمین)
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id):void
    {
        // متد برای مشاهده یک سفارش خاص (ادمین)
    }

    /**
     * @param  Request  $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id):void
    {
        // متد برای به‌روزرسانی وضعیت سفارش
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id):void
    {
        // متد برای حذف سفارش
    }
}
