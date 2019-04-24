<?php

use App\Models\Social_Network;
use App\Footer_menu_list;
use App\Edition;

function getPage_social(){
    return Social_Network::all();
}
function getFoooterMenu(){
    return Footer_menu_list::all();
}

function getYoutubeEmbed($video_id = null)
{
    return '<iframe width="100%" height="750" src="https://www.youtube.com/embed/'. $video_id .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}

function getMenuEditions(){
	return Edition::orderBy('created_at', 'DESC')->take(12)->get();
}


?>