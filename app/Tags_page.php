<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Upload;

class Tags_page extends Model
{
    use SoftDeletes;
	
	protected $table = 'tags_pages';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];


	public function getImageAttribute($value)
    {
       $photo = Upload::find($value);
       return optional($photo)->thumbnails;
    }
    

    public function TextTrans( $text = null, $lang = null )
    {

      if($lang != null){
          $locale = $lang;
      }else{
          $locale = \App::getLocale();
      }

      $column = $text.'_'.$locale;

      return $this->{$column};
    }



}
