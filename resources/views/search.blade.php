<!DOCTYPE html>
<html lang="en">

<head>
    <?php $page = ''; ?>

    @include('includes.header')

    <title>Search</title>

    <style>
        /* Style for the curved search box */
        .search-box {
            border-radius: 25px;
        }

        .search-icon {
            background-color: maroon;
            border: none;
            border-radius: 0 25px 25px 0;
            color: white;
        }

        /* Ensure images fit within their container */
        .blog-img img, .course-item img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Type Here To Search</h6>
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control search-box" placeholder="Search" aria-label="Search" aria-describedby="search-icon" name="search">
                            <div class="input-group-append">
                                <button class="input-group-text search-icon" id="search-icon" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

    @php
        use App\Models\PwcDbNews;
        use App\Models\PwcDbEvents;
        use Illuminate\Http\Request;

        if (request()->isMethod('post') && request()->has('search')) {
            $keyword = request('search');

            $newsResults = PwcDbNews::where('title', 'like', '%' . $keyword . '%')
                ->orWhere('excerpt', 'like', '%' . $keyword . '%')
                ->orWhere('category', 'like', '%' . $keyword . '%')
                ->orderBy('date', 'desc')
                ->get();

            $eventResults = PwcDbEvents::where('title', 'like', '%' . $keyword . '%')
                ->orWhere('about', 'like', '%' . $keyword . '%')
                ->orWhere('date', 'like', '%' . $keyword . '%')
                ->orWhere('location', 'like', '%' . $keyword . '%')
                ->orWhere('organizer_name', 'like', '%' . $keyword . '%')
                ->orderBy('date', 'desc')
                ->get();
        }
    @endphp


    @if(isset($newsResults) || isset($eventResults))
    <div class="colorlib-light-grey">
        <div class="container">
    <h6 class="section-title bg-white text-start text-primary px-3">Results for "{{ $keyword }}"</h6><br>

            {{-- News Container --}}
            @if(isset($newsResults) && count($newsResults) > 0)
                <div class="colorlib-blog">
                    <h6 class="section-title bg-white text-start text-primary px-3">In Blog</h6>
                    <div class="row">
                        {{-- Display Blog Results --}}
                        @foreach($newsResults as $news)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <article class="article-entry">
                                    <a href="{{ url('blog/' . $news->slug) }}" class="blog-img">
                                        <img src="{{ asset('content/img/img-blog/' . $news->photo) }}" alt="{{ $news->photo }}">
                                        <p class="meta"><span class="day">{{ $news->date }}</span> │ <span>{{ $news->category }}</span></p>
                                    </a>
                                    <div class="desc">
                                        <h4><a href="{{ url('blog/' . $news->slug) }}">{{ $news->title }}</a></h4>
                                        <p>{!! $news->excerpt !!}...</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Events Container --}}
            @if(isset($eventResults) && count($eventResults) > 0)
                <div class="colorlib-events">
                    <h6 class="section-title bg-white text-start text-primary px-3">In Events</h6>
                    <div class="row">
                        {{-- Display Event Results --}}
                        @foreach($eventResults as $event)
                            <div class="col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="course-item bg-light">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ asset('content/img/img-events/' . $event->img) }}" alt="{{ $event->img }}">
                                    </div>
                                    <div class="text-center p-4 pb-0">
                                        <h4 class="mb-4">{{ $event->title }}</h4>
                                    </div>
                                    <div class="w-100 d-flex justify-content-center mb-4">
                                        <a href="{{ url('events/' . $event->slug) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px;">Read More</a>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar text-primary me-2"></i>{{ $event->date }}</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-map-marker text-primary me-2"></i>{{ $event->location }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- If no news or events found --}}
            @if(!isset($newsResults) && !isset($eventResults))
                <p>No Results found.</p>
            @endif
        </div>
    </div>
@endif


    @include('includes.footer')
</body>

</html>
