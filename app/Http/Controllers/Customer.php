<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;

class Customer extends Controller
{
    public function CustomerView()
    {
        if (session()->has('Authentication_login')) {
            $error = "";
            return view("Customer.Customer", compact('error'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }



    public function CustomerAdd(Request $request)
    {
        $request->validate([
            'Account_No' => 'required|unique:customer|numeric',
            'F_Name' => 'required',
            'L_Name' => 'required',
            'Customer_Cnic' => 'required|digits:13',

            'Gender' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'State' => 'required',
            'Phone' => 'required|digits:11',
            'Email' => 'required|email',
            'Date_Of_Birth' => 'required',
            'Received_Items' => 'required|numeric',
            'Price' => 'required|numeric',
            'Price_On_Installment' => 'required|numeric',
            'Advance' => 'required|lte:Price_On_Installment',
            'Monthly_Daily_Installment' => 'required|numeric|lte:Price_On_Installment',
            'Installment_Start_Date' => 'required',
            'Customer_Picture' => 'required|mimes:jpeg,png,jpg|max:2048',

            'bailee_1_name' => 'required',
            'bailee_1_cnic' => 'required|digits:13',
            'bailee_1_relation_with_customer' => 'required',
            'bailee_1_house_address' => 'required',
            'bailee_1_office_address' => 'required',
            'bailee_1_phone' => 'required|digits:11',

            'bailee_2_cnic' => 'nullable|digits:13',
            'bailee_2_phone' => 'nullable|digits:11',





        ]);

        $destinationpath="public/CustomerImages";
        $customerimage = time() . "_CustomerImage." . $request->file('Customer_Picture')->getClientOriginalExtension();
        $request->file('Customer_Picture')->storeAs($destinationpath, $customerimage);

        $data = array(
            'Account_No' => $request->Account_No,
            "F_Name" => $request->F_Name,
            "L_Name" => $request->L_Name,
            "Customer_Cnic" => $request->Customer_Cnic,
            "Gender" => $request->Gender,
            "Address" => $request->Address,
            "City" => $request->City,
            "State" => $request->State,
            "Phone" => $request->Phone,
            "Email" => $request->Email,
            "Date_Of_Birth" => $request->Date_Of_Birth,
            "Received_Items" => $request->Received_Items,
            "Price" => $request->Price,
            "Price_On_Installment" => $request->Price_On_Installment,
            "Advance" => $request->Advance,
            "Monthly_Daily_Installment" => $request->Monthly_Daily_Installment,
            "Installment_Start_Date" => $request->Installment_Start_Date,

            "bailee_1_name" => $request->bailee_1_name,
            "bailee_1_cnic" => $request->bailee_1_cnic,
            "bailee_1_relation_with_customer" => $request->bailee_1_relation_with_customer,
            "bailee_1_house_address" => $request->bailee_1_house_address,
            "bailee_1_office_address" => $request->bailee_1_office_address,
            "bailee_1_phone" => $request->bailee_1_phone,

            "bailee_2_name" => $request->bailee_2_name,
            "bailee_2_cnic" => $request->bailee_2_cnic,
            "bailee_2_relation_with_customer" => $request->bailee_2_relation_with_customer,
            "bailee_2_house_address" => $request->bailee_2_house_address,
            "bailee_2_office_address" => $request->bailee_2_office_address,
            "bailee_2_house_address" => $request->bailee_2_house_address,
            "bailee_2_phone" => $request->bailee_2_phone,

            "Customer_Picture" => $customerimage,
            "Created_At" => date('Y-m-d H:i:s')
            // "Updated_At" => date('Y-m-d H:i:s')



        );



        $Customer_data = DB::table('customer')->insert($data);
        $Customer_recently_added = DB::table('customer')->where('Account_No', $request->Account_No)->first();

        if ($Customer_data) {

            $Installment_date = $request->Installment_Start_Date;


            $installment_amount_left = $request->Price_On_Installment - $request->Advance;

            $number_of_installment_made = $installment_amount_left / $request->Monthly_Daily_Installment;

            $installment_made = 0;

            for ($i = 0; $i < $number_of_installment_made; $i++) {

                if ($installment_amount_left > $request->Monthly_Daily_Installment) {
                    $installment_amount_left = $installment_amount_left - $request->Monthly_Daily_Installment;
                    $installment_made = $installment_made + $request->Monthly_Daily_Installment;

                    $installment_data = array(
                        "Customer_ID" => $Customer_recently_added->ID,
                        "Date" => $Installment_date,
                        "Installment_Amount" => $request->Monthly_Daily_Installment,
                        "Status" => 0,
                        "Created_On" => date('Y-m-d H:i:s')
                        // "Updated_On" => date('Y-m-d H:i:s')
                    );
                    $result = DB::table('installment')->insert($installment_data);
                    $Installment_date = date('Y-m-d', strtotime($Installment_date . ' + 1 months'));
                } else {


                    $installment_data = array(
                        "Customer_ID" => $Customer_recently_added->ID,
                        "Date" => $Installment_date,
                        "Installment_Amount" => $installment_amount_left,
                        "Status" => 0,
                        "Created_On" => date('Y-m-d H:i:s')
                        // "Updated_On" => date('Y-m-d H:i:s')
                    );
                    $result = DB::table('installment')->insert($installment_data);

                    $Installment_date = date('Y-m-d', strtotime($Installment_date . ' + 1 months'));
                }
            }


            $error = 1;
            $type = "success";
            $message = "Customer Added successfully and Installments Created!";
            return view("Customer.Customer", compact('error', 'type', 'message'));
        } else {
            $error = 0;
            $type = "danger";
            $message = "Error! Customer not added Try again";
            return view("Customer.Customer", compact('error', 'type', 'message'));
        }
    }





    public function AllCustomerView()
    {
        if (session()->has('Authentication_login')) {
            $customer = DB::table('customer')->get();

            $error = "";
            return view("Customer.AllCustomer", compact('error', 'customer'));
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }



    public function UpdateCustomer($id)
    {
        if (session()->has('Authentication_login')) {
            $Customer = DB::table('customer')->where('ID', $id)->first();

            if ($Customer) {

                $error = "";
                return view("Customer.UpdateCustomer", compact('error', 'Customer'));
            } else {
                $error = 1;
                $type = "danger";
                $message = "No Customer Found!";
                $customer = DB::table('customer')->get();
                return view('Customer.AllCustomer', compact('error', 'type', 'message', 'customer'));
            }
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }

    public function UpdateCustomerForm(Request $request)
    {

        $request->validate([
            'F_Name' => 'required',
            'L_Name' => 'required',
            'Customer_Cnic' => 'required|digits:13',

            'Gender' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'State' => 'required',
            'Phone' => 'required|digits:11',
            'Email' => 'required|email',
            'Date_Of_Birth' => 'required',
            'Received_Items' => 'required|numeric',
            'Price' => 'required|numeric',
            'bailee_1_name' => 'required',
            'bailee_1_cnic' => 'required|digits:13',
            'bailee_1_relation_with_customer' => 'required',
            'bailee_1_house_address' => 'required',
            'bailee_1_office_address' => 'required',
            'bailee_1_phone' => 'required|digits:11',

            'bailee_2_cnic' => 'nullable|digits:13',
            'bailee_2_phone' => 'nullable|digits:11',





        ]);



        $Customerupdatedata = DB::table('customer')->where('ID', $request->ID)->update([
            "F_Name" => $request->F_Name,
            "L_Name" => $request->L_Name,
            "Customer_Cnic" => $request->Customer_Cnic,
            "Gender" => $request->Gender,
            "Address" => $request->Address,
            "City" => $request->City,
            "State" => $request->State,
            "Phone" => $request->Phone,
            "Email" => $request->Email,
            "Date_Of_Birth" => $request->Date_Of_Birth,
            "Received_Items" => $request->Received_Items,
            "Price" => $request->Price,
            "bailee_1_name" => $request->bailee_1_name,
            "bailee_1_cnic" => $request->bailee_1_cnic,
            "bailee_1_relation_with_customer" => $request->bailee_1_relation_with_customer,
            "bailee_1_house_address" => $request->bailee_1_house_address,
            "bailee_1_office_address" => $request->bailee_1_office_address,
            "bailee_1_phone" => $request->bailee_1_phone,
            "bailee_2_name" => $request->bailee_2_name,
            "bailee_2_cnic" => $request->bailee_2_cnic,
            "bailee_2_relation_with_customer" => $request->bailee_2_relation_with_customer,
            "bailee_2_house_address" => $request->bailee_2_house_address,
            "bailee_2_office_address" => $request->bailee_2_office_address,
            "bailee_2_phone" => $request->bailee_2_phone,
            "Updated_At" => date('Y-m-d H:i:s')


        ]);

        if ($Customerupdatedata) {
            $error = 1;
            $type = "success";
            $message = "Customer Updated Successfully !";
            $customer = DB::table('customer')->get();
            return view('Customer.AllCustomer', compact('error', 'type', 'message', 'customer'));
        } else {
            $error = 1;
            $type = "danger";
            $message = "Customer Not updated Try Again!";
            $customer = DB::table('customer')->get();
            return view("Customer.AllCustomer", compact('error', 'type', 'message', 'customer'));
        }
    }



    public function DeleteCustomer($id)
    {
        if (session()->has('Authentication_login')) {

            $Customerdelete = DB::table('customer')->where('ID', $id)->delete();

            if ($Customerdelete) {
                $Installmentdelete = DB::table('installment')->where('Customer_ID', $id)->delete();


                $error = 1;
                $type = "success";
                $message = "Customer and Customer Installment Deleted Successfully !";
                $customer = DB::table('customer')->get();
                return view("Customer.AllCustomer", compact('error', 'type', 'message', 'customer'));
            } else {
                $admin = DB::table('Authentication')->get();

                $error = 1;
                $type = "success";
                $message = "Admin Deleted Successfully !";
                $customer = DB::table('customer')->get();
                return view("Customer.AllCustomer", compact('error', 'type', 'message', 'customer'));
            }
        } else {
            $error = "";
            return view("Authentication.Login", compact('error'));
        }
    }
}
