import { usePage } from '@inertiajs/react'

export default function ApplicationLogo({ className = '', ...props }) {
    const { app } = usePage().props

    return (
        <span {...props} className={
            'text-emerald-700 font-extrabold text-lg ' +
            className
        } >
            {app.name}
        </span >
    );
}
