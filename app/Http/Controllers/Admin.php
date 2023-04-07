<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Admin extends Controller
{


    public function AdminView()
    {
        if (session()->has('Authentication_login')) {
            $error = "";
            return view("Admin.Admin", compact('error'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function AdminAdd(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'auth_type' => 'required',


        ]);
        $data = array('Username' => $request->Username, "Password" => $request->Password, "auth_type" => $request->auth_type);
        $result = DB::table('Authentication')->insert($data);

        if ($result) {
            $error = 1;
            return view("Admin.Admin", compact('error'));
        } else {
            $error = 0;
            return view("Admin.Admin", compact('error'));
        }
    }


    public function AllAdminView()
    {
        if (session()->has('Authentication_login')) {
            $admin = DB::table('Authentication')->get();

            $error = "";
            return view("Admin.AllAdmin", compact('error', 'admin'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function DeleteAdmin($id)
    {
        if (session()->has('Authentication_login')) {

            $Admindelete = DB::table('Authentication')->where('ID', $id)->first();

            if ($Admindelete) {

                if ($Admindelete->auth_type == "SuperAdmin") {

                    $error = 1;
                    $type = "danger";
                    $message = "Super Admin Can't be deleted !";
                    $admin = DB::table('Authentication')->get();
                    return view("Admin.AllAdmin", compact('error', 'type', 'message', 'admin'));
                } else {
                    $Admindelete = DB::table('Authentication')->where('ID', $id)->delete();
                    $error = 1;
                    $type = "success";
                    $message = "Admin Deleted Successfully !";
                    $admin = DB::table('Authentication')->get();
                    return view('Admin.AllAdmin', compact('error', 'type', 'message', 'admin'));
                }
            } else {
                $admin = DB::table('Authentication')->get();

                $error = "";
                return redirect("/AllAdmin")->with(compact('error', 'admin'));
            }
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }



    public function UpdateAdmin($id)
    {
        if (session()->has('Authentication_login')) {
            $Adminupdate = DB::table('Authentication')->where('ID', $id)->first();

            if ($Adminupdate) {

                $error = "";
                return view("Admin.UpdateAdmin", compact('error', 'Adminupdate'));
            } else {
                $error = 1;
                $type = "danger";
                $message = "No Admin Found!";
                $admin = DB::table('Authentication')->get();
                return view('Admin.AllAdmin', compact('error', 'type', 'message', 'admin'));
            }
        }
        else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function UpdateAdminForm(Request $request)
    {
        $Adminupdatedata = DB::table('Authentication')->where('ID', $request->ID)->update(["Username" => $request->Username, "Password" => $request->Password,"Updated_On" => now()]);

        if ($Adminupdatedata) {
            $error = 1;
            $type = "success";
            $message = "Admin Updated Successfully !";
            $admin = DB::table('Authentication')->get();
            return view('Admin.AllAdmin', compact('error', 'type', 'message', 'admin'));
        } else {
            $error = 1;
            $type = "danger";
            $message = "Admin Not updated Try Again!";
            $admin = DB::table('Authentication')->get();
            return view('Admin.AllAdmin', compact('error', 'type', 'message', 'admin'));
        }
    }
}
