<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $dataCheckLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd(auth()->attempt($dataCheckLogin));

        //B1: xác thực user có tài khoản hay chưa
        //B2: tạo token

        if (auth()->attempt($dataCheckLogin)) {
            $checkTokenExit = SessionUser::where('user_id', auth()->id())->first();
            // dd(SessionUser::where('user_id', auth()->id())->first());
            if (empty($checkTokenExit)) {
                $userSessionUser = SessionUser::create([
                    'token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refesh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => auth()->id()
                ]);
            } else {
                $userSessionUser = $checkTokenExit;
            }

            return response()->json([
                'code' => 200,
                'data' => $userSessionUser
            ], 200);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Username hoac pass khong dung'
            ], 200);
        }
    }

    public function refeshtoken(Request $request)
    {
        $token = $request->header('token');
        $checkTokenIsVaild = SessionUser::where('token', $token)->first();
        // dd($checkTokenIsVaild);
        if (!empty($checkTokenIsVaild)) {
            if ($checkTokenIsVaild->expried < time()) {
                $checkTokenIsVaild->update([
                    'token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refesh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
                ]);
            }
        }
        $dataSession = SessionUser::find($checkTokenIsVaild->id);
        return response()->json([
            'code' => 200,
            'message' => 'refesh token thanh cong',
            'data' => $dataSession
        ], 200);
    }

    public function deletetoken(Request $request)
    {
        $token = $request->header('token');
        $checkTokenIsVaild = SessionUser::where('token', $token)->first();
        // dd($checkTokenIsVaild);
        if (!empty($checkTokenIsVaild)) {
            $checkTokenIsVaild->delete();
        }
        $dataSession = SessionUser::find($checkTokenIsVaild->id);
        return response()->json([
            'code' => 200,
            'message' => 'delete token thanh cong',
            'data' => $dataSession
        ], 200);
    }
}
