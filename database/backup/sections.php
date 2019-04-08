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

//dump( $database->error() );
//dump( $chaikhana->error() );

//youtube
//paralax
//slideshow
//fotos
//video
//audio
//
//360foto
//3foto
//1foto+description

// section audio 2 ის მონაცემები, სთორის აიდები ჩავუწეროთ სექციის ტრანსლეიტებს
//$data = $database->select('sections','*');
//foreach($data  as $item){
//      
//    $database->update("section_translations", [
//        "story_id" => $item['story_id'],
//    ], [
//        "section_id" => $item['id']
//    ]);
//}

//translation table shi gadatana

$data = $database->select('sections','*');

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
             "id"   => $item['id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['id'],
            "asset_type_id" => 2,
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $block_id = $chaikhana->id();
    
        $sections = $database->select('section_translations','*',['section_id' => $item['id'] ]);
    
        foreach($sections as $section)
        {
            
            $chaikhana->insert("translations", [
                'locale'        =>  $section['locale'],
                'block_id'      =>  $block_id,
                "title"         =>  $section['title'],
                "created_at"    =>  $section['created_at'],
                "updated_at"    =>  $section['updated_at'],
                "asset_id"      =>  $section['asset_id']
            ]);
        }
}




