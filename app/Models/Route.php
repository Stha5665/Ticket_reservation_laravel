<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'origin', 'destination',
    ];

    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
