<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companymodel extends Model
{
    protected $table = "tbl_company";
    //public $timestamps = false;
    protected $fillable = ["company", "status"];
}
