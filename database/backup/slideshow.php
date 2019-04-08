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

//  $locale = 'en';

$data = $database->select('slideshows','*');

foreach($data  as $item)
{
        $chaikhana->insert("blocks", [
            "id"   => $item['section_id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],           
            "asset_type_id" => 6,
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);
    
    $block_id = $chaikhana->id();
    
    $slideshow = $database->select('slideshow_translations','*',['section_id' => $item['section_id']]);
    
    foreach($slideshow as $slide)
    {
        $chaikhana->insert("translations", [
            'locale'        => $slide['locale'],
            'block_id'      => $block_id,
            "title"         => $slide['title'],
            "caption"       => $slide['caption'],
            "description"   => $slide['description'],
            "created_at"    => $slide['created_at'],
            "updated_at"    => $slide['updated_at'],
            "asset_id"      => $slide['asset_id']
        ]);
    }
 
  
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'slideshow done');
/*  სექციების თეიბლიდან ვიღებთ სთორის აიდებს და ვწერთ კონკრეტულ ამ slideshow  თეიბლში 
$data = $database->select('sections','*');
foreach($data  as $item){
//    dump($item['story_id']);
    
//    $database->update("slideshows", [
//        "story_id" => $item['story_id'],
//    ], [
//        "section_id" => $item['id']
//    ]);
}
*/

/* slideshows section_id და story_id  მოგვაქვს და ვწერთ slideshow_translations

$data = $database->select('slideshows','*');

foreach($data  as $item)
{
        $database->update("slideshow_translations", [
            "section_id" => $item['section_id'],
            "story_id" => $item['story_id'],
        ], [
            "slideshow_id" => $item['id']
        ]);
}

*/

/* სხვადასხვა ენების მიხედვით მიგრაცია slideshow_translations ის blocks და  translations თეიბლში
$slideshow = $database->select('slideshow_translations','*',['locale' => $locale]);
foreach($slideshow as $item)
{
//    dd($item);
        $chaikhana->insert("blocks", [
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => 6,
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $account_id = $chaikhana->id();
 
        $chaikhana->insert("translations", [
            'locale'        => $locale,
            'block_id'      => $account_id,
            "title"         => $item['title'],
            "caption"       => $item['caption'],
            "description"   => $item['description'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);
}
*/