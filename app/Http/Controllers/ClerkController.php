<?php

namespace App\Http\Controllers;

use DB;
// use App\Http\Controllers\Application;
use Illuminate\Http\Request;
use App\Application;
class ClerkController extends Controller
{
    //
    public function update_student(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 304){
                    return view('faculty.pages.updatestudent');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
    }

    public function update_staff(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 304){
                    return view('faculty.pages.updatestaff');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
    }

    public function approve_bonafide(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 305){
                    return view('faculty.pages.approve_bonafide');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
    }
    
    public function approve_transcript(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 305){
                    return view('faculty.pages.approve_transcript');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
    }

    public function approve_lc(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 305){
                    return view('faculty.pages.approve_lc');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
    }
    
    public function approve_clearance(){
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 305){
                    // $details = Application::all();
                    //     $data = ['page_data'=>$details];
                    // return view('faculty.pages.approve_clearance',$data);
                    // $data = DB::table('application')
                    // ->join('student', function ($join) {
                    //     $join->on('application.UID', '=', 'student.UID')
                    //          ->where('application.AppType', '=', 'clearance')
                    //          ->get();
                    $data = DB::select('select a.UID, s.FirstName, s.MiddleName, s.LastName from application as a join student as s on a.UID = s.UID where a.AppType = "clearance"');
                    $page_data = ['page_data'=>$data];
                
                    return view('faculty.pages.approve_clearance',$page_data);
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else if(session('uid')){
            return view('student.pages.home');
        }
        
    }
}
