import ListChapters from '@/Components/ListChapters';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import dayjs from 'dayjs';


export default function Dashboard({ auth, chapterMonths }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
        // header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="mt-4">
                <div className="max-w-7xl mx-auto columns-6 text-lg">
                    <a href="#month-1" className="block underline text-center">Janeiro</a>
                    <a href="#month-2" className="block underline text-center">Fevereiro</a>
                    <a href="#month-3" className="block underline text-center">Março</a>
                    <a href="#month-4" className="block underline text-center">Abril</a>
                    <a href="#month-5" className="block underline text-center">Maio</a>
                    <a href="#month-6" className="block underline text-center">Junho</a>
                    <a href="#month-7" className="block underline text-center">Julho</a>
                    <a href="#month-8" className="block underline text-center">Agosto</a>
                    <a href="#month-9" className="block underline text-center">Setembro</a>
                    <a href="#month-10" className="block underline text-center">Outubro</a>
                    <a href="#month-11" className="block underline text-center">Novembro</a>
                    <a href="#month-12" className="block underline text-center">Desembro</a>
                </div>
                {
                    Object.values(chapterMonths).map(
                        ({ chapters, month }) => <ListChapters title={dayjs().month(month - 1).format('MMMM')} key={month} chapters={chapters}></ListChapters>
                    )
                }
            </div>
        </AuthenticatedLayout >
    );
}
