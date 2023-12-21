<?php

namespace App\Livewire;

use Livewire\Component;

class BiblicalYear extends Component
{
    public $chapters;

    public function mount($chapters)
    {
        $this->chapters = $chapters;
    }

    public function render()
    {
        $chapters = $this->chapters->groupBy('month');
        return view('livewire.biblical-year', [
            'chapterMonths' => $chapters,
        ]);
    }
}
