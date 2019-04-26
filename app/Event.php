<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Upload;

class Event extends Model
{
    use SoftDeletes;
	
	protected $table = 'events';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function blocks()
    {
        return $this->hasMany('App\Block', 'story_id', 'id');
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
