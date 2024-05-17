<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $page = 'events';

?>
    <title>{{ $event->title }}</title>

    <!-- Meta Tags -->
    <meta name="title" content="{{ $event->title }}" />
    <meta name="description" content="{{ $event->about }}" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/events/'.$event->slug) }}" />
    <meta property="og:title" content="{{ $event->title }}" />
    <meta property="og:description" content="{{ $event->about }}" />
    <meta property="og:image" content="{{ asset('/content/img/img-events/'.$event->img) }}" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('/events/'.$event->slug) }}" />
    <meta property="twitter:title" content="{{ $event->title }}" />
    <meta property="twitter:description" content="{{ $event->about }}" />
    <meta property="twitter:image" content="{{ asset('/content/img/img-events/'.$event->img) }}" />

    @include('includes.header')
</head>
<body>
    <header>
        <!-- Event Detail Content -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $event->title }}</h1>
                    <br>
                    <p><i class="fa fa-calendar text-primary me-2"></i>Date: <b>{{ $event->date }}</b></p>
                    <p><i class="fa fa-clock text-primary me-2"></i>Time: <b>{{ $event->time }}</b></p>
                    <p><i class="fa fa-map-marker text-primary me-2"></i>Location: <b>{{ $event->location }}</b></p>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p><i class="fa fa-user text-primary me-2"></i>Event Organizer: <b>{{ $event->organizer_name }}</b></p>
                            <p><i class="fa fa-phone text-primary me-2"></i>Contact: {{ $event->organizer_phone }}</p>
                            <br>
                            <h3>About this Event</h3>
                            <p>{{ $event->about }}</p>

                            <h3>Agenda and other Details</h3>
                            <p>{{ $event->other_details }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <br><br>
                    <img src="{{ asset('/content/img/img-events/'.$event->img) }}" alt="{{ $event->img }}" class="img-fluid"
                        style="object-fit: cover; border-radius: 8px; max-width: 100%; height: auto; width: auto;">
                </div>
            </div>
        </div>
    </header>

    @include('includes.footer')
</body>
</html>