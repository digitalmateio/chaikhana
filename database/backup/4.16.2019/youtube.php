<?php

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
    
     $chaikhana->update("blocks", [
//        "id"            => $item['section_id'],
//        "story_id"      => $item['story_id'],
//        "section_id"    => $item['section_id'],
        "asset_type_id" => 13,
        "fullscreen"    =>  $item['fullscreen'],
        "loop"          =>  $item['loop'],
        "info"          =>  $item['info'],
        "created_at"    =>  $item['created_at'],
        "updated_at"    =>  $item['updated_at']
     ],[
         "section_id"    => $item['section_id'],
     ]);

//     $block_id = $chaikhana->id();
    
     $youtubes = $database->select('youtube_translations','*',['section_id' => $item['section_id'] ]);

     foreach($youtubes as $youtube)
     {
         
//        dd($youtube);
         
        $chaikhana->insert("translations", [
            'locale'        => $youtube['locale'],
            'block_id'      => $youtube['section_id'],
            'story_id'      => $youtube['story_id'],
            "code"          => $youtube['code'],
            "title"         => $youtube['title'],
            "url"           => $youtube['url'],
            "created_at"    => $youtube['created_at'],
            "updated_at"    => $youtube['updated_at'],
            "asset_id"      => $youtube['asset_id']
        ]);
    
     }
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'youtube done');

