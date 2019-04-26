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
use App\Http\Controllers\LAFormMaker;

use Dwij\Laraadmin\Models\Module;
use Collective\Html\FormFacade as Form;


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

        //        $module = Module::get('Blocks');
        //        $moduleTranslate = Module::get('Translations');

        //        $LAFormMaker = new LAFormMaker();
        //        
        //        return $LAFormMaker->showInput($moduleTranslate,'text');
        //        return $LAFormMaker->showInput($module,'title_en');
        //        
        //        dd($LAFormMaker->showInput($module,'title_en'));


        switch( $block->asset_type_id ){

            case 13 : 
                return \App\Sections_types::showYoutubeEmbed($translations,$fields,$block);
                break;
            case 3:
                return \App\Sections_types::showTextSection($translations,$fields,$block);
                break;
            case 4:
                return \App\Sections_types::showImages($translations,$fields,$block) ;
                break;
            case 5 : 
                return \App\Sections_types::showVideo($translations,$fields,$block);
                break;
            case 6 : 
                return \App\Sections_types::showSlideShow($translations,$fields,$block);
                break;
            case 9:
                return \App\Sections_types::showInfographicsSection($translations,$fields,$block) ;
                break;
            case 12:
                return \App\Sections_types::showEmbedMediaSection($translations,$fields,$block);
                break;
            default:
                break;

        }  

    }

    public static function showSlideShow($translations,$fields,$block)
    {
         $bylocale = $translations->groupBy('locale');
         
        $content = '';
        $content .= '<ul class="tabs" >';
        
        $number = rand(1, 100);

        $i = $number;
        foreach($bylocale as $key => $item)
        {
            $content .= '<li data-id="'. $i .'" data-block="'.  $block->id .'"><a href="#'. $i .'">'. $key .'</a></li>';
            $i++;
        }
       

        
        $content .= '</ul>';
        $content .= '<div class="tab_container">';
        $i = $number;
        
        foreach($bylocale as $key => $translates)
        {
            $content .= '<div id="'.$i.'" class="tab_content" data-block="'.  $block->id .'" data-id="'.$i .'">';
          
            foreach($translates as $translate)
            {
                $image = $translate->image;
                $content .= '<div class="table-responsive">
                <table class="table table-bordered"><tr>';

                $content .=  "<th>lang</th>";
                foreach($fields as $field)
                {
                    // $content .=  "<td>".$translate->{$field}."</td>";  
                     $content .=  "<th>$field</th>";               
                }
                   $content .= '</tr><tr>';
                $content .=  "<td>".$translate->locale."</td>";

                foreach($fields as $field)
                {
                      // $content .=  "<th>$field</th>";

                     switch($field)
                    {
                        case 'audio' :  
                            $audio = $translate->{$field};
                            if(!is_null( $audio ))
                            {
                                $content .=  "<td>";
                                $content .= '<audio controls>
                                  <source src="'.$audio->url.'" type="audio/'.$audio->extension.'">
                                </audio>';
                                $content .= "</td>";  
                            }else{
                                $content .=  "<td></td>";
                            }
                            break;
                        case 'image' : 

                            $image = $translate->image;
                            // $image = $translate->getImage();
                            // dd(  $translate );
                             $thumbnails = optional($image)->thumbnails;
                             //$image->thumbnails['300x300']
                            // dd(  );
                            // dd(  $image->url );
                            // dd(   $thumbnails['300x300']   );
                            $content .=  "<td>"; 
                            
                                $content .= '<img style="margin:5px;" src="'. $thumbnails['300x300']  .'"/>';
                    
                            $content .= "</td>";


                            break;
                        case 'images' : 

                            $images = $translate->getImages();

                            $content .=  "<td>"; 

                            foreach($images as $image)
                            {
                                $content .= '<img style="margin:5px;" src="'.$image->thumbnails['300x300'].'"/>';
                            }

                            $content .= "</td>";

                            break;
                        default :  $content .=  "<td>".$translate->{$field}."</td>"; 
                            break;
                    }

                }
                // $content .= "<th>image</th>";
                // $content .= '</tr><tr>';

               

                // $content .=  "<td><img src='".optional($image)->url."' width=200></td>";

                $content .= '</tr></table></div>';
            }
            $content .= '</div>';
            $i++;
        }
        
        $content .= '</div>';
        
        return $content;
       
        /* mushoa versia
        $content = '';
        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';
            $image = $translate->image;

            $content .= '<div class="table-responsive">
                <table class="table table-bordered"><tr>';

            $content .=  "<th>lang</th>";

            //            dump($fields);
            //            continue;

            foreach($fields as $field)
            {
                //                 if($field == 'images')
                //                {  
                //                    $iamges = $translate->{$field};
                ////                     dump($iamges);
                //                }

                $content .=  "<th>$field</th>";

            }
            //            $content .= "<th>image</th>";
            $content .= '</tr><tr>';

            $content .=  "<td>".$translate->locale."</td>";

            foreach($fields as $field)
            {
                switch($field)
                {
                    case 'audio' :  
                        $audio = $translate->{$field};
                        if(!is_null( $audio ))
                        {
                            $content .=  "<td>";
                            $content .= '<audio controls>
                              <source src="'.$audio->url.'" type="audio/'.$audio->extension.'">
                            </audio>';
                            $content .= "</td>";  
                        }else{
                            $content .=  "<td></td>";
                        }
                        break;

                    case 'images' : 

                        $iamges = $translate->getImages();
                        $content .=  "<td>"; 

                        foreach($iamges as $image)
                        {
                            $content .= '<img style="margin:5px;" src="'.$image->thumbnails['300x300'].'"/>';
                        }

                        $content .= "</td>";

                        break;
                    default :  $content .=  "<td>".$translate->{$field}."</td>"; 
                        break;
                }
              
             
            }

            $content .= '</tr></table></div>';
            $content .= '</div>';
        }
        $content .= '</div>';
        return $content;
        */
    }

    public static function showVideo($translations,$fields,$block)
    {
        $content = '';
        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {

            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

            $content .= '<div class="table-responsive">
                <table class="table table-bordered"><tr>';
            $content .=  "<th>lang</th>";

            foreach($fields as $field)
            {
                $content .=  "<th>$field</th>";
            }
            $content .= '</tr><tr>';

            $content .=  "<td>".$translate->locale."</td>";

            foreach($fields as $field)
            {

                if($field == 'video')
                { 
                    $content .=  "<video controls src='".$translate->video."' width='500px' height='300px'/>";
                }else{
                    $content .=  "<td>".$translate->{$field}."</td>";
                }


            }

            $content .= '</tr></table></div>';
            $content .= '</div>';
        }
        $content .= '</div>';
        return $content;
    }

    public static function showImages($translations,$fields,$block)
    {
        $bylocale = $translations->groupBy('locale');
         
        $content = '';
        $content .= '<ul class="tabs" >';
        
        $number = rand(1, 100);

        $i = $number;
        foreach($bylocale as $key => $item)
        {
            $content .= '<li data-id="'. $i .'" data-block="'.  $block->id .'"><a href="#'. $i .'">'. $key .'</a></li>';
            $i++;
        }
       

        
        $content .= '</ul>';
        $content .= '<div class="tab_container">';
        $i = $number;
        
        foreach($bylocale as $key => $translates)
        {
            $content .= '<div id="'.$i.'" class="tab_content" data-block="'.  $block->id .'" data-id="'.$i .'">';
          
            foreach($translates as $translate)
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
            }
            $content .= '</div>';
            $i++;
        }
        
        $content .= '</div>';
        
        return $content;
       
            /*
        $content = '';
        $content .= '<ul class="tabs" >';
        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= '</div>';
        }

        $content .= '</div>';
        */
        /*

        $content = '';
        $content .= '<ul class="tabs" >';
        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= '</div>';
        }

        $content .= '</div>';
      */
        // return $content;
        /*
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
*/



    }

    public static function showEmbedMediaSection($translations,$fields,$block)
    {
        $content = '';
        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {

            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= '</div>';
        }
        $content .= '</div>';
        return $content;

    }  

    public static function showInfographicsSection($translations,$fields,$block)
    {
        $content = '';
        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= '</div>';            
        }

        $content .= '</div>';
        return $content;
    }

    public static function showTextSection($translations,$fields,$block)
    {

        $content = '';

        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= '</div>';
        }

        $content .= '</div>';
        return $content;


    }

    public static function showYoutubeEmbed($translations,$fields,$block)
    {
        $table = '';
        $content = '';
        $content .= '<ul class="tabs" >';

        foreach($translations as $translate)
        {
            $content .=  '<li data-id="'.$translate->id  .'" data-block="'. $block->id .'"><a href="#'. $translate->id .'">'. $translate->locale .'</a></li>';
        }
        $content .= '</ul>';
        $content .= '<div class="tab_container">';

        foreach($translations as $translate)
        {
            $content .= '<div id="'. $translate->id .'" class="tab_content" data-block="'. $block->id .'" data-id="'.$translate->id  .'">';

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
            $content .= $table;
            $content .= '</div>';
        }
        $content .= '</div>';
        return $content;
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
    */

}
