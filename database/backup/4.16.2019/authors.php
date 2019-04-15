<?php

$data = $database->select('authors','*');

foreach($data as $item)
{
    
     $chaikhana->insert("autors", [
        "id"            =>  $item['id'],
        "created_at"    =>  $item['created_at'],
        "updated_at"    =>  $item['updated_at']
     ]);
}

$locales = ['en','az','hy','ka','ru'];


foreach($locales as $locale )
{   
//    dump($locale);
//    continue;
$authors = $database->select('author_translations','*',['locale' => $locale]);

    foreach($authors as $item)
    {

        $chaikhana->update("autors", [
            "name_".$locale => $item['name'],
            "about_".$locale => $item['about'],
            "permalink" => $item['permalink'],
        ], [
            "id" => $item['author_id'],
        ]);

    } 
}



dump( $database->error() );
dump( $chaikhana->error() );

dd('authors');