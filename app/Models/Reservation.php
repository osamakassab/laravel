<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // // Define the custom timestamps names
    // const CREATED_AT = 'reserved_at_date';
    // const UPDATED_AT = 'returned_at_date';

    // Define the fillable attributes
    protected $fillable = [
        'file_id',
        'user_id',
        'reserved_at_date',
        'returned_at_date',
    ];

    //Define the date formats
    protected $casts = [
        'reserved_at_date' => 'datetime',
        'returned_at_date' => 'datetime',
    ];
}
