<?php
//require 'vendor/autoload.php';
//
//// Using Medoo namespace
//use Medoo\Medoo;
//
//function dd($a){
//    echo '<pre>';
//    print_r($a);
////    var_dump($a);
//    echo '</pre>';
//    exit;
//}
//
//function dump($a){
//    echo '<pre>';
//    print_r($a);
//    echo '</pre>';
//}
//
//// Initialize
//$database = new Medoo([
//    'database_type' => 'mysql',
//    'database_name' => 'old_chaikhana',
//    'server' => 'localhost',
//    'username' => 'root',
//    'password' => 'jibl@ra'
//]);
//
//// Initialize
//$chaikhana = new Medoo([
//    'database_type' => 'mysql',
//    'database_name' => 'chaikhana',
//    'server' => 'localhost',
//    'username' => 'root',
//    'password' => 'jibl@ra'
//]);






 //youtube ebis story_id ebis camogeba
//$data = $database->select('sections','*');
//foreach($data  as $item){
//      
//    $database->update("youtubes", [
//        "story_id" => $item['story_id'],
//    ], [
//        "section_id" => $item['id']
//    ]);
//}



//$data = $database->select('youtubes','*');
//
//foreach($data  as $item)
//{
//        $database->update("youtube_translations", [
//            "section_id" => $item['section_id'],
//            "story_id" => $item['story_id'],
//        ], [
//            "youtube_id" => $item['id']
//        ]);
//}



$data = $database->select('youtubes','*');

foreach($data as $item)
{
    
     $chaikhana->insert("blocks", [
        "id"            => $item['section_id'],
        "story_id"      => $item['story_id'],
        "section_id"    => $item['section_id'],
        "asset_type_id" => 13,
        "fullscreen"    =>  $item['fullscreen'],
        "loop"          =>  $item['loop'],
        "info"          =>  $item['info'],
        "created_at"    =>  $item['created_at'],
        "updated_at"    =>  $item['updated_at']
     ]);

     $block_id = $chaikhana->id();
    
     $youtubes = $database->select('youtube_translations','*',['section_id' => $item['section_id'] ]);

     foreach($youtubes as $youtube)
     {
         
//        dd($youtube);
         
        $chaikhana->insert("translations", [
            'locale'        => $youtube['locale'],
            'block_id'      => $block_id,
//            "menu_lang"     => $youtube['menu_lang'],
//            "cc_lang"       => $youtube['cc_lang'],
            "code"          => $youtube['code'],
//            "cc"            => $youtube['cc'],
            "title"         => $youtube['title'],
            "url"           => $youtube['url'],
            "created_at"    => $youtube['created_at'],
            "updated_at"    => $youtube['updated_at'],
            "asset_id"      => $slide['asset_id']
        ]);
    
     }
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'youtube done');

