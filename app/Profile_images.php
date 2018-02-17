<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_images extends Model
{
    protected $table = 'profile_images';

    //Primary Key

    protected $primaryKey = 'id';
    //Timestamp
    public $timestamps =false;
}

?>