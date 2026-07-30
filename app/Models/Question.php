<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];

    //relasi inverse ke model Subject
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    //relasi 1 to many dengan model Answer
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
