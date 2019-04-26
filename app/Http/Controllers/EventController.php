<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Block_type;

class EventController extends Controller
{
    public function show(int $id = null)
    {
		$event = Event::find($id);
$block_types = Block_type::all();
       
		return view('events',[
			'event' => $event,
			  'block_types' => $block_types,
		]);
    }
}
