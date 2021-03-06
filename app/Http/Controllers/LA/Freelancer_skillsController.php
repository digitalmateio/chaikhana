<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Freelancer_skill;

class Freelancer_skillsController extends Controller
{
	public $show_action = true;
	public $view_col = 'title_en';
	public $listing_cols = ['id', 'title_en', 'title_ka', 'title_hy', 'title_az', 'title_ru'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Freelancer_skills', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Freelancer_skills', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Freelancer_skills.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Freelancer_skills');
		
		if(Module::hasAccess($module->id)) {
			return View('la.freelancer_skills.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new freelancer_skill.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created freelancer_skill in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Freelancer_skills", "create")) {
		
			$rules = Module::validateRules("Freelancer_skills", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Freelancer_skills", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_skills.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified freelancer_skill.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Freelancer_skills", "view")) {
			
			$freelancer_skill = Freelancer_skill::find($id);
			if(isset($freelancer_skill->id)) {
				$module = Module::get('Freelancer_skills');
				$module->row = $freelancer_skill;
				
				return view('la.freelancer_skills.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('freelancer_skill', $freelancer_skill);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("freelancer_skill"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified freelancer_skill.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Freelancer_skills", "edit")) {			
			$freelancer_skill = Freelancer_skill::find($id);
			if(isset($freelancer_skill->id)) {	
				$module = Module::get('Freelancer_skills');
				
				$module->row = $freelancer_skill;
				
				return view('la.freelancer_skills.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('freelancer_skill', $freelancer_skill);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("freelancer_skill"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified freelancer_skill in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Freelancer_skills", "edit")) {
			
			$rules = Module::validateRules("Freelancer_skills", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Freelancer_skills", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_skills.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified freelancer_skill from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Freelancer_skills", "delete")) {
			Freelancer_skill::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_skills.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('freelancer_skills')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Freelancer_skills');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/freelancer_skills/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Freelancer_skills", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/freelancer_skills/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Freelancer_skills", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.freelancer_skills.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
