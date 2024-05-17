<!DOCTYPE html>
<html lang="en">

<head>


    <title>Principal's Message</title>

    <?php
    $page = '';
?>

    <!-- Primary Meta Tags -->
    <meta name="title" content="Principal's Message | Prince of Wales' College" />
    <meta name="description" content="Discover the inspiring words of Principal at Prince of Wales College. Explore our commitment to academic excellence, co-curricular activities, and our rich history on this page. Join us on a journey of reflection, celebration, and anticipation for the future at Prince of Wales' College, Moratuwa." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://princeofwales.edu.lk/principal-message" />
    <meta property="og:title" content="Principal's Message | Prince of Wales' College" />
    <meta property="og:description" content="Discover the inspiring words of Principal at Prince of Wales College. Explore our commitment to academic excellence, co-curricular activities, and our rich history on this page. Join us on a journey of reflection, celebration, and anticipation for the future at Prince of Wales' College, Moratuwa." />
    <meta property="og:image"
        content="https://princeofwales.edu.lk/content/img/img-home/principal-pwc.webp" />

    <!-- Twitter / WA / TG -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://princeofwales.edu.lk/principal-message" />
    <meta property="twitter:title" content="Principal's Message | Prince of Wales' College" />
    <meta property="twitter:description" content="Discover the inspiring words of Principal at Prince of Wales College. Explore our commitment to academic excellence, co-curricular activities, and our rich history on this page. Join us on a journey of reflection, celebration, and anticipation for the future at Prince of Wales' College, Moratuwa." />
    <meta property="twitter:image"
        content="https://princeofwales.edu.lk/content/img/img-home/principal-pwc.webp" />


        @include('includes.header')

</head>

<body>

    <header>
        <br>


        <div class="container">
    <div class="row g-5">
        <?php
        $principalMessage = DB::select("SELECT * FROM principal_msg ORDER BY id DESC LIMIT 1");
        ?>
        <?php if($principalMessage): ?>
        <?php foreach($principalMessage as $row): ?>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
            <h6 class="section-title bg-white text-start text-primary pe-3"></h6>
            <h2 class="mb-4">Message from the Principal</h2>
            <h6 class="bg-white text-start text-primary ">{{ $row->name }}</h6>
            <p class="mb-4">{!! $row->msg !!}</p>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="position-relative ">
                <img class="img-fluid w-100 h-100"
                    src="<?php echo e(asset('content/img/img-home/' . $row->img)); ?>"
                    alt="principal-pwc" style="object-fit: cover; border-radius: 8px;">
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

    </header>

    <br>


    </div>
    @include('includes.footer')
</body>

</html>