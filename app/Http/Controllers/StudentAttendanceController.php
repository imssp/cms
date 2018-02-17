<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceRecord;// attendance_record
use App\SubjectAllotment;// subject_allotment
use App\StudentAllotment;
use App\Student;// student
use App\StudentList;// student_allotment
use App\Course_map;// course_map
use Illuminate\Support\Facades\DB;// for direct queries
use Maatwebsite\Excel\Facades\Excel;// for excel export functionality
use App\Http\Controllers\AttendanceFeedController;//for generating export data

class StudentAttendanceController extends Controller
{
     /******************************************************************************************
     * Index page to display all the courses a teacher teaches in the current semester.
     * It take the user input about which course to Add/Update/View/Delete attendance for.
     *
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function index(){

        $eid=session('e_id'); //session faculty id to be retrieved
        $year=date("y");
        $month=date("m");
        
        /**********************************************************************************************************
        * Import JSON file named CourseConfig.json stored in storage/json folder
        * This file contains all info about courses offered, like branches in a course, semesters in a course etc
        * This file is requuired everywhere in this controller and hence made global
        * Do not delete this code
        * When josn is shifted to public folder, change the path here
        ************************************************************************************************************/
       
        //JSON file containing term span details and course details
        $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
        $json = json_decode(file_get_contents($path), true);  
        
