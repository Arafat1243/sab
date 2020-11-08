require('./waypoints.min.js')
import counterUp from 'counterup2'
const el = document.querySelectorAll('.counter')
new Waypoint({
    element: document.querySelector('.project-count'),
    handler: function() {
        counterUp(el[0])
        counterUp(el[1])
        counterUp(el[2])
        counterUp(el[3])
        this.destroy()
    },
    offset: 'bottom-in-view',
})