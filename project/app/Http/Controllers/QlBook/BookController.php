<?php

namespace App\Http\Controllers\QlBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $bookList = DB::table('book')
            ->leftJoin('author', 'author.nickname', '=', 'book.nickname')
            ->select('book.*', 'author.fullname')
            ->orderBy('book.created_at', 'asc')
            ->paginate(10);
        return view('qlbook.book.index')->with([
            'index' => 1,
            'bookList' => $bookList
        ]);
    }
    public function view_add(Request $request)
    {
        $nicknameList = DB::table('author')
            ->select('nickname', 'fullname')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('qlbook.book.add')->with([
            'nicknameList' => $nicknameList
        ]);
    }
    public function post_add(Request $request)
    {
        DB::table('book')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'nxb' => $request->nxb,
            'nickname' => $request->nickname,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('book_index');
    }
}
