<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Student;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('e_id')){
            $e_id = session('e_id');
            $myComments = Comment::where('e_id','=',$e_id)->get();
            $students = array();

            foreach($myComments as $comment){
                $student = Student::find($comment->uid);
                array_push($students, $student);
            }

            // return $students;

            return view('faculty.pages.viewComments')
                ->with('comments',$myComments)
                ->with('students', $students);
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(session('e_id')){
            $e_id = session('e_id');
            $this -> validate($request, [
                'comment' =>'required'
            ]);
            $comment = new Comment();
            $comment->e_id = $e_id;
            $comment->uid = $request->UID;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect('staff/remarks')->with('success','Remark added successfully');
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('success', 'Remark Deleted Successfully');
    }
}
