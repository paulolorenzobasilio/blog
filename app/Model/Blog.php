<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
}
