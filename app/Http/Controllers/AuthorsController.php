<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Autor;
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


        $Authors = Autor::offset(0)->limit(15)->get();

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
        
        $posts = Autor::where('id', '>', $id)->orderBy('created_at','ASC')->limit(15)->get();
        
        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url = URL::to('/').'/'.App::getLocale('locale').'/author/'.$post->id;
                                
                $output .= '<div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-10">
                                          <a href="'.$url.'">
                                               <img src="'.asset('assets/img/Chinara Majidova.jpg').'" class="hand contributor-img"> 
                                          </a>                        
                                      </div>
                                      <div class="col-md-2">
                                          <div class="name-right ">
                                              <h1 class="contributor-font-50" >
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
                          <p class="mt-5 mb-5" id="btn-more">
                            <img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="width: 50px !important">
                            Loading More post
                          </p>
                        </div>';
                        
            echo $output;
        }
    }





}