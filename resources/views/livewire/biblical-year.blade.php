<div>
    <div class="max-w-7xl mx-auto columns-6 text-lg">
        <a href="#month-1" class="block underline text-center">Janeiro</a>
        <a href="#month-2" class="block underline text-center">Fevereiro</a>
        <a href="#month-3" class="block underline text-center">Março</a>
        <a href="#month-4" class="block underline text-center">Abril</a>
        <a href="#month-5" class="block underline text-center">Maio</a>
        <a href="#month-6" class="block underline text-center">Junho</a>
        <a href="#month-7" class="block underline text-center">Julho</a>
        <a href="#month-8" class="block underline text-center">Agosto</a>
        <a href="#month-9" class="block underline text-center">Setembro</a>
        <a href="#month-10" class="block underline text-center">Outubro</a>
        <a href="#month-11" class="block underline text-center">Novembro</a>
        <a href="#month-12" class="block underline text-center">Desembro</a>
    </div>
    @foreach ($chapterMonths as $month => $chapterMonth)
        <div class="bg-gray-300 rounded-[1rem] max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
            <div class="py-6 text-gray-900">
                <div class="text-6xl font-black pb-4 capitalize" id="month-{{ $month }}">{{ now()->setMonth($month)->translatedFormat('F') }}</div>
                <div class="columns-2">
                    @foreach ($chapterMonth as $chapter)
                        <div class="w-full even:bg-black/5 rounded-lg p-2 px-4 text-lg flex items-center">
                            <div class="w-8">{{ $chapter['day'] }}.</div>
                            <input @if($chapter->readed_at) checked @endif id="id" type="checkbox" value="true" class="w-5 h-5 bg-glade-green-300 border-glade-green-700 focus:ring-glade-green-600 focus:ring-2 text-glade-green-600 rounded cursor-pointer" wire:click="markReaded({{ $chapter->id }})">
                            <label for="default-checkbox" class="ms-2 font-medium">
                            {{ $chapter->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
