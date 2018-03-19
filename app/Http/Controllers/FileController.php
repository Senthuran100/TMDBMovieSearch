<?php

namespace App\Http\Controllers;
// use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    //
 public function fileindex(){
	return view('filesearch');
 }

 //  public function discovermovie(){
	// $upcomemovies = tmdb()->getDiscoverMovie();//getDiscoverMovies();
 //  	foreach($upcomemovies as $upcomemovie){
	// $upcomemoviejson[]=$upcomemovie->getJson();
	// $moviesid=$upcomemovie->getId();
	// // $moviesinfo[]=movieinfo1($moviesid);
	// $upoverview[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['overview'];
	// $upreleasedate[]=date("M jS, Y",strtotime(json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['release_date']));
	// $uptitle[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['title'];
	// $uprating[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['vote_average'];
	// $upimage[]="https://image.tmdb.org/t/p/w185_and_h278_bestv2".json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['poster_path'];
 //  	}
 //  	return response()->json([  
 //    'overview' => $upoverview,
 //    'date' => $upreleasedate,
 //    'title'=>$uptitle,
 //    // 'json'=>$moviesinfo,
 //    'image'=>$upimage,
 //    'rating'=>$uprating
 //   ]);
 // }
   public function view(){
	$upcomemovies = tmdb()->upcomingMovies();//getDiscoverMovies();
  	foreach($upcomemovies as $upcomemovie){
	$upcomemoviejson[]=$upcomemovie->getJson();
	$moviesid=$upcomemovie->getId();
	// $moviesinfo[]=movieinfo1($moviesid);
	$upoverview[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['overview'];
	$upreleasedate[]=date("M jS, Y",strtotime(json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['release_date']));
	$uptitle[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['title'];
	$uprating[]=json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['vote_average'];
	$upimage[]="https://image.tmdb.org/t/p/w185_and_h278_bestv2".json_decode($upcomemovie->getJSON(), JSON_PRETTY_PRINT)['poster_path'];
  	}

  	$discovermovies = tmdb()->getDiscoverMovie();
  	foreach ($discovermovies as $discovermovie) {
  	$discovermoviejson[]=$discovermovie->getJson();
	$dismoviesid=$discovermovie->getId();
	$disoverview[]=json_decode($discovermovie->getJSON(), JSON_PRETTY_PRINT)['overview'];
	$disreleasedate[]=date("M jS, Y",strtotime(json_decode($discovermovie->getJSON(), JSON_PRETTY_PRINT)['release_date']));
	$distitle[]=json_decode($discovermovie->getJSON(), JSON_PRETTY_PRINT)['title'];
	$disrating[]=json_decode($discovermovie->getJSON(), JSON_PRETTY_PRINT)['vote_average'];
	$disimage[]="https://image.tmdb.org/t/p/w185_and_h278_bestv2".json_decode($discovermovie->getJSON(), JSON_PRETTY_PRINT)['poster_path'];

  	}
  	return response()->json([  
    'overview' => $upoverview,
    'date' => $upreleasedate,
    'title'=>$uptitle,
    'json'=>$upcomemoviejson,
    'image'=>$upimage,
    'rating'=>$uprating,
    'disoverview' => $disoverview,
    'disdate' => $disreleasedate,
    'distitle'=>$distitle,
    'disjson'=>$discovermoviejson,
    'disimage'=>$disimage,
    'disrating'=>$disrating
   ]);
 }
 public function search(Request $request)
 {	
	$movies = tmdb()->searchMovie($request->search);
	if($movies){
	foreach($movies as $movie){
		$json1[]=$movie->getJson();
	
	$overview[]=json_decode($movie->getJSON(), JSON_PRETTY_PRINT)['overview'];
	$releasedate[]=date("M jS, Y",strtotime(json_decode($movie->getJSON(), JSON_PRETTY_PRINT)['release_date']));
	$title[]=json_decode($movie->getJSON(), JSON_PRETTY_PRINT)['title'];
	$rating[]=json_decode($movie->getJSON(), JSON_PRETTY_PRINT)['vote_average'];
	$image[]="https://image.tmdb.org/t/p/w185_and_h278_bestv2".json_decode($movie->getJSON(), JSON_PRETTY_PRINT)['poster_path'];
}
  	
	return response()->json([
    'overview' => $overview,
    'date' => $releasedate,
    'title'=>$title,
    'json'=>$json1,
    'image'=>$image,
    'rating'=>$rating
   ]);
    }
    else{

    return Response("No Result");
    }
	}

}
