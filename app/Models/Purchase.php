<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'purchase';

    protected $appends = [];


    /**
     * Relationship with Pizza.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany('App\Models\Pizza', 'purchase_items')->withPivot('quantity', 'subtotal');
    }

    /**
     * Alias for relationship with Pizza.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pizzas()
    {
        return $this->items();
    }

}
