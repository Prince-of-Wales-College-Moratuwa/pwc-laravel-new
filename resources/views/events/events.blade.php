<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $page = 'events';

?>

<title>Events</title>

    <!-- seo -->

<!-- Primary Meta Tags -->
<meta name="title" content="Events" />
<meta name="description" content="Explore Prince of Wales College's vibrant event calendar, packed with exciting educational and cultural experiences for students and the community." />
<meta name="keywords" content="prince of wales college events, prince of wales college event calender" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://princeofwales.edu.lk/events/" />
<meta property="og:title" content="Events" />
<meta property="og:description" content="Explore Prince of Wales College's vibrant event calendar, packed with exciting educational and cultural experiences for students and the community." />
<meta property="og:image" content="/content/img/img-events/event-header-pwc.webp" />

<!-- Twitter / WA / TG -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://princeofwales.edu.lk/events/" />
<meta property="twitter:title" content="Events" />
<meta property="twitter:description" content="Explore Prince of Wales College's vibrant event calendar, packed with exciting educational and cultural experiences for students and the community." />
<meta property="twitter:image" content="/content/img/img-events/event-header-pwc.webp" />

@include('includes.header')


    <style>
        .event-page-header {
            background: linear-gradient(rgba(56, 24, 24, 0.7), rgba(56, 24, 24, 0.7)), url(/content/img/img-events/event-header-pwc.webp);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .event-page-header-inner {
            background: rgba(15, 23, 43, .7);
        }
    </style>

</head>

<body>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 event-page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">EVENTS</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- up Events Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">

            @php
                $currentDate = date("Y-m-d"); 
                $upcomingEvents = [];
                $pastEvents = [];

                $events = DB::table('pwc_db_events')->orderBy('date', 'DESC')->get();

                foreach ($events as $row) {
                    if ($row->date > $currentDate) {
                        $upcomingEvents[] = $row;
                    } else {
                        $pastEvents[] = $row;
                    }
                }
            @endphp

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Upcoming events</h6>
                <br><br>
            </div>

            @if (empty($upcomingEvents))
                <div class="text-center">
                    <i class="fas fa-exclamation-circle text-primary mb-4"></i>
                    &nbsp; No Upcoming Events to Show
                </div>
            @else
                @foreach ($upcomingEvents as $row)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" loading="lazy" src="/content/img/img-events/{{ $row->img }}" alt="{{ $row->img }}" style="width: auto;">
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h4 class="mb-4">{{ $row->title }}</h4>
                            </div>
                            <div class="w-100 d-flex justify-content-center bottom-0 start-0 mb-4">
                                <a href="/events/{{ $row->slug }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30 30 30px;">Read More</a>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar text-primary me-2"></i>{{ $row->date }}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-map-marker text-primary me-2"></i>{{ $row->location }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Past events</h6>
                <br><br>
            </div>

            @foreach ($pastEvents as $row)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" loading="lazy" src="/content/img/img-events/{{ $row->img }}" alt="{{ $row->img }}" style="width: auto;">
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h4 class="mb-4">{{ $row->title }}</h4>
                        </div>
                        <div class="w-100 d-flex justify-content-center bottom-0 start-0 mb-4">
                            <a href="/events/{{ $row->slug }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30 30 30px;">Read More</a>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar text-primary me-2"></i>{{ $row->date }}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-map-marker text-primary me-2"></i>{{ $row->location }}</small>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>






    @include('includes.footer')

</body>

</html>