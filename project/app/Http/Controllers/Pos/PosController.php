<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }
    public function index(Request $request)
    {
        $productList = DB::table('product')
            ->leftJoin('category', 'category.id', '=', 'product.category_id')
            ->select('product.*', 'category.name as category_name');

        if (isset($request->search)) {
            //tìm kiếm
            $productList = $productList->where('product.title', 'like', '%' . $request->search . '%');
        }
        //khong tìm kiếm
        $productList = $productList->paginate(12);

        return view('pos.index')->with([
            'productList' => $productList
        ]);
    }

    public function save(Request $request)
    {
        $json = $request->data;
        $cartList = json_decode($json, true);

        $customer_id = 1;
        $orders = Orders::create([
            'customer_id' => $customer_id,
            'total_money' => $request->total_money,
            'order_date' => date('Y-m-d H:i:s')
        ]);

        foreach ($cartList as $item) {
            DB::table('order_details')->insert([
                'order_id' => $orders->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'amount' => $item['num'],
                'total_money' => $item['price'] * $item['num'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        echo "success";
    }
}
