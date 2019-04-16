<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DataTables;
use App\Models\Upload;
//use Yajra\DataTables\Html\Builder;

class Sections_types extends Model
{
    use SoftDeletes;

    //	protected $table = 'blocks';

    protected $hidden = [

    ];

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public static function ShowBlocks($translations,$block,$fields)
    {

        switch( $block->asset_type_id ){
            
            case 13 : 
                return \App\Sections_types::showYoutubeEmbed($translations);
                break;
            case 3:
                return \App\Sections_types::showTextSection($translations,$fields);
                break;
            case 4:
                return \App\Sections_types::showImages($translations,$block,$fields) ;
                break;
            case 5 : 
                return \App\Sections_types::showVideo($translations,$fields);
                break;
            case 9:
                return \App\Sections_types::showInfographicsSection($translations,$fields) ;
                break;
            case 12:
                return \App\Sections_types::showEmbedMediaSection($translations,$fields);
                break;
            default:
                break;

        }  

    }
    
    public static function showVideo($translations,$fields)
    {
         $content = '';

        foreach($translations as $translate)
        {

            $content .= '<div class="table-responsive">
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
            //<video src=”url” width=”640px” height=”380px” autoplay/>

            $content .= '</tr></table></div>';
        }
        return $content;
    }

    public static function showImages($translations,$block,$fields)
    {

        $content = '';

        foreach($translations as $translate)
        {
            $image = $translate->image;

            $content .= '<div class="table-responsive">
                <table class="table table-bordered"><tr>';

            $content .=  "<th>lang</th>";
            foreach($fields as $field)
            {
                $content .=  "<th>$field</th>";

            }
            $content .= "<th>image</th>";
            $content .= '</tr><tr>';

            $content .=  "<td>".$translate->locale."</td>";

            foreach($fields as $field)
            {
                $content .=  "<td>".$translate->{$field}."</td>";                 
            }


            $content .=  "<td><img src='".optional($image)->url."' width=200></td>";

            $content .= '</tr></table></div>';
            //           dump($content);
        }
        //           dump($content);
        return $content;

        //        return;
        $content = '<ul class="tabs" >';
        foreach($translations as $translate)
        {
            $content .= '<li data-id="'.$translate->id.'" data-block="'.$block->id.'"><a href="#'. $translate->id.'">'. $translate->locale .'</a></li>';

        }
        $content .= '</ul>';
        $tba_container = '<div class="tab_container" >';

        foreach($translations as $translate)
        {

            $tba_container .= '
                    <div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'. $translate->id .'">';

            $tba_container .= '</div>';

        }
        $tba_container .= '</div>';
        return $content .= $tba_container ;





        //////////////////////////////////////////////////////
        //        dump($translate);
        //        return;
        //        dump($translate->image->thumbnails[0]);
        //                dd($translate->image->thumbnails[0]);

        //        $image = $translate->image->thumbnails[0] ?? '';
        //                dd($fields);

        //        foreach($translate as $item)
        //        {
        //            dump($item);
        //        }
        //        dd($fields);

        $content = '<div class="table-responsive">
                <table class="table table-bordered"><tr>';

        foreach($fields as $field)
        {
            $content .=  "<th>$field</th>";

        }
        $content .=  "<th>image</th>";
        $content .= '</tr><tr>';

        foreach($fields as $field)
        {
            $content .=  "<td>".$translate->{$field}."</td>";

        }
        $content .=  "<td><img src='".$image->asset_file_name."' width=200></td>";

        $content .= '</tr></table></div>';
        return $content;

    }

    public static function showEmbedMediaSection($translations,$fields)
    {
        $content = '';

        foreach($translations as $translate)
        {

            $content .= '<div class="table-responsive">
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
        }
        return $content;

    }  

    public static function showInfographicsSection($translations,$fields)
    {
        $content = '';

        foreach($translations as $translate)
        {

            $content .= '<div class="table-responsive">
            <table class="table table-bordered"><tr>';

            foreach($fields as $field)
            {
                $content .=  "<th>$field</th>";
            }
            $content .= '</tr><tr>';

            foreach($fields as $field)
            {
                if($field == 'dataset_url')
                {
                    $content .=  "<td><a href=".$translate->{$field}.">".$translate->{$field}."</td>";
                }else{
                    $content .=  "<td>".$translate->{$field}."</td>";
                }

            }
            $content .= '</tr></table></div>';
            return $content;
        }

    }

    public static function showTextSection($translations,$fields)
    {

        $content = '';

        foreach($translations as $translate)
        {
            $content .= '<div class="table-responsive">
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
        }
        return $content;


    }

    public static function showYoutubeEmbed( $translations )
    {
        $table = '';
        foreach($translations as $translate)
        {
            //            dump($translate);
            //            continue;
            $embed = '<iframe width="500" height="300" src="https://www.youtube.com/embed/'. $translate->code .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

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
        }
        return $table;
    }

    /*
               <div class="table-responsive">
                        <table class="table ">



                        </table>
                        </div>
                      </div>
    */
    /*
                <ul class="tabs" >
                    @foreach($translations as $translate)
                    <li data-id="{{ $translate->id  }}" data-block="{{ $block->id }}"><a href="#{{ $translate->id }}">{{ $translate->locale }}</a></li>
                    @endforeach
                </ul>
                    */
    /*
                <div class="tab_container" >
                    @foreach($translations as $translate)
                    <div id="{{ $translate->id }}" class="tab_content" data-block="{{ $block->id }}" data-id="{{ $translate->id  }}">

                        @switch($block->asset_type_id )
                            @case(13)
                              {!! \App\Sections_types::showYoutubeEmbed($translate->code,$translate) !!}
                        @break
                            @case(3)
                              {!! \App\Sections_types::showTextSection($translate,$fields) !!}
                        @break 
                             @case(4)
                              {!! \App\Sections_types::showImage($translate,$fields) !!}
                        @break 
                             @case(9)
                              {!! \App\Sections_types::showInfographicsSection($translate,$fields) !!}
                        @break
                             @case(12)
                              {!! \App\Sections_types::showEmbedMediaSection($translate,$fields) !!}
                        @break
                            @default

                        @endswitch

                    </div>

                    @endforeach	
                 </div>
                 */
    /*
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
    */

}
