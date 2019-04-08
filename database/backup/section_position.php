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


$data = $database->select('sections','*');

// სექციების პოზიციების დააფდეითება 
foreach($data as $item)
{

    
    $chaikhana->update("blocks", [
        "position" => $item['position'],
    ], [
        "section_id" => $item['id'],
        "story_id"   => $item['story_id']
    ]);
              
    
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'section posicions done');