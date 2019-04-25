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

use App\Models\Photo_shop_order;

class Photo_shop_ordersController extends Controller
{
	public $show_action = true;
	public $view_col = 'photo';
	public $listing_cols = ['id', 'photo', 'quantity', 'address', 'email', 'shipping_country', 'size'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Photo_shop_orders', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Photo_shop_orders', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Photo_shop_orders.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Photo_shop_orders');
		
		if(Module::hasAccess($module->id)) {
			return View('la.photo_shop_orders.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new photo_shop_order.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created photo_shop_order in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Photo_shop_orders", "create")) {
		
			$rules = Module::validateRules("Photo_shop_orders", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Photo_shop_orders", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.photo_shop_orders.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified photo_shop_order.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Photo_shop_orders", "view")) {
			
			$photo_shop_order = Photo_shop_order::find($id);
			if(isset($photo_shop_order->id)) {
				$module = Module::get('Photo_shop_orders');
				$module->row = $photo_shop_order;
				
				return view('la.photo_shop_orders.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('photo_shop_order', $photo_shop_order);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("photo_shop_order"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified photo_shop_order.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Photo_shop_orders", "edit")) {			
			$photo_shop_order = Photo_shop_order::find($id);
			if(isset($photo_shop_order->id)) {	
				$module = Module::get('Photo_shop_orders');
				
				$module->row = $photo_shop_order;
				
				return view('la.photo_shop_orders.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('photo_shop_order', $photo_shop_order);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("photo_shop_order"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified photo_shop_order in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Photo_shop_orders", "edit")) {
			
			$rules = Module::validateRules("Photo_shop_orders", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Photo_shop_orders", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.photo_shop_orders.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified photo_shop_order from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Photo_shop_orders", "delete")) {
			Photo_shop_order::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.photo_shop_orders.index');
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
		$values = DB::table('photo_shop_orders')->select($this->listing_cols)->orderBy('created_at', 'DESC')->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Photo_shop_orders');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/photo_shop_orders/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Photo_shop_orders", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/photo_shop_orders/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Photo_shop_orders", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.photo_shop_orders.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
