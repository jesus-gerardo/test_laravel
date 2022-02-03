<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class Flights extends Model{
    use HasFactory;

    public function departure(): BelongsTo{
        return $this->belongsTo(Airport::class);
    }

    public function destination(): BelongsTo{
        return $this->belongsTo(Airport::class);
    }

    public function airline() : BelongsTo{
        return $this->belongsTo(Airlines::class);
    }
}
