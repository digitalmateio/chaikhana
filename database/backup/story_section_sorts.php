<?php
//$data = $chaikhana->select('section','*');
$data = $database->select('stories','*');
$position = [];

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$sorted = [];

foreach($data  as $item)
{
   
    $sections = $database->select('sections','*',[ 'story_id' => $item['id']]); 
  
    foreach($sections as $section)
    {
        $position[$item['id']][$section['id']] = $section['position'];
//         dump('//////////////////////////////////');
//         dump($position[$item['id']]);
        
         uasort( $position[$item['id']],'cmp' );
        
//         sort( $position[$item['id']] );
//         dump('-------------------------------------------');
//         dump( $position[$item['id']] );
//         dump( json_encode( array_keys($position[$item['id']]) ) );
//         dump('-------------------------------------------');
//         dump('******************');
          $sorted[$item['id']] = array_keys($position[$item['id']]);
//        dump($section);
    }
}

 foreach($sorted as $key => $sortArr)
    {
//        $chaikhana->insert("story_blocks", [
//            'story_id'  => $key,
//            'positions' => json_encode( $sortArr ), 
//         ]);
     
       $chaikhana->update("stories", [
            "block_sort_oder"  => json_encode( $sortArr ),
        ], [
            "id" => $key,
        ]);
    }
   
// dd($position);


dump( $database->error() );
dump( $chaikhana->error() );