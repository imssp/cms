<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Input;

class StudentSearchController extends Controller
{
    public function autocomplete(){
        if(session('e_id')){
            $term = Input::get('q');

            $results = array();
            
            $queries = Student::where('UID', '=', $term)
            ->orwhere('Branch', '=', $term)
            ->orwhere('EmailId', '=', $term)
            ->orWhere('FirstName', 'like', '%'.$term.'%')
            ->orWhere('LastName', 'like', '%'.$term.'%')
            ->orWhere('LastName', 'like', '%'.$term.'%')
            ->get();
            
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->UID, 'value' => $query->FirstName.' '.$query->Branch ];
            }
            //return \Response::json($results);
            return view('faculty.pages.searchstudent') ->with ("results", $results);
        }
        else{
            return redirect('/')->with('error','Unauthorised Access');
        }
    }

}
