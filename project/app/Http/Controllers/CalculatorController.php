<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function showCalculator(Request $request)
    {
        $a = $request->a;
        $b = $request->b;

        $result = '';

        $cal = $request->cal;
        switch ($cal){
            case '+':
            $result = $a + $b;
            break;
            case '-':
            $result = $a - $b;
            break;
            case 'x':
            $result = $a * $b;
            break;
            case '/':
            $result = $a / $b;
            break;
        }

        return view('calculator',[
            'result' => $result,
            'cal' => $cal,
            'a' => $a,
            'b' => $b
        ]);
    }
}
