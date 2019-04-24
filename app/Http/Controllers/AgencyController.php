<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Agency_main_page;
use App\Freelancer_type;
use App\Freelancer_resource;
use App\Freelancer_city;
use App\Freelancer_language;
use App\Freelancer_skill;
use App\Freelancer_equipment;
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

        $freelancerTypes = Freelancer_type::all();
        // dd($agencyHeadInfo);

		return view('agency',[
            'topHeadAboutTop' => $agencyHeadInfoTop,
            'topHeadAboutBottom' => $agencyHeadInfoBottom,
            'types' => $freelancerTypes
        ]);
    }




    public function DataAjax(Request $request)
    {
        $id = $request->id;

        $FreelancResType = Freelancer_resource::where('type', $id)->get();

        $cityArr = array();

        foreach($FreelancResType as $frCt){
            $cityArr[] = $frCt->city;
        }

        $Cities = Freelancer_city::whereIn('id', $cityArr)->get();

        $citiesArr = array();
        foreach($Cities as $key => $city){
            $citiesArr[] = array(
                $city->TextTrans('title'),
                floatval($city->latitude),
                floatval($city->longitude),
                floatval($city->id),
                floatval($id),
            );
        }

        return json_encode($citiesArr);
    }


    //Request $request
    public function DataAjaxFullInfo(int $id = null)
    {

        // dd(1);
        // $cityID = $request->city_id;
        // $typeID = $request->type_id;        
        $cityID = 1;
        $typeID = 1;

        $FreelancResType = Freelancer_resource::where('type', $typeID)->where('city', $cityID)->get();

        $Cities = Freelancer_city::find($cityID);
        $types = Freelancer_type::all();

        // dump($FreelancResType);

        // Langs
        $LangArray = array();
        foreach($FreelancResType as $lang){
            $LangArray[] = json_decode($lang->languages);
        }
        $getLangs = Freelancer_language::whereIn('id', $LangArray[0])->get();

        // skills
        $skillArray = array();
        foreach($FreelancResType as $skill){
            $skillArray[] = json_decode($skill->skills);
        }
        $getSkill = Freelancer_skill::whereIn('id', $skillArray[0])->get();


        // dd($FreelancResType);
        // equipment
        $equipmentArray = array();
        foreach($FreelancResType as $equipment){
            $equipmentArray[] = json_decode($equipment->equipments);
        }
        $equipmentSkill = Freelancer_skill::whereIn('id', $equipmentArray[0])->get();





        $output = '';
                        
        $output .= '
                <div class="map-modal-block">
                    <h2>'.$Cities->TextTrans('title').'</h2>
                    <button><i class="fas fa-times"></i></button>
                </div>
                <div class="map-modal">
                    <h4 class="type">Type Of Freelancer</h4>
                    <ul class="list-inline justify-content-left agency-type-filter-list">';
                        foreach($types as $type){
                        $output .= '<li class="list-inline-item" data-id="'.$type->id.'">'.$type->TextTrans('title').'</li>';
                        }   
        $output .= '</ul>
                    <h4 class="language">language</h4>
                    <ul class="list-inline justify-content-left">';

                        foreach($getLangs as $kay => $lang){

                        
                         $output .= '<li class="list-inline-item">
                            <div class="checkbox">
                                <input type="checkbox" checked="checked" disabled="disabled" id="checkbox_'.$kay.'">
                                <label for="checkbox_'.$kay.'">'.$lang->TextTrans('title').'</label>
                            </div>
                        </li>';

                        }                      


        $output .= '</ul>
                    <h4 class="skills">Skills</h4>
                    <ul class="list-inline justify-content-left ">';

                    foreach($getSkill as $kay => $skill){

                    
             $output .= '<li class="list-inline-item">
                            <div class="checkbox">
                                <input type="checkbox" checked="checked" id="checkbox_'.$kay.'" disabled="disabled">
                                <label for="checkbox_'.$kay.'">'.$skill->TextTrans('title').'</label>
                            </div>
                        </li>';                       
                    }

        $output .= '</ul>  

                    <h4 class="equipment">Equipment</h4>
                    <ul class="list-inline justify-content-left equipment-list">';

                    foreach($equipmentSkill as $Equipm){
            $output .= '<li class="list-inline-item">'.$Equipm->TextTrans('title').'</li>';
                    }

        $output .= '</ul>   
                    <button class="hire-freelancer">Hire Freelancer</button>    
                </div>';



        return $output;
    }




}