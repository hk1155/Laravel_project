<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\addproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = addproduct::all();
        return view('Viewproduct', ["data" => $data]);
        //return view('Viewproduct');
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
            'pname' => $req->input('txtpname'),
            'price' => $req->input('txtprice'),
            'status' => 1
        ]);
        $add->save();
        return redirect('viewproduct');
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
        $sid = addproduct::find($id);
        ($sid->status == "1") ? $status = '0' : $status = '1';
        addproduct::where('id', $id)->update(['status' => $status]);
        // addproduct::update()
        return redirect('viewproduct');
    }

    public function managecategory()
    {
        return view('manage_category');
    }
}
