<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = ['Firstname', 'Lastname', 'Username', 'Phone'];
    protected $table = "patients";
    use HasFactory;
    
}