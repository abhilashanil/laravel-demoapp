<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Studentmarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index() {
        $students = Student::select('students.*')
        ->where('status', 'active')
        ->paginate(10);
        return view('intro', ['students' => $students]);
    }

    public function addstudent() {
        $teacherArray = DB::table('teachers')->where('status', 'active')->get();
        return view('addstudent',compact('teacherArray'));
    }
    
    public function savestudent(Request $request) {
        if ($request->has('submit')) {
            $validator = Validator::make($request->all(), [
            'student_name' => 'bail|required|max:255',
            'age' => 'required',
            'teacher_id' => 'required',
            ]);
            
            if ($validator->fails()) {
                return redirect('addstudent')->withErrors($validator)->withInput();
            }
            
            $student_name = ucwords($request->input('student_name'));
            $age = $request->input('age');
            $teacher_id = $request->input('teacher_id');
            $gender = $request->input('gender');

            $data = array('name'=>$student_name,
            "age"=>$age,
            "teacher_id"=>$teacher_id,
            "gender"=>$gender,
            "status"=>'active'
            );
            
            Student::insert($data);
            return redirect('/')->with('success','Student created successfully.');
        }
        if ($request->has('cancel')) {
            return redirect('/');
        }
    }    

    public function editstudent($id) {
        if ($student = Student::find($id)){
            $teacherArray = DB::table('teachers')->where('status', 'active')->get();
            return view('editstudent',compact('teacherArray', 'student'));
        } else {
            return redirect('/')->with('error','Student not found.');
        }
    }

    public function updatestudent(Request $request, $id) {
        if ($request->has('submit')) {
            if ($stud = Student::find($id))
            {
                $validator = Validator::make($request->all(), [
                    'student_name' => 'bail|required|max:255',
                    'age' => 'required',
                    'teacher_id' => 'required',
                    ]);                
                
                if ($validator->fails()) {
                    return redirect('editstudent/'.$id)->withErrors($validator)->withInput();
                }

                $student_name = ucwords($request->input('student_name'));
                $age = $request->input('age');
                $teacher_id = $request->input('teacher_id');
                $gender = $request->input('gender');
            
                $data = array('name'=>$student_name,
                    "age"=>$age,
                    "teacher_id"=>$teacher_id,
                    "gender"=>$gender,
                    "status"=>'active'
                );
                Student::where('id', $id)->update($data);
                return redirect('/')->with('success','Student updated successfully.');
            } else {
            return redirect('/')->with('error','Student not found.');
            }
        }
        if ($request->has('cancel')) {
            return redirect('/');
        }
    }

    public function deletestudent($id) {
        if ($stud = Student::find($id)) {
            $data = array("status"=>'deleted');
            Student::where('id', $id)->update($data);
            return redirect('/')->with('success','Student removed successfully');
        } else {
            return redirect('/')->with('error','Student not found.');
        }
    }

    public function studentmarks() {
        $studentMarks = Studentmarks::select('studentmarks.*')
        ->where('status', 'active')
        ->paginate(10);
        return view('studentmarks', ['studentMarks' => $studentMarks]);
    }

    public function addstudentmark() {
        $studentArray = DB::table('students')->where('status', 'active')->get();
        return view('addstudentmark',compact('studentArray'));
    }
    
    public function savestudentmark(Request $request) {
        if ($request->has('submit')) {
            $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
            'term' => 'required'
            ]);
            
            if ($validator->fails()) {
                return redirect('addstudentmark')->withErrors($validator)->withInput();
            }
            
            $student_id = $request->input('student_id');
            $maths = $request->input('maths');
            $science = $request->input('science');
            $history = $request->input('history');
            $term = $request->input('term');

            $data = array(
            "student_id"=>$student_id,
            "maths"=>$maths,
            "science"=>$science,
            "history"=>$history,
            "term"=>$term,
            "status"=>'active'
            );
            
            Studentmarks::insert($data);
            return redirect('/')->with('success','Student Marks added successfully.');
        }
        if ($request->has('cancel')) {
            return redirect('/');
        }
    }

    public function editstudentmark($id) {
        if ($studentMark = Studentmarks::find($id)){
            return view('editstudentmark',compact('studentMark'));
        } else {
            return redirect('/')->with('error','Student Marks not found.');
        }
    }

    public function updatestudentmark(Request $request, $id) {
        if ($request->has('submit')) {
            if ($stud = Student::find($id))
            {
                $validator = Validator::make($request->all(), [
                    'maths' => 'required',
                    'science' => 'required',
                    'history' => 'required',
                    'term' => 'required'
                    ]);
                
                if ($validator->fails()) {
                    return redirect('editstudentmark/'.$id)->withErrors($validator)->withInput();
                }

                $maths = $request->input('maths');
                $science = $request->input('science');
                $history = $request->input('history');
                $term = $request->input('term');
            
                $data = array("maths"=>$maths,
                "science"=>$science,
                "history"=>$history,
                "term"=>$term,
                "status"=>'active'
                );
                Studentmarks::where('id', $id)->update($data);
                return redirect('/')->with('success','Student marks updated successfully.');
            } else {
            return redirect('/')->with('error','Student marks not found.');
            }
        }
        if ($request->has('cancel')) {
            return redirect('/');
        }
    }

    public function deletestudentmark($id) {
        if ($studentMarks = Studentmarks::find($id)) {
            $data = array("status"=>'deleted');
            Studentmarks::where('id', $id)->update($data);
            return redirect('/')->with('success','Student marks removed successfully');
        } else {
            return redirect('/')->with('error','Student marks not found.');
        }
    }    
}
