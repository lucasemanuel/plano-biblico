import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Excerpt({ auth, book, chapters, title }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        // header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{book}</h2>}
        >
            <Head title={title} />

            <div className="mt-4">
                <div className="max-w-7xl mx-auto gap-y-1 text-lg">
                    <div className="max-w-3xl mx-4 xl:mx-auto mt-8 p-4 sm:px-6 lg:px-8 font-serif font-normal">
                        <h1 className="text-5xl font-bold text-gray-800 mb-8">{book}</h1>
                        {
                            Object.values(chapters).map((chapter) => {
                                return (
                                    <article className="mb-6">
                                        {
                                            Object.values(chapter.verses).map((verse, index) => {
                                                return (
                                                    <p className={`${verse.verse == 1 && ''}`} key={`v-${index}`}>
                                                        <span className={`text-5xl font-bold text-gray-800 mr-3 float-left ${verse.verse != 1 && 'hidden'}`} key={chapter.number}>{chapter.number}</span>
                                                        <span className={`mr-2 text-sm text-gray-700 font-extrabold ${verse.verse == 1 && 'hidden'}`}>{verse.verse}</span>
                                                        <span className="text-gray-600" >{String(verse.text).replace(/&quot;/g, '"')}</span>
                                                    </p>
                                                )
                                            })
                                        }
                                    </article>
                                )
                            })
                        }
                    </div>
                </div>
            </div>
        </AuthenticatedLayout >
    );
}
