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

use App\Models\Event;
use App\Block;
use App\Block_type;
use App\Languages;
use App\Translation;

class EventsController extends Controller
{
    public $show_action = true;
    public $view_col = 'title_en';
    public $listing_cols = ['id', 'cover', 'title_en'];
    //	public $listing_cols = ['id', 'cover', 'title_en', 'title_az', 'title_hy', 'title_ka', 'title_ru', 'about_en', 'about_ka', 'about_hy', 'about_az', 'about_ru', 'ad_banner'];

    public function __construct() {
        // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Events', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Events', $this->listing_cols);
        }
    }

    /**
	 * Display a listing of the Events.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $module = Module::get('Events');

        if(Module::hasAccess($module->id)) {
            return View('la.events.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Show the form for creating a new event.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function create()
    {
        //
    }

    public function createEventTranslation($event_id=null,$block_id=null)
    {  

        $event = Event::findOrFail($event_id);
        $block_types = Block_type::all();
        $block = Block::find($block_id);
        $block_type = Block_type::find($block->asset_type_id);


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


        return view('la.events.createtranslation',[
            'sitelangs'    => $sitelangs,
            'block_type' => $block_type,
            'block_types' => $block_types,
            'block_types_array' => $block_types_array,
            'block_module' => $block_module,
            'Translate_module' => $Translate_module,
            'translate_fields' => $translate_fields,
            'event' => $event,
        ]);

    }	

    public function createBlock($event_id=null,$block_type_id=null)
    {  

        $event = Event::findOrFail($event_id);
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


        return view('la.events.create',[
            'sitelangs'    => $sitelangs,
            'block_type' => $block_type,
            'block_types' => $block_types,
            'block_types_array' => $block_types_array,
            'block_module' => $block_module,
            'Translate_module' => $Translate_module,
            'translate_fields' => $translate_fields,
            'event' => $event,
        ]);

    }	

    public function addblock(Request $request)
    {

        $Block = Block::create([
            'event_id' => $request->event_id,
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
        $fields['event_id'] = $request->event_id;
        $fields['locale']   = $request->Language;

        $trans = Translation::create($fields);

        //        \Log::info( json_encode($trans) ) ;
        return redirect()->route('showEventBlocks',$request->event_id);
    } 

    public function editing($event_id = null,$block_id = null)
    {

        $event = Event::findOrFail($event_id);
        $block = Block::find($block_id);
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

        return view('la.events.editing', [
            'sitelangs'         => $sitelangs,
            'block_type'        => $block_type,
            'block_types'       => $block_types,
            'block_types_array' => $block_types_array,
            'block_module'      => $block_module,
            'Translate_module'  => $Translate_module,
            'translate_fields'  => $translate_fields,
            'translations'      => $translations,
            'event'             => $event,
        ])->with('block', $block);

    }


    public function editblock(Request $request)
    {

        $event = Event::findOrFail($request->event_id);
        $block = Block::find($request->block_id);
        $block_type = Block_type::find( $block->asset_type_id );
        $translate_fields  = json_decode( $block_type->translate_fields );

        $fields = [];
        $fields['locale']   = $request->Language;

        foreach($translate_fields as $trans_field)
        {
            $fields[$trans_field] = $request->{$trans_field};
        }

        $trans = Translation::where('block_id',$request->block_id)->where('locale',$request->Language)->first();

        $fields['event_id'] = $request->event_id;
        $fields['block_id'] = $request->block_id;
        $fields['locale']   = $request->Language;

        if(count($trans) == 0)
        {    

            $transsave = Translation::create( $fields );

        }else{

            $translat = Translation::where('block_id',$request->block_id)
                ->where('event_id', $request->event_id)
                ->where('locale', $request->Language)
                ->update($fields);
        }

        return redirect()->route('eventeditblock', [$request->event_id,$request->block_id]);
    }


    public function AddblockAudio(Request $request)
    {

        $Block = Block::create([
            'event_id' => $request->event_id,
            'asset_type_id' => $request->block_type,
            'audio' => $request->audio
        ]);

        return redirect()->route('eventeditblock', [$request->event_id,$Block->id]);

    }

    public function editblockAudio(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $block = Block::findOrFail($request->block_id);
        $block->audio = $request->audio;
        $block->save();

        return redirect()->route('eventeditblock', [$request->event_id,$request->block_id]);
    }


    public function deleteBlock(Request $request)
    {        
        Translation::where('block_id',$request->block_id)
            ->where('event_id', $request->event_id)
            ->where('locale', $request->Language)
            ->delete();

        Block::where('id',$request->block_id)
            ->where('event_id', $request->event_id)
            ->delete();
        return redirect()->route('showEventBlocks',$request->event_id);
    }

    public function blocksort(Request $request)
    {

        $event = Event::findOrFail($request->event_id);
        $event->block_sort_oder = json_encode($request->sort);
        $event->save();
        return json_encode($request->all());

    }


    public function showEventBlocks(int $event_id = null)
    {
        $event = Event::findOrFail($event_id);

        $language = \App\Language::all();
        $sitelangs = [];

        foreach($language as $langs)
        {
            $sitelangs[$langs->locale] = $langs->name;
        }

        $block = Block::where('event_id',$event->id)->first();
        $module = Module::get('Blocks');
        $module->row = is_null($block) ? new Block() : $block ;

        //          ModuleFieldTypes::find($field_type);

        $Translate_module = Module::get('Translations');

        if(!isset($event->id)) 
        {
            return redirect()->back();
        }

        $blocks = Block::where('event_id',$event->id)->get();
        $block_types = Block_type::all();
        $block_types_array = [];

        foreach($block_types as $block_type)
        {
            $block_types_array[$block_type->id] = $block_type->type;
        }


        return view('la.events.update', [
            'block_types'       => $block_types,
            'block_types_array' => $block_types_array,
            'blocks'            => $blocks,
            'module'            => $module,
            'block_module'      => $module,
            'sitelangs'         => $sitelangs,
            'Translate_module'  => $Translate_module,
            //					'view_col'     => $this->view_col,
        ])->with('event', $event);

    }

    /**
	 * Store a newly created event in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
        if(Module::hasAccess("Events", "create")) {

            $rules = Module::validateRules("Events", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Events", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.events.index');

        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Display the specified event.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function show($id)
    {
        if(Module::hasAccess("Events", "view")) {

            $event = Event::find($id);
            if(isset($event->id)) {
                $module = Module::get('Events');
                $module->row = $event;

                return view('la.events.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('event', $event);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("event"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Show the form for editing the specified event.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function edit($id)
    {
        if(Module::hasAccess("Events", "edit")) {			
            $event = Event::find($id);
            if(isset($event->id)) {	
                $module = Module::get('Events');

                $module->row = $event;

                return view('la.events.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('event', $event);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("event"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Update the specified event in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Events", "edit")) {

            $rules = Module::validateRules("Events", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("Events", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.events.index');

        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
	 * Remove the specified event from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($id)
    {
        if(Module::hasAccess("Events", "delete")) {
            Event::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.events.index');
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
        $values = DB::table('events')->select($this->listing_cols)->orderBy('created_at', 'DESC')->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Events');

        for($i=0; $i < count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/events/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if($this->show_action) {

                $output = '';
                $output .= '<a href="'.url(config('laraadmin.adminRoute').'/events/blocks/'.$data->data[$i][0]).'" class="btn btn-info btn-xs" style="margin-right:10px;display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-th-large"></i></a>';

                if(Module::hasAccess("Events", "edit")) {
                    $output .= '<a href="'.url(config('laraadmin.adminRoute') . '/events/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if(Module::hasAccess("Events", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.events.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
