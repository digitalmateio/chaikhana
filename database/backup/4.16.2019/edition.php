<?php
/*

$data = $database->select('themes','*');

foreach($data as $item)
{
    
     $chaikhana->insert("editions", [
        "id"            =>  $item['id'],
        "created_at"    =>  $item['created_at'],
        "updated_at"    =>  $item['updated_at'],
        "stories_count" =>  $item['stories_count']
     ]);
}

$locales = ['en','az','hy','ka','ru'];


foreach($locales as $locale )
{   
//    dump($locale);
//    continue;
$themes = $database->select('theme_translations','*',['locale' => $locale]);

    foreach($themes as $item)
    {

        $chaikhana->update("editions", [
            "name_".$locale => $item['name'],
            "edition_".$locale => $item['edition'],
            "description_".$locale => $item['description'],
            "permalink_".$locale => $item['permalink'],
        ], [
            "id" => $item['theme_id'],
        ]);

    } 
}
*/

//$data = $database->select('story_themes','*');
//
//    foreach($data as $item)
//    {
//        $chaikhana->update("stories", [
//            "edition_id" => $item['theme_id']
//        ], [
//            "id" => $item['story_id'],
//        ]);
//    }


dump( $database->error() );
dump( $chaikhana->error() );