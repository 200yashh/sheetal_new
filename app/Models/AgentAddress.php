<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentAddress extends Model
{
    protected $fillable = ['user_id', 'telephone', 'birth_date', 'birth_city', 'h_country', 'h_state', 'h_city', 'h_location', 'h_detail_address', 'b_country', 'b_state', 'b_city', 'b_location', 'b_detail_address'];
    
    protected $table = 'agents_address';
}
