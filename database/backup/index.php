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
//
//  $locale = 'en';
// en  ka   hy  az   ru
/*
აქ პრობლემაა  asset_type_id  რო ჩავწერო როი აიდი ლინკავს ერთი და იგივეზე 
media_image: 4          medium_translations                    
media_video: 5           medium_translations 
    ამიტომ დასაზუსტებელია
    */
// ,["LIMIT" => 50]
//$data = $database->select('assets','*',['asset_type' => 4]);

//$data = $chaikhana->select('blocks','*',['asset_type_id' => 9]);
// $chaikhana->delete("blocks", ["asset_type_id" => 9 ]);
//foreach($data  as $item)
//{
//    $chaikhana->delete("translations", ["block_id" => $item['id'] ]);    
//}
//die('hell');

//require 'media.php';
//require 'slideshow.php';
//require 'embed_media.php';
//require 'content.php';
//require 'infographics.php';
//require 'youtube.php';

//require 'sections.php';

//require 'themes.php';
//require 'stories.php';
//require 'section_position.php';

//require 'emptyTransAndBlocks.php';

die('FINISHED stories');
//dump( $database->error() );
//dump( $chaikhana->error() );
// dd('go done infographics locale : '.$locale);

//$database->update("account", [
//	"type" => "user",
// 
//	// All age plus one
//	"age[+]" => 1,
//
//], [
//	"user_id[<]" => 1000
//]);

//echo json_encode($data);


//////////////////////////////////  დარეზერვებული /////////////////////////////////////////////



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

/*  embed_media section_id და story_id  მოგვაქვს და ვწერთ  embed_medium_translations 
$data = $database->select('embed_media','*');

foreach($data  as $item)
{
        $database->update("embed_medium_translations", [
            "section_id" => $item['section_id'],
            "story_id" => $item['story_id'],
        ], [
            "embed_medium_id" => $item['id']
        ]);
}
*/
/* embed_medium_translations ების გადატანა block თეიბლში და translation ების თეიბლში
$data = $database->select('embed_medium_translations','*',['locale' => $locale ]);

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => 12,
            "url" => $item['url'],
            "code" => $item['code'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $account_id = $chaikhana->id();
 
        $chaikhana->insert("translations", [
            'locale'        => $locale,
            'block_id'      => $account_id,
            "title"         => $item['title'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);
}

*/
/* media  სთორი აიდები ჩავუწეროთ
$data = $database->select('sections','*');
foreach($data  as $item){
//    dump($item['story_id']);
    
    $database->update("media", [
        "story_id" => $item['story_id'],
    ], [
        "section_id" => $item['id']
    ]);
}
*/
/* story_id და   section_id გადავიტანე medium_translations ში
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

/* medium_translations  გადააქ media_image: 4   და  media_video: 5    
$data = $database->select('assets',[ "[>]medium_translations" => ["item_id" => "id"] ],[ 
    
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
    
],['locale' => $locale,'asset_type' => 5,]);

//dd( $data );

foreach($data as $item)
{
//    dump( $item['title'] );
        $chaikhana->insert("blocks", [
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => 5,
            "caption_align" => $item['caption_align'],
            "infobox_type" => $item['infobox_type'],
            "media_type" => $item['media_type'],
              "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);

        $account_id = $chaikhana->id();
 
        $chaikhana->insert("translations", [
            'locale'        => $locale,
            'block_id'      => $account_id,
            "title"         => $item['title'],
            "caption"       => $item['caption'],
            "source"        => $item['source'],
              "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);
}
*/


/* infographic ebis story_id ebis camogeba
$data = $database->select('sections','*');
foreach($data  as $item){
      
    $database->update("infographics", [
        "story_id" => $item['story_id'],
    ], [
        "section_id" => $item['id']
    ]);
}


$data = $database->select('infographics','*');

foreach($data  as $item)
{
        $database->update("infographic_translations", [
            "section_id" => $item['section_id'],
            "story_id" => $item['story_id'],
        ], [
            "infographic_id" => $item['id']
        ]);
}


$data = $database->select('infographic_translations','*',['locale' => $locale ]);

foreach($data as $item)
{
    
        $chaikhana->insert("blocks", [
            "story_id"   => $item['story_id'],
            "section_id" => $item['section_id'],
            "asset_type_id" => 9,
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
            "dataset_url"   => $item['dataset_url'],
            "dynamic_url"   => $item['dynamic_url'],
            "dynamic_code"  => $item['dynamic_code'],
            "created_at" =>  $item['created_at'],
            "updated_at" =>  $item['updated_at']
        ]);
    
       $translation_id = $chaikhana->id();
    
        $chaikhana->update("infographic_datasources", [
        	 "block_id"   => $account_id,
            "translation_id" => $translation_id,        
        ], [
        	"infographic_translation_id" => $item['id']
        ]);
    
}
*/