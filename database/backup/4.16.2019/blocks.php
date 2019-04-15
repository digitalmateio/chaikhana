<?php
$data = $chaikhana->select('blocks','*');

foreach($data as $item)
{
//    $trans = $chaikhana->select('translations','*',["block_id" => $item['id']]);
    
//    dump($trans);
//    dump($item);
//    continue;
      $chaikhana->update("translations", [
              "story_id"   => $item['story_id'],
        ], [
             "block_id" => $item['id'],
        ]);

     
}