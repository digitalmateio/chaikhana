<?php

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

$locales = ['en','az','hy','ka','ru'];


$data = $database->select('sections','*');

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
            "id"         => $item['id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['id'],
            "position"   => $item['position'],
//            "asset_type_id" => 2,
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

//        $block_id = $chaikhana->id();
        
}

foreach($locales as $locale )
{   

$sections = $database->select('section_translations','*',['locale' => $locale]);

    foreach($sections as $section)
    {

        $chaikhana->update("blocks", [
            "title_".$locale => $section['title'],
        ], [
            "section_id" => $section['section_id'],
        ]);

    } 
}

//foreach($sections as $section)
//        {
//            
//            $chaikhana->insert("translations", [
//                'locale'        =>  $section['locale'],
//                'block_id'      =>  $block_id,
//                "title"         =>  $section['title'],
//                "created_at"    =>  $section['created_at'],
//                "updated_at"    =>  $section['updated_at'],
//                "asset_id"      =>  $section['asset_id']
//            ]);
//        }


