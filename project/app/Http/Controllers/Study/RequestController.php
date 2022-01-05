<?php

namespace App\Http\Controllers\Study;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        // $id = $request->query('id');
        $id = $request->query();
        dd($id);
    }
} 