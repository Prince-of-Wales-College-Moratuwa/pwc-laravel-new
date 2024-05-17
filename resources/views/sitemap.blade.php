<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="jYZeftnqpxLLjE_8cKEhxIWBAB0ZD5EGWEF2z-3maLU" />
    <?php $page = ''; ?>

    @include('includes.header')

    <title>Site Map - Prince of Wales' College, Moratuwa</title>

    <style>
        /* Add spacing between sections */
        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>
    <div class="container mt-5">
        <h6 class="section-title bg-white text-start text-primary pe-3">princeofwales.edu.lk</h6>

        <h1 class="mb-4">Site Map</h1>
        <h2>Main Links</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="/">Home</a></li>
            <li class="list-group-item"><a href="/blog/">Blog</a></li>
            <li class="list-group-item"><a href="/events/">Events</a></li>
            <li class="list-group-item"><a href="/publications/">Publications</a></li>
            <li class="list-group-item"><a href="/sports">Sports</a></li>
            <li class="list-group-item"><a href="/clubs">Clubs</a></li>
            <li class="list-group-item"><a href="/history">History</a></li>
            <li class="list-group-item"><a href="/about">About</a></li>
            <li class="list-group-item"><a href="/contact">Contact</a></li>
        </ul>

        <h2>Blog Categories</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="/blog/category/sports">Sports</a></li>
            <li class="list-group-item"><a href="/blog/category/aesthetic">Aesthetic</a></li>
            <li class="list-group-item"><a href="/blog/category/education">Education</a></li>
            <li class="list-group-item"><a href="/blog/category/academic">Academic</a></li>
            <li class="list-group-item"><a href="/blog/category/announcements">Announcements</a></li>
            <li class="list-group-item"><a href="/blog/category/exclusives">Exclusives</a></li>
        </ul>

        <h2>Blog Posts</h2>
        @php
            $blogPosts = DB::table('pwc_db_news')->select('slug', 'title')->get();
        @endphp
        <ul class="list-group">
            @forelse($blogPosts as $post)
                <li class="list-group-item"><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></li>
            @empty
                <li class="list-group-item">No results found</li>
            @endforelse
        </ul>

        <h2>Events</h2>
        @php
            $events = DB::table('pwc_db_events')->select('slug', 'title')->get();
        @endphp
        <ul class="list-group">
            @forelse($events as $event)
                <li class="list-group-item"><a href="/events/{{ $event->slug }}">{{ $event->title }}</a></li>
            @empty
                <li class="list-group-item">No results found</li>
            @endforelse
        </ul>

        <h2>About</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="/principal-message">Principal's Message</a></li>
            <li class="list-group-item"><a href="/about/school-administration">School Administration</a></li>
            <li class="list-group-item"><a href="/about/school-infrastructure">Locations & Infrastructure</a></li>
            <li class="list-group-item"><a href="/about/school-infrastructure/founders-statue">The Founders' Statue</a></li>
            <li class="list-group-item"><a href="/about/school-infrastructure/the-shrine">The Shrine</a></li>
            <li class="list-group-item"><a href="/about/lassana-wales">ලස්සන Wales</a></li>
            <li class="list-group-item"><a href="/about/prefects-guild">Prefects' Guild</a></li>
            <li class="list-group-item"><a href="/big-match">Big Match</a></li>
            <li class="list-group-item"><a href="/faq">Help / FAQ</a></li>
        </ul>

        <h2>Publications</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="/publications/golden-book/education-sector/">Golden Book - Education Sector</a></li>
            <li class="list-group-item"><a href="/publications/golden-book/sports-sector/">Golden Book - Sports Sector</a></li>
            <li class="list-group-item"><a href="/publications/music">Music On Demand</a></li>
            <li class="list-group-item"><a href="/publications/golden-captures">Golden Captures</a></li>
        </ul>

        <h2>Legal</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="/privacy">Privacy Policy</a></li>
            <li class="list-group-item"><a href="/cookies">Cookies Policy</a></li>
            <li class="list-group-item"><a href="/terms">Terms & Conditions</a></li>
            <li class="list-group-item"><a href="/disclaimer">Disclaimer</a></li>
            <li class="list-group-item"><a href="/imprint">Imprint</a></li>
        </ul>
    </div>

    @include('includes.footer')
</body>

</html>
