import { router } from "@inertiajs/react";

export default function ListChapters({ title, idName, chapters }) {
    function handleMarkReaded(event, id) {
        router.patch(`/chapters/${id}`, {}, {
            preserveScroll: true
        });
    }

    return (
        <div className="bg-gray-300 rounded-[1rem] max-w-7xl mx-4  mt-8 p-4 sm:px-6 lg:px-8" id={idName}>
            <div className="sm:py-2 text-gray-900">
                <h1 className="text-4xl sm:text-6xl font-black pb-4 capitalize font-serif">{title}</h1>
                <div className="md:columns-2 xl:columns-3">
                    {
                        chapters.map((chapter, index) => {
                            return (
                                <div className="w-full even:bg-black/5 rounded-lg p-2 px-4 text-lg flex items-center" key={index}>
                                    <div className="w-8">{chapter.day}</div>
                                    <input id={'c-' + chapter.id} defaultChecked={chapter.readed_at} type="checkbox" value="true" className="w-5 h-5 focus:ring-emerald-600 focus:ring-2 text-emerald-600 rounded cursor-pointer" onChange={(event) => handleMarkReaded(event, chapter.id)} />
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
