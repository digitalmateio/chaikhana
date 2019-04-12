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
        
        $folders['audio'] = $this->scanDir('chaikhanafiles/audio');
        $folders['authors'] = $this->scanDir('chaikhanafiles/authors');
        $folders['images'] = $this->scanDir('chaikhanafiles/images');
        $folders['infographic'] = $this->scanDir('chaikhanafiles/infographic');
        $folders['logos'] = $this->scanDir('chaikhanafiles/logos');
        $folders['slideshow'] = $this->scanDir('chaikhanafiles/slideshow');
        $folders['thumbnail'] = $this->scanDir('chaikhanafiles/thumbnail');
        $folders['users'] = $this->scanDir('chaikhanafiles/users');
        $folders['video'] = $this->scanDir('chaikhanafiles/video');
  
        
        foreach($folders['images']  as  $folder)
        { 
            $story_ids[] = $folder;
            $story_id = $folder;
            
            $path = 'chaikhanafiles/images'.'/'.$folder.'/original';
//            dd('chaikhanafiles/audio'.'/'.$folder.'/original' );
            $fileB = $this->scanDir('chaikhanafiles/images'.'/'.$folder.'/original' );
            
            if(count($fileB) > 1 )
            {
                 array_pop($fileB);
            }
            
//            $fileB[0]  ეს ფაილის სახელი იქნება და ასატვირთად გამოგვადგება
            dump( $fileB[0] );
//            dump( strpos($fileB[0],"__") );
//            dump( substr($fileB[0], 0,strpos($fileB[0],"__") ) );
            $asset_ids[] = substr($fileB[0], 0,strpos($fileB[0],"__") );
            $asset_id = substr($fileB[0], 0,strpos($fileB[0],"__") );

            
            $upload->upload_files($fileB[0],$story_id,$asset_id,$path);
            
            dd('sssss');

            dump( $fileB[0] );
        }
        
        dump($story_ids);
        dd($asset_ids);
        
        
    /* AUDIO 
    
        foreach($folders['audio']  as  $folder)
        {
            $story_ids[] = $folder;
            $story_id = $folder;
            
            $fileB = $this->scanDir('chaikhanafiles/audio'.'/'.$folder );
            if(count($fileB) > 1 )
            {
                 array_pop($fileB);
            }
            
//            $fileB[0]  ეს ფაილის სახელი იქნება და ასატვირთად გამოგვადგება
            dump( $fileB[0] );
//            dump( strpos($fileB[0],"__") );
//            dump( substr($fileB[0], 0,strpos($fileB[0],"__") ) );
            $asset_ids[] = substr($fileB[0], 0,strpos($fileB[0],"__") );
            $asset_id = substr($fileB[0], 0,strpos($fileB[0],"__") );
            
            dump( $fileB[0] );
        }
        
        dump($story_ids);
        dd($asset_ids);
        
    */    
        return;
        /*
          0 => "chaikhanafiles/audio"
          1 => "chaikhanafiles/authors"
          2 => "chaikhanafiles/images"
          3 => "chaikhanafiles/infographic"
          4 => "chaikhanafiles/logos"
          5 => "chaikhanafiles/slideshow"
          6 => "chaikhanafiles/thumbnail"
          7 => "chaikhanafiles/users"
          8 => "chaikhanafiles/video"
        */
//        dd( $files );
//        $files = Storage::disk('public')->files($dir);
//        $files = Storage::disk('public')->allFiles($dir);
        /*
        // დაასკანერებს ამ დირექტორიას ამოიღებს ფოლდერების სახელებს და დაასორტირებს ბოლო 2 მოჩრის 
        // რომ კორექტულად დაალაგოს
        $files = scandir(public_path($dir),SCANDIR_SORT_DESCENDING );
        array_pop ($files);
        array_pop ($files);
    
        foreach($files as $file)
        {
            dump( $dir.'/'.$file );
        }
        */
         foreach($files as $file)
        {
            dump( $file );
            dump( $this->scanDir($file) );
//            dump(  scandir(public_path($dir),SCANDIR_SORT_DESCENDING ) );
//            dump( Storage::allFiles($dir.'/'.$file) );
//            dump( Storage::disk('public')->directories($dir.'/'.$file) );
//            dump( Storage::disk('public')->allDirectories($dir.'/'.$file) );
//            dump(  File::files(public_path( 'chaikhanafiles/audio' ))  );
             
        }
//        $assets = Assets::first();
//        dd($assets);
       
        dd( $files  );
//        dd( $storage );
    }
    
    public function scanDir($dir)
    { 
        $files = scandir(public_path($dir),SCANDIR_SORT_DESCENDING );
          array_pop ($files);
          array_pop ($files);
        return $files;
    }
}
