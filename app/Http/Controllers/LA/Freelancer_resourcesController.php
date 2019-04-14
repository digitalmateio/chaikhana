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

use App\Models\Freelancer_resource;

class Freelancer_resourcesController extends Controller
{
	public $show_action = true;
	public $view_col = 'type';
	public $listing_cols = ['id', 'type', 'skills', 'languages', 'equipments', 'city'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Freelancer_resources', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Freelancer_resources', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Freelancer_resources.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Freelancer_resources');
		
		if(Module::hasAccess($module->id)) {
			return View('la.freelancer_resources.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new freelancer_resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created freelancer_resource in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Freelancer_resources", "create")) {
		
			$rules = Module::validateRules("Freelancer_resources", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Freelancer_resources", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_resources.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified freelancer_resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Freelancer_resources", "view")) {
			
			$freelancer_resource = Freelancer_resource::find($id);
			if(isset($freelancer_resource->id)) {
				$module = Module::get('Freelancer_resources');
				$module->row = $freelancer_resource;
				
				return view('la.freelancer_resources.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('freelancer_resource', $freelancer_resource);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("freelancer_resource"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified freelancer_resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Freelancer_resources", "edit")) {			
			$freelancer_resource = Freelancer_resource::find($id);
			if(isset($freelancer_resource->id)) {	
				$module = Module::get('Freelancer_resources');
				
				$module->row = $freelancer_resource;
				
				return view('la.freelancer_resources.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('freelancer_resource', $freelancer_resource);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("freelancer_resource"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified freelancer_resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Freelancer_resources", "edit")) {
			
			$rules = Module::validateRules("Freelancer_resources", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Freelancer_resources", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_resources.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified freelancer_resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Freelancer_resources", "delete")) {
			Freelancer_resource::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.freelancer_resources.index');
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
		$values = DB::table('freelancer_resources')->select($this->listing_cols)->orderBy('created_at', 'DESC')->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Freelancer_resources');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/freelancer_resources/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Freelancer_resources", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/freelancer_resources/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Freelancer_resources", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.freelancer_resources.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
