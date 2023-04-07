<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\comment;

class post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primarykey="ID";
    public $timestamps=false;



    public function comments()
    {
        return $this->morphMany(comment::class,'commentable');
    }

}
