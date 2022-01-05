<?php

namespace App\Http\Controllers\SinhVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SinhVienController extends Controller
{
    public function index(Request $index)
    {
        $studentList = DB::table('sinhvien')->get();
        return view('sinhvien.index')->with([
            'studentList' => $studentList
        ]);
    }
    public function att(Request $view)
    {
        //lọc ra nhưng lớp học hiện tại
        $mydate = new \DateTime();
        $mydate->modify('+7 hours');

        $currentDate = $mydate->format('Y-m-d');

        $farmetime = 0;
        $day = $mydate->format('N'); //1=Thứ 2, 2=Thứ 3, 3=Thứ4...7=Chủ nhật
        //day = 1,3,5 => học thứ 2,4,6 => frametime nhận giá trị 0
        //day = 2,4,6 => học thứ 3,5,7 => frametime nhận giá trị 1
        
        if ($day == 1 || $day == 3 || $day == 5) {
            $farmetime = 0; //2,4,6
        } else if ($day == 7) {
            $farmetime = -1; //chủ nhật
        } else {
            $farmetime = 1; //3,5,7
        }
        $hour = $mydate->format('H');
        $minute = $mydate->format('i');
        $currentTime = $hour + $minute / 60;

        $lichdayToday = DB::table('lichtrinh')
            ->where('startdate', '<=', $currentDate)
            ->where('enddate', '>=', $currentDate)
            ->where('farmetime', $farmetime)
            ->where('starttime', '<=', $currentTime)
            ->where('endtime', '>=', $currentTime)
            ->get();
            // return $currentTime;
            // dd($day);

        return view('sinhvien.att')->with([
            'lichdayToday' => $lichdayToday
        ]);
    }
    public function view(Request $view)
    {
        $lichday = DB::table('lichtrinh')->where('id', $view->id)->get();
        if ($lichday != null && count($lichday) > 0) {
            $lichday = $lichday[0];
        } else {
            return redirect()->route('sinhvien_index');
        }

        $mydate = new \Datetime();
        $mydate->modify('+7 hours');

        $currentDate = $mydate->format('Y-m-d');

        //1 ngày học 1 buổi,điểm danh 1 lần
        $edit = DB::table('diemdanh')
            ->leftJoin('sinhvien', 'sinhvien.id', '=', 'diemdanh.rollno')
            ->where('id_lichday', $view->id)
            ->where('diemdanh.created_at', ">=", $currentDate)
            ->select('diemdanh.*', 'sinhvien.fullname')
            ->get();
        //$edit > 0 => đã điểm danh r -> sửa điểm danh
        $studentList = null;
        if ($edit == null || count($edit) == 0) {
            $studentList = DB::table('sinhvien')
                ->where('class_name', $lichday->class_name)
                ->get();
        }
        return view('sinhvien.view')->with([
            'lichday' => $lichday,
            'studentList' => $studentList,
            'edit' => $edit
        ]);
    }

    public function post(Request $request)
    {
        $mydate = new \Datetime();
        $mydate->modify('+7 hours');

        $id_lichday = $request->id_lichday;
        $data = json_decode($request->data, true);
        $currentTime = $mydate->format('Y-m-d H:i:s');
        $currentDate = $mydate->format('Y-m-d');

        //check dữ liệu điểm danh đã tồn tại hay chưa
        $edit = DB::table('diemdanh')
            ->leftJoin('sinhvien', 'sinhvien.id', '=', 'diemdanh.rollno')
            ->where('id_lichday', $request->id_lichday)
            ->where('diemdanh.created_at', ">=", $currentDate)
            ->select('diemdanh.*', 'sinhvien.fullname')
            ->get();
        if ($edit != null && count($edit) > 0) {
            //update
            foreach ($data as $item) {
                DB::table('diemdanh')
                    ->where('id_lichday', $request->id_lichday)
                    ->where('created_at', ">=", $currentDate)
                    ->where('id', $item['id'])
                    ->update([
                        'status' => $item['status'],
                        'note' => $item['note'],
                        'updated_at' => $currentTime
                    ]);
            }
            // return redirect()->route('sinhvien_index');
        } else {
            //them moi
            foreach ($data as $item) {
                DB::table('diemdanh')->insert([
                    'id_lichday' => $id_lichday,
                    'rollno' => $item['id'],
                    'status' => $item['status'],
                    'note' => $item['note'],
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime
                ]);
            }
        }
    }
}
