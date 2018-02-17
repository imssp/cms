<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the Closure to execute when that URI is requested.

|

*/


/**
 * Group Route to redirect all the routes with prefix faculty
 */


Route::group(['prefix'=>'staff', 'middleware' => 'admin'], function() {

    Route::get('/home', 'FacultyController@index');
    Route::get('/profile', 'FacultyController@profile');

    //API for getting subject report
    Route::get('/getSubjectReport', 'AttendanceFeedController@getSubjectReport');
    
    Route::get('/attendance/faculty', 'FacultyController@facultyattendance');
    Route::post('/attendance/student/addattendancerecord', 'FacultyController@addingstudentattendance'); 
    Route::post('/attendance/student/getStudentRecord', 'FacultyController@getStudentRecord'); 

    Route::get('/attendance', 'FacultyController@attendance');
    Route::get('/roles', 'FacultyController@roles');
    Route::get('/courses', 'FacultyController@courses');
    Route::get('search/', 'FacultyController@searchStudent');
    Route::get('remarks/', 'CommentController@index');
    Route::get('/uploadImage', 'FacultyController@uploadImage');
    Route::post('/image', 'UploadController@image');
    // Route::get('/syllabus', 'FacultyController@syllabus'); 
    Route::get('/report', 'FacultyController@report'); //Generate report RID 1,2,3,4,5,6
    Route::get('/generate_report', 'FacultyController@generate_report');
    Route::post('/StudentAttendance/date','StudentAttendanceController@date');
    Route::post('/StudentAttendance/operation','StudentAttendanceController@control');

    Route::post('/StudentAttendance/rollcheck','StudentAttendanceController@showParticularStudent');
    Route::post('/StudentAttendance/updateParticularStudentAttendance','StudentAttendanceController@updateParticularStudentAttendance');
    
    Route::post('/StudentAttendance/addnew','StudentAttendanceController@addnew');
    Route::post('/StudentAttendance/retrieveexcel', 'StudentAttendanceController@retrieveexcel');
    Route::post('/StudentAttendance/deleteconfirm', 'StudentAttendanceController@deleteControl');
    Route::get('/StudentAttendance/retrieve', 'StudentAttendanceController@retrieve');
    Route::get('/StudentAttendance/delete', 'StudentAttendanceController@delete');
    Route::post('/StudentAttendance/updateconfirm', 'StudentAttendanceController@updateControl');
    Route::get('/StudentAttendance', 'StudentAttendanceController@index');
    Route::post('/StudentAttendance/addconfirm', 'StudentAttendanceController@addnewRecord');
    Route::get('/StudentAttendance/add', 'StudentAttendanceController@add');
    Route::post('/StudentAttendance/update', 'StudentAttendanceController@update');
    Route::post('/StudentAttendance/update/update_date', 'StudentAttendanceController@update_date');
    Route::post('/StudentAttendance/update/update_att', 'StudentAttendanceController@update_att');
    Route::get('/exam/update/student', 'ExamDeptController@show_update_student');
    Route::get('/exam/update/result', 'ExamDeptController@show_update_result');
    Route::get('/exam/update/reval', 'ExamDeptController@show_update_reval');
    Route::resource('/syllabus', 'SyllabusController');
    Route::post('/check', 'SyllabusController@check');
    Route::get('/calcel', 'SyllabusController@cancel');
    Route::get('/toExcel', 'SyllabusController@toExcel');
    Route::get('/editSyllabus', 'SyllabusController@editSyllabus');
    Route::get('/carry', 'SyllabusController@carry');
    Route::put('/uploadPic', 'SyllabusController@uploadPic');
    Route::get('/book','FacultyController@bookevent');
    Route::get('intervention-resizeImage',['as'=>'intervention.getresizeimage','uses'=>'UploadController@getResizeImage']);
    Route::post('intervention-resizeImage',['as'=>'intervention.postresizeimage','uses'=>'UploadController@postResizeImage']);
    Route::get('/branch', 'SyllabusController@branch');   
    Route::get('/sem', 'SyllabusController@sem');
    Route::get('/discard', 'SyllabusController@discard');
    Route::get('/createTerm', 'SyllabusController@createTerm'); 
    Route::get('/report_temp',['as' => 'admin.staff.excel','uses'=> 'FacultyController@excel']);
    Route::get('/report/report_rid_13', 'FacultyController@report_rid_13'); 
    Route::get('/generate_list_with_doj', 'FacultyController@generate_list_with_doj'); 
    Route::get('/update_student', 'ClerkController@update_student');
    Route::get('/update_staff', 'ClerkController@update_staff');
    Route::get('/add_staff','ClerkController@add_staff');
    Route::get('/approve-clearance', 'ClerkController@approve_clearance');    
    Route::get('/approve-bonafide', 'ClerkController@approve_bonafide');
    Route::get('/approve-transcript', 'ClerkController@approve_transcript');    
    Route::get('/approve-lc', 'ClerkController@approve_lc');    


    
    /*** Application Test UI - To be removed before publishing the app ***/
    Route::get('/test/ui/attendance', function(){
        return view('faculty.pages.testuiAttendance');
    });

    Route::get('/principal/report',function(){
        return view('faculty.pages.principal_report');
    });

    Route::get('/hod/report',function(){
        return view('faculty.pages.hod_report');
    });
    /*********************************************************************/
    
    Route::get('/assign_uid', 'ClassTeacherController@assign_uid_to_batches');
    Route::post('/confirm_batch','ClassTeacherController@confirm_batches');
    Route::post('/update_batch','ClassTeacherController@update_batches');
    Route::get('/assign_roll', 'ClassTeacherController@assign_roll'); 
    

    Route::get('/attendance_report', 'ClassTeacherController@generate_attendance_report'); 
    Route::post('/confirm_roll','ClassTeacherController@confirm_roll');
    Route::post('/update_roll','ClassTeacherController@update_roll');
    //Route::get('/studentattendance','FacultyController@getcontacthead');
    
    Route::post('/defaulterList', 'Councellor@defaulter_list'); 
    Route::post('/defaulterlist_report', 'Councellor@defaulterlist_Report'); 

    //Assign staff to subjects
    Route::get('/course/assign','FacultyController@courseassign');
    Route::get('/faculty/match','FacultyController@matchFaculty');
    Route::post('/course/assign/submit','FacultyController@submitCourse');
    Route::post('/drive/link/submit','FacultyController@submitDriveLink');
    
    //For dynamic changes in dropdowns
    Route::get('/exam-branch', 'ExamDeptController@branch');
    Route::get('/exam-sem', 'ExamDeptController@sem');
    Route::get('/exam-division', 'ExamDeptController@division'); 

    //For handling csv
    Route::get('/exam/update/result/download-csv', 'ExamDeptController@download_csv');
    Route::post('/exam/update/result/upload-csv', 'ExamDeptController@upload_csv');

    //For enrolling students
    Route::post('/exam/update/student/enroll', 'ExamDeptController@enrollStudents');
    Route::post('/exam/update/student/addStudent', 'ExamDeptController@addStudent');

    //For removing students
    Route::post('/exam/update/student/remove', 'ExamDeptController@removeStudents');

    //To assign class teachers and counsellor
    Route::get('/assign/CTCC', 'FacultyController@assignCTCC');
    Route::post('/assign/CTCCInsert', 'FacultyController@addCTCC');

    //To generate load sheet
    Route::get('/generate/load', 'FacultyController@loadGeneration');

    //Admin Routes
    Route::get('/admin', 'AdminController@assign');
    Route::post('/admin/faculty', 'AdminController@displayFaculty');
    Route::post('/admin/insert', 'AdminController@insertRole');
    Route::get('/admin/remove', 'AdminController@removeRole');
    
    Route::get('/StudentAttendance/retrieve/excel', 
    [
    'as' => 'admin.student.excel',
    'uses' => 'StudentAttendanceController@excel'
    ]);

});


