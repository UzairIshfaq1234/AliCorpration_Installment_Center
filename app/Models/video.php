<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\comment;



class video extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(comment::class,'commentable');
    }
}
