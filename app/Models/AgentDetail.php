<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentDetail extends Model
{
    protected $fillable = ['user_id'];
    protected $table = 'agents_other_details';
}
