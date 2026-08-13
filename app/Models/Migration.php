<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    protected $table = 'migrations';
    public $timestamps = false; // Tabel ini tidak memiliki created_at dan updated_at
    protected $fillable = ['migration', 'batch'];

    protected function casts(): array
    {
        return [
            'batch' => 'integer',
        ];
    }
}