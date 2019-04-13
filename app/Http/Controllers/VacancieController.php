<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Vacancy;



/**
 * Class VacancieController
 * @package App\Http\Controllers
 */
class VacancieController extends Controller
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
    public function index(int $id = null)
    {
        $getVacancy = Vacancy::find($id);
		return view('vacancy',[
            'vacancys' => $getVacancy
        ]);
    }
}