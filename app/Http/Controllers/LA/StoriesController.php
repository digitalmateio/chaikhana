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

use App\Models\Story;
use App\Block;
use App\Block_type;

class StoriesController extends Controller
{
	public $show_action = true;
	public $view_col = 'title_en';
	public $listing_cols = ['id','title_en','edition_id'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Stories', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Stories', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Stories.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Stories');
		
		if(Module::hasAccess($module->id)) {
			return View('la.stories.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new story.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created story in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Stories", "create")) {
		
			$rules = Module::validateRules("Stories", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Stories", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.stories.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified story.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Stories", "view")) {
			
			$story = Story::find($id);
			if(isset($story->id)) {
				$module = Module::get('Stories');
				$module->row = $story;
				
				return view('la.stories.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('story', $story);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("story"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified story.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
        /*
        if(Module::hasAccess("Stories", "edit")) {	
            
			$story = Story::find($id);
            
			if(isset($story->id)) 
            {	
			
                $module = Module::get('Stories');
    			$module->row = $story;

//                $blocks = Block::where('story_id',$story->id)->first();
                $blocks = Block::where('story_id',$story->id)->get();
                $block_types = Block_type::all();
                
//                dd( Block_type::all() );
                
//                foreach($blocks as $block)
//                {
////                    dump( $block->asset_type_id );
//                }
                
//                dd( $blocks->translations );
//                dd( $blocks );
//			      dd(  $module->row  );
//                
                
				return view('la.stories.update', [
					'block_types' => $block_types,
					'blocks'       => $blocks,
					'module'       => $module,
					'view_col'     => $this->view_col,
				])->with('story', $story);
                
                
                
                
                
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("story"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
        */
        
		if(Module::hasAccess("Stories", "edit")) {			
			$story = Story::find($id);
			if(isset($story->id)) {	
				$module = Module::get('Stories');
				
				$module->row = $story;
				
				return view('la.stories.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('story', $story);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("story"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
        
	}

	/**
	 * Update the specified story in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Stories", "edit")) {
			
			$rules = Module::validateRules("Stories", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::updateRow("Stories", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.stories.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified story from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Stories", "delete")) {
			Story::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.stories.index');
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
		$values = DB::table('stories')->select($this->listing_cols)->orderBy('created_at', 'DESC')->whereNull('deleted_at');

		$out = Datatables::of($values)->make();

		$data = $out->getData();
         
		$fields_popup = ModuleFields::getModuleFields('Stories');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) 
            { 
				$col = $this->listing_cols[$j];
                	
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) 
                { 
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/stories/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
                               
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			
            if($this->show_action) {
				
                $output = '';
                
                $output .= '<a href="'.url(config('laraadmin.adminRoute').'/blocks/'.$data->data[$i][0]).'" class="btn btn-info btn-xs" style="margin-right:10px;display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-th-large"></i></a>';
                
				if(Module::hasAccess("Stories", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/stories/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="margin-right:5px;display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Stories", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.stories.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
