<?php 

class Student
{

    public $id;
    public $name;
    public $lastname;
    public $careerId;
    public $status;
    public $profilephoto;

    private $utilities;

    public function __construct()
    {
        $this->utilities = New Utilities();
    }


    public function InicializeData(
        $id,
        $name,
        $lastname,
        $careerId,
        $status
 
    )  {
    $this -> name = $id;
    $this -> lastname = $lastname;
    $this -> careerId = $careerId;
    $this -> status = $status;  

    }

    public function set($data){
        foreach($data as $key => $value) $this->{$key} = $value;
    }

    function getCareerName(){
        if($this->careerId != 0 && $this->careerId != null){
            return $this->utilities->career[$this->careerId];

        }

        
        
   
   
   
   }

}







