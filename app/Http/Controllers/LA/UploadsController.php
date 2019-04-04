<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Input;
use Collective\Html\FormFacade as Form;

use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Helpers\LAHelper;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Auth;
use DB;
use File;
use Validator;
use Datatables;
use Config;

use App\Models\Upload;

class UploadsController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['type', 'id', 'name','size', 'path', 'extension', 'user_id', 'url'];
	
	public function __construct() {
		// for authentication (optional)
		$this->middleware('auth', ['except' => 'get_file']);
		
		$module = Module::get('Uploads');
		$listing_cols_temp = array();
		foreach ($this->listing_cols as $col) {
			if($col == 'id') {
				$listing_cols_temp[] = $col;
			} else if(Module::hasFieldAccess($module->id, $module->fields[$col]['id'])) {
				$listing_cols_temp[] = $col;
			}
		}
		$this->listing_cols = $listing_cols_temp;
	}
	
	/**
	 * Display a listing of the Uploads.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Uploads');
		
		if(Module::hasAccess($module->id)) {
			return View('la.uploads.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}
	
    /**
     * Upload fiels via DropZone.js
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_files() {

		if(Module::hasAccess("Uploads", "create")) {

			$input = Input::all();

			if(!Input::hasFile('file')) {
				return response()->json('error: upload file not found.', 400);
			}


			DB::beginTransaction();

			try {

				$user = (isset(Auth::user()->id)) ? Auth::user()->id :0;
				$upload = Upload::create([
					"user_id" => $user,
					"type" => 0,
					"size" => 0,
					"name" => '',
					"extension" => '',
					"public" => 0,
					"path" => '',
					"url" =>'',
				]);

				$upload->save();

				$file = Input::file('file');

				$folder = public_path(Config::get('file_config.file_master_directory_name'));



				if (!File::exists($folder)) {
					File::makeDirectory($folder, 0777);
				}

				if (!File::isWritable($folder)) {
					DB::rollback();
					return response()->json([
						"status" => "error",
						"upload" => 'file in not writable [ ' . $folder . ' ] '
					], 403);
				}

				$filename = $file->getClientOriginalName();
				$filename_orig = $filename;

				$valid_files = Config::get('file_config.valid_files');
				$valid_types = Config::get('file_config.file_types');

				$extention = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
				$file_mime = $file->getMimeType();
				$file_type = substr($file_mime,0,strpos( $file_mime,'/'));


				$file_type_id = (isset($valid_types[$file_type])) ? $valid_types[$file_type] : end($valid_types);
				
				$file_thumb_sizes= Config::get('file_config.file_thumb_sizes');
				
				$file_production_thumb_sizes = Config::get('file_config.file_production_thumb_sizes');
				
				//\Log::info("Config::get('file_config.file_production_thumb_sizes') : ", Config::get('file_config.file_production_thumb_sizes') );
				//\Log::info('file_production_thumb_sizes : ', $file_production_thumb_sizes );
				//\Log::info( '$file_production_thumb_sizes :  ' . json_encode( $file_production_thumb_sizes ) );
				
				
				
				
				$upload_date = date("Y-m-d", time());
				$file_size = File::size($file);
				$filename = $upload->id . '.' . $extention;

				if(!in_array($extention,$valid_files)) {
					DB::rollback();
					return response()->json([
						"status" => "error",
						"upload" => 'invalid file type files must be in [' . implode(',', $valid_types) . '] format'
					], 403);
				}

				$file_type_folder = $folder . DIRECTORY_SEPARATOR . $file_type;
				$file_date_folder = $file_type_folder . DIRECTORY_SEPARATOR . $upload_date;
				
				$thumbnail_folder = $file_type_folder . DIRECTORY_SEPARATOR . $upload_date. DIRECTORY_SEPARATOR .'thumbnails';

				//\Log::info( '$thumbnail_folder :  ' . $thumbnail_folder );

				// CREATE APPROPRIATE DIRECTORIS TO STORE FILE IN
				if (!File::exists($file_type_folder)) {
					File::makeDirectory($file_type_folder, 0777);
				}

				if (!File::isWritable($file_type_folder)) {
					DB::rollback();
					
				//	\Log::info( 'is not writabl :  ' . $file_type_folder );
					
					return response()->json([
						"status" => "error",
						"upload" => 'file in not writable [ ' . $file_type_folder . ' ] '
					], 403);
				}


				if (!File::exists($file_date_folder)) {
					File::makeDirectory($file_date_folder, 0777);
				}

				if (!File::isWritable($file_date_folder)) {
					DB::rollback();
					
					//\Log::info( 'is not writabl :  ' . $file_date_folder );
					
					return response()->json([
						"status" => "error",
						"upload" => 'file in not writable [ ' . $file_date_folder . ' ] '
					], 403);
				}
				
				
/*********************  for production code **********************************************/
				// CREATE APPROPRIATE DIRECTORIS TO STORE FILE FOR MOBILE
                
				if (!File::exists($thumbnail_folder)) {
					File::makeDirectory($thumbnail_folder, 0777);
					//\Log::info( 'File::makeDirectory :  ' . $thumbnail_folder );
				}

				if (!File::isWritable($thumbnail_folder)) {
					DB::rollback();
					
					//\Log::info( 'is not writabl :  ' . $thumbnail_folder );
					
					return response()->json([
						"status" => "error",
						"upload" => 'file in not writable [ ' . $file_type_folder . ' ] '
					], 403);
				}
               
