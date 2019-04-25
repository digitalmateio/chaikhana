<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Block;
use App\Block_type;
use App\Story_type;
use App\Tags_page;
use App\Edition;
use App;
use URL;

    
class StoryController extends Controller
{


    public function index()
    {

        $story = Story::where('is_public', 1)->orderBy('created_at','DESC')->limit(9)->get();
        $type = Story_type::all();
        $tags = Tags_page::all();
        $editions = Edition::all();

        return view('storyes',[
           'storys' => $story,
           'types' => $type,
           'tags' => $tags,
           'editions' => $editions,
           'sort_by' => null,
           'type_id' => null
        ]);
    }


    public function sort(string $text = null)
    {

      if($text == 'views'){
        $sortBy = 'impressions_count';
      }elseif($text == 'resent'){
        $sortBy = 'created_at';
      }else{
        $sortBy = 'created_at';
      }

      $story = Story::where('is_public', 1)->orderBy($sortBy,'DESC')->limit(9)->get();
      $type = Story_type::all();
      $tags = Tags_page::all();
      $editions = Edition::all();

      return view('storyes',[
         'storys' => $story,
         'types' => $type,
         'tags' => $tags,
         'editions' => $editions,
         'sort_by' => $sortBy,
          'type_id' => null
      ]);
    
    }


    public function type(int $id = null)
    {

      $story = Story::where('is_public', 1)->where('story_type', $id)->orderBy('created_at','DESC')->limit(9)->get();
      $type = Story_type::all();
      $tags = Tags_page::all();
      $editions = Edition::all();

      return view('storyes',[
         'storys' => $story,
         'types' => $type,
         'tags' => $tags,
         'editions' => $editions,
          'sort_by' => null,
          'type_id' => $id
      ]);
    
    }

    public function story(int $id = null)
    { 
      
        $story = Story::where('is_public',1)->findOrFail($id);

        $impressions_count = $story->impressions_count;
        $story->impressions_count =  $impressions_count + 1; 
        $story->save();

        $block_types = Block_type::all();
        $block = Block::where('story_id', $story->id)->get();
        
        return view('story',[
           'story' => $story,
           'block_types' => $block_types,
           'block' => $block,
        ]);
    }



    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        if(isset($request->story_type) and $request->story_type != 'null'){
          $posts = Story::where('id', '<', (int) $id)->where('is_public', 1)->where('story_type', $request->story_type)->orderBy('created_at','DESC')->limit(42)->get();
        }elseif(isset($request->sort_by) and $request->sort_by != 'null'){
          $posts = Story::where('id', '<', (int) $id)->where('is_public', 1)->orderBy($request->sort_by, 'DESC')->limit(42)->get();
        }else{
          $posts = Story::where('id', '<', (int) $id)->orderBy('created_at', 'DESC')->limit(42)->get();
        }

        if(!$posts->isEmpty())
        {
            $LastID = $posts->last()->id; 
            foreach($posts as $post)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/story/'.$post->id;

                $Ress = $posts->last()->id == $post->id ? 'id="'.$post->id.'"':'';
                                
                $output .= '
                  <div class="col-md-4 story-full-one-block"'.$Ress.'>
                    <div class=" story3-col-bg text-left trans animated slideInUp delay-1s hoverable">
                      <div class="storyes-one-image">
                          <a href="'.$url.'">
                              <img src="'.$post->thumbnail_preview['490x355'].'" class="img-fluid flex-img preview">
                              <img src="'.$post->thumbnail['490x355'].'" class="img-fluid flex-img hover-preview">
                          </a>
                      </div>
                      <div class="one-story-info-block">
                        <h2>
                          <a href="'.$url.'">
                              '.$post->TextTrans('title').'
                          </a>
                        </h2>
                        <div class="one-story-info-block-sec-date">
                          <span class="">'.$post->edition->TextTrans('name').'</span>
                          <img src="'.asset('assets/img/play-button.png').'" class="playbtn text-right hand">
                          <p class="little grey-text">'.date("j F, Y", strtotime($post->created_at)).'</p>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
            }
            
            $output .= '<div id="remove-row" class="col-md-12 mb-5">
                            <button id="btn-more" data-id="'.$LastID.'" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                                <p class="loadmore-text">Load more</p>
                            </button>
                        </div>';
            
            echo $output;

        }else{
            echo '<div id="remove-row" class="col-md-12 mb-5 mt-5">
                        <p class="loadmore-text">No more stories</p>
                    </button>
                </div>';
        } 
        // End empty filter
    }



}
