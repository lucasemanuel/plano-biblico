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
        $chapterDays = auth()->user()->chapterDays;
        $chaptersByMonth = $chapterDays
            ->groupBy('month')
            ->map(fn ($chapters, $month) => ['chapters' => $chapters, 'month' => $month]);

        return Inertia::render('Home', [
            'chapterMonths' => $chaptersByMonth
        ]);
    }
}
