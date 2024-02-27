<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_category;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Info;
use App\Models\LinkMovie;

class IndexController extends Controller
{
    public function locphim()
     {
            $order = $_GET['order'];
            $genre_get = $_GET['genre'];
            $country_get = $_GET['country'];
            $year_get = $_GET['year'];


            if ($order == '' && $genre_get == '' && $country_get == ''  && $year_get == '') {
                return redirect()->back();
            } else {
            $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();

            $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
            $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
                $meta_title = '';
                $meta_description = '';
                $meta_image = '';

                $movie_array = Movie::withCount('episode');
                if ($genre_get) {
                    $movie_array = $movie_array->where('genre_id', $genre_get);
                }
                if ($country_get) {
                    $movie_array = $movie_array->where('country_id', $country_get);
                }
                if ($year_get) {
                    $movie_array = $movie_array->where('year', $year_get);
                }
                if ($order) {
                    $movie_array = $movie_array->orderBy($order, 'ASC');
                }
                $movie_array = $movie_array->with('movie_genre');

                $movie = array();
                foreach ($movie_array as $mov) {
                    foreach ($mov->movie_genre as $mov_gen) {
                        $movie = $movie_array->whereIn('genre_id', [$mov_gen->genre_id]);
                    }
                }
                $movie = $movie_array->paginate(40);
            
            // $meta_title = $movie->title;
            return view('pages.locphim', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar','phimhot_trailer', 'meta_title', 'meta_description','meta_image'));
        }
    }

    public function timkiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
            $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();

            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('ngaycapnhat', 'DESC')->where('status', 1)->paginate(40);
            $meta_title = '';
            $meta_description = '';
            $meta_image = '';
            // $meta_title = $movie->title;
            // $meta_description = $movie->description;
            return view('pages.timkiem', compact('category', 'genre', 'country', 'search', 'movie', 'phimhot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
        }
    }
    public function home()
    {
       
        $phimhot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();

        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'ASC')->get();
        $country = Country::orderBy('id', 'ASC')->get();
        $category_home = Category::with(['movie' => function ($q) {
            $q->withCount('episode')->where('status', 1);
        }])->orderBy('position','ASC')->where('status', 1)->get();
        // dd($category_home);
        $info = info::find(1);
        $meta_title = $info->title;
        $meta_description = $info->description;
        $meta_image = '';
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer', 'meta_title', 'meta_description','meta_image'));
    }
    public function category($slug)
    {
        
        $category_total = Category::all()->count();
        $cate_slug = Category::where('slug', $slug)->first();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $meta_title = $cate_slug->title;
        $meta_description = $cate_slug->description;
        $meta_image = '';
        $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
       //Nhiều danh mục
        $movie_category = Movie_category::where('category_id', $cate_slug->id)->get();

        $many_category = [];
        foreach ($movie_category as $key => $movi) {
            $many_category[] = $movi->movie_id;
        }
        $movie = Movie::withCount('episode')->where('status', 1)->whereIn('id', $many_category)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
       

       
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer', 'meta_title', 'meta_description','meta_image','category_total'));
    }
    public function year($year)
    {

        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $meta_title = 'Năm phim: ' .$year;
        $meta_description = ' Tìm năm phim:' . $year;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('status', 1)->where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;

       
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar','phimhot_trailer', 'meta_title', 'meta_description','meta_image'  ));
    }
    public function tag($tag)
    {
        $tag = $tag;
        $meta_title = $tag;
        $meta_description = $tag;
        $meta_image = '';
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $movie = Movie::withCount('episode')->where('status', 1)->where('tags', 'LIKE', '%' . $tag . '%')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

       

       
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar','phimhot_trailer', 'meta_title', 'meta_description','meta_image'));
    }
    public function genre($slug)
    {
        
        $genre_total = genre::all()->count();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();

        $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $gen_slug = Genre::where('slug', $slug)->first();
        $meta_title = $gen_slug->title;
        $meta_description = $gen_slug->description;
        $meta_image = '';
        //Nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $gen_slug->id)->get();

        $many_genre = [];
        foreach ($movie_genre as $key => $movi) {
            $many_genre[] = $movi->movie_id;
        }
        $movie = Movie::withCount('episode')->where('status', 1)->whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        // dd($gen_slug);
        return view('pages.genre', compact('category', 'genre', 'country', 'gen_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer', 'meta_title', 'meta_description','meta_image','genre_total'));
    }
    public function country($slug)
    {
        
        $country_total = country::all()->count();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $coun_slug = Country::where('slug', $slug)->first();
        $meta_title = $coun_slug->title;
        $meta_description = $coun_slug->description;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('status', 1)->where('country_id', $coun_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        // dd($coun_slug);
        return view('pages.country', compact('category', 'genre', 'country', 'coun_slug', 'movie', 'phimhot_sidebar','phimhot_trailer', 'meta_title', 'meta_description','meta_image','country_total'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::withCount('episode')->where('status', 1)->with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();

        $meta_title = $movie->title;
        $meta_description = $movie->description;
        $meta_image =  url('uploads/movie/' .$movie->image);
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //lấy 3 tập gần nhất
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(10)->get();
        //Lấy tổng tập phim đã thêm
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();
        

        // rating movie
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();


        // thêm view
        
        $count_view = $movie->count_view;       
        $count_view = $count_view + 1;
        $movie->count_view = $count_view;
        
        $movie->save();
        //  dd($episode_current_list_count);
        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'phimhot_trailer', 'episode', 'episode_tapdau', 'episode_current_list_count', 'rating','count_total', 'meta_title', 'meta_description','meta_image'    ));
    }
    public function add_rating(Request $request)
    {
        $data = $request->all();
        $ip_address = $request->ip();
        $rating_count = rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if($rating_count>0){
        echo 'exist';
        }else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }
    public function watch($slug, $tap,$server_active)
    {



        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();

        $country = Country::orderBy('id', 'DESC')->get();





        // return response()->json($movie);
        $movie = Movie::withCount('episode')->where('status', 1)->with('movie_category','category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = $movie->title;
        $meta_description = $movie->description;
        $meta_image =  url('uploads/movie/' . $movie->image);
        $related = Movie::with('category', 'genre', 'country')->where('status', 1)->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //lấy tập 1 -- tập full HD
        if (isset($tap)) {

            $tapphim = $tap;
            $tapphim = substr($tap, 4, 20);
            $episode = Episode::Where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::Where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }
        $server = LinkMovie::orderBy('id','DESC')->get();
        $episode_movie = episode::where('movie_id',$movie->id)->orderBy('episode','ASC')->get()->unique('server');
        $episode_list = episode::where('movie_id', $movie->id)->orderBy('episode', 'ASC')->get();
        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phimhot_trailer', 'episode', 'tapphim','related', 'meta_title', 'meta_description','meta_image','server', 'episode_movie', 'episode_list', 'server_active'));
    }
    public function episode()
    {
        return view('pages.episode');
    }
}