<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    protected $table = 'tbl_category';
    protected $fillable = ["category", "status"];
}
