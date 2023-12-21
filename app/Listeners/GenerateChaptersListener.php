<?php

namespace App\Listeners;

use Illuminate\Support\Arr;
use Spatie\SimpleExcel\SimpleExcelReader;

class GenerateChaptersListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $path = storage_path('csv') . '/ano-biblico.csv';
        $rows = SimpleExcelReader::create($path)->getRows();
        $rows = $rows->groupBy('mes')->collect();

        $chapterDays = $rows->map(function ($month) {
            $month = $month->groupBy('dia');
            return $month->map(function ($chapter) {
                $meta = $chapter->reduce(function ($carry, $item) {
                    $carry[] = [
                        'book' => $item['livro'],
                        'chapter' => $item['capitulo'],
                        'verses' => empty($item['versos']) ? null : $item['versos']
                    ];
                    return $carry;
                });
                return [
                    'day' => $chapter[0]['dia'],
                    'month' => $chapter[0]['mes'],
                    'meta' => $meta
                ];
            });
        })->collapse();

        $event->user->chapterDays()->createMany($chapterDays);
    }
}
