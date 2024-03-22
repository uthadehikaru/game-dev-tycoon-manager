<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function topic():BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function genre():BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function platform():BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
