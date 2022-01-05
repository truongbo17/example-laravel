<?php

namespace App\Http\Controllers\Permisson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class PermissonController extends Controller
{
    public function viewRole(Request $request)
    {
        $roleList = DB::table('roles')->get();
        return view('permisson.role')->with([
            'roleList' => $roleList,
            'index' => 0
        ]);
    }

    public function viewSetting(Request $request)
    {
        $roleList = DB::table('routes')->get();

        $permissonList = DB::table('permission')
            ->where('role_id', $request->id)
            ->get();

        $list = [];
        foreach ($roleList as $item) {
            $status = 0;
            foreach ($permissonList as $value) {
                if ($value->route_id == $item->id) {
                    $status = $value->status;
                    break;
                }
            }
            $list[] = [
                'route_id' => $item->id,
                'route_title' => $item->route_title,
                'route_name' => $item->route_name,
                'status' => $status
            ];
        }
        return view('permisson.setting')->with([
            'index' => 0,
            'permissonList' => $list,
            'role_id' => $request->id
        ]);
    }
    public function save(Request $request)
    {
        $status = $request->status;
        $role_id = $request->role_id;
        $route_id = $request->route_id;

        $data = DB::table('permission')
            ->where('route_id', $route_id)
            ->where('role_id', $role_id)
            ->get();
        if ($data != null && count($data) > 0) {
            //update
            DB::table('permission')
                ->where('route_id', $route_id)
                ->where('role_id', $role_id)
                ->update([
                    'status' => $status
                ]);
        } else {
            //insert
            DB::table('permission')->insert([
                'route_id' => $route_id,
                'role_id' => $role_id,
                'status' => $status
            ]);
        }
    }

    public function test(Request $request)
    {
        $roleList = DB::table('routes')->get();

        return view('permisson.test')->with([
            'index' => 0,
            'roleList' => $roleList
        ]);
    }
}
