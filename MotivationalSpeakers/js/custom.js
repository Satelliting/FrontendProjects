$(document).ready(function () {
    // Event Size Slider
    $("#size-range").slider({
        range: true,
        min: 0,
        max: 600,
        step: 10,
        values: [20, 500],
        slide: function (event, ui) {
            var delay = function () {
                var handleIndex = $(ui.handle).index();
                var label = handleIndex == 1 ? '#min' : '#max';
                $(label).show();
                $(label).html(ui.value).position({
                    my: 'center top',
                    at: 'center bottom+10',
                    of: ui.handle,
                });
            };
            setTimeout(delay, 5);
        },
        // Handles AJAX Requests When Change To Slider Is Made
        change: function (event, ui) {
            var formString = $('form').serialize();

            // Gets Min/Max Values for database.php
            var minValue = document.getElementById('min').textContent;
            var maxValue = document.getElementById('max').textContent;

            formString = formString.concat('&minSize=', minValue, '&maxSize=', maxValue);

            $.ajax({
                type: 'GET',
                url: 'database.php',
                data: formString
            }).done(function (data) {
                // Resets Cards DIV
                $('#cards').empty();
                $.getJSON('form.json', function (events) {
                    /// Simple Way To Handle Image Selection
                    var x = 0;
                    for (var k in events) {
                        // Simple Way To Handle Event Time Manipulation
                        var eventTimeRange = 'hrs';
                        if (events[k]['eventTime'] == 1) { // Make singular
                            eventTimeRange = 'hr';
                        }
                        if (events[k]['eventTime'] < 1) { // Make minutes
                            events[k]['eventTime'] = 60 * events[k]['eventTime'];
                            eventTimeRange = 'mins';
                        }
                        // Create Readable Date
                        var cardDate = new Date(events[k]['eventDate']);
                        var entryDate = cardDate.toLocaleDateString("en-US", { month: 'short', day: 'numeric', year: 'numeric' });

                        // Card Entry Template
                        var cardEntry = `
                            <a class="card" href="#">
                                <div class="card-container">
                                    <div class="card-header">
                                        <img src="images/event-`+ (x % 2) + `.png" alt="Event ` + k + `"/>
                                        <h3><i class="fas fa-user event-icon"></i> `+ events[k]['eventSpeaker'] + ` &centerdot; ` + events[k]['eventTime'] + ` ` + eventTimeRange + `</h3>
                                    </div>
                                    <div class="card-body">
                                        <h3>`+ events[k]['eventName'] + `</h3>
                                        <h4>`+ entryDate + ` &centerdot; ` + events[k]['eventLocation'] + `</h4>
                                    </div>
                                </div>
                            </a>
                        `;
                        $('#cards').append(cardEntry);
                        x++;
                    }
                });

                return false;

            }).fail(function () { // Fail Safe (Should Never Happen)
                alert("Form Failure. Please notify company.");
            });
        }
    });

    $('#min').html($('#size-range').slider('values', 0)).position({
        my: 'center top',
        at: 'center bottom+10',
        of: $('#size-range span:eq(0)'),
    });

    $('#max').html($('#size-range').slider('values', 1)).position({
        my: 'center top',
        at: 'center bottom+10',
        of: $('#size-range span:eq(1)'),
    });


    // Initial Page Load AJAX Request
    $.ajax({
        type: 'GET',
        url: 'database.php'
    }).done(function (data) {
        $.getJSON('form.json', function (events) {
            var x = 0;
            for (var k in events) {
                var eventTimeRange = 'hrs';
                if (events[k]['eventTime'] == 1) {
                    eventTimeRange = 'hr';
                }
                if (events[k]['eventTime'] < 1) {
                    events[k]['eventTime'] = 60 * events[k]['eventTime'];
                    eventTimeRange = 'mins';
                }
                var cardDate = new Date(events[k]['eventDate']);
                var entryDate = cardDate.toLocaleDateString("en-US", { month: 'short', day: 'numeric', year: 'numeric' });
                var cardEntry = `
                    <a class="card" href="#">
                        <div class="card-container">
                            <div class="card-header">
                                <img src="images/event-`+ (x % 2) + `.png" alt="Event ` + k + `"/>
                                <h3><i class="fas fa-user event-icon"></i> `+ events[k]['eventSpeaker'] + ` &centerdot; ` + events[k]['eventTime'] + ` ` + eventTimeRange + `</h3>
                            </div>
                            <div class="card-body">
                                <h3>`+ events[k]['eventName'] + `</h3>
                                <h4>`+ entryDate + ` &centerdot; ` + events[k]['eventLocation'] + `</h4>
                            </div>
                        </div>
                    </a>
                `;
                $('#cards').append(cardEntry);
                x++;
            }
        });
        return false;

    }).fail(function () {
        alert("Form Failure. Please notify company.");
    });
});


// Listens For Form Changes To Create AJAX Request
document.querySelector('form').addEventListener('change', function () {
    var formString = $('form').serialize();

    var minValue = document.getElementById('min').textContent;
    var maxValue = document.getElementById('max').textContent;

    formString = formString.concat('&minSize=', minValue, '&maxSize=', maxValue);

    $.ajax({
        type: 'GET',
        url: 'database.php',
        data: formString
    }).done(function (data) {
        $('#response').html(data);
        $('#cards').empty();
        $.getJSON('form.json', function (events) {
            var x = 0;
            for (var k in events) {
                var eventTimeRange = 'hrs';
                if (events[k]['eventTime'] == 1) {
                    eventTimeRange = 'hr';
                }
                if (events[k]['eventTime'] < 1) {
                    events[k]['eventTime'] = 60 * events[k]['eventTime'];
                    eventTimeRange = 'mins';
                }
                var cardDate = new Date(events[k]['eventDate']);
                var entryDate = cardDate.toLocaleDateString("en-US", { month: 'short', day: 'numeric', year: 'numeric' });
                var cardEntry = `
                    <a class="card" href="#">
                        <div class="card-container">
                            <div class="card-header">
                                <img src="images/event-`+ (x % 2) + `.png" alt="Event ` + k + `"/>
                                <h3><i class="fas fa-user event-icon"></i> `+ events[k]['eventSpeaker'] + ` &centerdot; ` + events[k]['eventTime'] + ` ` + eventTimeRange + `</h3>
                            </div>
                            <div class="card-body">
                                <h3>`+ events[k]['eventName'] + `</h3>
                                <h4>`+ entryDate + ` &centerdot; ` + events[k]['eventLocation'] + `</h4>
                            </div>
                        </div>
                    </a>
                `;
                $('#cards').append(cardEntry);
                x++;
            }
        });

        return false;

    }).fail(function () {
        alert("Form Failure. Please notify company.");
    });
});






