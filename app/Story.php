<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tags_page;
use App\Models\Upload;

class Story extends Model
{
    use SoftDeletes;
	
	protected $table = 'stories';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public function getTagsAttribute($value)
    {
        if(!empty($value) || !is_null($value))
        {  
         return Tags_page::whereIn('id',json_decode($value))->get();
        }else{
            return [];
        }
    }
    
    public function getCoverAttribute($value)
    {
        $photo = Upload::find($value);
        return optional($photo)->thumbnails;
    }
    
    public function getThumbnailPreviewAttribute($value)
    {
        $photo = Upload::find($value);
        return optional($photo)->thumbnails;
    }
    
    public function getThumbnailAttribute($value)
    {
        $photo = Upload::find($value);
        return optional($photo)->thumbnails;
    }
    
    public function blocks()
    {
        return $this->hasMany('App\Block', 'story_id', 'id');
    }
    
    public function authors()
    {
        return $this->belongsToMany('App\Autor', 'Story_authors', 'story_id', 'author_id');
    }
    
    public function edition()
    {
        return $this->hasOne('App\Edition','id','edition_id');
    }
    
    public function TextTrans( $text = null, $lang = null )
    {

      if($lang != null)
      {
          $locale = $lang;
      }else{
          $locale = \App::getLocale();
      }

      $column = $text.'_'.$locale;

      return $this->{$column};
    }
}
