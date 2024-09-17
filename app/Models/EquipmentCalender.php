<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import this correctly


class EquipmentCalender extends Model
{
    use HasFactory;
    protected $fillable = ['day','status','equipment_id','date','timings', 'holiday_name'];
    /**
     * Get the user that owns the EquipmentCalender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(equipment::class);
    }
}
