<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SessionUser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->header('token');
        // dd($token);
        $checkTokenIsValid = SessionUser::where('token', $token)->first();
        if (empty($token)) {
            return response()->json([
                'code' => 401,
                'message' => 'token khong duoc gui tu header'
            ], 401);
        } elseif (empty($checkTokenIsValid)) {
            return response()->json([
                'code' => 401,
                'message' => 'token khong hop le'
            ], 401);
        } else {
            $products = Product::all();
            return response()->json([
                'code' => 200,
                'data' => $products
            ], 200);
        }
    }
}
