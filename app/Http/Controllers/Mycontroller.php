<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\addproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class Mycontroller extends Controller
{
    public function Home()
    {
        return view('Home');
    }

    public function Viewproduct()
    {
        return view('Viewproduct');
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
    }
}
