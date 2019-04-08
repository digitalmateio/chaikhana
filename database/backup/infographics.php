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
//
//




// infographic ebis story_id ebis camogeba
//$data = $database->select('sections','*');
//foreach($data  as $item){
//      
//    $database->update("infographics", [
//        "story_id" => $item['story_id'],
//    ], [
//        "section_id" => $item['id']
//    ]);
//}

//
//$data = $database->select('infographics','*');
//
//foreach($data  as $item)
//{
//        $database->update("infographic_translations", [
//            "section_id" => $item['section_id'],
//            "story_id" => $item['story_id'],
//        ], [
//            "infographic_id" => $item['id']
//        ]);
//}

$data = $database->select('infographics','*');

foreach($data as $item)
{
    
     $chaikhana->insert("blocks", [
          "id"   => $item['section_id'],
        "story_id"      => $item['story_id'],
        "section_id"    => $item['section_id'],
        "asset_type_id" => 9,
        "created_at"    =>  $item['created_at'],
        "updated_at"    =>  $item['updated_at']
     ]);

     $block_id = $chaikhana->id();
    
     $infographics = $database->select('infographic_translations','*',['section_id' => $item['section_id'] ]);

     foreach($infographics as $infographic)
     {
         
//        dd($infographic);
         
        $chaikhana->insert("translations", [
            'locale'        => $infographic['locale'],
            'block_id'      => $block_id,
            "title"         => $infographic['title'],
            "caption"       => $infographic['caption'],
            "description"   => $infographic['description'],
            "dataset_url"   => $infographic['dataset_url'],
            "dynamic_url"   => $infographic['dynamic_url'],
            "dynamic_code"  => $infographic['dynamic_code'],
            "created_at"    => $infographic['created_at'],
            "updated_at"    => $infographic['updated_at'],
            "asset_id"      => $infographic['asset_id']
        ]);
    
        $translation_id = $chaikhana->id();
    
        $chaikhana->update("infographic_datasources", [
        	 "block_id"       => $block_id,
             "translation_id" => $translation_id,        
        ], [
        	"infographic_translation_id" => $infographic['id']
        ]);
     }
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'infographics done');

