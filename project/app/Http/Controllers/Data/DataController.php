<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function showHello(Request $request)
    {
        $msg = 'Nguyen Quang Truong';

        return view('data.helloworld')->with([
            'msg' => $msg
        ]);
    }

    public function tinhGiaithua(Request $request, $n)
    {
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return view('data.helloworld')->with([
            'result' => $result
        ]);
    }

    public function showStudent(Request $request)
    {
        $studentList = DB::table('student')->get();
        return view('route.student-list')->with([
            'studentList' => $studentList
        ]);
    }

    public function viewInputUser(Request $request)
    {
        $title = "Thêm sinh viên";
        $id = 0;
        $fullname = $address = $email = '';
        if (isset($request->id) && $request->id > 0) {
            $student = DB::table('student')->where('id', $request->id)->get();
            if ($student != null && count($student) > 0) {
                $fullname = $student[0]->fullname;
                $email = $student[0]->email;
                $address = $student[0]->address;
            }
            return view('data.helloworld')->with([
                'title' => $title,
                'id' => $request->id,
                'fullname' => $fullname,
                'address' => $address,
                'email' => $email
            ]);
        } else {
            return view('data.helloworld');
        }
    }

    public function doGetUser(Request $request)
    {
        $fullname = $request->fullname;
        $email = $request->email;
        $address = $request->address;
        // return view('data.show')->with([
        //     'fullname' => $fullname,
        //     'email' => $email,
        //     'address' => $address
        // ]);
        return redirect()->route('viewinputuser');
    }

    public function doPostUser(Request $request)
    {
        $id = $request->id;
        $fullname = $request->fullname;
        $email = $request->email;
        $address = $request->address;
        if ($id > 0) {
            //update
            DB::table('student')->where('id', $id)->update([
                'fullname' => $fullname,
                'email' => $email,
                'address' => $address
            ]);
        } else {
            //add
            DB::table('student')->insert([
                'fullname' => $fullname,
                'email' => $email,
                'address' => $address
            ]);
        }
        // return view('data.show')->with([
        //     'fullname' => $fullname,
        //     'email' => $email,
        //     'address' => $address
        // ]);
        return redirect()->route('showstudent');
    }
    public function deleteUser(Request $request)
    {
        DB::table('student')->where('id', $request->id)->delete();
    }
}
