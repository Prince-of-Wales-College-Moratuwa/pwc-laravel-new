<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Battle of The Golds</title>
        <?php
    $page = 'sports';
?>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Battle of The Golds | Prince of Wales' College" />
        <meta name="description"
            content="Experience the excitement of the Prince of Wales College Big Match (Battle of the Golds) – a legendary sporting showdown that defines tradition and rivalry. Join us for thrilling cricket action and unforgettable moments!" />
        <meta name="keywords"
            content="prince of wales college big match, prince of wales college vs st. Sebastian college, battle of the golds" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://princeofwales.edu.lk/battle-of-the-golds" />
        <meta property="og:title" content="Battle of The Golds | Prince of Wales' College" />
        <meta property="og:description"
            content="Experience the excitement of the Prince of Wales College Big Match (Battle of the Golds) – a legendary sporting showdown that defines tradition and rivalry. Join us for thrilling cricket action and unforgettable moments!" />
        <meta property="og:image"
            content="/content/img/img-sports/battle-of-the-golds-header-pwc.webp" />

        <!-- Twitter / WA / TG -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://princeofwales.edu.lk/battle-of-the-golds" />
        <meta property="twitter:title" content="Battle of The Golds | Prince of Wales' College" />
        <meta property="twitter:description"
            content="Experience the excitement of the Prince of Wales College Big Match (Battle of the Golds) – a legendary sporting showdown that defines tradition and rivalry. Join us for thrilling cricket action and unforgettable moments!" />
        <meta property="twitter:image"
            content="/content/img/img-sports/battle-of-the-golds-header-pwc.webp" />


        @include('includes.header')



        <style>
            .bog-page-header {
                background: linear-gradient(rgba(56, 24, 24, 0.7), rgba(56, 24, 24, 0.7)), url(content/img/img-sports/battle-of-the-golds-header-pwc.webp);
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .bog-page-header-inner {
                background: rgba(15, 23, 43, .7);
            }

        </style>

    </head>


<body>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 bog-page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">BATTLE OF THE GOLDS</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-1" id="about">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <p class="mb-4">The Prince of Wales'–St. Sebastian's Cricket Encounter (The Battle of the Golds)<br>is
                an annual cricket match played between PWC and SSC
                since 1933.<br>It is known as The Battle of the Golds due to the colours of the two school's
                flags i.e. Purple, Gold and Maroon of PWC<br>and Green, White & Gold of St.
                Sebastian's College.</p>
        </div>
    </div>

    <br>

    <div class="container" id="results">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">past Results</h6>
            <h1 class="mb-5">2-Day Matches</h1>
        </div>

        <div class="row g-4">
            @php
            $twodayplayed = DB::table('bigmatch_2day_results')->where('result', 'not like', '%not played%')->count();
            $twodaypwcWonCount = DB::table('bigmatch_2day_results')->whereRaw('LOWER(result) LIKE LOWER(?)', ['%Won by PWC%'])->count();
            $twodaysscWonCount = DB::table('bigmatch_2day_results')->whereRaw('LOWER(result) LIKE LOWER(?)', ['%Won by SSC%'])->count();
            $twodaynoResultCount = DB::table('bigmatch_2day_results')->whereRaw('LOWER(result) NOT LIKE LOWER(?) AND
            LOWER(result) NOT LIKE LOWER(?) AND LOWER(result) NOT LIKE LOWER(?)', ['%Won By PWC%', '%Won by SSC%', '%not
            played'])->count();
            @endphp

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $twodayplayed }}</h1>
                        <h5 class="mb-3">Matches Played</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $twodaypwcWonCount }}</h1>
                        <h5 class="mb-3">Matches Won By PWC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $twodaysscWonCount }}</h1>
                        <h5 class="mb-3">Matches Won by SSC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $twodaynoResultCount }}</h1>
                        <h5 class="mb-3">NR / Drawn</h5>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <center>
            <button class="btn btn-primary py-3 px-5 mt-2 wow zoomIn" id="show2dayresults">View Full Results
                Sheet</button>
        </center>
    </div>




    <div class="container mt-5">
        <table class="table table-bordered" id="2dayresults" style="display:none;">
            <thead class="thead-light">
                <tr>
                    <th rowspan='2'>Year</th>
                    <th rowspan='1' colspan="2">PWC</th>
                    <th rowspan='1' colspan="2">SSC</th>
                    <th>Result</th>
                </tr>
                <tr>
                    <th rowspan='1' colspan="1"></th>
                    <th rowspan='1' colspan="1">1st Innings</th>
                    <th rowspan='1' colspan="1">2nd Innings</th>
                    <th rowspan='1' colspan="1">1st Innings</th>
                    <th rowspan='1' colspan="1">2nd Innings</th>
                </tr>
            </thead>

            <tbody>
                @php
                $results = DB::table('bigmatch_2day_results')->orderBy('year', 'DESC')->get();
                @endphp

                @foreach ($results as $row)
                <tr>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->pwc_1st }}</td>
                    <td>{{ $row->pwc_2nd }}</td>
                    <td>{{ $row->ssc_1st }}</td>
                    <td>{{ $row->ssc_2nd }}</td>
                    <td>{{ $row->result }}</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="7">+ Batted First</td>
                </tr>
            </tbody>
        </table>
    </div>







    <br><br>

    <div class="container">

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">past Results</h6>
            <h1 class="mb-5">1-Day Limited Over Matches</h1>
        </div>

        <div class="row g-4">

            @php
            $onedayplayed = DB::table('bigmatch_1day_results')->where('result', 'NOT LIKE', '%not played%')->count();
            $onedaypwcWonCount = DB::table('bigmatch_1day_results')->where('result', 'LIKE', '%PWC Won%')->count();
            $onedaysscWonCount = DB::table('bigmatch_1day_results')->where('result', 'LIKE', '%SSC Won%')->count();
            $onedaynoResultCount = DB::table('bigmatch_1day_results')
            ->where('result', 'NOT LIKE', '%PWC Won%')
            ->where('result', 'NOT LIKE', '%SSC Won%')
            ->where('result', 'NOT LIKE', '%not played%')
            ->count();
            @endphp

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $onedayplayed }}</h1>
                        <h5 class="mb-3">Matches Played</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $onedaypwcWonCount }}</h1>
                        <h5 class="mb-3">Matches Won by PWC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $onedaysscWonCount }}</h1>
                        <h5 class="mb-3">Matches Won by SSC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $onedaynoResultCount }}</h1>
                        <h5 class="mb-3">NR / Drawn</h5>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <center>
            <button class="btn btn-primary py-3 px-5 mt-2 wow zoomIn" id="show1dayresults">View Full Results
                Sheet</button>
        </center>
    </div>


    <div class="container mt-5">
        <table class="table table-bordered" id="1dayresults" style="display:none;">
            <thead class="thead-light">
                <tr>
                    <td>Year</td>
                    <td>PWC</td>
                    <td>SSC</td>
                    <td>Result</td>
                </tr>
            </thead>

            @php
            $results = DB::table('bigmatch_1day_results')->orderBy('year', 'DESC')->get();
            @endphp

            @foreach ($results as $row)
            <tr>
                <td>{{ $row->year }}</td>
                <td>{{ $row->pwc }}</td>
                <td>{{ $row->ssc }}</td>
                <td>{{ $row->result }}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5">+ Batted First</td>
            </tr>
        </table>
    </div>





    <br><br>

    <div class="container">

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">past Results</h6>
            <h1 class="mb-5">T20 Matches</h1>
        </div>

        <div class="row g-4">

            @php
            $t20played = DB::table('bigmatch_t20_results')->count();
            $pwcWonCount = DB::table('bigmatch_t20_results')->whereRaw('LOWER(result) LIKE ?', ['%pwc won%'])->count();
            $sscWonCount = DB::table('bigmatch_t20_results')->whereRaw('LOWER(result) LIKE ?', ['%ssc won%'])->count();
            $noResultCount = DB::table('bigmatch_t20_results')->whereRaw('LOWER(result) NOT LIKE ? AND LOWER(result) NOT
            LIKE ?', ['%pwc won%', '%ssc won%'])->count();
            @endphp

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $t20played }}</h1>
                        <h5 class="mb-3">Matches Played</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $pwcWonCount }}</h1>
                        <h5 class="mb-3">Matches Won by PWC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $sscWonCount }}</h1>
                        <h5 class="mb-3">Matches Won by SSC</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3" style="color: maroon;">{{ $noResultCount }}</h1>
                        <h5 class="mb-3">No Results</h5>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <center><button class="btn btn-primary py-3 px-5 mt-2 wow zoomIn" id="showt20results">View Full Results
                Sheet</button></center>

    </div>



    <div class="container mt-5">
        <table class="table table-bordered" id="t20results" style="display:none;">
            <thead class="thead-light">
                <tr>
                    <th rowspan='2'>Year</th>
                    <th>PWC</th>
                    <th>SSC</th>
                    <th>Result</th>
                </tr>
            </thead>

            @php
            $t20Results = DB::table('bigmatch_t20_results')->orderBy('year', 'DESC')->get();
            @endphp

            @foreach ($t20Results as $row)
            <tr>
                <td>{{ $row->year }}</td>
                <td>{{ $row->pwc }}</td>
                <td>{{ $row->ssc }}</td>
                <td>{{ $row->result }}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="4">+ Batted First</td>
            </tr>
        </table>
    </div>


    <br><br>

    <div class="container" id="records">

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Cambrians'</h6>
            <h1 class="mb-5">RECORDS</h1>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-start text-primary pe-3"></h6>
                <h1 class="mb-4">2-Day Matches</h1>
                <p class="mb-4">In an exhilarating school cricket match, the Cambrian team etched their names into the
                    records with astounding achievements. Displaying remarkable prowess, they achieved the highest team
                    total of the season, amassing an impressive 280 runs. The team's star batsman shattered previous
                    records, notching up a stunning century in just 60 balls, leaving an indelible mark on the school's
                    cricket history.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Highest Score: 179 (not out)
                            by Nilantha Bopage in 1991
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Best Bowling: 7 for 33 by
                            Suranga Wijenayake in 1995</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Highest Total: 415/9 in 1958
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Lowest Total: 67 in 1984</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Highest Partnership: 247 by
                            WG Fernando and Sunil de Silva in 1960
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-start text-primary pe-3"></h6>
                <h1 class="mb-4">1-Day Matches</h1>
                <p class="mb-4">In a remarkable display of cricket prowess, the Cambrians of School 1 secured an
                    awe-inspiring victory in a day-long 50-over match. Their stellar performance left an indelible mark
                    in the annals of school sports history. With exceptional batting, bowling, and fielding skills, the
                    Cambrians clinched victory, etching their names as champions in a thrilling encounter.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Highest Total: 336/7 in 2023
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Lowest Total: 62 in 1982</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Highest Partnership: 197 Runs
                            Tharindu Amarasinghe and Rivith Jayasuriya in 2023</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-xxl py-5" id="captains">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">past</h6>
                <h1 class="mb-5">CAPTAINS</h1>
            </div>

            <div class="row g-4">
                @php
                $captains = DB::table('past_cricket_captains')->orderBy('id', 'DESC')->get();
                @endphp

                @foreach($captains as $captain)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $captain->name }}</h5>
                            <small>{{ $captain->year }}</small>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>



    <br><br>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var showButton = document.getElementById("show2dayresults");
            var myTable = document.getElementById("2dayresults");

            showButton.addEventListener("click", function () {
                if (myTable.style.display === "none") {
                    myTable.style.display = "table";
                } else {
                    myTable.style.display = "none";
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function () {
            var showButton = document.getElementById("show1dayresults");
            var myTable = document.getElementById("1dayresults");

            showButton.addEventListener("click", function () {
                if (myTable.style.display === "none") {
                    myTable.style.display = "table";
                } else {
                    myTable.style.display = "none";
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function () {
            var showButton = document.getElementById("showt20results");
            var myTable = document.getElementById("t20results");

            showButton.addEventListener("click", function () {
                if (myTable.style.display === "none") {
                    myTable.style.display = "table";
                } else {
                    myTable.style.display = "none";
                }
            });
        });

    </script>

    @include('includes.footer')


</body>

</html>