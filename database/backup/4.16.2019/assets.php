<?php

$data = $chaikhana->select('translations','*');
//dd($data);
foreach($data  as $item)
{
    $trans = $chaikhana->select('uploads','*',['asset_id' => $item['asset_id'] ]);
   
    foreach($trans as $one)
    {
        $chaikhana->update("translations", [
            "image" => $one['id']
        ], [
             "asset_id" => $one['id'],
        ]);
    }
        
      
}



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