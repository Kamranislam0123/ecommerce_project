<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'time',
        'group_id',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
    
    // Day mapping
    public static $days = [
        1 => 'Saturday',
        2 => 'Sunday', 
        3 => 'Monday',
        4 => 'Tuesday',
        5 => 'Wednesday',
        6 => 'Thursday',
        7 => 'Friday'
    ];
    
    // Get day name
    public function getDayNameAttribute()
    {
        return self::$days[$this->group_id] ?? 'Unknown';
    }
    
    // Get formatted time (12-hour format)
    public function getFormattedTimeAttribute()
    {
        if (!$this->time) return '';
        
        $time = \DateTime::createFromFormat('H:i', $this->time);
        if (!$time) return $this->time;
        
        return $time->format('g:i A');
    }
    
    // Scope for active times
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    // Scope for specific day
    public function scopeForDay($query, $dayNumber)
    {
        return $query->where('group_id', $dayNumber);
    }
}
