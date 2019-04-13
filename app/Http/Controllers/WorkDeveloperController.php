<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Assets;
use File;
use Image;
use App\Http\Controllers;

class WorkDeveloperController extends Controller
{
    public function work()
    {
        /*
        // open an image file
        $img = Image::make(public_path('1399__img-4653.jpg') );
         
        // resize image instance
        $img->resize(320, 240);

        // insert a watermark
//        $img->insert('public/watermark.png');

        // save image in desired format
        $img->save(public_path('img-4653.jpg'));
        
         dd( $img );
        */
        $upload = new UploadsController();
        
         $dir = 'chaikhanafiles';
         $story_ids = [];
         $asset_ids = [];
//        $onefile = File::files(public_path(  'chaikhanafiles/audio/102/'  ));
//        dd(   $onefile->getFileName()  );
        
        $files = Storage::disk('public')->directories($dir);
        
        $folders['audio']       = $this->scanDir('chaikhanafiles/audio');
        $folders['authors']     = $this->scanDir('chaikhanafiles/authors/original');
        $folders['images']      = $this->scanDir('chaikhanafiles/images');
        $folders['infographic'] = $this->scanDir('chaikhanafiles/infographic');
        $folders['logos']       = $this->scanDir('chaikhanafiles/logos');
        $folders['slideshow']   = $this->scanDir('chaikhanafiles/slideshow');
        $folders['thumbnail']   = $this->scanDir('chaikhanafiles/thumbnail');
        $folders['users']       = $this->scanDir('chaikhanafiles/users/original');
        $folders['video']       = $this->scanDir('chaikhanafiles/video');
  
       
        /* LOGOS
        foreach($folders['logos']  as  $folder)
        {
            $story_id = $folder;
            
            $path = 'chaikhanafiles/logos'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/logos'.'/'.$folder.'/original' );
            
            foreach($fileB as $image)
            {
                $asset_id = substr($image, 0,strpos($image,"__") );
                $upload->upload_logos($image,$story_id,$asset_id,$path);
            }          
        
        }
        */
        
         /*  USERS
        
        foreach($folders['users']  as  $image)
        { 
            
            $image_title = substr($image, 0,strpos($image,"."));
                                  
            $path = 'chaikhanafiles/users/original'.'/'.$image;
                                  
            $upload->upload_by_Avatar($image,$image_title,$path);
        
        }
        
        */
        
        
        /*  VIDEO
        foreach($folders['video']  as  $folder)
        {
            $story_id = $folder;
            
            $path = 'chaikhanafiles/video'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/video'.'/'.$folder.'/original' );
            
            foreach($fileB as $video)
            {
                $asset_id = substr($video, 0,strpos($video,"__") );
                $upload->upload_files($video,$story_id,$asset_id,$path);
            }          
        
        }
        */
        
        /*  AUDIO
        foreach($folders['audio']  as  $folder)
        {
            $story_id = $folder;
            $path = 'chaikhanafiles'. DIRECTORY_SEPARATOR .'audio'. DIRECTORY_SEPARATOR .$folder;
            $fileB = $this->scanDir( $path );
                   
            foreach($fileB as $audio)
            {
                $asset_id = substr($audio, 0,strpos($audio,"__") );
                $upload->upload_files($audio,$story_id,$asset_id,$path);
            }
            
        }
        */
        
        /* AUTHORS 
        foreach($folders['authors']  as  $image)
        { 
            $image_title = substr($image, 0,strpos($image,"."));
                                  
            $path = 'chaikhanafiles/authors/original'.'/'.$image;
                                  
            $upload->upload_by_Avatar($image,$image_title,$path);
        
        }
        */
        
        
        /*
        // THUMBNAILS
        foreach($folders['thumbnail']  as  $folder)
        { 
            $story_id = $folder;
            
            $path = 'chaikhanafiles/thumbnail'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/thumbnail'.'/'.$folder.'/original' );
            
            foreach($fileB as $image)
            {
                $asset_id = substr($image, 0,strpos($image,"__") );
                $upload->upload_files($image,$story_id,$asset_id,$path);
            }
        
        }
   */
  /*      
        // SLIDESHOW
        foreach($folders['slideshow']  as  $folder)
        { 
            $story_id = $folder;
            
            $path = 'chaikhanafiles/slideshow'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/slideshow'.'/'.$folder.'/original' );
            
            foreach($fileB as $image)
            {
                $asset_id = substr($image, 0,strpos($image,"__") );
                $upload->upload_files($image,$story_id,$asset_id,$path);
            }
        }
  */
  
  /*
   // INFOGRAPHICS         
        foreach($folders['infographic']  as  $folder)
        { 
            $story_ids[] = $folder;
            $story_id = $folder;
            
            $path = 'chaikhanafiles/infographic'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/infographic'.'/'.$folder.'/original' );
            
            foreach($fileB as $image)
            {
                if($image == '3360__.jpeg.' || $image = '1503__.jpeg.'){ continue; }
                $asset_id = substr($image, 0,strpos($image,"__") );
                $upload->upload_files($image,$story_id,$asset_id,$path);
            }
        
        }
*/
/* 
        
        // IMAGES
        foreach($folders['images']  as  $folder)
        { 
            $story_ids[] = $folder;
            $story_id = $folder;
            
            $path = 'chaikhanafiles/images'.'/'.$folder.'/original';
            $fileB = $this->scanDir('chaikhanafiles/images'.'/'.$folder.'/original' );
            
              
            foreach($fileB as $image)
            {
                $asset_id = substr($image, 0,strpos($image,"__") );
                $upload->upload_files($image,$story_id,$asset_id,$path);
            }
        
        }
*/
        return;
     
    }
    
    public function scanDir($dir)
    { 
        $files = scandir(public_path($dir),SCANDIR_SORT_DESCENDING );
          array_pop ($files);
          array_pop ($files);
        return $files;
    }
}
