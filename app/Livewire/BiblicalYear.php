<?php

namespace App\Livewire;

use App\Models\ChapterDay;
use Livewire\Component;

class BiblicalYear extends Component
{
    public $chapters;

    public function mount($chapters)
    {
        $this->chapters = $chapters;
    }

    public function markReaded($id)
    {
        ChapterDay::toogleReaded($id)->save();
    }

    public function render()
    {
        $chapters = $this->chapters->groupBy('month');
        return view('livewire.biblical-year', [
            'chapterMonths' => $chapters,
        ]);
    }
}
