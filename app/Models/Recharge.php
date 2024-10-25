<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;
    protected $table = 'recharge';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'amount',
        'created_at',
        'remark',
    ];

     // Optionally, define relationships
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
