<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{
    protected $table = 'user_booking_table';

    protected $fillable = [
        'user_id_fk',
        'equipment_id_fk',
        'booking_date',
        'booking_timings',
        'ref_no',
        'status',
        'gold_status'
    ];

    // Optionally, you can specify the primary key and timestamps if needed
    protected $primaryKey = 'book_id_pk';
    public $timestamps = true;
}
