<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\LinkMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_server = Linkmovie::orderBy('id', 'desc')->get();
        $linkmovie = Linkmovie::orderBy('id', 'desc')->pluck('title', 'id');
        $list_episode = Episode::with('movie')->orderBy('episode', 'DESC')->get();
         return view('admincp.episode.index',compact('list_episode','list_server', 'linkmovie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_server = Linkmovie::orderBy('id', 'desc')->get();
        $linkmovie = Linkmovie::orderBy('id', 'desc')->pluck('title', 'id');
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        return view('admincp.episode.form',compact('list_movie', 'list_server', 'linkmovie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data = $request->all();
    //     $episode_check = Episode::where('episode',$data['episode'])->where('movie_id',$data['movie_id'])->count();
    //    if($episode_check > 0){
    //         return redirect()->back();
    //    }else{
            $episode = new Episode();
            $episode->movie_id = $data['movie_id'];
            $episode->linkphim = $data['linkphim'];
            $episode->server = $data['linkserver'];
            $episode->episode = $data['episode'];
            $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

            $episode->save();
    //    }
        toastr()->success('Thêm dữ liệu thành công', 'Thành công');
        return redirect()->back();
    }
   public function add_episode($id){
        
        $linkmovie = Linkmovie::orderBy('id','desc')->pluck('title','id');
        $list_server = Linkmovie::orderBy('id', 'desc')->get();
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id',$id)->orderBy('episode', 'DESC')->get();
        return view('admincp.episode.add_episode', compact('list_episode', 'movie', 'linkmovie','list_server'));
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
        $episode = Episode::find($id);
        $linkmovie = Linkmovie::orderBy('id', 'desc')->pluck('title', 'id');
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admincp.episode.form', compact('episode','list_movie','linkmovie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $episode =  Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['linkphim'];
        $episode->server = $data['linkserver'];
        $episode->episode = $data['episode'];
        $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        // dd($episode->episode);
        $episode->save();
        toastr()->success('Cập nhật dữ liệu thành công', 'Thành công');
        return redirect()->to('episode');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $episode = Episode::find($id)->delete();
        toastr()->success('Xóa dữ liệu thành công', 'Thành công');
        return redirect()->to('episode');
    }
    public function select_movie(){
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output= '<option>---Chọn Tập Phim---</option>';
        if($movie->thuocphim == 'phimbo'){
            for ($i = 1; $i <= $movie->sotap; $i++) {
                $output .= '<option value="' . $i . '">' . $i . '</option>';
            }  
        }else{
            $output .= '<option value="HD">HD</option>
            <option value="FullHD">FullHD</option>
            <option value="FullHD">Cam</option> 
            <option value="FullHD">HDCam</option>';
        }
                            
       
        echo $output;
    }
}