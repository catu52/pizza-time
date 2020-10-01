<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'ingredient';

    /**
     * Mass assignable attributes.
     * 
     * @var array
     */
    protected $fillable = ['name', 'price'];

    /**
     * Relationship with Pizza.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza');
    }
}
