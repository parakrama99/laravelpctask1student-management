<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import this
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; // Add this line

    protected $fillable = ['name', 'email', 'phone']; // Add fillable fields
}
