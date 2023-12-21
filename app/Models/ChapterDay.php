<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class ChapterDay extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'array',
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: function () {
                $book = $this->meta[0]['book'];
                return collect($this->meta)->reduce(function ($carry, $item) use ($book) {
                    $passage = $item['verses'] ? $item['chapter'] . ':' . $item['verses'] : $item['chapter'];
                    return trim($carry ? "$carry, $passage" : "$book $passage");
                });
            }
        );
    }

    public static function toogleReaded(int $id): self
    {
        $chapterDay = self::find($id);
        $chapterDay->readed_at = $chapterDay->readed_at ? null : now();
        return $chapterDay;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
