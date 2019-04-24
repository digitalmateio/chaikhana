<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Autor;
use App\Story;
use Helper;
use App;
use URL;

/**
 * Class AuthorsController
 * @package App\Http\Controllers
 */
class AuthorsController extends Controller
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

        $Authors = Autor::offset(0)->orderBy('created_at','DESC')->limit(15)->get();

		    return view('authors',[
            'author' => $Authors
        ]);

    }


    public function show(int $id = null){


        $autSing = Autor::find($id);

        return view('authorSingle',[
            'oneAuth' => $autSing
        ]);


    }


    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Autor::where('id', '<', (int) $id)->orderBy('created_at','DESC')->limit(42)->get();

        if(!$posts->isEmpty())
        {
            $LastID = $posts->last()->id; 
            foreach($posts as $post)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/author/'.$post->id;

                $Ress = $posts->last()->id==$post->id ? 'id="'.$post->id.'"':'';
                                
                $output .= '<div class="col-md-4 authors-list-one" '.$Ress.'>
                                  <div class="row">
                                      <div class="col-md-8 authors-list-img">
                                          <a href="'.$url.'">
                                            <div class="author-one-image" style="background: url('.$post->image['275x190'].');">
                                             <!-- Author image -->
                                            </div>
                                          </a>                        
                                      </div>
                                      <div class="col-md-4">
                                          <div class="name-right ">
                                              <h1 class="contributor-font-50 one-author-name">
                                                <a href="'.$url.'">
                                                  '.$post->TextTrans('name').'
                                                </a>
                                              </h1>
                                           </div>
                                      </div>
                                  </div>
                              </div>

                              ';
            }
            
            $output .= '<div id="remove-row" class="col-md-12">
                            <button id="btn-more" data-id="'.$LastID.'" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                                <p class="loadmore-text">Load more</p>
                            </button>
                        </div>';
            
            echo $output;

        }else{
            echo '<div id="remove-row" class="col-md-12 mb-5 mt-5">
                        <p class="loadmore-text">No more authors</p>
                    </button>
                </div>';
        } // End empty filter


    }


    public function searchAtaAjax(Request $request)
    {

        // echo $request->search;
        $output = '';

        if($request->search != ''){
          $posts = Autor::where('name_'.App::getLocale('locale'),'LIKE','%'.$request->search."%")->get();
        }else{
          $posts = Autor::take(15)->get();
        }

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/author/'.$post->id;

                $Ress = $posts->last()->id==$post->id ? 'id="'.$post->id.'"':'';
                                
                $output .= '<div class="col-md-4 authors-list-one" '.$Ress.'>
                                  <div class="row">
                                      <div class="col-md-8 authors-list-img">
                                          <a href="'.$url.'">
                                            <div class="author-one-image" style="background: url('.$post->image['275x190'].');">
                                             <!-- Author image -->
                                            </div>
                                          </a>                        
                                      </div>
                                      <div class="col-md-4">
                                          <div class="name-right ">
                                              <h1 class="contributor-font-50 one-author-name">
                                                <a href="'.$url.'">
                                                  '.$post->TextTrans('name').'
                                                </a>
                                              </h1>
                                           </div>
                                      </div>
                                  </div>
                              </div>
                              ';
            }
            
            $output .= '<div id="remove-row" class="col-md-12">
                            <button id="btn-more" data-id="'.$posts->last()->id.'" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                                <p class="loadmore-text">Load more</p>
                            </button>
                        </div>';
            
            echo $output;

        }else{
            echo '<div id="remove-row" class="col-md-12 mb-5 mt-5">
                        <p class="loadmore-text">No more authors</p>
                    </button>
                </div>';
        } // End empty filter


        //$LastID = $posts->last()->id; 
    }


}