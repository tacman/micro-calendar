import { Controller } from '@hotwired/stimulus';
import {Calendar} from '@fullcalendar/core'
import interactionPlugin from '@fullcalendar/interaction'
import dayGridPlugin from '@fullcalendar/daygrid'

/*
* The following line makes this controller "lazy": it won't be downloaded until needed
* See https://github.com/symfony/stimulus-bridge#lazy-controllers
*/
/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['messages']
    static values = {
        events: Array,
        title: String,
        initialView: String,
    }

    connect() {
        console.log("Calendar Controller...!", this.identifier, this.eventsValue);
        // this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
        const calendar = new Calendar(this.element, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            plugins: [
                interactionPlugin,
                dayGridPlugin
            ],
            initialView: this.initialViewValue,
            editable: false,
            events: this.eventsValue
        })

        calendar.render()

    }

    // ...
}
