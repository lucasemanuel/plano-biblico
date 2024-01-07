<?php

namespace App\Listeners;

use App\Models\AvailableReadingGuide;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;

class AttachUserReadingGuideListener
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
        $user = $event->user;
        $guideBase = AvailableReadingGuide::latest()->first();
        $excerpts = $this->makeExcerpts($guideBase);

        DB::beginTransaction();
        try {
            $guide = $user->readingGuides()->create([
                'available_reading_guide_id' => $guideBase->id,
            ]);
            $guide->excerpts()->createMany($excerpts);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    private function makeExcerpts(AvailableReadingGuide $guideBase)
    {
        $rowsCsv = SimpleExcelReader::create($guideBase->path_csv)->getRows();
        $rows = $rowsCsv->groupBy('section')->collect();

        return $rows->map(function ($section) {
            $section = $section->groupBy('index');

            return $section->map(function ($excerpt) {
                $chapters = [];
                $meta = $excerpt->reduce(function ($carry, $item) use (&$chapters) {
                    $carry[] = [
                        'book' => $item['book'],
                        'chapter' => $item['chapter'],
                    ];
                    $chapters[] = $item['chapter'];

                    return $carry;
                });
                $title = $this->replaceAbbrToFullName($excerpt[0]['book']).' '.collect($chapters)->join('-');

                return [
                    'key' => $excerpt[0]['index'],
                    'section' => $excerpt[0]['section'],
                    'title' => $title,
                    'meta' => $meta,
                ];
            });
        })->collapse();
    }

    private function replaceAbbrToFullName(string $abbr)
    {
        return match ($abbr) {
            'gn' => 'Gênesis',
            'ex' => 'Êxodo',
            'lv' => 'Levítico',
            'nm' => 'Números',
            'dt' => 'Deuteronômio',
            'js' => 'Josué',
            'jz' => 'Juízes',
            'rt' => 'Rute',
            '1sm' => '1 Samuel',
            '2sm' => '2 Samuel',
            '1rs' => '1 Reis',
            '2rs' => '2 Reis',
            '1cr' => '1 Crônicas',
            '2cr' => '2 Crônicas',
            'ed' => 'Esdras',
            'ne' => 'Neemias',
            'et' => 'Ester',
            'job' => 'Jó',
            'sl' => 'Salmos',
            'pv' => 'Provérbios',
            'ec' => 'Eclesiastes',
            'ct' => 'Cânticos',
            'is' => 'Isaías',
            'jr' => 'Jeremias',
            'lm' => 'Lamentações',
            'ez' => 'Ezequiel',
            'dn' => 'Daniel',
            'os' => 'Oséias',
            'jl' => 'Joel',
            'am' => 'Amós',
            'ob' => 'Obadias',
            'jn' => 'Jonas',
            'mq' => 'Miquéias',
            'na' => 'Naum',
            'hc' => 'Habacuque',
            'sf' => 'Sofonias',
            'ag' => 'Ageu',
            'zc' => 'Zacarias',
            'ml' => 'Malaquias',
            'mt' => 'Mateus',
            'mc' => 'Marcos',
            'lc' => 'Lucas',
            'jo' => 'João',
            'at' => 'Atos',
            'rm' => 'Romanos',
            '1co' => '1 Coríntios',
            '2co' => '2 Coríntios',
            'gl' => 'Gálatas',
            'ef' => 'Efésios',
            'fp' => 'Filipenses',
            'cl' => 'Colossenses',
            '1ts' => '1 Tessalonicenses',
            '2ts' => '2 Tessalonicenses',
            '1tm' => '1 Timóteo',
            '2tm' => '2 Timóteo',
            'tt' => 'Tito',
            'fm' => 'Filemon',
            'hb' => 'Hebreus',
            'tg' => 'Tiago',
            '1pe' => '1 Pedro',
            '2pe' => '2 Pedro',
            '1jo' => '1 João',
            '2jo' => '2 João',
            '3jo' => '3 João',
            'jd' => 'Judas',
            'ap' => 'Apocalipse',
            default => throw new Exception('Book Not found'.$abbr),
        };
    }
}
