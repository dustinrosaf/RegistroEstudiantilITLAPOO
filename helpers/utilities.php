<?php 

class Utilities {

    public $career = [1 => "Software",2=> "Redes",3=> "Multimedia",4=> "Mecatronica",5=> "Seguridad Informatica"];

public function getLastElement($list){
    $countlist = count($list);
    $lastElement = $list[$countlist - 1];

    return $lastElement;
}



public function searchProperty($list,$property,$value){

        $filter = [];
        foreach($list as $item){
         if($item->$property == $value){
               array_push($filter, $item);

         }   
        }

        return $filter;

}

public function GetCookieTime(){
    return time() + 60*60*24*30;
}

public function getIndexElement($list,$property,$value){

    $index = 0;
    foreach($list as $key => $item){
     if($item->$property == $value){
           $index = $key;
         }   
    }

    return $index;

}





}




?>