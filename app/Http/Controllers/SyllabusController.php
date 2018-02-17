<?php


/*******************************************************************************************
 *This file inlcudes
 **Database connectivity (exam_head_schemea table and course_map table)
 **JSON parsing
 **term_id calculation
 **ajax routing methods
 *******************************************************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; //Used to access JSON files
use Illuminate\Support\Facades\DB; 
use Maatwebsite\Excel\Facades\Excel;// for excel export functionality
use App\Exam_head_schema;   //import exam_head_scheme model
use App\Course_map; //import course_map model
use App\Term;   //import term table
use Storage;    
use Session;    //for session class

class SyllabusController extends Controller
{ 
    //counter used to update exam_head_code
    //For every term this needs to be reset 0
    private $counter;

    //Display Page where year, course, branch and semester are taken as input
    //Starting Point of update syllabus schema
    public function index()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    $path = URL::to('json/CourseConfig.json');   //path courseConfig json file in storage folder
                    $json = json_decode(file_get_contents($path), true);    //JSON decoding

                    //return index view with json object 
                    //This JSON has values needed for ajax calls
                    return view('faculty.syllabus.index')->with('json', $json);   
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }




    /******************************************************************************************
     * Show the form for creating a new resource.
     * Returns the Create Syllabus Page
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function create()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    // return used interface where inputs will be provided
                    return view('faculty.syllabus.create'); //Return craete page which has no dependency
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }
    


    /*******************************************************************************************
     * Store a newly created resource in storage.
     * This method accesses the database, writes and reads values from database
     * This is where all the data about syllabus is transferred to databse
     * This simultaneously makes entries into Term table, Exam Head Schema Tabel Exam Course Map table
     * There are different methods to insert data
     * This method acts as the caller to those methods
     * Create page redirects to here
     * It comes with all the data about one subject for a term
     * Exam head discription is hardcoded here
     ** 0 -> End Sem Exam (ESE)
     ** 1 -> Internal Test 1 (IA1)
     ** 2 -> Internal Test 2 (IA2)
     ** 3 -> Term work (TW)
     ** 4 -> Practicals (PR)
     ** 5 -> Orals (OR)
     ** 45 -> Practical and Oral (PROR)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public function store(Request $request)
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){

                    //validate the input provided by create page before storing it
                    //Server side validation for syllabus data
                    $this->validate($request,[
                        "course_code" => 'required',
                        "course_name" => 'required',
                        "Total" => 'required'
                    ]);

                    //Initially when the user creates a term the data is stored in the session called term
                    //This holds all important data about the term which are used here while updating databse
                    //Variable data holds the array which is stored in session term
                    //It has multiple data items

                    $data = ['term'=>\Session::get('term')];

                    /*
                    * Internal test 
                    * In a sem there are 2 IA, so 2 rows must be inserted into exam_head_scheme table
                    * So we are making 2 calls here for Intenrnal test
                    * Only change is Exam head code
                    * All other data is same for both IA
                    */


                    if ($request->IA == 'on')   //check if internal assesment checkbox is checked
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }
                        
                        //data array for internal assesment 1
                        //This array contains all information which are to be inserted into database for IA1
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code for IA1
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 1,    //code for IA1 This is a hardcoded value, For IA1 the code is 1
                            'max_marks' => $request->input('IA_max'),           //Max marks for IA1
                            'pass_marks' => $request->input('IA_pass')          //Passing Marks for IA1 
                        );

                        //Call addSchema method with above data for IA1
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                        
                        //data array for internal assesment 2
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code 
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 2,    //code for IA2
                            'max_marks' => $request->input('IA_max'),           //Max marks
                            'pass_marks' => $request->input('IA_pass')          //Passing Marks 
                        );

                        //Call addSchema method with above data for IA2
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }

                    if ($request->ESE == 'on')  //check if End SEM exam checkbox is checked
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }

                        //data array for ESE    
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code 
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 0,    //code for ESE
                            'max_marks' => $request->input('ESE_max'),          //Max marks 
                            'pass_marks' => $request->input('ESE_pass')         //Passing Marks 
                        );

                        //Call addSchema method with above data for ESE
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }

                    if ($request->TW == 'on') //if term work checkbox is  clicked
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }

                        //data array for TW
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 3,    //code for TW_max
                            'max_marks' => $request->input('TW_max'),           //Max marks 
                            'pass_marks' => $request->input('TW_pass')          //Passing Marks 
                        );

                        //Call addSchema method with above data in input variable
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }
                    
                    //if practical checkbox is  clicked and Practical+Oral checkbox is not clicked
                    if ($request->PR == 'on' && $request->PROR != 'on') 
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }

                        //data array for PR
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 4,    //code for Practicals
                            'max_marks' => $request->input('PR_max'),           //Max marks 
                            'pass_marks' => $request->input('PR_pass')          //Passing Marks 
                        );

                        //Call addSchema method with above data in input variable
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }   

                    //if orals checkbox is  clicked and Practical+Oral checkbox is not clicked
                    if ($request->OR == 'on' && $request->PROR != 'on') 
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }

                        //data array for Orals
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 5,    //code for orals
                            'max_marks' => $request->input('OR_max'),           //Max marks 
                            'pass_marks' => $request->input('OR_pass')          //Passing Marks 
                        );

                        //Call addSchema method with above data in input variable
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }


                    /***************************************************************************
                    * Practical And Oral Together
                    * In this case there is no 2 different heads called practical and oral
                    * This exam head will be stored as code 45
                    ****************************************************************************/
                    if ($request->PROR == 'on') //if Practical + Orals checkbox is  clicked
                    {
                        if(session('term_count') == 0)  //check if term is created
                        {
                            //If term is not already created, Create a new term
                            //addTerm method creats a term
                            $var = $this->addTerm();
                        }

                        //data array for practical and orals
                        $input = array(
                            'course_code' => $request->input('course_code'),    //Courtse Code
                            'course_name' => $request->input('course_name'),    //Course Name
                            'desc' => 45,
                            'max_marks' => $request->input('PROR_max'),         //Max marks 
                            'pass_marks' => $request->input('PROR_pass')        //Passing Marks 
                        );

                        //Call addSchema method with above data in input variable
                        //It will insert these data into Exam Schema Head table 
                        $var = $this->addSchema($input);
                    }

                    /*****************************************************************************
                    * Hours of theory, practical tutoarials and their respective batches are stored in a database table called exam_course_map
                    * These values are also input from the same UI 
                    ******************************************************************************/
                    $courseMap = new Course_map;   //model object
                    $courseMap->term_id = session('term_id');  //term id
                    $courseMap->schema_name = $data['term']['scheme'];
                    $courseMap->course_code = $request->input('course_code');  //course code
                    $courseMap->course_name = $request->input('course_name');  //course name
                    
                    if($request->THTT == 'on')    //If theory hours checkbox is on    
                    {
                        if(session('term_count') == 0)
                        {
                            $var = $this->addTerm();
                        }

                        $courseMap->th_hrs = $request->input('THT');
                    }

                    /***********************************************************************
                    * if practical hours checkbox is on
                    * input practical hours
                    * fetch number of divisions in the given term from JSON
                    * input number of batches according to the divisions in the term
                    *********************************************************************/
                    if($request->PH == 'on')
                    {
                        if(session('term_count') == 0)
                        {
                            $var = $this->addTerm();
                        }

                        $courseMap->pr_hrs = $request->input('PHT');

                        /********************************************************
                        * if there is only one division data can be strored directly without appending commas
                        * if there are more than one divisons batches for all the data will be stored in the database as CSV field
                        * While retrieving this string will be impoded in laravel 
                        * i.e. array[0] is batches divison A etc
                        ********************************************************/
                        
                        $string = $request->input('PDB0');  //for first divisons
                        
                        for ($i=1; $i < session('div') ; $i++)  //if there are more than ine divisons
                        { 
                            //In the view, divison input fields are crated according to the divisons specified for that term in the JSON file
                            
                            $col = "PDB".$i.""; //String to retrieve data form for looped input elements
                            $w =  $request->input($col);    //store the data input into variable w
                            
                            //append previous data stored in string with data in variable w and append comma as well
                            //This will give comma seperated values which can be stored in databse
                            $string = $string.",".$w;   
                        }

                        $courseMap->pr_batches = $string;  //store the final CSV data into Model object
                    }  

                    /***********************************************************************
                    * if tutorial hours checkbox is on
                    * input tutorial hours
                    * fetch number of divisions in the given term from JSON
                    *********************************************************************/        
                    
                    //TR is the name of checkbox where user will specify if this subject has tutorial or not
                    if($request->TR == 'on')  
                    {
                        if(session('term_count') == 0)
                        {
                            $var = $this->addTerm();
                        }
                        
                        $courseMap->tut_hrs = $request->input('TRH');      //TRH element gives Tutorial hours
                        $string = $request->input('TDB0');   //for first divisons   
                        for ($i=1; $i < session('div') ; $i++)      //if there are more than ine divisons
                        { 
                            $col = "TDB".$i."";     //String to retrieve data form for looped input elements
                            $w =  $request->input($col);        //store the data input into variable $w
                            
                            $string = $string.",".$w;
                        }

                        $courseMap->tut_batches = $string;//store the final CSV data into Model object
                    }  

                    if(session('term_count') == 0)
                    {
                        $var = $this->addTerm();
                    }

                    $courseMap->save();        //store this in database (i.e. exam_course map)

                    //If there was some error while savign
                    if(! $courseMap->save())
                    {
                        return \Redirect::back()->with('error',"There was some problem with Course Map Section, Please refill the data");
                    }

                    /*******************************************************************************************
                    * if user wants to continue 'click on save and enter next subject' button
                    * this will take user to create page with empty fields with an opportunity to fill new
                    * subject schema
                    * if user wants to finish editing
                    * click save and fiish' button
                    * This will redirect user to term selector page (i.e. index page) 
                    * this will give user an opportunity to select new term or select other functionality
                    * and destroy the variables used or reset them
                    *
                    *
                    * Value of the submit button is set accordingly
                    * String is compared here
                    ******************************************************************************************/
                    if($request->input('submit')=='Save And Enter Next Subject')
                    {
                        //To display message
                        //there is special CSS written for displyaing messagae, always follow this
                        $request->session()->flash('inserted', 'Data Inserted Successfully');   
                        return view('faculty.syllabus.create');     //return back to create page for more data
                    }
                    else if($request->input('submit')=='Save And Finish')
                    {
                        //This specifies the we are done putting subjects for this term
                        //unset used sessions
                        session(['div' => NULL]);//forget session('div') as term_id will be refreshed after this
                        session(['count' => 1]); //forget this count as term_id will be changed after this
                        
                        //get json file
                        $path_course_config = URL::to('json/CourseConfig.json');
                        $json = json_decode(file_get_contents($path_course_config), true);

                        //return to index page with JSON
                        return view('faculty.syllabus.index')->with('json', $json);     
                    }
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
            
    }

    
    /**
     * Description
     * Store functionc calls this method
     * This method ass the data passed to Exam_head_schmea table
     * This Function is called 4-5 for a single subject
     * 
     * @param type $input array which has all the data to be added to the databse for that exam head
     */
    private function addSchema($input)
    {
        $scheme = new Exam_head_schema;     //model object
        $scheme->term_id = session('term_id');  //term id, stored in the session when the term is created
        $scheme->course_code = $input['course_code'];  //course code
        $scheme->course_name = $input['course_name'];  //course name
        $scheme->exam_head_code = session('count');    //automatically inserting exam_head_code
        $this->counter = session('count') + 1;  //increase exam_head_code by one
        session(['count' => $this->counter]);   //store into session
        $scheme->exam_description = $input['desc']; //code for exam head
        $scheme->max_marks = $input['max_marks']; //Maximum marks obtainable in this exam head
        $scheme->min_marks = $input['pass_marks']; //Minimum marks that must be obtained to clear this exam head
        
        $scheme->save();    //store these data into database

        /**************************************************************************
        * Check if the query is executed 
        * if not executed return back to same page with apt message for user
        * ask user to fill the data again, properly
        **************************************************************************/
        if(! $scheme->save())
        {
            return \Redirect::back()->with('error',"There was some problem Exam Head Schema, Please refill the data");
        }
        else
            return 1;
    }


    /**
     * Description
     * This method adds the new term
     * this is called by store method if the term is not aready created by while entering syllabus details
     */
    private function addTerm()
    {
        $data = ['term'=>\Session::get('term')];    //has term details
        //check for the same term in the databse
        $termTable = Term::where('term_id', $data['term']['id'] )->get();   
        
        //If term doesn't exists add new                     
        if($termTable->first() == null)     //if null it means there is no entry for above query
        {   
            $term = new Term;    //model object
            $term->term_id = $data['term']['id'];  //term id
            //academic year is in the format yy-mm-dd and we just need yy
            $term->academic_year = substr($data['term']['academic_year'], 0,4);  //course code
            $term->course = $data['term']['course'];  //course name
            $term->branch = $data['term']['branch']; //automatically inserting exam_head_code
            $term->semester = $data['term']['semester'];   //Maximum marks obtainable in this exam head
            $term->scheme = $data['term']['scheme'];    //Minimum marks that must be obtained to clear this 

            $term->save();    //add this row to database

            
            if(! $term->save())
            {
                // return 0;
                return \Redirect::back()->with('error',"There was some problem Term, Please refill the data");
            } 
            else
            {
                session(['term_count' => 1]);
                return 1;
            }  
        }
    }

    /**
     * Description
     * Index page redirects to here
     * This is the staring 
     * 
     * @param Request $request 
     * @return type
     */
    public function check(Request $request)
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    /***************************************************************************************
                    * This session variable is used to put exam_head_code in exam_head_schema table
                    * it incremets by 1 for perticular term_id and when term_id is changed, value is set to 1 again
                    * This field can be used to generate a combiation primary key along with term_id
                    *****************************************************************************************/
                    session(['count' => 1]);
                    $this->counter = 1;



                    //path for courseConfig json file in storage folder
                    $path = URL::to('json/CourseConfig.json'); 
                    $json = json_decode(file_get_contents($path), true);
                    
                    //path for exam_head_config json file in storage folder
                    $path_exam_head_config = URL::to('json/ExamHeadConfig.json'); 
                    $json_ehc = json_decode(file_get_contents($path_exam_head_config), true); 


                    //path for schema revision json
                    $path_schema = URL::to('json/schemaChange.json'); 
                    $json_schema = json_decode(file_get_contents($path_schema), true);        
                    

                    /***************************************************************************
                    * For term_id first 2 digits are the last 2 digits of selected year
                    * hence last 2 digits of selected year are stored in $char
                    **************************************************************************/
                    $char = substr($request->year, 2,2);


                    /*****************************************************************************************
                    * $term is a string as it is created by concatination
                    * term is result of appending user inputs
                    * it includes 
                    * $char which implies firsr 2 digits of selected year, it bcomes first 2 digits of term_id
                    * course value input by the user -> 3rd digit of term_id
                    * branch value input by user -> 4th digit of term_id
                    * semester value input -> 5th digit
                    * Append all these digits, you will get term_id
                    *
                    * TEST CASES
                    * term_id for MCA: branch index of MCA is 0 and course index is 3
                    * hence, in term_id after year, course digit is 2 for MCA and branch digit is 3
                    * This value is decided by json file called CourseConfig.json 
                    *****************************************************************************************/
                    $term = $char.$request->course.$request->branch.$request->sem;


                    //convert string to int as we are storing int term_id into database
                    $term_id = (int)$term;

                    //Get branch object of json file called CourseConfig.json
                    $branch = $json['course'][$request->course]['branches'];

                    /**************************************************************************
                    * Get index 
                    * Thi index is used to loop through inside the branch
                    * In each branch we loop through and get number of subject
                    * Final number will be sum of all the shift present in json file
                    *************************************************************************/
                    $i = 0;             //initially 0
                    $index = -1;        //initially index is -1

                    
                    //Get Max index
                    foreach($branch as $div)
                    {
                        if($div['branchindex']==$request->branch)
                        {
                            $request->session()->flash('branch', $div['name']);
                            $index = $i;
                            break;
                        }
                        $i++;
                    }

                    //get shift object from json file
                    $division = $json['course'][$request->course]['branches'][$index]['shift'];
                    $sum = 0; //initially sum of divisons is 0

                    //get number of divisions
                    foreach($division as $div)
                    {
                        $sum+=$div['divisions'];
                    }

                    /*************************************************
                    * Store data for term table in a session
                    * required data
                    ** term_id : available in session('tem_id')
                    **academic_year : date available in request object
                    **course : course present in request object
                    **branch : branch present in request object
                    **year : static for now
                    **semester :  present in request object
                    **scheme : present in json file
                    **************************************************/
                    
                    /*****************************************************
                    * GET SCHEME
                    * Formula : 
                    * n = {[(Input year) - (change year) ] + 1} * 2
                    * Now range is 0 to n
                    * any sem that comes this range has this scheme
                    **********************************************************/

                    $changeScheme = $json_schema['course'][$request->course]['revision'];
                    // return $changeScheme;

                    $changeYear = $changeScheme[0]['startYear'];
                    // return $changeYear;


                    $r_index = 0;
                    foreach ($changeScheme as $key) 
                    {

                        if($key['startYear'] <= $changeYear)
                        {
                            $changeYear = $key['startYear'];
                            break; 
                        }
                        $r_index++;
                    }

                    $date_year = substr($request->year, 0,4);
                    // return (int)$date_year;
                    $n = ((int)$request->year - (int)$changeYear);

                    // return $n;
                    // $scheme = $changeScheme[$r_index-1]['name'];


                    $num = ($n + 1) * 2;

                    if($request->sem <= $num)
                    {
                        $scheme = $changeScheme[$r_index]['name'];            
                    }
                    else
                    {
                        $scheme = $changeScheme[$r_index+1]['name'];
                    }
                    // return $scheme;
                    
                    session('scheme', $scheme);

                    //session term which will be used when we add add new syllabus data
                    \Session::put('term', [ 
                        'id' => $term_id, 
                        'academic_year' => $request->year,
                        'course' => $request->course,
                        'branch' => $request->branch,
                        'year' => "SE",
                        'semester' => $request->sem,
                        'scheme' => $scheme
                    ]);
                    
                    //return ['term'=>\Session::get('term')];


                    /****************************************************************************************
                    * Define few session varibales before conditional routing
                    * session('div') contains number of divisions in  aterm
                    * it is important to forget this session once we are done dealing with that perticular term_id
                    ***********************************************************************************/
                    session(['div' => $sum]);
                    session(['term_id' => $term_id]);
                    session(['json'=> $json]);
                    $request->session()->flash('year', $request->year);   
                    $request->session()->flash('sem', $request->sem);   
                    $request->session()->flash('course', $json['course'][$request->course]['courseName']);


                    /***********************************************************************************
                    * if data available about the geerated term_id in the database
                    * fetch and display it on the index page
                    * user has 2 oprions
                    ** carry that schema forwars( happens 4 out of 5 times, not rare)
                    ** discard the schema (happens 1 out 5, rare)
                    *if data not found user has two options
                    ** create new for this
                    ** load prev year schema
                    ********************************************************************************/
                    
                    //fetch all data with this term_id and convert to ibject
                    $termTable = Term::where('term_id', $term_id)->get(); 


                    if($termTable->first() != null) //query returned some vlaue, data present
                    {   

                        $exam_path = URL::to('json/ExamHeadConfig.json'); 
                        $exam_head = json_decode(file_get_contents($exam_path), true);

                        $schemas = Exam_head_schema::where('term_id', $term_id)->get();
                        $course_map = Course_map::where('term_id', $term_id)->get();
                        

                        if($schemas->first() != null)
                        {
                            $present = true;        //to check if the data is present at cliet side
                            return view('faculty.syllabus.index')
                            // return redirect()->back() 
                                ->with('json', $json)
                                ->with('exam_head', $exam_head['exam_head'])
                                ->with('term_id', $term_id)
                                ->with('present',$present)
                                ->with('course_map', $course_map)
                                ->with('schemas', $schemas);
                        }
                        else
                        {
                            $request->session()->flash('noData', 'Data Not found! Create New');
                            return view('faculty.syllabus.index')
                                ->with('json', $json)
                                ->with('term_id', $term_id);
                        }
                    }
                    else
                    {  
                        // $present = null;
                        $empty = true;
                        $request->session()->flash('noTerm', 'Data Not found! Create New');
                        return view('faculty.syllabus.index')
                            ->with('json', $json)
                            ->with('empty', $empty)
                            ->with('term_id', $term_id);            
                    }
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }

    }


    /**
     * AJAX method for Branch Dropdown
     * 
     * This methods gets the course name through ajax call and returns the branches in that course
     * this is done using CourseConfig.json file
     * 
     * @param Request $request object from the AJAX call 
     * @return Branch Details
     */
    public function branch(Request $request)
    {
        //load CourseCongfig.json
        $path = URL::to('json/CourseConfig.json'); //path for courseConfig json file in storage folder
        $json = json_decode(file_get_contents($path), true); 

        //passed value from AJAX
        $ids = $request->id;

        //get branch array from the json file using the given id
        $branch = $json['course'][$ids]['branches'];
        
        return response()->json($branch);   //return the branch details
    }

    /**
     * AJAX method for Semester Dropdown
     * 
     * This methods gets the branch through ajax call and returns the number of semester in that course+branch
     * this is done using CourseConfig.json file
     * 
     * @param Request $request object from the AJAX call 
     * @return semester numbers
     */
    public function sem(Request $request)
    {
        //load CourseCongfig.json
        $path = URL::to('json/CourseConfig.json'); //path for courseConfig json file in storage folder
        $json = json_decode(file_get_contents($path), true); 
        
        //passed value from AJAX
        $ids = $request->id;

        //get branch array from the json file using the given id
        $numOfSem = $json['course'][$ids];      //get sem data
        
        return response()->json($numOfSem); //returns number of sems
        
    }

    /**
     * This mehtod is used to delete syllabus schema
     * This deletes the entry from Exam head schema and Course map
     * This does not delete the term as it may be in use soemwhere else
     * Do not cascase the delete
     */
    public function discard()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    //Delete the already exsisting data for this term_id in all 3 table
                    Exam_head_Schema::where('term_id', '=', session('term_id'))->delete();
                    Course_map::where('term_id', '=', session('term_id'))->delete();

                    //Once you delete the syllabus details, you are redirected to crete page
                    //here you are prompted to enter new syllabus data
                    //return to createTerm method
                    return $this->createTerm();
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    /**
     * This method is used to reset the term_count before creating a new term
     */
    public function createTerm()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    //Set term_count to 0 
                    //This session is used to put exam_head_code of exam_head_schema table 
                    session(['term_count' => 0]);
                    
                    return view('faculty.syllabus.create');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    /**
     * This method is used to discontinue entering the syllabus details abruptly.
     * It redirects to Home page
     * Makes term_count zero
     */
    public function cancel()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    //Set term_count to 0 
                    //This session is used to put exam_head_code of exam_head_schema table 
                    session(['term_count' => 0]);
                    
                    return view('faculty.pages.home');
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    /**
     * Convert to Excel Sheet
     * This gives a csv file with data about term
     * These data includes, Exam head schema and cource map
     * Automatic Downlaod
     */
    public function toExcel()
    {
        if(session('e_id')){
            foreach(session('roles') as $role){
                if($role == 4){
                    Excel::create('Course', function($excel)    //Excel function
                    {    
                        //Set title for sheet
                        $excel->setTitle('Syllabus');
                        
                        //make a sheet
                        $excel->sheet('Course Map', function($sheet) 
                        {
                            //few sheet attributes, not important
                            $sheet->setAutoSize(false);
                            $sheet->setWidth('D', 165);

                            //data for the sheet
                            //this returns an array
                            $data = Course_map::where('term_id', session('term_id'))->get()->toArray();
                            
                            //create sheet from an array
                            //Here we can use model as well
                            $sheet->fromArray($data, null, 'A1', true);
                            
                            //exam head scheme as data for sheet
                            $head = Exam_head_Schema::where('term_id', session('term_id'))->get()->toArray();
                            
                            //make sheet for this data
                            $sheet->fromArray($head, null, 'A1', true);   
    
                        });
                    
                    })->download('csv');        //this sopecifies the extenstion. it can be xls or xlsx
                }
            }
            return redirect()->back()->with('error','Unauthorised Access');
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

    /**
     * I tried this, it was too deep
     * Good luck implemnentig this
     * Logic is retreive all the data which is related to this term_id and dispaly
     * ask user to modify it and then store it back
     */
    public function editSyllabus()
    {
        return "hello";
    }

    /**
     * Carry Forward
     * Carry the syllabus from one term to another term
     * It carries the syllabus to the exact next year term
     * only year in the tem_id is changed
     * Term can be carried to max one year ahead of current year
     * Example: if current year is 2017, you can carry syllabus to 2018 onlyt, not to 2019
     */
    public function carry()
    {
        //Get the term from the database which is to be duplicated
        $termObject = Term::where('term_id', session('term_id'))->get()->first();
        
        $date = date('Y');  //get current year to compare. This is at server side, so user can't modify this
        if($termObject->academic_year+1 <= $date+1)     //check if the carrying year is legit
        {
            //to check if the data is already entered
            $check = Term::where('term_id', session('term_id')+1000)->get()->first();
            $examSchemaHeadFuture  = Exam_head_Schema::where('term_id', session('term_id')+1000)->get();
            $courseMapFuture = Course_map::where('term_id', session('term_id')+1000)->get();

            //check if the data is already entered
            if($check != NULL && ($examSchemaHeadFuture != NULL || $courseMapFuture != NULL))
            {
                //data is already present
                session()->flash('dataExists', 'Data Exists For This Term, Delete That Data And Try Again');
                return view('faculty.syllabus.index')
                        ->with('json', session('json'))
                        ->with('term_id', session('term_id'));
            }

            //This means data is not present and can be inserted
            if($check==NULL)
            {
                // Create the term first

                $term = new Term;    //model object
                $term->term_id = session('term_id')+1000; //term id
                $term->academic_year = $termObject->academic_year+1;    //increase the academic yaer by one  
                $term->course = $termObject->course;    //course name
                $term->branch = $termObject->branch;    //branch
                $term->semester = $termObject->semester;    //semester
                $term->scheme = $termObject->scheme;    //scheme

                $term->save();    //add this row to database
            }

            //Data to be carried forward
            $result  = Exam_head_Schema::where('term_id', session('term_id'))->get();
            $courseObject = Course_map::where('term_id', session('term_id'))->get();

            //Loop for Exam head schema table
            foreach ($result as $object) {
                $scheme = new Exam_head_schema;     //model object
                $scheme->term_id = session('term_id')+1000;  //term id
                $scheme->course_code = $object->course_code;  //course code
                $scheme->course_name = $object->course_name;  //course name
                $scheme->exam_head_code = $object->exam_head_code;    //automatically inserting exam_head_code
                $scheme->exam_description = $object->exam_description; //code for exam head
                $scheme->max_marks = $object->max_marks; //Maximum marks obtainable in this exam head
                $scheme->min_marks = $object->min_marks;    //Minimum marks that must be obtained to clear this exam head
                
                $scheme->save();    //store these data into database
                if(! $scheme->save())
                {
                    return \Redirect::back()->with('error',"There was some problem Term, Please refill the data");
                } 
            }

            //Loop for couse map
            foreach ($courseObject as $value) {
                $courseMap = new Course_map;   //model object
                $courseMap->term_id = session('term_id')+1000;  //term id
                $courseMap->schema_name = $value->schema_name;
                $courseMap->course_code = $value->course_code;  //course code
                $courseMap->course_name = $value->course_name;  //course name
                $courseMap->th_hrs = $value->th_hrs;
                $courseMap->pr_hrs = $value->pr_hrs;
                $courseMap->pr_batches = $value->pr_batches;
                $courseMap->tut_hrs = $value->tut_hrs;
                $courseMap->tut_batches = $value->tut_batches;

                $courseMap->save();
                // echo "done";
                if(! $courseMap->save())
                {
                    // return 0;
                    return \Redirect::back()->with('error',"There was some problem Term, Please refill the data");
                } 
            }

            //return back to index page
            //CourseConfig.json
            $path = URL::to('json/CourseConfig.json'); //path courseConfig json file in storage folder
            $json = json_decode(file_get_contents($path), true);
            session()->flash('dataAdded', 'Data Carried Forward Successfully');
            return view('faculty.syllabus.index')
                    ->with('json', $json);
        }
        else
        {
            //Not a valid year to carry forward data
            session()->flash('futureRequest', 'Too Soon...Entry Not Allowed');
            return view('faculty.syllabus.index')
                    ->with('json', session('json'))
                    ->with('term_id', session('term_id'));   
        }
    }
}
?>