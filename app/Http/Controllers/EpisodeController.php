<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('id', 'desc')->get();

        return view('admincp.episode.index', compact('list_episode'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title', 'id');
        return view('admincp.episode.form', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Episode();
        $country->movie_id = $data['movie_id'];
        $country->linkphim = $data['link'];
        $country->episode = $data['episode'];
        $country->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title', 'id');
        $episode=Episode::find($id);
        return view('admincp.episode.form', compact('list_movie','episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $country =Episode::find($id);
        $country->movie_id = $data['movie_id'];
        $country->linkphim = $data['link'];
        $country->episode = $data['episode'];
        $country->save();
        return redirect()->to('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::find($id)->delete();
        return redirect()->to('episode');
    }
    public function select_movie()
    {
        $id = $_GET["id"];
        $movie = Movie::find($id);
        $output = ' <option >---Chon tap phim---</option>';
        if($movie->thuocphim=='phimbo'){
            for ($i = 1; $i <= $movie->sotap; $i++) {
                $output .= ' <option value="' . $i . ' ">' . $i . '</option>';
            }
        }else{
            $output.=' <option >HD</option>
             <option >FullHD</option>';
        }


        echo $output;
    }
}
