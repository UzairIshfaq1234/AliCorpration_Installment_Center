<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PrintInstallment extends Controller
{
    public function installmentprint($id)
    {


        
        if (session()->has('Authentication_login')) {
            $installment = DB::table('installment')->where('ID', $id)->get();

            $customer = DB::table('customer')->where('ID', $installment[0]->Customer_ID)->get();

            // dd($installment);

            $error = "";
   

            return view("Installment.DownloadInstallment", compact('error', 'customer','installment'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }
}
