<?php

/*******************************************************************************************
 *This file includes
 **All operations related to Exam Department
 **Database connectivity (student  table and term_id table)
 **JSON parsing
 **term_id calculation
 **ajax routing methods
 *******************************************************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentList;
use App\Student;
use App\Term;
use App\ExamHeadSchema;
use Storage;
use App\Marks;
use Illuminate\Support\Facades\URL;

//Display Page where year, course, branch and semester are taken as input
//Starting Point of Student Enrollment

class ExamDeptController extends Controller
{
    public function show_update_student(Request $request)
    {
        
        if(session('e_id'))
        {
            foreach(session('roles') as $role)
            {
                if($role == 303)
                {
                    if(isset($request->course)) //check whether user has entered any input  
                    {
                        //Term id Calculations
                        $char = substr($request->year, 2,2);
                        $term = "".$char."".$request->course."".$request->branch."".$request->sem;
                        $term_id = (int)$term;
                        $result = Term::where('term_id','=',$term_id)->get();
                        
                        /*
                            There are 2 arrays
                            student_list holds the list of students according to previous term
                            student_list2 holds the list of students according to current term
                        */
                        if(count($result) == 0) //check whether term Exists or not
                        {
                            return redirect('staff/exam/update/student')->with('error','Term not found');
                        }
                        elseif($request->sem > 1)   //Take the students from the previous term
                        {
                            
                            if($term_id % 2 == 0) //if termid is even then take students from previous term
                                $term_id_old = $term_id-1;
                            else
                                $term_id_old = $term_id-1001;//If term is odd then take students from last years term  
                            $student_list = StudentList::where('term_id','=',($term_id_old))->where("division","=",chr($request->division + 64))->get();
                            $student_data = array();
                            function array_push_assoc($array, $key, $value)//create associative array of student name and id
                            {
                                $array[$key] = $value;
                                return $array;
                            }
                            foreach($student_list as $stud)
                            {
                                $student = Student::where('uid','=',$stud->uid)->first();
                                $student_name = $student->full_name;
                                $student_data = array_push_assoc($student_data, $stud->uid, $student_name);
                            }

                            /* Student Already in Entered Term */
                            
                            $student_list2 = StudentList::where('term_id','=',($term_id))->get();
                            if(count($student_list2)>0)     //If some Students are already added
                            {
                                $student_data2 = array();
                                
                                foreach($student_list2 as $stud2)
                                {
                                    $student2 = Student::where('uid','=',$stud2->uid)->first();
                                    $student_name2 = $student2->full_name;
                                    $student_data2 = array_push_assoc($student_data2, $stud2->uid, $student_name2);
                                }

                                session(['student_data' => $student_data]);

                                return view('faculty.exam.pages.update_student')->with('term_id',$term_id)
                                                                            ->with('term_id_old',$term_id_old)
                                                                            ->with('division',$request->division)
                                                                            ->with('student_list',$student_list)
                                                                            ->with('array',$student_data)
                                                                            ->with('array2',$student_data2);
                            }
                            
                            return view('faculty.exam.pages.update_student')->with('term_id',$term_id)
                                                                            ->with('term_id_old',$term_id_old)
                                                                            ->with('division',$request->division)
                                                                            ->with('student_list',$student_list)
                                                                            ->with('array',$student_data);
                        }
                    }
                    else{
                        return view('faculty.exam.pages.update_student');
                    }
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    public function enrollStudents(Request $request)
    {
        if(session('e_id'))
        {
            foreach(session('roles') as $role)
            {
                if($role == 303)
                {
                    $student_data = session('student_data');
                    $selected =$request->input('selected');              //This array gives array of Selected uid only

                    /*
                        This is the array of students that were not checked in the list
                        These Students may be dropped from the term
                        AS there is no table for dropped students in CMS currently this part of code is commented out
                    */
                    //$unselected = array();
                    // foreach( $student_data as $key => $value) 
                    // {
                    //     if(!empty($selected))
                    //     {
                    //         if(!in_array($key, $selected))
                    //             $unselected[] = $key;       //These data will be inserted into dropped or cancelled tables
                    //     }
                    //     else
                    //         //return 'no student selected';
                    //         return redirect('staff/exam/update/student')->with('error','No student selected');
                        
                    // }

                    //return $unselected;         // This array returns lists of unselected uids only                                 
                    
                    $request->session()->forget('student_data');        // Destroy Session

                    /* Enroll the students into the given term */
                    $result = Term::where('term_id','=',$request->term_id)->get();
                    if(count($result) == 0)
                    {
                        return redirect('staff/exam/update/student')->with('error','Term not found');
                    }
                    
                    if(!empty($selected))//check any student selected or not
                    {
                        for($j=0;$j<sizeof($selected);$j++)
                        {
                            
                            $stud = new StudentList;      //Instance of StudentList model
                            // This is to prevent adding same students to the same term
                            $stud_check = StudentList::where("term_id" , "=" ,$request->term_id)->where("uid","=",$selected[$j])->get();
                            if(count($stud_check)>0)
                            {
                                return redirect('staff/exam/update/student')->with('error','Student cant be added as he/she is already added to same term');
                            }
                            // End

                            // To ensure that same student is not added to diff terms
                            $recieved_sem = substr(strval($request->term_id),4,1);
                            $stud_check2 = StudentList::where("uid","=",$selected[$j])->get();
                            foreach($stud_check2 as $stud)      //list of all terms with same uid and diff terms
                            {
                                $sem = substr(strval($stud->term_id),4,1);
                                if($sem == $recieved_sem)
                                {
                                    return redirect('staff/exam/update/student')->with('error','Student cant be added as he/she is already added to different term');
                                }
                            }
                            // End

                            //Insertion into database 
                            $stud->term_id = (int)$request->term_id;
                            $stud->division = chr($request->division + 64);
                            $stud->UID = $selected[$j];
                            $stud->roll_no = 0;
                            
                            $saved = $stud->save();
                            if(!$saved)//query executed or not
                            {
                                return redirect('staff/exam/update/student')->with('error','Student cant be enrolled due to a technical error');                            
                            }                          
                        }
                        return redirect('staff/exam/update/student')->with('success','Student enrolled');

                    }
                    else
                    {
                        return redirect('staff/exam/update/student')->with('error','No student Selected');                        
                    }
                    
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }
    /*addStudent function is used to enter uid manually 
    *Here AJAX is used

    */
    public function addStudent(Request $request)
    {
        $uid = $request->uid;
        $uid_array = $request->uid_array;
        $term_id = $request->term;
        $name_array = array();
        foreach($uid_array as $uid)
        {
            
            $student = Student::where("uid","=",$uid)->first();
            if($student->count() > 0)       //to check if the UID exists
            {
                // To ensure that same student is not added to diff terms
                $recieved_sem = substr(strval($term_id),4,1);
                $stud_check2 = StudentList::where("uid","=",$uid)->get();
                foreach($stud_check2 as $stud)      //list of all terms with same uid and diff terms
                {
                    $sem = substr(strval($stud->term_id),4,1);
                    if($sem == $recieved_sem)
                    {
                        array_push($name_array,"DontAdd");       //If this matches the ajax if condition in success function, the student wont be added
                        continue 2;     // Jump to outer foreach
                    }
                }
                // End

                
                //To notify that the student is from a different branch
                $stud_branch_check = StudentList::where("uid","=",$uid)->first();
                if(count($stud_branch_check) > 0)
                {
                    $branch = substr(strval($stud_branch_check->term_id),3,1);
                    $recieved_branch = substr(strval($term_id),3,1);
                    if($branch != $recieved_branch)
                    {
                        echo "name";    //Adds 'name' prefix before a name
                    }
                }
                //End

                $name = $student->full_name;
                array_push($name_array,$name);
                
            }
        }
        return $name_array;
    }
    
    //removeStudent function will remove all the previous termid students
    public function removeStudents(Request $request)
    {
        $term = $request->term;
        $remove = StudentList::where("term_id","=",$term)->delete();
        return $term;
    }
    
    public function show_update_result(Request $request)
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 306){
                    //Session::flash($request,"StudentMarks.csv");
                    if(isset($request->course))
                    {
                        //These 3 lines are used to create the term id
                        $char = substr($request->year, 2,2);
                        $term = "".$char."".$request->course."".$request->branch."".$request->sem;
                        $term_id = (int)$term;
                        
                        session(['term_id'=>$term_id]);     //This session is to be forgotten as soon as its job is over
                        
                        return view('faculty.exam.pages.update_result')->with('request',$request);
                    }
                    else
                    {
                        return view('faculty.exam.pages.update_result');
                    }
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else
        {
            return redirect('/')->with('error','Unauthorised Access');
        }
    }
    
    public function download_csv(Request $request)
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 306){
                    $term_id = session('term_id');
                    if(isset($term_id))
                    {
                        
                        // To get all the Exam Head Schemas according to Term ID
                        $exam_head_schema = ExamHeadSchema::where("term_id","=",$term_id)->get();
                        $subject = $exam_head_schema->groupBy('course_name');
                        
                        $lists = array();
                        
                        $csv_course_name = "";
                        $scv_headings = "";
                        // To convert Exam Head Schema Codes into names
                        foreach($exam_head_schema as $exam)
                        {
                            $csv_course_name = $csv_course_name.$exam->course_name.",";
                            switch($exam->exam_description)
                            {
                                case 0:
                                $exam_desc = "ESE";
                                break;

                                case 1:
                                $exam_desc = "IA1";
                                break;

                                case 2:
                                $exam_desc = "IA2";
                                break;

                                case 3:
                                $exam_desc = "TW";
                                break;

                                case 4:
                                $exam_desc = "PR";
                                break;

                                case 5:
                                $exam_desc = "OR";
                                break;

                                case 45:
                                $exam_desc = "Pr/Or";
                                break;
                            }
                            $scv_headings = $scv_headings.$exam_desc.",";
                        }
                        array_push($lists,",,".$csv_course_name);
                        array_push($lists,"UID,Name,".$scv_headings);
                        
                        $students = StudentList::where('term_id','=',$term_id)->get();
                        
                        $uid_array = array();
                        foreach($students as $s)
                        {
                            array_push($uid_array,$s->uid);
                        }
                        
                        $students_array = array();
                        foreach($uid_array as $uid)
                        {
                            $stud = Student::find($uid);
                            array_push($students_array,$stud);
                        }
                        
                        foreach($students_array as $student)
                        {
                            array_push($lists,$student->uid.",".$student->first_name." ".$student->last_name.",");
                        }
                        
                        //The header files should be placed before the output - https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
                        $file = fopen('php://output', 'w'); //To download in the browser
                        
                        foreach ($lists as $line)
                        {
                            fputcsv($file,explode(',',$line));
                        }

                        fclose($file);
                        header("Content-Type: text/csv");
                        header("Content-Disposition: attachment; filename=StudentMarks.csv");
                        session(['term_id'=>$term_id]);
                        //return view('faculty.exam.pages.update_result');
                    }
                    else
                        //return 'request not set';
                        return redirect('staff/exam/update/result')->with('error','Filter the class again');
                }
            }
            //return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
            

    }

    /*
        This function is used when the staff uploads the marksheet of a class
        The file is first stored in a folder, operations are performed and then the file is deleted
        The Exam Head Schema of the uploaded file is compared with actual Exam Head Schema for validating whether the correct file is uploaded
        Difference in Spaces and new lines matter
        Once Validated, the results are uploaded
    */
    public function upload_csv(Request $request)
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 306){
                    if($request->hasFile('file')) 
                    {
                        $file = $request->file('file');
                        $request->file->storeAs('file', 'marks.csv');   //File is stored so it can be read by fopen()
                        
                        //Read csv file
                        $file = fopen("C:/xampp/htdocs/cms/storage/app/file/marks.csv","r");
                        $details = array();
                        while(! feof($file))
                        {
                            $csv = (fgetcsv($file));
                            array_push($details,$csv);  //Conversion of the csv contents into 2d array
                        }
                        fclose($file);
                        unlink("C:/xampp/htdocs/cms/storage/app/file/marks.csv");   //Delete file

                        //Validation whether the relevant file is uploaded       
                        
                        //Creation of arrays
                        
                        //Elements of ExamHeadSchema
                        $term_id = session('term_id');
                        session()->forget('term_id');       //forget session to accompany new one
                        $exam_head_schema = ExamHeadSchema::where("term_id","=",$term_id)->get();
                        $subjects = array();        //array of subjects in a term
                        $syllabus_ids = array();    //array of syllabus ids
                        foreach($exam_head_schema as $exam)
                        {
                            array_push($subjects,$exam->course_name);
                            array_push($syllabus_ids,$exam->syllabus_id);
                        }
                        //return $subjects;
                        
                        //Elements of StudentList
                        $students = StudentList::where('term_id','=',$term_id)->get();
                        //return $students;
                        $uid_array = array();
                        foreach($students as $s)
                        {
                            array_push($uid_array,$s->uid);
                        }
                        
                        
                        // Elements from the csv file
                        // return $details;
                        $uid_list = array();    //Creating array of UIDs
                        for($i=2;$i<sizeof($details)-1;$i++)
                        {
                            array_push($uid_list,$details[$i][0]);
                        }
                        //return sizeof($details[0]) ;
                        $subject_csv = array();     //Creating array of subjects
                        for($i=2;$i<sizeof($details[0]);$i++)
                        {
                            array_push($subject_csv,$details[0][$i]);
                        }


                        //Comparing Uploaded File and Corresponding Exam Schema
                        if(($uid_list == $uid_array)&&($subject_csv === $subjects))     //Correct file uploaded
                        {
                            /*
                                Now the marks of the students will be inserted into 'marks' table
                                syllabus id is a unique key for every Subject's exam(IA1,IA2,ESE)
                                For every UID, there will be sizeof($subjects) syllabus ids
                            */
                            $test = array();
                            
                            //return $details[1];
                            for($i=0;$i<sizeof($uid_list);$i++)
                            {
                                //create an array of marks for a particular UID marks_uid
                                $studs_uid = array();
                                for($j=2;$j<sizeof($details[1]);$j++)
                                {
                                    $marks = new Marks;
                                    $marks->syllabus_id = $syllabus_ids[$j-2];
                                    $marks->uid = $uid_list[$i];
                                    $marks->attempts = 0;
                                    $marks->marks = $details[4][$j];
                                    $marks->save();
                                }
                                //return $test;
                                array_push($test,$studs_uid);
                            }
                            //return 'Insertion Done';
                            return redirect('staff/exam/update/result')->with('success','Marks Inserted');
                        }
                        else
                            //return 'Wrong File Uploaded';
                            return redirect('staff/exam/update/result')->with('error','Wrong file uploaded');
                    }
                    else
                    {
                        //return 'file upload error';
                        return redirect('staff/exam/update/result')->with('error','File Upload Error');
                    }
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else
        {
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    public function show_update_reval()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 303){
                    //Session::flash($request,"StudentMarks.csv");
                    return redirect('staff/exam/update/result');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }
    
    public function branch(Request $request)
    {
        //$path = "C:/xampp/htdocs/cms/public/json/CourseConfig.json";
        $path = URL::to('json/CourseConfig.json');
        $json = json_decode(file_get_contents($path), true); 

        $ids = $request->id;
        $branch = $json['course'][$ids]['branches'];
        
        return response()->json($branch);
    }
    //sem  function is used to update number of sem particular course accoding to user input
    //Number of sems are different for BE , MCA etc
    public function sem(Request $request)
    {
        //$path = "C:/xampp/htdocs/cms/public/json/CourseConfig.json";
        
        $path = URL::to('json/CourseConfig.json');//path courseConfig json file in storage folder
        $json = json_decode(file_get_contents($path), true); //JSON decoding
        //return index view with json object 
        //This JSON has values needed for ajax calls
        $ids = $request->id;
        $numOfSem = $json['course'][$ids];
        
        return response()->json($numOfSem);
    }
    //Every branch has different numbers if divisions
    // Currently IT has only 1 where as COMPS has 3  divisions
    public function division(Request $request)
    {
        //$path = "C:/xampp/htdocs/cms/public/json/CourseConfig.json";
        $path = URL::to('json/CourseConfig.json');
        $json = json_decode(file_get_contents($path), true); 
        $ids = $request->id;
        $course_id = $request->e;
        $numOfSem = $json['course'][$course_id]['branches'][$ids]['shift'];
        
        return response()->json($numOfSem);
    }

}
