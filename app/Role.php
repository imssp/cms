<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'cms_roles';
    protected $connection = 'mysqlRoot';

    //Timestamp
    public $timestamps = false;
}
