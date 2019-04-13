<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tags_page;
use App;



/**
 * Class TagsController
 * @package App\Http\Controllers
 */
class TagsController extends Controller
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

        $tag = Tags_page::all()->first();

		return view('tags',[
            'tags' => $tag,
        ]);
    }


    public function tag($id = null)
    {

        $tag = Tags_page::find($id);

        if($tag){
            return view('tags',[
                'tags' => $tag,
            ]);
        }else{
            return abort(404);
        }

    }

}