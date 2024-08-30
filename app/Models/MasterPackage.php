<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPackage extends Model
{
    protected $fillable = ["name"];

    protected $dates = ['created_at', 'updated_at'];
}