/********************* end for production code **********************************************/

				$upload_success = Input::file('file')->move($file_date_folder, $filename);
							/* after uploading will resize to 1080x720 and  mogrify to 70% */
				//$iurl = 'cd "'.$file_date_folder.'" && mogrify -resize 1080x720 '.$filename.' && mogrify -quality 100 '.$filename ;
				//shell_exec($iurl);

				if($file_type == 'image') {

				//	$iurl = 'cd "'.$file_date_folder.'" && mogrify -resize 1080x720 '.$filename.' && mogrify -quality 100 '.$filename ;
				//shell_exec($iurl);

					foreach($file_thumb_sizes as $key => $value) {

						$_dir_name = $value['width'] . 'X' . $value['height'];

						// CREATE APPROPRIATE DIRECTORIS TO STORE FILE IN
						if (!File::exists($file_date_folder . DIRECTORY_SEPARATOR .$_dir_name)) {
							File::makeDirectory($file_date_folder . DIRECTORY_SEPARATOR .$_dir_name, 0777);
						}

						if (!File::isWritable($file_date_folder . DIRECTORY_SEPARATOR .$_dir_name)) {
							DB::rollback();
							return response()->json([
								"status" => "error",
								"upload" => 'file in not writable [ ' . $file_date_folder . DIRECTORY_SEPARATOR .$_dir_name . ' ] '
							], 403);
						}

						\LAHelper::cropThumbnail(
							$file_date_folder . DIRECTORY_SEPARATOR .  $filename,
							$file_date_folder . DIRECTORY_SEPARATOR .$_dir_name .DIRECTORY_SEPARATOR .  $filename,
							$value['width'],
							$value['height'],
							"transparent"
						);
					}
					
					   /* crop for production tumbnails */
     
		
        foreach( $file_production_thumb_sizes as $key => $value)
            {
			//	\Log::info( 'FOREACH SHI MOVIDA Value =  :  ' . json_encode( $value ) );
			//	\Log::info( 'FOREACH SHI MOVIDA Valueსსსსსს =  :  ' . $value['width'] . 'X' . $value['height'] );
				
                $_dir_name = $value['width'] . 'X' . $value['height'];

                // CREATE APPROPRIATE DIRECTORIS TO STORE FILE IN
                if (!File::exists($thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name)) {
			//		\Log::info( 'thumbnail folder ar arsebobso da shevqmnio  :  '. $thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name );
                    File::makeDirectory($thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name, 0777);
                }

                if (!File::isWritable($thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name)) {
                    DB::rollback();
			//		\Log::info( 'thumbnail folder ar arsebaris chacradio  :  ' .$thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name );
                    return response()->json([
                        "status" => "error",
                        "upload" => 'file in not writable [ ' . $thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name . ' ] '
                    ], 403);
                }
            
            
               $iurl = 'cd "'.$file_date_folder.'" && convert '.$filename.' -resize '.$value['width'] . 'X' . $value['height'].' '.$thumbnail_folder . DIRECTORY_SEPARATOR .$_dir_name .DIRECTORY_SEPARATOR .  $filename;	
            //  \Log::info( ' URL FORM IMAGEMAGIC :  ' .$iurl );
		
               // shell_exec($iurl);
           }
		   
		   
				}

				$public = Input::get('public');
				if(isset($public)) {
					$public = 1;
				} else {
					$public = 0;
				}

				if( $upload_success ) {
					$finalize_upload = Upload::where('id','=',$upload->id)->update([
						"type" => $file_type_id,
						"size" => $file_size,
						"name" => $filename_orig,
						"extension" => $extention,
						"public" => $public,
						"path" => $folder . DIRECTORY_SEPARATOR . $file_type . DIRECTORY_SEPARATOR . $upload_date . DIRECTORY_SEPARATOR .  $filename,
						"url" => $file_type . '/' . $upload_date .  '/'  .  $filename,
						"user_id" =>$user
					]);

					DB::commit();
					return response()->json([
						"status" => "success",
						"upload" => Upload::findorFail($upload->id)
					], 200);

				} else {
					DB::rollback();
					return response()->json([
						"status" => "error"
					], 400);
				}
			}catch(Exception $e){
				DB::rollback();
			}
		} else {
			return response()->json([
				'status' => "failure",
				'message' => "Unauthorized Access"
			]);
		}
    }

    /**
     * Get all files from uploads folder
     *
     * @return \Illuminate\Http\Response
     */
    public function uploaded_files()
    {
		if(Module::hasAccess("Uploads", "view")) {
			$uploads = array();
	
			// print_r(Auth::user()->roles);
			if(Entrust::hasRole('SUPER_ADMIN')) {
				$uploads = Upload::all();
			} else {
				if(config('laraadmin.uploads.private_uploads')) {
					// Upload::where('user_id', 0)->first();
					$uploads = Auth::user()->uploads;
				} else {
					$uploads = Upload::all();
				}
			}
			$uploads2 = array();
			foreach ($uploads as $upload) {
				$u = (object) array();
				$u->id = $upload->id;
				$u->name = $upload->name;
				$u->extension = $upload->extension;
				$u->public = $upload->public;
				
				$u->user = $upload->user->name;
				$u->url = $upload->url;
				$u->thumbnails = $upload->thumbnails;
				$u->path = $upload->path;
				$u->type = $upload->type;

				$uploads2[] = $u;
			}
			return response()->json(['uploads' => $uploads2]);
		} else {
			return response()->json([
				'status' => "failure",
				'message' => "Unauthorized Access"
			]);
		}
    }

    

    /**
     * Update Uploads Filename
     *
     * @return \Illuminate\Http\Response
     */
    public function update_filename()
    {
        if(Module::hasAccess("Uploads", "edit")) {
			$file_id = Input::get('file_id');
			$filename = Input::get('filename');
			
			$upload = Upload::find($file_id);
			if(isset($upload->id)) {
				if($upload->user_id == Auth::user()->id || Entrust::hasRole('SUPER_ADMIN')) {
	
					// Update Caption
					$upload->name = $filename;
					$upload->save();
	
					return response()->json([
						'status' => "success"
					]);
	
				} else {
					return response()->json([
						'status' => "failure",
						'message' => "Unauthorized Access 1"
					]);
				}
			} else {
				return response()->json([
					'status' => "failure",
					'message' => "Upload not found"
				]);
			}
		} else {
			return response()->json([
				'status' => "failure",
				'message' => "Unauthorized Access"
			]);
		}
    }

    /**
     * Update Uploads Public Visibility
     *
     * @return \Illuminate\Http\Response
     */
    public function update_public()
    {
		if(Module::hasAccess("Uploads", "edit")) {
			$file_id = Input::get('file_id');
			$public = Input::get('public');
			
			
			$upload = Upload::find($file_id);
			if(isset($upload->id)) {
				if($upload->user_id == Auth::user()->id || Entrust::hasRole('SUPER_ADMIN')) {
					if($upload->public == 0) 
					$public = 1;
					else $public = 0;
					// Update Caption
					$upload->public = $public;
					$upload->save();
	
					return response()->json([
						'status' => "success"
					]);
	
				} else {
					return response()->json([
						'status' => "failure",
						'message' => "Unauthorized Access 1"
					]);
				}
			} else {
				return response()->json([
					'status' => "failure",
					'message' => "Upload not found"
				]);
			}
		} else {
			return response()->json([
				'status' => "failure",
				'message' => "Unauthorized Access"
			]);
		}
    }

    /**
     * Remove the specified upload from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_file()
    {
        if(Module::hasAccess("Uploads", "delete")) {
			$file_id = Input::get('file_id');
			
			$upload = Upload::find($file_id);
			if(isset($upload->id)) {
				if($upload->user_id == Auth::user()->id || Entrust::hasRole('SUPER_ADMIN')) {
	
					// Update Caption
					$upload->delete();
	
					return response()->json([
						'status' => "success"
					]);
	
				} else {
					return response()->json([
						'status' => "failure",
						'message' => "Unauthorized Access 1"
					]);
				}
			} else {
				return response()->json([
					'status' => "failure",
					'message' => "Upload not found"
				]);
			}
		} else {
			return response()->json([
				'status' => "failure",
				'message' => "Unauthorized Access"
			]);
		}
    }
}
