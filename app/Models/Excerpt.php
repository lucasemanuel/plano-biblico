<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excerpt extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'array',
    ];

    public function toogleReaded(): self
    {
        $this->readed_at = $this->readed_at ? null : now();
        return $this;
    }
}
