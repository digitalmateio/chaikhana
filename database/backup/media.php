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

$type_id = 4;
// embed_medium_translations ების გადატანა block თეიბლში და translation ების თეიბლში
$data = $database->select('media','*');

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
             "id"   => $item['section_id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => $type_id,
            "caption_align" => $item['caption_align'],
            "infobox_type" => $item['infobox_type'],
            "media_type" => $item['media_type'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $block_id = $chaikhana->id();
 
        $translation_data = $database->select('medium_translations',[ "[>]assets" => ["id" => "item_id" ]],[ 

            "medium_translations.id",
            "medium_translations.medium_id",
            "medium_translations.title",
            "medium_translations.locale",
            "medium_translations.caption",
            "medium_translations.caption_align",
            "medium_translations.source",
            "medium_translations.infobox_type",
            "medium_translations.media_type",
            "medium_translations.section_id",
            "medium_translations.story_id",
            "medium_translations.asset_id",
        ],[
            'asset_type' => $type_id,
            'section_id' => $item['section_id']
        ]);
         
    
        foreach($translation_data as $trance)
        { 
           
            $chaikhana->insert("translations", [
                'locale'        => $trance['locale'],
                'block_id'      => $block_id,
                "title"         => $trance['title'],
                "caption"       => $trance['caption'],
                "source"        => $trance['source'],
                "created_at"    => $trance['created_at'],
                "updated_at"    => $trance['updated_at'],
                "asset_id"      => $trance['asset_id']

            ]);
            
          
        }
       
}



$type_id = 5;
// embed_medium_translations ების გადატანა block თეიბლში და translation ების თეიბლში
$data = $database->select('media','*');

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
             "id"   => $item['section_id'],
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => $type_id,
            "caption_align" => $item['caption_align'],
            "infobox_type" => $item['infobox_type'],
            "media_type" => $item['media_type'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $block_id = $chaikhana->id();
 
        $translation_data = $database->select('medium_translations',[ "[>]assets" => ["id" => "item_id" ]],[ 

            "medium_translations.id",
            "medium_translations.medium_id",
            "medium_translations.title",
            "medium_translations.locale",
            "medium_translations.caption",
            "medium_translations.caption_align",
            "medium_translations.source",
            "medium_translations.infobox_type",
            "medium_translations.media_type",
            "medium_translations.section_id",
            "medium_translations.story_id",
        ],[
            'asset_type' => $type_id,
            'section_id' => $item['section_id']
        ]);
         
    
        foreach($translation_data as $trance)
        {
            $chaikhana->insert("translations", [
                'locale'        => $trance['locale'],
                'block_id'      => $block_id,
                "title"         => $trance['title'],
                "caption"       => $trance['caption'],
                "source"        => $trance['source'],
                "created_at"    => $trance['created_at'],
                "updated_at"    => $trance['updated_at'],
                "asset_id"      => $trance['asset_id']
            ]);
            
          
        }
       
}

dump( $database->error() );
dump( $chaikhana->error() );
dump( 'Media done');
/*
// story_id და   section_id გადავიტანე medium_translations ში
$data = $database->select('media','*');

foreach($data  as $item)
{
        $database->update("medium_translations", [
            "section_id" => $item['section_id'],
            "story_id" => $item['story_id'],
        ], [
            "medium_id" => $item['id']
        ]);
}
*/

// medium_translations  გადააქ media_image: 4   და  media_video: 5    
//$data = $database->select('assets',[ "[>]medium_translations" => ["item_id" => "id"] ],[ 
//    
//    "medium_translations.id",
//    "medium_translations.medium_id",
//    "medium_translations.title",
//    "medium_translations.locale",
//    "medium_translations.caption",
//    "medium_translations.caption_align",
//    "medium_translations.source",
//    "medium_translations.infobox_type",
//    "medium_translations.media_type",
//    "medium_translations.section_id",
//    "medium_translations.story_id",
//    
//],['asset_type' => 4,]);


//dd( $data );
//
//foreach($data as $item)
//{
////    dump( $item['title'] );
//        $chaikhana->insert("blocks", [
//            "story_id"      => $item['story_id'],
//            "section_id"    => $item['section_id'],
//            "asset_type_id" => 4,
//            "caption_align" => $item['caption_align'],
//            "infobox_type"  => $item['infobox_type'],
//            "media_type"    => $item['media_type'],
//            "created_at"    =>  $item['created_at'],
//            "updated_at"    =>  $item['updated_at']
//        ]);
//
//        $block_id = $chaikhana->id();
// 
//        $chaikhana->insert("translations", [
//            'locale'        => $locale,
//            'block_id'      => $block_id,
//            "title"         => $item['title'],
//            "caption"       => $item['caption'],
//            "source"        => $item['source'],
//            "created_at"    =>  $item['created_at'],
//            "updated_at"    =>  $item['updated_at']
//        ]);
//}
