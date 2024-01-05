import ListExcerpts from '@/Components/ListExcerpts';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Home({ auth, month_excerpts }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
        // header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Home</h2>}
        >
            <Head title="Home" />

            <div className="mt-4">
                <div className="max-w-7xl mx-auto gap-y-1 lg:gap-0 grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 text-lg">
                    {
                        Object.values(month_excerpts).map(
                            ({ excerpts, section }) => <a href={`#` + section} key={section} className="block underline text-center">{section}</a>)
                    }
                </div>
                {
                    Object.values(month_excerpts).map(
                        ({ excerpts, section }) => <ListExcerpts title={section} key={section} idName={section} excerpts={excerpts}></ListExcerpts>
                    )
                }
            </div>
        </AuthenticatedLayout >
    );
}
