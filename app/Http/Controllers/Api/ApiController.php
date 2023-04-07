<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\installment;
use App\Models\comment;
use App\Models\post;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag)
    {
        // p($flag);
        // die;
        // p("THIS GET API IS WORKING");
        // $installments_data=comment::all();
        // return response()->json($installments_data,200);

        // $installments_data=installment::all();

        if($flag == 0){
            $installments_data=installment::select('Customer_ID',"Installment_Amount","Status")->where('Customer_ID',6)->where('Status',0)->get();
        }
        elseif($flag == 1){
            $installments_data=installment::select('Customer_ID',"Installment_Amount","Status")->where('Customer_ID',6)->where('Status',1)->get();
        }
        else{

            return response()->json([
                "message"=>"Invalid Data requird",
                "error"=>1,

            ],400);
        }

        if(count($installments_data)>0){
            $response=[
                "message"=>count($installments_data)." Users Found",
                "status"=>1,
                "data"=>$installments_data

            ];
            return response()->json($response,200);

        }
        else{
            $response=[
                "message"=>count($installments_data)." Users Found",
                "status"=>0,

            ];
            return response()->json($response,200);
        }
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // p($request->all());

        $validator=Validator::make($request->all(),[
            'Customer_ID'=>['required'],
            'Date'=>['required'],
            'Installment_Amount'=>['required'],
            'Status'=>['required']
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }

        else{
            $data=[
                'Customer_ID'=>$request->Customer_ID,
                'Date'=>$request->Date,
                'Installment_Amount'=>$request->Installment_Amount,
                'Status'=>$request->Status ,
                'updated_at'=>'12-03-23',          
                'created_at'=>'12-03-23',          
          
            ];
            // p($data);

            DB::beginTransaction();
            try{


                $success=installment::create($data);
                DB::commit();

            }
            catch(\Exception $e){
                DB::rollback();
                // p($e->getMessage());

            }

            if(!empty($success))
            {
                return response()->json([
                    'message'=> 'Inserted success',
                ],200);
            }
            else{
                return response()->json([
                    'message'=> 'Internal error',
                ],500);
            }
            
        }
        // $request->validate([

        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $installment=installment::find($id);
        // if(is_null($installment))
        // {
        //     $notify=[
        //         'message'=>'no such user found',
        //     ];
        //     return response()->json($notify,404);
        // }
        // else
        // {

            // return response()->json($installment->Installment_Amount,200);
            // DB::beginTransaction();
            // try{
                $installment->Installment_Amount=23434;
                $installment->Status=2;
                $installment->save();
                // DB::commit();

                $notify=[
                    'message'=>'Installment Updated Successfully!',
                ];

                return response()->json($notify,200);


            // }
            // catch(\Exception $err){

            //     DB::rollback();
            //     $notify=[
            //         'message'  =>  'Internal Server Error!',
            //         'error'    =>   $err->getMessage()
            //     ];

            //     return response()->json($notify,404);

            // }

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $installment=installment::find($id);

        // return response()->json($installment);


        if(is_null($installment))
        {
         
            $notify=[
                'message'=>'No Installment Found',
                'status'=>'0'
            ];
            return response()->json($notify,404);

        }
        else{

            DB::begintransaction();
            try{
                $query=DB::table('installment')->delete($id);

                DB::commit();

                $notify=[
                    'message'=>'Installment Deleted Successfully!',
                    'status'=>'1',
                    'installment'=>$installment
                ];
                return response()->json($notify,200);
            }
            catch(\Exception $err){

                DB::rollback();
                $notify=[
                    'message'=>'Internal Server Error!',
                    'status'=>'0'
                ];
                return response()->json($notify,404);
            }



        }
    }

    public function updateposts(Request $request, $id)
    {
        $post=post::find($id);

        $post->title=$request['title'];
        $post->body=$request['body'];
        $post->save();

        $notify=[
            'message'=>'Installment Updated !',
            'Status'=>1
        ];
        return response()->json($notify,200);



    }


    public function updatepostsput(Request $request, $id)
    {
        $post=post::find($id);

        $post->title=$request['title'];
        $post->body=$request['body'];
        $post->save();

        $notify=[
            'message'=>'Installment Updated !',
            'Status'=>1
        ];
        return response()->json($notify,200);



    }


    public function installmentdata()
    {
        // $installments_data=installment::where('');
        $installments_data=installment::where('Status',1)->get();

    
        if(count($installments_data)>0){
            // $response=[
            //     "message"=>count($installments_data)." Users Found",
            //     "status"=>1,
            //     "data"=>$installments_data
            // ];
            return response()->json($installments_data,200);
        }
        else{
            $response=[
                "message"=>count($installments_data)." Users Found",
                "status"=>0,
            ];
            return response()->json($response,200);
        }
    }
}
