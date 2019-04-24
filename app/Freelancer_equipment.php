<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Freelancer_equipment extends Model
{
    use SoftDeletes;
	
	protected $table = 'freelancer_equipments';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

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
