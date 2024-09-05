<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Support\Facades\Hash; // Import Hash facade

class Data extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model
    // protected $table = 'datas'; // Change to match your actual table name

    // // Add fillable properties to protect against mass-assignment vulnerability
    // protected $fillable = ['first', 'last', 'email', 'mobile', 'password','mob','course','image'];

    // // Mutator to automatically hash the password when set
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }
}
