<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'bus_id', 'route_id','price', 'depart_date_time',
    ];

    public function Bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    } 
    public function Route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
