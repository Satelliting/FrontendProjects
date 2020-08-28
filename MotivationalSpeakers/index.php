<!DOCTYPE html>
<html lang="en">
<head>

    <!-- META Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Motivational Speakers, LLC is the premier agent for you to find your next big speaker for your event." />
    <meta name="author" content="William Jordan Allen" />

    <!-- Google CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <!-- jQuery CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Title -->
    <title>Motivational Speakers, LLC</title>
</head>
<body>
    <!-- Navigation -->
    <div class="nav">
        <div class="container">
            <a class="nav-logo" href="#"><img src="images/logo.svg" alt="Motivational Speakers, LLC" /></a>
            <div class="nav-links">
                <a class="nav-button active"href="#">Home</a>
                <a class="nav-button"href="#">About</a>
                <a class="nav-button"href="#">Company</a>
                <a class="nav-button"href="#">Get in Touch</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="header-text">
                <h1 class="header-h1">Find the right event for <span class="special-text">you</span></h1>
                <p class="header-p">
                    From weddings to birthdays and all in between, the world needs speakers like you.  And not just any speaker - really good ones.  If you think you've got the strongest, most confident voice in the room, use it to broadcast a message that people want to hear.
                </p>
                <p class="header-p cta">
                    Yeah, we didn't think it could get any better either.
                </p>
                <a class="button header-button"href="#"><i class="fas fa-map-marker-alt button-icon"></i> Find an Event</a>
                <a class="button header-button clear"href="#"><i class="fas fa-phone-alt button-icon special-text"></i> Get in Touch</a>
            </div>
            <div class="header-img">
                <img src="images/top-graphic.png" alt="Various Events Where Our Team Spoke" />
            </div>
        </div>
    </div>

    <!-- Events -->
    <div class="events">
        <div class="container">
            <h2 class="events-header">Events for <span class="special-text">every occasion</span></h2>
        </div>
        <div class="container form-container">
            <!-- Cards -->
            <div class="cards" id="cards">
            </div>
            <!-- Form -->
            <form class="form">
                <fieldset>
                    <div class="form-group">
                        <div class="time">
                            <input type="radio" class="time-input" name="time" value="future" id="future" checked />
                            <label for="future" class="time-label time-label-off">In the Future</label>
                            <input type="radio" class="time-input" name="time" value="past" id="past" />
                            <label for="past" class="time-label time-label-on">In the Past</label>
                            <span class="time-selection"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-search form-keyword"></i>
                        <input class="form-keyword" type="text" name="keyword" placeholder="Search by name or location..." />
                    </div>
                    <div class="form-group">
                        <label for="location">Event Location</label>
                        <select class="form-location" name="location" id="location">
                            <option value="any">Anywhere</option>
                            <option value="atlanta">Atlanta, GA</option>
                            <option value="lawrenceville">Lawrenceville, GA</option>
                        </select>
                        <i class="fas fa-chevron-down form-location"></i>
                    </div>
                    <div class="form-group">
                        <label for="length">Event Length</label>
                        <div class="form-length">
                            <select class="form-length" name="minLength" id="minLength">
                                <option value="0">Any</option>
                                <option value="1">1 hour</option>
                                <option value="2">2 hours</option>
                                <option value="3">3 hours</option>
                                <option value="4">4 hours</option>
                                <option value="5">5 hours</option>
                                <option value="6">6 hours</option>
                                <option value="7">7 hours</option>
                                <option value="8">8 hours</option>
                                <option value="9">9 hours</option>
                            </select>
                            <i class="fas fa-chevron-down form-length"></i>
                            <span class="form-length">to</span>
                            <select class="form-length" name="maxLength" id="maxLength">
                                <option value="0">Any</option>
                                <option value="1">1 hour</option>
                                <option value="2">2 hours</option>
                                <option value="3">3 hours</option>
                                <option value="4">4 hours</option>
                                <option value="5">5 hours</option>
                                <option value="6">6 hours</option>
                                <option value="7">7 hours</option>
                                <option value="8">8 hours</option>
                                <option value="9">9 hours</option>
                            </select>
                            <i class="fas fa-chevron-down form-length"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cost">Seat Cost</label>
                        <div class="form-cost">
                            <i class="fas fa-dollar-sign form-cost"></i>
                            <input class="inline form-cost" type="text" name="minCost" placeholder="Min" />
                            <span class="form-cost">to</span>
                            <i class="fas fa-dollar-sign form-cost"></i>
                            <input class="inline form-cost" type="text" name="maxCost" placeholder="Max" />
                        </div>
                    </div>
                    <div class="form-group size">
                        <label for="size">Event Size</label>
                        <div id="size-range"></div>
                        <div id="min"></div>
                        <div id="max"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-text">
                Copyright &copy; Motivational Speakers, LLC All Rights Reserved.
            </div>
            <div class="footer-links">
                <a class="footer-icon" href="#"><i class="fab fa-twitter"></i></a>
                <a class="footer-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="footer-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- jQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>