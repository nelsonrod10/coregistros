<?php

namespace App;

class helpers
{

  public static function post_externo($url, $data){

     $prmstr ="";
      foreach ($data as $name => $val){
        $prmstr .= "/".$val;
      }

     $url = $url.$prmstr;
     $meta = ["received" => time(),
         "status" => "new",
         "agent" => $_SERVER['HTTP_USER_AGENT']];
     $options = ["http" => [
         "method" => "POST",
         "header" => ["Content-Type: application/json"],
         //"header" => ["Content-Length: ".json_encode($data)],
         //"content" => json_encode(["data" => $data, "meta" => $meta])
         ]
         ];
     $context = stream_context_create($options);
     return $response = file_get_contents($url, false, $context);
  }

  public static function getSotreId($zipcode){
    switch ($zipcode) {
      case '08456':
        $id = "CO1234";
        break;
      case '09789':
        $id = "CO5678";
        break;
      case '04536':
        $id = "ES3456";
        break;
    }

    return $id;
  }

  public static function getArray($request){
    foreach($request as $key => $value){
        $arr[$key] = $value;
        if($key === "zipcode"){
            $arr["storeID"] = helpers::getSotreId($value);
        }
    }
    return $arr;  
  }

}
