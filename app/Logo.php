<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Upload;

class Logo extends Model
{
    use SoftDeletes;
	
	protected $table = 'logos';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

    public function getImageAttribute($value)
    {
       $photo = Upload::find($value);
       return optional($photo)->thumbnails;
    }
	
}
