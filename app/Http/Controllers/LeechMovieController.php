<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\LinkMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class LeechMovieController extends Controller
{

    public function leech_detail($slug)
    {
        $reps = Http::get("https://ophim1.com/phim/" . $slug)->json();
        $reps_movie[] = $reps['movie'];
        return view('admincp.leech.leech_detail', compact('reps_movie'));
    }
    public function leech_episode($slug)
    {
        $reps = Http::get("https://ophim1.com/phim/" . $slug)->json();
        return view('admincp.leech.leech_episode', compact('reps'));
    }
    public function leech_movie()
    {
        $reps = Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1")->json();
        return view('admincp.leech.index', compact('reps'));
    }
    public function leech_episode_store(Request $request, $slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $reps = Http::get("https://ophim1.com/phim/" . $slug)->json();

        foreach ($reps['episodes'] as  $key => $rep) {
            foreach ($rep['server_data'] as $key_data => $rep_data) {
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode->linkphim = '<iframe width="560" height="315" src="' . $rep_data['link_embed'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>  </iframe>';
                $episode->episode = $rep_data['name'];
                if ($key_data == 0) {
                    $linkmovie = LinkMovie::orderBy('id', 'DESC')->first();
                    $episode->server = $linkmovie->id;
                } else {
                    $linkmovie = LinkMovie::orderBy('id', 'ASC')->first();
                    $episode->server = $linkmovie->id;
                }
                $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
                $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

                $episode->save();
            }
        }
        return redirect()->back();
    }
    public function leech_store(Request $request, $slug)
    {
        $reps = Http::get("https://ophim1.com/phim/" . $slug)->json();
        $reps_movie[] = $reps['movie'];
        $movie = new Movie();
        foreach ($reps_movie as $key => $res) {
            $movie = new Movie();
            $movie->title = $res['name'];
            $movie->trailer = $res['trailer_url'];
            $movie->sotap = $res['episode_total'];
            $movie->tags = $res['name'] . ',' . $res['slug'];
            $movie->thoiluong = $res['time'];
            $movie->resolution = 0;
            $movie->phude = 0;
            $movie->name_eng = $res['origin_name'];
            $movie->phim_hot = 1;
            $movie->slug = $res['slug'];
            $movie->description = $res['content'];
            $movie->status = 0;
            $category = Category::orderBy('id', 'DESC')->first();
            $movie->category_id = $category->id;
            $movie->thuocphim = 'phimle';
            $country = Country::orderBy('id', 'DESC')->first();
            $movie->country_id = $country->id;
            $genre = Genre::orderBy('id', 'DESC')->first();
            $movie->genre_id = $genre->id;
            $movie->count_view = rand(99, 99999);
            $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
            $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $movie->image = $res['thumb_url'];
            $movie->save();
            $movie->movie_genre()->attach($genre);
            $movie->movie_category()->attach($category);
        }
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
