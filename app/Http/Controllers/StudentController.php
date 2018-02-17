<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\FEPreAcademic;
use App\DSEPreAcademic;
use App\Comment;
use App\StudentApplication;
use App\Faculty;

class StudentController extends Controller
{
    public function home()
    {
        if(session('uid')){
            return view('student.pages.home');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }
    public function personal()
    {
        if(session('uid')){
            $uid = session('uid');
            $students = Student::find($uid);
            //The UID is to be changed when Auth is implemented
            return view('student.pages.personal')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function preAcademics()
    {
        if(session('uid')){
            $uid = session('uid');
            
            $students = Student::find($uid);
            
            if($students->TypeOfAdmission==0){
                $preAcademics = FEPreAcademic::find($uid);
                return view('student.pages.pre-academic')->with('preAcademics',$preAcademics);
            }
            else{
                $dsePreAcademics = DSEPreAcademic::find($uid);
                return view('student.pages.dseacademic')->with('dsePreAcademics',$dsePreAcademics);
            }
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
        
    }
    public function currentAcademics()
    {
        if(session('uid')){
            return view('student.pages.current-academic');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function achievements()
    {
        if(session('uid')){
            return view('student.pages.achievements');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function attendance()
    {
        if(session('uid')){
            return view('student.pages.attendance');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function responsibilities()
    {
        if(session('uid')){
            return view('student.pages.responsibilities');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function mentor()
    {
        if(session('uid')){
            return view('student.pages.mentor');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function comments()
    {
        if(session('uid')){
            $uid = session('uid');
            $comments = Student::find($uid)->comments;
            $faculties = array();
            foreach($comments as $comment){
                $faculty = Faculty::find($comment->e_id);
                array_push($faculties,$faculty);
            }
            return view('student.pages.comments')->with('comments',$comments)->with('faculties',$faculties);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function applyLC()
    {
        if(session('uid')){
            $students = Student::where('UID','=',session('uid'))->get()->first();
            return view('student.pages.apply-lc')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function applyClearance()
    {
        if(session('uid')){
            $students = Student::where('UID','=',session('uid'))->get()->first();
            return view('student.pages.apply-clearance')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function applyBonafide()
    {
        if(session('uid')){
            return view('student.pages.apply-bonafide');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function applyRailway()
    {
        if(session('uid')){
            return view('student.pages.apply-railway');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
    public function applyTranscript()
    {
        if(session('uid')){
            $students = Student::where('uid','=',session('uid'))->get()->first();
            return view('student.pages.apply-transcript')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }
     
    public function dseStudent()
    {
        if(session('uid')){
            $students = Student::where('uid','=',session('uid'))->get()->first();
            return view('student.pages.pre-academic')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }

    public function report()
    {
        if(session('uid')){
            $students = Student::where('uid','=',session('uid'))->get()->first();
            return view('student.pages.report')->with('students',$students);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
        
    }

    public function reportGenerate(){
        if(session('uid')){
            return view('student.pages.table');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

}
