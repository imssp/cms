<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentList;
use App\CtCC;
use DB;
use App\StudentAllotment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class ClassTeacherController extends Controller
{
    public function assign_uid_to_batches(){

        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $e_id = session('e_id');
                    $datas = DB::select('select a.student_allotment_id,a.UID,a.roll_no,a.batch, s.first_name, s.middle_name, s.last_name from student_allotment as a join student as s join staff_ct_cc_allotment as cca on a.UID = s.UID and cca.term_id=a.term_id and cca.class=a.division WHERE cca.class_teacher_eid= "'.$e_id.'" ORDER BY a.roll_no');
                    $page_data=collect($datas);
                    foreach($datas as $d){
                        if($d->roll_no==0){
                            return redirect('/staff/assign_roll')->with('error','Roll Number not assigned properly');
                        }
                    }    
                    $class = DB::select('select cca.class, t.term_id, t.course,t.branch, t.semester from term as t join staff_ct_cc_allotment as cca where cca.class_teacher_eid = "'.$e_id.'"');
                    foreach($class as $Class){
                        $class_name = $Class->class;
                        $class_course = $Class->course;
                        $class_branch = $Class->branch;
                        $class_sem = $Class->semester;

                    }
                    session(['batchdata' => $datas]);
                    return view('faculty.pages.class_teacher.assign_uid',compact('page_data'))->with('class_name',$class_name)->with('class_course',$class_course)->with('class_branch',$class_branch)->with('class_sem',$class_sem);
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    public function confirm_batches(Request $request){

        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $e_id=session('e_id');
                    $data = DB::select('select a.student_allotment_id,a.UID,a.roll_no, s.first_name, s.middle_name, s.last_name from student_allotment as a join student as s join staff_ct_cc_allotment as cca on a.UID = s.UID and cca.term_id=a.term_id and cca.class=a.division WHERE cca.class_teacher_eid="'.$e_id.'" ORDER BY a.roll_no');
                    $batches = array();
                    foreach($data as $d){
                        $batch=$request->input($d->UID);
                        array_push($batches, $batch);
                        //DB::update("update student_allotment set batch='$uid' where UID='$d->UID'");
                    };
                    session(['batches' => $batches]);
                    return view('faculty.pages.class_teacher.confirm_batches')
                            ->with('data',$data)
                            ->with('batches',$batches);
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }

    }

    public function update_batches(Request $request){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $data = session('batchdata');
                    $batches = session('batches');
                    foreach($data as $index => $d){
                        DB::update("update student_allotment set batch='$batches[$index]' where UID='$d->UID'");
                    };
                    $request->session()->forget('batchdata');
                    $request->session()->forget('batches');

                    return redirect('/staff/assign_uid')->with('success','Batches added/updated successfully');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }

    public function assign_roll(Request $request){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $e_id = session('e_id');
                    $data = DB::select('select a.student_allotment_id,a.UID,a.roll_no, s.first_name, s.middle_name, s.last_name from student_allotment as a join student as s join staff_ct_cc_allotment as cca on a.UID = s.UID and cca.term_id=a.term_id and cca.class=a.division WHERE cca.class_teacher_eid="'.$e_id.'" ORDER BY s.last_name, s.first_name, s.middle_name');
                    // return $data;
                    session(['rolldata' => $data]);
                    $page_data = ['page_data'=>$data];
                    // $page_data = ['page_data'=>$Class_details];
                    return view('faculty.pages.class_teacher.assign_roll' , $page_data);
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }

    public function confirm_roll(Request $request){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $data = session('rolldata');
                    $rolls = array();
                    foreach($data as $d){
                        $this->validate($request,[
                            '$d->UID'=>'unique:student_allotment',
                        ]);
                        $roll=$request->input($d->UID);
                        array_push($rolls, $roll);
                        //DB::update("update student_allotment set roll_no='$uid' where UID='$d->UID'");
                    };
                    if(count($rolls)!=count(array_unique($rolls))){
                        return redirect()->back()->with('error','Cannot enter same Roll Number twice!');
                    }
                    session(['rolls' => $rolls]);
                    //return
                    return view('faculty.pages.class_teacher.confirm_roll')
                            ->with('data',$data)
                            ->with('rolls',$rolls);
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }

    }
    public function update_roll(Request $request){

        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 6 || $role == 7){
                    $data = session('rolldata');
                    $rolls = session('rolls');
                    foreach($data as $index => $d){
                        DB::update("update student_allotment set roll_no='$rolls[$index]' where UID='$d->UID'");
                    };
                    $request->session()->forget('rolldata');
                    $request->session()->forget('rolls');

                    return redirect('/staff/assign_uid')->with('success','Roll Numbers added/updated successfully! Now you can assign batches.');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
    
    }
    public function generate_attendance_report(){
        //return view('faculty.pages.class_teacher.gen_attendance_report');
    }

}