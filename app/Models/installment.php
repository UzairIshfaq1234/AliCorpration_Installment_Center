<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class installment extends Model
{
    protected $table = "installment";

    protected $primarykey="ID";

    public $Timestamp=false;


    // protected $fillable = [
    //     'Customer_ID',
    //     'Date',
    //     'Installment_Amount',
    //     'Status',
    //     // 'Updated_at',
    //     // 'Created_at'


    // ];


    function getCustomer()
    {
        return $this->hasOne("App\Models\customer",'Customer_ID');
    }

}
