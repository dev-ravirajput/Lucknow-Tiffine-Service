<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory; // Add this line
    
    protected $fillable = [
        'owner_name',
        'kitchen_name',
        'email',
        'contact_no',
        'sqft',
        'status',
        'type',
        'rating',
        'location',
        'coordinates',
        'featured_img'
    ];
}