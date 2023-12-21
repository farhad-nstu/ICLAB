<?php

use App\Enums;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;

if(! function_exists('HasPermissions')){
    function HasPermissions($obj, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$obj->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}

if(! function_exists('toObject')){
    function toObject($array)
    {
        return json_decode(json_encode($array), FALSE);
    }
}

if(! function_exists('admin')){
    function admin()
    {
        return Admin::with('roles')->where('id', auth()->guard('admin')->id())->first();
    }
}

if(! function_exists('user')){
    function user()
    {
        $user = User::with('roles')->where('id', auth()->guard('web')->id())->first();
        return $user;
    }
}

if(! function_exists('role_permissions')){
    function role_permissions()
    {
        return [
            'role.create',
            'role.show',
            'role.edit',
            'role.delete',
        ];
    }
}
if(! function_exists('user_permissions')){
    function user_permissions()
    {
        return [
            'user.create',
            'user.show',
            'user.edit',
            'user.delete',
        ];
    }
}

if(! function_exists('product_permissions')){
    function product_permissions()
    {
        return [
            'products.index',
            'products.create',
            'products.show',
            'products.edit',
            'products.delete',
        ];
    }
}

if(! function_exists('category_permissions')){
    function category_permissions()
    {
        return [
            'categories.index',
            'categories.create',
            'categories.show',
            'categories.edit',
            'categories.delete',
        ];
    }
}

if(! function_exists('discountPrice')){
    function discountPrice($price, $discount){
        $discountAmount = ($price * $discount) / 100;
        $discountPrice = $price - $discountAmount;
        return $discountPrice;
    }
}
