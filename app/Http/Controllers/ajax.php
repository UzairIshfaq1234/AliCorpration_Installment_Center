<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\video;
use App\Models\post;
use App\Models\installment;




class ajax extends Controller
{
    public function ajaxview()
    {
        return video::find(1)->comments;
    }
}
