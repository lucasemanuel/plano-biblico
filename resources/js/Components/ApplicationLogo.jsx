import { usePage } from '@inertiajs/react'

export default function ApplicationLogo(props) {
    const { app } = usePage().props

    return (
        <span className="text-emerald-700 font-extrabold text-lg" {...props} >
            {app.name}
        </span>
    );
}
