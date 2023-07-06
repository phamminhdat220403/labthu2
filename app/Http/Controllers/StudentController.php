<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{ 

    public function view_score(Request $request){
        $student_id =  $request->input('student_id');
        $student = DB::select("SELECT student_name FROM students WHERE student_id = ?", [$student_id]);
        //$student = DB::select("SELECT * FROM students WHERE student_id = ?", [$student_id])->firstOrFail();
        $results = DB::select("SELECT exams.exam_name, results.result_score
            FROM results INNER JOIN exams ON results.result_exam_id = exams.exam_id
            WHERE results.result_student_id = ?", [$student_id]);
        // dd($results);
        //dd($student);
        return view('hocsinh.view_score', compact('student', 'results'));
    }

    public function view_info(){

    }

    public function send_feedbacks(){

    }

    public function send_appeal(Request $request){
        $studentId = $request->input('student_id');
        $examName = $request->input('exam_name');
        $reason = $request->input('reason');

        // Lưu phúc khảo vào cơ sở dữ liệu
        DB::insert("INSERT INTO appeals (appeal_student_id, appeal_exam_id, appeal_reason) VALUES (?, ?, ?)", [$studentId, $examName, $reason]);

        return view('hocsinh.sent_appeal')->with('success', 'Phúc khảo đã được gửi thành công.');
    
    }
}
