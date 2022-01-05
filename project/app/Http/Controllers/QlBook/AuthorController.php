<?php

namespace App\Http\Controllers\QlBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        // $authorList = DB::table('author')
        //     ->orderBy('created_at', 'asc')
        //     ->paginate(10);
        $authorList = Author::orderBy('created_at', 'asc')->paginate(10);

        return view('qlbook.author.index')->with([
            'index' => 1,
            'authorList' => $authorList
        ]);
    }
    public function view_add(Request $request)
    {
        return view('qlbook.author.add');
    }
    public function post_add(Request $request)
    {
        $nickname = DB::table('author')->where('nickname', $request->nickname)->get();
        if ($nickname != null && count($nickname) > 0) {
            return 'error';
        }
        // DB::table('author')->insert([
        //     'nickname' => $request->nickname,
        //     'fullname' => $request->fullname,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'phonenumber' => $request->nickname,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        Author::insert([
            'nickname' => $request->nickname,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->nickname,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('author_index');
    }
}
