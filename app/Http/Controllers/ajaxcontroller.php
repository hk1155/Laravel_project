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

    public function showcatdd($compid)
    {

        $all = categorymodel::where('cmpid', $compid)->get();
        //dd($all);
        foreach ($all as $key) {
            $data[] = '<option value="' . $key->cid . '">' . $key->category . '</option>';
        }
        // echo $data;
        if ($all != null) {
            //echo json_encode($data, true);
            return response()->json(['success' => '1', 'response' => $data]);
        } else {
            return response()->json(['success' => '0', 'error' => 'Something Went Wrong']);
        }
        //dd($data);
    }
}
