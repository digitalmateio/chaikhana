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




/* სექციის თეიბლებიდან ვიღებთ story_id და ვწერთ ამ კონკრეტულად ამ თეიბლის story_id ში
$data = $database->select('sections','*');
foreach($data  as $item){
//    dump($item['story_id']);
    
    $database->update("embed_media", [
        "story_id" => $item['story_id'],
    ], [
        "section_id" => $item['id']
    ]);
}
*/

//  embed_media section_id და story_id  მოგვაქვს და ვწერთ  embed_medium_translations 
//$data = $database->select('embed_media','*');
//
//foreach($data  as $item)
//{
//        $database->update("embed_medium_translations", [
//            "section_id" => $item['section_id'],
//            "story_id" => $item['story_id'],
//        ], [
//            "embed_medium_id" => $item['id']
//        ]);
//}

// embed_medium_translations ების გადატანა block თეიბლში და translation ების თეიბლში
//$data = $database->select('embed_medium_translations','*',['locale' => $locale ]);

$data = $database->select('embed_media','*');

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
             "id"   => $item['section_id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => 12,
            "dimension" => $item['dimension'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $block_id = $chaikhana->id();
    
        $embed_medium = $database->select('embed_medium_translations','*',['section_id' => $item['section_id'] ]);
 
        foreach($embed_medium as $medium)
        { 
             $chaikhana->insert("translations", [
                'locale'        => $medium['locale'],
                'block_id'      => $block_id,
                "title"         => $medium['title'],
                "url"           => $medium['url'],
                "code"          => $medium['code'],
                "created_at"    => $medium['created_at'],
                "updated_at"    => $medium['updated_at'],
                "asset_id"      => $medium['asset_id']
            ]);
        }
       
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'embed_media done');