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

use App\Models\Block;
use App\Block as Section;
use App\Block_type;
use App\Models\Story;
use Dwij\Laraadmin\Models\ModuleFieldTypes;
use App\Translation;

class BlocksController extends Controller
{
    public $show_action = true;
    public $view_col = 'media_type';
    public $listing_cols = ['id', 'section_id', 'story_id', 'asset_type_id', 'position', 'dimension', 'subtype', 'dynamic_width', 'dynamic_height', 'dynamic_render', 'media_type', 'infobox_type', 'caption_align', 'video_loop', 'url', 'code', 'fullscreen', 'loop', 'info'];

    public function __construct() {
        // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Blocks', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Blocks', $this->listing_cols);
        }
    }

    /**
	 * Display a listing of the Blocks.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $module = Module::get('Blocks');

        if(Module::hasAccess($module->id)) {
            return View('la.blocks.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Show the form for creating a new block.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function create()
    {}

    public function createBlock($storyid=null,$block_type_id=null)
    {  


        $story = Story::find($storyid);
        $block_types = Block_type::all();
        $block_type = Block_type::find($block_type_id);
       

        $block_module = Module::get('Blocks');
        $Translate_module = Module::get('Translations');
        $translate_fields = [];
        $language = \App\Language::all();
        $sitelangs = [];

        foreach($language as $langs)
        {
            $sitelangs[$langs->locale] = $langs->name;
        }

        $translate_fields  = json_decode( $block_type->translate_fields );

        foreach($block_types as $blocktype)
        {
            $block_types_array[$blocktype->id] = $blocktype->type;
        }


        return view('la.blocks.create',[
            'sitelangs'    => $sitelangs,
            'block_type' => $block_type,
            'block_types' => $block_types,
            'block_types_array' => $block_types_array,
            'block_module' => $block_module,
            'Translate_module' => $Translate_module,
            'translate_fields' => $translate_fields,
            'story' => $story,
        ]);
    }	

    public function addblock(Request $request)
    {

        $Block = Block::create([
            'story_id' => $request->story_id,
            'asset_type_id' => $request->block_type
        ]);
    
        $block_type = Block_type::find((int)$request->block_type);
      
        $translate_fields  = json_decode( $block_type->translate_fields );
        $fields = [];
        foreach($translate_fields as $trans_field)
        {
            $fields[$trans_field] = $request->{$trans_field};
        }

        $fields['block_id'] = $Block->id;
        $trans = Translation::create($fields);
        return back();
    } 
    
    
    public function AddblockAudio(Request $request)
    {

        $Block = Block::create([
            'story_id' => $request->story_id,
            'asset_type_id' => $request->block_type,
            'audio' => $request->audio
        ]);
        
//        \Log::info($message);
        
        return redirect()->route('blockEditing', [$request->story_id,$Block->id]);
//    
//        $block_type = Block_type::find((int)$request->block_type);
//      
//        $translate_fields  = json_decode( $block_type->translate_fields );
//        $fields = [];
//        foreach($translate_fields as $trans_field)
//        {
//            $fields[$trans_field] = $request->{$trans_field};
//        }
//
//        $fields['block_id'] = $Block->id;
//        $trans = Translation::create($fields);
//        return back();
    }
    /**
	 * Store a newly created block in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
        if(Module::hasAccess("Blocks", "create")) {

            $rules = Module::validateRules("Blocks", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Blocks", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.blocks.index');

        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Display the specified block.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function show($id)
    {
        if(Module::hasAccess("Blocks", "view")) {

            $block = Block::find($id);
            if(isset($block->id)) {
                $module = Module::get('Blocks');
                $module->row = $block;

                return view('la.blocks.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('block', $block);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("block"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }


    public function showStoryblocks($id)
    {

        $story = Story::findOrFail($id);
     
        $language = \App\Language::all();
        $sitelangs = [];

        foreach($language as $langs)
        {
            $sitelangs[$langs->locale] = $langs->name;
        }

        $block = Section::where('story_id',$story->id)->first();
        $module = Module::get('Blocks');
        $module->row = $block;

        //          ModuleFieldTypes::find($field_type);

        $Translate_module = Module::get('Translations');

        if(!isset($story->id)) 
        {
            return redirect()->back();
        }

        $blocks = Section::where('story_id',$story->id)->get();
        $block_types = Block_type::all();
        $block_types_array = [];

        foreach($block_types as $block_type)
        {
            $block_types_array[$block_type->id] = $block_type->type;
        }


        return view('la.blocks.update', [
            'block_types'       => $block_types,
            'block_types_array' => $block_types_array,
            'blocks'            => $blocks,
            'module'            => $module,
            'block_module'      => $module,
            'sitelangs'         => $sitelangs,
            'Translate_module'  => $Translate_module,
            //					'view_col'     => $this->view_col,
        ])->with('story', $story);
    }

   
    public function editing($story_id = null,$block_id = null)
    {


        $story = Story::find($story_id);
        $block = Section::find($block_id);
        $block_types = Block_type::all();
        $block_type = Block_type::find( $block->asset_type_id );
        $translations = $block->translations;

        $block_module = Module::get('Blocks');
        $Translate_module = Module::get('Translations');
        $translate_fields = [];
        $language = \App\Language::all();
        $sitelangs = [];

        foreach($language as $langs)
        {
            $sitelangs[$langs->locale] = $langs->name;
        }

        $translate_fields  = json_decode( $block_type->translate_fields );

        foreach($block_types as $blocktype)
        {
            $block_types_array[$blocktype->id] = $blocktype->type;
        }
       
        return view('la.blocks.editing', [
            'sitelangs'         => $sitelangs,
            'block_type'        => $block_type,
            'block_types'       => $block_types,
            'block_types_array' => $block_types_array,
            'block_module'      => $block_module,
            'Translate_module'  => $Translate_module,
            'translate_fields'  => $translate_fields,
            'translations'      => $translations,
            'story'             => $story,
        ])->with('block', $block);

    }
    
    public function editblockAudio(Request $request)
    {
        $story = Story::find($request->story_id);
        $block = Section::find($request->block_id);
        $block->audio = $request->audio;
        $block->save();
        
        return back();
    }
    
    
    public function editblock(Request $request)
    {
      
        $story = Story::find($request->story_id);
        $block = Section::find($request->block_id);
        $block_type = Block_type::find( $block->asset_type_id );
        $translate_fields  = json_decode( $block_type->translate_fields );

        $fields = [];
        foreach($translate_fields as $trans_field)
        {
            $fields[$trans_field] = $request->{$trans_field};
        }
        
        $Block = Translation::where('block_id',$request->block_id)
          ->where('story_id', $request->story_id)
          ->where('locale', $request->Language)
          ->update($fields);
        return back();

    }

    
    
    public function blocksort(Request $request)
    {
        
        $story = Story::find($request->story_id);
        $story->block_sort_oder = json_encode($request->sort);
        $story->save();
        return json_encode($request->all());
        
    }
    
    /**
	 * Show the form for editing the specified block.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function edit($id)
    {
        if(Module::hasAccess("Blocks", "edit")) {			
            $block = Block::find($id);
            if(isset($block->id)) {	
                $module = Module::get('Blocks');

                $module->row = $block;

                return view('la.blocks.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('block', $block);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("block"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }



    /**
	 * Update the specified block in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Blocks", "edit")) {

            $rules = Module::validateRules("Blocks", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("Blocks", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.blocks.index');

        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Remove the specified block from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($id)
    {
        if(Module::hasAccess("Blocks", "delete")) {
            Block::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.blocks.index');
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
        $values = DB::table('blocks')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Blocks');

        for($i=0; $i < count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/blocks/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Blocks", "edit")) {
                    $output .= '<a href="'.url(config('laraadmin.adminRoute') . '/blocks/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if(Module::hasAccess("Blocks", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.blocks.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
    
    
    /*
    
    public function forms(Request $request)
    {
        $block_type = Block_type::find( $request->blocktype );
        $block_module = Module::get('Blocks');
        $Translate_module = Module::get('Translations');
        $translate_fields = json_decode( $block_type->translate_fields );

        return view('la.blocks.formsdisplay',[
            'block_type' => $block_type,
            'block_module' => $block_module,
            'Translate_module' => $Translate_module,
            'translate_fields' => $translate_fields,
        ]);
    }


    */
}