Route::group(['prefix'=>'student', 'middleware' => 'admin'], function() {

    Route::get('/', 'StudentController@home');
    Route::get('/personal', 'StudentController@personal');
    Route::get('/pre-academic', 'StudentController@preAcademics');
    Route::get('/current-academic', 'StudentController@currentAcademics');
    Route::get('/achievements', 'StudentController@achievements');
    Route::get('/responsibilities', 'StudentController@responsibilities');
    Route::get('/attendance', 'StudentController@attendance');
    Route::get('/mentor', 'StudentController@mentor');
    Route::get('/remarks', 'StudentController@comments');
    Route::get('/apply-lc', 'StudentController@applyLC');
    Route::get('/apply-clearance', 'StudentController@applyClearance');
    Route::get('/apply-railway', 'StudentController@applyRailway');
    Route::get('/apply-bonafide', 'StudentController@applyBonafide');
    Route::get('/apply-transcript', 'StudentController@applyTranscript');
    Route::get('/report', 'StudentController@report');
    Route::get('/current-academic/table/{id}', 'StudentController@reportGenerate')->name('report');

});

Route::group(['prefix' => 'theme'], function(){
    Route::get('/red', 'ThemeController@red');
    Route::get('/blue', 'ThemeController@blue');
});

Route::get('login', 'OauthController@login');
//Route::get('social/redirect/google', 'OauthController@redirectToProvider');
//Route::get('social/handle/google', 'OauthController@handleProviderCallback');
Route::resource('remarks', 'CommentController');
Route::get('/logout', 'SessionController@logout');
Route::get('/', 'SessionController@home');

?>


