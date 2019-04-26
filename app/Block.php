<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Translation;

class Block extends Model
{
    use SoftDeletes;
	
	protected $table = 'blocks';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

    public function getTranslationBylang()
    {
        return Translation::where('locale',\App::getLocale())->where('block_id',$this->id)->first();
    }
    
    public function translations()
    {
        return $this->hasMany('App\Translation','block_id','id');
    }
    
    public function translation()
    {
//        return $this->hasMany('App\Translation','block_id','id');
        return $this->belongsToMany('App\Translation','block_id','id');
    }

    
}
