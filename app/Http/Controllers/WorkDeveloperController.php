<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Assets;
use File;
use Image;
use App\Http\Controllers;
use App\Models\Upload;
use App\Models\Story;
use App\Translation;
use App\User;
use App\Autor;
use App\Logo;

class WorkDeveloperController extends Controller
{
    public function work()
    {
        $filename = 'ss.png';
//        $file_date_folder = public_path($filename);
         $file_date_folder = str_replace('\\', '/', public_path($filename));
        
//        dd($file_date_folder);
        
//$reduce_file = shell_exec('"C:\Program Files\ImageMagick-7.0.8-Q16/convert.exe" '.$file_date_folder.'  -strip -quality 90 '.$file_date_folder);
       
//$reduce_file = shell_exec('"C:/Program Files/ImageMagick-7.0.8-Q16/mogrify.exe"  -path '.$file_date_folder.' 280x345 -resize '.$file_date_folder);

        
//$reduce_file = shell_exec('"C:/Program Files/ImageMagick-7.0.8-Q16/convert.exe" -crop 280x345  '.$file_date_folder);
        
//$reduce_file = shell_exec('"C:/Program Files/ImageMagick-7.0.8-Q16/mogrify.exe" -resize 100x100  '.$file_date_folder);
        
//$reduce_file = shell_exec('"C:/Program Files/ImageMagick-7.0.8-Q16/mogrify.exe" -resize 280x345  '.$file_date_folder.' -path '.$file_date_folder);
        
        /*
//       $this->AsssetIdies();
//        dd('asset ides is finished');
        
        // open an image file
        $img = Image::make(public_path('2561__infogr-young-teachers.jpg') );

        // resize image instance
//        $img->resize(320, 240);
//        $img->resize(280, 345, function ($constraint) {
//            $constraint->aspectRatio();
//        });
        $img->fit(280, 345);
        // insert a watermark
//        $img->insert('public/watermark.png');

        // save image in desired format
        $img->save(public_path('some.jpg'));
        
//        Config::get('file_config.static_server_path');
//            
//        $path = public_path($img->basename);
//        echo '<img src="'.$path.'">';
         dd( $img->basename );
         dd( $img->dirname );
        */
        dd('croped');
        return;
        
        
        $upload = new UploadsController();

        $dir = 'chaikhanafiles';
        $story_ids = [];
        $asset_ids = [];
        //        $onefile = File::files(public_path(  'chaikhanafiles/audio/102/'  ));
        //        dd(   $onefile->getFileName()  );

        //        $folders = Storage::disk('public')->directories($dir);

        //        dd($files);
        //          foreach($folders as $folder)
        //        {
        //            dump($folder);
        //             dump( Storage::disk('public')->directories($folder) );
        //        }
        //        return;
//        $folders['images']      = $this->scanDir(public_path('chaikhanafiles/images'));
//        $folders['infographic'] = $this->scanDir(public_path('chaikhanafiles/infographic'));
//        $folders['slideshow']   = $this->scanDir(public_path('chaikhanafiles/slideshow'));
//        $folders['thumbnail']   = $this->scanDir(public_path('chaikhanafiles/thumbnail'));
//        $folders['video']       = $this->scanDir(public_path('chaikhanafiles/video'));
//        $folders['audio']       = $this->scanDir(public_path('chaikhanafiles/audio'));
//        $folders['users']       = $this->scanDir(public_path('chaikhanafiles/users/original'));
//        $folders['authors']     = $this->scanDir(public_path('chaikhanafiles/authors/original'));
//        $folders['logos']       = $this->scanDir(public_path('chaikhanafiles/logos'));
        
        
        
//        $folders['images']      = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'images');
//        $folders['infographic'] = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'infographic');
//        $folders['slideshow']   = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'slideshow');
//        $folders['thumbnail']   = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'thumbnail');
//        $folders['video']       = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'video');      
//        $folders['logos']       = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'logos');
//        $folders['users']       = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'original');
//        $folders['authors']       = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'authors'.DIRECTORY_SEPARATOR.'original');
//           $folders['audio'] = public_path('chaikhanafiles'.DIRECTORY_SEPARATOR.'audio');
        
      
        
        foreach($folders as $key => $folder)
        { 
            $story_id = '';
            $asset_id = '';

            $firectory = $this->scanDir( $folder );

            
             switch($key){
                      case 'thumbnail' :
                    
                            foreach($firectory as $StoryFolder)
                            {
                                  $story_id = $StoryFolder;
                                  $path = $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder.DIRECTORY_SEPARATOR.'original';
                                  $subDirs = $this->scanDir($path );
                                
                                if(!$subDirs)
                                {
                                    continue;
                                }

                                 foreach($subDirs as $onefile)
                                 {
                                     $asset_id = substr($onefile, 0,strpos($onefile,"__") ); 
                                     $upload->upload_files($onefile,$story_id,$asset_id,$path,false,true);
                                 }

                            }
                        continue;
                        break;
                    case 'authors' :
                    
                            foreach($firectory as $StoryFolder)
                            {
                               $path = $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder;
                               $asset_id = substr($StoryFolder, 0,strpos($StoryFolder,".") );
                               $upload->upload_files($StoryFolder,$story_id = null,$asset_id,$folders[$key],true);
                            }
                        continue;
                        break;
                    case 'users' : 
                      
                            foreach($firectory as $StoryFolder)
                            {

                                $path = $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder;
                                $asset_id = substr($StoryFolder, 0,strpos($StoryFolder,".") );
                                $upload->upload_files($StoryFolder,$story_id = null,$asset_id,$folders[$key],true);

                            }
                     continue;
                     break;
                    case 'audio' : 
                      
                            foreach($firectory as $StoryFolder)
                            {
                                 $story_id = (int) $StoryFolder;
//                           
                                 $files = $this->scanDir( $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder );
                                    if(!$files)
                                    {
                                        continue;
                                    }
                                 $path = $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder;
                                 foreach($files as $file)
                                 {
                                    $asset_id = substr($file, 0,strpos($file,"__") ); 
                                    $upload->upload_files($file,$story_id,$asset_id,$path);
                                 }

                            }
                        continue;
                        break;                     
                    default: 
                        break;
                }
          
            foreach($firectory as $StoryFolder)
            {

                  $story_id = $StoryFolder;
                  $path = $folders[$key].DIRECTORY_SEPARATOR.$StoryFolder.DIRECTORY_SEPARATOR.'original';
                  $subDirs = $this->scanDir($path );
                    if(!$subDirs)
                    {
                        continue;
                    }

                 foreach($subDirs as $onefile)
                 {
                     $asset_id = substr($onefile, 0,strpos($onefile,"__") ); 
                     $upload->upload_files($onefile,$story_id,$asset_id,$path);
                 }
                
            }

        }
        
        dd($folders);
        
//        try{
//
////            $this->AssetSaves($folders);
////            $this->scanAndSaveAssets($folders);
//
//        }catch(Exception $e){
//
//            dump( 'Caught exception: ', $e->getMessage() );
//            \Log::info( 'Exception class :  ' .  $e->getMessage() );
//
//        }

        dd('asets saved ');

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
        if(!is_dir($dir))
        {
            \Log::info( '***********************'  );
            \Log::info( 'DIR NOT FOUND ****** :  ' . $dir );
            return false;
        }
        //        $folders = Storage::disk('public')->directories('chaikhanafiles');
//                 dump(   $dir  );
        try{
            
            if( file_exists($dir) )
            {
//                   \Log::info( '************** DIRS  ****** :  ' . $dir );
                   $files = scandir( $dir );
            }else{
                \Log::info( '***********************'  );
                \Log::info( 'DIR NOT FOUND ****** :  ' . $dir );
                \Log::info( 'Scan dir Exception :  ' . json_encode(  [ 'EXCEPTION : ' => $e] ) );
                \Log::info( '***********************'  );
                dump($e);
            }
             
        }catch(Exception $e){
           
            \Log::info( 'Scan dir Exception :  ' . json_encode(  [ 'EXCEPTION : ' => $e] ) );
             dump($e);
        }
       
//        $files = scandir($dir,SCANDIR_SORT_DESCENDING );
//        $files = scandir(public_path($dir),SCANDIR_SORT_DESCENDING );
//        array_pop ($files);
//        array_pop ($files);
         unset($files[array_search('.', $files)]);
         unset($files[array_search('..', $files)]);
        dump($dir);
        return $files;
    }

