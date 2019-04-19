<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Block;
use App\Block_type;
    
class StoryController extends Controller
{
    public function story(int $id = null)
    { 
        $story = Story::where('is_public',1)->findOrFail($id);

        $block_types = Block_type::all();
        $block = Block::where('story_id',$story->id)->get();
        
        return view('story',[
           'story' => $story,
           'block_types' => $block_types,
           'block' => $block,
        ]);
    }
}
