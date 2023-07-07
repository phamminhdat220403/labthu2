<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{ 

    public function view_score(Request $request){
        $request->validate([
            'student_id' => 'integer',
        ]);
        $student_id =  $request->input('student_id');
        $student = DB::select("SELECT student_name FROM students WHERE student_id = ?", [$student_id]);
        //$student = DB::select("SELECT * FROM students WHERE student_id = ?", [$student_id])->firstOrFail();
        $results = DB::select("SELECT exams.exam_name, results.result_score
            FROM results INNER JOIN exams ON results.result_exam_id = exams.exam_id
            WHERE results.result_student_id = ?", [$student_id]);
        return view('hocsinh.view_score', compact('student', 'results'));
    }

    public function view_info(Request $request){
        $request->validate([
            'student_id' => 'integer',
        ]);
        $student_id =  $request->input('student_id');
        $student = DB::select("SELECT student_id FROM students WHERE student_id = ?", [$student_id]);
        // if (!$student) {
        //     return view('hocsinh.view_info')->with('error', 'Mã học sinh không hợp lệ: ');
        // }else{
        $info = DB::select("SELECT * FROM students WHERE student_id = ?", [$student_id]);
        return view('hocsinh.view_info', compact('student','info'));
        //}
    }

    public function send_feedbacks(Request $request){
        $request->validate([
            'student_id' => 'integer',
            'content' => 'required',
        ]);

        $student_id = $request->input('student_id');
        $content = $request->input('content');

        // // Kiểm tra xem student_id có hợp lệ trong cơ sở dữ liệu hay không
        // $student = DB::select("SELECT student_id FROM students WHERE student_id = ?", [$studentID]);

        // if (!$student) {
        //     return view('hocsinh.send_feedback')->with('error', 'Mã học sinh không hợp lệ: ' . $studentID);
        // }
        // else{
        // Lưu phản hồi vào cơ sở dữ liệu
        DB::insert("INSERT INTO feedbacks (student_id, content) VALUES (?, ?)", [$student_id, $content]);

        return view('hocsinh.send_feedback')->with('success', 'Phản hồi đã được gửi thành công.');
    }

    public function send_appeal(Request $request){
        $studentId = $request->input('student_id');
        $examId = $request->input('exam_id');
        $reason = $request->input('reason');
        if (empty($studentId) || empty($examId) || empty($reason)) {
            return view('hocsinh.sent_appeal')->with('error', 'Vui lòng điền đầy đủ thông tin.');
        }
        else{
            // Lưu phúc khảo vào cơ sở dữ liệu
            DB::insert("INSERT INTO appeals (appeal_student_id, appeal_exam_id, appeal_reason) VALUES (?, ?, ?)", [$studentId, $examId, $reason]); 
            return view('hocsinh.sent_appeal')->with('success', 'Phúc khảo đã được gửi thành công.');
        }
    }
}
