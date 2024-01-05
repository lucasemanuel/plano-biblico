import { router } from "@inertiajs/react";

export default function ListExcerpts({ title, idName, excerpts }) {
    function handleMarkReaded(event, id) {
        router.patch(`/excerpt/${id}`, {}, {
            preserveScroll: true
        });
    }

    return (
        <div className="bg-gray-300 rounded-[1rem] max-w-7xl mx-4 xl:mx-auto mt-8 p-4 sm:px-6 lg:px-8" id={idName}>
            <div className="sm:py-2 text-gray-900">
                <h1 className="text-4xl sm:text-6xl font-black pb-4 capitalize font-serif">{title}</h1>
                <div className="md:columns-2 xl:columns-3">
                    {
                        excerpts.map((excerpt, index) => {
                            return (
                                <div className="w-full even:bg-black/5 rounded-lg p-2 px-4 text-lg flex items-center" key={index}>
                                    <span className="min-w-8">{excerpt.key}.</span>
                                    <input id={'c-' + excerpt.id} defaultChecked={excerpt.readed_at} type="checkbox" value="true" className="w-5 h-5 focus:ring-emerald-600 focus:ring-2 text-emerald-600 rounded cursor-pointer" onChange={(event) => handleMarkReaded(event, excerpt.id)} />
                                    <label htmlFor={'c-' + excerpt.id} className="ms-2 font-medium cursor-pointer">
                                        {excerpt.title}
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
