<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    protected $guarded=[];
    use SoftDeletes;

    protected $casts = [
        'orders' => 'array'
    ];
    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
