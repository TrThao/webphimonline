<?php


use App\Http\Controllers\SitemapController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LeechMovieController;
use App\Http\Controllers\LinkMovieController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [IndexController::class, 'home'])->name('homepage');


Route::get('/sitemap', [SitemapController::class, 'generate']);



Route::get('/danh-muc/{slug}', [indexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [indexController::class, 'genre'])->name('genre');
Route::get('quoc-gia/{slug}', [indexController::class, 'country'])->name('country');


Route::get('/phim/{slug}', [indexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}/{server_active}', [indexController::class, 'watch']);
Route::get('/so-tap', [indexController::class, 'episode'])->name('so-tap');

Route::get('/nam/{year}', [indexController::class, 'year']);
Route::get('/tag/{tag}', [indexController::class, 'tag']);

Route::get('/tim-kiem', [indexController::class, 'timkiem'])->name('tim-kiem');

Route::get('/loc-phim', [indexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating', [indexController::class, 'add_rating'])->name('add-rating');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//route Admin
Route::resource('category', CategoryController::class);
Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting');
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('linkmovie', LinkMovieController::class);


// Thông tin website
Route::resource('info', InfoController::class);

//thêm tập phim
Route::get('select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');

Route::get('add-episode/{id}', [EpisodeController::class, 'add_episode'])->name('add-episode');


Route::get('/update-year-phim', [MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
Route::get('/update-season-phim', [MovieController::class, 'update_season']);
Route::get('/sort_movie', [MovieController::class, 'sort_movie'])->name('sort_movie');
Route::post('/resorting_navbar', [MovieController::class, 'resorting_navbar'])->name('resorting_navbar');
Route::post('/resorting_movie', [MovieController::class, 'resorting_movie'])->name('resorting_movie');


//ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');
Route::post('/watch-video', [MovieController::class, 'watch_video'])->name('watch-video');

//Leech Movie
Route::get('/leech-movie', [LeechMovieController::class, 'leech_movie'])->name('leech-movie');
Route::get('/leech-detail/{slug}', [LeechMovieController::class, 'leech_detail'])->name('leech-detail');
Route::get('/leech-episode/{slug}', [LeechMovieController::class, 'leech_episode'])->name('leech-episode');
Route::post('/leech-store/{slug}', [LeechMovieController::class, 'leech_store'])->name('leech-store');

Route::post('/leech-episode-store/{slug}', [LeechMovieController::class, 'leech_episode_store'])->name('leech-episode-store');