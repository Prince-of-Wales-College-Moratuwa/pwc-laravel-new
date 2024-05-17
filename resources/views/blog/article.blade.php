<!DOCTYPE html>
<html lang="en">
<head>

  @php 
  $page = 'blog'
  @endphp

    <title>{{ $post->title }}</title>

    <!-- Meta Tags -->
    <meta name="title" content="{{ $post->title }}" />
    <meta name="description" content="{{ $post->excerpt }}" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:url" content="{{ url('/blog/'.$post->slug) }}" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{!! $post->excerpt !!}" />
    <meta property="og:image" content="{{ url('/content/img/img-blog/'.$post->photo) }}" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('/blog/'.$post->slug) }}" />
    <meta property="twitter:title" content="{{ $post->title }}" />
    <meta property="twitter:description" content="{!! $post->excerpt !!}" />
    <meta property="twitter:image" content="{{ url('/content/img/img-blog/'.$post->photo) }}" />

    @include('includes.header')

    <br>
    <!-- Additional CSS or JavaScript -->
</head>
<body>
    @if ($post->schoolPride == 'ON')
        <!-- Confetti code -->
        <div class="confetti-container"></div>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
        <script>
            var end = Date.now() + (1 * 1000);
            var colors = ['#800080', '#ffd700', '#800000'];
            (function frame() {
                confetti({
                    particleCount: 3,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    colors: colors
                });
                confetti({
                    particleCount: 3,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    colors: colors
                });
                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            }());
        </script>
    @endif

    <header>
        <!-- Blog Content -->
        <!-- Mobile layout -->
        <article class="mobile-layout">
            <div class="container">
                <div class="row g-5">
                    <div class="col-12 wow fadeInUp">
                        <a href="{{ url('/blog/category/'.strtolower($post->category)) }}">
                            <h6 class="section-title bg-white text-start text-primary pe-3">{{ $post->category }}</h6>
                        </a>
                        <h3 class="mb-4">{{ $post->title }}</h3>
                        <h6 class="bg-white text-start text-primary" style="font-size: 15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                            </svg> Published By: {{ $post->author }} | {{ $post->date }}
                        </h6>
                        <br>
                        <div class="position-relative">
                            <img class="img-fluid w-100 h-100" src="{{ asset('/content/img/img-blog/'.$post->photo) }}" alt="{{ $post->title }}" style="object-fit: cover; border-radius: 8px;">
                            <br><br>
                        </div>
                        <p class="mb-4">{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Desktop layout -->
        <article class="desktop-layout">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <a href="{{ url('/blog/category/'.strtolower($post->category)) }}">
                            <h6 class="section-title bg-white text-start text-primary pe-3">{{ $post->category }}</h6>
                        </a>
                        <h3 class="mb-4">{{ $post->title }}</h3>
                        <h6 class="bg-white text-start text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                            </svg> Published By: {{ $post->author }} | {{ $post->date }}
                        </h6>
                        <p class="mb-4">{!! $post->content !!}</p>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="position-relative">
                            <img class="img-fluid w-100 h-100" src="{{ asset('/content/img/img-blog/'.$post->photo) }}" alt="{{ $post->title }}" style="object-fit: cover; border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <style>
            .desktop-layout {
                display: none;
            }
            @media only screen and (max-width: 767px) {
                .mobile-layout {
                    display: block;
                }
                .desktop-layout {
                    display: none;
                }
            }
            @media only screen and (min-width: 768px) {
                .mobile-layout {
                    display: none;
                }
                .desktop-layout {
                    display: block;
                }
            }
        </style>
    </header>

    @include('includes.footer')
</body>
</html>