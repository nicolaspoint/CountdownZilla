/* ***************************************************
    ***********  COUNTDOWN  ******************************
*/

function getTimeRemaining(endtime) {

    var time = endtime.dataset.enddate;
    var now = Date.parse(new Date());
    var t = time - now;

    t = (t < 0) ? t * -1 : t;

    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));

    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

var endtime = document.getElementById('countdownzilla_plugin');

(function initializeClock(endtime) {
    //var clock = document.getElementById(id);

    var daysSpan = document.querySelector('.countdownzilla_days');
    var hoursSpan = document.querySelector('.countdownzilla_hours');
    var minutesSpan = document.querySelector('.countdownzilla_minutes');
    var secondsSpan = document.querySelector('.countdownzilla_seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
            //endtimeCounter();
            //endtimeUpdate();
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}(endtime))