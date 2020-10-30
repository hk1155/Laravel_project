<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\addproduct;
use App\categorymodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;
use Session;

class Mycontroller extends Controller
{
    public function Home()
    {
        return view('Home');
    }

    public function Viewproduct()
    {

        $data = DB::table('addproducts')
            ->select('addproducts.*', 'tbl_category.*')
            ->join('tbl_category', 'tbl_category.cid', '=', 'addproducts.catid')
            ->get();

        //$data = addproduct::all();
        return view('Viewproduct', ["data" => $data]);
    }


    public function managecategory()
    {
        $view = categorymodel::all();
        return view('Manage_category', ["catdata" => $view]);
    }
    public function adduser(Request $req)
    {
        // $validator =  Validator::make($req->all(), [
        //     'email' => ['unique:users']
        // ]);
        if (User::where('email', '=', $req->get('txtemail'))->exists()) {
            Session::flash('emailmsg', 'Email is Already Exists!!');
            return redirect('register');
        } else {

            if ($req->get('txtpassword') == $req->get('txtcpassword')) {
                $add = new User([

                    'name' => $req->input('txtname'),
                    'email' => $req->input('txtemail'),
                    'password' => Hash::make($req->input('txtpassword')),
                ]);
                $add->save();
                return view('login');
            } else {
                Session::flash('passmsg', 'Password is Not Match to The Confirm Password');
                return redirect('register');
            }
        }
    }

    public function login1(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('home');
        } else {

            Session::flash('errmsg', 'Username or Passwors is Incorrect');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function insertproduct(Request $req)
    {
        $add = new addproduct([

            'catid' => $req->input('ddcategory'),
            'pname' => $req->input('txtpname'),
            'price' => $req->input('txtprice'),
        ]);
        $add->save();
        return redirect('viewproduct');
    }

    public function insertcategory(Request $req)
    {
        $add = new categorymodel([
            'category' => $req->input('txtcategory'),

        ]);
        $add->save();
        return redirect('managecategory');
    }

    public function deleteprod($id)
    {
        $d = addproduct::find($id);
        $d->delete();

        Session::flash('errmsg', $d->pname . '' . 'Deleted Successfully');
        return redirect('viewproduct');
    }

    public function statustogle($id)
    {
        //$sid = addproduct::find($id);
        $data = addproduct::where('pid', $id)->first();

        ($data->prodstatus == "1") ? $status = '0' : $status = '1';
        addproduct::where('pid', $id)->update(['prodstatus' => $status]);
        return redirect('viewproduct');
    }

    public function cattogle($id)
    {

        $data = categorymodel::where('cid', $id)->first();

        if ($data->status == '1') {
            categorymodel::where('cid', $id)->update(['status' => '0']);
        } else {
            categorymodel::where('cid', $id)->update(['status' => '1']);
        }

        $all = categorymodel::where('cid', $id)->first();
        if ($all->status != null) {
            return response()->json(['success' => "1", "response" => $all->status]);
        } else {
            return response()->json(['success' => "0", "error" => "There is something wrong please try again later."]);
        }
    }

    public function addproduct()
    {
        $view = categorymodel::all();
        return view('Addproduct', ["catdata" => $view]);
    }
}
