<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function search()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
            $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();


            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('ngaycapnhat', 'desc')->paginate(40);
            return view('pages.search', compact('category', 'genre', 'country', 'search', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
        } else {
            redirect()->to('/');
        }
        return view('pages.search', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }
    public function home()
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $phim_hot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phim_hot', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }
    public function category($slug)
    {
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat', 'desc')->paginate(40);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }
    public function genre($slug)
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $movi) {
            $many_genre[] = $movi->movie_id;
        }
        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'desc')->paginate(40);
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }
    public function country($slug)
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('ngaycapnhat', 'desc')->paginate(40);
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }
    public function year($year)
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('ngaycapnhat', 'desc')->paginate(40);
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }

    public function tag($tag)
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('ngaycapnhat', 'desc')->paginate(40);
        return view('pages.tag', compact('category', 'genre', 'country', 'movie', 'tag', 'phimhot_sidebar', 'phimhot_sapchieu'));
    }

    public function movie($slug)
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();

        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //lay 3 tap gan nhat
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'desc')->take(3)->get();
        //lay tong tap phim
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();



        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'asc')->take(1)->first();
        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'phimhot_sapchieu', 'episode', 'episode_tapdau','episode_current_list_count'));
    }
    public function watch($slug, $tap)
    {


        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(20)->get();
        $phimhot_sapchieu = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'desc')->take(10)->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();

        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 1);
        } else {
            $tapphim = 1;
        }
        $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'phimhot_sapchieu', 'episode', 'tapphim'));
    }
    public function episode()
    {
        return view('pages.episode');
    }
}
