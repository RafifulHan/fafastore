<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    
    public function loginverify(Request $request){

        $username = strtolower($request->username);
        $db_username = "";
        $data_db = DB::table('admin')->whereUsername($username)->get();
        foreach ($data_db as $data) {
            $db_username = $data->username;
        }

        if( $db_username === $username ){
            
            $password = strtolower($request->password);

            $passwordVerif = password_verify( $password, PASSWORD_DEFAULT );

            if( $request->password === $password ){ 
                
                $request->session()->put('key', $username);

                // $sha = sha1("123456");
                // $crypt = bcrypt($sha);
                // echo $crypt;
                return redirect('/admin-home');
            }

        }

        return view('admin.admin_login');
    
    }

    public function adminlogin(Request $request){

        if( $request->session()->has('key') ){

            return redirect('/admin-home');

        }
        
        return view('admin/admin_login');

    }


    public function homeAdmin(Request $request){

        if( $request->session()->has('key') ){
            $adminLogged = $request->session()->get('key');
            $orders = DB::table('customers_order')->get();
            return view('admin.dashboard', ["orders" => $orders, "adminLogged" => $adminLogged]);
        }else{
            return redirect('/login-admin');
        }

    }

    public function logout(Request $request){

        $request->session()->forget('key');
        return redirect('/login-admin');
    }

}
