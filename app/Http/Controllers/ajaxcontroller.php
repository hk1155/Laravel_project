<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\addproduct;

class ajaxcontroller extends Controller
{
    public function deleteproduct($id)
    {
        $d = addproduct::find($id);
        $d->delete();
        
        echo 1;
    }
}
