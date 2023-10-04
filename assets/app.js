/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import './bootstrap.js';
import { Calendar } from '@fullcalendar/core'
import interactionPlugin from '@fullcalendar/interaction'
import dayGridPlugin from '@fullcalendar/daygrid'
// //
const calendarEl = document.getElementById('calendar')
const calendar = new Calendar(calendarEl, {
    plugins: [
        interactionPlugin,
        dayGridPlugin
    ],
    initialView: 'dayGridMonth',
    editable: false,
    events: [
        { title: 'Meeting', start: new Date() },
        { title: 'Another Meeting', start: new Date() }
    ]
})

calendar.render()
