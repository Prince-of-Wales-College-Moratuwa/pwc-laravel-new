<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::redirect('/battle-of-the-golds.php', '/battle-of-the-golds');


Route::fallback(function () {
    return response()->view('errors.403', [], 403);
});

// Handle 404 error
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


Route::get('/offline', function () {
    return view('errors.offline');
});


Route::get('/', function () {
    return view('index');
});



use App\Http\Controllers\BlogController;
Route::get('/blog', function () {
    return view('blog.index');
});

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{categoryslug}', [BlogController::class, 'category'])->name('blog.category');


use App\Http\Controllers\EventController;
Route::get('/events', function () {
    return view('events.events');
});
Route::get('/events/{slug}', [EventController::class, 'show'])->name('event-details');


Route::get('/principal-message', function () {
    return view('principal-msg');
});



Route::get('/about', function () {
    return view('about.about');
});

Route::get('/about/school-administration', function () {
    return view('about.school-administration');
});

Route::get('/about/school-infrastructure', function () {
    return view('about.school-infrastructure');
});

Route::get('/about/school-infrastructure/founders-statue', function () {
    return view('about.location-founders-statue');
});

Route::get('/about/school-infrastructure/the-shrine', function () {
    return view('about.location-the-shrine');
});

Route::get('/about/lassana-wales', function () {
    return view('about.lassana-wales');
});




Route::get('/clubs', function () {
    return view('clubs.clubs');
});

Route::get('/clubs/prefects-guild', function () {
    return view('clubs.prefects-guild');
});

Route::get('/sports', function () {
    return view('sports.sports');
});

Route::get('/battle-of-the-golds', function () {
    return view('sports.big-match');
});
Route::get('/big-match', function () {
    return view('sports.big-match');
});

Route::get('/cmbu', function () {
    return view('clubs.cmbu');
});

Route::get('/history', function () {
    return view('history.history');
});

Route::get('/history/former-principals', function () {
    return view('history.former-principals');
});





Route::get('/contact', function () {
    return view('contact');
});


Route::match(['get', 'post'], '/search', function() {
    return view('search');
})->name('search');

Route::get('/team', function () {
    return view('team');
});


Route::get('/cookies', function () {
    return view('legal.cookies');
});

Route::get('/disclaimer', function () {
    return view('legal.disclaimer');
});

Route::get('/imprint', function () {
    return view('legal.imprint');
});

Route::get('/privacy', function () {
    return view('legal.privacy');
});

Route::get('/terms', function () {
    return view('legal.terms');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/sitemap', function () {
    return view('sitemap');
});




Route::get('/forms/apply-al', function () {
    return view('forms.apply-al.index');
});


Route::get('/forms/apply-al/science', function () {
    return view('forms.apply-al.science');
});


Route::get('/forms/apply-al/commerce', function () {
    return view('forms.apply-al.commerce');
});


Route::get('/forms/apply-al/tech', function () {
    return view('forms.apply-al.tech');
});


Route::get('/forms/apply-al/art', function () {
    return view('forms.apply-al.art');
});

Route::get('/forms/students-info', function () {
    return view('forms.students-info.form');
});

