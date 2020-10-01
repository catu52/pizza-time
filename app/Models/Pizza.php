<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'pizza';

    /**
     * Mass assignable attributes.
     * 
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Additional attributes.
     * 
     * @var array
     */
    protected $appends = ['price'];

    /**
     * Relationship with Ingredient.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient', 'pizza_ingredient');
    }

    public function purchased()
    {
        return $this->belongsToMany('App\Models\Purchase', 'purchase_items')->withPivot('quantity');
    }

    /**
     * Get Pizza price.
     * 
     * @return decimal
     */
    public function getPriceAttribute()
    {
        $subtotal = $this->ingredients->sum('price');
        return number_format($subtotal + ($subtotal/2), 2);
    }

}
