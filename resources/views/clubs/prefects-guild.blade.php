<!DOCTYPE html>
<html lang="en">
<title>Prefects' Guild</title>

<head>
    <?php
    $page = 'clubs';
?>


    <!-- Primary Meta Tags -->
    <meta name="title" content="Prefects' Guild | Prince of Wales' College" />
    <meta name="description"
        content="Elevating Leadership: Join the Prince of Wales College Prefects' Guild. Empowerment, Excellence, and Unity in Action. Discover your leadership potential today!" />
    <meta name="keywords" content="prince of wales college prefects, wales prefects guild" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://princeofwales.edu.lk/about/prefects-guild" />
    <meta property="og:title" content="Prefects' Guild | Prince of Wales' College" />
    <meta property="og:description"
        content="Elevating Leadership: Join the Prince of Wales College Prefects' Guild. Empowerment, Excellence, and Unity in Action. Discover your leadership potential today!" />
    <meta property="og:image"
        content="https://princeofwales.edu.lk/content/img/img-about/prefects/prefects-guild-header.webp" />

    <!-- Twitter / WA / TG -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://princeofwales.edu.lk/about/prefects-guild" />
    <meta property="twitter:title" content="Prefects' Guild | Prince of Wales' College" />
    <meta property="twitter:description"
        content="Elevating Leadership: Join the Prince of Wales College Prefects' Guild. Empowerment, Excellence, and Unity in Action. Discover your leadership potential today!" />
    <meta property="twitter:image"
        content="https://princeofwales.edu.lk/content/img/img-about/prefects/prefects-guild-header.webp" />
.

@include('includes.header')




    <style>
        .prefects-guild-header {
            background: linear-gradient(rgba(56, 24, 24, 0.7), rgba(56, 24, 24, 0.7)), url(/content/img/img-about/prefects/prefects-guild-header.webp);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .prefects-guild-header-inner {
            background: rgba(15, 23, 43, .7);
        }
    </style>

</head>


<body>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 prefects-guild-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">PREFECTS' GUILD</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl ">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"></h6>
                <h1 class="mb-5">TOP BOARD</h1>
            </div>
            <?php
$prefectTopboard = DB::table('about_prefect_topboard')->where('id', 1)->get();
?>
@if($prefectTopboard->isNotEmpty())
    @foreach($prefectTopboard as $row)
        <div class="row g-4">
            <center>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="/content/img/img-about/prefects/{{ $row->img }}" alt="Head Prefect"
                                style="width: auto;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $row->name }}</h5>
                            <small>{{ $row->post }}</small>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    @endforeach
@endif

            <br><br>




            <div class="row g-4">

            <?php
$prefectTopboard = DB::table('about_prefect_topboard')->where('id', '<>', 1)->get();
?>
@if($prefectTopboard->isNotEmpty())
    @foreach($prefectTopboard as $row)
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="/content/img/img-about/prefects/{{ $row->img }}" alt="Deputy Head Prefect"
                        style="width: auto;">
                </div>

                <div class="text-center p-4">
                    <h5 class="mb-0">{{ $row->name }}</h5>
                    <small>{{ $row->post }}</small>
                </div>
            </div>
        </div>
    @endforeach
@endif



            </div>

        </div>
    </div>




    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">past</h6>
                <h1 class="mb-5">HEAD PREFECTS</h1>
            </div>

            <div class="row g-4">

            <?php
$pastHeadPrefects = DB::table('about_past_headprefects')->orderBy('id', 'DESC')->get();
?>
@if($pastHeadPrefects->isNotEmpty())
    @foreach($pastHeadPrefects as $row)
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="text-center p-4">
                    <h5 class="mb-0">{{ $row->name }}</h5>
                    <small>{{ $row->year }}</small>
                </div>
            </div>
        </div>
    @endforeach
@endif

            

            </div>

        </div>
    </div>




    @include('includes.footer')

</body>

</html>
