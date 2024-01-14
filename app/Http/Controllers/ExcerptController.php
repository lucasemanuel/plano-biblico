<?php

namespace App\Http\Controllers;

use App\Models\BibleVerse;
use App\Models\Excerpt;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExcerptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Excerpt $excerpt)
    {
        $chapters = collect($excerpt->meta)->map(fn ($exc) => $exc['chapter']);
        $numbers = [];
        $chapters = BibleVerse::whereBookAbbrev($excerpt->meta[0]['book'])
            ->whereIn('chapter', $chapters)
            ->get()
            ->groupBy('chapter')
            ->map(function ($chapter, $index) use (&$numbers) {
                $numbers[] = $index;

                return ['verses' => $chapter, 'number' => $index];
            });

        $title = $chapters->first()['verses'][0]['book_name'].' '.implode(', ', $numbers);

        return Inertia::render('Excerpt', [
            'book' => $chapters->first()['verses'][0]['book_name'],
            'chapters' => $chapters,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Excerpt $excerpt)
    {
        $excerpt->toogleReaded();
        $excerpt->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
