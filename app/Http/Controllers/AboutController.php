<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page_content;
use App\Logo;
use App\Contact;
use App\Vacancy;
use App;



/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends Controller
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
        $pageContentAbout = Page_content::where('page', 2)->where('position', 'top')
            ->orderBy('created_at', 'DESC')->first();

        $aboutMission = Page_content::where('page', 2)->where('position', 'left')
            ->orderBy('created_at', 'DESC')->first();

        $aboutVision = Page_content::where('page', 2)->where('position', 'right')
            ->orderBy('created_at', 'DESC')->first();

        $donnorsLogo = Logo::all();
        $aboutContacts = Contact::all();

        $aboutPolicy = Page_content::where('page', 2)->where('position', 'bottom')
            ->orderBy('created_at', 'DESC')->first();
            
        $aboutVacancie = Vacancy::all();

        // dd($aboutVacancie);

		return view('about',[
            'HeadAbout' => $pageContentAbout,
            'aboutMission' => $aboutMission,
            'aboutVision' => $aboutVision,
            'donnors' => $donnorsLogo,
            'contacts' => $aboutContacts,
            'policy' => $aboutPolicy,
            'vacancies' => $aboutVacancie
        ]);
    }
}