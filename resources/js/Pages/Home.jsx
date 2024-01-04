import ListChapters from '@/Components/ListChapters';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import dayjs from 'dayjs';

export default function Home({ auth, chapterMonths }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
        // header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Home</h2>}
        >
            <Head title="Home" />

            <div className="mt-4">
                <div className="max-w-7xl mx-auto gap-y-1 lg:gap-0 grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 text-lg">
                    {
                        Object.values(dayjs.months()).map(
                            (month) => <a href={`#` + month} key={month} className="block underline text-center">{month}</a>)
                    }
                </div>
                {
                    Object.values(chapterMonths).map(
                        ({ chapters, month }) => <ListChapters title={dayjs().month(month - 1).format('MMMM')} key={month} idName={dayjs().month(month - 1).format('MMMM')} chapters={chapters}></ListChapters>
                    )
                }
            </div>
        </AuthenticatedLayout >
    );
}
