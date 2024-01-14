<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bibleBooks = collect([
            ["Gênesis", "gn"],
            ["Êxodo", "ex"],
            ["Levítico", "lv"],
            ["Números", "nm"],
            ["Deuteronômio", "dt"],
            ["Josué", "js"],
            ["Juízes", "jz"],
            ["Rute", "rt"],
            ["1º Samuel", "1sm"],
            ["2º Samuel", "2sm"],
            ["1º Reis", "1rs"],
            ["2º Reis", "2rs"],
            ["1º Crônicas", "1cr"],
            ["2º Crônicas", "2cr"],
            ["Esdras", "ed"],
            ["Neemias", "ne"],
            ["Ester", "et"],
            ["Jó", "job"],
            ["Salmos", "sl"],
            ["Provérbios", "pv"],
            ["Eclesiastes", "ec"],
            ["Cânticos", "ct"],
            ["Isaías", "is"],
            ["Jeremias", "jr"],
            ["Lamentações de Jeremias", "lm"],
            ["Ezequiel", "ez"],
            ["Daniel", "dn"],
            ["Oséias", "os"],
            ["Joel", "jl"],
            ["Amós", "am"],
            ["Obadias", "ob"],
            ["Jonas", "jn"],
            ["Miquéias", "mq"],
            ["Naum", "na"],
            ["Habacuque", "hc"],
            ["Sofonias", "sf"],
            ["Ageu", "ag"],
            ["Zacarias", "zc"],
            ["Malaquias", "ml"],
            ["Mateus", "mt"],
            ["Marcos", "mc"],
            ["Lucas", "lc"],
            ["João", "jo"],
            ["Atos", "at"],
            ["Romanos", "rm"],
            ["1ª Coríntios", "1co"],
            ["2ª Coríntios", "2co"],
            ["Gálatas", "gl"],
            ["Efésios", "ef"],
            ["Filipenses", "fp"],
            ["Colossenses", "cl"],
            ["1ª Tessalonicenses", "1ts"],
            ["2ª Tessalonicenses", "2ts"],
            ["1ª Timóteo", "1tm"],
            ["2ª Timóteo", "2tm"],
            ["Tito", "tt"],
            ["Filemom", "fm"],
            ["Hebreus", "hb"],
            ["Tiago", "tg"],
            ["1ª Pedro", "1pe"],
            ["2ª Pedro", "2pe"],
            ["1ª João", "1jo"],
            ["2ª João", "2jo"],
            ["3ª João", "3jo"],
            ["Judas", "jd"],
            ["Apocalipse", "ap"]
        ]);

        $bibleBooks->each(
            function ($book, $index) {
                DB::unprepared("update bible_verses set book_name = '" . $book[0] . "', book_abbrev = '" . $book[1] . "' where book_abbrev = '$index'");
            }
        );
    }
}
