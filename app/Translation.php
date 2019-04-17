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

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public function getImageAttribute($value)
    {
        return Upload::find($value);
    }
    
    function getVideoAttribute($value)
    {
        return optional(Upload::find($value))->url;
    }
}
