<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Requests\UpdateUser;
use Illuminate\Contracts\View\View;
use App\Http\Requests\StoreUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show all Users
     * 
     * @return ResourceCollection
     */
    public function index():ResourceCollection
    {
        return UserResource::collection(User::all());
    }

    /**
     * Show User by id
     * 
     * @param  Request  $request
     * @param  int  $id
     * 
     * @return UserResource
     */
    public function show(Request $request, int $id):UserResource
    {
        return new UserResource(User::findOrFail($id));
    }


    /**
     * store User.
     * 
     * @param  Request  $request
     * 
     * @return JsonResponse
     */
    public function store(StoreUser $request): JsonResponse
    {
       $User = User::create($request->validated());

        return response()->json([
            'message' => "محصول با موفقیت ایجاد شد.",
            'data' => new UserResource($User)
        ], 201);
    }
    
    /**
     * form Edit User.
     * 
     * @param  int  $id
     * 
     * @return View
     */
    public function formEdit($id):View
    {
        $User = User::findOrFail($id);

        return view('admin.Users.edit', compact('User'));
    }

    /**
     * update User by id.
     * 
     * @param  Request  $request
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateUser $request, int $id): JsonResponse
    {
        $User = User::findOrFail($id);
        $User->update($request->validated());
        
        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت به‌روزرسانی شد.",
            'data' => new UserResource($User)
        ], 200);
    }

    /**
     * delete User by id.
     * 
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function destroy(int $id):JsonResponse
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'message' => "محصول با شناسه {$id} با موفقیت حذف شد."
        ], 200);
    }
}
