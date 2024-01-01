export default function ListChapters({ chapters, title }) {
    console.log(chapters)

    function formatChapterTitle() {

    }

    return (
        <div className="bg-gray-300 rounded-[1rem] max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
            <div className="py-6 text-gray-900">
                <div className="text-6xl font-black pb-4 capitalize">{title}</div>
                <div className="columns-2">
                    {
                        chapters.map((chapter, index) => {
                            return (
                                <div className="w-full even:bg-black/5 rounded-lg p-2 px-4 text-lg flex items-center" key={index}>
                                    <div className="w-8">{chapter.day}</div>
                                    <input defaultChecked={chapter.readed_at} id="id" type="checkbox" value="true" className="w-5 h-5 bg-glade-green-300 border-glade-green-700 focus:ring-glade-green-600 focus:ring-2 text-glade-green-600 rounded cursor-pointer" />
                                    {/* wire:click="markReaded({{ $chapter->id }})"  */}
                                    <label className="ms-2 font-medium">
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
