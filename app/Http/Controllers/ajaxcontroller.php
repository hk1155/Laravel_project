<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\addproduct;
use App\categorymodel;
use App\companymodel;

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

    public function getdata($id = null)
    {
        if ($id != null) {
            $data = DB::table('tbl_category')
                ->select('tbl_category.*', 'tbl_company.company')
                ->join('tbl_company', 'tbl_category.cmpid', '=', 'tbl_company.compid')
                ->where('tbl_category.cmpid', '=', $id)
                ->get();
            if ($data != null) {
                return response()->json($data);
            } else {
                return response()->json(['success' => '0', 'error' => 'Something Went Wrong Please try Again later.']);
            }
        } else {
            $data = DB::table('tbl_category')
                ->select('tbl_category.*', 'tbl_company.company')
                ->join('tbl_company', 'tbl_category.cmpid', '=', 'tbl_company.compid')
                ->get();

            if ($data != null) {
                return response()->json($data);
            } else {
                return response()->json(['success' => '0', 'error' => 'Something Went Wrong Please try Again later.']);
            }
        }
    }

    public function managedata()
    {
        $data = companymodel::all();
        return view('Manage_data', ["compdata" => $data]);
    }
}