    public function AssetSaves($folders)
    {
//d           dd($folders);
        $path = '';
        foreach($folders  as $key => $subFolder)
        {  
            
//            dump($subFolder);
//            continue;
            
            foreach($subFolder as $folder)
            {

                switch($key){
                    case 'authors' :  $path =  'chaikhanafiles'. DIRECTORY_SEPARATOR .$key.DIRECTORY_SEPARATOR.'original';
                        break;
                    case 'users'   :  $path =  'chaikhanafiles'. DIRECTORY_SEPARATOR .$key.DIRECTORY_SEPARATOR.'original';
                    case 'audio' : $path =  'chaikhanafiles'. DIRECTORY_SEPARATOR .$key. DIRECTORY_SEPARATOR . $folder;
                        break;                     
                    default: 
                    $path = 'chaikhanafiles'. DIRECTORY_SEPARATOR .$key. DIRECTORY_SEPARATOR .$folder;
                        break;
                }
dump($path); continue;
                $story_id = $folder;
               
                $fileB = $this->scanDir( $path );
dump($fileB );
               continue;
                foreach($fileB as $audio)
                { 
                    $asset_id = substr($audio, 0,strpos($audio,"__") );
                    //                $upload->upload_files($audio,$story_id,$asset_id,$path);
                }
            }


        }
        \Log::info( $key .'  DONE  ****************' );
    }


