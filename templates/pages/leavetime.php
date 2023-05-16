<div class="my-4 mx-4" id="calendar">

</div>

<script>
    $(function() {
        let windowHeight = $(window).height()
        let navHeight = $("nav").outerHeight(true)
        let calendarHeight = windowHeight - navHeight - 50
        let calendarElement = $("#calendar")[0]
        let calendar = new FullCalendar.Calendar(calendarElement, {
            initialView: "dayGridMonth",
            displayEventTime: false,
            height: calendarHeight,
            locale: "pl",
            buttonText: {
                today: "dzisiaj"
            },
            firstDay: 1,
            eventSources: [{
                url: 'leavetime/getEvents',
                method: 'POST',
                extraParams: {
                    status: "NIEPOTWIERDZONE"
                },
                failure: function() {
                    alert('there was an error while fetching events!');
                },
                color: 'red',
                textColor: 'black'
            }, {
                url: 'leavetime/getEvents',
                method: 'POST',
                extraParams: {
                    status: "POTWIERDZONE"
                },
                failure: function() {
                    alert('there was an error while fetching events!');
                },
                color: 'green',
                textColor: 'black'
            }],
        })
        calendar.render()
    })
</script>