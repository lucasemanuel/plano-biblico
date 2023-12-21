<?php
$temp = null;
?>
<div class="text-white">
    @foreach ($chapterMonths as $month => $chapterMonth)
        <div class="bg-gray-300 rounded-[1rem] max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
            <div class="py-6 text-gray-900">
                <div class="text-6xl font-black pb-4">{{ now()->setMonth($month)->format('F') }}</div>

                @foreach ($chapterMonth as $chapter)
                    <div class="w-full even:bg-black/10 rounded-lg p-2 px-4 text-lg flex items-center">
                        <div class="w-8">{{ $chapter['day'] }}.</div>
                        <input @if($chapter->readed_at) checked @endif id="id" type="checkbox" value="true" class="w-5 h-5 bg-cyan-700 border-cyan-800 focus:ring-cyan-500 focus:ring-2 text-cyan-500 rounded cursor-pointer" wire:click="markReaded({{ $chapter->id }})">
                        <label for="default-checkbox" class="ms-2 font-medium">
                        {{ $chapter->title }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
