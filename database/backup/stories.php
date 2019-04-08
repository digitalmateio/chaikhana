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


$data = $chaikhana->select('story_translations','*');

foreach($data  as $item)
{
        $chaikhana->insert("translations", [
            'story_id'      => $item['story_id'],
            'locale'        => $item['locale'],
            "shortened_url" => $item['shortened_url'],
            "title"         => $item['title'],
            "permalink_staging" => $item['permalink_staging'],
            "permalink"     => $item['permalink'],
            "media_author"  => $item['media_author'],
            "about"         => $item['about'],
            "created_at"    => $item['created_at'],
            "updated_at"    => $item['updated_at'],
            "asset_id"      => $slide['asset_id']
        ]);
}


dump( $database->error() );
dump( $chaikhana->error() );
dump( 'Stories done');
/*
// stories_count is gadatana themes  table shi
$data = $database->select('theme_translations',['theme_id','stories_count']);

foreach($data  as $item)
{
//    dump($item);
        $database->update("themes", [
            "stories_count" => $item['stories_count'],
        ], [
            "id" => $item['theme_id']
        ]);
}
*/