<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    use HasFactory;
    protected $fillable=['name','fathername','cnic','yearofgraduation','yearofadmission','status','purpose','department','role','referal','referal_visit_id'];
}
