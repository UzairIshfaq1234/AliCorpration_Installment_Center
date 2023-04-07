<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class Download extends Controller
{

    public function CustomerDownload($id)
    {
        if (session()->has('Authentication_login')) {

            // $customers=customer::where('ID', $id);
            $customer = DB::table('customer')->where('ID', $id)->get();



            // $pdf = PDF::loadView('Customer.DownloadCustomerDetails',array('customers'=>$customers));  
            // // return $pdf->stream();

            // // dd($customer->all());


            // // view()->share('Customer.DownloadCustomerDetails',$customer);  
            // // $pdf = PDF::loadView('Customer.DownloadCustomerDetails');  
            // // return $pdf->download('pdfview.pdf');  


            // dd($customer);

            // $data=[
            //     'title' => 'helllo',
            //     'date' => '234'
            // ];

            // $pdf = PDF::loadView('Customer.DownloadCustomerDetails',$customer);
            // return $pdf->download('invoice.pdf');


            $error = "";
   

            return view("Customer.DownloadCustomerDetails", compact('error', 'customer'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }







}
