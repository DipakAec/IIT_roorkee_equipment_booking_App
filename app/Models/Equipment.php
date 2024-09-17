<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';
    protected $fillable = [
        'name',
        'image',
        'incharge_name',
        'incharge_email',
        'incharge_phone',
        'location',
        'status',
        'sample_requirements',
        'additional_accessories',
        'number_of_slots',
        'user_id',
    ];
    /**
     * Get the user that owns the Equipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the comments for the Equipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records(): HasMany
    {
        return $this->hasMany(EquipmentCalender::class);
    }
    
}
