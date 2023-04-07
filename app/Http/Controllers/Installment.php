<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Installment extends Controller
{
    public function AllInstallmentView($id)
    {
        if (session()->has('Authentication_login')) {
            $installment = DB::table('installment')->where('Customer_ID', $id)->get();


            // dd($customer);




            $error = "";
            return view("Installment.Installment", compact('error', 'installment'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function InstallmentStatus($id, $status, $customer)
    {
        if (session()->has('Authentication_login')) {
            if ($status == 1) {

                $installment = DB::table('installment')->where('Customer_ID', $customer)->get();
                $installmentstatus_updated = DB::table('installment')->where('ID', $id)->update(["Status" => $status, "Updated_On" => now()]);

                if ($installmentstatus_updated) {

                    $error = 1;
                    $type = "success";
                    $message = "Installment No <b>$id</b> is paid For Account No <b>$customer</b>. Print Your Receipt!";
                    // return Redirect::back()->with('error', 'type', 'message', 'installment');
                    return redirect()->back()->with('error', $message)->with('type', $type);


                    // return view("Installment.Installment", compact('error', 'type', 'message', 'installment'));

                    // return redirect("/Installment/$customer")->with(compact('error', 'type', 'message', 'installment'));
                } else {
                    $error = 1;
                    $type = "danger";
                    $message = "Error! TryAgain or Refresh page";
                    return view("Installment.Installment", compact('error', 'type', 'message', 'installment'));
                }
            } elseif ($status == 0) {

                $installment = DB::table('installment')->where('Customer_ID', $customer)->get();
                $installmentstatus_updated = DB::table('installment')->where('ID', $id)->update(["Status" => $status, "Updated_On" => now()]);

                if ($installmentstatus_updated) {

                    $error = 1;
                    $type = "danger";
                    $message = "Installment No <b>$id</b> is unpaid For Account No <b>$customer</b>";
                    return redirect()->back()->with('error', $message)->with('type', $type);

                    // return view("Installment.Installment", compact('error', 'type', 'message', 'installment'));

                    // return redirect("/Installment/$customer")->with(compact('error', 'type', 'message', 'installment'));
                    // return  Redirect::back()->with(compact('error', 'type', 'message', 'installment'));
                } else {
                    $error = 1;
                    $type = "danger";
                    $message = "Error! TryAgain or Refresh page";
                    return view("Installment.Installment", compact('error', 'type', 'message', 'installment'));
                }
            }
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }






    public function TodayInstallmentView()
    {
        if (session()->has('Authentication_login')) {
            $todaydate= date("Y-m-d");
            // dd($todaydate);
            $installment = DB::table('installment')->where('Date',$todaydate)->get();


            // dd($customer);




            $error = "";
            return view("Installment.TodayInstallment", compact('error', 'installment'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }



    public function PendingInstallmentView()
    {
        if (session()->has('Authentication_login')) {
            $todaydate= date("Y-m-d");
            // dd($todaydate);
            $installment = DB::table('installment')->where('Date','<',$todaydate)->where('Status','=',0)->get();


            // dd($customer);




            $error = "";
            return view("Installment.PendingInstallment", compact('error', 'installment'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }
}
