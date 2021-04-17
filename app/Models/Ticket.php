<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['title', 'description', 'status', 'user_id'];
    protected $hidden =['updated_at', 'created_at'];
}