        $courseNames = array();
        if($month > 6){
            //for odd semesters
            $SubAllotment = SubjectAllotment::where('e_id', $eid)->where('term_id', 'like', $year.'%')->get();
            $filtered = $SubAllotment->filter(function ($value) {
                return ($value->term_id % 2 == 1);
            });
            $SubjectAllotment = $filtered;
            //stores the subject list for the teacher in the current semester
            foreach($SubjectAllotment as $subject){        
                $map = Course_map::where('term_id', $subject->term_id)->where('course_code', $subject->course_code)->get()->first();
                //to retrieve the subject name for a specific subject(in a specific semester)
                $courseName = array($subject->term_id,$subject->course_code,$map->course_name);
                array_push($courseNames,$courseName);
            }
            $branch = $json['course'];

            //checking whether roll nos allotted or not
            $roll = array();


            foreach ($SubjectAllotment as $SubjectAllotmen) {
                $division = $SubjectAllotmen->division;
                $contacthead = $SubjectAllotmen->contact_head;
                $termid = $SubjectAllotmen->term_id;
                $ch='0';
                if(strpos($contacthead,'A')==true){
                    $ch='A';
                }
                elseif(strpos($contacthead,'B')==true){
                    $ch = 'B';
                }
                elseif(strpos($contacthead,'C')==true){
                    $ch = 'C';
                }
                elseif(strpos($contacthead,'D')==true){
                    $ch = 'D';
                }
                if($ch=='0'){
                    $rollcheck = DB::select("select sa.roll_no,sa.uid, s.first_name from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$termid' and sa.division='$division' and saa.contact_head='$contacthead' and sa.roll_no is NULL)");
                }
                else{
                    $rollcheck = DB::select("select sa.roll_no,sa.uid, s.first_name from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$termid' and sa.division='$division' and saa.contact_head='$contacthead' and sa.batch='$ch' and sa.roll_no is NULL)");
                }
                $roll[] = $rollcheck;                
            }
            //branch stores the course decoding details
            return view('faculty.StudentAttendance.index')->with('Subject', $SubjectAllotment)->with('Course', $courseNames)->with('Class', $branch)->with('roll', $roll);
        }
        else{
            //for even semesters
            $SubAllotment = SubjectAllotment::where('e_id', $eid)->where('term_id', 'like', $year.'%')->get();
            $filtered = $SubAllotment->filter(function ($value) {
                return ($value->term_id % 2 == 0);
            });
            $SubjectAllotment = $filtered;
            //stores the subject list for the teacher in the current semester
            foreach($SubjectAllotment as $subject){  
                $map = Course_map::where('term_id', $subject->term_id)->where('course_code', $subject->course_code)->get()->first();
                //to retrieve the subject name for a specific subject(in a specific semester)
                $courseName = array($subject->term_id,$subject->course_code,$map->course_name);
                array_push($courseNames,$courseName);
            }
            $branch = $json['course'];

            //checking whether roll nos allotted or not
            
            $roll = array();


            foreach ($SubjectAllotment as $SubjectAllotmen) {
                $division = $SubjectAllotmen->division;
                $contacthead = $SubjectAllotmen->contact_head;
                $termid = $SubjectAllotmen->term_id;
                $ch='0';
                if(strpos($contacthead,'A')==true){
                    $ch='A';
                }
                elseif(strpos($contacthead,'B')==true){
                    $ch = 'B';
                }
                elseif(strpos($contacthead,'C')==true){
                    $ch = 'C';
                }
                elseif(strpos($contacthead,'D')==true){
                    $ch = 'D';
                }
                if($ch=='0'){
                    $rollcheck = DB::select("select sa.roll_no from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$termid' and sa.division='$division' and saa.contact_head='$contacthead' and sa.roll_no is NULL)");
                    
                }
                else{
                    $rollcheck = DB::select("select sa.roll_no from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$termid' and sa.division='$division' and saa.contact_head='$contacthead' and sa.batch='$ch' and sa.roll_no is NULL)");
                }
                $roll[] = $rollcheck;                
            }
            //branch stores the course decoding details
            return view('faculty.StudentAttendance.index')->with('Subject', $SubjectAllotment)->with('Course', $courseNames)->with('Class', $branch)->with('roll', $roll);
        }
          
    }

    /******************************************************************************************
     * Date page to select the for which the action needs to be performed
     * Passes the selected date along with the index page data to the selected view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function date(Request $request){
        //check if students are alloted to selected subject

        $suballotid = $request->SubAllotId;
        $div = $request->Division;
        $term_id = $request->TermID;
        $contacthead = $request->ContactHead ;        
        $contact_head_meeting_index = $request->contact_head_meeting_index  ;

        $ch='0';
        if(strpos($contacthead,'A')==true){
            $ch='A';
        }
        elseif(strpos($contacthead,'B')==true){
            $ch = 'B';
        }
        elseif(strpos($contacthead,'C')==true){
            $ch = 'C';
        }
        elseif(strpos($contacthead,'D')==true){
            $ch = 'D';
        }
        if($ch=='0'){
            $data = DB::select("select distinct sa.roll_no from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$term_id' and sa.division='$div' and saa.contact_head='$contacthead') order by sa.roll_no");
        }
        else{
            $data = DB::select("select distinct sa.roll_no from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$term_id' and sa.division='$div' and saa.contact_head='$contacthead' and sa.batch='$ch') order by sa.roll_no");
        }
        if(count($data)==0)
            return redirect('staff/StudentAttendance')->with('error','Students not yet alloted to selected Subject');
        else{
            //check for odd or even semester
            $month=date("m");
            $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
            $json = json_decode(file_get_contents($path), true);  
            if($month > 6){
                $date = $json['term_span_details'][0];
            }
            else{
                $date = $json['term_span_details'][1];
            }
            return view('faculty.StudentAttendance.date')->with('request', $request)->with('Date', $date);
        }
    }

    /******************************************************************************************
     * Performs the routing action to the specific view through the controller method depending on the selected option
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function control(Request $request){
        if($request->submit =='Add')//when add is clicked
        {
            return $this->add($request);
        }
        else if($request->input('submit')=='Update')//when update is clicked
        {
            return $this->update($request);
        }
        else if($request->input('submit')=='View')//when view is clicked
        {
            return $this->retrieve($request);
        }
        else if($request->input('submit')=='Delete')//when delete is clicked
        {
            return $this->delete($request);
        }
    }

    /******************************************************************************************
     * Checks and routes the user to add view depending on number of meeting indexes
     * The user is routed to an add page if no meeting index exists
     * If a attendance already exists for that date and subject, the user is asked if he wants to add another record
     * The user is also allowed to change the values for the existing record if needed 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function add(Request $request){
        $suballotid = $request->SubAllotId;
        $div = $request->Division;
        $term_id=$request->TermID;
        $contacthead = $request->ContactHead;
        $date = $request->Date;

        $query = AttendanceRecord::where("sub_allotment_id","=",$suballotid)->where("date","=",$date)->orderBy('contact_head_meeting_index', 'desc')->first();
        if(count($query)>0){     
            return view('faculty.StudentAttendance.add')->with('query',$query)->with('request',$request);
        }else{
            return $this->addnew($request);
        }
    }

    /******************************************************************************************
     * This return the actual view that contains the functionality to add a new record to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function addnew(Request $request){
        //below mentioned parameters are used to retrieve a specific class of students of a particular faculty
        $suballotid = $request->SubAllotId;
        $div = $request->Division;
        $term_id = $request->TermID;
        $contacthead = $request->ContactHead ;
        $date = $request->Date;
        if(strpos($contacthead,'A')==true){
            $ch='A';
        }
        elseif(strpos($contacthead,'B')==true){
            $ch = 'B';
        }
        elseif(strpos($contacthead,'C')==true){
            $ch = 'C';
        }
        elseif(strpos($contacthead,'D')==true){
            $ch = 'D';
        }
        else{
            $contact_head_meeting_index = $request->contact_head_meeting_index  ;

            $data = DB::select("select distinct sa.roll_no,sa.uid, s.first_name from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$term_id' and sa.division='$div' and saa.contact_head='$contacthead') order by sa.roll_no");

                       
                return view('faculty.StudentAttendance.addnew',['data' => $data, 'request' => $request]);
            
                
            
        }

        $contact_head_meeting_index = $request->contact_head_meeting_index  ;

        $data = DB::select("select distinct sa.roll_no,sa.uid, s.first_name from student as s inner join student_allotment as sa on s.uid = sa.uid inner join subject_allotment as saa on saa.term_id = sa.term_id and saa.division = sa.division where (sa.term_id='$term_id' and sa.division='$div' and saa.contact_head='$contacthead' and sa.batch='$ch') order by sa.roll_no");

       
            return view('faculty.StudentAttendance.addnew',['data' => $data, 'request' => $request]);
        
    }

    /******************************************************************************************
     * This receives the request from addnew view.
     * It fires the query to the database which adds the attendance for a class, for a subject, for a day, for a meeting index(calculated)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function addnewRecord(Request $request){        
        //chmi stands for contact head meeting index
        $chmi = $request->chmi;
        //here it is incremented if an additional lecture is to be conducted on the same date
        $chmi = (int)$chmi + 1;        
        $UIDs = $request->input('UIDs');
        $attendance_vals = $request->input('attendanceVal');
        $date = $request->Date;        
        $data = array();
        //attendance record is stored in this data[] array
        for($i = 0; $i < count($UIDs); $i++){
            $data[] = [
                'uid' => $UIDs[$i],
                'attendance' => $attendance_vals[$i] ,
                'date' => $date,
                'contact_head_meeting_index' => $chmi,
                'sub_allotment_id' => $request->SubAllotId
            ];
        }
        //attendance record is inserted into database
        AttendanceRecord::insert($data);
        return redirect('staff/StudentAttendance')->with('success','Attendance added successfully');
    }

    /******************************************************************************************
     * Checks and routes the user to update view depending on number of meeting indexes
     * The user is routed to an update page if only one meeting index exists
     * If a attendance already exists for that date and subject, the user is asked which meetng index he wants to update
     * The user is also allowed to change the date for the record he seleted if needed 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function update(Request $request){


        $id = $request->input('SubAllotId');
        $index="1";
        $month=date("m");
        $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
        $json = json_decode(file_get_contents($path), true);  

        // if (input('Roll') != null) {
        //     $this -> updateparticularstudent(); 
        // }

        if($month > 6){
            $d = $json['term_span_details'][0];
        }
        else{
            $d = $json['term_span_details'][1];
        }
        $date = $request->input('Date');
        //$Date = $request->input('Date');
        $credentials = ['SubAllotId' => $id,
                        'TermID' => $index,
                        'ContactHead'=>$request->input('ContactHead'),
                        'Division'=>$request->input('Division'),
                        'Date'=>$request->input('Date')];
        $request->session()->put('credentials', $credentials);
        $data1 = DB::select("select distinct contact_head_meeting_index from student_attendance_record where sub_allotment_id='$id' and date='$date'");
        if(count($data1)==0)
            return redirect('staff/StudentAttendance')->with('error','No Student Attendance record exists for selected date');
        else
        {
            $query = "select distinct sa.roll_no,ar.contact_head_meeting_index,
            ar.uid,ar.attendance,ar.sub_allotment_id,s.first_name from 
            student_attendance_record as ar join student as s join student_allotment as sa on 
            ar.uid=s.uid and sa.uid=s.uid where ar.sub_allotment_id='$id' 
            and ar.date='$date' order by sa.roll_no";
            $data = DB::select($query);
            return view('faculty.StudentAttendance.update')->with('data',$data)->with('date_old',$date)->with('data1',$data1)->with('index',$index)->with('D',$d);  
        }        
    }

    /******************************************************************************************
     * This return the actual view that contains the functionality to update a record of the database.
     * It displays the existing record for the selected details and gives the functionality to change and of the values or change the date for the record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function updateControl(Request $request)
    {
        if(!strcmp($request->input("ans"),"yes"))
        {
            $month=date("m");
            $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
            $json = json_decode(file_get_contents($path), true);  
            if($month > 6){
                $d = $json['term_span_details'][0];
            }
            else{
                $d = $json['term_span_details'][1];
            }

            $r1 = $request->input("index");
            
            $data1="1";
            
            $sess = $request->session()->get('credentials');
            
            $id = $sess['SubAllotId'];
            $date = $sess['Date'];;       
            // $id= "2";
            // $date="2017-07-02";
            //this query retrieves marked attendance data from the database
            $data = DB::select("select distinct sa.roll_no,ar.contact_head_meeting_index,
            ar.uid,ar.attendance,ar.sub_allotment_id,s.first_name from 
            student_attendance_record as ar join student as s join student_allotment as sa on 
            ar.uid=s.uid and sa.uid=s.uid where ar.sub_allotment_id='$id' 
            and ar.date='$date' and ar.contact_head_meeting_index='$r1' order by sa.roll_no");
            $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
            $json = json_decode(file_get_contents($path), true);  
            $date2 = $json['term_span_details'][0];
            if($request->input('u/r')==1)
            {  
                return view('faculty.StudentAttendance.update')->with('data',$data)->with('date_old',$date)->with('data1',$data1)->with('index',$r1)->with('D',$d); 
            }
            else
            {
                //updating date
                return view('faculty.StudentAttendance.retrieve')->with('data',$data)->with('date_old',$date)->with('data1',$data1)->with('index',$r1)->with('Date',$date2)->with('D',$d); 
            }
        }
        //return to main page without updation
        else
            return redirect('staff/StudentAttendance')->with('error','Updation Aborted');
    }    

    /******************************************************************************************
     * This is used to save the selected record at a different date than it was stored.
     * It receives its data from updateControl
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function update_date(Request $request){        
        $new_date = $request->input('date1');
        $old_date = $request->input('date_old');        
        $sub=$request->input('sub');
        $r1=1;
        if($request->input("index")!=NULL)
            $r1 = $request->input("index");
        $cou = DB::select("select distinct contact_head_meeting_index from student_attendance_record where date='$old_date' and sub_allotment_id='$sub' order by contact_head_meeting_index desc"); 
        $cou1 = DB::select("select distinct contact_head_meeting_index from student_attendance_record where date='$new_date' and sub_allotment_id='$sub' order by contact_head_meeting_index desc"); 
        
        if(count($cou1)>0)        
        {
            $m=$cou1[0]->contact_head_meeting_index;
            $m=$m+1;
            $data=DB::update("UPDATE student_attendance_record SET date = '$new_date', contact_head_meeting_index = '$m' WHERE sub_allotment_id = $sub AND date = '$old_date' AND contact_head_meeting_index = $r1");        
            DB::update("UPDATE student_attendance_record SET contact_head_meeting_index = contact_head_meeting_index - 1 where date='$old_date' and sub_allotment_id='$sub' and contact_head_meeting_index > '$r1'");
            //return view('faculty.StudentAttendance.date_change')->with('data',$data)->with('date_old',$old_date);
            return redirect('staff/StudentAttendance')->with('success','Attendance Record updated successfully');
        }
        else
        {
            $data = DB::update("UPDATE student_attendance_record SET date = '$new_date', contact_head_meeting_index = '1' WHERE sub_allotment_id = $sub AND date = '$old_date' AND contact_head_meeting_index = $r1");
            DB::update("UPDATE student_attendance_record SET contact_head_meeting_index = contact_head_meeting_index - 1 where date='$old_date' and sub_allotment_id='$sub' and contact_head_meeting_index > '$r1'");    
            //return view('faculty.StudentAttendance.date_change')->with('data',$data)->with('date_old',$old_date); 
            return redirect('staff/StudentAttendance')->with('success','Attendance Record updated successfully');
        }
        
    }

    /******************************************************************************************
     * This receives the request from updateControl view.
     * It fires the query to the database which modifies the attendance for a class, for a subject, for a day, for a meeting index(calculated)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function update_att(Request $request){
        // $sess = $request->input('UIDs');
        $sess = $request->session()->get('credentials');
        $sub = $sess['SubAllotId'];    
        $old_date = $sess['Date'];
        $contacthead= $request->input("index");
        $request->attendanceVal;
        for($i=0; $i<count($request->UIDs); $i++)
        {
            $u = $request->UIDs[$i];
            $av = $request->attendanceVal[$i];
            //updating attendance not date
            DB::update("UPDATE student_attendance_record SET attendance = '$av' where sub_allotment_id = '$sub' and date = '$old_date' and contact_head_meeting_index = '$contacthead' and uid = '$u'");                   
        }
        return redirect('staff/StudentAttendance')->with('success','Update Successfully');
    }

    /******************************************************************************************
     * This functionality can be accesed from date view n selcting View in the index page.
     * It exports the selected attendance record for a subject between two dates to a excel format.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function retrieveexcel(Request $request)
    {
        $sess = $request->session()->get('credentials');
        $sub = $sess['SubAllotId'];    
        $term = $sess['TermID'];    
        $ch = $sess['ContactHead'];    
        $div = $sess['Division'];
        // $path = storage_path() . "/json/CourseConfig.json"; //path for courseConfig json file in storage folder 
        // $json = json_decode(file_get_contents($path), true);
        // $branch = $json['course'];
        // $count = 0;
        // $SheetName = '';
        // foreach($branch as $class){
        //     if($count == substr($term, -3, 1)){
        //         $SheetName = $class['courseName'].'/'.$class['branches'][substr($term, -2, 1) - 1]['code'].'/'.substr($term, -1, 1).'/'.$div.'/'.$ch;
        //         // return $class['courseName'];

        //     }
        //     $count++;
        // }
        // return $SheetName;			
        $request->session()->flash('id', $request->SubAllotId);	
        $request->session()->flash('s_date', $request->SDate);
        $request->session()->flash('e_date', $request->EDate);
    	// return $query = AttendanceFeedController::getSubjectReport( session('id'), session('s_date'), session('e_date'));
        Excel::create('Class_Name', function($excel){
    		$excel->sheet('Subject_Name', function($sheet){
    			$query = AttendanceFeedController::getSubjectReport( session('id'), session('s_date'), session('e_date'));
    			$sheet->fromArray($query, null, 'A1', true);
    		});
    	})->download('csv');
        return redirect('staff/StudentAttendance')->with('success','Excel download started');
    }

    /******************************************************************************************
     * Checks and routes the user to retrieve view depending on number of meeting indexes
     * The user is routed to an retrieve page if only one meeting index exists
     * If a attendance already exists for that date and subject, the user is asked which meetng index he wants to retrieve
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function retrieve(Request $request){
        $id = $request->input('SubAllotId');
        $index="1";
        $date1 = $request->input('Date');
        $credentials = ['SubAllotId' => $id,
                        'TermID' => $index,
                        'ContactHead'=>$request->input('ContactHead'),
                        'Division'=>$request->input('Division'),
                        'Date'=>$request->input('Date')];
        $request->session()->flash('credentials', $credentials);
        $data1 = DB::select("select distinct contact_head_meeting_index from student_attendance_record where sub_allotment_id='$id' and date='$date1'");
        if(count($data1)==0)
            return redirect('staff/StudentAttendance')->with('error','No Student Attendance record exists for selected date');
        else
        {
            $query = "select distinct sa.roll_no,ar.contact_head_meeting_index,
            ar.uid,ar.attendance,ar.sub_allotment_id,s.first_name from 
            student_attendance_record as ar join student as s join student_allotment as sa on 
            ar.uid=s.uid and sa.uid=s.uid where ar.sub_allotment_id='$id' 
            and ar.date='$date1' order by sa.roll_no";
            $data = DB::select($query);   
            return view('faculty.StudentAttendance.retrieve')->with('data',$data)->with('date_old',$date1)->with('data1',$data1)->with('index',$index);  
        }
    }

    /******************************************************************************************
     * Checks and routes the user to delete view depending on number of meeting indexes
     * The user is routed to an delete page if only one meeting index exists
     * If more than one attendance already exists for that date and subject, the user is asked which meetng index he wants to update
     * the delete function handles the meeting index of the record having higher meeting index
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function delete(Request $request){
        $id= $request->SubAllotId;
        $date= $request->Date;
        //select which lecture's attendance to delete
        $data = DB::select("select distinct contact_head_meeting_index from student_attendance_record where sub_allotment_id='$id' and date='$date' order by contact_head_meeting_index desc");
        if(count($data)==0)
            return redirect('staff/StudentAttendance')->with('error','No Student Attendance record exists for selected date');
        else
            return view('faculty.StudentAttendance.delete',['data' => $data],['request' => $request]);
    }

    /******************************************************************************************
     * This receives the request from delete view.
     * It fires the query to the database which deletes the attendance record for a class, for a subject, for a day, for a meeting index(calculated)
     * The meeting index of higher value for the same details are also updated.
     * All the higher meeting indexes are moved down by one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function deleteControl(Request $request)
    {
        if(!strcmp($request->input("ans"),"yes")){
            $index="1";
            if($request->input("index")!=NULL){
                $index=$request->input("index");
            }
            $id= $request->SubAllotId;
            $date= $request->date;
            //delete attendance record of a specific lecture
            DB::table('student_attendance_record')->where('sub_allotment_id','=',$id)->where('date','=',$date)->where('contact_head_meeting_index','=',$index)->delete();

            DB::update("UPDATE student_attendance_record SET contact_head_meeting_index = contact_head_meeting_index - 1 where date='$date' and sub_allotment_id='$id' and contact_head_meeting_index > '$index'");

            return redirect('staff/StudentAttendance')->with('success','Attendance Record deleted successfully');
        }
        else
            return redirect('staff/StudentAttendance')->with('error','Deletion Aborted');
    }

    public function showParticularStudent(Request $request){
        // return $request;
        $suballotid = $request->SubAllotId;
        $div = $request->Division;
        $term_id = $request->TermID;
        $contacthead = $request->ContactHead ;
        $rollno = $request->Roll;
        
        $ch = substr($contacthead, 4);
        
        $gg = StudentAllotment::where('roll_no', $rollno)
                ->where('term_id', $term_id)
                ->where('division', $div)
                ->where('batch', $ch)
                ->first();
        //return $gg->uid;
        if (count($gg)!=null) {
            $ggg = AttendanceRecord::where('uid', $gg->uid)->where('sub_allotment_id', $suballotid)->get();
            //return $ggg;
            if(count($ggg)==null){
                return redirect('staff/StudentAttendance')->with('error','Attendance record not found');
            }else{    
                return view('faculty.StudentAttendance.updatestudent')->with("data",$ggg)->with("details",$gg)->with('ch', $contacthead);
            }
        }else{
            return redirect('staff/StudentAttendance')->with('error','Student does not exist');
        }
    }

    public function updateParticularStudentAttendance(Request $request){
        
        // return $request;
        $chmis = $request->chmis;
        $uid = $request->uid;
        $attendanceVal = $request->attendanceVal;
        $date = $request->dates;
        $suballotid = $request->sub_allot_id;

        for ($i=0; $i < sizeof($chmis); $i++) { 
            /*
            When you process a single or just a few records, there is nothing to worry about. But for cases when you read lots of records (e.g. for datagrids, for reports, for batch processing etc.) the plain DB is better approach
            */
            $attendanceUpdate = AttendanceRecord::where('sub_allotment_id', $suballotid)
                    ->where('uid', $uid)
                    ->where('contact_head_meeting_index', $chmis[$i])
                    ->where('date', $date[$i])
                    ->first();

            $attendanceUpdate->attendance = $attendanceVal[$i];
            $attendanceUpdate->save();
            // echo $attendanceUpdate;

            // DB::update("Update student_attendance_record set attendance = '$attendanceVal[$i]' where sub_allotment_id = '$suballotid' and uid = '$uid' and contact_head_meeting_index = '$chmis[$i]' and date = '$date[$i]'");
        }

        return redirect('staff/StudentAttendance')->with('success','Record updated successfully');




        //$query = AttendanceRecord::
        
    }
}
?>