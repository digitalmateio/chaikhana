<?php

use App\Models\Social_Network;
use App\Footer_menu_list;



function getPage_social(){
	return Social_Network::all();
}
function getFoooterMenu(){
	return Footer_menu_list::all();
}


?>