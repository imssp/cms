<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class AttendanceFeedController extends Controller
{
	/******************************************************************************************
     * This return an array of associatinve array.
	 * Each sub array contains the record of one student for the SubAllotId with the records withing the passed dates and the complied data.
	 * This object is used in excel export function to provide the user with data for a subject between two dates
     *
     * @param  int  $id
	 * @param  date $s_date
	 * @param  date $e_date
     * @return \Illuminate\Http\Response
     *******************************************************************************************/
    public static function getSubjectReport($id, $s_date, $e_date){ 
    	$result =  DB::select('CALL GetSubjectTotalReport('.$id.', \''.$s_date.'\',\''.$e_date.'\')'); 
		$dates = DB::select('Select uid, date, contact_head_meeting_index, attendance from student_attendance_record where sub_allotment_id = '.$id.' and date between \''.$s_date.'\' and \''.$e_date.'\' order by uid, date, contact_head_meeting_index asc'); 
	  	$unique_dates = DB::select('select distinct date, contact_head_meeting_index from student_attendance_record where sub_allotment_id = '.$id.' and date between \''.$s_date.'\' and \''.$e_date.'\' order by date, contact_head_meeting_index asc' );

		$return_value = array();
		for ($i=0; $i < count($result); $i++) {
			$temp = (array)$result[$i]; 
			$curr_uid = $temp["UID"]; 

			foreach($unique_dates as $unique_date) {
				$curr_date = $unique_date->date;
				$index = date("d-m", strtotime($curr_date));;
				$append = $unique_date->contact_head_meeting_index == 1?"":"(".$unique_date->contact_head_meeting_index.")";
				
				$temp[$index.''.$append] = "-";
				for ($j=0; $j < count($dates); $j++) {
					if ($dates[$j]->uid == $curr_uid && $dates[$j]->date == $unique_date->date && $dates[$j]->contact_head_meeting_index == $unique_date->contact_head_meeting_index) { 
						if($dates[$j]->attendance == 0)
							$temp[$index.''.$append] = "A"; 
						else if($dates[$j]->attendance == 1)
							$temp[$index.''.$append] = "P"; 
						else if($dates[$j]->attendance == 2)
							$temp[$index.''.$append] = "L"; 
						else if($dates[$j]->attendance == 3)
							$temp[$index.''.$append] = "E"; 
					}
				}
				
				$return_value[$i] = (array)$temp; 
				
			} 
		}
		return $return_value;
	}
}