    public function scanAndSaveAssets($folders)
    {
        $upload = new UploadsController();
        //        LOGOS
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

        \Log::info( 'LOGOS DONE  ' );
        //USERS

        foreach($folders['users']  as  $image)
        { 

            $image_title = substr($image, 0,strpos($image,"."));

            $path = 'chaikhanafiles/users/original'.'/'.$image;

            $upload->upload_by_Avatar($image,$image_title,$path);

        }

        \Log::info( 'USERS DONE  ' );

        // VIDEO
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
        \Log::info( 'VIDEO DONE  ' );
        //AUDIO
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
        \Log::info( 'AUDIO DONE  ' );
        //AUTHORS 
        foreach($folders['authors']  as  $image)
        { 
            $image_title = substr($image, 0,strpos($image,"."));

            $path = 'chaikhanafiles/authors/original'.'/'.$image;

            $upload->upload_by_Avatar($image,$image_title,$path);

        }
        \Log::info( 'AUTHORS DONE  ' );

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
        \Log::info( 'THUMBNAILS DONE  ' );

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
        \Log::info( 'SLIDESHOW DONE  ' );
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
        \Log::info( 'INFOGRAPHICS DONE  ' );
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
        \Log::info( 'IMAGES DONE  ' );
    }
    
    
    
    public function AsssetIdies()
    {
//        $this->translations();
//        $this->storyThumbnailsIDes();
//        $this->usersAvatarsAssets();
//        $this->authorsAssets();
//        $this->logoAssets();
    }
    
    
    
    public function logoAssets()
    {
        $uploads = Upload::where('asset_type_id',14)->get();
        foreach($uploads as $upload)
        {
            Logo::where('image_file_name',$upload->name)->update([ "image" => $upload->id ]);
        }
    }
    
    public function authorsAssets()
    {
        $uploads = Upload::where('asset_type_id',8)->get();
        foreach($uploads as $upload)
        {
            Autor::where('id',$upload->item_id)->update([ "image" => $upload->id ]);
        }
    }
    
    public function usersAvatarsAssets()
    {
        $uploads = Upload::where('asset_type_id',7)->get();
        foreach($uploads as $upload)
        {
            User::where('id',$upload->item_id)->update([ "image" => $upload->id ]);
        }
       
    }
    
    public function storyThumbnailsIDes()
    {
        $uploads = Upload::where('asset_type_id',1)->get();
        foreach($uploads as $upload)
        {
            Story::where('id',$upload->story_id)->update([ "thumbnail" => $upload->id ]);
        }
       
    }
    
    public function translations()
    {
        $Translation = Translation::all();
              
        foreach($Translation  as $item)
        {
            $uploads = Upload::where('asset_id', $item->asset_id)->get();

            foreach($uploads as $one)
            {
                Translation::where('asset_id', $one->asset_id)->update([ "image" => $one->id ]);
            }
        }
    }
}
