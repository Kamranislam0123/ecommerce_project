<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'offer_type', // percentage, fixed, buy_one_get_one, etc.
        'discount_value',
        'minimum_order_amount',
        'offer_limit_qty',
        'start_date',
        'end_date',
        'is_active',
        'image',
        'terms_conditions'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        'discount_value' => 'decimal:2',
        'minimum_order_amount' => 'decimal:2'
    ];

    // Scope for active offers
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
    }

    // Check if offer is currently valid
    public function isValid()
    {
        return $this->is_active && 
               $this->start_date <= now() && 
               $this->end_date >= now();
    }

    // Get formatted discount text
    public function getDiscountTextAttribute()
    {
        if ($this->offer_type === 'percentage') {
            return $this->discount_value . '% OFF';
        } elseif ($this->offer_type === 'fixed') {
            return '৳' . $this->discount_value . ' OFF';
        } elseif ($this->offer_type === 'buy_one_get_one') {
            return 'Buy 1 Get 1 Free';
        }
        return 'Special Offer';
    }
}
