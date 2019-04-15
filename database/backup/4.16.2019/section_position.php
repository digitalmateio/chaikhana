<?php


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