<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;      
use App\Faculty;
use App\Profile_images;
use App\Department;

class UploadController extends Controller {
    public function getResizeImage()
    {
        return view('files.resizeimage');

    }
    
    /**
     * Method used topuload pic 
     * This methods recieves a pic in the form of base64 encoded text
     * it is stored in the database as blob
     * 
     * 
     * @param Request $request which is base64 image 
     */
    public function image(Request $request)
    {
        //to convert into blob, we need to remove the staring chars of base64 text
        // this is important as the base64 passed by the API is not in standard form
        //use preg_replace to replace #^data:image/[^;]+;base64,# thus char by '' (i.e. nothing)
        $img = preg_replace('#^data:image/[^;]+;base64,#', '', $request->url);

        // convert this base64 into blob
        // we need this conversion as our database stores image as blob
        $image = base64_decode($img);

        //Make an object of profile pic model
        $pic = new Profile_images();

        //put the id of uploader
        $pic->id = session('e_id');

        //put the image
        $pic->image = $image;

        //save this to database
        $pic->save();   

        //from here, after uploading, we are returning to profile page
        // for that we need some objects to carry

        //eid of the user
        $e_id =  $request->session()->get('e_id'); 
        
        // faculty object
        $faculty = Faculty::find($e_id);
        
        // deparetment object
        $department = Department::find($faculty->department_id);
        
        //profile pic object
        $profilePic = Profile_images::find($e_id);
        

        // return back to profile page with all the dependancies    
        return view('faculty.pages.profile')
                ->with('url', $request->url)
                ->with('staff', $faculty)
                ->with('department',$department)
                ->with('pic', $profilePic);
    }
    public function postResizeImage(Request $request)
    {
        if($request->photo == NULL)
        {
            return back()
                ->with('error','Please Uplaod Image');
        }

        $photo = $request->file('photo');
        $imagename = session('e_id').'.jpeg'; 
        $destinationPath = public_path('/images/faculty_images/');
        $image = Image::make($photo)->resize('413', '531')->save($destinationPath."/".$imagename);

        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }
}