import { router } from "@inertiajs/react";

export default function ListChapters({ title, idName, chapters }) {
    function handleMarkReaded(id) {
        router.patch(`/chapters/${id}`);
    }

    return (
        <div className="bg-gray-300 rounded-[1rem] max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8" id={idName}>
            <div className="py-6 text-gray-900">
                <h1 className="text-6xl font-black pb-4 capitalize font-serif">{title}</h1>
                <div className="columns-2">
                    {
                        chapters.map((chapter, index) => {
                            return (
                                <div className="w-full even:bg-black/5 rounded-lg p-2 px-4 text-lg flex items-center" key={index}>
                                    <div className="w-8">{chapter.day}</div>
                                    <input id={'c-' + chapter.id} defaultChecked={chapter.readed_at} type="checkbox" value="true" className="w-5 h-5 focus:ring-emerald-600 focus:ring-2 text-emerald-600 rounded cursor-pointer" onChange={() => handleMarkReaded(chapter.id)} />
                                    {/* wire:click="markReaded({{ $chapter->id }})"  */}
                                    <label htmlFor={'c-' + chapter.id} className="ms-2 font-medium cursor-pointer">
                                        {chapter.title}
                                    </label>
                                </div>
                            )
                        })
                    }
                </div>
            </div>
        </div>
    )
}
