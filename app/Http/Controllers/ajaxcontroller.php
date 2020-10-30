<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\addproduct;
use App\categorymodel;

class ajaxcontroller extends Controller
{
    public function deleteproduct($id)
    {
        $d = addproduct::where("pid", $id);
        $d->delete();
        echo 1;
    }
}
