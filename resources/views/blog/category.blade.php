<!DOCTYPE html>
<html lang="en">

<head>
    
@php 
  $page = 'blog'
  @endphp

    @include('includes.header')

    <?php
    use App\Models\PwcDbNews;

    $categoryslug = request()->route('categoryslug');
    $posts = PwcDbNews::where('categoryslug', $categoryslug)->orderBy('date', 'DESC')->get();
    $category = $posts->isNotEmpty() ? $posts->first()->category : '';

    if ($posts->isEmpty()) {
        return redirect()->to('https://princeofwales.edu.lk/404.php');
    }

    ?>

    <title>{{ $category }} Archives</title>

    <!-- SEO -->

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $category }} Archives | Prince of Wales' College" />
    <meta name="description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta name="keywords"
        content="prince of wales college blog, prince of wales college achievements, prince of wales college blog" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url"
        content="{{ url('/blog/category/' . strtolower($category)) }}" />
    <meta property="og:title"
        content="{{ $category }} | Prince of Wales' College" />
    <meta property="og:description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta property="og:image"
        content="{{ asset('/content/img/img-blog/blog-' . strtolower($category) . '-header-pwc.webp') }}" />

    <!-- Twitter / WA / TG -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url"
        content="{{ url('/blog/category/' . strtolower($category)) }}" />
    <meta property="twitter:title"
        content="{{ $category }} | Prince of Wales' College" />
    <meta property="twitter:description"
        content="Stay informed with the latest updates and insights from Prince of Wales College on our blog. Your source for educational excellence and campus happenings." />
    <meta property="twitter:image"
        content="{{ asset('/content/img/img-blog/blog-' . strtolower($category) . '-header-pwc.webp') }}" />

    <style>
        .category-page-header {
            background: linear-gradient(rgba(56, 24, 24, 0.7), rgba(56, 24, 24, 0.7)), url('/content/img/img-blog/blog-{{ strtolower($category) }}-header-pwc.webp');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .category-page-header-inner {
            background: rgba(15, 23, 43, .7);
        }
    </style>
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 category-page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="display-12 text-white text-uppercase animated slideInDown">category</h5>
                    <h1 class="display-3 text-white text-uppercase animated slideInDown">{{ $category }}</h1>
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
                    <a class="btn btn-link" href="{{ url('/blog') }}">All</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/sports') }}">Sports</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/aesthetic') }}">Aesthetic</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/education') }}">Education</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/academic') }}">Academic</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/announcements') }}">Announcements</a>
                    <a class="btn btn-link" href="{{ url('/blog/category/exclusives') }}">Exclusives</a>
            </center>

            <script>
                var currentUrl = window.location.href;
                var links = document.querySelectorAll('.btn-link');
                links.forEach(function(link) {
                    if (link.href === currentUrl) {
                        link.classList.add('active-link');
                    }
                });
            </script>

        </div>
    </div>

    <br><br>

    <div class="colorlib-blog colorlib-light-grey">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 animate-box wow fadeInUp">
                    <article class="article-entry">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="blog-img">
                            <img src="{{ asset('/content/img/img-blog/' . $post->photo) }}"
                                alt="{{ $post->photo }}" loading="lazy"><br><br>
                            <p class="meta"><span class="day">{{ $post->date }}</span> │ <span></span>
                                <span>{{ $post->category }}</span></p>
                        </a>
                        <div class="desc">
                            <h4><a href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a>
                            </h4>
                            <p>{{ htmlspecialchars(strip_tags($post->excerpt)) }}......</p>
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