<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Carbon\Carbon;

class Upload extends Model
{
    use SoftDeletes;
	
	protected $table = 'uploads';
	
	protected $hidden = [
        
    ];

    protected $appends = ['thumbnails', 'type_name'];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	/**
     * Get the user that owns upload.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

    public function getThumbnailsAttribute($value)
    {
        $ar = [];
       
        if($this->type == 3){
            foreach(Config::get('file_config.file_thumb_sizes') as $file_thumb_sizes) {
                
                $key            = $file_thumb_sizes['width'] . 'x' .$file_thumb_sizes['height']; 
                $server_path    = Config::get('file_config.static_server_path');
                $folder         = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->toDateString();
                $thumb_folder   = strtoupper($key);
                $file_name      =  $this->id .'.'.$this->extension;
                
                $ar[$key] = $server_path . '/' . $this->type_name . '/' . $folder . '/' . $thumb_folder .'/' .$file_name;
            }
			$ar[] = $server_path . '/' . $this->type_name . '/' . $folder . '/' .$file_name;

        }else{
            return null;
        }
        
        
        //TO DO return all posible thumbnails if type is image other wise return an empty array or CAN WE GET RID OF THIS ? ;/
        return $ar;
    }


    public function getTypeNameAttribute($value)
    {
        $r = array_flip(Config::get('file_config.file_types'));
        return $r[$this->type];
    }


    /**
     * Get File path
     */
    public function getUrlAttribute($value)
    {
        return Config::get('file_config.static_server_path') . '/' . $value;
    }
}
