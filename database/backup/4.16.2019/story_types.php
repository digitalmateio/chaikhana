<?php


$locales = ['en','az','hy','ka','ru'];

    $data = $database->select('story_types','*');

foreach($data as $item)
{
     $chaikhana->insert("story_types", [
            'id'            => $item['id'],
            "updated_at"    => $item['updated_at'],
            "created_at"      => $item['created_at']
        ]);
}

foreach($locales as $locale)
{
    $data = $chaikhana->select('story_type_translations','*',['locale' => $locale]);

    foreach($data  as $item)
    {
      
        $chaikhana->update("story_types", [
                "name_".$locale => $item['name'],
                "created_at"    => $item['created_at'],
                "updated_at"    => $item['updated_at'],
        ], [
            "id" => $item['story_type_id'],
        ]);
    } 
}



dump( $database->error() );
dump( $chaikhana->error() );
dump( 'Story types  done');
