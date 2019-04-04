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

use App\Models\Footer_menu_list;

class Footer_menu_listsController extends Controller
{
	public $show_action = true;
	public $view_col = 'title_en';
	public $listing_cols = ['id', 'title_en', 'title_ka', 'title_ny', 'title_az', 'title_ru', 'link'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Footer_menu_lists', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Footer_menu_lists', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Footer_menu_lists.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Footer_menu_lists');
		
		if(Module::hasAccess($module->id)) {
			return View('la.footer_menu_lists.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new footer_menu_list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created footer_menu_list in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Footer_menu_lists", "create")) {
		
			$rules = Module::validateRules("Footer_menu_lists", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Footer_menu_lists", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.footer_menu_lists.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified footer_menu_list.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Footer_menu_lists", "view")) {
			
			$footer_menu_list = Footer_menu_list::find($id);
			if(isset($footer_menu_list->id)) {
				$module = Module::get('Footer_menu_lists');
				$module->row = $footer_menu_list;
				
				return view('la.footer_menu_lists.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('footer_menu_list', $footer_menu_list);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("footer_menu_list"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified footer_menu_list.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Footer_menu_lists", "edit")) {			
			$footer_menu_list = Footer_menu_list::find($id);
			if(isset($footer_menu_list->id)) {	
				$module = Module::get('Footer_menu_lists');
				
				$module->row = $footer_menu_list;
				
				return view('la.footer_menu_lists.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('footer_menu_list', $footer_menu_list);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("footer_menu_list"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified footer_menu_list in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Footer_menu_lists", "edit")) {
			
			$rules = Module::validateRules("Footer_menu_lists", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Footer_menu_lists", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.footer_menu_lists.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified footer_menu_list from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Footer_menu_lists", "delete")) {
			Footer_menu_list::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.footer_menu_lists.index');
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
		$values = DB::table('footer_menu_lists')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Footer_menu_lists');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/footer_menu_lists/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Footer_menu_lists", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/footer_menu_lists/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Footer_menu_lists", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.footer_menu_lists.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
