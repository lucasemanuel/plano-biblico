<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /** User $user */
        $user = auth()->user();
        $excerpts = $user->readingGuides()
            ->latest()
            ->first()
            ->excerpts
            ->groupBy('section')
            ->map(fn ($excerpt, $section) => ['excerpts' => $excerpt, 'section' => $section]);

        return Inertia::render('Home', [
            'month_excerpts' => $excerpts,
        ]);
    }
}
