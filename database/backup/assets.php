<?php
require 'vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

function dd($a){
    echo '<pre>';
    print_r($a);
//    var_dump($a);
    echo '</pre>';
    exit;
}

function dump($a){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'old_chaikhana',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'jibl@ra'
]);

// Initialize
$chaikhana = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'chaikhana',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'jibl@ra'
]);

//$asset_types = [1,2,3,4,5,6,9,12,13];


/*
$data = $database->select('assets','*',['asset_type' => 9 ]);
//dd($data);
foreach($data  as $item)
{
    $database->update("infographic_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
}
*/
/*
$data = $database->select('assets','*',['asset_type' => 6 ]);
//dd($data);
foreach($data  as $item)
{
    $database->update("slideshow_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
}
*/
/*
$data = $database->select('assets','*',['asset_type' => 5 ]);
//dd($data);
foreach($data  as $item)
{
    $database->update("medium_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
}
*/
/*
$data = $database->select('assets','*',['asset_type' => 4 ]);

foreach($data  as $item)
{
    $database->update("medium_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
}

*/
/*
$data = $database->select('assets','*',['asset_type' => 3 ]);

foreach($data  as $item)
{
    $database->update("content_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
}
*/

/*
$data = $database->select('assets','*',['asset_type' => 2 ]);

foreach($data  as $item)
{
    $database->update("section_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
  
}


*/
/*
$data = $database->select('assets','*',['asset_type' => 1 ]);

foreach($data  as $item)
{
    $database->update("story_translations", [
        "asset_id" => $item['id'],
    ], [
        "id" => $item['item_id']
    ]);
  
}
*/
dump( $database->error() );
dump( $chaikhana->error() );