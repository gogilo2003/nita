<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;
    /**
     * Get the trade that owns the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trade(): BelongsTo
    {
        return $this->belongsTo(Trade::class);
    }
}
