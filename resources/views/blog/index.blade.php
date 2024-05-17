<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page = 'blog';
    ?>
    <title>Blog</title>
    <!-- seo -->

    <!-- Primary Meta Tags -->
    <meta name="title" content="Blog | Prince of Wales' College" />
    <meta name="description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta name="keywords"
        content="prince of wales college blog, prince of wales college achievements, prince of wales college blog" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://princeofwales.edu.lk/blog/" />
    <meta property="og:title" content="Blog | Prince of Wales' College" />
    <meta property="og:description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta property="og:image" content="/content/img/img-blog/blog-header-pwc.webp" />

    <!-- Twitter / WA / TG -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://princeofwales.edu.lk/blog/" />
    <meta property="twitter:title" content="Blog | Prince of Wales' College" />
    <meta property="twitter:description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta property="twitter:image" content="/content/img/img-blog/blog-header-pwc.webp" />

    @include('includes.header')

    <style>
        .blog-page-header {
            background: linear-gradient(rgba(56, 24, 24, 0.7), rgba(56, 24, 24, 0.7)), url(/content/img/img-blog/blog-header-pwc.webp);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .blog-page-header-inner {
            background: rgba(15, 23, 43, .7);
        }

    </style>
</head>

<body>

    <body>
        <!-- Header Start -->
        <div class="container-fluid bg-primary py-5 mb-5 blog-page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">BLOG</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <style>
            .active-link {
                color: #ff0000;

            }

        </style>

        <div class="container-xxl py-1">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <center>
                    <div class="col-lg-9 col-md-6">
                        <p class="mb-4">Filter by Category;</p>
                        <a class="btn btn-link active-link" href="/blog">All</a>
                        <a class="btn btn-link" href="/blog/category/sports">Sports</a>
                        <a class="btn btn-link" href="/blog/category/aesthetic">Aesthetic</a>
                        <a class="btn btn-link" href="/blog/category/education">Education</a>
                        <a class="btn btn-link" href="/blog/category/academic">Academic</a>
                        <a class="btn btn-link" href="/blog/category/announcements">Announcements</a>
                        <a class="btn btn-link" href="/blog/category/exclusives">Exclusives</a>

                </center>
            </div>
        </div>

        <br><br>


        <div class="colorlib-blog colorlib-light-grey">
            <div class="container">
                <div class="row">
                    @php
                        $news = DB::table('pwc_db_news')->orderByDesc('date')->orderByDesc('id')->get();
                    @endphp

                    @foreach ($news as $row)
                    <div class="col-md-4 animate-box wow fadeInUp ">
                        <article class="article-entry">
                            <a href="/blog/{{ $row->slug }}" class="blog-img">
                                <img src="/content/img/img-blog/{{ $row->photo }}" alt="{{ $row->photo }}"
                                    loading="lazy"><br><br>
                                <p class="meta"><span class="day">{{ $row->date }}</span> │ <span></span>
                                    <span>{{ $row->category }}</span></p>
                            </a>
                            <div class="desc">
                                <h4><a href="/blog/{{ $row->slug }}">{{ $row->title }}</a></h4>
                                <p>{{ htmlspecialchars(strip_tags($row->excerpt)) }}......</p>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('includes.footer')

    </body>

</html>