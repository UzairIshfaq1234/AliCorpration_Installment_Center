<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class Authentication extends Controller
{
    public function loginView()
    {
        if (session()->has('Authentication_login')) {
            $customercount = DB::table('customer')->count();
            $installmentcount = DB::table('installment')->count();
            $unpaidinstallmentcount = DB::table('installment')->where('Status',0)->count();
            $paidinstallmentcount = DB::table('installment')->where('Status',1)->count();

            $totalunpaidinstallmentcount = DB::table('installment')->where('Status',0)->where('Date','<',date('Y-m-d'))->count();

            $todayunpaidinstallmentcount = DB::table('installment')->where('Status',0)->where('Date','=',date('Y-m-d'))->count();




            // dd($customercount,$installmentcount,$unpaidinstallmentcount,$paidinstallmentcount,$totalunpaidinstallmentcount,$todayunpaidinstallmentcount);
            return view("Dashboard.Dashboard",compact('customercount','installmentcount','unpaidinstallmentcount','paidinstallmentcount','totalunpaidinstallmentcount','todayunpaidinstallmentcount'));
        } else {



            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function login(Request $request)
    {

        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);


        $user = DB::table('Authentication')->where('Username', $request->Username)->where('Password', $request->Password)->first();

        if ($user == null) {

            $error = 1;
            return view("Authentication.Login", compact('error'));
        } else {

            session(['Authentication_login' => $request->Username]);

            $customercount = DB::table('customer')->count();
            $installmentcount = DB::table('installment')->count();
            $unpaidinstallmentcount = DB::table('installment')->where('Status',0)->count();
            $paidinstallmentcount = DB::table('installment')->where('Status',1)->count();

            $totalunpaidinstallmentcount = DB::table('installment')->where('Status',0)->where('Date','<',date('Y-m-d'))->count();

            $todayunpaidinstallmentcount = DB::table('installment')->where('Status',0)->where('Date','=',date('Y-m-d'))->count();




            // dd($customercount,$installmentcount,$unpaidinstallmentcount,$paidinstallmentcount,$totalunpaidinstallmentcount,$todayunpaidinstallmentcount);
            return view("Dashboard.Dashboard",compact('customercount','installmentcount','unpaidinstallmentcount','paidinstallmentcount','totalunpaidinstallmentcount','todayunpaidinstallmentcount'));
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('view.loginView');

    }


}
