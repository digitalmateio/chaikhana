<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DataTables;
//use Yajra\DataTables\Html\Builder;

class Sections_types extends Model
{
    use SoftDeletes;

    //	protected $table = 'blocks';

    protected $hidden = [

    ];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    
    
    public static function showEmbedMediaSection($translate,$fields)
    {
        $content = '<div class="table-responsive">
            <table class="table table-bordered"><tr>';
        
        foreach($fields as $field)
        {
             $content .=  "<th>$field</th>";
        }
         $content .= '</tr><tr>';
        
          foreach($fields as $field)
        {
             $content .=  "<td>".$translate->{$field}."</td>";
        }
        $content .= '</tr></table></div>';
        return $content;
            
    }  
    
    public static function showInfographicsSection($translate,$fields)
    {
        $content = '<div class="table-responsive">
            <table class="table table-bordered"><tr>';
        
        foreach($fields as $field)
        {
             $content .=  "<th>$field</th>";
        }
         $content .= '</tr><tr>';
        
          foreach($fields as $field)
        {
             $content .=  "<td>".$translate->{$field}."</td>";
        }
        $content .= '</tr></table></div>';
        return $content;
            
    }

    public static function showTextSection($translate,$fields)
    {
              
        $content = '<div class="table-responsive">
            <table class="table table-bordered"><tr>';
        
        foreach($fields as $field)
        {
             $content .=  "<th>$field</th>";
        }
         $content .= '</tr><tr>';
        
          foreach($fields as $field)
        {
             $content .=  "<td>".$translate->{$field}."</td>";
        }
        $content .= '</tr></table></div>';
        return $content;
             
        $table = '<div class="table-responsive">
            <table class="table ">

              <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Age</th>
              </tr>
              <tr>
                <td>Jill</td>
                <td>Smith</td> 
                <td>50</td>
              </tr>

            </table>
        </div>';
        
        return $content;
    }
    
    public static function showYoutubeEmbed( $video_id ,$translate)
    {
              
             
     $embed = '<iframe width="500" height="300" src="https://www.youtube.com/embed/'. $video_id .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        
        $table = '<div class="table-responsive">
            <table class="table ">

              <tr>
                <th>title</th>
                <th>video</th>
              </tr>
              <tr>
                <td>'.$translate->title.'</td>
                <td>'.$embed.'</td>
              </tr>

            </table>
        </div>';
        return $table;
    }

    /*
               <div class="table-responsive">
                        <table class="table ">



                        </table>
                        </div>
                      </div>
    */


}
