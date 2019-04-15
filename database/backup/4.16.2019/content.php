<?php

//contents  ის  სთორი აიდების მოწესტიგება
//$data = $database->select('sections','*');
//
//foreach($data  as $item){
// 
//    $database->update("contents", [
//        "story_id" => $item['story_id'],
//    ], [
//        "section_id" => $item['id']
//    ]);
//}

// content_translate ის story_id და section_id
//$data = $database->select('contents','*');

//foreach($data  as $item)
//{
//        $database->update("content_translations", [
//            "section_id" => $item['section_id'],
//            "story_id" => $item['story_id'],
//        ], [
//            "content_id" => $item['id']
//        ]);
//}


// კონტენტის ტრანსლაციების გადატანა


$data = $database->select('contents','*');

//dd($data );
foreach($data as $item)
{
    
    $chaikhana->update("blocks", [
//         "id"   => $item['section_id'],
//        "story_id"   => $item['story_id'],
//        "section_id" => $item['section_id'],
        "asset_type_id" => 3,
        "created_at" =>  $item['created_at'],
        "updated_at" =>  $item['updated_at']
    ],[
         "section_id" => $item['section_id'],
    ]);

//    $block_id = $chaikhana->id();
    
    $contents = $database->select('content_translations','*',['section_id' => $item['section_id'] ]);
    
    foreach($contents as $content)
    {        
        $chaikhana->insert("translations", [
            'locale'        => $content['locale'],
            'block_id'      => $content['section_id'],
            "story_id"      => $content['story_id'],
            "title"         => $content['title'],
            "caption"       => $content['caption'],
            "sub_caption"   => $content['sub_caption'],
            "text"          => $content['text'],
            "created_at"    => $content['created_at'],
            "updated_at"    => $content['updated_at'],
            "asset_id"      => $content['asset_id']
        ]);
    }
 
     
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'content done');
