<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Edition;
use App\Story;
use Helper;
use App;
use URL;


/**
 * Class EditionsController
 * @package App\Http\Controllers
 */
class EditionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $Editions = Edition::where('is_public', 1)->orderBy('created_at','DESC')->get();

		return view('editions',[
            'editionLs' => $Editions
        ]);

    }

    public function edition(int $id = null){

        if($id != null){

            $OneEdition = Edition::find($id);
            $StoryList = Story::where('edition_id', $id)->orderBy('created_at','DESC')->limit(3)->get();

            return view('editionsSingle',[
                'OneEdition' => $OneEdition,
                'Storys' => $StoryList
            ]);

        }else{
            return abort(404);
        }

    }


    public function loadDataAjax(Request $request){

        $output = '';
        $ReqId = $request->id;
        $uID = $request->uID;

        $uStorys = Story::where('edition_id', '=', $uID)->where('id', '<', $ReqId)->orderBy('created_at','DESC')->limit(12)->get();

        if(!$uStorys->isEmpty())
        {
            $LastID = $uStorys->last()->id; 
            foreach($uStorys as $story)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/story/'.$story->id;

                $Ress = $uStorys->last()->id==$story->id ? 'id='.$story->id.'':'';
                                
                $output .= '<div class="col-md-4 story-full-one-block" '.$Ress.'>
                              <div class=" story3-col-bg text-left trans  animated slideInUp delay-1s hoverable">
                                <div class="storyes-one-image">
                                    <a href="'.$url.'">
                                        <img src="'.$story->thumbnail_preview['490x355'].'" class="img-fluid flex-img preview">
                                        <img src="'.$story->thumbnail['490x355'].'" class="img-fluid flex-img hover-preview">
                                    </a>
                                </div>
                                <div class="one-story-info-block">
                                  <h2>
                                    <a href="'.$url.'">
                                        '.$story->TextTrans('title').'
                                    </a>
                                  </h2>
                                  <div class="one-story-info-block-sec-date">
                                    <span class="">'.$story->edition->TextTrans('name').'</span>
                                    <img src="'.asset('assets/img/play-button.png').'" class="playbtn text-right hand">
                                    <p class="little grey-text">'.date("j F, Y", strtotime($story->created_at)).'</p>
                                  </div>
                                </div>
                              </div>
                            </div>';
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
                        <p class="loadmore-text">No more storys</p>
                    </button>
                </div>';
        } // End empty filter
    }


}