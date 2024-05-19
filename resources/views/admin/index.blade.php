<?php

$page = 'index';

	$articlesCount = DB::table('pwc_db_news')->count();
    $eventsCount = DB::table('pwc_db_events')->count(); 
    $formSubmissionsCount = DB::table('pwc_db_al25')->count(); 
    $studentInfoFormSubmissionsCount = DB::table('student_information')->count();

?>

@include ('admin.admin-header')


<div class="container-fluid py-4">
    <div class="dropdown">
        <h1 class="mb-5"> Dashboard
            <i class="dropdown-icon fas fa-caret-down"></i></h1>

        <div class="dropdown-content">
            <a class="nav-link <?php if ($page === 'index') echo 'active'; ?>" href="index.php"><img
                    src="/resources/admin/ion-icon/dashboard.png" width="20px">&nbsp <b>DASHBOARD</b></a>
            <a class="nav-link <?php if ($page === 'blog') echo 'active'; ?>" href="blog.php"><img
                    src="/resources/admin/ion-icon/news.png" width="20px">&nbsp <b>Blog</b></a>
            <a class="nav-link <?php if ($page === 'events') echo 'active'; ?>" href="events.php"><img
                    src="/resources/admin/ion-icon/events.png" width="20px">&nbsp <b>EVENTS</b></a>
            <a class="nav-link <?php if ($page === 'principal-msg') echo 'active'; ?>"
                href="principal-msg.php?id=1"><img src="/resources/admin/ion-icon/events.png" width="20px">&nbsp
                Principal's
                Msg</a>
            <a class="nav-link <?php if ($page === 'past-principals') echo 'active'; ?>" href="past-principals.php"><img
                    src="/resources/admin/ion-icon/events.png" width="20px">&nbsp Past Principals</a>
            <a class="nav-link <?php if ($page === 'school-admins') echo 'active'; ?>" href="school-admins.php"><img
                    src="/resources/admin/ion-icon/events.png" width="20px">&nbsp School Admins</a>
            <a class="nav-link <?php if ($page === 'prefects-topboard') echo 'active'; ?>"
                href="prefects-topboard.php"><img src="/resources/admin/ion-icon/events.png" width="20px">&nbsp Prefect
                Topboard</a>
            <a class="nav-link <?php if ($page === 'past-prefects') echo 'active'; ?>" href="past-prefects.php"><img
                    src="/resources/admin/ion-icon/events.png" width="20px">&nbsp Past Headprefects</a>
            <a class="nav-link <?php if ($page === 'bigmatch') echo 'active'; ?>" href="bigmatch/bigmtach.php"><img
                    src="/resources/resources/admin/ion-icon/events.png" width="20px">&nbsp Big Match</a>
            <a class="nav-link" href="logout.php"><img src="/resources/resources/admin/ion-icon/logout.png"
                    width="20px">&nbsp Logout</a>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">{{ $articlesCount }}</h1>
                    <h5 class="text-center">Articles</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">{{ $eventsCount }}</h1>
                    <h5 class="text-center">Events</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">{{ $formSubmissionsCount }}</h1>
                    <h5 class="text-center">Form Submissions (AL)</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">{{ $studentInfoFormSubmissionsCount }}</h1>
                    <h5 class="text-center">Form Submissions (Students Info)</h5>
                </div>
            </div>
        </div>
    </div>

</div>

@include ('admin.admin-footer')
