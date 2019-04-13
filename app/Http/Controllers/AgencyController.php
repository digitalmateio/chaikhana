<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Agency_main_page;
use App;



/**
 * Class AgencyController
 * @package App\Http\Controllers
 */
class AgencyController extends Controller
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

        $agencyHeadInfoTop = Agency_main_page::where('position', 'like', '%top%')->first();
        $agencyHeadInfoBottom = Agency_main_page::where('position', 'like', '%bottom%')->first();

        // dd($agencyHeadInfo);

		return view('agency',[
            'topHeadAboutTop' => $agencyHeadInfoTop,
            'topHeadAboutBottom' => $agencyHeadInfoBottom
        ]);
    }
}