<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Upload;
    
class Translation extends Model
{
    use SoftDeletes;
	
	protected $table = 'translations';
	
	protected $hidden = [
        
    ];
    
    protected $fillable = [
        "block_id",
        "story_id",
        "event_id",
        "audio",
        "image",
        "description",
        "title",
        "text",
        "caption",
        "caption_align",
        "source",
        "infobox_type",
        "media_type",
        "video",
        "code",
        "url",
        "dataset_url",
        "dynamic_url",
        "dynamic_code",
        "dataset_url",
        "dynamic_url",
        "dynamic_code",
        "locale",
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public function getImageAttribute($value)
    {
        return Upload::find($value);
    }
    
    public function getImage()
    {
        return Upload::find($this->image);
    }
    
    
    
//    public function getImagesAttribute($value)
//    { 
//        return $value;
////        if($value == '[]')
////        {
////            return [];
////            return new Upload();
////        }       
//////        
////        return Upload::whereIn('id',json_decode($value) )->get();
//    }
    
    public function getImages()
    {
//         return $this->images;
         return Upload::whereIn('id',json_decode($this->images) )->get();
    }
    
    function getVideoAttribute($value)
    {
        return optional(Upload::find($value))->url;
    }
    
    function getAudioAttribute($value)
    {
//         return optional(Upload::find($value))->url;
        return Upload::find($value);
    }
    
    public function block()
    {
         return $this->belongsTo('App\Block','block_id');
    }
}
